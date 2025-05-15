<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.Sttings.index', compact('settings'));
    }

    public function create() {
        return view('admin.Sttings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|string',
            'about' => 'nullable|string',
            'face' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'watsapp' => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',

        ]);

        Setting::create($request->all());

        return redirect()->route('settings.index');
     
    }




    public function edit($id)
    {
        $settings = Setting::findOrFail($id);
        return view('admin.Sttings.edit', compact('settings'));
    }




    public function update(Request $request, $id)
    {
         $request->validate([
            'logo' => 'nullable|string',
            'about' => 'nullable|string',
            'face' => 'nullable|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'watsapp' => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',

        ]);

        $settings = Setting::find($id);

        $settings->update($request->all());

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');

    }

    public function destroy($id)
    {
        // العثور على الخدمة بناءً على الـ ID
        $service = Setting::findOrFail($id);

      

        // حذف الخدمة من قاعدة البيانات
        $service->delete();

        return redirect()->route('settings.index')->with('success', 'Service deleted successfully');
    }



    
}
