




@extends("layouts.main")
@section("container")


    <h1>
        {{$title}}</h1>
    <div class="container" >
        <main>
            <div class="container">
                <div class="row g-5 mt-lg-3">


                    <form method="get" action="/student/" class="needs-validation d-flex" novalidate >

                        <div class="col-md-10 col-lg-8">

                            <div class="col-md-10 col-lg-0">


                                <div class="row g-3">


                                    <div class="col-sm-6">
                                        <label for="zip" class="form-label">No</label>
                                        <input disabled type="text" class="form-control @error('id') is-invalid @enderror"
                                               id="id" name="id" placeholder="No"
                                               value="{{old('id',$student->id)}}">
                                        @error('id')

                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="zip" class="form-label">NIS</label>
                                        <input  disabled autofocus type="text" class="form-control @error('nis') is-invalid @enderror"
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
                                        <input  disabled type="text" class="form-control @error('nama') is-invalid @enderror"
                                               id="nama" name="nama" placeholder="nama"
                                               value="{{old('nama',$student->nama)}}">
                                        @error('nama')

                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>



                                    <div class="col-sm-6">
                                        <label for="zip" class="form-label">Kelas</label>
                                        <input disabled type="text" class="form-control @error('kelas') is-invalid @enderror"
                                               id="kelas" name="kelas" placeholder="kelas"
                                               value="{{old('kelas',$student->kelas)}}">
                                        @error('kelas')

                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="zip" class="form-label">Tanggal Lahir</label>
                                        <input disabled  type="date"
                                               class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                               id="tanggal_lahir" name="tanggal_lahir"

                                               value="{{old('tanggal_lahir',$student->tanggal_lahir)}}" >
                                        @error('tanggal_lahir')

                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="zip" class="form-label">Alamat</label>
                                        <input disabled type="text" class="form-control @error('alamat') is-invalid @enderror"
                                               id="alamat" name="alamat" placeholder="Alamat"
                                               value="{{old('alamat',$student->alamat)}}">
                                        @error('alamat')

                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>


                                    <hr class="my-4">

                                    <button class="w-100 btn btn-primary btn-lg" type="submit">Back</button>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>



    </div>





@endsection



