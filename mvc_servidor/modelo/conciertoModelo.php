<?php
require_once("bd/bd.php");

class conciertoModelo extends bd{
    
    private $datos;
    
    public function __construct(){
        // invoco al constructor de la clase padre que tiene la conexión
        parent::__construct();  
        
        // creo el array para usarlo en cualquier objeto de la clase ya inicializado
        $this->datos = array();
        $this->datos['valido'] = true;
        $this->datos['errores'] = array();
        $this->datos['valores'] = array();
        $this->datos['valores']['titulo'] = '';
        $this->datos['valores']['fechayhora'] = '';
        $this->datos['valores']['ciudad'] = '';
        $this->datos['valores']['imagen'] = '';
    }

    // método encargado de asignar los datos que llegan de la variable POST
    public function setDatos($dt){        
        if(isset($dt['titulo'])){
            $this->datos['valores']['titulo']=$dt['titulo']; // asigno el título del array, al título de la variable POST
        }
        if(isset($dt['fechayhora'])){
            $this->datos['valores']['fechayhora']=$dt['fechayhora'];
        }
        if(isset($dt['ciudad'])){
            $this->datos['valores']['ciudad']=$dt['ciudad'];
        }
        if(isset($dt['imagen'])){
            $this->datos['valores']['imagen']=$dt['imagen'];
        }
    }
    
    public function getDatos(){
        return $this->datos;
    }

    public function insertar(){
        $this->validar();

        if($this->datos['valido']==true){
            $consulta = $this->conexion->prepare("INSERT INTO conciertos (id, titulo, fechayhora, ciudad, imagen) VALUES (:i, :t, :f, :c, :im)");
            $id = $this->generarUID();
            $consulta->bindParam(':i', $id);
            $consulta->bindParam(':t', $this->datos['valores']['titulo']);

            // establezco el formato de la fecha
            $fecha = $this->datos['valores']['fechayhora'];
            $fechaFormateada = date("d/m/Y H:i", strtotime($fecha));

            $consulta->bindParam(':f', $fechaFormateada);
            $consulta->bindParam(':c', $this->datos['valores']['ciudad']);
            $consulta->bindParam(':im', $this->datos['valores']['imagen']);
            $consulta->execute();
            $consulta->closeCursor();
            $consulta = null;
        }
    }
        
    private function validar(){
        // almaceno los errores que pudiera haber en el array creado en el constructor
        $this->errores = array();

        if(empty($this->datos['valores']['titulo'])){
            $this->datos['valido'] = false;
            $this->datos['errores']['titulo']='El campo no puede estar vacío.';
        }
        if(empty($this->datos['valores']['fechayhora'])){
            $this->datos['valido'] = false;
            $this->datos['errores']['fechayhora']='El campo no puede estar vacío.';
        }
        
        if(empty($this->datos['valores']['ciudad'])){
            $this->datos['valido'] = false;
            $this->datos['errores']['ciudad']='El campo no puede estar vacío.';
        }
        if(empty($this->datos['valores']['imagen'])){
            $this->datos['valido'] = false;
            $this->datos['errores']['imagen']='El campo no puede estar vacío.';
        }
    }

    public function getConciertos($ciudad){  
        // compruebo que el paŕametro no esté vacío, en el caso de que lo esté devuelvo un concierto al azar
        if (empty($ciudad)) {
            $consulta = $this->conexion->prepare("SELECT * FROM conciertos  ORDER BY RAND() LIMIT 1"); // devuelvo 1 fila al azar
        } else {
            $consulta = $this->conexion->prepare("SELECT * FROM conciertos WHERE ciudad=:c ORDER BY RAND() LIMIT 1");
            $consulta->bindParam(':c', $ciudad);
        }

        $consulta->execute();
        $this->datos = $consulta->fetchAll();
        $consulta->closeCursor();
        $consulta = null;
        return $this->datos;
    } 

    public function getCiudades(){    // DISTINCT para que no me devuelva ciudades duplicadas
        $consulta = $this->conexion->prepare("SELECT DISTINCT ciudad FROM conciertos ORDER BY ciudad");
        $consulta->execute();
        $this->datos = $consulta->fetchAll();
        $consulta->closeCursor();
        $consulta = null;
        return $this->datos;        // devuelvo todas las ciudades
    } 

    // Método para generar el UID automáticamente
    private function generarUID(){
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));
    }
}