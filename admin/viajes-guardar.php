<?php
include("sesion.php");

$sql = "INSERT INTO viajes(via_trayecto, via_conductor, via_inicio)VALUES (:trayecto, :conductor, :inicio)";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':trayecto', $_POST['trayecto'], PDO::PARAM_STR);
$stmt->bindParam(':conductor', $_POST['conductor'], PDO::PARAM_STR);
$stmt->bindParam(':inicio', $_POST['fechaInicio'], PDO::PARAM_STR);
                                     
$stmt->execute();
$newId = $pdo->lastInsertId();

header("Location:viajes-editar.php?idR=".$newId);