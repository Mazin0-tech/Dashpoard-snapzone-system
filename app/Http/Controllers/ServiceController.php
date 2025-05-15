<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::all();
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'industry' => 'required|string|max:255',
            'shortdescription' => 'nullable|string|max:255', 
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

        // Create the service
        Service::create($input);

        return redirect()->route('service.index')->with('success', 'Service created successfully');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.Services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // التحقق من المدخلات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'industry' => 'required|string|max:255',
            'shortdescription' => 'nullable|string|max:255', // إضافة التحقق لحقل shortdescription
        ]);

        // العثور على الخدمة بناءً على الـ ID
        $service = Service::findOrFail($id);

        // // إذا كان هناك صورة جديدة مرفقة
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('services', 'public');
        // }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $service->image = 'images/' . $imageName;
        }


        // تحديث السجل
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath ?? $service->image, // إذا لم تكن هناك صورة جديدة، نحتفظ بالصورة الحالية
            'industry' => $request->industry,
            'shortdescription' => $request->shortdescription, // حفظ shortdescription
        ]);

        return redirect()->route('service.index')->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        // العثور على الخدمة بناءً على الـ ID
        $service = Service::findOrFail($id);

        // إذا كان هناك صورة، قم بحذفها من التخزين
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        // حذف الخدمة من قاعدة البيانات
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully');
    }
}
