@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Tahun Aset</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Data Master</div>
            <div class="breadcrumb-item">Tahun Aset</div>
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
                            <h4>Tahun Aset Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id_tahun_aset" name="id_tahun_aset">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Organisasi*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_organisasi" name="id_organisasi">
                                                <option value="">Pilih Organisasi...</option>
                                                @foreach ($organisasi as $data)
                                                    <option value="{{ $data->id_organisasi }}">{{ $data->name_organisasi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Jenis Aset*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_jenis_aset" name="id_jenis_aset">
                                                <option value="">Pilih Jenis Aset...</option>
                                                @foreach ($jenisAset as $data)
                                                    <option value="{{ $data->id_jenis_aset }}">{{ $data->nama_aset }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Tahun*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_tahun" name="id_tahun">
                                                <option value="">Pilih Tahun...</option>
                                                @foreach ($tahun as $data)
                                                    <option value="{{ $data->id_tahun }}">{{ $data->tahun }}</option>
                                                @endforeach
                                            </select>
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
                            <h4>Tahun Aset List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Organisasi</th>
                                        <th>Jenis Aset</th>
                                        <th>Tahun</th>
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
                $('#id_tahun_aset').val('');
                $('#id_organisasi').val('');
                $('#id_jenis_aset').val('');
                $('#id_tahun').val('');
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
                ajax: "{{ route('tahunAset.index') }}",
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
                        data: 'name_organisasi',
                        name: 'id_organisasi'
                    },
                    {
                        data: 'nama_aset',
                        name: 'id_jenis_aset'
                    },
                    {
                        data: 'tahun',
                        name: 'id_tahun'
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
                    $('#id_tahun_aset').val('');
                    $('#id_organisasi').val('');
                    $('#id_jenis_aset').val('');
                    $('#id_tahun').val('');
                    document.getElementById("defunct_ind").checked = false;
                    $('#update').prop('disabled', true);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id_tahun_aset').val(data[0].id_tahun_aset);
                    $('#id_organisasi').val(data[0].id_organisasi);
                    $('#id_jenis_aset').val(data[0].id_jenis_aset);
                    $('#id_tahun').val(data[0].id_tahun);
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
            if ($("#id_organisasi").val() === "" || $("#id_organisasi").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Organisasi Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_jenis_aset").val() === "" || $("#id_jenis_aset").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Jenis Aset Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_tahun").val() === "" || $("#id_tahun").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Tahun Cannot Be Null',
                    'error'
                );
            }
            var id_organisasi = $("#id_organisasi").val();
            var id_jenis_aset = $("#id_jenis_aset").val();
            var id_tahun = $("#id_tahun").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('tahunAset.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_organisasi: id_organisasi,
                    id_jenis_aset: id_jenis_aset,
                    id_tahun: id_tahun,
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
            var id_tahun_aset = $("#id_tahun_aset").val();
            var id_organisasi = $("#id_organisasi").val();
            var id_jenis_aset = $("#id_jenis_aset").val();
            var id_tahun = $("#id_tahun").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('tahunAset.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_tahun_aset: id_tahun_aset,
                    id_organisasi: id_organisasi,
                    id_jenis_aset: id_jenis_aset,
                    id_tahun: id_tahun,
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
