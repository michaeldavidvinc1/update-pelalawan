@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Kondisi Aset Pertahun</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Data Dasar</div>
            <div class="breadcrumb-item">Kondisi Aset Pertahun</div>
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
                            <h4>Kondisi Aset Pertahun Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id_kondisi_aset" name="id_aset">
                                <div class="row mt-2">
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
                                            class="col-sm-3 col-form-label"><strong>Baik</strong></label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="form-check mr-3">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="baik"
                                                            id="baik" value="ya"> Ya </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="baik"
                                                            id="baik" value="tidak"> Tidak </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><strong>Rusak
                                                Ringan</strong></label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="form-check mr-3">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="rusak_ringan"
                                                            id="rusak_ringan" value="ya"> Ya </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="rusak_ringan"
                                                            id="rusak_ringan" value="tidak"> Tidak </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><strong>Rusak
                                                Berat</strong></label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="form-check mr-3">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="rusak_berat"
                                                            id="rusak_berat" value="ya"> Ya </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="rusak_berat"
                                                            id="rusak_berat" value="tidak"> Tidak </label>
                                                </div>
                                            </div>
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
                            <h4>Kondisi Aset Pertahun List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Baik</th>
                                        <th>Rusak Ringan</th>
                                        <th>Rusak Berat</th>
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
                $('#id_kondisi_aset').val('');
                $('#id_tahun').val('');
                $("input:radio").prop("checked", false);
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
                ajax: "{{ route('kondisiAset.index') }}",
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
                        data: 'tahun',
                        name: 'id_tahun'
                    },
                    {
                        data: function(data) {
                            if (data.baik == "ya") {
                                return '<i class="fas fa-check"></i>';
                            }
                            return '-';
                        },
                        name: 'baik'
                    },
                    {
                        data: function(data) {
                            if (data.rusak_ringan == "ya") {
                                return '<i class="fas fa-check"></i>';
                            }
                            return '-';
                        },
                        name: 'rusak_ringan'
                    },
                    {
                        data: function(data) {
                            if (data.rusak_berat == "ya") {
                                return '<i class="fas fa-check"></i>';
                            }
                            return '-';
                        },
                        name: 'rusak_berat'
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
                    $('#id_kondisi_aset').val('');
                    $('#id_tahun').val('');
                    $("input:radio").prop("checked", false);
                    document.getElementById("defunct_ind").checked = false;
                    $('#update').prop('disabled', true);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id_kondisi_aset').val(data[0].id_kondisi_aset);
                    $('#id_tahun').val(data[0].id_tahun);
                    $('input:radio[name=baik][value=' + data[0].baik + ']').prop('checked', true);
                    $('input:radio[name=rusak_ringan][value=' + data[0].rusak_ringan + ']').prop('checked', true);
                    $('input:radio[name=rusak_berat][value=' + data[0].rusak_berat + ']').prop('checked', true);
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
            if ($("#id_tahun").val() === "" || $("#id_tahun").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Tahun Cannot Be Null',
                    'error'
                );
            }
            if ($("#baik").val() === "" || $("#baik").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Baik Cannot Be Null',
                    'error'
                );
            }
            if ($("#rusak_ringan").val() === "" || $("#rusak_ringan").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Rusak Ringan Cannot Be Null',
                    'error'
                );
            }
            if ($("#rusak_berat").val() === "" || $("#rusak_berat").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Rusak Berat Cannot Be Null',
                    'error'
                );
            }
            var id_tahun = $("#id_tahun").val();
            var baik = $("#baik:checked").val();
            var rusak_ringan = $("#rusak_ringan:checked").val();
            var rusak_berat = $("#rusak_berat:checked").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('kondisiAset.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_tahun: id_tahun,
                    baik: baik,
                    rusak_ringan: rusak_ringan,
                    rusak_berat: rusak_berat,
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
            var id_kondisi_aset = $("#id_kondisi_aset").val();
            var id_tahun = $("#id_tahun").val();
            var baik = $("#baik:checked").val();
            var rusak_ringan = $("#rusak_ringan:checked").val();
            var rusak_berat = $("#rusak_berat:checked").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('kondisiAset.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_kondisi_aset: id_kondisi_aset,
                    id_tahun: id_tahun,
                    baik: baik,
                    rusak_ringan: rusak_ringan,
                    rusak_berat: rusak_berat,
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
