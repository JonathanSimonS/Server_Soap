<?php
require_once("bd/bd.php");

// compruebo si la variable POST no está vacía, por si tiene datos, pasárselos al método
if(!empty($_POST)){
    conciertosControlador::insertarSOAP($_POST);
}else{
    header("Status: 301 Moved Permanently");
    header("Location: vista/conciertos/insertarConcierto.php");
    exit();
}
    
