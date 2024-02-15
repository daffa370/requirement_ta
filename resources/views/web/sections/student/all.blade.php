@extends("main")
@section("container")
    <style>
        .icone {
            color: black;
        }
    </style>


    <div>



        <h1>{{$title }}</h1>




        <table class="table table-bordered" id="daterange_table">
            <thead>
            <tr class="table-dark">
                <th>NIS</th>
                {{--                <th>Tanggal Lahir</th>--}}
                <th>Nama</th>
                <th>User Input</th>
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

        let no = 0;
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
                {data: 'kelas.nama_kelas', name: 'kelas.nama_kelas'},

                {
                    // Kolom "Action" khusus
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function (data, type, full, meta) {

                        let detailLink = `<button class="fa-solid fa-circle-info halo"  style="color: black" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>`;

                        return detailLink ;
                    }
                }


            ],


        });


        console.log(document.querySelectorAll('.halo').length);


    </script>

@endsection
