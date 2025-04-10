<? class Conexion
{
    private $host = "db"; //host, en este caso el del docker
    private $dbname = "mydb";  //bbdd
    private $username = "root";  // usaurio
    private $password = "contraseña";  // contraseña
    private static $conn;

    /*
    Para instalar pdo_misql:
    docker exec -it php_container bash

    apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev
    docker-php-ext-install pdo pdo_mysql mysqli
    exit
    docker restart php_container

    */
    // Método para conectarse a la base de datos
    private function __construct()
    {
        try {
            // Usamos PDO para la conexión
            self::$conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
            // self::$conn = new PDO($dsn, $this->username, $this->password);

            // Configuramos el modo de error de PDO para lanzar excepciones
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo ("Error de conexión con la base de datos: " . $e->getMessage());
        }
    }

    public static function get_conection()
    {
        // Si la conexión ya existe, la devuelve
        if (self::$conn) {
            return self::$conn;
        }

        // Si no existe, crea la conexión (llama al constructor)
        new Conexion();

        return self::$conn; // Devuelve la conexión
    }

    //Method to disconect
    public static function desconectar($conn)
    {
        $conn = null;
    }

    //Crear la tabla en la bbdd
    public static function crear_tabla($conn)
    {
        $query = "
        CREATE TABLE IF NOT EXISTS personajes (
            id INT AUTO_INCREMENT PRIMARY KEY, 
            nombre VARCHAR(50),
            apodo VARCHAR(50),
            tipo_danio VARCHAR(30),
            casado BOOL,
            en_equipo BOOL,
            clase VARCHAR(20),
            descripcion TEXT,
            img VARCHAR(255)
        );
        ";
        try {
            // Preparar la consulta con PDO
            $stmt = $conn->prepare($query);

            // Ejecutar la consulta
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error al preparar o ejecutar la creacion de tablas: " . $e->getMessage());
        }
    }

    // Insertar un personaje en la base de datos (Recibe un objeto de tipo Personaje)
    public static function insertar($conn, $personaje)
    {
        // Obtener los valores antes de pasarlos a bindParam()
        $nombre = $personaje->getNombre();
        $apodo = $personaje->getApodo();
        $tipo_danio = $personaje->getTipoDanio();
        $casado = $personaje->getCasado();
        $en_equipo = $personaje->getEnEquipo();
        $clase = $personaje->getClase();
        $descripcion = $personaje->getDescripcion();
        $img = $personaje->getImg();

        // Ahora bindParam usando las variables
        $query = "INSERT INTO personajes (nombre, apodo, tipo_danio, casado, en_equipo, clase, descripcion, img) 
          VALUES (:nombre, :apodo, :tipo_danio, :casado, :en_equipo, :clase, :descripcion, :img)";
        $stmt = $conn->prepare($query);

        // Asignar las variables a los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apodo', $apodo);
        $stmt->bindParam(':tipo_danio', $tipo_danio);
        $stmt->bindParam(':casado', $casado);
        $stmt->bindParam(':en_equipo', $en_equipo);
        $stmt->bindParam(':clase', $clase);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':img', $img);

        /*$query = "INSERT INTO personajes (id, nombre, apodo, tipo_danio, casado, en_equipo, clase, descripcion, img)  
          VALUES ('64e6a35d-ff876', 'Nombre', 'Apodo', 'Tipo', 1, 1, 'Clase', 'Descripción', 'imagen.jpg')";*/

        try {
            // Ejecutar la consulta
            $stmt->execute();
        } catch (Exception $e) {
            print_r("Error al ejecutar la insercion de datos: " . $e->getMessage());
        }
    }

    // Obtener todos los personajes
    public static function cargar_datos($conn)
    {
        $query = "SELECT * FROM personajes";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un personaje por su id
    public static function cargar_por_id($conn, $id): array
    {
        $query = "SELECT * FROM personajes WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Eliminar un personaje por su id
    public static function eliminar_por_id($conn, $id): bool
    {
        // Consulta SQL para eliminar el personaje con el id proporcionado
        $query = "DELETE FROM personajes WHERE id = :id";

        // Preparar la consulta
        $stmt = $conn->prepare($query);

        // Vincular el parámetro :id con el valor recibido
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Ejecutar la consulta
        $stmt->execute();

        // Retornar true si se eliminó el registro, false en caso contrario
        return $stmt->rowCount() > 0;  // Si rowCount() > 0, se eliminó al menos una fila
    }
}
