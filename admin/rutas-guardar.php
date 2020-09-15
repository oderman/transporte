<?php
include("sesion.php");

$sql = "INSERT INTO rutas(rut_origen, rut_destino, rut_km, rut_unidad_tiempo)VALUES (:origen, :destino, :distancia, :tiempo)";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':origen', $_POST['origen'], PDO::PARAM_STR);
$stmt->bindParam(':destino', $_POST['destino'], PDO::PARAM_STR);
$stmt->bindParam(':distancia', $_POST['distancia'], PDO::PARAM_STR);
$stmt->bindParam(':tiempo', $_POST['tiempo'], PDO::PARAM_STR);
                                     
$stmt->execute();
$newId = $pdo->lastInsertId();

header("Location:rutas.php?id=".$newId);