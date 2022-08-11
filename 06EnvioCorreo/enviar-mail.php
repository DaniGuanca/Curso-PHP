<?php
    /* EL CODIGO ESTA BIEN PERO NO VA A FUNCIONAR PORQUE NO PUEDO ENVIAR MAIL SIN TENER INSTALADO UN MOTOR DE 
    PROTOCOLO SMTP QUE SE USA PARA ENVIER MAILS. SI LO TUVIERA FUNCIONA PERFECTAMENTE */


    $de = $_POST["de_txt"];
    $para = $_POST["para_txt"];
    $asunto = $_POST["asunto_txt"];
    $mensaje = $_POST["mensaje_txa"];
    //Especifico la cabecera del mensaje
    $cabeceras = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1\r\nFrom: $de \r\n";

    /* Para enviar MAILS por PHP se usa la funcion mail() que recibe 4 parametros:
    1° Destinatario
    2° Asunto
    3° Mensaje
    4° Cabecera 
    Devuelve true si envio y false si no*/
    if(mail($para,$asunto,$mensaje,$cabeceras)){
        $respuesta = "El mensaje se envio :)";
    }else {
        $respuesta = "Error en el envio :(";    
    }
    header("Location: formulario-mail.php?respuesta=$respuesta");
?>