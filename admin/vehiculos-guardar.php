<?php
include("sesion.php");

$sql = "INSERT INTO vehiculos(veh_nombre, veh_placa, veh_consumo)VALUES (:nombre, :placa, :consumo)";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
$stmt->bindParam(':placa', $_POST['placa'], PDO::PARAM_STR);
$stmt->bindParam(':consumo', $_POST['consumo'], PDO::PARAM_STR);
                                     
$stmt->execute();
$newId = $pdo->lastInsertId();

header("Location:vehiculos.php?id=".$newId);