<?php
include("sesion.php");

$sql = "INSERT INTO usuarios(usr_usuario, usr_clave, usr_tipo, usr_nombre)VALUES (:usuario, SHA1(:clave), :tipo, :nombre)";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR);
$stmt->bindParam(':clave', $_POST['clave'], PDO::PARAM_STR);
$stmt->bindParam(':tipo', $_POST['tipo'], PDO::PARAM_STR);
$stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
                                     
$stmt->execute();
$newId = $pdo->lastInsertId();

header("Location:usuarios.php?id=".$newId);