<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - nahdlatul wathan</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/pages/auth.css')}}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{asset('dashboard/assets/images/logo/logo.png')}}" alt="Logo" style="width: 50px; height: 50px;"></a>
                    </div>
                    <h2 class="">Register.</h2>
                    <p class=" mb-5">Log in with your data that you entered during registration.</p>

                    <form action="{{route('loginproses')}}" method="POST">
                      @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="name" class="form-control form-control-xl" placeholder="name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control form-control-xl" placeholder="email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="passowrd" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                       
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Register</button>
                    </form>
                    <div class="text-center mt-5 fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="{{route('login')}}" class="font-bold">Sign in</a>.</p>
                        <p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>