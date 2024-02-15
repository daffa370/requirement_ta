


@extends("web.sections.dashboard.components.main")
@section("container")


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4">

        <h1>
            {{$title}}</h1>


        <div class="row g-5 mt-lg-3">


            <form method="post" action="/dashboard/user" class="needs-validation d-flex" novalidate >

                @csrf

                <div class="col-md-10 col-lg-6">

                    <div class="col-md-10 col-lg-0">


                        <div class="row g-3">



                            <div class="col-sm-6">
                                <label for="zip" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" placeholder="Nama"
                                       value="{{old('name',)}}">
                                @error('name')

                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="zip" class="form-label">Role</label>

                                <select name="is_admin" id="is_admin" class="form-control @error('is_admin') is-invalid @enderror">
                                    <option value="">Choose Role</option>
                                    <option value="1" {{ old('is_admin') == true ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ old('is_admin') == false ? 'selected' : '' }}>Pengguna</option>
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
                                       value="{{old('email',)}}">
                                @error('email')

                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <div class="col-sm-6">
                                <label for="zip" class="form-label">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" placeholder="Password"
                                       value="{{old('password')}}">
                                @error('password')

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



