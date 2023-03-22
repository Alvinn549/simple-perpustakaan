<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

	<title>Kategori Buku</title>
</head>
<body>
<?php include('../assets/components/modal-create-kategori-buku.php'); ?>
	<div class="container mt-5">
		<div class="row">
			<a href="../">Kembali</a>
		</div>
		<div class="row justify-content-center mt-4 mb-4">
			<div class="col">
				<h1 class="text-center display-6">Master Kategori Buku</h1>
			</div>
		</div>
		<div class="row mb-3">	
			<div class="col">	
				<button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal-create-kategori-buku" id="mdl-btn">Tambah Data</button>
			</div>
		</div>
		<div class="row">
			<div class="col">	
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Kategori</th>
							<th>Kategori Buku</th>
							<th>Jumlah Buku</th>
							<th colspan="2">Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						include('../app.php');

						$sql = "SELECT k.*, COUNT(b.id_buku) as jmlbuku FROM kategori_buku k LEFT JOIN buku b ON k.id_kategori=b.id_kategori GROUP BY k.kode_kategori;";

						$hasil = select($sql);

						$no = 1;
						while ($data = mysqli_fetch_array($hasil)) {
							?>
							<tr>
								<td> <?= $no; ?> </td>
								<td> <?= $data['kode_kategori']; ?> </td>
								<td> <?= $data['kategori_buku']; ?> </td>
								<td> <?= $data['jmlbuku']; ?> </td>
								<td>
									<div class="d-flex">	
										<a href="form-edit-kategori-buku.php?id_kategori=<?= $data['id_kategori'] ?>" class="btn btn-warning me-2" style="width: 100px;" style="width: 100px;">Edit</a>

										<form action="destroy.php" method="post" >
											<input type="hidden" value="<?= $data['id_kategori']; ?>" name="id_kategori">
											<button type="submit" class="btn btn-danger" style="width: 100px;">Delete</button>
										</form>
									</div>
								</td>
							</tr>
							<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
