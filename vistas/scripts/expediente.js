var tabla;
//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	$.post("../ajax/expediente.php?op=selectUsuario", function(r){
	$("#idusuario").html(r);
	// $('#idseccion').selectpicker('refresh');

	});
}

function limpiar()
{
	$("#idexpediente").val("");
	$("#idusuario").val("");
	$("#pregunta1").val("");
	$("#pregunta2").val("");
	$("#pregunta3").val("");
	$("#pregunta4").val("");
	$("#pregunta5").val("");
	$("#pregunta6").val("");
	$("#pregunta7").val("");
	$("#pregunta8").val("");
	$("#pregunta9").val("");
	$("#pregunta10").val("");
	$("#pregunta11").val("");
	$("#a18").val("");
	$("#a19").val("");
	$("#a20").val("");
	$("#a21").val("");
	$("#a22").val("");
	$("#a23").val("");
	$("#a24").val("");
	$("#a25").val("");
	$("#a26").val("");
	$("#a27").val("");
	$("#a28").val("");
	$("#a29").val("");
	$("#a30").val("");
	$("#a31").val("");
	$("#a32").val("");
	$("#a33").val("");
	$("#a34").val("");
	$("#a35").val("");
	$("#a36").val("");
	$("#a37").val("");
	$("#a38").val("");
	$("#a39").val("");
	$("#a40").val("");
	$("#a41").val("");
	$("#a42").val("");
	$("#a43").val("");
	$("#a44").val("");
	$("#a45").val("");
	$("#a46").val("");
}
//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/expediente.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
function guardaryeditar(e)
{
	e.preventDefault();//no se activarea la accion predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/expediente.php?op=guardaryeditar",
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
function mostrar(idexpediente)
{
	$.post("../ajax/expediente.php?op=mostrar",{idexpediente : idexpediente}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
 		$("#idexpediente").val(data.id_expediente);
		$("#idusuario").val(data.id_usuario);
		$("#pregunta1").val(data.pregunta1);
		$("#pregunta2").val(data.pregunta2);
		$("#pregunta3").val(data.pregunta3);
		$("#pregunta4").val(data.pregunta4);
		$("#pregunta5").val(data.pregunta5);
		$("#pregunta6").val(data.pregunta6);
		$("#pregunta7").val(data.pregunta7);

 	})
}
 //Función para desactivar registos
function desactivar(idexpediente)
{
swal({
 title: "Atención",
 text: "Esto desactivará el expediente ¿Desea continuar?",
 icon: "warning",
 buttons: ["No", "Si"],
 dangerMode: true,
 closeOnConfirm: false
})
.then((result) => {
    if(result) {
        $.post("../ajax/expediente.php?op=desactivar",{idexpediente : idexpediente},function(e){
            swal("Correcto",e,"success");
            tabla.ajax.reload();
        });
    }
})
}
function activar(idexpediente)
{
swal({
 title: "Atención",
 text: "Esto activará el expediente ¿Desea continuar?",
 icon: "info",
 buttons: ["No", "Si"],
 dangerMode: true,
 closeOnConfirm: false
})
.then((result) => {
    if(result) {
        $.post("../ajax/expediente.php?op=activar",{idexpediente : idexpediente},function(e){
            swal("Correcto",e,"success");
            tabla.ajax.reload();
        });
    }
})
}
init();