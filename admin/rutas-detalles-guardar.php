<?php
include("sesion.php");

$sql = "INSERT INTO rutas_vehiculos(rutv_ruta, rutv_vehiculo, rutv_tarifa)VALUES (:ruta, :vehiculo, :tarifa)";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':ruta', $_POST['ruta'], PDO::PARAM_STR);
$stmt->bindParam(':vehiculo', $_POST['vehiculo'], PDO::PARAM_STR);
$stmt->bindParam(':tarifa', $_POST['tarifa'], PDO::PARAM_STR);
                                     
$stmt->execute();
$newId = $pdo->lastInsertId();

header("Location:rutas-detalles.php?ruta=".$_POST['ruta']."&id=".$newId);