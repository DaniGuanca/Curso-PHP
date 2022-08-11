<?php
    $nombre = "dani";
    $password = "guanca";

    if (isset($_GET["enviar_hdn"])){
        if($nombre == $_GET["nombre_txt"] && $password == $_GET["password_txt"]){
            echo "El nombre que ingresaste por GET es ".$_GET["nombre_txt"].
            ".<br/>El password que ingresaste por GET es ".$_GET["password_txt"].
            ".<br/>El sexo que seleccionaste es ".$_GET["sexo_rdo"].".";
        }else {
            //header() es para establecer tipos de cabeceras pero tambien sirve para redirigir el flujo de la aplicacion PHP
            //para usar para redireccion es header("Location: direccion que quiero mandar")
            header("Location: formulario.php?error=si");
        }
    }else if (isset($_POST["enviar_hdn"])){
        if($nombre == $_POST["nombre_txt"] && $password == $_POST["password_txt"]){
            echo "El nombre que ingresaste por GET es ".$_POST["nombre_txt"].
            ".<br/>El password que ingresaste por GET es ".$_POST["password_txt"].
            ".<br/>El sexo que seleccionaste es ".$_POST["sexo_rdo"].".";
        }else {
            //header() es para establecer tipos de cabeceras pero tambien sirve para redirigir el flujo de la aplicacion PHP
            //para usar para redireccion es header("Location: direccion que quiero mandar")
            header("Location: formulario.php?error=si");
        }
    }
?>