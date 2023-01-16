@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Kartu Keluarga</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Data Master</div>
            <div class="breadcrumb-item">Kartu Keluarga</div>
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
                            <h4>Kartu Keluarga Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id_kartu_keluarga" name="id_kartu_keluarga">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>No KK*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="no_kk" name="no_kk">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Alamat KK*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="alamat_kk" name="alamat_kk">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>RT*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="rt_kk" name="rt_kk">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>RW*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="rw_kk" name="rw_kk">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Kodepos*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="kodepos_kk" name="kodepos_kk">
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
                            <h4>Kartu Keluarga List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No KK</th>
                                        <th>Alamat</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Kodepos</th>
                                        <th>Desa</th>
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
                $('#id_kartu_keluarga').val('');
                $('#no_kk').val('');
                $('#alamat_kk').val('');
                $('#rt_kk').val('');
                $('#rw_kk').val('');
                $('#kodepos_kk').val('');
                $('#id_desa').val('');
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
                ajax: "{{ route('kartuKeluarga.index') }}",
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
                        data: 'no_kk',
                        name: 'no_kk'
                    },
                    {
                        data: 'alamat_kk',
                        name: 'alamat_kk'
                    },
                    {
                        data: 'rt_kk',
                        name: 'rt_kk'
                    },
                    {
                        data: 'rw_kk',
                        name: 'rw_kk'
                    },
                    {
                        data: 'kodepos_kk',
                        name: 'kodepos_kk'
                    },
                    {
                        data: 'desa',
                        name: 'id_desa'
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
                    $('#id_kartu_keluarga').val('');
                    $('#no_kk').val('');
                    $('#alamat_kk').val('');
                    $('#rt_kk').val('');
                    $('#rw_kk').val('');
                    $('#kodepos_kk').val('');
                    $('#id_desa').val('');
                    document.getElementById("defunct_ind").checked = false;
                    $('#update').prop('disabled', true);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id_kartu_keluarga').val(data[0].id_kartu_keluarga);
                    $('#no_kk').val(data[0].no_kk);
                    $('#alamat_kk').val(data[0].alamat_kk);
                    $('#rt_kk').val(data[0].rt_kk);
                    $('#rw_kk').val(data[0].rw_kk);
                    $('#kodepos_kk').val(data[0].kodepos_kk);
                    $('#id_desakodepos_kk').val(data[0].id_desa);
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
            if ($("#no_kk").val() === "" || $("#no_kk").val() === null) {
                Swal.fire(
                    'Error',
                    'Field No KK Cannot Be Null',
                    'error'
                );
            }
            if ($("#alamat_kk").val() === "" || $("#alamat_kk").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Alamat Cannot Be Null',
                    'error'
                );
            }
            if ($("#rt_kk").val() === "" || $("#rt_kk").val() === null) {
                Swal.fire(
                    'Error',
                    'Field RT Cannot Be Null',
                    'error'
                );
            }
            if ($("#rw_kk").val() === "" || $("#rw_kk").val() === null) {
                Swal.fire(
                    'Error',
                    'Field RW Cannot Be Null',
                    'error'
                );
            }
            if ($("#kodepos_kk").val() === "" || $("#kodepos_kk").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Kodepos Cannot Be Null',
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
            var no_kk = $("#no_kk").val();
            var alamat_kk = $("#alamat_kk").val();
            var rt_kk = $("#rt_kk").val();
            var rw_kk = $("#rw_kk").val();
            var kodepos_kk = $("#kodepos_kk").val();
            var id_desa = $("#id_desa").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('kartuKeluarga.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    no_kk: no_kk,
                    alamat_kk: alamat_kk,
                    rt_kk: rt_kk,
                    rw_kk: rw_kk,
                    kodepos_kk: kodepos_kk,
                    id_desa: id_desa,
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
            var id_kartu_keluarga = $("#id_kartu_keluarga").val();
            var no_kk = $("#no_kk").val();
            var alamat_kk = $("#alamat_kk").val();
            var rt_kk = $("#rt_kk").val();
            var rw_kk = $("#rw_kk").val();
            var kodepos_kk = $("#kodepos_kk").val();
            var id_desa = $("#id_desa").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('kartuKeluarga.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_kartu_keluarga: id_kartu_keluarga,
                    no_kk: no_kk,
                    alamat_kk: alamat_kk,
                    rt_kk: rt_kk,
                    rw_kk: rw_kk,
                    kodepos_kk: kodepos_kk,
                    id_desa: id_desa,
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
