<?php 
class Servicio {
    public $nombre;
    public $descripcion;
    public $imagen;

    public function __construct($args = []) {
        $this->nombre = $args["nombre"] ?? '';
        $this->descripcion = $args["descripcion"] ?? '';
        $this->imagen = $args["imagen"] ?? '';
    }

    public function validar(){
        $alertas = [];

        if(!$this->nombre)
            $alertas[] = "El nombre es obligatorio";

        if(!$this->descripcion)
            $alertas[] = "La descripción es obigatoria";

        return $alertas;
    }

    public function guardar(){
        $sql = "INSERT INTO servicios(nombre, descripcion)
                VALUES('{$this->nombre}', '{$this->descripcion}')";
        echo $sql;
    }

    public static function find(int $id) {
        $dbPDO = new PDO("mysql:host=localhost;dbname=veterinaria", 'iestpffaa', '123456');
        $query = "SELECT * FROM servicios WHERE id = :idServicio";
        $statementPDO = $dbPDO->prepare($query);
        $statementPDO->bindParam(":idServicio", $id);
        $statementPDO->execute();
        $resultado = $statementPDO->fetch(PDO::FETCH_ASSOC);
        if($resultado){
            $servicio = new Servicio($resultado);
            return $servicio;
        }
        return null;
    }
}