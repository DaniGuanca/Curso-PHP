<form action="" id="consulta-contacto" name="consulta_frm" method="get">
    <fieldset>
        <legend>Consulta de Contactos</legend>
        <label for="consulta-lista">Tipo de Consulta: </label>
        <select name="consulta_slc" id="consulta-lista" required>
            <option value="">- - -</option>
            <!-- La parte del php dentro de los select es para cuando elija uno se quede seleccionado en el combo -->
            <option value="todos" <?php if($_GET["consulta_slc"] == "todos") echo "selected" ?>>Todos</option>
            <option value="email" <?php if($_GET["consulta_slc"] == "email") echo "selected" ?>>Por email</option>
            <option value="inicial" <?php if($_GET["consulta_slc"] == "inicial") echo "selected" ?>>Por inicial</option>
            <option value="sexo" <?php if($_GET["consulta_slc"] == "sexo") echo "selected" ?>>Por sexo</option>
            <option value="pais" <?php if($_GET["consulta_slc"] == "pais") echo "selected" ?>>Por pais</option>
            <option value="buscador" <?php if($_GET["consulta_slc"] == "buscador") echo "selected" ?>>Buscador</option>
        </select>
        <?php 
            switch($_GET["consulta_slc"])
            {
                case "todos":
                    include("php/consulta-todo.php");
                    break;
                
                case "email":
                    include("php/consulta-email.php");
                    break;

                case "inicial":
                    include("php/consulta-inicial.php");
                    break;

                case "sexo":
                    include("php/consulta-sexo.php");
                    break;

                case "pais":
                    include("php/consulta-pais.php");
                    break;

                case "buscador":
                    include("php/consulta-buscador.php");
                    break;
            }
        ?>
    </fieldset>
</form>
<script>
    
    document.addEventListener("DOMContentLoaded", e => {
        const $lista = document.getElementById("consulta-lista");

        $lista.addEventListener("change", event=>{
            //Redirecciono a la misma pagina y por url paso el valor del select asi lo agarra el GET
            window.location= `?op=consultas&consulta_slc=${event.target.value}`;

        });
        
    });
</script>