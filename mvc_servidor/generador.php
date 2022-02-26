<?php
require_once("controlador/conciertosControlador.php");
// Ruta a WSDLDocument
require_once("WSDLDocument.php");

// creo un nuevo objeto de la clase WSDLDocument para crear el archivo
$wsdl = new WSDLDocument(
    "conciertosControlador",                                    // nombre de la clase que gestionará las peticiones al servicio
    "http://localhost/mvcJonathan/mvc_servidor/server.php",     // URL en que se ofrece el servicio
    "http://localhost/mvcJonathan/mvc_servidor"                 // espacio de nombres destino
);

echo $wsdl->saveXML();