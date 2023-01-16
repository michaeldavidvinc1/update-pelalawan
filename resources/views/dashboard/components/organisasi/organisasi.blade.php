@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Organisasi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Data Master</div>
            <div class="breadcrumb-item">Organisasi</div>
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
                            <h4>Organisasi Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id_organisasi" name="id_organisasi">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Nama Organisasi*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name_organisasi"
                                                name="name_organisasi">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Jenis
                                                Organisasi*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_jenis" name="id_jenis">
                                                <option value="">Pilih Jenis Organisasi...</option>
                                                @foreach ($jenisOrganisasi as $data)
                                                    <option value="{{ $data->id_jenis }}">{{ $data->nama_organisasi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Kelompok*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="kelompok" name="kelompok">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Desa*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_desa" name="id_desa">
                                                <option value="">Pilih Desa...</option>
                                                @foreach ($desa as $data)
                                                    <option value="{{ $data->id_desa }}">{{ $data->desa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Kecamatan*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                                                <option value="">Pilih Kecamatan...</option>
                                                @foreach ($kecamatan as $data)
                                                    <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}
                                                    </option>
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
                            <h4>Organisasi List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Organisasi</th>
                                        <th>Jenis Organisasi</th>
                                        <th>Kelompok</th>
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
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
                $('#id_organisasi').val('');
                $('#name_organisasi').val('');
                $('#id_jenis').val('');
                $('#kelompok').val('');
                $('#id_desa').val('');
                $('#id_kecamatan').val('');
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
                ajax: "{{ route('organisasi.index') }}",
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
                        name: 'name_organisasi'
                    },
                    {
                        data: 'nama_organisasi',
                        name: 'id_jenis'
                    },
                    {
                        data: 'kelompok',
                        name: 'kelompok'
                    },
                    {
                        data: 'desa',
                        name: 'id_desa'
                    },
                    {
                        data: 'kecamatan',
                        name: 'id_kecamatan'
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
                    $('#id_organisasi').val('');
                    $('#name_organisasi').val('');
                    $('#id_jenis').val('');
                    $('#kelompok').val('');
                    $('#id_desa').val('');
                    $('#id_kecamatan').val('');
                    document.getElementById("defunct_ind").checked = false;
                    $('#update').prop('disabled', true);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id_organisasi').val(data[0].id_organisasi);
                    $('#name_organisasi').val(data[0].name_organisasi);
                    $('#id_jenis').val(data[0].id_jenis);
                    $('#kelompok').val(data[0].kelompok);
                    $('#id_desa').val(data[0].id_desa);
                    $('#id_kecamatan').val(data[0].id_kecamatan);
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
            if ($("#name_organisasi").val() === "" || $("#name_organisasi").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Name Organisasi Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_jenis").val() === "" || $("#id_jenis").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Jenis Organisasi Cannot Be Null',
                    'error'
                );
            }
            if ($("#kelompok").val() === "" || $("#kelompok").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Kelompok Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_desa").val() === "" || $("#id_desa").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Desa Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_kecamatan").val() === "" || $("#id_kecamatan").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Kecamatan Cannot Be Null',
                    'error'
                );
            }
            var name_organisasi = $("#name_organisasi").val();
            var id_jenis = $("#id_jenis").val();
            var kelompok = $("#kelompok").val();
            var id_desa = $("#id_desa").val();
            var id_kecamatan = $("#id_kecamatan").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('organisasi.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name_organisasi: name_organisasi,
                    id_jenis: id_jenis,
                    kelompok: kelompok,
                    id_desa: id_desa,
                    id_kecamatan: id_kecamatan,
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
            var id_organisasi = $("#id_organisasi").val();
            var name_organisasi = $("#name_organisasi").val();
            var id_jenis = $("#id_jenis").val();
            var kelompok = $("#kelompok").val();
            var id_desa = $("#id_desa").val();
            var id_kecamatan = $("#id_kecamatan").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('organisasi.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_organisasi: id_organisasi,
                    name_organisasi: name_organisasi,
                    id_jenis: id_jenis,
                    kelompok: kelompok,
                    id_desa: id_desa,
                    id_kecamatan: id_kecamatan,
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
