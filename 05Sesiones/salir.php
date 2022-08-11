<?php
    //Siempre que trabaje sesiones la tengo que levantar
    session_start();
    //Para destruir una sesion se usa la funcion session_destroy()
    session_destroy();

    header("Location: index.php")
?>