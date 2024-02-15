<?php

namespace App\Http\Controllers;

use App\Models\ExtraCuricular;
use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function index()
    {
//

        if (request()->ajax()) {
            $data = Student::with('kelas')->with("user")->with("extra")->select("*");

            return DataTables::of($data)->addIndexColumn()->make(true);
        }

        if (\request()->is("student")) {


            return view('web.sections.student.all', [
                "title" => "Halaman Student",
            ]);
        } else {


            return view('web.sections.dashboard.student.index', [
                "title" => "Halaman Student",
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
        if(Kelas::all()->isEmpty() || ExtraCuricular::all()->isEmpty()){
            return redirect('/dashboard/student')->with('error', "Error tabel kelas atau extra tidak ada data");

        }else{
            return view('web.sections.student.create', [
                "kelas" => Kelas::all(),
                "extra" => ExtraCuricular::all(),
                "title" => "Halaman Create",
            ]);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $validate = $request->validate([

            'nis' => 'required|unique:students,nis|numeric',
            "nama" => "required",
            "kelas_id" => "required",
            "tanggal_lahir" => "required",
            "alamat" => "required",
            "user_id" => "nullable",
            "extra_id" => "required"
        ], [

            'nis.required' => 'nis Pendaftaran harus di isi.',
            'nis.unique' => 'nis Pendaftaran Sudah ada.',
            'nama.required' => 'nama Pendaftaran harus di isi.',
            'kelas_id.required' => 'kelas Pendaftaran harus di isi.',
            'tanggal_lahir.required' => 'tanggal lahir Pendaftaran harus di isi.',
            'alamat.required' => 'alamat Pendaftaran harus di isi.',
        ]);

        $validate["user_id"] = Auth::user()->id;

        Student::create($validate);

        return redirect('/dashboard/student')->with('succes', "anda berhasil menambahkan data");
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('web.sections.student.edit', [
            'student' => $student,
            "kelas" => Kelas::all(),

            "extra" => ExtraCuricular::all(),
            'title' => 'Halaman Edit'
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Student $student)
    {


        Student::where('id', $student->id)->update(request()->validate([

//            "nis" => "required",
            "nama" => "required",
            "kelas_id" => "required",
            "extra_id" => "required",
            "tanggal_lahir" => "required",
            "alamat" => "required",
        ]));

        return redirect("/dashboard/student");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Student $student)
    {
        $result = Student::destroy($student->id);

        if ($result) {

            return redirect('/dashboard/student')->with('succes', "anda berhasil menghapus  data");
        }

//        return redirect("/student");
    }
}
