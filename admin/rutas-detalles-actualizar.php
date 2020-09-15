<?php
include("sesion.php");

$sql = "UPDATE rutas_vehiculos SET rutv_vehiculo = :vehiculo, rutv_tarifa = :tarifa WHERE rutv_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':vehiculo', $_POST['vehiculo'], PDO::PARAM_STR);
$stmt->bindParam(':tarifa', $_POST['tarifa'], PDO::PARAM_STR);

$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_INT);
                                     
$stmt->execute();

header("Location:rutas-detalles.php?ruta=".$_POST['ruta']."&idR=".$_POST['idR']."&msg=3");