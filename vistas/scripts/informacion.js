var tabla;

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function(e)
	{
		guardaryeditar(e);
	})
	// $.post("../ajax/informacion.php?op=selectUsuario", function(r){
	//    $("#idusuario").html(r);
	// });
	
}
function limpiar(){
	$("#idusuarioinfo").val("");
	$("#primernombre").val("");
	$("#segundonombre").val("");
	$("#apellidopaterno").val("");
	$("#apellidomaterno").val("");
	$("#fecha").val("");
	$("#telefono").val("");
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
					url: '../ajax/informacion.php?op=listar',
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
		url: "../ajax/informacion.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function(datos)
		{
			swal("Your work has been saved", datos, "success");          
        	mostrarform(false);
         	tabla.ajax.reload();
		
		}
	});
	limpiar();
}
function mostrar(idusuarioinfo)
{
	$.post("../ajax/informacion.php?op=mostrar",{idusuarioinfo : idusuarioinfo}, function(data,status)
	{
		data = JSON.parse(data);
		mostrarform(true);
		$("#idusuarioinfo").val(data.id_usuario);
		$("#primernombre").val(data.primer_nombre);
		$("#segundonombre").val(data.segundo_nombre);
		$("#apellidopaterno").val(data.apellido_paterno);
		$("#apellidomaterno").val(data.apellido_materno);
		$("#fecha").val(data.fecha_nacimiento);
		$("#telefono").val(data.telefono);
	})
}

function eliminar(idusuarioinfo)
{
	swal({
 		title: 'Are you sure?',
  		text: "You won't be able to revert this!",
  		type: 'warning',
  		showCancelButton: true,
  		confirmButtonColor: '#3085d6',
 		cancelButtonColor: '#d33',
  		confirmButtonText: 'Yes, delete it!'
}).then(function (result){
	if(result){
		$.post("../ajax/informacion.php?op=eliminar", {idusuarioinfo : idusuarioinfo}, function(){
		swal(
    	'Deleted!',
   		'Your file has been deleted.',
    	'success');
    	tabla.ajax.reload();
		});
	}
});
	

}

init();