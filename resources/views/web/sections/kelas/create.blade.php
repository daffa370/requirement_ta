@extends("web.sections.dashboard.components.main")
@section("container")




    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="row g-5 mt-lg-3">


            <form method="post" action="/kelas" class="needs-validation d-flex" novalidate>

                @csrf

                <div class="col-md-10 col-lg-8">

                    <div class="col-md-10 col-lg-0">

                        <h1>
                            {{$title}}</h1>
                        <hr class="my-4">

                        <div class="row g-3">


                            <div class="col-sm-6">
                                <label for="zip" class="form-label">Kelas</label>
                                <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
                                       id="nama_kelas" name="nama_kelas" placeholder="kelas"
                                       value="{{old('nama_kelas',)}}">
                                @error('nama_kelas')

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



