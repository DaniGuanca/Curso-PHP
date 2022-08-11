<br/>
<div>
    <!-- Esto va a hacer que la variable op=consultas cuando se haga el submit por get, es similar a  window.location= `?op=consultas-->
    <input type="hidden" name="op" value="consultas"/>
    <label for="m">Sexo: </label>
    <input type="radio" id="m" name="sexo_rdo" value="M" <?php if($_GET["sexo_rdo"]=="M") echo "checked";?>/><label for="m"> Masculino</label>
    &nbsp;
    <input type="radio" id="f" name="sexo_rdo" value="F" <?php if($_GET["sexo_rdo"]=="F") echo "checked";?>/><label for="f"> Femenino</label>
</div>
<input type="submit" id="enviar-buscar" class="cambio" name="enviar_btn" value="Buscar"/>

<?php 
    if($_GET["sexo_rdo"] != null){
        $sexo = $_GET["sexo_rdo"];
        $consulta = "SELECT * FROM contactos WHERE sexo='$sexo'";
        include("php/tabla-resultados.php");
    }
?>