<?php
session_start();
$arreglo=$_SESSION['carrito'];
//$arreglo=[['Imagen' => '', 'Nombre' => 'Pastel', 'Precio' => 500, 'Cantidad' =>2, 'Id' =>1]]; 
$total=0;
$total2=0;
$total3=0;
$total4=0;
$numero=0;
//como guardamos en el arreglo, ahora lo recorremos
for ($i=0; $i <count($arreglo) ; $i++) { 
    //verificamos que exista en el arreglo
    if ($arreglo[$i]['Id']==$_POST['Id']) {                
        //para saber la posicion en el arreglo donde esta el id
        $numero=$i;
    }
}
$arreglo[$numero]['Cantidad']=$_POST['Cantidad'];
for ($i=0; $i <count($arreglo); $i++) { 
    //$total=(($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])+(($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])*0.16))+$total;
    $total  = ($arreglo[$i]['Precio Clinica']*$arreglo[$i]['Cantidad'])+$total;
    $total2 = ($arreglo[$i]['Precio Publico']*$arreglo[$i]['Cantidad'])+$total2;
    $total3 = ($arreglo[$i]['Precio Cosmetologa']*$arreglo[$i]['Cantidad'])+$total3;
    $total4 = ($arreglo[$i]['Precio Promo']*$arreglo[$i]['Cantidad'])+$total4;

}
//guardamos el arreglo ya modificado
$_SESSION['carrito']=$arreglo;
//imprimimos el nuevo total
echo json_encode([
    'total' => $total,
    'total2' => $total2,
    'total3' => $total3,
    'total4' => $total4
]);

?>