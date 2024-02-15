@extends("web.sections.dashboard.components.main")
@section("container")




    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="row g-5 mt-lg-3">


            <form method="post" action="/dashboard/ekstrakurikuller/{{$ekstra->id}}" class="needs-validation d-flex" novalidate>

                @method('put')
                @csrf

                <div class="col-md-10 col-lg-8">

                    <div class="col-md-10 col-lg-0">

                        <h1>
                            {{$title}}</h1>
                        <hr class="my-4">

                        <div class="row g-3">


                            <div class="col-sm-6">
                                <label for="zip" class="form-label">Nama Ekstra</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                       id="nama" name="nama" placeholder="Nama Ekstra"
                                       value="{{old('nama',$ekstra->nama)}}">
                                @error('nama')

                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="zip" class="form-label">Nama Pembina</label>
                                <input type="text" class="form-control @error('nama_pembina') is-invalid @enderror"
                                       id="nama_pembina" name="nama_pembina" placeholder="Nama Pembina"
                                       value="{{old('nama_pembina',$ekstra->nama_pembina)}}">
                                @error('nama_pembina')

                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="zip" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                       id="deskripsi" name="deskripsi" placeholder="Deskripsi"
                                       value="{{old('deskripsi',$ekstra->deskripsi)}}">
                                @error('deskripsi')

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



