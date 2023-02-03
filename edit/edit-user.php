<?php

include '../koneksi.php';
$db = new Koneksi();
$conn = $db->getConnection();

// Kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: ../user.php');
}

// Ambil id dari query string
$id = $_GET['id'];

// Buat query untuk ambil data dari database
$sql = "SELECT * FROM user WHERE id=$id";
$query = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($query);

// Jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Style/style-edit-form-fhotel.css">
    <title></title>
</head>
<body>
<div class="container">
        <div class="form-edit">
    <header>
        <h3>Formulir edit user</h3>
    </header>

    <form action="proses-edit-user.php" method="POST" >
        <input type="hidden" name="id" value="<?php echo $user['id']?>">
        <p>
            <label for="nama">Nama </label>
            <input type="text" name="nama_user" value="<?php echo $user['nama_user'] ?>">
        </p>
        <p>
            <label for="usia">Usia </label>
            <input type="text" name="usia" value="<?php echo $user['usia'] ?>">
        </p>
        <p>
            <input type="submit" value="Simpan" name="edit">
        </p>
    </form>

        </div>
</div>
</body>
</html>
