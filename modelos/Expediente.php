<?php 
//Incluimos la conexion a la base de datos
require '../config/conexion.php';

Class Expediente
{
	//Implementamos el metodo constructor 
	public function __construct(){

	}
	//Implementamos un metodo para insertar registros
	public function insertar($idusuario,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6,$pregunta7,$pregunta8,$pregunta9,$pregunta10,$pregunta11,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38,$a39,$a40,$a41,$a42,$a43,$a44,$a45,$a46){
		$sql = "INSERT INTO expediente(id_usuario,pregunta1,pregunta2,pregunta3,pregunta4,pregunta5,pregunta6,pregunta7,pregunta8,pregunta9,pregunta10,pregunta11,a18,a19,a20,a21,a22,a23,a24,a25,a26,a27,a28,a29,a30,a31,a32,a33,a34,a35,a36,a37,a38,a39,a40,a41,a42,a43,a44,a45,a46,estado)
		VALUES ('$idusuario','$pregunta1','$pregunta2','$pregunta3','$pregunta4','$pregunta5','$pregunta6','$pregunta7','$pregunta8','$pregunta9','$pregunta10','$pregunta11','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36','$a37','$a38','$a39','$a40','$a41','$a42','$a43','$a44','$a45','$a46','1')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para editar registros
	public function editar($idexpediente,$idusuario,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6,$pregunta7,$pregunta8,$pregunta9,$pregunta10,$pregunta11,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38,$a39,$a40,$a41,$a42,$a43,$a44,$a45,$a46){
		$sql = "UPDATE expediente SET id_usuario='$idusuario',pregunta1='$pregunta1',pregunta2='$pregunta2',pregunta3='$pregunta3',pregunta4='$pregunta4',pregunta5='$pregunta5',pregunta6='$pregunta6',pregunta7='$pregunta7',pregunta8='$pregunta8',pregunta9='$pregunta9',pregunta10='$pregunta10',pregunta11='$pregunta11',a18='$a18',a19='$a19',a20='$a20',a21='$a21',a22='$a22',a23='$a23',a24='$a24',a25='$a25',a26='$a26',a27='$a27',a28='$a28',a29='$a29',a30='$a30',a31='$a31',a32='$a32',a33='$a33',a34='$a34',a35='$a35',a36='$a36',a37='$a37',a38='$a38',a39='$a39',a40='$a40',a41='$a41',a42='$a42',a43='$a43',a44='$a44',a45='$a45',a46='$a46' WHERE id_expediente='$idexpediente'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para desactivar 
	public function desactivar($idexpediente){
		$sql = "UPDATE expediente SET estado='0' WHERE id_expediente='$idexpediente'";
		return ejecutarConsulta($sql);
	}
		//Implementamos un metodo para activar
	public function activar($idexpediente){
		$sql = "UPDATE expediente SET estado='1' WHERE id_expediente='$idexpediente'";
		return ejecutarConsulta($sql);
	}
	//Implementar un metodo para mostrar los datos de un registro a modificar 
	public function mostrar($idexpediente){
		$sql = "SELECT * FROM expediente WHERE id_expediente='$idexpediente'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un metodo para listar los registros
	public function listar(){
		$sql = "SELECT * FROM expediente";
		return ejecutarConsulta($sql);
	}


}
 ?>
