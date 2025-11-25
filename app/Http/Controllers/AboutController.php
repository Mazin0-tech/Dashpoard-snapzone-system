<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.About.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text_1' => 'nullable|string|max:500',
            'text_2' => 'nullable|string|max:500',
            'description' => 'required|string',
            'footer_about' => 'nullable|string|max:1000',
            'mission' => 'nullable|string|max:1000',
            'vision' => 'nullable|string|max:1000',
            'service_quote' => 'nullable|string|max:500',
            'portfolio_quote' => 'nullable|string|max:500',
            'blog_quote' => 'nullable|string|max:500',
            'video_link' => 'nullable|url|max:500',
            'projects_completed' => 'nullable|integer|min:0',
            'happy_customers' => 'nullable|integer|min:0',
            'years_of_experience' => 'nullable|integer|min:0',
            'award_achievement' => 'nullable|integer|min:0',
        ]);

        $about = About::findOrFail($id);
        $about->update($request->all());

        return redirect()->back()   
            ->with('success', 'About page updated successfully.');
    }


}