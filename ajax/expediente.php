<?php
require_once "../modelos/Expediente.php" ;

$expediente = new Expediente();
$idexpediente = isset($_POST["idexpediente"])? limpiarCadena($_POST['idexpediente']) :"";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST['idusuario']) :"";
$pregunta1 = isset($_POST["pregunta1"])? limpiarCadena($_POST['pregunta1']) :"";
$pregunta2 = isset($_POST["pregunta2"])? limpiarCadena($_POST['pregunta2']) :"";
$pregunta3 = isset($_POST["pregunta3"])? limpiarCadena($_POST['pregunta3']) :"";
$pregunta4 = isset($_POST["pregunta4"])? limpiarCadena($_POST['pregunta4']) :"";
$pregunta5 = isset($_POST["pregunta5"])? limpiarCadena($_POST['pregunta5']) :"";
$pregunta6 = isset($_POST["pregunta6"])? limpiarCadena($_POST['pregunta6']) :"";
$pregunta7 = isset($_POST["pregunta7"])? limpiarCadena($_POST['pregunta7']) :"";
$pregunta8 = isset($_POST["pregunta8"])? limpiarCadena($_POST['pregunta8']) :"";
$pregunta9 = isset($_POST["pregunta9"])? limpiarCadena($_POST['pregunta9']) :"";
$pregunta10 = isset($_POST["pregunta10"])? limpiarCadena($_POST['pregunta10']) :"";
$pregunta11 = isset($_POST["pregunta11"])? limpiarCadena($_POST['pregunta11']) :"";
$a18 = isset($_POST["a18"])? limpiarCadena($_POST['a18']) :"";
$a19 = isset($_POST["a19"])? limpiarCadena($_POST['a19']) :"";
$a20 = isset($_POST["a20"])? limpiarCadena($_POST['a20']) :"";
$a21 = isset($_POST["a21"])? limpiarCadena($_POST['a21']) :"";
$a22 = isset($_POST["a22"])? limpiarCadena($_POST['a22']) :"";
$a23 = isset($_POST["a23"])? limpiarCadena($_POST['a23']) :"";
$a24 = isset($_POST["a24"])? limpiarCadena($_POST['a24']) :"";
$a25 = isset($_POST["a25"])? limpiarCadena($_POST['a25']) :"";
$a26 = isset($_POST["a26"])? limpiarCadena($_POST['a26']) :"";
$a27 = isset($_POST["a27"])? limpiarCadena($_POST['a27']) :"";
$a28 = isset($_POST["a28"])? limpiarCadena($_POST['a28']) :"";
$a29 = isset($_POST["a29"])? limpiarCadena($_POST['a29']) :"";
$a30 = isset($_POST["a30"])? limpiarCadena($_POST['a30']) :"";
$a31 = isset($_POST["a31"])? limpiarCadena($_POST['a31']) :"";
$a32 = isset($_POST["a32"])? limpiarCadena($_POST['a32']) :"";
$a33 = isset($_POST["a33"])? limpiarCadena($_POST['a33']) :"";
$a34 = isset($_POST["a34"])? limpiarCadena($_POST['a34']) :"";
$a35 = isset($_POST["a35"])? limpiarCadena($_POST['a35']) :"";
$a36 = isset($_POST["a36"])? limpiarCadena($_POST['a36']) :"";
$a37 = isset($_POST["a37"])? limpiarCadena($_POST['a37']) :"";
$a38 = isset($_POST["a38"])? limpiarCadena($_POST['a38']) :"";
$a39 = isset($_POST["a39"])? limpiarCadena($_POST['a39']) :"";
$a40 = isset($_POST["a40"])? limpiarCadena($_POST['a40']) :"";
$a41 = isset($_POST["a41"])? limpiarCadena($_POST['a41']) :"";
$a42 = isset($_POST["a42"])? limpiarCadena($_POST['a42']) :"";
$a43 = isset($_POST["a43"])? limpiarCadena($_POST['a43']) :"";
$a44 = isset($_POST["a44"])? limpiarCadena($_POST['a44']) :"";
$a45 = isset($_POST["a45"])? limpiarCadena($_POST['a45']) :"";
$a46 = isset($_POST["a46"])? limpiarCadena($_POST['a46']) :"";
switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idexpediente)) {
			$rspta = $expediente->insertar($idusuario,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6,$pregunta7,$pregunta8,$pregunta9,$pregunta10,$pregunta11,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38,$a39,$a40,$a41,$a42,$a43,$a44,$a45,$a46);
			echo $rspta ? "Expediente registrado" : "Expediente no se pudo registrar";
		}
		else
		{
			$rspta = $expediente->editar($idexpediente,$idusuario,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6,$pregunta7,$pregunta8,$pregunta9,$pregunta10,$pregunta11,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38,$a39,$a40,$a41,$a42,$a43,$a44,$a45,$a46);
			echo $rspta ? "Expediente actualizado" : "Expediente no se pudo actualizar";
		}
		break;
	case 'desactivar':
			$rspta = $expediente->desactivar($idexpediente);
			echo $rspta ? "Expediente Desactivado" : "Expediente no se puede desactivar";
	break;
	case 'activar':
			$rspta = $expediente->activar($idexpediente);
			echo $rspta ? "Expediente Activado" : "Expediente no se puede activar";
	break;
	case 'mostrar':
			$rspta = $expediente->mostrar($idexpediente);
			//Codificar el resultado utilizando json
			echo json_encode($rspta);
	break;
	case 'listar':
			$rspta = $expediente->listar();
			//Declaramos un array 
			$data = Array();

			while ($reg = $rspta->fetch_object()) {
				$data[] = array(
					"0"=>$reg->id_usuario,
					"1"=>$reg->pregunta1,
					"2"=>$reg->pregunta2,
					"3"=>$reg->pregunta3,
					"4"=>$reg->pregunta4,
					"5"=>$reg->pregunta5,
					"6"=>$reg->pregunta6,
					"7"=>$reg->pregunta7,
					"8"=>$reg->pregunta8,
					"9"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_expediente.')"><i class="fa fa-pencil"></i></button>'.
						'  <button class="btn btn-danger" onclick="desactivar('.$reg->id_expediente.')"><i class="fa fa-close"></i></button>':
						'<button class="btn btn-warning" onclick="mostrar('.$reg->id_expediente.')"><i class="fa fa-pencil"></i></button>'.
						'  <button class="btn btn-primary" onclick="activar('.$reg->id_expediente.')"><i class="fa fa-check"></i></button>',
					"10"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
										'<span class="label bg-red">Desactivado</span>'
					);
			}

			$results = array(
				"sECHO"=>1, //Informacion para el datatables 
				"iTotalRecords"=>count($data), //enviamos el tatal de regiatros al datatable
				"iTotalSisplayRecords"=>count($data), //enviamos el total de registros a visualizar
				"aaData"=>$data
				);
				echo json_encode($results);
	break;

	case "selectUsuario":
		require_once "../modelos/Informacion.php";
		$informacion = new Informacion();

		$rspta = $informacion->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value='. $reg->id_usuario . '>' . $reg->primer_nombre . '</option>';
				}
	break;
}


 ?>
