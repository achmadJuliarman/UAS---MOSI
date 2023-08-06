<?php
// $x = [];
// $u = [];
// $a = 0;
// $m = 0;

// variabel penampung nilai variabel dadu 1
$x_dadu1 = [];
$u_dadu1 = [];
$a_dadu1 = 0;
$m_dadu1 = 0;
$nilai_dadu1 = [];

// variabel penampung nilai variabel dadu 2
$x_dadu2 = [];
$u_dadu2 = [];
$a_dadu2 = 0;
$m_dadu2 = 0;
$nilai_dadu2 = [];
if(!empty($_POST)){
	if ($_POST['lempar'] < 10) {
		echo "<script>alert('Minimal jumlah lempar = 10');</script>";
	}else{
		RNG($_POST['x0-1'], $_POST['m-1'], $_POST['a-1'], $_POST['lempar'], 1);
		RNG($_POST['x0-2'], $_POST['m-2'], $_POST['a-2'], $_POST['lempar'], 2);
	}
}

function RNG($x0, $nilai_m, $nilai_a, $lempar, $daduKe)
{
	global 	$x_dadu1,$x_dadu2, 
			$u_dadu1,$u_dadu2, 
			$a_dadu1,$a_dadu2, 
			$m_dadu1,$m_dadu2, 
			$nilai_dadu1,$nilai_dadu2;
	if($daduKe == 1){
		$a_dadu1 = $nilai_a;
		$m_dadu1 = $nilai_m;
		$x_dadu1[0] = $x0;
		for ($i = 1; $i <= $lempar; $i++) { 
			$x_dadu1[$i] = ($a_dadu1 * $x_dadu1[$i-1]) % $m_dadu1;
		}
		for($i = 0; $i < $lempar; $i++){
			$u_dadu1[$i] = ($x_dadu1[$i+1]/$m_dadu1);
			$nilai_dadu1[$i] = floor($u_dadu1[$i] * 10);
		}
	}else{
		$a_dadu2 = $nilai_a;
		$m_dadu2 = $nilai_m;
		$x_dadu2[0] = $x0;
		for ($i = 1; $i <= $lempar; $i++) { 
			$x_dadu2[$i] = ($a_dadu2 * $x_dadu2[$i-1]) % $m_dadu2;
		}
		for($i = 0; $i < $lempar; $i++){
			$u_dadu2[$i] = ($x_dadu2[$i+1]/$m_dadu2);
			$nilai_dadu2[$i] = floor($u_dadu2[$i] * 10);
		}
	}
	// $a = $nilai_a;
	// $m = $nilai_m;
	// $x[0] = $x0;
	// for ($i = 1; $i <= $lempar; $i++) { 
	// 	$x[$i] = ($a * $x[$i-1]) % $m;
	// }
	// for($i = 0; $i < $lempar; $i++){
	// 	$u[$i] = ($x[$i+1]/$m);
	// 	if ($daduKe == 1) {
	// 		$nilai_dadu1[$i] = floor($u[$i] * 10);
	// 	}else{
	// 		$nilai_dadu2[$i] = floor($u[$i] * 10);
	// 	}
	// }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RNG | 2 Mata Dadu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
</style>
<body>

<h1 class="mt-3" align="center">RNG Mata Dadu 2 
	<img src="img/2.png" alt="" style="width:5%; margin-left: 2%;">
	<img src="img/2.png" alt="" style="width:5%; margin-left: 0.5%;">
</h1>
<div class="opsi container d-flex mt-4 mb-4">
	<div class="dropdown-center">
	  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
	    Jumlah Mata Dadu
	  </button>
	  <ul class="dropdown-menu dropdown-menu-dark">
	    <li><a class="dropdown-item " href="dadu1.php">Mata Dadu 1</a></li>
	    <li><a class="dropdown-item active" href="dadu2.php">Mata Dadu 2</a></li>
	  </ul>
	</div>
</div>
<div class="container">
	<form action="#hasil" method="post">
		<h4>Dadu 1</h4>
		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">X0</span>
		  <input type="number" class="form-control" placeholder="Masukkan Nilai X0" name="x0-1">
		</div>
		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">m</span>
		  <input type="number" class="form-control" placeholder="Masukkkan Nilai m" name="m-1">
		</div>
		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">a</span>
		  <input type="number" class="form-control" placeholder="masukkan nilai a" name="a-1">
		</div>
		<h4>Dadu 2</h4>
		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">X0</span>
		  <input type="number" class="form-control" placeholder="Masukkan Nilai X0" name="x0-2">
		</div>
		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">m</span>
		  <input type="number" class="form-control" placeholder="Masukkkan Nilai m" name="m-2">
		</div>
		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">a</span>
		  <input type="number" class="form-control" placeholder="masukkan nilai a" name="a-2">
		</div>
		<div class="input-group mb-3">
		  <span class="input-group-text" id="basic-addon1">Jumlah Lempar</span>
		  <input type="number" class="form-control" placeholder="Masukkkan Jumlah Lempar Dadu" name="lempar">
		</div>
		<button type="submit" class="btn btn-primary btn-lg mt-4 d-flex" id="btn-lempar">Lempar Dadu</button>
	</form>
</div>

<div class="container mt-4" align="center" id="hasil">
	<div class="container" align="left">
		<p>Mata Dadu 4 pada mata <b>Dadu 1 </b>: <?= count(array_keys($nilai_dadu1, 4)) ?></p>
		<p>Mata Dadu 6 pada mata <b>Dadu 2 </b>: <?= count(array_keys($nilai_dadu2, 6)) ?></p>
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
	  	<?php for($i = 0; $i < count($u_dadu1); $i++) : ?>
	    <tr>
	    	<td><?= $i+1 ?></td>
	    	<td>
	    		Dadu 1 : <?= $x_dadu1[$i]; ?><br>
	    		Dadu 2 : <?= $x_dadu2[$i]; ?>
	    	</td>
	    	<td> 
	    		Dadu 1 : Xi = (<?= $a_dadu1 ?> X <?= $x_dadu1[$i] ?>) mod <?= $m_dadu1 ?> = <?= $x_dadu1[$i+1]; ?><br>
	    		Dadu 2 : Xi = (<?= $a_dadu2 ?> X <?= $x_dadu2[$i] ?>) mod <?= $m_dadu2 ?> = <?= $x_dadu2[$i+1]; ?>
	    	</td>
	    	<td>
	    		Dadu 1 : Ui = <?= $x_dadu1[$i+1] ?>/<?= $m_dadu1 ?> = <?= $u_dadu1[$i] ?> <br>
	    		Dadu 2 : Ui = <?= $x_dadu2[$i+1] ?>/<?= $m_dadu2 ?> = <?= $u_dadu2[$i] ?>
	    	</td>
	    	<td>
	    		Dadu 1 : Ui * 10 = <?= $nilai_dadu1[$i] ?> <br>		
	    		Dadu 2 : Ui * 10 = <?= $nilai_dadu2[$i] ?>	
	    	</td>
	    	<td style="width: 15%;">
	    		Dadu 1 : <img src="img/<?= $nilai_dadu1[$i] ?>.png" style="width: 25%; margin-bottom: 1%;"><br>
	    		Dadu 2 : <img src="img/<?= $nilai_dadu2[$i] ?>.png" style="width: 25%;">
	    	</td>
	    </tr>
		<?php endfor; ?>
	  </tbody>
	</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>