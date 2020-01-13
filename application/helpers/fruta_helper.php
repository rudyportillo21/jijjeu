<script type="text/javascript">
	$(document).ready(function(){
		mostrarFrutas();

		function mostrarFrutas(){
			$.ajax({

				type: 'ajax',
				url: '<?= base_url('fruta_controller/get_fruta'); ?>',
				dataType: 'json',

				success: function(datos){
					var tabla='';
					var i;
					var n=1;

					for (i = 0; i < datos.length; i++) {
						tabla+=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre_fruta+'</td>'+
						'<td>'+datos[i].nombre_color+'</td>'+
						'<td>'+datos[i].nombre_sabor+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-danger borrar" data="'+datos[i].id_fruta+'">ELIMINAR</a>'+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-primary editar" data="'+datos[i].id_fruta+'">EDITAR</a>'+'</td>'+
						'</tr>';
						n++;
					}
					$('#tabla_frutas').html(tabla);
				}
			});
		};// fin del metodo mostrarFrutas

		$('#tabla_frutas').on('click','.borrar', function(){
			$id = $(this).attr('data');

			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?= base_url('fruta_controller/eliminar') ?>',
					data:{id:$id},
					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');

						if(respuesta==true){
							alertify.notify('Eliminado exitosamente','success',10, null);
							mostrarFrutas();
						}else{
							alertify.notify('Error al eliminar','error',10, null);
						}
					},
					error: function(){
						alertify.notify('No se a podido eliminar, el registro es dependiente','error',10, null);
						mostrarFrutas();
					}
				});
			});
		});//fin del metodo eliminar con ajax

		$('#nueFruta').click(function(){
			$('#frutas').modal('show');
			$('#frutas').find('.modal-title').text('Nueva fruta');
			$('#formFrutas').attr('action','<?= base_url('fruta_controller/ingresar') ?>');
		});

		get_color();

		function get_color(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('fruta_controller/get_color') ?>',
				dataType: 'json',

				success: function(datos){
					var op ='';
					var i;

					op+="<option value=''>Selecione un color</option>";

					for (i = 0; i < datos.length; i++) {
						op+="<option value='"+datos[i].id_color+"'>"+datos[i].nombre_color+"</option>";
					}
					$('#color').html(op);
				}
			});
		}//fin del metodo get_color

		get_sabor();

		function get_sabor(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('fruta_controller/get_sabor') ?>',
				dataType: 'json',

				success: function(datos){
					var op ='';
					var i;

					op+="<option>Selecione un sabor</option>";

					for (i = 0; i < datos.length; i++) {
						op+="<option value='"+datos[i].id_sabor+"'>"+datos[i].nombre_sabor+"</option>"
					}
					$('#sabor').html(op);
				}
			});
		}// fin del metodo get_sabor

		$('#btnGuardar').click(function(){
			$url = $('#formFrutas').attr('action');
			$data = $('#formFrutas').serialize();

			$.ajax({
				type: 'ajax',
				method: 'post',
				url:$url,
				data:$data,
				dataType: 'json',

				success: function(respuesta){
					$('#frutas').modal('hide');

					if(respuesta=='add'){
						alertify.notify('Ingresado exitosamente','success',10,null);
						mostrarFrutas();
					}else if(respuesta== 'edi'){
						alertify.notify('Actualizado exitosamente','success',10,null);
					}else{
						alertify.notify('Error al ingresar','error',10,null);
					}
					$('#formFrutas')[0].reset();
					mostrarFrutas();
				}
			});

		});// fin del metodo ingresar con ajax

		$('#tabla_frutas').on('click','.editar',function(){
			$id = $(this).attr('data');
			$('#frutas').modal('show');
			$('#frutas').find('.modal-title').text('Editar fruta');
			$('#formFrutas').attr('action','<?= base_url('fruta_controller/actualizar') ?>');

			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?= base_url('fruta_controller/get_datos') ?>',
				data:{id:$id},
				dataType: 'json',

				success: function(datos){
					$('#id').val(datos.id_fruta);
					$('#fruta').val(datos.nombre_fruta);
					$('#color').val(datos.id_color);
					$('#sabor').val(datos.id_sabor);

				}
			});
		});

	});//fin de la estructura ajax
</script>