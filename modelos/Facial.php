<?php 
//Incluimos la conexion a la base de datos
require '../config/conexion.php';

Class Facial
{
	//Implementamos el metodo constructor 
	public function __construct(){

	}
	//Implementamos un metodo para insertar registros
	public function insertar($idexpediente,$idusuario,$pregunta12,$pregunta13,$pregunta14,$pregunta15,$pregunta16,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a47){
		$sql = "INSERT INTO facial(id_expediente,id_usuario,pregunta12,pregunta13,pregunta14,pregunta15,pregunta16,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12,a13,a14,a15,a16,a17,a47)
		VALUES ('$idexpediente','$idusuario',$pregunta12','$pregunta13','$pregunta14','$pregunta15',$pregunta16','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a15','$a16','$a17','$a47')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para editar registros
	public function editar($idexpediente,$idusuario,$pregunta12,$pregunta13,$pregunta14,$pregunta15,$pregunta16,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a47){
		$sql = "UPDATE facial SET id_usuario='$idusuario',pregunta1='$pregunta1',pregunta2='$pregunta2',pregunta3='$pregunta3',pregunta4='$pregunta4',pregunta5='$pregunta5',pregunta6='$pregunta6',pregunta7='$pregunta7' WHERE id_expediente='$idexpediente'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para desactivar 
	public function desactivar($idexpediente){
		$sql = "UPDATE expediente SET condicion='0' WHERE id_expediente='$idexpediente'";
		return ejecutarConsulta($sql);
	}
		//Implementamos un metodo para activar
	public function activar($idexpediente){
		$sql = "UPDATE expediente SET condicion='1' WHERE id_expediente='$idexpediente'";
		return ejecutarConsulta($sql);
	}
	//Implementar un metodo para mostrar los datos de un registro a modificar 
	public function mostrar($idexpediente){
		$sql = "SELECT * FROM expediente WHERE id_expediente='$idexpediente'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un metodo para listar los registros
	// public function listar(){
	// 	$sql = "SELECT * FROM expediente";
	// 	return ejecutarConsulta($sql);
	// }


}
 ?>