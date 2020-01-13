<?php $this->load->helper('fruta'); ?>
<body class="container">

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" id="nueFruta">
		Nuevo registro	
	</button>
	<table border="1" class="table table-dark table-hover">
		<thead>
			<tr>
				<td>N°</td>
				<td>Fruta</td>
				<td>Color</td>
				<td>Sabor</td>
				<td>Eliminar</td>
				<td>Editar</td>
			</tr>
		</thead>
		<tbody id="tabla_frutas">

		</tbody>
	</table>

	<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Comfirmacion de eliminacion</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Esta seguro que quiere eliminar este registro?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" id="btnBorrar">Si, Eliminar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					
				</div>
			</div>
		</div>
	</div>




	<!-- Modal -->
	<div class="modal fade" id="frutas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formFrutas" action="" method="POST">
						<div>
							<input type="hidden" name="id_fruta" id="id" value="0">
						</div>
						<div>
							<label>Nombre Fruta</label>
							<input type="text" name="fruta" id="fruta" class="form-control text-center"
							placeholder="Ingrese nombre de fruta..." maxlength="30">
						</div>
						<div>
							<label>Seleccione el color</label>
							<select id="color" name="color" class="form-control">
								
							</select>
						</div>
						<div>
							<label>Seleccione el sabor</label>
							<select id="sabor" name="sabor" class="form-control">
								
							</select>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>