<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('service', 'galleries')->latest()->get();
        return view('admin.Projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.Projects.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'industry' => 'required|string|max:255',
            'date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'client' => 'nullable|string|max:255',
            'link_project' => 'nullable|url|max:255',
            'slider_type' => 'nullable|boolean',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'featured_image_index' => 'nullable|integer|min:0'
        ]);

        $input = $request->except('image', 'gallery', 'featured_image_index');

        // Handle main image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/projects'), $imageName);
            $input['image'] = url('images/projects/' . $imageName);
        }

        // Create project
        $project = Project::create($input);

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            $order = 1;
            $featuredIndex = $request->featured_image_index ?? 0;

            foreach ($request->file('gallery') as $index => $file) {
                $galleryName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/gallery'), $galleryName);

                Gallery::create([
                    'project_id' => $project->id,
                    'image' => url('images/gallery/' . $galleryName),
                    'order' => $order,
                    'is_featured' => ($index == $featuredIndex)
                ]);

                $order++;
            }
        }

        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::with([
            'galleries' => function ($query) {
                $query->orderBy('order', 'asc');
            }
        ])->findOrFail($id);

        $services = Service::all();

        return view('admin.Projects.edit', compact('project', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:projects,title,' . $id,
            'description' => 'required|string',
            'industry' => 'nullable|string|max:255',
            'date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'client' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link_project' => 'nullable|url|max:255',
            'slider_type' => 'nullable|boolean',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'featured_image_index' => 'nullable|integer|min:0'
        ]);

        $project = Project::findOrFail($id);

        // Handle main image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image) {
                $oldImagePath = public_path('images/projects/' . basename($project->image));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/projects'), $imageName);
            $project->image = url('images/projects/' . $imageName);
        }

        // Handle gallery images update
        if ($request->hasFile('gallery')) {
            $existingGalleriesCount = $project->galleries()->count();
            $order = $existingGalleriesCount + 1;
            $featuredIndex = $request->featured_image_index ?? 0;

            foreach ($request->file('gallery') as $index => $file) {
                $galleryName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/gallery'), $galleryName);

                Gallery::create([
                    'project_id' => $project->id,
                    'image' => url('images/gallery/' . $galleryName),
                    'order' => $order,
                    'is_featured' => ($index == $featuredIndex)
                ]);

                $order++;
            }
        }

        // Update other fields
        $project->update($request->except('image', 'gallery', 'featured_image_index'));

        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete main image
        if ($project->image) {
            $imagePath = public_path('images/projects/' . basename($project->image));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete gallery images
        foreach ($project->galleries as $gallery) {
            if ($gallery->image) {
                $galleryPath = public_path('images/gallery/' . basename($gallery->image));
                if (file_exists($galleryPath)) {
                    unlink($galleryPath);
                }
            }
            $gallery->delete();
        }

        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }

    /**
     * Delete a gallery image
     */
    public function deleteGallery($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete image file
        if ($gallery->image) {
            $imagePath = public_path('images/gallery/' . basename($gallery->image));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $gallery->delete();

        return response()->json(['success' => 'Gallery image deleted successfully.']);
    }

    /**
     * Update gallery order
     */
    public function updateGalleryOrder(Request $request)
    {
        $request->validate([
            'gallery_order' => 'required|array'
        ]);

        foreach ($request->gallery_order as $order => $galleryId) {
            Gallery::where('id', $galleryId)->update(['order' => $order + 1]);
        }

        return response()->json(['success' => 'Gallery order updated successfully.']);
    }

    /**
     * Toggle featured image
     */
    public function toggleFeatured($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Reset all featured images for this project
        Gallery::where('project_id', $gallery->project_id)->update(['is_featured' => false]);

        // Set this image as featured
        $gallery->update(['is_featured' => true]);

        return response()->json(['success' => 'Featured image updated successfully.']);
    }
}