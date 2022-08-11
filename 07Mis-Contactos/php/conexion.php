<?php
    //Esta funcion hace la conexion a la bd, la hago en este archivo para importar y hacer mas rapido y facil todo

    function conectarse() {
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $bd = "mis_contactos";

        $conectar = new mysqli($servidor, $usuario, $password, $bd);

        //El retorno
        return $conectar;
    }

    //La variable conexion que invoca la funcion y ademas que voy a usar en los otros pasos
    $conexion = conectarse();
?>