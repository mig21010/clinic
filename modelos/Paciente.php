<?php 
require '../config/conexion.php';
class Informacion
{	
	public function __construct(){

	}
	//Implementamos un metodo para insertar registros
	public function insertar($primernombre,$segundonombre,$apellidopaterno,$apellidomaterno,$fecha,$telefono){
		$sql = "INSERT INTO paciente (primer_nombre,segundo_nombre,apellido_paterno,apellido_materno,fecha_nacimiento,telefono)
		VALUES ('$primernombre','$segundonombre','$apellidopaterno','$apellidomaterno','$fecha','$telefono')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para editar registros
	public function editar($idusuario,$primernombre,$segundonombre,$apellidopaterno,$apellidomaterno,$fecha,$telefono){
		$sql = "UPDATE paciente SET primer_nombre='$primernombre',segundo_nombre='$segundonombre',apellido_paterno='$apellidopaterno',apellido_materno='$apellidomaterno',fecha_nacimiento='$fecha',telefono='$telefono' WHERE id_usuario='$idusuario'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para eliminar 
	public function eliminar($idusuario){
	$sql = "DELETE FROM paciente WHERE id_usuario = '$idusuario'";
	return ejecutarConsulta($sql);
	}

	//Implementar un metodo para mostrar los datos de un registro a modificar 
	public function mostrar($idusuario){
		$sql = "SELECT * FROM paciente WHERE id_usuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un metodo para listar los registros
	public function listar(){
		$sql = "SELECT * FROM paciente";
		return ejecutarConsulta($sql);
	}

}

 ?>
