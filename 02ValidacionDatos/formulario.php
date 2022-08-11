<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Datos con PHP</title>
</head>
<body>
    <!-- Codigo PHP -->
    <?php
        //Para que no muestre la advertencia de que no esta inicializada la variable
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

        if($_GET["error"] == "si"){
            echo "<span style='color: #F00; font-size: 2em;'>VERIFICA TUS DATOS</span>";
        }
    ?>

    <hgroup><h1>Formulario de Datos GET</h1></hgroup>
    <form name="valida_datos_get_frm" action="validar-datos.php" method="get" 
    enctype="application/x-www-form-urlencoded">
        Ingresa tu nombre:
        <input type="text" name="nombre_txt" />
        <br/><br/>
        Ingresa tu password:
        <input type="password" name="password_txt"/>
        <br><br>
        <!-- Los input radio se tienen que llamar para que pueda elegir solo uno -->
        <input type="radio" name="sexo_rdo" value="M"/>
        Masculino&nbsp;
        <input type="radio" name="sexo_rdo" value="F"/>
        Femenino&nbsp;
        <br><br>
        <input type="hidden" name="enviar_hdn" value="get" />
        <input type="button" id="enviar-get" name="enviar_btn" value="Enviar por GET"/>
    </form>


    <hgroup><h1>Formulario de Datos POST</h1></hgroup>
    <form name="valida_datos_post_frm" action="validar-datos.php" method="post" 
    enctype="application/x-www-form-urlencoded">
        Ingresa tu nombre:
        <input type="text" name="nombre_txt" />
        <br/><br/>
        Ingresa tu password:
        <input type="password" name="password_txt"/>
        <br><br>
        <!-- Los input radio se tienen que llamar para que pueda elegir solo uno -->
        <input type="radio" name="sexo_rdo" value="M"/>
        Masculino&nbsp;
        <input type="radio" name="sexo_rdo" value="F"/>
        Femenino&nbsp;
        <br><br>
        <input type="hidden" name="enviar_hdn" value="post" />
        <input type="button" id="enviar-post" name="enviar_btn" value="Enviar por POST"/>
    </form>

    <script>

        const validarDatosGET = () => {
            let verificar = true;

            //Si no hay nada dentro del campo
            if(!document.valida_datos_get_frm.nombre_txt.value){
                alert("El campo nombre es requerido");
                //Regreso el foco al elemento
                document.valida_datos_get_frm.nombre_txt.focus();
                verificar = false;
            }else if (!document.valida_datos_get_frm.password_txt.value){
                alert("El campo password es requerido");
                //Regreso el foco al elemento
                document.valida_datos_get_frm.password_txt.focus();
                verificar = false;

                //Los input tipo radio tienen los valores en arreglos por eso [0]
                //NO USAN VALUE, USAN CHECKED para saber si estan seleccionados o no
            }else if (!document.valida_datos_get_frm.sexo_rdo[0].checked &&
            !document.valida_datos_get_frm.sexo_rdo[1].checked){
                alert("El campo sexo es requerido");
                //Regreso el foco al elemento
                document.valida_datos_get_frm.sexo_rdo[0].focus();
                verificar = false;
            }


            //Si todo esta bien hago el sumbit
            if(verificar){
                document.valida_datos_get_frm.submit();
            }
        };
        
        
        const validarDatosPOST = () => {
            let verificar = true;

            //Si no hay nada dentro del campo
            if(!document.valida_datos_post_frm.nombre_txt.value){
                alert("El campo nombre es requerido");
                //Regreso el foco al elemento
                document.valida_datos_post_frm.nombre_txt.focus();
                verificar = false;
            }else if (!document.valida_datos_post_frm.password_txt.value){
                alert("El campo password es requerido");
                //Regreso el foco al elemento
                document.valida_datos_post_frm.password_txt.focus();
                verificar = false;

                //Los input tipo radio tienen los valores en arreglos por eso [0]
                //NO USAN VALUE, USAN CHECKED para saber si estan seleccionados o no
            }else if (!document.valida_datos_post_frm.sexo_rdo[0].checked &&
            !document.valida_datos_post_frm.sexo_rdo[1].checked){
                alert("El campo sexo es requerido");
                //Regreso el foco al elemento
                document.valida_datos_post_frm.sexo_rdo[0].focus();
                verificar = false;
            }


            //Si todo esta bien hago el sumbit
            if(verificar){
                document.valida_datos_post_frm.submit();
            }
        };

        document.addEventListener('click', e => {
            if(e.target.matches("#enviar-get")) {
                validarDatosGET();
            }

            if(e.target.matches("#enviar-post")) {
                validarDatosPOST();
            }
        });
    </script>
</body>
</html>