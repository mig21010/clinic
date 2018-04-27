var tabla;

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function(e)
	{
		guardaryeditar(e);
	})
	
	$("#imagenmuestra").hide();

	$.post("../ajax/usuario.php?op=permisos&id=",function(r){
		$("#permisos").html(r);
	});
}
function limpiar(){
	$("#idusuario").val("");
	$("#username").val("");
	$("#password").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$('input[type=checkbox]').prop('checked', false);
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
					url: '../ajax/usuario.php?op=listar',
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
		url: "../ajax/usuario.php?op=guardaryeditar",
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
function mostrar(idusuario)
{
	$.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#username").val(data.username);
		// $("#tipo").selectpicker('refresh');
		$("#password").val(data.password);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen_login);
		$("#imagenactual").val(data.imagen_login);
		$("#idusuario").val(data.id_login);
	});
	$.post("../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
		$("#permisos").html(r);
	});
}

function eliminar(idusuario)
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
		$.post("../ajax/usuario.php?op=eliminar", {idusuario : idusuario}, function(){
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
