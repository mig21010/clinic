<?php
require_once "../modelos/Permiso.php" ;

$permiso = new Permiso();

switch ($_GET["op"]) {
	case 'listar':
			$rspta = $permiso->listar();
			$data = Array();

			while ($reg = $rspta->fetch_object()) {
				$data[] = array(
					"0"=>$reg->nombre_permiso,
					"1"=>$reg->descripcion_permiso
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
}

 ?>