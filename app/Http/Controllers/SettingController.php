<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.Settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'meta' => 'required|string|max:500',
            'keywords' => 'required|string|max:500',
            'address' => 'required|string|max:500',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'snapchat' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:1024',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $setting = Setting::findOrFail($id);
        $input = $request->except(['favicon', 'logo']);

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            // Delete old favicon if exists
            if ($setting->favicon) {
                $oldFaviconPath = public_path('images/settings/' . basename($setting->favicon));
                if (file_exists($oldFaviconPath)) {
                    unlink($oldFaviconPath);
                }
            }

            $favicon = $request->file('favicon');
            $faviconName = 'favicon_' . uniqid() . '.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('images/settings'), $faviconName);
            $input['favicon'] = url('images/settings/' . $faviconName);
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($setting->logo) {
                $oldLogoPath = public_path('images/settings/' . basename($setting->logo));
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }

            $logo = $request->file('logo');
            $logoName = 'logo_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images/settings'), $logoName);
            $input['logo'] = url('images/settings/' . $logoName);
        }

        $setting->update($input);

        return redirect()->route('settings.index')
            ->with('success', 'Settings updated successfully.');
    }

}