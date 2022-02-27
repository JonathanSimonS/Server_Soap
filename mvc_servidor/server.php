<?php

require_once("bd/bd.php");
require_once("controlador/conciertosControlador.php");

try {
    // Documento de descripción obtenid en el servicio
    // $server = new SoapServer("http://localhost/mvcJonathan/mvc_servidor/servicio.wsdl");
   
    $server = new SoapServer(
        null,  // este null corresponde a la ubicación del WSDL
        array('uri'=> 'http://localhost/mvcJonathan/mvc_server')
    );

} catch (SOAPFault $f) {
    print $f->faultstring;
}

// con setClass defino la clase que controla las peticiones SOAP
$server->setClass('conciertosControlador');

// con handle procesa una petición SOAP, llama a las funciones necesarias y envía una respuesta.
$server->handle();