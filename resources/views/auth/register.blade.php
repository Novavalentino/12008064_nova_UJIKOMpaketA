<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container"><br>
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><b>Daftar</b><br></h3>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('masyarakat.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Nik</label>
                    <input type="nik" name="nik" class="form-control" placeholder="Nik" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="nama" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="username" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="kelamin" id="kelamin" class="form-control" required>
                        <option value="pria"> Pria </option>
                        <option value="wanita"> Wanita </option>
                    </select>
                </div>
                <div class="form-group">
                    <label> Alamat </label>
                    <input type="text" name="alamat" placeholder="Isikan Alamatmu" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telephone</label>
                    <input type="number" name="telp" class="form-control" placeholder="Masukan Nomor Telephone" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                <hr>
                <p class="text-center">Sudah punya akun? <a href="#">Login</a> sekarang!</p>
            </form>
        </div>
    </div>
</body>
</html>