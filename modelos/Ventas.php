<?php 
//Incluimos la conexion a la base de datos
require '../config/conexion.php';

Class Ventas
{
	//Implementamos el metodo constructor 
	public function __construct(){

	}
	//Implementamos un metodo para insertar registros
	public function insertar($iddetalle,$idproducto,$presentacionv,$cantidad,$precio,$preciopromocionv,$preciototal,$idusuario){
		$sql = "INSERT INTO venta (id_detalle,id_producto,presentacionv,cantidad,precio,precio_promocionv,precio_total,id_usuario)
		VALUES ('$iddetalle','$idproducto','$presentacionv','$cantidad','$precio','$preciopromocionv','$preciototal','$idusuario')";
		$idventanuevo=ejecutarConsulta_retornarID($idproducto);
		$num_elementos=0;
		$sw=true;
		while($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(id_usuario,id_permiso) VALUES('$idusuarionuevo','$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}
		return $sw;

	}
	//Implementamos un metodo para editar registros
	public function editar($idusuario,$username,$password,$tipo,$permisos){
		$sql = "UPDATE usuario SET username='$username',password='$password',tipo_usuario='$tipo' WHERE id_usuario='$idusuario'";
		ejecutarConsulta($sql);
		$sqldel="DELETE FROM usuario_permiso WHERE id_usuario='$idusuario'";
		ejecutarConsulta($sqldel);
		$num_elementos=0;
		$sw=true;
		while($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(id_usuario,id_permiso) VALUES('$idusuario','$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}
		return $sw;
	}
	//Implementamos un metodo para eliminar las categorias
	public function eliminar($idusuario){
	$sql = "DELETE FROM usuario WHERE id_usuario = '$idusuario'";
	return ejecutarConsulta($sql);
	}

	//Implementar un metodo para mostrar los datos de un registro a modificar 
	public function mostrar($idusuario){
		$sql = "SELECT * FROM usuario WHERE id_usuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un metodo para listar los registros
	public function listar(){
		$sql = "SELECT * FROM usuario";
		return ejecutarConsulta($sql);
	}
	public function listarmarcados($idusuario)
	{
		$sql ="SELECT * FROM usuario_permiso WHERE id_usuario='$idusuario'";
		return ejecutarConsulta($sql);
	}
	public function verificar($username, $password)
	{
		$sql="SELECT id_usuario,tipo_usuario FROM usuario WHERE username='$username' AND password='$password'";
		return ejecutarConsulta($sql);
	}
	public function select(){
		$sql = "SELECT * FROM usuario";
		return ejecutarConsulta($sql);
	}

}
 ?>
