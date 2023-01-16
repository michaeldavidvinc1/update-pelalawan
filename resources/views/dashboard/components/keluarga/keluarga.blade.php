@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Keluarga</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Data Master</div>
            <div class="breadcrumb-item">Keluarga</div>
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
                            <h4>Keluarga Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id_keluarga" name="id_keluarga">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>NIK*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="nik" name="nik">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>No KK*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="no_kk" name="no_kk">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Nama*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama" name="nama">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Jenis Kelamin*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="">Pilih Jenis Kelamin...</option>
                                                <option value="lakilaki">Laki - Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Tempat Lahir*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="tempat_lahir"
                                                name="tempat_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Tanggal Lahir*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tanggal_lahir"
                                                name="tanggal_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Status Kawin*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_status_kawin" name="id_status_kawin">
                                                <option value="">Pilih Status kawin...</option>
                                                @foreach ($statusKawin as $data)
                                                    <option value="{{ $data->id_status_kawin }}">{{ $data->status_kawin }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Agama*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_agama" name="id_agama">
                                                <option value="">Pilih Agama...</option>
                                                @foreach ($agama as $data)
                                                    <option value="{{ $data->id_agama }}">{{ $data->agama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Status Dalam
                                                Keluarga*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_status_keluarga" name="id_status_keluarga">
                                                <option value="">Pilih Status Dalam Keluarga...</option>
                                                @foreach ($statusKeluarga as $data)
                                                    <option value="{{ $data->id_status_keluarga }}">{{ $data->status_keluarga }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Status
                                                Jamkesda*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="status_jamkesda"
                                                name="status_jamkesda">
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
                            <h4>Keluarga List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>No KK</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Status Kawin</th>
                                        <th>Agama</th>
                                        <th>Status Dalam Keluarga</th>
                                        <th>Status Jamkesda</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('global.jquery')
    <script>
        $(function() {

            $('#update').prop('disabled', true);
            $('#clear').click(function() {
                $('#id_keluarga').val('');
                $('#nin').val('');
                $('#no_kk').val('');
                $('#nama').val('');
                $('#jenis_kelamin').val('');
                $('#tempat_lahir').val('');
                $('#tanggal_lahir').val('');
                $('#id_status_kawin').val('');
                $('#id_agama').val('');
                $('#id_status_keluarga').val('');
                $('#status_jamkesda').val('');
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
                ajax: "{{ route('keluarga.index') }}",
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
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: function(data) {
                            if (data.jenis_kelamin == "lakilaki") {
                                return 'Laki - Laki';
                            } else if (data.jenis_kelamin == "perempuan") {
                                return 'Perempuan';
                            }
                            return '-';
                        },
                        name: 'defunct_ind'
                    },
                    {
                        data: 'tempat_lahir',
                        name: 'tempat_lahir'
                    },
                    {
                        data: 'tanggal_lahir',
                        name: 'tanggal_lahir'
                    },
                    {
                        data: 'status_kawin',
                        name: 'id_status_kawin'
                    },
                    {
                        data: 'agama',
                        name: 'id_agama'
                    },
                    {
                        data: 'status_keluarga',
                        name: 'id_status_keluarga'
                    },
                    {
                        data: 'status_jamkesda',
                        name: 'status_jamkesda'
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
                    $('#id_keluarga').val('');
                    $('#nin').val('');
                    $('#no_kk').val('');
                    $('#nama').val('');
                    $('#jenis_kelamin').val('');
                    $('#tempat_lahir').val('');
                    $('#tanggal_lahir').val('');
                    $('#id_status_kawin').val('');
                    $('#id_agama').val('');
                    $('#id_status_keluarga').val('');
                    $('#status_jamkesda').val('');
                    document.getElementById("defunct_ind").checked = false;
                    $('#update').prop('disabled', true);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id_keluarga').val(data[0].id_keluarga);
                    $('#nik').val(data[0].nik);
                    $('#no_kk').val(data[0].no_kk);
                    $('#nama').val(data[0].nama);
                    $('#jenis_kelamin').val(data[0].jenis_kelamin);
                    $('#tempat_lahir').val(data[0].tempat_lahir);
                    $('#tanggal_lahir').val(data[0].tanggal_lahir);
                    $('#id_status_kawin').val(data[0].id_status_kawin);
                    $('#id_agama').val(data[0].id_agama);
                    $('#id_status_keluarga').val(data[0].id_status_keluarga);
                    $('#status_jamkesda').val(data[0].status_jamkesda);
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
            if ($("#nik").val() === "" || $("#nik").val() === null) {
                Swal.fire(
                    'Error',
                    'Field NIK Cannot Be Null',
                    'error'
                );
            }
            if ($("#no_kk").val() === "" || $("#no_kk").val() === null) {
                Swal.fire(
                    'Error',
                    'Field No KK Cannot Be Null',
                    'error'
                );
            }
            if ($("#nama").val() === "" || $("#nama").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Nama Cannot Be Null',
                    'error'
                );
            }
            if ($("#jenis_kelamin").val() === "" || $("#jenis_kelamin").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Jenis Kelamin Cannot Be Null',
                    'error'
                );
            }
            if ($("#tempat_lahir").val() === "" || $("#tempat_lahir").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Tempat Lahir Cannot Be Null',
                    'error'
                );
            }
            if ($("#tanggal_lahir").val() === "" || $("#tanggal_lahir").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Tanggal Lahir Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_status_kawin").val() === "" || $("#id_status_kawin").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Status Kawin Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_agama").val() === "" || $("#id_agama").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Agama Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_status_keluarga").val() === "" || $("#id_status_keluarga").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Status Keluarga Cannot Be Null',
                    'error'
                );
            }
            if ($("#status_jamkesda").val() === "" || $("#status_jamkesda").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Status Jamkesda Cannot Be Null',
                    'error'
                );
            }
            var nik = $("#nik").val();
            var no_kk = $("#no_kk").val();
            var nama = $("#nama").val();
            var jenis_kelamin = $("#jenis_kelamin").val();
            var tempat_lahir = $("#tempat_lahir").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var id_status_kawin = $("#id_status_kawin").val();
            var id_agama = $("#id_agama").val();
            var id_status_keluarga = $("#id_status_keluarga").val();
            var status_jamkesda = $("#status_jamkesda").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('keluarga.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    nik: nik,
                    no_kk: no_kk,
                    nama: nama,
                    jenis_kelamin: jenis_kelamin,
                    tempat_lahir: tempat_lahir,
                    tanggal_lahir: tanggal_lahir,
                    id_status_kawin: id_status_kawin,
                    id_agama: id_agama,
                    id_status_keluarga: id_status_keluarga,
                    status_jamkesda: status_jamkesda,
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
            var id_keluarga = $("#id_keluarga").val();
            var nik = $("#nik").val();
            var no_kk = $("#no_kk").val();
            var nama = $("#nama").val();
            var jenis_kelamin = $("#jenis_kelamin").val();
            var tempat_lahir = $("#tempat_lahir").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var id_status_kawin = $("#id_status_kawin").val();
            var id_agama = $("#id_agama").val();
            var id_status_keluarga = $("#id_status_keluarga").val();
            var status_jamkesda = $("#status_jamkesda").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('keluarga.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_keluarga: id_keluarga,
                    nik: nik,
                    no_kk: no_kk,
                    nama: nama,
                    jenis_kelamin: jenis_kelamin,
                    tempat_lahir: tempat_lahir,
                    tanggal_lahir: tanggal_lahir,
                    id_status_kawin: id_status_kawin,
                    id_agama: id_agama,
                    id_status_keluarga: id_status_keluarga,
                    status_jamkesda: status_jamkesda,
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
