<?php
include("sesion.php");

$sql = "UPDATE vehiculos SET veh_nombre = :nombre, veh_placa = :placa, veh_consumo = :consumo WHERE veh_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
$stmt->bindParam(':placa', $_POST['placa'], PDO::PARAM_STR);
$stmt->bindParam(':consumo', $_POST['consumo'], PDO::PARAM_STR);

$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_INT);
                                     
$stmt->execute();

header("Location:vehiculos.php?idR=".$_POST['idR']."&msg=3");