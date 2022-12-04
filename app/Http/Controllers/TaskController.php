<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $project)
    {
        // first() cuman satu data yg diambil
        $dataProject = Project::where('id', $project)->first();
        // kalau where ada dua atau lebih filternya pake array multidimensi []
        $dataTask = Task::where([
            ['project_id', $project],
            ['name', 'LIKE', '%' . $request->search_task . '%'],
        ])->simplePaginate(5);
        // compact itu bisa lebih dari satu variable buat pemisahnya pake koma ,
        return view('task.index', compact('dataProject', 'dataTask'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project)
    {
        //ambil data dari database table projects dengan model Project yang baris datanya punya id project sama dengan id project yang dikirim ke path dinamis
        $project = Project::where('id', $project)->first();

        //ngirim data yg diambil biar bisa dipake di blade dengan compact
        //nama compact harus sama dengan nama variable
        return view('task.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $project)
    {
        // validasi
        $request->validate([
            'name' => 'required|min:3',
        ]);
        // tampilkan pesan error validasi di halaman create bladenya
        // kirim data ke databasenya melalui model
        Task::create([
            'name' => $request->name,
            'project_id' => $project,
        ]);
        // menentukan halaman redirect apabila berhasil menambahkan data dengan pesan
        // kenapa di fungsi route ini ada dua data
        // data pertama yang di '' name routenya
        // data ke dua itu isian buat path dinamis
        return redirect()->route('task.index', $project)->with('addTask', 'Berhasil menambahkan task baru pada project!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($project, $id)
    {
        // ambil data dr path dinamis project
        $dataProject = Project::where('id', $project)->first();
        // ambil data dr path dinamis id
        $task = Task::where('id', $id)->first();
        return view('task.edit', compact('dataProject', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $project, $id)
    {
        // validasi
        $request->validate([
            'name' => 'required|min:3',
        ]);
        // kirim pembaruan data ke database melalui model
        // kalau mau update kan harus cari data yang mau diubahnya dulu (data mana yg mau di perbarui)
        // jd pertama ambil dulu data nya lewat where (ketika ada baris data yang isi column id nya sama dengan data id yang dikirim path dinamis, maka datanya akan diambil)
        // lalu update data yg diambil sm where td dengan data baru
        Task::where('id', $id)->update([
            'name' => $request->name,
            'project_id' => $project,
        ]);
        // tentuin halaman redirect dengan pesan pemberitahuan
        return redirect()->route('task.index', $project)->with('updateTask', 'Berhasil memperbarui data task pada project!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */

    public function destroy($project, $id)
    {
        // hapus data dari databasenya
        // sebelum dihapus, dicari dulu data yg mau dihapusnya yg mana dengan where dr id path dinamisnya
        Task::where('id', $id)->delete();
        // kalau berhasil, arahin ke halaman task awal lagi dengan pemberitahuan
        return redirect()->route('task.index', $project)->with('deleteTask', 'Berhasil menghapus data task dari project!');
    }
}
