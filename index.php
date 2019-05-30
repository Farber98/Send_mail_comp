<?php 



$errores = '';  //Creamos la variable errores para luego concatenar.
$enviado = '';  //Creamos la variable enviado para chequear que los datos fueron llenados correctamente.


if(isset($_POST['submit']))     //Comprobamos si el formulario fue enviado. Si esta seteado es porque los datos fueron enviados por el metodo post.
{                          //OJO: Esto no significa que relleno los datos. Significa que apreto el boton enviar correo.
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];     //Ahora si verifico que se rellenen cada uno.
    $mensaje = $_POST['mensaje'];

    if(!empty($nombre)) //Si no esta vacia
    {
        $nombre = trim($nombre);        //Eliminamos espacios al principio y final.
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);  //Sanamos la variable nombre, eliminamos los caracteres especiales.
    }
    else
    {
        $errores .= 'Por favor ingresa un nombre <br/>';    //Operador .= concatena el texto de variable errores que ya tenemos y le agrega lo restante que pusimos.
    }


    if(!empty($correo)) //Si no esta vacia
    {
        $correo = trim($correo);        //Eliminamos espacios al principio y final.
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);  //Sanamos la variable correo con FILTER_SANITIZE_EMAIL, eliminamos los caracteres especiales.

        if(!filter_var($correo, FILTER_VALIDATE_EMAIL))  //Devuelve false si es un correo invalido. Sino devuelve el correo.
        {
            $errores .= 'Por favor ingresa un correo valido. <br/>';        //En caso de que el correo no sea valido.
        }
    }
    else
    {
        $errores .= 'Por favor ingresa un correo <br/>';    //En caso de que el correo no haya sido ingreado.
    }

    if(!empty($mensaje))
    {
        $mensaje = htmlspecialchars($mensaje);      //Para que no inyecten codigo html.
        $mensaje = trim($mensaje);              //Para eliminar espacios al principio y final.
        $mensaje = stripslashes($mensaje);      //Elimina diagonales.
        
    }
    else
    {
        $errores .= 'Por favor ingresa un mensaje <br/>';   //Porque esta vacio.
    }

    if(!$errores)   //Si no hay errores preparamos nuestro correo para enviar.
    {
        $enviar_a = 'tunombre@gmail.com';   //El correo al cual se enviaran todos los mails.
        $asunto = 'Correo enviado desde miPagina.com';
        $mensaje_preparado = "De: $nombre \n";
        $mensaje_preparado .= "Correo: $correo \n";     //Preparamos el formato del mensaje.
        $mensaje_preparado .= "Mensaje:" . $mensaje;

       // mail($enviar_a, $asunto, $mensaje_preparado);       //Funcion mail recibe estos parametros. No funciona en localhost pero cuando lo subamos al hosting tendria que funcionar.

        $enviado = true;    //Supongo que se pudo enviar.
    }
    
}          
require 'index.view.php';    //Asociamos el archivo de la vista. PONER AL FINAL NO SE XQ PERO SE SOLUCIONA EL ERROR DE LAS VARIABLES.                  
?>