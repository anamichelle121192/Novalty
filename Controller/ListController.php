<?php

    require('Model/Conexion.php');

    $con = new Conexion();

    $lista = $con->listar_hec_trabajador();

    $listaFormaPago= $con->listar_dim_forma_pago();

    $listaBanco= $con->listar_dim_banco();

    $listaCargoTrabajador= $con->listar_dim_cargo_trabajador();


    require('Views/ListView.php');
?>