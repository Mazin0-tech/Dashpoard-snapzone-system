<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        $team = Team::all();
        return view('admin.Team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Team.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'jobtitle' => 'required|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $input = $request->except('image');

     

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $input['image'] = asset('images/' . $imageName);
        }

        Team::create($input);

        return redirect()->route('team.index')->with('success', 'Team created successfully.');
    }


    
    public function edit($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return redirect()->route('team.index')->with('error', 'Team not found');
        }
        return view('admin.Team.edit', compact('team'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'name' => 'nullable|string|max:255',
            'linkedin' => 'required|string|max:255',
            'jobtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $team = Team::find($id);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وجدت
            if ($team->image && file_exists(public_path('images/' . basename($team->image)))) {
                unlink(public_path('images/' . basename($team->image)));
            }

            // تحميل الصورة الجديدة
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $team->image = asset('images/' . $imageName);
        }
        $team->update($request->except('image'));
        return redirect()->route('team.index')->with('success', 'Team updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        if ($team) {
            if ($team->image && file_exists(public_path('images/' . basename($team->image)))) {
                unlink(public_path('images/' . basename($team->image)));
            }
            $team->delete();
            return redirect()->route('team.index')->with('success', 'Team deleted successfully.');
        } else {
            return redirect()->route('team.index')->with('error', 'Team not found.');
        }
    }
}
