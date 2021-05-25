<?php 
session_start();

$eliminado = false;
$total = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;
$arreglo = array();
for ($i=0; $i <count($_SESSION['carrito']); $i++) { 
	if ($_SESSION['carrito'][$i]['Id']!=$_POST['Id']) {
		array_push($arreglo, $_SESSION['carrito'][$i]);
		// $total += $_SESSION["carrito"][$i]["Precio"];
		$total = ($_SESSION["carrito"][$i]['Precio Clinica']*$_SESSION["carrito"][$i]['Cantidad'])+$total;
		$total2 = ($_SESSION["carrito"][$i]['Precio Publico']*$_SESSION["carrito"][$i]['Cantidad'])+$total2;
		$total3 = ($_SESSION["carrito"][$i]['Precio Cosmetologa']*$_SESSION["carrito"][$i]['Cantidad'])+$total3;
		$total4 = ($_SESSION["carrito"][$i]['Precio Promo']*$_SESSION["carrito"][$i]['Cantidad'])+$total4;
	} else {
		$eliminado = true;
	}
}
	
$_SESSION["carrito"] = $arreglo;
echo json_encode([
	'eliminado' => $eliminado, 
	'total' => $total,
	'total2' => $total2,
	'total3' => $total3,
	'total4' => $total4
]);

?>