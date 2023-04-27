// $(document).ready(function () { //se ejecuta al cargar el documento .ready() despues que se carga el documento ejecuta la funcion 
//     $('#tblrrpedagogicos').DataTable({
//         language:{"url":"../assets/spanish.txt"},
//         dom:"Bfrtip",
//         column:[
//                 {data: "Consecutivo"},
//                 {data: "Codigo Recurso"},
//                 {data: "Nombre"},
//                 {data: "Tipo"},
//                 {data: "Accion"}
//         ]
//     });
// });
// $(document).ready(function () { //se ejecuta al cargar el documento .ready() despues que se carga el documento ejecuta la funcion 
//     $('#tblestudiantes').DataTable({
//         language:{"url":"../assets/spanish.txt"},
//         dom:"Bfrtip",
//         column:[
//                 {data: "Consecutivo"},
//                 {data: "Cedula"},
//                 {data: "Nombres"},
//                 {data: "Apellidos"},
//                 {data: "Fecha de Nacimiento"},
//                 {data: "Direccion"},
//                 {data: "Ciudad"},
//                 {data: "Tel Fijo"},
//                 {data: "Celular"},
//                 {data: "Email"},
//                 {data: "Accion"}
//         ]
//     });
// });
$(document).ready(function () {
    tblRRpedagogicos();
   });
   function tblRRpedagogicos() {
       $('#tblRRpedagogicos').dataTable().fnDestroy();
    
       $('#tblRRpedagogicos').DataTable({
           dom: 'Brtip',
           buttons: [{
                   extend: 'collection',
                   init: (api, node, config) => $(node).removeClass('btn-secondary'),
                   className: 'btn btn-primary',
                   text: '<i class="fas fa-download"></i> Exportar',
                   buttons: [{
                           extend: 'csvHtml5',
                           text: '<i class="fas fa-file-csv"></i> Exportar CSV',
                           titleAttr: 'Csv',
                           exportOptions: {
                               columns: [0, 1, 2]
                           }
                       },
                       {
                           extend: 'excelHtml5',
                           text: '<i class="fas fa-file-excel"></i> Exportar a Excel',
                           titleAttr: 'Csv',
                           exportOptions: {
                               columns: [0, 1, 2, ]
                           }
                       },
                       {
                           extend: 'pdfHtml5',
                           text: '<i class="far fa-file-pdf"></i> Exportar a PDF',
                           titleAttr: 'Csv',
                           exportOptions: {
                               columns: [0, 1, 2]
                           }
                       },
                   ]
               },
               {
                   extend: 'print',
                   init: (api, node, config) => $(node).removeClass('btn-secondary'),
                   className: 'btn btn-primary',
                   text: '<i class="fas fa-print"></i> Imprimir ',
                   exportOptions: {
                       columns: [0, 1, 2]
                   }
               }
           ],
           "columnDefs": [{
               // El numero correspode a la ultima columna iniciando en 0
               "targets": 3,
               "orderable": false
           }],
           "language": {
         "url":"../assets/spanish.txt"
           },
           "order": [
               [0, "desc"]
           ],
           'processing': true,
           'serverSide': true,
           'serverMethod': 'post',
           'ajax': {
               'url': 'qry-rrpedagogicos.php',
               'data': {},
               'method': 'POST'
           },
           'columns': [
                {data: 'Codigo_Recurso'},
                {data: 'Nombre'},
                {data: 'Tipo'},
                {data: 'Accion'}
   
           ],
           drawCallback: function () {
               // Colocar aqui la ejecución de alguna funcion despues de cargar los datos 
           }
   
       });
   }
   
   $('#btnAgregar').click(function(){
       $('.modal-title').html("Agregar Estudiante");
       $('#modalAgregar').modal('show');
   })
   
   
   $(document).on('click', '.btnConsultar', function () {
       $('.modal-title').html("Datos del Estudiantes");
       $('#modalAgregar').modal('show');
   });
   
   
   $(document).on('click', '.btnModificar', function () {
       $('.modal-title').html("Modificar datos del Estudiante");
       $('#modalAgregar').modal('show');
   });
   
   
   $(document).on('click', '.btnEliminar', function () {
   
       Swal.fire({
           title: 'Estas Seguro de eliminar el registro?',
           text: "Esta operación no se puede reversar!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#0091EA',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Eliminalo!!'
         }).then((result) => {
           if (result.isConfirmed) {
             Swal.fire({
               title: 'Eliminación de registro',
               text: "Registro eliminado con éxito!",
               icon: 'success',
               confirmButtonColor: '#0091EA',
               }
             )
           }
         })
   
   });
   