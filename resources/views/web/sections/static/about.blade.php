@extends("main")

@section("container")
    <div>
        <h1>{{$title}}</h1>
    </div>


    <div class="d-flex">

        <img class="rounded-circle"  src="img/user.jpg" width="150px" height="150px"/>

        <div class="d-flex align-items-center">

            <div>
                <p>Nama :  {{$nama}}</p>
                <p>Kelas :  {{$kelas}}</p>
            </div>

        </div>
    </div>





@endsection
