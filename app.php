<?php 
include('connection.php');

/*
	* SELECT
	* Digunakan untuk mengambil data dari database
	* Menerima inputan berupa query sql
*/
function select($sql) 
{
	global $conn;

	$result = $conn->query($sql);
	return $result;
}

/*
	* CREATE
	* Digunakan untuk membuat / create data dari database
	* Menerima inputan berupa query insert sql
*/
function create($sql, $location) 
{
	global $conn;
	if ($conn->query($sql)) {
		header("location: ../".$location);
	} else {
		echo "Insert error";
	}
}

/*
	* UPDATE
	* Digunakan untuk merubah / mengupdate data dari database
	* Menerima inputan berupa query update sql
*/
function update($sql, $location) 
{
	global $conn;

	if ($conn->query($sql)) {
		header("location: ../".$location);
	} else {
		echo "Update error";
	}
}

/*
	* DESTROY
	* Digunakan untuk menghapus / delete data dari database
	* Menerima inputan berupa query delete sql
*/
function destroy($sql, $location) 
{
	global $conn;

	if($conn->query($sql)) {
		header("location: ../".$location);
	} else {
		echo "Delete Error";
	}
}

/*
	* GENERATE KODE BUKU
	* Digunakan untuk membuat kode buku
	* Menerima inputan berupa nama buku dan id kategori
*/
function generateKodeBuku($nama_buku, $id_kategori)
{
	// Ambil huruf awal buku dan ubah menjadi uppercase
	$nama_awal_buku = strtoupper($nama_buku[0]); 

	// Buat id_kategori menjadi 2 digit
	$id_kategori = sprintf('%02d',$id_kategori); 

	// Ambil tahun sekarang
	$tahun = date("Y");

	// Ambil kode buku terakhir dari db yang memiliki tahun yang sama dangan tahun sekarang
	$sql = "SELECT kode_buku FROM buku where kode_buku like '___$tahun%' ORDER BY id_buku DESC LIMIT 1";
	$result=select($sql);

	// Jika ada data yang ditemukan buat no_urut_buku menjadi increment
	if ($result) {
		// ambil data dari db
		$kode = $result->fetch_assoc();

		// Buat no_urut_buku yang berisi 4 digit terakhir data kode_buku dari db kemudian konversi data tersebut menjadi integer
		$no_urut_buku = (int)substr($kode['kode_buku'], 7);

		// Increment no_urut_buku
		$no_urut_buku++;

	} else { 
		// Jika tidak ditemukan maka nilai no_urut_buku menjadi 1 
		$no_urut_buku = 1;
	}

	// Buat no_urut_buku menjadi format 4 digit
	$no_urut_buku = sprintf('%04d',$no_urut_buku);

	// Buat kodebuku dari dari gabungan $nama_awal_buku, $id_kategori, $tahun, $no_urut_buku
	$kodebuku = $nama_awal_buku.$id_kategori.$tahun.$no_urut_buku;

	// Mengembalikan nilai
	return $kodebuku;
}

/*
	* GENERATE KODE KATEGORI
	* Digunakan untuk membuat kode kategori buku
	* Menerima inputan berupa nama kategori
*/
function generateKodeKategori($kategori)
{
	// Ambil huruf depan nama kategori lalu ubah menjadi uppercase 
	$hurufdepanbesar = strtoupper(substr($kategori,0,1));  

	// Ambil jumlah data dari db yang memiliki huruf depan kategori_buku yang sama dengan $hurufdepanbesar
	$sql = "SELECT count(*) as jml FROM kategori_buku WHERE kategori_buku LIKE '$hurufdepanbesar%'";
	$result = select($sql);
	$data = $result->fetch_assoc();

	// Buat variabel no urut dari jumlah data yang ditemukan 
	$nourut = $data['jml'];

	// Increment no urut
	$nourut++;

	// Buat no urut menjadi format 3 digit
	$nourut = sprintf('%03d', $nourut);

	// Buat variabel kode kategori yang berisi gabungan dari $hurufdepanbesar dan $nourut
	$kodeKategori = $hurufdepanbesar.$nourut;

	// Mengembalikan nilai 
	return $kodeKategori;

}

?>