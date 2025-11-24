<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $input = $request->all();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images/partners'), $logoName);
            $input['logo'] = url('images/partners/' . $logoName);
        }

        Partner::create($input);

        return redirect()->route('partners.index')
            ->with('success', 'Partner created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $input = $request->all();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partner->logo) {
                $oldLogoPath = parse_url($partner->logo, PHP_URL_PATH);
                $oldLogoPath = public_path($oldLogoPath);
                if (File::exists($oldLogoPath)) {
                    File::delete($oldLogoPath);
                }
            }

            $logo = $request->file('logo');
            $logoName = uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images/partners'), $logoName);
            $input['logo'] = url('images/partners/' . $logoName);
        }

        $partner->update($input);

        return redirect()->route('partners.index')
            ->with('success', 'Partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        // Delete logo file
        if ($partner->logo) {
            $logoPath = parse_url($partner->logo, PHP_URL_PATH);
            $logoPath = public_path($logoPath);
            if (File::exists($logoPath)) {
                File::delete($logoPath);
            }
        }

        $partner->delete();

        return redirect()->route('partners.index')
            ->with('success', 'Partner deleted successfully.');
    }
}