@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Alat Kontrasepsi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Data Dasar</div>
            <div class="breadcrumb-item">Alat Kontrasepsi</div>
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
                            <h4>Alat Kontrasepsi Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id_kontrasepsi" name="id_kontrasepsi">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Nama Kontrasepsi*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_kontrasepsi" name="nama_kontrasepsi">
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
                            <h4>Alat Kontrasepsi List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kontrasepsi</th>
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
                $('#id_kontrasepsi').val('');
                $('#nama_kontrasepsi').val('');
                document.getElementById("defunct_ind").checked = false;
                $('#update').prop('disabled', true);
            });
        });

        function query() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                searching: true,
                retrieve: true,
                ajax: "{{ route('alatKontrasepsi.index') }}",
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
                        data: 'nama_kontrasepsi',
                        name: 'nama_kontrasepsi'
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
                    $('#id_kontrasepsi').val('');
                    $('#nama_kontrasepsi').val('');
                    document.getElementById("defunct_ind").checked = false;
                    $('#update').prop('disabled', true);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id_kontrasepsi').val(data[0].id_kontrasepsi);
                    $('#nama_kontrasepsi').val(data[0].nama_kontrasepsi);
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
            if ($("#nama_kontrasepsi").val() === "" || $("#nama_kontrasepsi").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Nama Kontrasepsi Cannot Be Null',
                    'error'
                );
            }
            var nama_kontrasepsi = $("#nama_kontrasepsi").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('alatKontrasepsi.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    nama_kontrasepsi: nama_kontrasepsi,
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
            var id_kontrasepsi = $("#id_kontrasepsi").val();
            var nama_kontrasepsi = $("#nama_kontrasepsi").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('alatKontrasepsi.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_kontrasepsi: id_kontrasepsi,
                    nama_kontrasepsi: nama_kontrasepsi,
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
