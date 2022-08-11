<script>
    //Para cuando seleccione un valor del combo
    document.addEventListener("DOMContentLoaded", function() {
        const $select = document.getElementById("contacto-lista");

        $select.addEventListener("change", e =>{
            //Al no poner nombre de archivo preprocesa el mismo archivo osea index
            //Le mando el valor del contacto por GET en la url
            window.location=`?op=cambios&contacto_slc=${e.target.value}`;
        });

    });
    
</script>


<form id="cambios-contacto" name="cambio_frm" action="php/modificar-contacto.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Cambio de Contacto</legend>
        <div>
            <label for="contacto-lista">Contacto: </label>
            <select id="contacto-lista" class="cambio" name="contacto_slc" required>
                <option value="">- - -</option>
                <?php include("select-email.php")?>
            </select>
        </div>

        <!-- Aca voy a trabajar lo que pasa despues de que elige el contacto, como redirecciono
        con la variable por get en la misma pagina puedo usar el $_GET para cachar la variable -->
        <?php
            if($_GET["contacto_slc"] != null){

                $contacto = $_GET["contacto_slc"];

                //En select email ya use conexion asi que aca uso conexion2
                $conexion2 = conectarse();

                $consulta_contacto = "SELECT * FROM contactos WHERE email='$contacto'";

                $ejecutar_consulta_contacto = $conexion2->query($consulta_contacto);

                //Guardo el registro
                $registro_contacto = $ejecutar_consulta_contacto->fetch_assoc();

                //Mostrar el formulario
                include("php/cambio-form.php");
            }
            
            //Mensajes
            include("php/mensajes.php");
        ?>
    </fieldset>
</form>