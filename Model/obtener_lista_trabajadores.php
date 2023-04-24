<?php

$con = new mysqli('199.250.220.118:3306', 'gnoval5_uana', 'bJYPIEr.zM{x', 'gnoval5_ana');
$formaPago = $_POST["formaPago"];
$lista = array();
$stmt = $con->prepare("CALL listar_hec_trabajador_filtrar(?)");
$stmt->bind_param("i", $formaPago);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
$lista[] = $row;
}
$stmt->close();
$con->close();
foreach ($lista as $item) {
echo "<tr>";
echo "<td class='novalty-text-align-center'>".($i+=1)."</td>";
echo "<td class='novalty-text-align-center'>".$item['tra_dni']."</td>";
echo "<td class='novalty-text-align-center'>".$item['tra_ape']." ".$item['tra_nom']."</td>";
echo "<td class='novalty-text-align-center'>".$item['id_car_tra']."</td>";
echo "<td class='novalty-text-align-center'>".$item['id_for_pag']."</td>";
echo "<td class='novalty-text-align-center'><i class='bi bi-search text-success'></i><i class='bi bi-pencil-square text-primary'></i></td>";
 echo "</tr>";
}


?>