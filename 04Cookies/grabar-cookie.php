<?php
    /* Para grabar o guardar una cookie se usa la funcion setcookie()
    Recibe varios parametros:
        1° Recibe el nombre 
        2° El valor que va a tener la cookie
        3° La duracion de la cookie. En el ejercicio pongo, time() + 86400 ,que equivale a 24 horas desde el momento en que se hace
        4° En que directorio va a vivir la cookie, si no se especifica solo se puede usar en el mismo archivo
            Para que la cookie funcione se tiene que especificar la ruta del directorio en el cuarto parametro
            con "/", se entiende que la cookie existira en todo el directorio del sitio

    Entonces la funcion queda asi:
        * setcookie("nombre", valor, duracion, "/"); */
    
    setcookie("idioma_solicitado",$_GET["idioma"], time() + 86400, "/");
    
    //Redirecciono usar-cookie.php
    header("Location: usar-cookie.php");
?>