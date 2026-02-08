<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - nahdlatul wathan</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/pages/auth.css') }}">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        #auth {
            height: 100vh;
            overflow: hidden;
        }

        #auth #auth-left {
            padding: 2rem 5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
        }

        #auth #auth-right {
            background: url("{{ asset('landingpage/img/bg-nwbatam.jpg') }}") !important;
            background-size: cover !important;
            background-position: center !important;
            height: 100vh;
        }

        .auth-logo {
            margin-bottom: 2rem !important;
        }
    </style>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="{{ route('landingpage') }}"><img
                                src="{{ asset('dashboard/assets/images/logo/logo.png') }}" alt="Logo"
                                style="width: 50px; height: 50px;"></a>
                    </div>
                    <h2 class="">Log in.</h2>
                    <p class=" mb-5">Log in with your data that you entered during registration.</p>

                    <form action="{{ route('loginproses') }}" method="POST">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl"
                                placeholder="email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" id="password" class="form-control form-control-xl"
                                placeholder="Password">
                            <div class="form-control-icon" onclick="togglePasswordVisibility()">
                                <i id="togglePasswordIcon" class="bi bi-eye"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-4 fs-6">
                        <p class="text-gray-600 mb-1">Don't have an account? <a href="{{ route('register') }}"
                                class="font-bold">Sign up</a>.</p>
                        <p class="text-gray-600"><i class="fa-solid fa-arrow-left"></i> <a
                                href="{{ route('landingpage') }}" class="font-bold">kembali ke homepage</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>

    <script src="https://kit.fontawesome.com/63b8672806.js" crossorigin="anonymous"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const togglePasswordIcon = document.getElementById('togglePasswordIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePasswordIcon.classList.remove('bi-eye');
                togglePasswordIcon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                togglePasswordIcon.classList.remove('bi-eye-slash');
                togglePasswordIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>

</html>
