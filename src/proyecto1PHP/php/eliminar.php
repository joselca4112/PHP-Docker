<?php
//Ficheros de clase
include_once("model/Conexion.php");
include_once("model/Personaje.php");

//Crear conexion
$conexion = Conexion::get_conection();

//recibir id para eliminar registro
$data = json_decode(file_get_contents("php://input"), true);  // Decodificar el JSON recibido

// Verificamos si el 'id' fue recibido correctamente
if (isset($data['id'])) {
    $id = $data['id'];  // Extraemos el ID del personaje
    eliminar_personaje($conexion,$id);
};

function eliminar_personaje($conn, $id){
    // Llamamos a la función que elimina el personaje de la base de datos
  $resultado = Conexion::eliminar_por_id($conn, $id);

  // Verificamos si la eliminación fue exitosa
  if ($resultado) {
    echo json_encode(['success' => true, 'message' => 'Personaje eliminado correctamente']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error al eliminar el personaje']);
  }
}