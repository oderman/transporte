<?php
include("sesion.php");

$sql = "UPDATE vehiculos_costos SET vcos_descripcion = :descripcion, vcos_costo = :costo WHERE vcos_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
$stmt->bindParam(':costo', $_POST['costo'], PDO::PARAM_STR);

$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_INT);
                                     
$stmt->execute();

header("Location:vehiculos-costos.php?vehiculo=".$_POST["vehiculo"]."&idR=".$_POST['idR']."&msg=3");