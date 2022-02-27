<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../mvc_servidor/vista/css/css.css?2.0">
    <title>Listado de Conciertos</title>
</head>
<body>
   <div class="container">
        <h2>CONCIERTOS DESTACADOS</h2>
        <?php
            // creo el cliente SOAP
            $cliente = new SoapClient(null, array(
                'location' => "http://localhost/mvcJonathan/mvc_servidor/server.php",
                'uri'      => "http://localhost/mvcJonathan/mvc_servidor",
                'trace'    => 1 ));

            // si la variable existe, significa que se ha pulsado el enlace correspondiente a dicha ciudad
            // si no existe, se guarda una cadena vacía para evitar posibles fallos
            if (!empty($_GET["ciudad"])) {
                $conciertos = $cliente->getConcierto($_GET["ciudad"]);
            } else {
                $vacio = 0;
                $conciertos = $cliente->getConcierto($vacio);
            }

            // muestro los conciertos si la variable no está vacía
            // también muestro las ciudades donde hay concierto con su h3
            if(!empty($conciertos)){
                foreach($conciertos as $c){
                    echo '<div class="contgrupo"><img id="imggrupo" src="'.$c['imagen'].'" alt="Imagen proximamente" ></div>';
                    echo '<div class="controtulo"><ul>';
                        echo '<li><strong>GRUPO</strong></li>';
                        echo '<li class="textogrupo">'.$c['titulo'].'</li><br>';
                        echo '<li><strong>CIUDAD</strong></li>';
                        echo '<li class="textogrupo">'.$c['ciudad'].'</li>';
                    echo '</ul></div>'; 

                    // formateo la fecha para mostrarla en un formato correcto
                    $fecha = $c['fechayhora'];
                    $fechaFormateada= date("d/m/Y H:i", strtotime($fecha));

                    echo '<p>'.$fechaFormateada.'</p>';
                }
                echo '<div class="contdisfruta"><h3>Disfruta de otros conciertos en...</h3>';
        
                $ciudades = $cliente->getCiudades();
                echo '<ul>';
                foreach($ciudades as $ci){      // recorro el array ciudades y asigno la ciudad al GET mediante el enlace
                    echo '<tr>';
                        echo '<a href="index.php?ciudad='.$ci['ciudad'].'"><li id="ciudades" >'.$ci['ciudad'].'</li></a>';
                    echo '</tr>';
                }
                echo '</ul></div>'; 
            }else{
                    echo '<h4>Todavía no existe ningún concierto programado.</h4>';
                    echo '<img id="imgconcierto" src="concierto.jpg" alt="Imagen proximamente" >';
            }           
  
        ?>            
</div>
    
</body>
</html>