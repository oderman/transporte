<?php
include("sesion.php");
$sql = "DELETE FROM vehiculos_costos WHERE vcos_id = :idR";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idR', $_GET['idR'], PDO::PARAM_INT);   
$stmt->execute();
header("Location:vehiculos-costos.php?vehiculo=".$_GET["vehiculo"]."&msg=2");