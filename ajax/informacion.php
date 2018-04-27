<?php
session_start();
require_once "../modelos/Informacion.php";

$informacion = new Informacion();

$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST['idusuario']):"";
$primernombre = isset($_POST["primernombre"])? limpiarCadena($_POST['primernombre']):"";
$segundonombre = isset($_POST["segundonombre"])? limpiarCadena($_POST['segundonombre']):"";
$apellidopaterno = isset($_POST["apellidopaterno"])? limpiarCadena($_POST['apellidopaterno']):"";
$apellidomaterno = isset($_POST["apellidomaterno"])? limpiarCadena($_POST['apellidomaterno']):"";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST['fecha']):"";
$telefono = isset($_POST["telefono"])? limpiarCadena($_POST['telefono']):"";
switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idusuario)) {
			$rspta = $informacion->insertar($primernombre,$segundonombre,$apellidopaterno,$apellidomaterno,$fecha,$telefono);
			echo $rspta ? "Informacion registrada": "Informacion no se pudo registrar";
		}
		else
		{
			$rspta = $informacion->editar($idusuario,$primernombre,$segundonombre,$apellidopaterno,$apellidomaterno,$fecha,$telefono);
			echo $rspta ? "Informacion actualizada": "Informacion no se pudo actualizar";
		}
		break;

	case 'eliminar':
		$rspta = $informacion->eliminar($idusuario);
		echo $rspta ? "Informacion Eliminada": "Informacion no se pudo eliminar";
		break;

	case 'mostrar':
		$rspta = $informacion->mostrar($idusuario);
		echo json_encode($rspta);
		break;
	case 'listar':
		$rspta=$informacion->listar();
		$data = Array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0"=>$reg->primer_nombre,
				"1"=>$reg->segundo_nombre,
				"2"=>$reg->apellido_paterno,
				"3"=>$reg->apellido_materno,
				"4"=>$reg->fecha_nacimiento,
				"5"=>$reg->telefono,
				"6"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_usuario.')"><i class="fa fa-pencil"></i></button>  '.'  <button class="btn btn-danger" onclick="eliminar('.$reg->id_usuario.')"><i class="fa fa-trash"></i></button>'
			
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

		// case 'selectUsuario':
		// require_once "../modelos/Usuario.php";
		// $usuario = new Usuario();

		// $rspta = $usuario->select();

		// while ($reg = $rspta->fetch_object())
		// 		{
		// 			echo '<option value=' . $reg->id_usuario . '>' . $reg->username . '</option>';
		// 		}
		// break;
}
?>