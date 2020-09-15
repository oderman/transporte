<?php
include("sesion.php");
$sql = "DELETE FROM rutas_vehiculos WHERE rutv_id = :idR";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idR', $_GET['idR'], PDO::PARAM_INT);   
$stmt->execute();
header("Location:rutas-detalles.php?ruta=".$_GET['ruta']."&msg=2");