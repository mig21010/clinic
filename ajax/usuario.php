<?php
session_start();
require_once "../modelos/Usuario.php";

$usuario = new Usuario();

$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST['idusuario']):"";
$username = isset($_POST["username"])? limpiarCadena($_POST['username']):"";
$password = isset($_POST["password"])? limpiarCadena($_POST['password']):"";
$imagen = isset($_POST["imagen"])? limpiarCadena($_POST['imagen']):"";
switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
		$imagen = $_POST["imagenactual"];
	}else{
		$ext = explode(".", $_FILES["imagen"]["name"]);
		if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
			$imagen = round(microtime(true)) . '.' . end($ext);
			move_uploaded_file($_FILES['imagen']['tmp_name'], "../files/usuarios/". $imagen);
			}
	}
		// $clavehash=hash("SHA256", $password);
		if (empty($idusuario)) {
			$rspta = $usuario->insertar($username,$password,$imagen,$_POST['permiso']);
			echo $rspta ? "Usuario Registrado": "Usuario no se pudo registrar";
		}else
		{
			$rspta = $usuario->editar($idusuario,$username,$password,$imagen,$_POST['permiso']);
			echo $rspta ? "Usuario actualizado": "Usuario no se pudo actualizar";
		}
		break;

	case 'eliminar':
		$rspta = $usuario->eliminar($idusuario);
		echo $rspta ? "Usuario Eliminado": "Usuario no se pudo eliminar";
		break;

	case 'mostrar':
		$rspta = $usuario->mostrar($idusuario);
		echo json_encode($rspta);
		break;
	case 'listar':
		$rspta=$usuario->listar();
		$data = Array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0"=>$reg->username,
				"1"=>$reg->password,
				"2"=>"<img src='../files/usuarios/".$reg->imagen_login."' height='50px' width='50px'>",
				"3"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_login.')"><i class="fa fa-pencil"></i></button>  '.'  <button class="btn btn-danger" onclick="eliminar('.$reg->id_login.')"><i class="fa fa-trash"></i></button>'
			
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
	case 'permisos':
		require_once "../modelos/Permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar();

		$id=$_GET['id'];
		$marcados = $usuario->listarmarcados($id);
		$valores=array();
		while ($per = $marcados->fetch_object())
		{
			array_push($valores, $per->id_permiso);
		}

		while ($reg = $rspta->fetch_object()) 
		{
			$sw = in_array($reg->id_permiso, $valores)?'checked':"";
			echo '<li> <input type="checkbox" '.$sw.' name="permiso[]" value="'.$reg->id_permiso.'">'.$reg->nombre_permiso.'</li>';
		}


		break;
		case 'verificar':
			$usernamea = $_POST['usernamea'];
			$passworda = $_POST['passworda'];

			// $passwordhash=hash("SHA256", $passworda);

			$rspta = $usuario->verificar($usernamea,$passworda);
			// print_r($rspta);
			$fetch=$rspta->fetch_object();
			print_r($fetch);
			if (isset($fetch)) {
				$_SESSION["idusuario"]= $fetch->id_login;
				$_SESSION["username"]= $fetch->username;
				$_SESSION["imagen"]= $fetch->imagen_login;

				$marcados=$usuario->listarmarcados($fetch->id_login);
				print_r($marcados);
				//declaramos un arreglo para almacenar los permisos marcados
				$valores = array();
				//alamacenamos los permisos marcados en el arreglo
				while($per = $marcados->fetch_object())
				{
					array_push($valores, $per->id_permiso);
				}
			//determinamos losaccesos del usuario 
				in_array(1,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
				in_array(2,$valores)?$_SESSION['almacen']=1:$_SESSION['almacen']=0;
				in_array(3,$valores)?$_SESSION['expedientes']=1:$_SESSION['expedientes']=0;
				in_array(4,$valores)?$_SESSION['ventas']=1:$_SESSION['ventas']=0;
				in_array(5,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
				in_array(6,$valores)?$_SESSION['consultav']=1:$_SESSION['consultav']=0;
				in_array(7,$valores)?$_SESSION['registro']=1:$_SESSION['registro']=0;
			}
				
			echo json_encode($fetch);
			break;

			case 'salir':
			# code...
			//limpiamos las variables de sesion
			session_unset();
			//destruimos la sesion 
			session_destroy();
			//Redirecciona al login
			header("Location: ../index.php");
			break;
}
?>