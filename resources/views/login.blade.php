<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | MyApp</title>
    <!-- Font kustom untuk template ini -->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Gaya kustom untuk template ini -->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="background-image: url('template/img/care.png'); background-size: cover; background-position: center;">
<div class="container">
        <div class="row justify-content-center mt-5 d-flex align-items-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto" style="background-color: rgba(255, 255, 255, 0.8); border-radius: 30px;">
                        <!-- Baris Bertingkat dalam Tubuh Kartu -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LOGIN TO HUMANCARE</h1>
                                    </div>
                                    <form class="user" action="{{ url('login/proses') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                        <label for="nik" style="color: #ee4061; font-size: 13px; margin-bottom: 1px;">Nomor Induk Kedudukan (NIK)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-user" id="nik" aria-describedby="emailHelp" placeholder="nik harus terdiri dari 5-16 angka" name="nik" autofocus required value="{{ old('nik') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="password" style="color: #ee4061; font-size: 13px; margin-bottom: 1px;">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa">&#xf023;</i></span>
                                                </div>
                                                <input type="password" class="form-control form-control-user" id="password" placeholder="password harus terdiri dari 5-16 karakter" name="password" required>
                                            </div>
                                            <br>
                                            <input type="submit" style="background-color: #ee4061;"class="btn btn-primary btn-user btn-block" name="login" value="LOGIN">
                                            <br>
                                            <a href="{{ route('register.request') }}" style="color:#ee4061;">Belum Punya Akun?</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="template/vendor/jquery/jquery.min.js"></script>
<script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert -->
<script src="template/js/sweetalert2@11.js"></script>
<!-- Plugin inti JavaScript -->
<script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Skrip kustom untuk semua halaman -->
<script src="template/js/sb-admin-2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('gagal'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Maaf nik atau Password anda tidak sesuai',
            footer: '<a href="{{ route('password.request') }}">Lupa Password?</a>'
        });
    </script>
    @endif
</script>
</body>
</html>
