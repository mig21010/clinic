<?php 
session_start();
require '../config/conexion.php';

	$arreglo=$_SESSION['carrito'];
    //$prueba="P2017";
    //$num =0;
	$id_pedido=NULL;
	//$consulta = ("SELECT * FROM pedido2 ORDER BY ID_Pedido DESC LIMIT 1");
    $consulta = ("SELECT * FROM venta ORDER BY id_venta DESC LIMIT 1");
    $result = mysqli_query($conexion,$consulta) ;
        if (!$result) {
            die("Error running $consulta: " . mysqli_error($conexion));
        }
    //para imprimir los datos
    while ($f = mysqli_fetch_array($result)) {
        $id_pedido = $f['id_venta'];
    }
    //este if se hace por si la BD esta vacia y no entra al while
    //quiere decir que seria la primer compra
    if ($id_pedido==NULL) {
    	$id_pedido=1;
    }else {    	
        $id_pedido =$id_pedido+1;
    }
    for ($i=0; $i <count($arreglo) ; $i++) { 
        //$consulta2=("INSERT INTO pedido2 (ID_Pedido, ID_Producto, Precio, Cantidad, Importe, IVA) values(
        $consulta2=("INSERT INTO venta (id_venta, id_producto, cantidad, preciocli, preciopub, preciocos, preciopromo) values(
        	'".$id_pedido."',
            '".$arreglo[$i]['Id']."',
            ".$arreglo[$i]['Cantidad'].",
            ".$arreglo[$i]['Precio Clinica'].",
            ".$arreglo[$i]['Precio Publico'].",
            ".$arreglo[$i]['Precio Cosmetologa'].",
            ".$arreglo[$i]['Precio Promo']."       	
        	)");
        $result2 = mysqli_query($conexion,$consulta2) ;
        if (!$result2) {
            die("Error running $consulta2: " . mysqli_error($conexion));
        }
    }
    //echo '<center><h2>Ha realizado su compra</h2></center>';
    echo "<script>
        alert('Ha realizado su compra');
        location.href='galeria.php';
        </script>";
    //destruir la variable de sesion
    unset($_SESSION['carrito']);

 ?>