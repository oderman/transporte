<?php
session_start();
if($_SESSION["id"]=="")
	header("Location:../salir.php");
else
{
	include("../conexion.php");
	
	//USUARIO ACTUAL
	$consultaUsuarioActual = $pdo->prepare("SELECT * FROM usuarios WHERE usr_id='".$_SESSION["id"]."'");
	$consultaUsuarioActual->execute();
	
	$numUsuarioActual = $consultaUsuarioActual->rowCount();
	$datosUsuarioActual = $consultaUsuarioActual->fetch();
	
	//CONFIGURACIÓN
	$configuracion = $pdo->prepare("SELECT * FROM configuracion WHERE config_id=1");
	$configuracion->execute();
	$config = $configuracion->fetch();
	
	//Arrays
	$tiposUsuarios = array("Desc.", "Administrador", "Conductor");
	$unidadTiempo = array(1 => "Un día", 3 => "Medio día", 5 => "Cuarto de día");
}