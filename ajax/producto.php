<?php
require_once "../modelos/Producto.php";

$producto = new Producto();

$idproducto = isset($_POST["idproducto"])? limpiarCadena($_POST['idproducto']):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST['nombre']):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST['descripcion']):"";
$imagen = isset($_POST["imagen"])? limpiarCadena($_POST['imagen']):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
		$imagen = $_POST["imagenactual"];
	}else{
		$ext = explode(".", $_FILES["imagen"]["name"]);
		if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
			$imagen = round(microtime(true)) . '.' . end($ext);
			move_uploaded_file($_FILES['imagen']['tmp_name'], "../files/productos". $imagen);
			}
	}
		if (empty($idproducto)) {
			$rspta = $producto->insertar($nombre, $descripcion,$image);
			echo $rspta ? "Producto registrado": "Producto no se pudo registrar";
		}else
		{
			$rspta = $producto->editar($idproducto, $nombre, $descripcion,$imagen);
			echo $rspta ? "Producto actualizado": "Producto no se pudo actualizar";
		}
		break;

	case 'eliminar':
		$rspta = $producto->eliminar($idproducto);
		echo $rspta ? "Producto Eliminado": "Producto no se pudo eliminar";
		break;

	case 'mostrar':
		$rspta = $producto->mostrar($idproducto);
		echo json_encode($rspta);
		break;
	case 'listar':
		$rspta=$producto->listar();
		$data = Array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0"=>$reg->nombre_producto,
				"1"=>$reg->descripcion,
				"2"=>"<img src='../files/productos/".$reg->imagen_producto."' height='50px' width='50px'>",
				"3"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_producto.')"><i class="fa fa-pencil"></i></button>  '.'  <button class="btn btn-danger" onclick="eliminar('.$reg->id_producto.')"><i class="fa fa-trash"></i></button>'
			
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
}
?>