<!DOCTYPE html>
<html>

<head>
    <title>Regristasi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    $nameErr = $emailErr = $idErr = $passErr = $cekErr = "";
    if (!empty($_GET['nama'])) {
        if ($_GET['nama'] == "kosong") {
            $nameErr = "Nama Belum Di Masukkan !";
        } else if ($_GET['nama'] == "formatsalah") {
            $nameErr = "Hanya diperbolehkan huruf dan spasi";
        }
    }
    if (isset($_GET['email'])) {
        if ($_GET['email'] == "kosong") {
            $emailErr = "E-mail Belum Di Masukkan !";
        } else if ($_GET['email'] == "formatsalah") {
            $emailErr = "Format E-mail Salah";
        }
    }
    if (isset($_GET['id'])) {
        if ($_GET['id'] == "kosong") {
            $idErr = "ID Belum Di Masukkan !";
        }
    }
    if (isset($_GET['password'])) {
        if ($_GET['password'] == "kosong") {
            $passErr = "Password Belum Di Masukkan !";
        }
    }
    if (isset($_GET['cekbox'])) {
        if ($_GET['cekbox'] == "0") {
            $cekErr = "Silahkan isi ceklis !";
        }
    }

    ?>
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <div class="container p-3 my-3 border">
                <h2 align="center">Regristasi Akun Mijoyo</h2>
                <form method="POST" action="registrasi.php">
                    <div class="form-group">
                        <label for="usr">Nama:</label> <span style="color: red;"><?php echo $nameErr; ?></span>
                        <input type="text" class="form-control" id="usr" name="nama">
                        <label for="usr">Email:</label> <span style="color: red;"><?php echo $emailErr; ?></span>
                        <input type="text" class="form-control" id="usr" name="email">
                        <label for="usr">ID:</label> <span style="color: red;"><?php echo $idErr; ?></span>
                        <input type="text" class="form-control" id="usr" name="id">
                        <label for="usr">Password:</label> <span style="color: red;"><?php echo $passErr; ?></span>
                        <input type="password" class="form-control" id="usr" name="password">
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <span style="color: red;"><?php echo $cekErr; ?></span>
                            <input type="checkbox" class="form-check-input" name="cekbox" value="1">Dengan ceklis ini, anda telah memasukan data dengan benar
                        </label>
                    </div>
                    <div style="text-align: center;">
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col"></div>
    </div>

</body>

</html>