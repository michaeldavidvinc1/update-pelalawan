@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>ASN</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Data Dasar</div>
            <div class="breadcrumb-item">ASN</div>
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
                            <h4>ASN Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id_asn" name="id_asn">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>NIP*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="nip" name="nip">
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
                                        <label class="col-sm-3 " style="color:red"><strong>Pendidikan
                                                Terakhir*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pendidikan_terakhir"
                                                name="pendidikan_terakhir">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Bidang Ilmu*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_bidang_ilmu" name="id_bidang_ilmu">
                                                <option value="">Pilih Bidang Ilmu...</option>
                                                @foreach ($bidangIlmu as $data)
                                                    <option value="{{ $data->id_bidang_ilmu }}">{{ $data->bidang_ilmu }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                            <h4>ASN List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Bidang Ilmu</th>
                                        <th>Organisasi</th>
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
                $('#id_asn').val('');
                $('#nip').val('');
                $('#nama').val('');
                $('#jenis_kelamin').val('');
                $('#tempat_lahir').val('');
                $('#tanggal_lahir').val('');
                $('#pendidikan_terakhir').val('');
                $('#id_bidang_ilmu').val('');
                $('#id_organisasi').val('');
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
                ajax: "{{ route('asn.index') }}",
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
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
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
                        data: 'pendidikan_terakhir',
                        name: 'pendidikan_terakhir'
                    },
                    {
                        data: 'bidang_ilmu',
                        name: 'id_bidang_ilmu'
                    },
                    {
                        data: 'name_organisasi',
                        name: 'id_organisasi'
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
                    $('#id_asn').val('');
                    $('#nip').val('');
                    $('#nama').val('');
                    $('#jenis_kelamin').val('');
                    $('#tempat_lahir').val('');
                    $('#tanggal_lahir').val('');
                    $('#pendidikan_terakhir').val('');
                    $('#id_bidang_ilmu').val('');
                    $('#id_organisasi').val('');
                    document.getElementById("defunct_ind").checked = false;
                    $('#update').prop('disabled', true);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id_asn').val(data[0].id_asn);
                    $('#nip').val(data[0].nip);
                    $('#nama').val(data[0].nama);
                    $('#jenis_kelamin').val(data[0].jenis_kelamin);
                    $('#tempat_lahir').val(data[0].tempat_lahir);
                    $('#tanggal_lahir').val(data[0].tanggal_lahir);
                    $('#pendidikan_terakhir').val(data[0].pendidikan_terakhir);
                    $('#id_bidang_ilmu').val(data[0].id_bidang_ilmu);
                    $('#id_organisasi').val(data[0].id_organisasi);
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
            if ($("#nip").val() === "" || $("#nip").val() === null) {
                Swal.fire(
                    'Error',
                    'Field NIP Cannot Be Null',
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
            if ($("#pendidikan_terakhir").val() === "" || $("#pendidikan_terakhir").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Pendidikan Terakhir Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_bidang_ilmu").val() === "" || $("#id_bidang_ilmu").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Bidang Ilmu Cannot Be Null',
                    'error'
                );
            }
            if ($("#id_organisasi").val() === "" || $("#id_organisasi").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Organisasi Cannot Be Null',
                    'error'
                );
            }
            var nip = $("#nip").val();
            var nama = $("#nama").val();
            var jenis_kelamin = $("#jenis_kelamin").val();
            var tempat_lahir = $("#tempat_lahir").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var pendidikan_terakhir = $("#pendidikan_terakhir").val();
            var id_bidang_ilmu = $("#id_bidang_ilmu").val();
            var id_organisasi = $("#id_organisasi").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('asn.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    nip: nip,
                    nama: nama,
                    jenis_kelamin: jenis_kelamin,
                    tempat_lahir: tempat_lahir,
                    tanggal_lahir: tanggal_lahir,
                    pendidikan_terakhir: pendidikan_terakhir,
                    id_bidang_ilmu: id_bidang_ilmu,
                    id_organisasi: id_organisasi,
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
            var id_asn = $("#id_asn").val();
            var nip = $("#nip").val();
            var nama = $("#nama").val();
            var jenis_kelamin = $("#jenis_kelamin").val();
            var tempat_lahir = $("#tempat_lahir").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var pendidikan_terakhir = $("#pendidikan_terakhir").val();
            var id_bidang_ilmu = $("#id_bidang_ilmu").val();
            var id_organisasi = $("#id_organisasi").val();
            var defunct_ind = $("#defunct_ind").prop("checked") ? "Y" : "N"
            $.ajax({
                type: 'POST',
                url: "{{ route('asn.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id_asn: id_asn,
                    nip: nip,
                    nama: nama,
                    jenis_kelamin: jenis_kelamin,
                    tempat_lahir: tempat_lahir,
                    tanggal_lahir: tanggal_lahir,
                    pendidikan_terakhir: pendidikan_terakhir,
                    id_bidang_ilmu: id_bidang_ilmu,
                    id_organisasi: id_organisasi,
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
