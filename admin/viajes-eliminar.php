<?php
include("sesion.php");
$sql = "DELETE FROM viajes WHERE via_id = :idR";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idR', $_GET['idR'], PDO::PARAM_INT);   
$stmt->execute();
header("Location:viajes.php?msg=2");