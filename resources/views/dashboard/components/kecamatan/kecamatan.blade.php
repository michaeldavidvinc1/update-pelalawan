@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Kecamatan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Data Dasar</div>
            <div class="breadcrumb-item">Kecamatan</div>
        </div>
    </div>

    <div class="section-body">
        {{-- <h2 class="section-title">This is Example Page</h2>
        <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
        <div class="card">
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#info"
                            aria-expanded="true">
                            <h4>Kecamatan Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id_kecamatan" name="id_kecamatan">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Nama Kecamatan*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Laki - Laki*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="lakilaki" name="lakilaki">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Perempuan*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="perempuan" name="perempuan">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 "><strong>Rumah Tangga</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="rumah_tangga"
                                                name="rumah_tangga">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 "><strong>Luas Wilayah</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="luas_wilayah"
                                                name="luas_wilayah">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="inputEmail3"
                                            class="col-sm-3 col-form-label"><strong>Delete</strong></label>
                                        <div class="col-sm-9">
                                            <input class="form-check-input" type="checkbox" id="defunct_ind"
                                                name="defunct_ind" value="Y">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row d-flex justify-content-end">
                                <button class="btn btn-primary mr-2" onclick="query()" id="query">Query</button>
                                <button class="btn btn-success mr-2" onclick="add()" id="add">Add</button>
                                <button class="btn btn-info mr-2" onclick="update()" id="update">Update</button>
                                <button class="btn btn-dark" onclick="clear()" id="clear">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#list"
                            aria-expanded="true">
                            <h4>Kecamatan List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Laki - Laki</th>
                                        <th>Perempuan</th>
                                        <th>Total</th>
                                        <th>Rumah Tangga</th>
                                        <th>Luas Wilayah</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#importModal"
                                id="import">Import</button>
                            <a href="{{ route('kecamatan.export') }}" class="btn btn-primary mr-2"
                                id="export">Export</a>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Aw,
                                yeah!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Import --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    @include('global.jquery')
    <script>
        $(function() {

            $('#update').prop('disabled', true);
            $('#clear').click(function() {
                $('#id_kecamatan').val('');
                $('#kecamatan').val('');
                $('#lakilaki').val('');
                $('#perempuan').val('');
                $('#rumah_tangga').val('');
                $('#luas_wilayah').val('');
                document.getElementById("defunct_ind").checked = false;
                $('#update').prop('disabled', true);
                $('#add').prop('disabled', false);
            });
        });

        function query() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                searching: true,
                retrieve: true,
                ajax: "{{ route('kecamatan.index') }}",
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    if (aData.defunct_ind == "Y") {
                        $(nRow).addClass("table-danger");
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kecamatan',
                        name: 'kecamatan'
                    },
                    {
                        data: 'lakilaki',
                        name: 'lakilaki'
                    },
                    {
                        data: 'perempuan',
                        name: 'perempuan'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'rumah_tangga',
                        name: 'rumah_tangga'
                    },
                    {
                        data: 'luas_wilayah',
                        name: 'luas_wilayah'
                    },
                    {
                        data: function(data) {
                            if (data.defunct_ind == "Y") {
                                return '<i class="fas fa-check"></i>';
                            }
                            return '';
                        },
                        name: 'defunct_ind'
                    },
                ],
            });

            $('#table tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                    $('#id_kecamatan').val('');
                    $('#kecamatan').val('');
                    $('#lakilaki').val('');
                    $('#perempuan').val('');
                    $('#rumah_tangga').val('');
                    $('#luas_wilayah').val('');
                    document.getElementById("defunct_ind").checked = false;
                    $('#update').prop('disabled', true);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id_kecamatan').val(data[0].id_kecamatan);
                    $('#kecamatan').val(data[0].kecamatan);
                    $('#lakilaki').val(data[0].lakilaki);
                    $('#perempuan').val(data[0].perempuan);
                    $('#rumah_tangga').val(data[0].rumah_tangga);
                    $('#luas_wilayah').val(data[0].luas_wilayah);
                    if (data[0].defunct_ind == "Y") {
                        document.getElementById("defunct_ind").checked = true;
                    } else {
                        document.getElementById("defunct_ind").checked = false;
                    }
                    $('#add').prop('disabled', true);
                    $('#update').prop('disabled', false);
                }
            });
        }

        function add() {
            if ($("#kecamatan").val() === "" || $("#kecamatan").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Nama Kecamatan Cannot Be Null',
                    'error'
                );
            }
            if ($("#lakilaki").val() === "" || $("#lakilaki").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Laki - Laki Cannot Be Null',
                    'error'
                );
            }
            if ($("#perempuan").val() === "" || $("#perempuan").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Perempuan Cannot Be Null',
                    'error'
                );
            }
            var kecamatan = $("#kecamatan").val();
            var lakilaki = $("#lakilaki").val();
            var perempuan = $("#perempuan").val();
            var rumah_tangga = $("#rumah_tangga").val();
            var luas_wilayah = $("#luas_wilayah").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('kecamatan.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    kecamatan: kecamatan,
                    lakilaki: lakilaki,
                    perempuan: perempuan,
                    rumah_tangga: rumah_tangga,
                    luas_wilayah: luas_wilayah,
                    defunct_ind: defunct_ind
                },
                success: function(res, data) {
                    query();
                    var table = $('#table').DataTable();
                    table.ajax.reload();
                    Swal.fire(
                        'Success',
                        'Add Data Sukses',
                        'success'
                    );
                }
            });
        }

        function update() {
            var id_kecamatan = $("#id_kecamatan").val();
            var kecamatan = $("#kecamatan").val();
            var lakilaki = $("#lakilaki").val();
            var perempuan = $("#perempuan").val();
            var rumah_tangga = $("#rumah_tangga").val();
            var luas_wilayah = $("#luas_wilayah").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('kecamatan.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_kecamatan: id_kecamatan,
                    kecamatan: kecamatan,
                    lakilaki: lakilaki,
                    perempuan: perempuan,
                    rumah_tangga: rumah_tangga,
                    luas_wilayah: luas_wilayah,
                    defunct_ind: defunct_ind
                },
                success: function(res, data) {
                    var table = $('#table').DataTable();
                    table.ajax.reload();
                    Swal.fire(
                        'Success',
                        'Update Data Sukses',
                        'success'
                    );
                }
            });
        }
    </script>
@endsection
