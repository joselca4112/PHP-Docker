<?php
include_once __DIR__ . '/../model/Conexion.php';
include_once __DIR__ . '/../model/Personaje.php';

//Crear conexion
$conexion = Conexion::get_conection();

//recibir el personaje para actualizarlo en la tabla
$data = json_decode(file_get_contents("php://input"), true);  // Decodificar el JSON recibido

// Verificamos si el personaje fue recibido correctamente
if (isset($data['personaje'])) {
    $personajeData  = $data['personaje'];  // Extraemos el objeto de la respuesta

    $personaje = new Personaje(
        $personajeData['id'],
        $personajeData['nombre'],
        $personajeData['apodo'],
        $personajeData['tipo_danio'] ?? '', // opcional
        $personajeData['casado'],
        $personajeData['en_equipo'],
        $personajeData['clase'] ?? '', // opcional
        $personajeData['descripcion'],
        $personajeData['img'] ?? '' // opcional
    );
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