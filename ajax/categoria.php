<?php
require_once "../modelos/Categoria.php";

$categoria = new Categoria();

$idcategoria = isset($_POST["idcategoria"])? limpiarCadena($_POST['idcategoria']):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST['nombre']):"";
switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idcategoria)) {
			$rspta = $categoria->insertar($nombre);
			echo $rspta ? "Categoria registrada": "Categoria no se pudo registrar";
		}else
		{
			$rspta = $categoria->editar($idcategoria,$nombre);
			echo $rspta ? "Categoria actualizada": "Categoria no se pudo actualizar";
		}
		break;

	case 'eliminar':
		$rspta = $categoria->eliminar($idcategoria);
		echo $rspta ? "Categoria Eliminada": "Categoria no se pudo eliminar";
		break;

	case 'mostrar':
		$rspta = $categoria->mostrar($idcategoria);
		echo json_encode($rspta);
		break;
	case 'listar':
		$rspta=$categoria->listar();
		$data = Array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0"=>$reg->id_categoria,
				"1"=>$reg->nombre_categoria,
				"2"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_categoria.')"><i class="fa fa-pencil"></i></button>  '.'  <button class="btn btn-danger" onclick="eliminar('.$reg->id_categoria.')"><i class="fa fa-trash"></i></button>'
			
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