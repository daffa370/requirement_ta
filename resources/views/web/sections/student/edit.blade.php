
@extends("web.sections.dashboard.components.main")
@section("container")



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 my-4">


    <div class="row g-5 mt-lg-3">


        <form method="post" action="/student/{{$student->id}}" class="needs-validation d-flex" novalidate>
            @method('put')
            @csrf

            <div class="col-md-10 col-lg-8">

                <div class="col-md-10 col-lg-0">

                    <h1>
                        {{$title}}</h1>

                    <hr class="my-4">
                    <div class="row g-3">


                        <div class="col-sm-6">
                            <label for="zip" class="form-label">NIS</label>
                            <input disabled  autofocus type="text"
                                   class="form-control @error('nis') is-invalid @enderror"
                                   id="nis" name="nis" placeholder="nis"
                                   value="{{old('nis',$student->nis)}}">
                            @error('nis')

                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="col-sm-6">
                            <label for="zip" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                   id="nama" name="nama" placeholder="nama"
                                   value="{{old('nama',$student->nama)}}">
                            @error('nama')

                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="col-sm-6">
                            <label for="zip" class="form-label">Extra</label>
                            <select  class="form-control @error('extra_id') is-invalid @enderror"
                                     id="extra_id" name="extra_id"
                            >

                                @foreach ($extra as $ext)
                                    <option value="{{ $ext->id }}" {{ old('extra_id',$student->extra_id) == $ext->id ? 'selected' : '' }}>{{ $ext->nama }}</option>
                                @endforeach

                            </select>

                            @error('extra_id')

                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>

                        <div class="col-sm-6">
                            <label for="zip" class="form-label">Kelas</label>
                            <select type="text" class="form-control @error('kelas_id') is-invalid @enderror"
                                    id="kelas_id" name="kelas_id" >


                                @foreach($kelas as $kls)
                                    <option value="{{ $kls->id }}" {{ old('kelas_id',$student->kelas_id) == $kls->id ? 'selected' : '' }}>{{ $kls->nama_kelas }}</option>

                                @endforeach

                            </select>
                            @error('kelas_id')

                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label for="zip" class="form-label">Tanggal Lahir</label>
                            <input autofocus type="date"
                                   class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                   id="tanggal_lahir" name="tanggal_lahir"

                                   value="{{old('tanggal_lahir',$student->tanggal_lahir)}}">
                            @error('tanggal_lahir')

                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="zip" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                   id="alamat" name="alamat" placeholder="Alamat"
                                   value="{{old('alamat',$student->alamat)}}">
                            @error('alamat')

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



