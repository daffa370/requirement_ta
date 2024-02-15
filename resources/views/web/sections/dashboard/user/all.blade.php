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
            <a class="btn btn-primary mb-lg-3" href="/dashboard/user/create" role="button">Tambah Data</a>


            <table class="table table-bordered" id="daterange_table">
                <thead>
                <tr class="table-dark">
                    <th>Name</th>
                    <th>role</th>
                    <th>Email</th>
                    <th>Action</th>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
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

    <script>

        let no = 0;
        let table = $('#daterange_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/dashboard/user",
                data: function (data) {
                }
            },
            columns: [

                {data: 'name', name: 'name'},
                {

                    data: 'is_admin',
                    searchable: false,
                    orderable: false,
                    render: function (data, type, full, meta) {

                        console.log(data)

                        if (data === 1) {

                            return "admin"
                        } else {
                            return "pengguna"
                        }
                    }
                },


                {data: 'email', name: 'email'},

                {
                    // Kolom "Action" khusus
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function (data, type, full, meta) {

                        let actionHTML = '<form action="/dashboard/user/' + data.id + '" method="POST" style="display:inline;">' +
                            '@csrf' +
                            '<input type="hidden" name="_method" value="DELETE">' +
                            '<button type="submit" style="color: black" class="btn btn-link p-0" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">' +
                            '<i class="fas fa-trash icone"></i>' + // Menambahkan ikon font awesome trash
                            '</button>' +
                            '</form>';

                        let editLink = '<a href="/dashboard/user/' + data.id + '/edit" class="btn btn-link p-0 "><button class="fa-solid fa-pen-to-square" style="color: black"></button></a>';


                        return editLink + '  |  ' + actionHTML;
                    }
                }


            ],


        });


        console.log(document.querySelectorAll('.halo').length);


    </script>

@endsection
