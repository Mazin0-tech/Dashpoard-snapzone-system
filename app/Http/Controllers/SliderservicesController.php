<?php

namespace App\Http\Controllers;

use App\Models\Sliderservices;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class SliderservicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliderService = Sliderservices::with('service', 'project')->get();
        return view('admin.Slider-serveces.index', compact('sliderService'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        $projects = Project::all();
        $sliderService = Sliderservices::all();


        return view('admin.Slider-serveces.create', compact('services', 'projects', 'sliderService'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'project_id' => 'required|string|max:255',
            'service_id' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
            
        $input = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $input['image'] = asset('images/' . $imageName);
        }
        Sliderservices::create($input);
        return redirect()->route('sliderService.index')->with('success', 'sliderService created successfully.');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sliderService =  Sliderservices::find($id);
        $services = Service::all();
        $projects = Project::all();


        if (!$sliderService) {
            return redirect()->route('sliderService.index')->with('error', 'sliderService not found');
        }
        return view('admin.Slider-serveces.edit',compact('sliderService', 'projects', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'project_id' => 'required|string|max:255',
            'service_id' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        
        $sliderService =  Sliderservices::find($id);
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وجدت
            if ($sliderService->image && file_exists(public_path('images/' . basename($sliderService->image)))) {
                unlink(public_path('images/' . basename($sliderService->image)));
            }

            // تحميل الصورة الجديدة
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $sliderService->image = asset('images/' . $imageName);
        }
        $sliderService->update($request->except('image'));
        return redirect()->route('sliderService.index')->with('success', 'sliderService updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sliderService =  Sliderservices::find($id);
        if ($sliderService) {
            if ($sliderService->image && file_exists(public_path('images/' . basename($sliderService->image)))) {
                unlink(public_path('images/' . basename($sliderService->image)));
            }
            $sliderService->delete();
            return redirect()->route('sliderService.index')->with('success', 'sliderService deleted successfully.');
        } else {
            return redirect()->route('sliderService.index')->with('error', 'sliderService not found.');
        }
    }
}
