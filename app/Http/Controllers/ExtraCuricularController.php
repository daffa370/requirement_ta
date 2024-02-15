<?php

namespace App\Http\Controllers;

use App\Models\ExtraCuricular;
use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ExtraCuricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index() {

        if(request()->ajax())
        {
            $data = ExtraCuricular::all();

            return DataTables::of($data)->addIndexColumn()->make(true);
        }


        if (\request()->is("ekstrakurikuller")) {

            return view('web.sections.ekstrakurikuller.all',[
                "title" => "Halaman Extracuricullar",

            ]);
        } else {


            return view('web.sections.dashboard.ekstrakurikuller.index', [
                "title" => "Halaman Extracuricullar",
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
        return view('web.sections.dashboard.ekstrakurikuller.create', [
            "title" => "Halaman Create",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required|unique:extra_curiculars,nama",
            "nama_pembina" => "required",
            "deskripsi" => "required"
        ]);

        ExtraCuricular::create($validate);


        return  redirect()->action([
           ExtraCuricularController::class,
           "index"
        ])->with("succes","berhasil di tambah");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExtraCuricular $extraCuricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */

    // hati hati varaible param nya
//    public function edit(ExtraCuricular $extraCuricular)
//    {
//        return $extraCuricular;
//    }

    public function edit(ExtraCuricular $ekstrakurikuller)
    {
        return view('web.sections.dashboard.ekstrakurikuller.edit', [
            "title" => "Halaman Edit",
            "ekstra" => $ekstrakurikuller
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ExtraCuricular $extraCuricular)
    {
        $validate = $request->validate([
            "nama" => ["required",

                Rule::unique('extra_curiculars', 'nama')->ignore($extraCuricular->id, 'id'),
            ],
            "nama_pembina" => "required",
            "deskripsi" => "required"
        ]);

        ExtraCuricular::create($validate);


        return  redirect()->action([
            ExtraCuricularController::class,
            "index"
        ])->with("succes","berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $classExists = Student::where('extra_id', $id)->exists();

            if ($classExists) {
                return redirect('/dashboard/ekstrakurikuller')->with('error', 'Tidak dapat menghapus ekstrakurikuller yang memiliki siswa terkait.');
            }

            ExtraCuricular::destroy($id);


            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/dashboard/ekstrakurikuller')->with('error', 'Data gagal Di Hapus');
        }

        return redirect("/dashboard/ekstrakurikuller")->with('success', 'Data Berhasil Di Hapus');
    }
}
