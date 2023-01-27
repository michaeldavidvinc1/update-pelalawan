@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Auth</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Authorization</div>
            <div class="breadcrumb-item">Auth</div>
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
                            <h4>Auth Info</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id" name="id">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Nama*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Role*</strong></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="role" name="role">
                                                <option value="">Pilih Role...</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Email*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Password*</strong></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="password" class="form-control pwstrength"
                                                    data-indicator="pwindicator" id="password" name="password">
                                                <div class="input-group-prepend" onclick="showPassword()">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-eye-slash" id="check"></i>
                                                    </div>
                                                </div>
                                            </div>
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
                            <h4>Auth List</h4>
                        </div>
                        <div class="accordion-body collapse show mb-2" id="list" data-parent="#accordion">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Action</th>
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
                $('#id').val('');
                $('#name').val('');
                $('#role').val('');
                $('#email').val('');
                $('#update').prop('disabled', true);
                $('#add').prop('disabled', false);
                $('#password').prop('disabled', false);
            });
        });

        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                $('#icon').addClass("fas fa-eye");
            } else {
                x.type = "password";
                $('#icon').removeClass("fas fa-eye");
            }
        }

        function query() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                searching: true,
                retrieve: true,
                ajax: "{{ route('user.index') }}",
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            $('#table tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                    $('#id').val('');
                    $('#name').val('');
                    $('#role').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#update').prop('disabled', true);
                    $('#password').prop('disabled', false);
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var data = $('#table').DataTable().rows(this).data();
                    $('#id').val(data[0].id);
                    $('#name').val(data[0].name);
                    $('#role').val(data[0].role);
                    $('#email').val(data[0].email);
                    $('#password').val(data[0].password);
                    $('#add').prop('disabled', true);
                    $('#update').prop('disabled', false);
                    $('#password').prop('disabled', true);
                }
            });
        }

        function add() {
            if ($("#name").val() === "" || $("#name").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Nama Cannot Be Null',
                    'error'
                );
            }
            if ($("#role").val() === "" || $("#role").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Role Cannot Be Null',
                    'error'
                );
            }
            if ($("#email").val() === "" || $("#email").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Email Cannot Be Null',
                    'error'
                );
            }
            if ($("#password").val() === "" || $("#password").val() === null) {
                Swal.fire(
                    'Error',
                    'Field Password Cannot Be Null',
                    'error'
                );
            }
            var name = $("#name").val();
            var role = $("#role").val();
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajax({
                type: 'POST',
                url: "{{ route('user.add') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    role: role,
                    email: email,
                    password: password,
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
            var id = $("#id").val();
            var name = $("#name").val();
            var role = $("#role").val();
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajax({
                type: 'POST',
                url: "{{ route('user.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    name: name,
                    role: role,
                    email: email,
                    password: password,
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
