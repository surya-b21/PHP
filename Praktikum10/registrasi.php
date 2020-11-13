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
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $password2 = $_POST['password'];
    $cekbox = $_POST['cekbox'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Praktikum10";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $salam = "";
    $nama2 = test_input($_POST['nama']);
    $email2 = test_input($_POST['email']);


    //validasi
    if ($nama == "") {
        header("location:index.php?nama=kosong");
    } else if (!preg_match("/^[a-zA-Z ]*$/", $nama2)) {
        header("location:index.php?nama=formatsalah");
    } else if ($email == "") {
        header("location:index.php?email=kosong");
    } else if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
        header("location:index.php?email=formatsalah");
    } else if ($id == "") {
        header("location:index.php?id=kosong");
    } else if ($password2 == "") {
        header("location:index.php?password=kosong");
    } else if ($cekbox != "1") {
        header("location:index.php?cekbox=0");
    } else {
        $input = "INSERT INTO pendaftar (Nama, Email, ID, Kata_Sandi) VALUES ('$nama','$email','$id','$password')";
        if (mysqli_query($conn, $input)) {
            $salam = "Data telah dimasukkan";
        } else {
            $salam = "Error: " . $input . "<br>" . mysqli_error($conn);
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="container p-3 my-3 bg-dark text-white">
                <h2 align="center"><?php echo $salam ?></h2>
            </div>
        </div>
        <div class="col-3"></div>
    </div>

</body>

</html>