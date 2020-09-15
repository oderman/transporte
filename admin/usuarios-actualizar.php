<?php
include("sesion.php");

$sql = "UPDATE usuarios SET usr_usuario = :usuario, usr_nombre = :nombre, usr_tipo = :tipo WHERE usr_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR);
$stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
$stmt->bindParam(':tipo', $_POST['tipo'], PDO::PARAM_INT);

$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_STR);
                                     
$stmt->execute();

header("Location:usuarios.php?idR=".$_POST['idR']."&msg=3");