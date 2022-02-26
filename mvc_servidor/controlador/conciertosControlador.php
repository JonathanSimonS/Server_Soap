<?php
require_once("modelo/conciertoModelo.php");

    /**
    * Documentación para generación automática del documento WSDL
    * 
    * @author Jonathan Simón Sánchez
    * @version 1.0
    */
class conciertosControlador{

    /**
    * Inserta un concierto en la base de datos
    * 
    * @param array datos de la variable POST
    */
    static function insertar($dt){
        $modelo = new conciertoModelo();    // instancio la clase, con el array inicializado
        $modelo->setDatos($dt);             // se asignan los datos
        $modelo->insertar();                // se insertan los datos

        require_once("vista/conciertos/insertarConcierto.php");
    }    

    /**
    * Devuelve un concierto
    *
    * @return array con un concierto aleatorio de la ciudad enviada por parámetro, si no hubiese ciudad, devuelve un concierto aleatorio de entre todos los conciertos
    * @param string ciudad donde se realizará el concierto
    *
    */
    static function getConcierto($ciudad){
        $modelo = new conciertoModelo();    // instancio la clase, con el array inicializado
        $datos=$modelo->getConciertos($ciudad); // obtengo todos los conciertos de esa ciudad
        return $datos;
    }

    /**
    * Devuelve las ciudades donde hay concierto
    *
    * @return array de ciudades si existen conciertos
    */
    static function getCiudades(){
        $modelo = new conciertoModelo();    // instancio la clase, con el array inicializado
        $ciudades=$modelo->getCiudades(); 
        return $ciudades;
    }
}