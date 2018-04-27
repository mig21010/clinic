<?php  
require '../config/conexion.php';

$consulta2 = "SELECT * FROM `detalle_producto` WHERE id_detalle = ".$_GET['Id_Detalle']."";
$result = mysqli_query($conexion,$consulta2);
              
$detalle = mysqli_fetch_array($result);

echo json_encode([
  'precio' => $detalle['precio_clinica'],
  'precio2' => $detalle['precio_publico'],
  'precio3' => $detalle['precio_cosmetologa'],
  'precio4' => $detalle['precio_promocion']
]);

?>