<?php
    if( $_POST["usuario_txt"] == "dani" && $_POST["password_txt"] == "dani" ){
        //Iniciamos la sesio con la funcion session_start
        session_start();

        //Declaro las variables de sesion
        $_SESSION["autentificado"] = true;
        $_SESSION["usuario"] = $_POST["usuario_txt"];

        header("Location: archivo-protegido.php");
    }else{
        header("Location: index.php?error=si");
    }
?>