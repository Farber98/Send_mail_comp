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
             
             <input type="text" class="form-control" name= "nombre" id="nombre" placeholder="Nombre: " value=""> <?php //Agregamos un input tipo text para ingresar el nombre. ?>

             <input type="email" class="form-control" name= "correo" id="correo" placeholder="Correo: " value=""> <?php //Agregamos un input tipo email para ingresar el correo ?>

             
            <textarea name="mensaje" placeholder="Mensaje: " class="form-control" id="mensaje" > </textarea> <?php //Averiguar porque no me anda el placeholder. ?>

           

            <input type="submit" name="submit" class="boton btn-primary" value="Enviar correo">
        </form>    
    </div> <?php //Creamos un contenedor ?>         

</body>
</html>