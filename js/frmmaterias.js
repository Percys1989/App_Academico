$(document).ready(function () {
    tblmaterias();
});

function tblmaterias() {
	$('#tblmaterias').dataTable().fnDestroy();
	$('#tblmaterias').DataTable({
		dom: 'Brtip',
		"columnDefs": [{"targets": 4,"orderable": false}],
		"language": {"url":"../assets/spanish.txt"},
		"order": [[0, "desc"]],
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			'url': 'qry-materias.php',
			'data': {},
			'method': 'POST'
		},
		'columns': [
			{data: 'codigo'},
			{data: 'nombre'},
			{data: 'programas'},
			{data: 'tipo_materias'},
			{data: 'Accion'}
		],
		drawCallback: function () {
			// Colocar aqui la ejecución de alguna funcion despues de cargar los datos 
		}

	});
}
   
$('#btnAgregar').click(function(){
	$("#resultado").html("");
	$('.modal-title').html("Agregar Materia");

	$('#txtCodigo').val('');
	$('#txtNombre').val('');
	$('#txtPrograma').val('');
	$('#txtMateria').val('');

	$('#modalAgregar').modal('show');

	$('input[type=text]').attr('disabled', false);

	$('#btnInsertar').show();
	$('#btnGrabarMod').hide();
})

$(document).on('click', '.btnInsertar', function () {
    let vCodigo=$('#txtCodigo').val();
    let vNombre=$('#txtNombre').val();
    let vPrograma=$('#txtPrograma').val();
    let vMateria=$('#txtMateria').val();
    $.ajax({
    url: 'add-materias.php', 
        data: { 
        "vCodigo":vCodigo,
        "vNombre":vNombre,
        "vPrograma":vPrograma,
        "vMateria":vMateria

    }, 
    type: 'POST', 
    beforeSend: function () {
        $("#resultado").html("Procesando, espere por favor...");
    },
    }).done(function(respuesta) {  
        switch (respuesta) {
        case "1":
                Swal.fire({
                    title: 'Grabación de información',
                    text: "Registro Almacenado con éxito!",
                    icon: 'success',
                    confirmButtonColor: '#0091EA',
                });	
                break;
        case "2":
                Swal.fire({
                    title: 'Grabación de información',
                    text: "Registro NO Almacenado, verifique",
                    icon: 'warning',
                    confirmButtonColor: '#0091EA',
                });
                break;
        case "3":
                Swal.fire({
                    title: 'Grabación de información',
                    text: "Registro YA EXISTE, verifique",
                    icon: 'warning',
                    confirmButtonColor: '#0091EA',
                });
                break;
        default:
                break;
        }
        
        }).fail(function (jqXHR, textStatus, errorThrown){ 
            $("#resultado").html("ha ocurrido el siguiente error: "+ textStatus +" "+ errorThrown); 
    }).then(tblmaterias());
});

$(document).on('click', '.btnConsultar', function () {
let vId= $(this).attr("id"); 

$('.modal-title').html("Datos de la Materia");
$('#btnInsertar').hide();
$('#btnGrabarMod').hide();
$('#modalAgregar').modal('show');
$.ajax({
	url: 'qry-materia.php', 
	data: { 
	   "vId":vId
   	}, 
	type: 'POST', 
	beforeSend: function () {
		   $("#resultado").html("Consultando, espere por favor...");
	},
	dataType: "json",
	}).done(function(datos) { 
		$('#txtCodigo').val(datos.codigo);
		$('#txtNombre').val(datos.nombre);
		$('#txtPrograma').val(datos.programas);
		$('#txtMateria').val(datos.tipo_materias);

		$('input[type=text]').attr('disabled', true);

	}).fail(function (jqXHR, textStatus, errorThrown){ 
		$("#resultado").html("ha ocurrido el siguiente error: "+ textStatus +" "+ errorThrown); 
   }).then();
});

$(document).on('click', '.btnModificar', function () {
	let vId= $(this).attr("id");
	$('#txtId').val(vId);
	$('.modal-title').html("Modificar Datos de las materias");
	$('#btnInsertar').hide();
	$('#btnGrabarMod').show();
	$('#modalAgregar').modal('show');
	$.ajax({
		url: 'qry-materia.php',  
		data: { 
		   "vId":vId
		   }, 
		type: 'POST',  
		beforeSend: function () {
			   $("#resultado").html("Consultando, espere por favor...");
		},
		dataType: "json",
		}).done(function(datos) {  
			$('#txtCodigo').val(datos.codigo);
			$('#txtNombre').val(datos.nombre);
			$('#txtPrograma').val(datos.programas);
			$('#txtMateria').val(datos.tipo_materias);
			
			$('input[type=text]').attr('disabled', false);
		}).fail(function (jqXHR, textStatus, errorThrown){ 
			$("#resultado").html("ha ocurrido el siguiente error: "+ textStatus +" "+ errorThrown); 
	   }).then();

});

$(document).on('click', '.btnGrabarMod', function () {
   let vId=$('#txtId').val();
   let vCodigo=$('#txtCodigo').val();
   let vNombre=$('#txtNombre').val();
   let vPrograma=$('#txtPrograma').val();
   let vMateria=$('#txtMateria').val();
 $.ajax({
	url: 'upd-materias.php',  
	data: { 
	   "vId":vId,
	   "vCodigo":vCodigo,
	   "vNombre":vNombre,
	   "vPrograma":vPrograma,
	   "vMateria":vMateria
   }, 
   type: 'POST',  
   beforeSend: function () {
	   $("#resultado").html("Procesando, espere por favor...");
   },
   }).done(function(respuesta) {  
	   switch (respuesta) {
	   case "1":
			   Swal.fire({
				   title: 'Modificacion de información',
				   text: "Registro Modificado con éxito!",
				   icon: 'success',
				   confirmButtonColor: '#0091EA',
			   });	
			   	setTimeout(function () {
                	$('#modalAgregar').modal('hide');
              	},3000);
			   break;
	   case "2":
			   Swal.fire({
				   title: 'Modificacion de información',
				   text: "Registro NO Modificado, verifique",
				   icon: 'warning',
				   confirmButtonColor: '#0091EA',
			   });
			   break;
	   case "3":
			   Swal.fire({
				   title: 'Modificacion de información',
				   text: "Existen un problema con la informacion, verifique",
				   icon: 'warning',
				   confirmButtonColor: '#0091EA',
			   });
			   break;
	   default:
			   break;
	   }
	}).fail(function (jqXHR, textStatus, errorThrown){ 
		$("#resultado").html("ha ocurrido el siguiente error: "+ textStatus +" "+ errorThrown); 
   }).then(tblmaterias());
});

$(document).on('click', '.btnEliminar', function () {
	let id = $(this).attr("id");
	swal.fire({
		title: 'Estas seguro?',
		text: "Se borrará de forma permanente!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#7A7875',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, bórralo!',
		showLoaderOnConfirm: true,
		preConfirm: function () {
			return new Promise(function (resolve) {
				$.ajax({
						url: 'del-materias.php',
						type: 'POST',
						data: {
							vId: id,
						},
						dataType: 'json'
					})
					.done(function (response) {
						swal.fire('Eliminado!', response.message, response.status);
						tblmaterias();
					})
					.fail(function () {
						swal.fire('Error', response.message, 'error');
					});
			});
		},
		allowOutsideClick: false
	});


});
   