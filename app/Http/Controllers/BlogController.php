<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();
        return view('admin.Blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Blog.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:services,title',
            'description' => 'required|string|max:255',
            'shortdescription' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $input = $request->except('image');

        $input['short_description'] = $request->shortdescription;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $input['image'] = asset('images/' . $imageName);
        }

        Blog::create($input);

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        if (!$blog){
            return redirect()->route('blog.index')->with('error', 'Blog not found');
        
        }
        return view('admin.Blog.edit', compact('blog'));
    }

    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'shortdescription' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $blog = Blog::find($id);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وجدت
            if ($blog->image && file_exists(public_path('images/' . basename($blog->image)))) {
                unlink(public_path('images/' . basename($blog->image)));
            }

            // تحميل الصورة الجديدة
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $blog->image = asset('images/' . $imageName);
        }
        $blog->update($request->except('image'));
        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
             if($blog->image && file_exists(public_path('images/' . basename($blog->image)))){
                unlink(public_path('images/' . basename($blog->image)));

             }
             $blog->delete();
             return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');

        }else{
            return redirect()->route('blog.index')->with('error', 'Blog not found.');
        }
    }
}
