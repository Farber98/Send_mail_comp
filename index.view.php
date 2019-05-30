<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" href="styles.css">   <?php // Levantamos la vista del archivo styles.css ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> <?php //Especificamos la fuente que vamos usar mediante google fonts ?>
</head>
<body>
    <div class="wrap">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">    <?php //Creamos el form segun el action que queremos (metodo post). Redirigimos al usuario a la misma pagina una vez que se envian los archivos con %SERVER['PHP_SELF']?>                                                                 
             
             <input type="text" class="form-control" name= "nombre" id="nombre" placeholder="Nombre: " value="<?php if(!$enviado && isset($nombre)) echo $nombre; //Mantenemos los valores en caso de error.?>"> <?php //Agregamos un input tipo text para ingresar el nombre. ?>

             <input type="email" class="form-control" name= "correo" id="correo" placeholder="Correo: " value="<?php if(!$enviado && isset($correo)) echo $correo; //Mantenemos los valores en caso de error.?>"> <?php //Agregamos un input tipo email para ingresar el correo ?>

            <textarea class="form-control" name="mensaje" placeholder="Mensaje: "  ><?php if(!$enviado && isset($mensaje)) echo $mensaje;   //Mantenemos los valores en caso de error. ?></textarea> <?php //Averiguar porque no me anda el placeholder. OJO CON LOS ESPACIOS QUE NO MUESTRA EL PLACEHOLDER PORQUE LO TOMA COMO TEXTO.?>

           <?php if(!empty($errores)): ?>   <?php //Mostramos el contenido de la variable error si no esta vacia.  ?>
                <div class="alert error">
                    <?php echo $errores;   ?>  <?php //Mostramos el contenido de la variable error si no esta vacia.  ?>
                </div>
            <?php elseif($enviado): ?>  <?php  //Variable enviado es true cuando se hayan rellenado todos los datos correctamente ?>
                <div class="alert success">
                    <p>Enviado correctamente.</p>
                </div>
            <?php endif ?>

            <input type="submit" name="submit" class="boton btn-primary" value="Enviar correo">
        </form>    
    </div> <?php //Creamos un contenedor ?>         

</body>
</html>