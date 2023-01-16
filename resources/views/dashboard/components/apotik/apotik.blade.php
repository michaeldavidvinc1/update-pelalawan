@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Apotik</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Data Dasar</div>
            <div class="breadcrumb-item">Apotik</div>
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
                            <h4>Apotik Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id_apotik" name="id_apotik">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Apotik*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name_apotik" name="name_apotik">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Bidang Usaha*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="bidang_usaha" name="bidang_usaha">
                                                <option value="">Pilih Bidang Usaha...</option>
                                                <option value="apotik">Apotik</option>
                                                <option value="toko_obat">Toko Obat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Alamat*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="alamat_apotik" name="alamat_apotik">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Apoteker*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="apoteker" name="apoteker">
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
                            <h4>Apotik List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Apotik</th>
                                        <th>Alamat</th>
                                        <th>Bidang Usaha</th>
                                        <th>Apoteker</th>
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
                $('#id_apotik').val('');
                $('#name_apotik').val('');
                $('#bidang_usaha').val('');
                $('#alamat_apotik').val('');
                $('#apoteker').val('');
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
                ajax: "{{ route('apotik.index') }}",
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
                        data: 'name_apotik',
                        name: 'name_apotik'
                    },
                    {
                        data: 'alamat_apotik',
                        name: 'alamat_apotik'
                    },
                    {
                        data: function(data) {
                            if (data.bidang_usaha == "apotik") {
                                return 'Apotik';
                            } else if (data.bidang_usaha == "toko_obat") {
                                return 'Toko Obat';
                            } return '-';
                        },
                        name: 'bidang_usaha'
                    },
                    {
                        data: 'apoteker',
                        name: 'apoteker'
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
                    $('#id_apotik').val('');
                    $('#name_apotik').val('');
                    $('#bidang_usaha').val('');
                    $('#alamat_apotik').val('');
                    $('#apoteker').val('');
                    document.getElementById("defunct_ind").checked = false;
                    $('#update').prop('disabled', true);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id_apotik').val(data[0].id_apotik);
                    $('#name_apotik').val(data[0].name_apotik);
                    $('#bidang_usaha').val(data[0].bidang_usaha);
                    $('#alamat_apotik').val(data[0].alamat_apotik);
                    $('#apoteker').val(data[0].apoteker);
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
            if ($("#name_apotik").val() === "" || $("#name_apotik").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Name Apotik Cannot Be Null',
                    'error'
                );
            }
            if ($("#bidang_usaha").val() === "" || $("#bidang_usaha").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Bidang Usaha Cannot Be Null',
                    'error'
                );
            }
            if ($("#alamat_apotik").val() === "" || $("#alamat_apotik").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Alamat Apotik Cannot Be Null',
                    'error'
                );
            }
            if ($("#apoteker").val() === "" || $("#apoteker").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Apoteker Cannot Be Null',
                    'error'
                );
            }
            var name_apotik = $("#name_apotik").val();
            var bidang_usaha = $("#bidang_usaha").val();
            var alamat_apotik = $("#alamat_apotik").val();
            var apoteker = $("#apoteker").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('apotik.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name_apotik: name_apotik,
                    bidang_usaha: bidang_usaha,
                    alamat_apotik: alamat_apotik,
                    apoteker: apoteker,
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
            var id_apotik = $("#id_apotik").val();
            var name_apotik = $("#name_apotik").val();
            var bidang_usaha = $("#bidang_usaha").val();
            var alamat_apotik = $("#alamat_apotik").val();
            var apoteker = $("#apoteker").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('apotik.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_apotik: id_apotik,
                    name_apotik: name_apotik,
                    bidang_usaha: bidang_usaha,
                    alamat_apotik: alamat_apotik,
                    apoteker: apoteker,
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
