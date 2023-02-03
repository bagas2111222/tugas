<?php
class barang{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function tampil_data_barang(){
        $hasil = array();
        $data = $this->conn->query("SELECT * FROM barang");
        while($d = $data->fetch_array()){
          $hasil[] = $d;
        }
        return $hasil;
      }
}

include 'koneksi.php';
$db = new Koneksi();
$conn = $db->getConnection();
$barang = new barang($conn);
?>
<h3>Data barang</h3>

<table border="1">
	<tr>
		<th>No</th>
		<th>Nama barang</th>
		<th>jumlah barang</th>
        <th>harga barang</th>
		<th>Opsi</th>
	</tr>
	<?php
	$no = 1;
	foreach($barang->tampil_data_barang() as $x){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $x['nama_barang']; ?></td>
		<td><?php echo $x['jumlah_barang']; ?></td>
        <td><?php echo $x['harga_barang']; ?></td>
		<td>
			<a href="edit.php?id=<?php echo $x['id']; ?>&aksi=edit">Edit</a>
			<a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus">Hapus</a>			
		</td>
	</tr>
	<?php 
	}
	?>
