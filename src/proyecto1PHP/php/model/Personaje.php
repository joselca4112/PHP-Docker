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

    public function getId():?int
    {
        return $this->id;
    }

    public function setId(?int $id)
    {
        $this->id = $id;
    }

    public function getNombre():?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre)
    {
        $this->nombre = $this->recortarString($nombre, 50);
    }

    public function getApodo():?string
    {
        return $this->apodo;
    }

    public function setApodo(?string $apodo)
    {
        $this->apodo = $this->recortarString($apodo, 50);
    }
    public function getTipoDanio():?string
    {
        return $this->tipo_danio;
    }

    public function setTipoDanio(?string $tipo_danio)
    {
        $this->tipo_danio = $tipo_danio;
    }

    public function getClase(): ?string
    {
        return $this->clase;
    }

    public function setClase(?string $clase)
    {
        $this->clase = $clase;
    }

    public function getDescripcion():?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion)
    {
        $this->descripcion = $this->recortarString($descripcion, 200);
    }

    public function getCasado():?int
    {
        return $this->casado;
    }

    public function setCasado(?int $casado)
    {
        $this->casado = $casado;
    }

    public function getEnEquipo():?int
    {
        return $this->en_equipo;
    }

    public function setEnEquipo(?int $en_equipo)
    {
        $this->en_equipo = $en_equipo;
    }
    public function getImg():?string
    {
        return $this->img;
    }

    public function setImg(?string $img)
    {
        $this->img = $this->recortarString($img, 255);
    }

    // Constructor
    public function __construct(
        ?int $id=null,
        ?string $nombre = null,
        ?string $apodo = null,
        ?string $tipo_danio = null,
        ?int $casado = null,
        ?int $en_equipo = null,
        ?string $clase = null,
        ?string $descripcion = null,
        ?string $img = null
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
