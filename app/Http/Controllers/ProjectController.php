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
    public function index(Request $request)
    {
        // ngambil semua data dr table projects
        // serta mengambil juga data dr table tasks
        // data table tasks dikelompokkan berdasarkan project_id nya
        // misal :
        // 1 baris project yg id nya 1 -> didalemnya bakal ngambil data dr table tasks yang punya project_id 1
        // id : 1, name : laravel, created, updated, + tasks : array data dr table tasks yang punya project_id 1
        // simplePaginate -> membatasi jumlah data yang ditampilkan
        // minimal data yg ditampilkan disimpan didalam parameter
        // paginate() dan simplePaginate() sama aja, cuman beda di tampilannya
        // kalau paginate ada angka sma iconnya dan dia hrs dikasi css custom
        // karena di dalam index ada fitur search yg bakal balik ke method index ini juga, jd sebelum ngambil datanya pake where dulu. $request->search_project diambil dr input yang name nya search_project
        // % didepan -> data huruf awal
        // % dibelakang -> data huruf belakang
        // % depan belakang -> data huruf depan belakang
        // argument pertama where -> nama column di database
        $projects = Project::where('name', 'LIKE','%'.$request->search_project.'%')->with('tasks')->simplePaginate(5);
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
