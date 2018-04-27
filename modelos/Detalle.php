<?php 
//Incluimos la conexion a la base de datos
require '../config/conexion.php';

Class Detalle
{
	//Implementamos el metodo constructor 
	public function __construct(){

	}
	//Implementamos un metodo para insertar registros
	public function insertar($idproducto,$idseccion,$idcategoria,$presentacion,$precioclinica,$preciopublico,$preciocosmetologa,$preciopromocion,$stock){
		$sql = "INSERT INTO detalle_producto (id_producto,id_seccion,id_categoria,presentacion,precio_clinica,precio_publico,precio_cosmetologa,precio_promocion,stock)
		VALUES ('$idproducto','$idseccion','$idcategoria','$presentacion','$precioclinica','$preciopublico','$preciocosmetologa','$preciopromocion','$stock')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para editar registros
	public function editar($iddetalle,$idproducto,$idseccion,$idcategoria,$presentacion,$precioclinica,$preciopublico,$preciocosmetologa,$preciopromocion,$stock){
		$sql = "UPDATE detalle_producto SET id_producto='$idproducto',id_seccion='$idseccion',id_categoria='$idcategoria',presentacion='$presentacion',precio_clinica='$precioclinica',precio_publico='$preciopublico',precio_cosmetologa='$preciocosmetologa',precio_promocion='$preciopromocion',stock='$stock' WHERE id_detalle='$iddetalle'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un metodo para eliminar las categorias
	public function eliminar($iddetalle){
	$sql = "DELETE FROM detalle_producto WHERE id_detalle = '$iddetalle'";
	return ejecutarConsulta($sql);
	}

	//Implementar un metodo para mostrar los datos de un registro a modificar 
	public function mostrar($iddetalle){
		$sql = "SELECT * FROM detalle_producto WHERE id_detalle='$iddetalle'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un metodo para listar los registros
	public function listar(){
		$sql = "SELECT detalle_producto.id_detalle, producto.nombre_producto, seccion.nombre_seccion, categoria.nombre_categoria, detalle_producto.presentacion, detalle_producto.precio_clinica, detalle_producto.precio_publico, detalle_producto.precio_cosmetologa, detalle_producto.precio_promocion, detalle_producto.stock FROM detalle_producto LEFT JOIN producto ON detalle_producto.id_producto=producto.id_producto LEFT JOIN seccion ON detalle_producto.id_seccion=seccion.id_seccion LEFT JOIN categoria ON detalle_producto.id_categoria=categoria.id_categoria ORDER BY detalle_producto.id_detalle;";
		return ejecutarConsulta($sql);
	}

}
 ?>