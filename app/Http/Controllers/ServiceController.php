<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $services = Service::with('projects')->latest()->get();
        return view('admin.Services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'shortdescription' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'industry' => 'required|string|max:255',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
        ]);

        $input = $request->except('image');

        // Handle main image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/services'), $imageName);
            $input['image'] = url('images/services/' . $imageName);
        }

        // Create the service
        Service::create($input);

        return redirect()->route('service.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.Services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'shortdescription' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'industry' => 'required|string|max:255',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
        ]);

        $service = Service::findOrFail($id);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                $oldImagePath = public_path('images/services/' . basename($service->image));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/services'), $imageName);
            $service->image = url('images/services/' . $imageName);
        }

        // Update service
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'shortdescription' => $request->shortdescription,
            'industry' => $request->industry,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $service->image, // Use the updated image or keep the existing one
        ]);

        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Delete image file if exists
        if ($service->image) {
            $imagePath = public_path('images/services/' . basename($service->image));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the service
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }

    /**
     * Show the specified service
     */
    public function show($id)
    {
        $service = Service::with('projects', 'faqs')->findOrFail($id);
        return view('admin.Services.show', compact('service'));
    }
}