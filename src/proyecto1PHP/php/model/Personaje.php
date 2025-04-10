<?
class Personaje implements JsonSerializable
{
    private ?int $id;
    private ?string $nombre;
    private ?string $apodo;
    private ?string $tipo_danio;
    private ?int $casado;
    private ?int $en_equipo;
    private ?string $clase;
    private ?string $descripcion;
    private ?string $img;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->recortarString($nombre, 50);
    }

    public function getApodo()
    {
        return $this->apodo;
    }

    public function setApodo($apodo)
    {
        $this->apodo = $this->recortarString($apodo, 50);
    }
    public function getTipoDanio()
    {
        return $this->tipo_danio;
    }

    public function setTipoDanio($tipo_danio)
    {
        $this->tipo_danio = $tipo_danio;
    }

    public function getClase()
    {
        return $this->clase;
    }

    public function setClase($clase)
    {
        $this->clase = $clase;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->recortarString($descripcion, 200);
    }

    public function getCasado()
    {
        return $this->casado;
    }

    public function setCasado($casado)
    {
        $this->casado = $casado;
    }

    public function getEnEquipo()
    {
        return $this->en_equipo;
    }

    public function setEnEquipo($en_equipo)
    {
        $this->en_equipo = $en_equipo;
    }
    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $this->recortarString($img, 255);
    }

    // Constructor
    public function __construct(
        $id=null,
        $nombre = null,
        $apodo = null,
        $tipo_danio = null,
        $casado = null,
        $en_equipo = null,
        $clase = null,
        $descripcion = null,
        $img = null
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apodo = $apodo;
        $this->tipo_danio = $tipo_danio;
        $this->casado = $casado;
        $this->en_equipo = $en_equipo;
        $this->clase = $clase;
        $this->descripcion = $descripcion;
        $this->img = $img;
    }

    // Método para recortar un string si es mayor a una longitud determinada
    public function recortarString($string, $longitudMaxima):string
    {
        if (strlen($string) > $longitudMaxima) {
            // Recorta el string y añade "..." si es mayor
            return substr($string, 0, $longitudMaxima);
        }
        return $string;
    }
    
    public function jsonSerialize() : array{
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apodo' => $this->apodo,
            'tipo_danio' => $this->tipo_danio,
            'casado' => $this->casado,
            'en_equipo' => $this->en_equipo,
            'clase' => $this->clase,
            'descripcion' => $this->descripcion,
            'img' => $this->img
        ];
    }
};
