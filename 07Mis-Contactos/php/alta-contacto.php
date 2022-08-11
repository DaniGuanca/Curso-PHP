<form id="alta-contacto" name="alta-frm" action="php/agregar-contacto.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Alta de Contacto</legend>
        <div>
            <label for="email">Email: </label>
            <input type="email" id="email" class="cambio" name="email_txt" placeholder="Ingresa tu mail" title="Tu Email" required/>
        </div>
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" class="cambio" name="nombre_txt" placeholder="Ingresa tu nombre" title="Tu Nombre" required/>
        </div>
        <div>
            <label for="m">Sexo: </label>
            <input type="radio" id="m" name="sexo_rdo" title="Tu Sexo" value="M" required/>&nbsp;<label for="m">Masculino</label>
            <input type="radio" id="f" name="sexo_rdo" title="Tu Sexo" value="F" required/>&nbsp;<label for="m">Femenino</label>
        </div>
        <div>
            <label for="nacimiento">Fecha de Nacimiento: </label>
            <input type="date" name="nacimiento_txt" id="nacimiento" class="cambio" title="Fecha de Nacimiento" required />
        </div>
        <div>
            <label for="telefono">Telefono: </label>
            <input type="number" id="telefono" class="cambio" name="telefono_txt" placeholder="Ingresa tu telefono" title="Tu Telefono" required />
        </div>
        <div>
            <label for="pais">Pais: </label>
            <select name="pais_slc" id="pais" class="cambio" required>
                <option value="">- - -</option>
                <!-- Voy a traer los paises por php -->
                <?php include("select-pais.php"); ?>
            </select>
        </div>
        <div>
            <label for="foto">Foto: </label>
            <div class="adjuntar-archivo cambio">
                <input type="file" id="foto" name="foto_fls" title="Sube tu Foto"/>
            </div>
        </div>
        <div>
            <input type="submit" id="enviar-alta" class="cambio" name="enviar_btn" value="Agregar" />
        </div>

        <!-- En agregar-contacto.php voy a retonar un mensaje que voy a mostrar acá -->
        <?php include("php/mensajes.php") ?>

    </fieldset>
</form>