<?php
require_once "../modelos/Seccion.php";

$seccion = new Seccion();

$idseccion = isset($_POST["idseccion"])? limpiarCadena($_POST['idseccion']):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST['nombre']):"";
switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idseccion)) {
			$rspta = $seccion->insertar($nombre);
			echo $rspta ? "Sección registrada": "Sección no se pudo registrar";
		}else
		{
			$rspta = $seccion->editar($idseccion,$nombre);
			echo $rspta ? "Sección actualizada": "Sección no se pudo actualizar";
		}
		break;

	case 'eliminar':
		$rspta = $seccion->eliminar($idseccion);
		echo $rspta ? "Sección Eliminada": "Sección no se pudo eliminar";
		break;

	case 'mostrar':
		$rspta = $seccion->mostrar($idseccion);
		echo json_encode($rspta);
		break;
	case 'listar':
		$rspta=$seccion->listar();
		$data = Array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0"=>$reg->nombre_seccion,
				"1"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_seccion.')"><i class="fa fa-pencil"></i></button>  '.'  <button class="btn btn-danger" onclick="eliminar('.$reg->id_seccion.')"><i class="fa fa-trash"></i></button>'
			
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