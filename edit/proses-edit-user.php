<?php 
include '../koneksi.php';
$db = new Koneksi();
$conn = $db->getConnection();

if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$nama_user = $_POST['nama_user'];
	$usia = $_POST['usia'];

	//escape string untuk mencegah sql injection
	$id = mysqli_real_escape_string($conn, $id);
	$nama_user = mysqli_real_escape_string($conn, $nama_user);
	$usia = mysqli_real_escape_string($conn, $usia);

	$sql = "UPDATE user SET nama_user='$nama_user', usia='$usia' WHERE id='$id'";
	$query = mysqli_query($conn, $sql);

	if ($query) {
		header('location: ../user.php');
	} else {
		die("gagal menyimpan perubahan...." . mysqli_error($conn));
	}
} else {
	die("akses dilarang...");
}
?>
