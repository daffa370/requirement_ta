



@extends("web.sections.dashboard.components.main")
    @section("container")


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4">


            <div class="row g-5 mt-lg-3">


                <form method="post" action="/dashboard/user/{{$user->id}}" class="needs-validation d-flex" novalidate >
                    @method('put')
                    @csrf

                    <div class="col-md-10 col-lg-8">

                        <div class="col-md-10 col-lg-0">

                            <h1>
                                {{$title}}</h1>


                            <hr class="my-4">
                            <div class="row g-3">



                                <div class="col-sm-6">
                                    <label for="zip" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" placeholder="Nama"
                                           value="{{old('name',$user->name)}}">
                                    @error('name')

                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="zip" class="form-label">Role</label>

                                    <select name="is_admin" id="is_admin" class="form-control @error('is_admin') is-invalid @enderror">

                                        <option value="1" @if(old('role', $user->role_id) == 1) selected @endif>Admin</option>
                                        <option value="2" @if(old('role', $user->role_id) == 2) selected @endif>Pengguna</option>

                                    </select>

                                    @error('is_admin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror



                                </div>

                                <div class="col-sm-6">
                                    <label for="zip" class="form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" placeholder="Email"
                                           value="{{old('email',$user->email)}}">
                                    @error('email')

                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>







                                <hr class="my-4">

                                <button class="w-100 btn btn-primary btn-lg" type="submit">Simpan</button>

                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </main>



    @endsection



