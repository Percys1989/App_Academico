
// function registro() {
//     var frmIniSesion = document.getElementById("frmIniSesion");
//     var frmRegistro = document.getElementById("frmRegistro");
   
//     if (frmIniSesion.style.display === "none") {
//         frmRegistro.style.display = "block";
//     }else if (frmRegistro.style.display === "none") {
//         frmIniSesion.style.display = "none";
//         frmRegistro.style.display = "block"
//     };
// };

// function reguser() {
//     let regusuario = document.getElementById("regusuario").value;
//     let regemail = document.getElementById("regemail").value;
//     let regpassword = document.getElementById("regpassword").value;

//     let regular = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/ ; // validar la estructura, expresion regular
    
//     if ( regusuario === "" || regemail === "" || regpassword === "" ){
//         Swal.fire(' los campos no deben estar vacio')

//     } else if (!regemail.match(regular)) {
//         Swal.fire(' Ingrese un correo Valido');
    
//     } else {
//         Swal.fire(
//             'Registro Exitoso',
//             'Usuario Creado Correctamente',
//             'success' 
//           )
//           setTimeout(function () {
//             window.location.href = "frmlogin.php";
//           },3000)
//     };
    
// };

// function validarUsuario()
// {
//     //alert("hola")
//     pUsuario= $('#txtuser').val(); 
//     var pClave="";
//     $.ajax({
//      type: 'POST', 
//      url: 'frmlogin-qry.php',
//      data: { 
//         "usuario": pUsuario, 
//         "clave": pClave}
//      }).done(function( msg ) {
//          $("#txtnombre").val(msg);
//      }).fail(function (jqXHR, textStatus, errorThrown){
//      $("#consola").html("The following error occured: "+ textStatus +" "+ errorThrown); 
//     });
// }

// $('#btn-login').click(function (e) {
//     e.preventDefault();
    
//     var pUsuario = $('#usuario').val();
//     var pNombreUsuario = $('#nombre').val();
//     var pClave = $('#clave').val();
  
//     $.ajax({
//       type: 'POST', 
//       url: 'frmlogin-qry.php',
//       data: { 
//         "usuario": pUsuario, 
//         "nombre": pNombreUsuario,
//         "clave": pClave
//       },
//       success: function (response) {
//         // Si la respuesta contiene el mensaje de error
//         if (response.indexOf("*** Usuario No Existe ***") !== -1) {
//           alert(response);
//         } else {
//           // Si la respuesta no contiene errores, redireccionar a otra página
//           window.location.href = "frmlogin.php";
//         }
//       },
//       error: function (jqXHR, textStatus, errorThrown) {
//         $("#consola").html("The following error occurred: " + textStatus + " " + errorThrown);
//       }
//     });
// });
// function frmlogin() {
//   let usuario = document.getElementById("usuario").value
//   let clave = document.getElementById("clave").value
//   if (usuario != "" || clave != "") {
//     Swal.fire({
//       title: 'Inicio de Sesion Exitoso',
//       text: "",
//       icon: 'success',
//       confirmButtonColor: '#0091EA',
//     });	setTimeout(function () {
//       document.getElementById("login-form").action = "services/qry-frmlogin.php";
//     },2000)
//   } else {
//       Swal.fire({
//       title: 'Usuario y/o Contraseña incorrecta',
//       text: "",
//       icon: 'warning',
//       confirmButtonColor: '#0091EA',
//     });
//   }

  
// }

// function validarFormulario() {
//     var usuario = document.getElementById("usuario").value;
//     var clave = document.getElementById("clave").value;

//     if (usuario == "" || clave == "") {
//         swal('Error', 'Por favor, complete todos los campos', 'error');
//         return false;
//     }
// }
