<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $projects =Project::with('services')->get();
        return view('admin.Projects.index',compact('projects'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.Projects.create',compact('services'));
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
            'gallery' => 'nullable|array', 
        ]);
 

        $input = $request->except('image', 'gallery');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $input['image'] = asset('images/' . $imageName);
        }
        

        // Handle gallery
        if ($request->has('gallery')) {
            $gallery = $request->file('gallery');
            $galleryPaths = [];

            foreach ($gallery as $file) {
                $galleryName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('gallery'), $galleryName);
                $galleryPaths[] = asset('gallery/' . $galleryName);
            }

            $input['gallery'] = json_encode($galleryPaths);
        }

        Project::create($input);

 
        return redirect()->route('project.index')->with('message', 'Redirect Done!');
    }
    




    public function edit($id)
    {
        $project = Project::find($id);
        $services = Service::all();

     

        return view('admin.Projects.edit',compact('project', 'services'));
        
    }



    // public function update(Request $request, $id)
    // {


    //     $request->validate([
    //         'title' => 'required|string|max:255|unique:projects,title,' . $id,
    //         'description' => 'required|string',
    //         'industry' => 'nullable|string|max:255',
    //         'date' => 'required|date',
    //         'service_id' => 'required|exists:services,id', 
    //         'client' => 'nullable|string|max:255',
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'link_project' => 'nullable|url|max:255',
    //         'gallery' => 'nullable|array',
    //     ]);

    //     $project = Project::find($id);

    //     if (!$project) {
    //         return redirect()->back()->with('error', 'Project not found');
    //     }

    //     if ($request->hasFile('image')) {
    //         if ($project->image && file_exists(public_path('uploads/projects/' . basename($project->image)))) {
    //             unlink(public_path('uploads/projects/' . basename($project->image)));
    //         }

    //         $image = $request->file('image');
    //         $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('uploads/projects'), $imageName);

    //         $project->image = 'uploads/projects/' . $imageName;
    //     }


    //     if ($request->has('gallery')) {
    //         $project->gallery = $request->gallery; // تأكد إن الجاليري يتم التعامل معه بشكل مناسب حسب نوع البيانات في الـ DB
    //     }

    //     $project->update($request->except('image'));

    //     // إعادة التوجيه إلى صفحة المشاريع مع رسالة نجاح
    //     return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255|unique:projects,title,' . $id,
               'description' => 'nullable|string',
               'industry' => 'nullable|string|max:255',
               'date' => 'nullable|date',
               'service_id' => 'nullable|exists:services,id', 
               'client' => 'nullable|string|max:255',
               'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
               'link_project' => 'nullable|url|max:255',
            'gallery.*' => 'image|max:5048', // تحقق من كل صورة في الجاليري لو هي مرفوعة
        ]);

        $project = Project::find($id);

        if (!$project) {
            return redirect()->back()->with('error', 'Project not found');
        }

        if ($request->hasFile('image')) {
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/projects'), $imageName);

            $project->image = 'uploads/projects/' . $imageName;
        }

        // تعديل الجزء الخاص بالgallery
        if ($request->hasFile('gallery')) {
            $images = [];
            foreach ($request->file('gallery') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/projects/gallery'), $imageName);
                $images[] = 'uploads/projects/gallery/' . $imageName;
            }
            $project->gallery = json_encode($images);
        } elseif ($request->has('gallery') && is_array($request->gallery)) {
            $project->gallery = json_encode($request->gallery);
        }

        $project->update($request->except('image', 'gallery'));

        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }





    public function destroy(Project $project)
    {
        if ($project->image && file_exists(public_path('images/' . basename($project->image)))) {
            unlink(public_path('images/' . basename($project->image)));
        }

        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
