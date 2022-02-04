<?php
if($_SERVER['REQUEST_METHOD'] == "GET") {
	if($_GET['id'] != "" && $_GET['temp'] != "" && $_GET['hum'] != "" && $_GET['alarm'] != "") {
		$id = $_GET['id'];
		$temp = $_GET['temp'];
		$humi = $_GET['hum'];
		$alarm = $_GET['alarm'];
		
		$koneksi = new PDO("mysql:host=localhost;dbname=navigasi", "root", "");
		$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$update = $koneksi->prepare("UPDATE data SET suhu = :temp, kelembaban = :hum, alarm = :alarm WHERE id = :id");
		$update->bindParam(":temp", $temp);
		$update->bindParam(":hum", $humi);
		$update->bindParam(":alarm", $alarm);
		$update->bindParam(":id", $id);
		$update->execute();
	}
}
?>