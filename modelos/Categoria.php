<?php 
//Incluimos la conexion a la base de datos
require '../config/conexion.php';

Class Categoria
{
	//Implementamos el metodo constructor 
	public function __construct(){

	}
	//Implementamos un metodo para insertar registros
	public function insertar($nombre){
		$sql = "INSERT INTO categoria (nombre_categoria)
		VALUES ('$nombre')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para editar registros
	public function editar($idcategoria, $nombre){
		$sql = "UPDATE categoria SET nombre_categoria='$nombre' WHERE id_categoria='$idcategoria'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para eliminar las categorias
	public function eliminar($idcategoria){
	$sql = "DELETE FROM categoria WHERE id_categoria = '$idcategoria'";
	return ejecutarConsulta($sql);
	}

	//Implementar un metodo para mostrar los datos de un registro a modificar 
	public function mostrar($idcategoria){
		$sql = "SELECT * FROM categoria WHERE id_categoria='$idcategoria'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un metodo para listar los registros
	public function listar(){
		$sql = "SELECT * FROM categoria";
		return ejecutarConsulta($sql);
	}
	//Implementar un metodo para listar los registos y mostrar un select 
	public function select(){
		$sql = "SELECT * FROM categoria";
		return ejecutarConsulta($sql);
	}

}
 ?>
