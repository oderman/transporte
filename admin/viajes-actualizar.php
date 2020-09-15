<?php
include("sesion.php");

$sql = "UPDATE viajes SET via_trayecto = :trayecto, via_conductor = :conductor, via_tarifa = :tarifa WHERE via_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':trayecto', $_POST['trayecto'], PDO::PARAM_STR);
$stmt->bindParam(':conductor', $_POST['conductor'], PDO::PARAM_STR);
$stmt->bindParam(':tarifa', $_POST['tarifa'], PDO::PARAM_STR);

$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_INT);
                                     
$stmt->execute();

header("Location:viajes.php?idR=".$_POST['idR']."&msg=3");