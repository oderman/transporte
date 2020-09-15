<?php
include("sesion.php");
$sql = "DELETE FROM vehiculos WHERE veh_id = :idR";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idR', $_GET['idR'], PDO::PARAM_INT);   
$stmt->execute();
header("Location:vehiculos.php?msg=2");