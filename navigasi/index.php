<?php
$koneksi = new PDO("mysql:host=localhost;dbname=navigasi", "root", "");
$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM data";
$result = $koneksi->query($sql);
$data = $result->fetchAll();
global $sound;
$sound = 0;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="refresh" content="5">
<title>AirNav Suhu Monitoring</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="style.css">
</head>

<body class="latar">
<header>
<div class="logo-left">
<div class="logo">
<img src="img/NAV SURV.png" alt="">
<h2 class="judul">NAVIGATION AND SURVEILLANCE ENGINERING DIVISION <br> MAKASSAR AIR TRAFIC SERVICE CENTER</h2>
</div>
</div>
<div class="logo-right">
<img src="img/logo_airnav.png" alt="">
</div>

</header>
<main>
<h2 class="main-judul">Temperature Monitoring System</h2>

<div class="main-kiri">
<table class="table">
<tr>
<th>Nama Perangkat</th>
<th>Kelembaman(%)</th>
<th>Suhu(&deg; C)</th>
<th>Status Alarm</th>
</tr>
<?php
    for($i=0; $i<6;$i++) { 
    $sound += (int) $data[$i]['alarm'];
?>
    
    <tr>
        <td>
        <?php 
                $tmp = implode(" ", explode("_", strtoupper($data[$i]['id'])));
                echo $tmp;
        ?>
        </td>
        <td><?= $data[$i]['suhu'];?></td>
        <td><?= $data[$i]['kelembaban'];?></td>
        <td><span class="status <?php if($data[$i]['alarm'] == "1") {echo "is_alarm";} else { echo "is_normal";} ?>"></span></td>
    </tr>
<?php } ?>
</table>
</div>
<div class="main-kanan">
<table>
<tr>
<th>Nama Perangkat</th>
<th>Kelembaman(%)</th>
<th>Suhu(&deg; C)</th>
<th>Status Alarm</th>
</tr>
<?php
    for($i=6; $i<12;$i++) { 
    $sound += (int) $data[$i]['alarm'];
?>
    <tr>
        <td>
        <?php 
                $tmp = implode(" ", explode("_", strtoupper($data[$i]['id'])));
                echo $tmp;
        ?>
        </td>
        <td><?= $data[$i]['suhu'];?></td>
        <td><?= $data[$i]['kelembaban'];?></td>
        <td><span class="status <?php if($data[$i]['alarm'] == "1") {echo "is_alarm";} else { echo "is_normal";} ?>"></span></td>
    </tr>
<?php } ?>
</table>
</div>
<?php
    if($sound > 0) { ?>
        <audio autoplay loop>
        <source src="Alert.mp3">
        </audio>
         <?php
    }

?>
</main>
<footer>
<div class="left-footer">
Copyright &copy; 2022 <br>
by Komunitas Cyber Tech UNHAS
</div>
<div class="right-footer">
<b>Contact Person</b><br>
082193026191(Hasbih) -- 082197785640(Salam) -- 081244995068(Fariz) 
</div>
</footer>
</body>

</html>