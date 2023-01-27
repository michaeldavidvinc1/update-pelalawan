@extends('dashboard.index')

@section('container')
    @include('sweetalert::alert')
    <div class="section-header d-flex justify-content-between">
        <h1>Reset Password</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard"><i class="fas fa-home"></i></a></div>
            <div class="breadcrumb-item">Authorization</div>
            <div class="breadcrumb-item">Reset Password</div>
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
                            <h4>Reset Password</h4>
                        </div>
                        <div class="accordion-body collapse show" id="info" data-parent="#accordion">
                            <form action="#">
                                @csrf
                                <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                <div class="row mt-2">
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>New Password*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label class="col-sm-3 " style="color:red"><strong>Confirm Password*</strong></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="confirm">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <button class="btn btn-info mr-2" onclick="update()" id="update">Reset Password</button>
                                <a class="btn btn-dark" href="/user">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('global.jquery')

    <script>
        function update() {
            var id = $("#id").val();
            var password = $("#password").val();
            var confirm = $("#confirm").val();
            if(password != confirm) {
                Swal.fire(
                    'Error',
                    'Password Tidak Sama!!!',
                    'error'
                );
            }
            $.ajax({
                type: 'POST',
                url: "{{ route('reset.update') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id : id,
                    password: password,
                },
                success: function(res, data) {
                    Swal.fire(
                        'Success',
                        'Update Data Sukses',
                        'success'
                    );
                    $("#password").val('');
                    $("#confirm").val('');
                }
            });
        }
    </script>
@endsection
