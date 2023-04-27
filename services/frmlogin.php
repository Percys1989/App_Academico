<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if($_SESSION['username']=="")
{
    header("Location:../index.php");
    exit;
}
?> 

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Scholl Manager</title>
  </head>
  <body>
    <div class="container-fluid ">
      <div id="logo">
        <img src="../img/banner2.jpg"  class="img-fluid" alt="logo corporativo" srcset="">
      </div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand fs-4" href="#">School Manager</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active fs-5" aria-current="page" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-5" href="#">Asistencia</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Configuracion</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="frmprofesores.php">Profesores</a></li>
                    <li><a class="dropdown-item" href="frmestudiantes.php">Estudiantes</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="frmnotas.php">Notas</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="frmprgacademicos.php">Programas Academicos</a></li>
                    <li><a class="dropdown-item" href="frmmaterias.php">Materias</a></li>
                    <li><a class="dropdown-item" href="frmrrpedagogicos.php">Recursos Pedagogicos</a></li>
                  </ul>
              </li>
            </ul>
            <a href="frmlogout.php" class="btn btn-light"> Cerrar Sesion</a>
          </div>
        </div>
      </nav>
    </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>