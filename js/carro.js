var inicio=function(){
	//keyup detecta la presion de las teclas cuando "La tecla es solt
	$(".cantidad").keyup(function(e){
		//validamos si el campo esta vacio
		if ($(this).val()!='') {
			//keyCode Devuelve el código de tecla pulsada para eventos keydown y keyup
			// keyCode 13 es para la tecla ENTER
			if (e.keyCode==13) {
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var precio2=$(this).attr('data-precio2');
				var precio3=$(this).attr('data-precio3');
				var precio4=$(this).attr('data-precio4');
				var cantidad=$(this).val();
				/*con este this nos referimos acantidad. Le decimos navegue sobre DOM hasta un div carproducto
				despues que me busque el objeto que tenga la clase subtotal y que me cambie el contenido
				por el nuevo subtotal*/
				$(this).parentsUntil('.carproducto').find('.subtotal').text('Importe: '+(precio*cantidad));
				$(this).parentsUntil('.carproducto').find('.subtotal').text('Importe2: '+(precio2*cantidad));
				$(this).parentsUntil('.carproducto').find('.subtotal').text('Importe3: '+(precio3*cantidad));
				$(this).parentsUntil('.carproducto').find('.subtotal').text('Importe4: '+(precio4*cantidad));
				//$(this).parentsUntil('.carproducto').find('.iva').text('IVA: '+((precio*cantidad)*0.16));
				//por medio de AJAX creamos un metodo post
				$.post('../js/modificar_datos_carro.php',{
					Id:id,
					Precio:precio,
					Precio2:precio2,
					Precio3:precio3,
					Precio4:precio4,
					Cantidad:cantidad
				}, function(respuesta){
					respuesta = JSON.parse(respuesta);
					$("#total").text('Total Clinica: '+ respuesta["total"]);
					//tengo que modificar para los demas totales
					$("#total2").text('Total Publico: '+ respuesta["total2"]);
					$("#total3").text('Total Cosmetologa: '+ respuesta["total3"]);
					$("#total4").text('Total Promocion: '+ respuesta["total4"]);
				});
			}
		}
	});
	//cuando un elemento con la clase eliminar le de click a alguna funcion
	$(".eliminar").click(function(e){
		//previene la opcion por defecto (revargar la pag)
		e.preventDefault();
		//creamos una variable donde vamos a capturar el atributo data-id
		var id=$(this).attr('data-id');
		//vamos a remover el div con clase carproducto
		$(this).parentsUntil('.carproducto').remove();
		//por medio de AJAX creamos un metodo post
		$.post('../js/eliminar_carro.php',{
			Id:id
		},function(respuesta){
			respuesta = JSON.parse(respuesta);
			if(respuesta["eliminado"]) {
				$("#total").text('Total Clinica: '+ respuesta["total"]);
				$("#total2").text('Total Publico: '+ respuesta["total2"]);
				$("#total3").text('Total Cosmetologa: '+ respuesta["total3"]);
				$("#total4").text('Total Promocion: '+ respuesta["total4"]);
				window.location.href = 'http://localhost:8080/clinica2/vistas/carrito.php';
			}
		});
	});

}
//mandamos a llamar la funcion inicio
//$(document).on('ready',inicio);
$(document).ready(inicio);