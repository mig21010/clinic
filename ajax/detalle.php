<?php 
require_once "../modelos/Detalle.php";

$detalle=new Detalle();

$iddetalle=isset($_POST["iddetalle"])? limpiarCadena($_POST["iddetalle"]):"";
$idproducto=isset($_POST["idproducto"])? limpiarCadena($_POST["idproducto"]):"";
$idseccion=isset($_POST["idseccion"])? limpiarCadena($_POST["idseccion"]):"";
$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$presentacion=isset($_POST["presentacion"])? limpiarCadena($_POST["presentacion"]):"";
$precioclinica=isset($_POST["precioclinica"])? limpiarCadena($_POST["precioclinica"]):"";
$preciopublico=isset($_POST["preciopublico"])? limpiarCadena($_POST["preciopublico"]):"";
$preciocosmetologa=isset($_POST["preciocosmetologa"])? limpiarCadena($_POST["preciocosmetologa"]):"";
$preciopromocion=isset($_POST["preciopromocion"])? limpiarCadena($_POST["preciopromocion"]):"";
$stock=isset($_POST["stock"])? limpiarCadena($_POST["stock"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

		if (empty($iddetalle)){
			$rspta=$detalle->insertar($idproducto,$idseccion,$idcategoria,$presentacion,$precioclinica,$preciopublico,$preciocosmetologa,$preciopromocion,$stock);
			echo $rspta ? "Detalle del producto registrado" : "Detalle del producto no se pudo registrar";
		}
		else {
			$rspta=$detalle->editar($iddetalle,$idproducto,$idseccion,$idcategoria,$presentacion,$precioclinica,$preciopublico,$preciocosmetologa,$preciopromocion,$stock);
			echo $rspta ? "Detalle del producto actualizado" : "Detalle del producto no se pudo actualizar";
		}
	break;

	case 'mostrar':
		$rspta=$detalle->mostrar($iddetalle);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'eliminar':
		$rspta = $detalle->eliminar($iddetalle);
		echo $rspta ? "Detalle del producto Eliminado": "Detalle del producto no se pudo eliminar";
	break;

	case 'listar':
		$rspta=$detalle->listar();
 		//Vamos a declarar un array
 		$data= Array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0"=>$reg->nombre_producto,
				"1"=>$reg->nombre_seccion,
				"2"=>$reg->nombre_categoria,
				"3"=>$reg->presentacion,
				"4"=>$reg->precio_clinica,
				"5"=>$reg->precio_publico,
				"6"=>$reg->precio_cosmetologa,
				"7"=>$reg->precio_promocion,
				"8"=>$reg->stock,
				"9"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_detalle.')"><i class="fa fa-pencil"></i></button>  '.'  <button class="btn btn-danger" onclick="eliminar('.$reg->id_detalle.')"><i class="fa fa-trash"></i></button>'
			
				);
		}
		$resultados = array(
			"sEcho"=>1,
			"iTotalRecords"=>count($data),
			"iTotalDisplayRecords"=>count($data),
			"aaData"=>$data
			);
		echo json_encode($resultados);

	break;

	case 'selectProducto':
		require_once "../modelos/Producto.php";
		$producto = new Producto();

		$rspta = $producto->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->id_producto . '>' . $reg->nombre_producto . '</option>';
				}
		break;
    case 'selectSeccion':
    	require_once "../modelos/Seccion.php";
		$seccion = new Seccion();

		$rspta = $seccion->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->id_seccion . '>' . $reg->nombre_seccion . '</option>';
				}
    	break;
	case "selectCategoria":
		require_once "../modelos/Categoria.php";
		$categoria = new Categoria();

		$rspta = $categoria->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->id_categoria . '>' . $reg->nombre_categoria . '</option>';
				}
	break;
}
?>