<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('assets/login_page/css/mycss.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Data Provinsi Plalawan | Login</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="/login" method="POST" class="sign-in-form">
                    @csrf
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" placeholder="Email" id="email" name="email"  required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" name="password" required/>
                    </div>
                    <div class="form-group mt-4 mb-4">
                        <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-info" class="reload" id="reload">
                                &#x21bb;
                            </button>
                        </div>
                    </div>
                    <div class="input-field">
                      <i class="bi bi-badge-cc-fill"></i>
                      <input type="text" placeholder="Enter Captcha" name="captcha" required/>
                  </div>
                    <button class="btn btn-primary" style="font-weight: bold">LOGIN</button>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <img src="assets/img/imglogin/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <img src="assets/img/imglogin/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="{{ url('assets/login_page/js/app.js') }}"></script>
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
</body>

</html>
