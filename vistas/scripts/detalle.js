var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	//Cargamos los items al select categoria
	$.post("../ajax/detalle.php?op=selectProducto", function(r){
	            $("#idproducto").html(r);
	            // $('#idproducto').selectpicker('refresh');

	});
	$.post("../ajax/detalle.php?op=selectSeccion", function(r){
	            $("#idseccion").html(r);
	            // $('#idseccion').selectpicker('refresh');

	});
	$.post("../ajax/detalle.php?op=selectCategoria", function(r){
	            $("#idcategoria").html(r);
	            // $('#idcategoria').selectpicker('refresh');

	});
}

//Función limpiar
function limpiar()
{
	$("#presentacion").val("");
	$("#precioclinica").val("");
	$("#preciopublico").val("");
	$("#preciocosmetologa").val("");
	$("#preciopromocion").val("");
	$("#stock").val("");
 	$("#iddetalle").val("");
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
					url: '../ajax/detalle.php?op=listar',
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
//Función para guardar o editar
function guardaryeditar(e)
{
	e.preventDefault();//no se activarea la accion predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/detalle.php?op=guardaryeditar",
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


function mostrar(iddetalle)
{
	$.post("../ajax/detalle.php?op=mostrar",{iddetalle : iddetalle}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idproducto").val(data.id_producto);
		// $('#idproducto').selectpicker('refresh');
		$("#idseccion").val(data.id_seccion);
		// $('#idseccion').selectpicker('refresh');
		$("#idcategoria").val(data.id_categoria);
		// $('#idcategoria').selectpicker('refresh');
		$("#presentacion").val(data.presentacion);
		$("#precioclinica").val(data.precio_clinica);
		$("#preciopublico").val(data.precio_publico);
		$("#preciocosmetologa").val(data.precio_cosmetologa);
		$("#preciopromocion").val(data.precio_promocion);
		$("#stock").val(data.stock);
 		$("#iddetalle").val(data.id_detalle);

 	})
}

function eliminar(iddetalle)
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
		$.post("../ajax/detalle.php?op=eliminar", {iddetalle : iddetalle}, function(){
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