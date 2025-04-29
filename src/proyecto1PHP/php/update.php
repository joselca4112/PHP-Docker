<?php
//Ficheros de clase
include_once("model/Conexion.php");
include_once("model/Personaje.php");


//Crear conexion
$conexion = Conexion::get_conection();

//recibir el personaje para actualizarlo en la tabla
$raw_data = file_get_contents("php://input");
var_dump($raw_data);  // Esto debería mostrar el JSON recibido

$data = json_decode($raw_data, true);
var_dump($data);

// Verificamos si el personaje fue recibido correctamente
if (isset($data['personaje'])) {
    $personaje = $data['personaje'];  // Extraemos el objeto de la respuesta

    actualizar_personaje($conexion, $personaje);
};

function actualizar_personaje(PDO $conn, Personaje $personaje)
{
    // Llamamos a la función que actualizar el personaje en la base de datos
    $resultado = Conexion::update($conn, $personaje);

    // Verificamos si la eliminación fue exitosa
    if ($resultado) {
        echo json_encode(['success' => true, 'message' => 'Personaje actualizado correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el personaje']);
    }
}

Conexion::desconectar($conexion); //Asegurarnos de cerrar la conexion al final del fichero