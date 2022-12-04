<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ngambil semua data dr table projects
        $projects = Project::all();
        $no = 1;
        // tampilin halaman dengan data
        return view('project.index', compact('projects','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'name' => 'required|min:4',
        ]);
        // input data ke database
        Project::create([
            'name' => $request->name,
        ]);
        // redirect dengan pesan
        return redirect()->route('home')->with('success', 'Berhasil menambahkan project baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Project::where('id', $id)->first();
        // dd($data);
        // compact => ngirim data dr controller ke blade
        return view('project.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi
        $request->validate([
            'name' => 'required|min:4',
        ]);
        // update ke db
        Project::where('id', $id)->update([
            'name' => $request->name,
        ]);
        // redirect
        return redirect('/')->with('success_edit', 'Berhasil mengubah data project!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('id', $id)->delete();
        return redirect('/')->with('deleted', 'Berhasil menghapus data project');
    }
}
