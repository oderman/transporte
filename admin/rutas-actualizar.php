<?php
include("sesion.php");

$sql = "UPDATE rutas SET rut_origen = :origen, rut_destino = :destino, rut_km = :distancia, rut_unidad_tiempo = :tiempo WHERE rut_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':origen', $_POST['origen'], PDO::PARAM_STR);
$stmt->bindParam(':destino', $_POST['destino'], PDO::PARAM_STR);
$stmt->bindParam(':distancia', $_POST['distancia'], PDO::PARAM_STR);
$stmt->bindParam(':tiempo', $_POST['tiempo'], PDO::PARAM_INT);

$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_INT);
                                     
$stmt->execute();

header("Location:rutas.php?idR=".$_POST['idR']."&msg=3");