<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		table{
			width: 100%;
		}
		#mdl-btn{
			width: 150px;
		}
	</style>

	<title>Buku</title>
</head>
<body>

	<?php
	include('../app.php');
	include('../assets/components/modal-create-buku.php');

	if(isset($_GET["cari"]))
	{
		$cari = $_GET["cari"];

		$sql = "SELECT * FROM buku, kategori_buku where buku.id_kategori=kategori_buku.id_kategori and buku.nama_buku like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.kode_buku like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.isbn like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.penerbit like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.penulis like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.lokasi_buku like '%$cari%'";

		$sql2 = "SELECT count(*) as jumlah_buku FROM buku, kategori_buku where buku.id_kategori=kategori_buku.id_kategori and buku.nama_buku like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.kode_buku like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.isbn like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.penerbit like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.penulis like '%$cari%' or buku.id_kategori=kategori_buku.id_kategori and buku.lokasi_buku like '%$cari%'";
	} else {
		$sql = "SELECT * FROM buku, kategori_buku where buku.id_kategori=kategori_buku.id_kategori order by buku.id_buku DESC";

		$sql2 = "SELECT count(*) as jumlah_buku FROM buku, kategori_buku where buku.id_kategori=kategori_buku.id_kategori";

		// $sql = "SELECT * FROM buku LEFT JOIN kategori_buku ON buku.id_kategori = kategori_buku.id_kategori order by buku.id_buku DESC";
	}

	$hasil = select($sql);

	$hasil2 = select($sql2);
	$data2 = $hasil2->fetch_assoc();

	?>

	<div class="container mt-5">
		<div class="row">
			<a href="../">Kembali</a>
		</div>
		<div class="row justify-content-center">
			<div class="col">
				<h1 class="text-center display-6">Master Buku</h1>
			</div>
		</div>
		<div class="row mt-4 mb-4">
			<div class="col">
				<button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal-create-buku" id="mdl-btn">Tambah Data</button>
			</div>
			<div class="col">
				<form action="index.php" method="get">
					<div class="d-flex">
						<input type="text" class="form-control ms-auto me-2" name="cari" value="<?php if(isset($_GET["cari"])) { echo $_GET["cari"]; } ?>" style="width: 200px;">
						<button class="btn btn-secondary" type="submit">Cari</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row mb-3">
			<p class="text-center" style="font-weight: bold;">Jumlah Buku : <?= $data2['jumlah_buku'] ?></p>
		</div>
		<div class="row">
			<div class="col">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Buku</th>
							<th>Nama Buku</th>
							<th>Kategori</th>
							<th>Isbn</th>
							<th>Penrbit</th>
							<th>Penulis</th>
							<th>Lokasi Buku</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						while($data = $hasil->fetch_assoc()) { ?>
							<tr>
								<td> <?= $no++ ?> </td>
								<td> <?= $data['kode_buku'] ?> </td>
								<td> <?=  $data['nama_buku'] ?> </td>
								<td> <?= $data['kategori_buku'] ?> </td>
								<td> <?=  $data['isbn'] ?> </td>
								<td> <?=  $data['penerbit'] ?> </td>
								<td> <?=  $data['penulis'] ?> </td>
								<td> <?=  $data['lokasi_buku'] ?> </td>
								<td>
									<a href="form_edit_buku.php?id_buku=<?= $data['id_buku'] ?>" class="btn btn-warning mb-2" style="width: 100px;">Edit</a>

									<form action="destroy.php" method="post">
										<input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">
										<button class="btn btn-danger" style="width: 100px;">Hapus</button>										
									</form>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
