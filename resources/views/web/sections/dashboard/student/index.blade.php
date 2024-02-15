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

            <a class="btn btn-primary mb-lg-3" href="/student/create" role="button">Tambah Data</a>


            <table class="table table-bordered" id="daterange_table">
                <thead>
                <tr class="table-dark">
                    <th>NIS</th>
                    {{--                <th>Tanggal Lahir</th>--}}
                    <th>Nama</th>
                    <th>User Input</th>
                    <th>Extra</th>
                    <th>Kelas</th>
                    <th>Action</th>
                    {{--                <th>alamat</th>--}}
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Student Detail</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nis:</label>
                                    <input disabled type="text" class="form-control" id="nis" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama:</label>
                                    <input disabled type="text" class="form-control" id="nama" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Tanggal Lahir:</label>
                                    <input disabled type="text" class="form-control" id="tanggal_lahir" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Alamat:</label>
                                    <input disabled type="text" class="form-control" id="alamat" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Kelas:</label>
                                    <input disabled type="text" class="form-control" id="kelas" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">User Input:</label>
                                    <input disabled type="text" class="form-control" id="user-input" value="">
                                </div>


                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Extra:</label>
                                    <input disabled type="text" class="form-control" id="extra" value="">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>

        $(document).on('click', '.halo', function() {
            // Ambil data siswa dari baris tabel yang sesuai
            let rowData = table.row($(this).parents('tr')).data();

            // Menetapkan nilai atribut 'value' pada input modal dengan nama siswa
            $('#nis').val(rowData.nis);
            $('#nama').val(rowData.nama);
            $('#tanggal_lahir').val(rowData.tanggal_lahir);
            $('#alamat').val(rowData.alamat);
            $('#kelas').val(rowData.kelas.nama_kelas);
            $('#user-input').val(rowData.user.name);
            $('#extra').val(rowData.extra.nama);

            // Memicu modal untuk ditampilkan
            $('#exampleModal').modal('show');
        });

        let table = $('#daterange_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/student",
                data: function (data) {
                }
            },
            columns: [

                {data: 'nis', name: 'nis'},
                {data: 'nama', name: 'nama'},

                {data: 'user.name', name: 'user.name'},
                {data: 'extra.nama', name: 'extra.nama'},
                {data: 'kelas.nama_kelas', name: 'kelas.nama_kelas'},

                {
                    // Kolom "Action" khusus
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function (data, type, full, meta) {

                        let actionHTML = '<form action="/student/' + data.id + '" method="POST" style="display:inline;">' +
                            '@csrf' +
                            '<input type="hidden" name="_method" value="DELETE">' +
                            '<button type="submit"  style="color: black" class="btn btn-link p-0" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">' +
                            '<i class="fas fa-trash icone"></i>' + // Menambahkan ikon font awesome trash
                            '</button>' +
                            '</form>';

                        let editLink = '<a href="/student/' + data.id + '/edit" class="btn btn-link p-0 "><button class="fa-solid fa-pen-to-square" style="color: black"></button></a>';

                        let detailLink = `<button class="fa-solid fa-circle-info halo"  style="color: black" data-bs-toggle="modal" data-bs-target="#exampleModal "></button>`;

                        return detailLink + '  |  ' + editLink + '  |  ' + actionHTML;
                    }
                }


            ],


        });

        // Menangani klik tombol detail

    </script>

@endsection
