<?php
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$file_name = pathinfo($target_file);
if (isset($_POST["submit"])) {
    if ($imageFileType == "txt") {
        echo "File is an plain text - " . $file_name['basename'] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an plain text.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        $coba = fopen($target_file, 'r') or die("File can't opened");
        $baca = fread($coba, filesize($target_file));
        fclose($coba);
        echo $baca;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>