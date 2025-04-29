<?php
//declare(strict_types=1); Para typos estrictos
/*
ejecutar para instalar mysqli:
apt-get update
apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev
docker-php-ext-configure gd --with-freetype --with-jpeg
docker-php-ext-install gd mysqli
*/
//Ficheros de clase
include_once("model/Conexion.php");
include_once("model/Personaje.php");

//ruta de la img por defecto y la ruta con la que guardar en la bbdd
$img_default = "proyecto1PHP/imagenes/userimg.jpg";
$folderForHTML = "proyecto1PHP/imagenes/";

//Crear conexion
$conexion = Conexion::get_conection();

//crear la tabla si no existe
Conexion::crear_tabla($conexion);

// lista de datos cargados de la bbdd
$list_personajes = cargar_datos($conexion);

// almaceno la lista en una variable de sesion para acceder a ella desde el js
$_SESSION['list_personajes'] = $list_personajes;

// Recibir los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $personaje->setDescripcion(nl2br(htmlspecialchars($descripcion)));
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
        $carpetaDestino = '../imagenes/';
        //Si existe la tomamos
        if (is_dir($folderForHTML)) {
            $rutaArchivo = $folderForHTML . $nombreArchivoUnico;
        } else {
            //Debe estar por defecto en  el proyecto
            error_log("La carpeta de Imagenes no se encuentra");
        }

        // Intentar mover el archivo desde la carpeta temporal a la carpeta de destino
        if (copy($archivoTmp, $rutaArchivo)) {
            // me quedo con la ruta del archivo nuevo
            $personaje->setImg($folderForHTML . $nombreArchivoUnico);
        } else {
            // Loguear el error en el registro de errores
            error_log("Error al subir la imagen. No se pudo mover el archivo de la carpeta temporal");
        }
    } else {
        //Si no se subio imgUsamos la por defecto
        $personaje->setImg($img_default);
    }

    //Por ultimo añadimos el nuevo registro a la tabla
    add_personaje($conexion, $personaje);

    //Lo añado tmb a la lista de personajes actuales:
    $personajesObj[]=$personaje;

    //Patron PRG, redireccionamos para no permitir mas inserciones de datos
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
};

Conexion::desconectar($conexion); //Asegurarnos de cerrar la conexion al final del fichero

//Funcion para añadir un nuevo elemento a la tabla
function add_personaje(PDO $conexion, Personaje $personaje)
{
    Conexion::insertar($conexion, $personaje);
}

//Funcion para cargar datos y añadirlos dinamicamente
function cargar_datos(PDO $conexion): array
{
    //Lista auxiliar con todos los personajes cargados
    $lista_personajes = [];

    //Cargamos los datos desde la conexion
    $ddbb_data = Conexion::cargar_datos($conexion);

    // Iteramos sobre los datos de la base de datos para crear los objetos Personaje
    foreach ($ddbb_data as $registro) {
        $personaje = new Personaje(
            $registro['id'],        
            $registro['nombre'],    
            $registro['apodo'],    
            $registro['tipo_danio'], 
            $registro['casado'],
            $registro['en_equipo'],
            $registro['clase']  ,
            $registro['descripcion']  ,
            $registro['img']  ,

        );

        // Añadimos el objeto Personaje a la lista
        $lista_personajes[] = $personaje;
    }


    return $lista_personajes;
}
