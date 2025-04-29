<? class Conexion
{
    private string $host = "db"; //host, en este caso el del docker
    private string $dbname = "mydb";  //bbdd
    private string $username = "root";  // usaurio
    private string $password = "contraseña";  // contraseña
    private static PDO $conn;

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

            // $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
            // self::$conn = new PDO($dsn, $this->username, $this->password);

            // Configuramos el modo de error de PDO para lanzar excepciones
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo ("Error de conexión con la base de datos: " . $e->getMessage());
        }
    }

    public static function get_conection(): PDO
    {
        // Si la conexión ya existe, la devuelve
        if (isset(self::$conn)) {
            return self::$conn;
        }

        // Si no existe, crea la conexión (llama al constructor)
        new Conexion();

        return self::$conn; // Devuelve la conexión
    }

    //Method to disconect
    public static function desconectar(PDO $conn)
    {
        $conn = null;
    }

    //Crear la tabla en la bbdd
    public static function crear_tabla(PDO $conn)
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
    public static function insertar(PDO $conn, Personaje $personaje)
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
            error_log("Error al ejecutar la insercion de datos: " . $e->getMessage());
        }
    }

    //Metodo para actualizar un personaje ya presente en la bbdd:
    public static function update(PDO $conn,Personaje $personaje):bool{
        
        $id=$personaje->getId();
        $nombre=$personaje->getNombre();
        $apodo=$personaje->getApodo()();
        $casado=$personaje->getCasado();
        $en_equipo=$personaje->getEnEquipo();
        $descripcion=$personaje->getDescripcion();

        $query = "UPDATE TABLE mydb set nombre= :nombre, apodo= :apodo, casado= :casado,en_equipo= :en_equipo, descripcion= :descripcion
                    where id= :id";
        $stmt = $conn->prepare($query);

         // Asignar las variables a los parámetros
         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':nombre', $nombre);
         $stmt->bindParam(':apodo', $apodo);
         $stmt->bindParam(':casado', $casado);
         $stmt->bindParam(':en_equipo', $en_equipo);
         $stmt->bindParam(':descripcion', $descripcion);

         try {
            // Ejecutar la consulta
            $stmt->execute();
        } catch (Exception $e) {
            error_log("Error al ejecutar la actualizacion de datos: " . $e->getMessage());
        }finally{
            
            // Retornar true si se eliminó el registro, false en caso contrario
            return $stmt->rowCount() > 0;  // Si rowCount() > 0, se eliminó al menos una fila
        }
    }

    // Obtener todos los personajes
    public static function cargar_datos(PDO $conn)
    {
        $query = "SELECT * FROM personajes";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un personaje por su id
    public static function cargar_por_id(PDO $conn,int $id): array
    {
        $query = "SELECT * FROM personajes WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Eliminar un personaje por su id
    public static function eliminar_por_id(PDO $conn,int $id): bool
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
