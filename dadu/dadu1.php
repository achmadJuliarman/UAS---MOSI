<?php
$x = [];
$u = [];
$a = 0;
$m = 0;
if (!empty($_POST)) {
	if ($_POST['lempar'] < 10) {
		echo "<script>alert('Minimal jumlah lempar = 10');</script>";
	} else {
		RNG($_POST['x0'], $_POST['m'], $_POST['a'], $_POST['lempar']);
	}
}

function RNG($x0, $nilai_m, $nilai_a, $lempar)
{
	global $x, $u, $a, $m, $nilai_dadu;
	$a = $nilai_a;
	$m = $nilai_m;
	$x[0] = $x0;
	for ($i = 1; $i <= $lempar; $i++) {
		$x[$i] = ($a * $x[$i - 1]) % $m;
	}
	for ($i = 0; $i < $lempar; $i++) {
		$u[$i] = ($x[$i + 1] / $m);
		$nilai_dadu[$i] = floor($u[$i] * 10);
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RNG | 1 Mata Dadu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
</style>

<body>

	<h1 class="mt-3" align="center">RNG Mata Dadu 1<img src="img/1.png" alt="" style="width:5%; margin-left: 2%;"></h1>
	<div class="opsi container d-flex mt-4 mb-4">
		<div class="dropdown-center">
			<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
				Jumlah Mata Dadu
			</button>
			<ul class="dropdown-menu dropdown-menu-dark">
				<li><a class="dropdown-item active" href="dadu1.php">Mata Dadu 1</a></li>
				<li><a class="dropdown-item" href="dadu2.php">Mata Dadu 2</a></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<form action="" method="post">
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">X0</span>
				<input type="number" class="form-control" placeholder="Masukkan Nilai X0" name="x0" required>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">m</span>
				<input type="number" class="form-control" placeholder="Masukkkan Nilai m" name="m" required>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">a</span>
				<input type="number" class="form-control" placeholder="masukkan nilai a" name="a" required>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">Jumlah Lempar</span>
				<input type="number" class="form-control" placeholder="Masukkkan Jumlah Lempar Dadu" name="lempar">
			</div>
			<button type="submit" class="btn btn-primary btn-lg mt-4 d-flex" id="btn-lempar">Lempar Dadu</button>
		</form>
	</div>
	<?php if (isset($nilai_dadu)) : ?>
		<div class="container mt-4" align="center">
			<div class="container" align="left">
				<p>Jumlah Mata Dadu yang bernilai 4 : <?= count(array_keys($nilai_dadu, 4)) ?></p>
				<p>Jumlah Mata Dadu yang bernilai 6 : <?= count(array_keys($nilai_dadu, 6)) ?></p>
			</div>
			<table class="table" align="center">
				<thead align="center">
					<tr>
						<th scope="col">i</th>
						<th scope="col">X (i-1)</th>
						<th scope="col">Xi (Random Integer Number)</th>
						<th scope="col">Ui (Uniform R.N)</th>
						<th scope="col">Nilai Mata Dadu</th>
						<!-- <th scope="col">gambar</th> -->
					</tr>
				</thead>
				<tbody id="data" align="center">
					<?php for ($i = 0; $i < count($u); $i++) : ?>
						<tr>
							<td><?= $i + 1 ?></td>
							<td><?= $x[$i]; ?></td>
							<td>Xi = (<?= $a ?> X <?= $x[$i] ?>) mod <?= $m ?> = <?= $x[$i + 1]; ?></td>
							<td>Ui = <?= $x[$i + 1] ?>/<?= $m ?> = <?= $u[$i] ?></td>
							<td>Ui * 10 = <?= $nilai_dadu[$i] ?></td>
							<td style="width: 15%;">
								<img src="img/<?= $nilai_dadu[$i] ?>.png" style="width: 25%;">
							</td>
						</tr>
					<?php endfor; ?>
				</tbody>
			</table>
		</div>
	<?php endif; ?>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>