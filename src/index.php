<?php session_start();  // Inicia la sesión

//Habilitar errores
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//Ficheros que uso en el proyecto 1
include_once('proyecto1PHP/php/script.php');//Primero cargo el par añadir datos
include_once('proyecto1PHP/php/functions/eliminar.php'); //Luego el script para eliminar
include_once('proyecto1PHP/php/functions/idselect.php'); //Luego el script para eliminar
include_once('proyecto1PHP/php/functions/update.php'); //Luego el script para eliminar
include_once('proyecto1PHP/php/web.php'); //Despues la web html

//Ficheros de clase
include_once('proyecto1PHP/php/model/Conexion.php');
include_once('proyecto1PHP/php/model/Personaje.php');




?>

