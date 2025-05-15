<?php

namespace App\Http\Controllers;

use App\Models\sliderproject;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class SliderprojectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliderproject= sliderproject::with('project')->get();
        return view('admin.Sliderproject.index',compact('sliderproject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $sliderproject= sliderproject::all();
        return view("admin.Sliderproject.create",compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            // 'project_id' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',

        ]);

        $input = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $input['image'] = asset('images/' . $imageName);
        }
        sliderproject::create($input);
        return redirect()->route('sliderproject.index')->with('success', 'sliderService created successfully.');
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sliderproject = sliderproject::find($id);
        $projects = Project::all();

        if (!$sliderproject) {
            return redirect()->route('sliderproject.index')->with('error', 'sliderService not found');
        }
        return view('admin.Sliderproject.edit',compact('sliderproject', 'projects'));
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'project_id' => 'required|exists:projects,id',
        ]);
        $sliderproject = sliderproject::find($id);
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وجدت
            if ($sliderproject->image && file_exists(public_path('images/' . basename($sliderproject->image)))) {
                unlink(public_path('images/' . basename($sliderproject->image)));
            }
            // تحميل الصورة الجديدة
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $sliderproject->image = asset('images/' . $imageName);
    }
        $sliderproject->update($request->except('image'));
        return redirect()->route('sliderproject.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sliderproject = sliderproject::find($id);
        if ($sliderproject) {
            if ($sliderproject->image && file_exists(public_path('images/' . basename($sliderproject->image)))) {
                unlink(public_path('images/' . basename($sliderproject->image)));
            }
            $sliderproject->delete();
            return redirect()->route('sliderproject.index');
    }else{
            return redirect()->route('sliderproject.index')->with('error', 'sliderService not found.');
        }
       }

   }
