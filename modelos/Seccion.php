<?php 
//Incluimos la conexion a la base de datos
require '../config/conexion.php';

Class Seccion
{
	//Implementamos el metodo constructor 
	public function __construct(){

	}
	//Implementamos un metodo para insertar registros
	public function insertar($nombre){
		$sql = "INSERT INTO seccion (nombre_seccion)
		VALUES ('$nombre')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para editar registros
	public function editar($idseccion, $nombre){
		$sql = "UPDATE seccion SET nombre_seccion='$nombre' WHERE id_seccion='$idseccion'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para eliminar las categorias
	public function eliminar($idseccion){
	$sql = "DELETE FROM seccion WHERE id_seccion = '$idseccion'";
	return ejecutarConsulta($sql);
	}

	//Implementar un metodo para mostrar los datos de un registro a modificar 
	public function mostrar($idseccion){
		$sql = "SELECT * FROM seccion WHERE id_seccion='$idseccion'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un metodo para listar los registros
	public function listar(){
		$sql = "SELECT * FROM seccion";
		return ejecutarConsulta($sql);
	}
	//Implementar un metodo para listar los registos y mostrar un select 
	public function select(){
		$sql = "SELECT * FROM seccion";
		return ejecutarConsulta($sql);
	}

}
 ?>
