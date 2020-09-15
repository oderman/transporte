<?php
include("sesion.php");
$sql = "DELETE FROM rutas WHERE rut_id = :idR";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idR', $_GET['idR'], PDO::PARAM_INT);   
$stmt->execute();
header("Location:rutas.php?msg=2");