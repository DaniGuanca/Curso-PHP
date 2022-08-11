<?php 
    //Guardo el valor del select que mando por POST
    $email = $_POST["email_slc"];

    //Conexion y seleccion de bd
    include("conexion.php");

    //Consulta
    $consulta = "DELETE FROM contactos WHERE email = '$email'";

    //Ejecuto consulta
    $ejecutar_consulta = $conexion->query($consulta);

    if($ejecutar_consulta){
        $mensaje = "El contacto con el email <b>$email</b> ha sido eliminado";
    }else{
        $mensaje = "No se pudo eliminar el contacto con el email <b>$email</b>";
    }

    //Cierro conexion
    $conexion->close();
    header("Location: ../index.php?op=baja&mensaje=$mensaje");

?>