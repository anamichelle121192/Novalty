<?php

$con = new mysqli('199.250.220.118:3306', 'gnoval5_uana', 'bJYPIEr.zM{x', 'gnoval5_ana');
// $formaPago = $_POST["formaPago"];

// Definir los valores de los parámetros de entrada
$p_tra_dni = $_POST["documento"];
$p_tra_ape = $_POST["apellido"];
$p_tra_nom = $_POST["nombre"];
$p_id_car_tra = $_POST["selectCargo"];
$p_id_for_pag = $_POST["selectFormaPago"];
$p_id_ban = $_POST["selectBanco"];
$p_tra_num_cue = $_POST["nro_cuenta"];



// Preparar la consulta
$stmt = $con->prepare("CALL guardar_hec_trabajador(?, ?, ?, ?, ?, ?, ?)");
// Asignar los valores a las variables de la consulta
$stmt->bind_param("sssiidd",$p_tra_dni, $p_tra_ape, $p_tra_nom, $p_id_car_tra, $p_id_for_pag, $p_id_ban, $p_tra_num_cue);
if ($stmt->execute()) {
    echo "Procedimiento ejecutado correctamente.";
} else {
    echo "Error al ejecutar el procedimiento: " . $con->error;
}
?>