<?php 
//Incluimos la conexion a la base de datos
require '../config/conexion.php';

Class Permiso
{
	//Implementamos el metodo constructor 
	public function __construct(){

	}
	//Implementar un metodo para listar los registros de los permisos
	public function listar(){
		$sql = "SELECT * FROM permiso";
		return ejecutarConsulta($sql);
	}


}
 ?>