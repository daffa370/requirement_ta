<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {


            $data = Kelas::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }


        if (\request()->is("kelas")) {


            return view('web.sections.kelas.all', [
                "title" => "Halaman Kelas",
            ]);
        } else {


            return view('web.sections.dashboard.kelas.index', [
                "title" => "Halaman Kelas",
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.sections.kelas.create', [
            "title" => "Halaman Create",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $validate = $request->validate([

            "nama_kelas" => "required|unique:kelas,nama_kelas",
        ], [
            'nama_kelas.required' => 'kelas Pendaftaran harus di isi.',
        ]);

        Kelas::create($validate);

        return redirect('/dashboard/kelas')->with('succes', "anda berhasil menambahkan data");

        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Request
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('web.sections.kelas.edit', [
            "title" => "Halaman Edit",
            "kelas" => $kelas
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            "nama_kelas" => [
                "required",

                Rule::unique('kelas', 'nama_kelas')->ignore($id, 'id'),
            ]
        ]);
        Kelas::where('id', $id)->update($validate);


        return redirect("/dashboard/kelas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $classExists = Student::where('kelas_id', $id)->exists();

            if ($classExists) {
                return redirect('/dashboard/kelas')->with('error', 'Tidak dapat menghapus kelas yang memiliki siswa terkait.');
            }

            Kelas::destroy($id);


            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/dashboard/kelas')->with('error', 'Data gagal Di Hapus');
        }

        return redirect("/dashboard/kelas")->with('success', 'Data Berhasil Di Hapus');
    }
}
