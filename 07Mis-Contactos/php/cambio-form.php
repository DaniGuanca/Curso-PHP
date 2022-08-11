<!-- Reutilizo los campos que use en el form de alta -->
<div>
    <label for="email">Email: </label>
    <input type="email" id="email" class="cambio" name="email_txt" placeholder="Ingresa tu mail" 
    value="<?php echo $registro_contacto["email"] ?>"title="Tu Email" disabled required/>

    <!-- Cuando se pone disabled un input su value va a pasar vacio y yo necesito el email
    para la consulta, asi que lo pongo en un input hidden -->
    <input type="hidden" name="email_hdn" value="<?php echo $registro_contacto["email"] ?>" />
</div>
<div>
    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" class="cambio" name="nombre_txt" placeholder="Ingresa tu nombre" 
    value="<?php echo $registro_contacto["nombre"] ?>" title="Tu Nombre" required/>
</div>
<div>
    <label for="m">Sexo: </label>
    <input type="radio" id="m" name="sexo_rdo" title="Tu Sexo" value="M" <?php if ($registro_contacto["sexo"] == "M"){ echo "checked"; } ?> required/>&nbsp;<label for="m">Masculino</label>
    <input type="radio" id="f" name="sexo_rdo" title="Tu Sexo" value="F" <?php if ($registro_contacto["sexo"] == "F"){ echo "checked"; } ?> required/>&nbsp;<label for="m">Femenino</label>
</div>
<div>
    <label for="nacimiento">Fecha de Nacimiento: </label>
    <input type="date" name="nacimiento_txt" id="nacimiento" class="cambio" title="Fecha de Nacimiento" 
    value="<?php echo $registro_contacto["nacimiento"] ?>" required />
</div>
<div>
    <label for="telefono">Telefono: </label>
    <input type="number" id="telefono" class="cambio" name="telefono_txt" placeholder="Ingresa tu telefono" 
    value="<?php echo $registro_contacto["telefono"] ?>" title="Tu Telefono" required />
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
        <!-- Con el hidden hago algo similar a lo de id -->
        <input type="hidden" name="foto_hdn" value="<?php echo $registro_contacto["imagen"] ?>" />
    </div>
    <!-- Para ver visualmente la imagen -->
    <div>
        <img src="<?php echo "img/fotos/".$registro_contacto["imagen"]; ?>" />
    </diV>
</div>
<div>
    <input type="submit" id="enviar-alta" class="cambio" name="enviar_btn" value="Modificar" />
</div>
