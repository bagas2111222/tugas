<?php
class User{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    function tampil_data_user(){
        $hasil = array();
        $data = $this->conn->query("SELECT * FROM user");
        while($d = $data->fetch_array()){
          $hasil[] = $d;
        }
        return $hasil;
      }
}

include 'koneksi.php';
$db = new Koneksi();
$conn = $db->getConnection();
$user = new User($conn);
?>
<h3>Data User</h3>

<table border="1">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Usia</th>
		<th>Opsi</th>
	</tr>
	<?php
	$no = 1;
	foreach($user->tampil_data_user() as $x){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $x['nama_user']; ?></td>
		<td><?php echo $x['usia']; ?></td>
		<td>
			<a href="edit.php?id=<?php echo $x['id']; ?>&aksi=edit">Edit</a>
			<a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus">Hapus</a>			
		</td>
	</tr>
	<?php 
	}
	?>
