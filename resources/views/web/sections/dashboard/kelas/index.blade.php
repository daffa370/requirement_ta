@extends("web.sections.dashboard.components.main")

@section("container")






    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">



        <div>

            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{$title}}</h1>
            </div>


            @if(session()->has('succes'))
                <div class="alert  alert-success alert-dismissible" role="alert">
                    <div> {{session('succes')}}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert  alert-info alert-dismissible" role="alert">
                    <div> {{session('error')}}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            @endif

            <a class="btn btn-primary mb-lg-3" href="/kelas/create" role="button">Tambah Data</a>



            <table class="table table-bordered" id="daterange_table">
                <thead>
                <tr class="table-dark">
                    <th>Kelas</th>
                    <th>action</th>

                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </main>


    <script>

        let no = 0;
        let table = $('#daterange_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/dashboard/kelas",
                data: function (data) {
                }
            },
            columns: [

                {data: 'nama_kelas', name: 'nama_kelas'},
                // {data : 'tanggal_lahir', name : 'tanggal_lahir'},
                    {{--{data : 'nama', name : 'nama'},--}}
                    {{--{data : 'kelas', name : 'kelas'},--}}
                    {{--// {data : 'alamat', name : 'alamat'},--}}
                {
                    // Kolom "Action" khusus
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        // Di sini Anda dapat menambahkan tombol atau tautan aksi
                        // Contoh: tombol Edit dan Hapus


                        let actionHTML = '<form action="/kelas/' + data.id + '" method="POST" style="display:inline;">' +
                            '@csrf' +
                            '<input type="hidden" name="_method" value="DELETE">' +
                            '<button type="submit" class="btn btn-link p-0" style="color: black" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">' +
                            '<i class="fas fa-trash icone"></i>' + // Menambahkan ikon font awesome trash
                            '</button>' +
                            '</form>';

                        let editLink = '<a href="/dashboard/kelas/' + data.id + '/edit" class="btn btn-link p-0 "><button class="fa-solid fa-pen-to-square" style="color: black"></button></a>';


                        return editLink + '  |  ' + actionHTML;
                    }
                }


            ],


        });




    </script>

@endsection
