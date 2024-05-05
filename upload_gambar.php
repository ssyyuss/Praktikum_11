<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload file</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="tulis nim anda disini">
    <meta name="author" content="tulis nama anda disini">
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <p><label>Pilih Gambar yang akan diupload: </label><br>
    <input type="file" name="gambar" value="Pilih Gambar" id="gambar1"></p>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
$pesan = "";

$target_dir = "gambar/";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
        echo "File berupa citra/gambar - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["gambar"]["size"] > 500000) {
        echo "Sorry, file anda terlalu besar.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "*hanya file JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $pesan = "gagal upload.";
    } else {
        // proses upload file
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $pesan = "file ". htmlspecialchars(basename($_FILES["gambar"]["name"])). " berhasil Upload.";
        } else {
            $pesan = "error saat proses upload.";
        }
    }
}
?>
<?php if(!empty($pesan)): ?>
    <p><?php echo $pesan; ?></p>
<?php endif; ?>
</body>
</html>