<?php 
$waktu_kedatangan = 40;
$rata_pelayanan = 60;

function RNG($m, $a, $xo, $n){
    $data = [];
    $data[0]= $xo;
    $xn = 0;
    for ($i=1; $i < $n; $i++) { 
        $xn = ($a * $data[$i-1]) % $m;
        $data[$i] = $xn;
    }
    return $data;
}

function hitungPanjangAntrean($kedatangan)
{
    // lamda/kedatangan per 2 jam. note: diambil 2 jam agar bisa dibagi 40 dan 60
    $lamda = $kedatangan * (120/40);
    // miu/pelayanan per 2 jam
    $miu = $kedatangan * (120/60);
    // lq (jumlah antrian )
    $lq = ($lamda*$lamda) / ($miu * ($miu - $lamda)); // hasil - tidak berarti apa apa
    return $lq;
}

function hitungWaktuTunggu($lq, $kedatangan){
    $lamda = $kedatangan * (120/40);
    $wq = $lq / $lamda;
    return $wq;
}
$data_kedatangan = RNG(13,7,1,10);
// var_dump(hitungPanjangAntrean(1));
// var_dump($data_kedatangan);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Antrean No 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container d-flex flex-column">
    <div class="row mt-4" align="center">
        <h1>Simulasi Antrean NO 6</h1>
        <div class="container" align="left">
            <h4><span class="badge text-bg-primary">Dik :</span></h4>
            <h4><span class="badge text-bg-primary">m = 13 a = 7 X0 = 1</span></h4>
            <h4><span class="badge text-bg-primary">Waktu Kedatangan = 40 menit</span></h4>
            <h4><span class="badge text-bg-primary">Waktu Pelayanan = 60 menit</span></h4>
        </div>
        
        <!-- <table class="table table-dark table-hover mt-3" style="width:750px;" align="center"> -->
        <table class="table table-dark table-hover mt-3" align="center">
            <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Data Kedatangan / 40 menit</th>
              <th scope="col">Jumlah Kedatangan /2 jam (λ)</th>
              <th scope="col">Jumlah Dilayani /2 jam (μ)</th>
              <th scope="col">Panjang Antrean / 2 jam (lq)</th>
              <th scope="col">Waktu Antrean (wq)</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
            <?php foreach($data_kedatangan as $dt) : ?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <td align="center"><?= $dt ?></td>
              <td align="center"><?= $dt * 3 ?></td>
              <td align="center"><?= $dt * 2 ?></td>
              <td align="center"><?= abs(floor(hitungPanjangAntrean($dt))) ?> </td>
              <td align="center"><?= hitungWaktuTunggu(abs(floor(hitungPanjangAntrean($dt))), $dt) ?> % </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
