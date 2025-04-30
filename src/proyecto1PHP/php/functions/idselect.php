<?php
include_once __DIR__ . '/../model/Conexion.php';

// Crear conexión
$conexion = Conexion::get_conection();

// Recibir el id del personaje
$data = json_decode(file_get_contents("php://input"), true);  // Decodificar el JSON recibido

// Verificamos si el 'id' fue recibido correctamente
if (isset($data['id'])) {
    $id = $data['id'];  // Extraemos el ID del personaje
    obtener_personaje($conexion, $id);
}

function obtener_personaje(PDO $conn, ?int $id)
{
    // Llamamos a la función que obtiene el personaje de la base de datos
    $resultado = Conexion::cargar_por_id($conn, $id);

    // Verificamos si la consulta fue exitosa
    if ($resultado) {
        echo json_encode(['success' => true, 'personaje' => $resultado]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Personaje no encontrado']);
    }
}

Conexion::desconectar($conexion); // Asegurarnos de cerrar la conexión al final del fichero

