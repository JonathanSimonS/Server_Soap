<?php

require_once("bd.php");

if(isset($_GET['controller']) && !empty($_GET['controller']) && isset($_GET['action']) && !empty($_GET['action']))
{
    switch($_GET['controller']){
        case 'conciertos':
            require_once("controllers/conciertosControlador.php");
            if(method_exists("conciertosControlador",$_GET['action'])){
                switch($_GET['action']){
                    case 'insertar':
                        conciertosControlador::insertarSOAP($dt);
                    break;}
            } else{
                conciertosControlador::insertarSOAP($dt);
            }            
        break;
        default:
            header("Status: 301 Moved Permanently");
            header("Location: index.php?controller=conciertos&action=insertar");
            exit();
        break;
    }
}   
else
{
    header("Status: 301 Moved Permanently");
    header("Location: index.php?controller=conciertos&action=insertar");
    exit();
}
    
