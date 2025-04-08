<?php
/*
ejecutar para instalar mysqli:
apt-get update
apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev
docker-php-ext-configure gd --with-freetype --with-jpeg
docker-php-ext-install gd mysqli
*/
include("model/Conexion.php");
include("model/Personaje.php");

//datos generales de conexion:
$img_default = "../../imagenes/userimg.jpg";

//Crear conexion
$conexion = Conexion::get_conection();

//crear la tabla si no existe
Conexion::crear_tabla($conexion);


//Recibir datos del post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario

    // Recibir datos del Post
    $nombre = isset($_POST['name']) ? $_POST['name'] : '';
    $apodo = isset($_POST['apodo']) ? $_POST['apodo'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $clase = isset($_POST['clase']) ? $_POST['clase'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $casado = isset($_POST['casado']) && $_POST['casado'] === 'on' ? 1 : 0;
    $en_equipo = isset($_POST['en_equipo']) && $_POST['en_equipo'] === 'on' ? 1 : 0;


    // Añadir los datos a un objeto personaje
    $personaje = new Personaje();
    $personaje->setNombre(htmlspecialchars($nombre));
    $personaje->setApodo(htmlspecialchars($apodo));
    $personaje->setTipoDanio(htmlspecialchars($contact));
    $personaje->setClase(htmlspecialchars($clase));
    $personaje->setDescripcion(nl2br(htmlspecialchars($descripcion)));  // Convertir saltos de línea a <br>
    $personaje->setCasado($casado);
    $personaje->setEnEquipo($en_equipo);
    
    //Cargar imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        // Si la imagen fue subida la copiamos a nuestra carpeta de proyecto y guardamos en la bbdd su ruta

        // Obtener detalles del archivo subido
        $archivoTmp = $_FILES['imagen']['tmp_name'];
        $nombreArchivo = $_FILES['imagen']['name'];

        // Generar un nombre único para el archivo (uso la fecha y hora del sistema + un identificador aleatorio)
        $fechaHora = time();  // Obtiene la marca de tiempo actual 
        $nombreArchivoUnico = $fechaHora . '_' . uniqid() . '.' . pathinfo($nombreArchivo, PATHINFO_EXTENSION);

        // Especificar la carpeta donde guardar el archivo
        $carpetaDestino = '../../imagenes/';
        if (!is_dir($carpetaDestino)) {
            $rutaArchivo = $carpetaDestino . $nombreArchivoUnico;
        } else {
            error_log("La carpeta de Imagenes no se encuentra");
        }

        // Intentar mover el archivo desde la carpeta temporal a la carpeta de destino
        if (move_uploaded_file($archivoTmp, $rutaArchivo)) {
            // me quedo con la ruta del archivo nuevo

            $personaje->setImg($img_default);
        } else {
            
            // Loguear el error en el registro de errores
            error_log("Error al subir la imagen. No se pudo mover el archivo de la carpeta temporal");
        }
    } else {
        print_r(123);
        //Si no se subio imgUsamos la por defecto
        $personaje->setImg($img_default);
    }

    //Por ultimo añadimos el nuevo registro a la tabla
    add_personaje($conexion, $personaje);
};

//Funcion para añadir un nuevo elemento:
function add_personaje($conexion, $personaje)
{
    Conexion::insertar($conexion, $personaje);
}

Conexion::desconectar($conexion);
