var tabla;

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function(e)
	{
		guardaryeditar(e);
	})
}
function limpiar(){
	$("#idseccion").val("");
	$("#nombre").val("");
}
function mostrarform(flag){
	limpiar();
	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}

}
function cancelarform()
{
	limpiar();
	mostrarform(false);
}
function listar()
{
	tabla=$('#tblistado').dataTable(
	{
		"aProcessing":true,//Activamos el procesamiento del datatables
		"aServerSide":true,//Paginacion y filtrados realizados desde el servidor
		dom: 'Bfrtip',//Definimos elementos del control de la tabla
		buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdf'

				],
		"ajax":
				{
					url: '../ajax/seccion.php?op=listar',
					type : "get",
					dataType : "json",
					error: function(e){
						console.log(e.responseText);
					}
				},
		"bDestroy": true,
		"iDisplayLength":5,//Paginacion
		"order": [[0, "desc"]]
	}).DataTable();
}
function guardaryeditar(e)
{
	e.preventDefault();//no se activarea la accion predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/seccion.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function(datos)
		{
			swal("Información guardada", datos, "success");          
        	mostrarform(false);
         	tabla.ajax.reload();
		
		}
	});
	limpiar();
}
function mostrar(idseccion)
{
	$.post("../ajax/seccion.php?op=mostrar",{idseccion : idseccion}, function(data,status)
	{
		data = JSON.parse(data);
		mostrarform(true);
		$("#nombre").val(data.nombre_seccion);
		$("#idseccion").val(data.id_seccion);
	})
}

function eliminar(idseccion)
{
	swal({
 		title: '¿Esta seguro de eliminar este elemento?',
  		text: "No se podrá revertir este cambio",
  		type: 'warning',
  		showCancelButton: true,
  		confirmButtonColor: '#3085d6',
 		cancelButtonColor: '#d33',
  		confirmButtonText: 'Eliminar'
}).then(function (result){
	if(result){
		$.post("../ajax/seccion.php?op=eliminar", {idseccion : idseccion}, function(){
		swal(
    	'¡Eliminado!',
   		'Su archivo ha sido borrado.',
    	'success');
    	tabla.ajax.reload();
		});
	}
});
	

}

init();
