<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <?php
    error_reporting (E_ALL ^ E_NOTICE);
    
    for ($i=0; $i<2; $i++) {
        for ($j=0; $j<3; $j++) {
            $peminjaman[$i][$j]="";
        }
    }

    $err = "";
    $congrats = "";
    $denda = "";
    $peminjaman = array(
        array($_POST['tanggalpinjam'], $_POST['bulanpinjam']),
        array($_POST['tanggalkembali'], $_POST['bulankembali'])
    );

    for ($i = 0; $i < count($peminjaman); $i++) {
        for ($j = 0; $j < count($peminjaman[0]); $j++) {
            if (empty($peminjaman[$i][$j])) {
                $err = "Silahkan isi data secara lengkap dan benar";
            }
            if (!is_numeric($peminjaman[$i][$j])) {
                $err = "Silahkan isi data dengan angka";
            }
        }
    }
    if ($peminjaman[0][1] == $peminjaman [1][1]) {
        if ($peminjaman[0][0] == $peminjaman [0][0] && $peminjaman[0][0] == 0) {
            $err = "Silahkan isi data secara lengkap dan benar";
        } else if ($peminjaman[1][0] <= ($peminjaman[0][0]+3) && $peminjaman[1][0] >= $peminjaman[0][0]) {
            $congrats = "Terimakasih telah mengembalikan buku dengan tepat waktu";
        } else if (($peminjaman[0][0]+3)<$peminjaman[1][0]) {
            $denda = "Total denda anda Rp.".dendaperhari($peminjaman[0][0]+3,$peminjaman[1][0]);
        } else {
            $err = "Silahkan isi data secara lengkap dan benar";
        }
    } else if ($peminjaman[0][1]!=$peminjaman[1][1]) {
           $denda = "Total denda anda Rp. ".dendabulan($peminjaman[1][0],$peminjaman[0][1],$peminjaman[1][1]);
    }
    function dendaperhari($tanggalmulai,$tanggalakhir) {
        $selisihtanggal = $tanggalakhir-$tanggalmulai;
        $totaldenda = 2000*$selisihtanggal;
        return $totaldenda;
    }
    function dendabulan($tanggalakhir,$bulanmulai,$bulanakhir) {
        $selisihhari = 30-$tanggalakhir;
        $selisihbulan = $bulanakhir-$bulanmulai;
        $totaldenda = 2000*(($selisihbulan*30)+$selisihhari);
        return $totaldenda;

    }
    ?>
    <div class="container-xl pt-3 ">
        <h1 align="center">Pengembalian buku</h1>
        <div class="row">
            <div class="col-xl pt-3 border">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h6 align="center">Masukkan tanggal peminjaman</h6> <br>
                    <div style="text-align: center;">
                        <span class="error"> <?php echo $err; ?></span><br>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Tanggal" name="tanggalpinjam" maxlength="2">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="sel1" name="bulanpinjam">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col"></div>
                    </div>
                    <br>
                    <h6 align="center">Masukkan tanggal pengembalian</h6> <br>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Tanggal" name="tanggalkembali" maxlength="2">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="sel1" name="bulankembali">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col"></div>
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary mb-2" value="kirim">Submit</button>
                    </div>
                    <h4 align="center"><?php echo $congrats?></h4>
                    <h4 align="center"><?php echo $denda?></h4>
                </form>
            </div>
        </div>
    </div>
</body>

</html>