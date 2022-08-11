<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de correo con la funcion mail de PHP</title>
    <style>
        form {
            margin: 1em auto;
            text-align: center;
        }

        span {
            color: #F60;
            font-size: 1.5em;
        }
    </style>
</head>
<body>
    <form name="mail_frm" action="enviar-mail.php" method="post" enctype="application/x-www-form-urlencoded">
        De: <input type="text" name="de_txt"/>
        <br><br>
        Para: <input type="text" name="para_txt"/>
        <br><br>
        Asunto: <input type="text" name="asunto_txt"/>
        <br><br>
        Mensaje: <br/>
        <textarea name="mensaje_txa"></textarea>
        <br><br>
        <input type="button" name="enviar_btn" value="Enviar"/>

        <?php
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
            
            if(isset($_GET["respuesta"])){
                echo "<span>".$_GET["respuesta"]."</span>";
            }
        ?>

        <script>
            function validarForm(){
                let verificar = true;
                //Uso la expresion regular
                //excec() evalua la expresion regular
                let expRegEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

                if(!document.mail_frm.de_txt.value){
                    alert("El campo 'De' es requerido");
                    document.mail_frm.de_txt.focus();
                    verificar = false;

                }else if(!expRegEmail.exec(document.mail_frm.de_txt.value)){
                    alert("El campo 'De' no es valido");
                    document.mail_frm.de_txt.focus();
                    verificar = false;

                } else  if(!document.mail_frm.para_txt.value){
                    alert("El campo 'Para' es requerido");
                    document.mail_frm.para_txt.focus();
                    verificar = false;

                }else if(!expRegEmail.exec(document.mail_frm.para_txt.value)){
                    alert("El campo 'Para' no es valido");
                    document.mail_frm.para_txt.focus();
                    verificar = false;

                } else  if(!document.mail_frm.asunto_txt.value){
                    alert("El campo 'Asunto' es requerido");
                    document.mail_frm.asunto_txt.focus();
                    verificar = false;
                } else  if(!document.mail_frm.mensaje_txa.value){
                    alert("El campo 'Mensaje' es requerido");
                    document.mail_frm.mensaje_txa.focus();
                    verificar = false;
                }

                if(verificar){
                    document.mail_frm.submit();
                }
            }

            document.addEventListener("click", e => {
                if (e.target == document.mail_frm.enviar_btn){
                    validarForm();
                }
            });
        </script>
    </form>
</body>
</html>