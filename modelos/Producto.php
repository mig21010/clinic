<?php 
//Incluimos la conexion a la base de datos
require '../config/conexion.php';

Class Producto
{
	//Implementamos el metodo constructor 
	public function __construct(){

	}
	//Implementamos un metodo para insertar registros
	public function insertar($nombre, $descripcion,$imagen){
		$sql = "INSERT INTO producto (nombre_producto, descripcion,imagen_producto)
		VALUES ('$nombre', '$descripcion','$imagen')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para editar registros
	public function editar($idproducto, $nombre, $descripcion,$imagen){
		$sql = "UPDATE producto SET nombre_producto='$nombre', descripcion='$descripcion',imagen_producto='$imagen' WHERE id_producto='$idproducto'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para eliminar las categorias
	public function eliminar($idproducto){
	$sql = "DELETE FROM producto WHERE id_producto = '$idproducto'";
	return ejecutarConsulta($sql);
	}

	//Implementar un metodo para mostrar los datos de un registro a modificar 
	public function mostrar($idproducto){
		$sql = "SELECT * FROM producto WHERE id_producto='$idproducto'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un metodo para listar los registros
	public function listar(){
		$sql = "SELECT * FROM producto";
		return ejecutarConsulta($sql);
	}
	//Implementar un metodo para listar los registos y mostrar un select 
	public function select(){
		$sql = "SELECT * FROM producto";
		return ejecutarConsulta($sql);
	}

}
 ?>