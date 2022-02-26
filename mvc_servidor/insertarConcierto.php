<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Insertar Concierto</title>
</head>
<body>
   <div class="container">
       <?php

       $dF = array();
       // comprobamos que la variable ha sido inicializada y no está vacía
       if(isset($_POST) && !empty($_POST)){

            // creo el cliente SOAP            
            $cliente = new SoapClient(null, array(
                'location' => "http://localhost/mvcJonathan/mvc_servidor/server.php",
                'uri'      => "http://localhost/mvcJonathan/mvc_servidor",
                'trace'    => 1 ));

            $dF = $cliente->insertarSOAP($_POST);

       }
       // si la variable POST está vacía, le damos un valor vacío a los valores del array para evitar errores cuando entremos la primera vez
       else{
           $dF['valido']=false;
           $dF['errores']=array();
           $dF['valores']=array();
           $dF['valores']['titulo']='';
           $dF['valores']['fechayhora']='';
           $dF['valores']['ciudad']='';
           $dF['valores']['imagen']='';
       }

       // comprobamos si los datos se han insertado bien o no, 
       if(!empty($dF) && $dF['valido']==true){
            // aqui redireccionar con header para evitar el reenvío del formulario
            header("Status: 301 Moved Permanently");
            header("Location: confirmacion.html");

       } else {

       ?>

        <!-- CREACIÓN DE FORMULARIO -->
        <!-- guardamos los valores del formulario mediante la variable POST -->
        <form action="insertarConcierto.php" method=post>
                <fieldset>
                    <legend><h2>INSERTAR CONCIERTO</h2></legend>
                    <label>Título</label><br/>
                    <!-- En el value indico con php que me inserte el valor en el input en caso de que hubiese -->
                    <input type="text" name="titulo" value="<?php echo $dF['valores']['titulo'];?>" /><br />
                    <!-- Si la variable de error está definida y no vacía se le mostrará el mensaje de error en rojo -->
                    <?php
                    if(isset($dF['errores']['titulo']) && !empty($dF['errores']['titulo'])){
                        echo '<span class="rojo">'.$dF['errores']['titulo'].'</span><br/>';
                    }
                    ?> <br/>
                    <label>Fecha y hora</label><br/>
                    <input type="datetime-local" name="fechayhora" value="<?php echo $dF['valores']['fechayhora'];?>"/><br />
                    <?php
                    if(isset($dF['errores']['fechayhora']) && !empty($dF['errores']['fechayhora'])){
                        echo '<span class="rojo">'.$dF['errores']['fechayhora'].'</span><br/>';
                    }
                    ?><br/>
                    <label>Ciudad</label><br/>
                    <input type="text" name="ciudad" value="<?php echo $dF['valores']['ciudad'];?>"/><br />
                    <?php
                    if(isset($dF['errores']['ciudad']) && !empty($dF['errores']['ciudad'])){
                        echo '<span class="rojo">'.$dF['errores']['ciudad'].'</span><br/>';
                    }
                    ?><br/>
                    <label>Imagen representativa</label><br/>
                    <input type="text" name="imagen" value="<?php echo $dF['valores']['imagen'];?>" placeholder="Insertar URL"/><br />
                    <?php
                    if(isset($dF['errores']['imagen']) && !empty($dF['errores']['imagen'])){
                        echo '<span class="rojo">'.$dF['errores']['imagen'].'</span><br/>';
                    }
                    ?><br/>
                    <button type="submit"> Insertar</button>
                </fieldset>
            </form>
                 
       <?php
       }
       ?>
       
       </div> 
</body>
</html>