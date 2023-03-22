<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

	<title>Edit Buku</title>
</head>
<body>
	<?php 
	include('../app.php');

	$id_buku = $_GET['id_buku'];

	$sql_kategoribuku = "select * from kategori_buku";
	$hasil_kategoribuku = select($sql_kategoribuku);

	$sql_buku = "select * from buku where id_buku='$id_buku'";
	$hasil_buku = select($sql_buku);
	$data = $hasil_buku->fetch_assoc();
	
	?>

	<div class="container">
		<div class="row justify-content-center mt-2 mb-3">
			<div class="row">
				<a href="index.php">Kembali</a>
			</div>
			<h1 class="text-center display-6">Edit Buku</h1>

			<div class="col-md-6">
				<form action="update.php" method="post">

					<input type="hidden" value="<?= $id_buku; ?>" name="id_buku"/>

					<div class="mb-2">
						<label for="kode_buku" class="form-label">Kode Buku</label>
						<input type="text" value="<?= $data['kode_buku']; ?>" name="kode_buku" class="form-control" readonly >
					</div>
					<div class="mb-2">
						<label for="id_kategori" class="form-label">Kategori Buku</label>
						<select name="id_kategori" class="form-control form-select" id="id_kategori">
							<?php 
							$idkategori = $data['id_kategori'];

							while($datakategori = $hasil_kategoribuku->fetch_assoc()) { 
								if($idkategori == $datakategori['id_kategori']) { ?>
									<option value="<?= $datakategori['id_kategori']; ?>"  selected="selected"><?= $datakategori['kategori_buku'];?>  </option>
								<?php } else { ?>
									<option value="<?= $datakategori['id_kategori']; ?>" ><?= $datakategori['kategori_buku']; ?>  
								<?php } } ?>
							</select>
						</div>
						<div class="mb-2">
							<label for="nama_buku" class="form-label">Nama Buku</label>
							<input type="text" value="<?= $data['nama_buku']; ?>" name="nama_buku" id="nama_buku" class="form-control"  required>
						</div>
						<div class="mb-2">
							<label for="isbn" class="form-label">ISBN</label>
							<input type="text" value="<?= $data['isbn']; ?>" name="isbn" class="form-control" required>
						</div>
						<div class="mb-2">
							<label for="penerbit" class="form-label">Penerbit</label>
							<input type="text" value="<?= $data['penerbit']; ?>" name="penerbit" class="form-control" required>
						</div>
						<div class="mb-2">
							<label for="penulis" class="form-label">Penulis</label>
							<input type="text" value="<?= $data['penulis']; ?>" name="penulis" class="form-control" required>
						</div>
						<div class="mb-2">
							<label for="lokasi_buku" class="form-label">Lokasi Buku</label>
							<input type="text" value="<?= $data['lokasi_buku']; ?>" name="lokasi_buku" class="form-control" required>
						</div>
						<div class="row justify-content-center mt-3">
							<div class="col-3">
								<button class="btn btn-success" type="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
	</html>