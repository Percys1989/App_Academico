$(document).ready(function () {
    tblProfesores();
});

function tblProfesores() {
    $('#tblProfesores').dataTable().fnDestroy();
    $('#tblProfesores').DataTable({
        dom: 'Brtip',
        "columnDefs": [{"targets": 11,"orderable": false}],
        "language": {"url":"../assets/spanish.txt"},
        "order": [[0, "desc"]],
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url': 'qry-profesores.php',
            'data': {},
            'method': 'POST'
        },
        'columns': [
            {data: 'Identificacion'},
            {data: 'Nombres'},
            {data: 'Apellidos'},
            {data: 'Direccion'},
            {data: 'Celular'},
            {data: 'FechaNacimiento'},
            {data: 'Email'},
            {data: 'Ciudad'},
            {data: 'Profesion'},
            {data: 'Experiencia'},
            {data: 'Genero'},
            {data: 'Accion'}

        ],
        drawCallback: function () {
            // Colocar aqui la ejecución de alguna funcion despues de cargar los datos 
        }

    });
}

$('#btnAgregar').click(function(){
    $("#resultado").html("");
    $('.modal-title').html("Agregar Profesor");
    
    $('#txtIdentificacion').val('');
    $('#txtNombres').val('');
    $('#txtApellidos').val('');
    $('#txtDireccion').val('');
    $('#txtCelular').val('');
    $('#txtFecnac').val('');
    $('#txtEmail').val('');
    $('#txtCiudad').val('');
    $('#txtGenero').val('');
    $('#txtProfesion').val('');
    $('#txtExperiencia').val('');
    
    $('#modalAgregar').modal('show');
    
    $('input[type=text]').attr('disabled', false);
    $('input[type=date]').attr('disabled', false);
    $('input[type=email]').attr('disabled', false);

    $('#btnInsertar').show();
    $('#btnGrabarMod').hide();
})

$(document).on('click', '.btnInsertar', function () {

let vIdentificacion=$('#txtIdentificacion').val();
let vNombre=$('#txtNombres').val();
let vApellido=$('#txtApellidos').val();
let vDireccion=$('#txtDireccion').val();
let vCelular=$('#txtCelular').val();
let vFecnac=$('#txtFecnac').val();
let vEmail=$('#txtEmail').val();
let vCiudad=$('#txtCiudad').val();
let vGenero=$('#txtGenero').val();
let vProfesion=$('#txtProfesion').val();
let vExperiencia=$('#txtExperiencia').val();

$.ajax({
url: 'add-profesores.php',  
    data: { 
    "vIdentificacion":vIdentificacion,
    "vNombre":vNombre,
    "vApellido":vApellido,
    "vDireccion":vDireccion,
    "vCelular":vCelular,
    "vFecnac":vFecnac,
    "vEmail":vEmail,
    "vCiudad":vCiudad,
    "vGenero":vGenero,
    "vProfesion":vProfesion,
    "vExperiencia":vExperiencia

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
}).then(tblProfesores());
});

$(document).on('click', '.btnConsultar', function () {
    let vId= $(this).attr("id");
    $('.modal-title').html("Datos del Profesor");
    $('#btnInsertar').hide();
    $('#btnGrabarMod').hide();
    $('#modalAgregar').modal('show');
    $.ajax({
        url: 'qry-profesor.php',  
        data: { 
            "vId":vId
            }, 
        type: 'POST',  
        beforeSend: function () {
                $("#resultado").html("Consultando, espere por favor...");
        },
        dataType: "json",
        }).done(function(datos) {  
            $('#txtIdentificacion').val(datos.Identificacion);
            $('#txtNombres').val(datos.Nombres);
            $('#txtApellidos').val(datos.Apellidos);
            $('#txtDireccion').val(datos.Direccion);
            $('#txtCelular').val(datos.Celular);
            $('#txtFecnac').val(datos.FechaNacimiento);
            $('#txtEmail').val(datos.Email);
            $('#txtCiudad').val(datos.Ciudad);
            $('#txtGenero').val(datos.Genero);
            $('#txtProfesion').val(datos.Profesion);
            $('#txtExperiencia').val(datos.Experiencia);
    
            $('input[type=text]').attr('disabled', true);
            $('input[type=date]').attr('disabled', true);
            $('input[type=email]').attr('disabled', true);
    
        }).fail(function (jqXHR, textStatus, errorThrown){ 
            $("#resultado").html("ha ocurrido el siguiente error: "+ textStatus +" "+ errorThrown); 
        }).then();
});

$(document).on('click', '.btnModificar', function () {
    let vId= $(this).attr("id");
    $('#txtId').val(vId);
    $('.modal-title').html("Modificar datos del Profesor");
    $('#btnInsertar').hide();
    $('#btnGrabarMod').show();
    $('#modalAgregar').modal('show');
    $.ajax({
    url: 'qry-profesor.php', 
    data: { 
        "vId":vId
        }, 
    type: 'POST', 
    beforeSend: function () {
        $("#resultado").html("Consultando, espere por favor...");
    },
    dataType: "json",
    }).done(function(datos) {  // 
        $('#txtIdentificacion').val(datos.Identificacion);
        $('#txtNombres').val(datos.Nombres);
        $('#txtApellidos').val(datos.Apellidos);
        $('#txtDireccion').val(datos.Direccion);
        $('#txtCelular').val(datos.Celular);
        $('#txtFecnac').val(datos.FechaNacimiento);
        $('#txtEmail').val(datos.Email);
        $('#txtCiudad').val(datos.Ciudad);
        $('#txtGenero').val(datos.Genero);
        $('#txtProfesion').val(datos.Profesion);
        $('#txtExperiencia').val(datos.Experiencia);

        $('input[type=text]').attr('disabled', false);
        $('input[type=date]').attr('disabled', false);
        $('input[type=email]').attr('disabled', false);
    }).fail(function (jqXHR, textStatus, errorThrown){ 
        $("#resultado").html("ha ocurrido el siguiente error: "+ textStatus +" "+ errorThrown); 
    }).then();

});

$(document).on('click', '.btnGrabarMod', function () {
    let vId=$('#txtId').val();
    let vIdentificacion=$('#txtIdentificacion').val();
    let vNombre=$('#txtNombres').val();
    let vApellido=$('#txtApellidos').val();
    let vDireccion=$('#txtDireccion').val();
    let vCelular=$('#txtCelular').val();
    let vFecnac=$('#txtFecnac').val();
    let vEmail=$('#txtEmail').val();
    let vCiudad=$('#txtCiudad').val();
    let vGenero=$('#txtGenero').val();
    let vProfesion=$('#txtProfesion').val();
    let vExperiencia=$('#txtExperiencia').val();
$.ajax({
    url: 'upd-profesores.php',  // Fichero destino (el PHP que trata los datos)
    data: { 
    "vId":vId,
    "vIdentificacion":vIdentificacion,
    "vNombre":vNombre,
    "vApellido":vApellido,
    "vDireccion":vDireccion,
    "vCelular":vCelular,
    "vFecnac":vFecnac,
    "vEmail":vEmail,
    "vCiudad":vCiudad,
    "vGenero":vGenero,
    "vProfesion":vProfesion,
    "vExperiencia":vExperiencia
}, 
type: 'POST', 
beforeSend: function () {
    $("#resultado").html("Procesando, espere por favor...");
},
}).done(function(respuesta) {  // Función que se ejecuta si todo ha ido bien
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
    }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
        $("#resultado").html("ha ocurrido el siguiente error: "+ textStatus +" "+ errorThrown); 
}).then(tblProfesores());
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
                        url: 'del-profesores.php',
                        type: 'POST',
                        data: {
                            vId: id,
                        },
                        dataType: 'json'
                    })
                    .done(function (response) {
                        swal.fire('Eliminado!', response.message, response.status);
                        tblProfesores();
                    })
                    .fail(function () {
                        swal.fire('Error', response.message, 'error');
                    });
            });
        },
        allowOutsideClick: false
    });


});
   