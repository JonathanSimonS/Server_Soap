<?php
require_once("bd/bd.php");

// compruebo si la variable POST no está vacía, por si tiene datos, pasárselos al método
if(!empty($_POST)){
    require_once("controlador/conciertosControlador.php");
    conciertosControlador::insertar($_POST);
    // redirigimos en el index a la confirmación una vez se haya insertado correctamente para evitar
    header("Location: vista/conciertos/confirmacion.html");
}else{
    header("Status: 301 Moved Permanently");
    header("Location: vista/conciertos/insertarConcierto.php");
    exit();
}
    
