<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

	<title>Edit Kategori Buku</title>
</head>
<body>
	<?php
	include('../app.php');

	$id_kategori = $_GET['id_kategori'];
	
	$sql_kategori = "select * from kategori_buku where id_kategori='$id_kategori'";
	$hasil_kategori = select($sql_kategori);
	$data = $hasil_kategori->fetch_assoc();

	?>

	<div class="container mt-5">	
		<div class="row justify-content-center">
			<div class="row">
				<a href="index.php">Kembali</a>
			</div>
			<h1 class="text-center display-6">Edit Kategori Buku</h1>

			<div class="col-6">	
				<form action="update.php" method="post">
					<input type="hidden" value="<?= $id_kategori; ?>" name="id_kategori"/>

					<div class="mb-3">	
						<label for="kode_kategori" class="form-label">Kode Kategori</label>
						<input type="text" value="<?= $data['kode_kategori']; ?>" name="kode_kategori" id="kode_kategori" class="form-control" readonly>
					</div>
					<div class="mb-3">	
						<label for="kategori_buku" class="form-label">Kategori Buku</label>
						<input type="text" value="<?= $data['kategori_buku']; ?>" name="kategori_buku" id="kategori_buku" class="form-control" required>
					</div>
					<div class="row justify-content-center">	
						<div class="col-3">	
							<button class="btn btn-success" type="submit" >Submit</button>
						</div>
					</div>	
				</form>
			</div>
		</div>	
	</div>


</body>
</html>