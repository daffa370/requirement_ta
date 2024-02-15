@extends("main")
@section("container")
    <div>

        <h1>{{$title}}</h1>


        <table class="table table-bordered" id="daterange_table">
            <thead>
            <tr class="table-dark">
                <th>Nama</th>
                <th>Nama Pembina</th>
                <th>Deskripsi</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <script>

        let table = $('#daterange_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/extracuricular",
                data: function (data) {
                    console.log(data)
                }
            },
            columns: [
                {data: 'nama', name: 'nama'},
                {data: 'nama_pembina', name: 'nama_pembina'},
                {data: 'deskripsi', name: 'deskripsi'},
            ],

        });
    </script>

@endsection
