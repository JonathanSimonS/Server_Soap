<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/css.css">
    <title>Insertar Concierto</title>
</head>
<body>
   <div class="container">
       <?php

       $dF = array();
       // comprobamos que la variable ha sido inicializada y no está vacía
       if(empty($_POST)){

        // para evitar los errores en los campos, iniciamos los valores
           $dF['valido']=false;
           $dF['errores']=array();
           $dF['valores']=array();
           $dF['valores']['titulo']='';
           $dF['valores']['fechayhora']='';
           $dF['valores']['ciudad']='';
           $dF['valores']['imagen']='';
       }

       ?>

        <!-- CREACIÓN DE FORMULARIO -->
        <!-- guardamos los valores del formulario mediante la variable POST y redirigimos al index al enviarlo-->
        <form action="../../index.php" method=post>
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
                 
       </div> 
</body>
</html>