<?php
    //Cuando mandamos archivos se crea la variable global $_FILES

    //ESTO ES PARA VER COMO ESTA FORMADO LA CLAVE VALOR, NO HAY QUE MOSTRAR, SOLO ES EJEMPLO
    //Recorro los arhivos que mande de $_FILES y por cada posicion (clave) $clave quiero el $valor
    foreach ($_FILES["archivo_fls"] as $clave => $valor) {
        echo "Propiedad: $clave --- Valor: $valor <br/>";
    }

    //Ya vi que en tmp_name esta la ubicacion temporal del archivo, asi que me guardo esa ruta
    $archivo = $_FILES["archivo_fls"]["tmp_name"];

    //Ahora guardo el destino, el destino de los archivos es ruta + nombre asi que concateno el nombre
    $destino = "archivos/".$_FILES["archivo_fls"]["name"];

    if($_FILES["archivo_fls"]["type"] == "text/plain"){

        //move_uploaded_file es una funcion que recibe el archivo y el destino a donde mover el archivo
        //lo que hace es mover el archivo
        move_uploaded_file($archivo, $destino);
        echo "Archivo subido :)";

    }else{
        echo "Solo se admite archivos de texto plano <br/>
        <a href=\"enviar-archivo.php\">Regresar</a> ";
    } 
    
?>