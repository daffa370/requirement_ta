<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            $data = User::where('email', '!=' , Auth::user()->email)->select("*");

            return DataTables::of($data)->addIndexColumn()->make(true);
        }


        return view('web.sections.dashboard.user.all', [
            "title" => "Halaman User",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.sections.dashboard.user.create', [

            "title" => "Halaman Create",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            "name" => "required",
            "email" => "required|email:dns|unique:users,email", // Tambahkan aturan 'unique'
            "password" => ["required"],
            "is_admin" => "required"
        ],

        [
            "email.unique" => "email sudah ada"
        ]
        );


//        return  $validate;


//        $validate["is_admin"] =  true;
        $validate["password"] = Hash::make($validate["password"]);

        User::create($validate);

        return redirect("/dashboard/user")->with("succes", "registration succesfull");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User  $user)
    {
        return view('web.sections.dashboard.user.edit', [

            "title" => "Halaman Edit",
            "user" => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function update(User $user)
    {

        User::where("id", $user->id)->update(\request()->validate(
            [
                "name" => "required",
                "email" => [
                    "required",
                    "email:dns",
                    Rule::unique('users', 'email')->ignore($user->id, 'id'),
                ],
                "is_admin" => "required"
            ]
        ));


        return redirect('/dashboard/user')->with('succes', "anda berhasil mengUpdate  data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {

        DB::beginTransaction();

        try {
            $userExists = Student::where('user_id', $user->id)->exists();

            if ($userExists) {
                return redirect('/dashboard/user')->with('error', 'Tidak dapat menghapus user yang memiliki siswa terkait.');
            }
            User::destroy($user->id);


            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/dashboard/user')->with('error', 'Data gagal Di Hapus');
        }



            return redirect('/dashboard/user')->with('succes', "anda berhasil menghapus  data");

    }
}
