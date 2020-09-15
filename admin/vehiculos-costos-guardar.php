<?php
include("sesion.php");

$sql = "INSERT INTO vehiculos_costos(vcos_vehiculo, vcos_descripcion, vcos_costo)VALUES (:vehiculo, :descripcion, :costo)";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':vehiculo', $_POST['vehiculo'], PDO::PARAM_STR);
$stmt->bindParam(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
$stmt->bindParam(':costo', $_POST['costo'], PDO::PARAM_STR);
                                     
$stmt->execute();
$newId = $pdo->lastInsertId();

header("Location:vehiculos-costos.php?vehiculo=".$_POST["vehiculo"]."&id=".$newId);