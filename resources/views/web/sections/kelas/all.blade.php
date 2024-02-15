@extends("main")
@section("container")
    <style>
        .icone {
            color: black;
        }
    </style>

    @if(session()->has('succes'))
        <div class="alert  alert-success alert-dismissible" role="alert">
            <div> {{session('succes')}}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif
    <div>

        <h1>{{$title }}</h1>



        <table class="table table-bordered" id="daterange_table">
            <thead>
            <tr class="table-dark">
                <th>Kelas</th>

            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>



    <script>

        let no = 0;
        let table = $('#daterange_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/kelas",
                data: function (data) {
                }
            },
            columns: [

                {data: 'nama_kelas', name: 'nama_kelas'},



            ],


        });




    </script>

@endsection
