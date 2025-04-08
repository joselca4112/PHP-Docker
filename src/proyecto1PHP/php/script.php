<?php
/*
ejecutar para instalar mysqli:
apt-get update
apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev
docker-php-ext-configure gd --with-freetype --with-jpeg
docker-php-ext-install gd mysqli
*/

//Crear conexion
$mysqli_conexion =  mysqli_connect('db', 'root', 'contraseña', 'mydb');
if($mysqli_conexion->connect_errno) {
    echo "Error de conexión con la base de datos: " . $mysqli_conexion->connect_errno;	
} else {
    echo "Hemos podido conectarnos con MySQL";
}



//Recibir datos del post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario

    // Recibir datos del Post
    $nombre = isset($_POST['name']) ? $_POST['name'] : '';
    $apodo = isset($_POST['apodo']) ? $_POST['apodo'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $clase = isset($_POST['clase']) ? $_POST['clase'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $casado = isset($_POST['casado']);
    $en_equipo =    isset($_POST['en_equipo']);

    // Mostrar los datos recibidos
    echo "<h2>Datos del Formulario</h2>";
    echo "<p>Nombre: " . htmlspecialchars($nombre) . "</p>";
    echo "<p>Apodo: " . htmlspecialchars($apodo) . "</p>";
    echo "<p>Tipo de Daño: " . htmlspecialchars($contact) . "</p>";
    echo "<p>Clase: " . htmlspecialchars($clase) . "</p>";
    echo "<p>Descripción: " . nl2br(htmlspecialchars($descripcion)) . "</p>";
    echo "<p>casado: " . htmlspecialchars($casado ? 'true' : 'false') . "</p>";
    echo "<p>en_equipo: " . htmlspecialchars($en_equipo ? 'true' : 'false') . "</p>";


    // Si la imagen fue subida la copiamos a nuestra carpeta de proyecto y guardamos en la bbdd su ruta
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {

        // Obtener detalles del archivo subido
        $archivoTmp = $_FILES['imagen']['tmp_name'];
        $nombreArchivo = $_FILES['imagen']['name'];
        $tamanoArchivo = $_FILES['imagen']['size'];
    
        echo $nombreArchivo;
        
        // Generar un nombre único para el archivo (por ejemplo, usando la fecha y hora del sistema + un identificador aleatorio)
        $fechaHora = time();  // Obtiene la marca de tiempo actual (segundos desde 1970)
        $nombreArchivoUnico = $fechaHora . '_' . uniqid() . '.' . pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    
        // Especificar la carpeta donde guardar el archivo
        $carpetaDestino = '../imagenes/'; // Asegúrate de que la carpeta exista
        $rutaArchivo = $carpetaDestino . $nombreArchivoUnico;
    
        // Intentar mover el archivo desde la carpeta temporal a la carpeta de destino
        if (move_uploaded_file($archivoTmp, $rutaArchivo)) {
            // Loguear el éxito en el registro de errores
            echo $rutaArchivo;
        } else {
            // Loguear el error en el registro de errores
            error_log("Error al subir la imagen.");
        }
    } else {
        // en este caso no se añadio img por lo que guardamos la ruta a la img por defecto
    }
    
}
