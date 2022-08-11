<?php
    //No hay una funcion para borrar una cookie entonces lo que hago es asignarle vacio al valor, y caducarla poniendo
    //su duracion en negativo
    setcookie("idioma_solicitado", "", time()-1, "/");
?>
<a href="usar-cookie.php">REGRESAR</a>