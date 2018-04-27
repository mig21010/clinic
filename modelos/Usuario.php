<?php 
//Incluimos la conexion a la base de datos
require '../config/conexion.php';

Class Usuario
{
	//Implementamos el metodo constructor 
	public function __construct(){

	}
	//Implementamos un metodo para insertar registros
	public function insertar($username,$password,$imagen,$permisos){
		$sql = "INSERT INTO login (username,password,imagen_login)
		VALUES ('$username','$password','$imagen')";
		$idusuarionuevo=ejecutarConsulta_retornarID($sql);
		$num_elementos=0;
		$sw=true;
		while($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO login_permiso(id_login,id_permiso) VALUES('$idusuarionuevo','$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}
		return $sw;

	}
	//Implementamos un metodo para editar registros
	public function editar($idusuario,$username,$password,$imagen,$permisos){
		$sql = "UPDATE login SET username='$username',password='$password',imagen_login='$imagen' WHERE id_login='$idusuario'";
		ejecutarConsulta($sql);
		$sqldel="DELETE FROM login_permiso WHERE id_login='$idusuario'";
		ejecutarConsulta($sqldel);
		$num_elementos=0;
		$sw=true;
		while($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO login_permiso(id_login,id_permiso) VALUES('$idusuario','$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}
		return $sw;
	}
	//Implementamos un metodo para eliminar las categorias
	public function eliminar($idusuario){
	$sql = "DELETE FROM login WHERE id_login = '$idusuario'";
	return ejecutarConsulta($sql);
	}

	//Implementar un metodo para mostrar los datos de un registro a modificar 
	public function mostrar($idusuario){
		$sql = "SELECT * FROM login WHERE id_login= '$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un metodo para listar los registros
	public function listar(){
		$sql = "SELECT * FROM login";
		return ejecutarConsulta($sql);
	}
	public function listarmarcados($idusuario)
	{
		$sql ="SELECT * FROM login_permiso WHERE id_login='$idusuario'";
		return ejecutarConsulta($sql);
	}
	public function verificar($username, $password)
	{
		$sql="SELECT id_login,imagen_login FROM login WHERE username='$username' AND password='$password'";
		return ejecutarConsulta($sql);
	}
	

}
 ?>
