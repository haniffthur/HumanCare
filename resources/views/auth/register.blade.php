<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/template/img/care.png');
            background-size: cover;
            background-position: center;
            padding: 50px;
            height: 100vh; /* Menambahkan tinggi 100% untuk memastikan kontainer mencakup seluruh tinggi layar */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            max-width: 600px;
            margin: auto; /* Untuk mengatur margin ke "auto" memastikan posisi di tengah horizontal */
            margin-top: 50px; /* Jarak dari atas - sesuaikan sesuai kebutuhan Anda */
            background-color: #fff;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Menambahkan properti posisi */
        }

        .text-center h1 {
            font-weight: normal; /* Mengatur teks tidak tebal */
        }

        .btn-register {
            width: 30%;
        }

        .register {
            display: flex;
            justify-content: space-between; /* Mengatur ruang di antara tombol menjadi sama */
            align-items: center;
        }

        .form-group {
            border-radius: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto" style="background-color: rgba(255, 255, 255, 0.8); border-radius: 30px;">
                    <div class="text-center">
                        <h1  class="h5 text-gray-900 mb-4" >REGISTER </h1>
                    </div>
                    <form method="POST" action="{{ route('Register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username" style="color: #ee4061; font-size: 14px; margin-bottom: 1px;">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="nik" style="color: #ee4061; font-size: 14px; margin-bottom: 1px;">Nomor Induk Kedudukan(NIK)</label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>
                        <div class="form-group">
                            <label for="email" style="color: #ee4061; font-size: 14px; margin-bottom: 1px;">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@gmail.com" title="Please enter a valid Gmail address">
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: #ee4061; font-size: 14px; margin-bottom: 1px;">Password Baru</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" style="color: #ee4061; font-size: 14px; margin-bottom: 1px;">Konfirmasi Password Baru</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="register">
                        <button type="button" style="background-color: #ee4061;" class="btn btn-secondary" onclick="window.location.href='/login'">back</button>
                            <button type="submit" style="background-color: #ee4061;" class="btn btn-primary btn-register">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, if you need it) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
