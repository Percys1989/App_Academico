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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
        <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <!--  Son para activar sweetalert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
        <title>Scholl Manager - Profesores</title>
    </head>
    <body>
        <div class="container-fluid gap-3">
            <header>
                <nav class="nav nav-pills nav-fill">
                    <a class="nav-link active" href="frmlogin.php"><i class="bi bi-house p-1"></i> Inicio</a>
                    <a class="nav-link active disabled fw-bolder" aria-current="page" tabindex="-1" aria-disabled="true">Profesores</a>
                    <a class="nav-link" href="../services/frmestudiantes.php">Estudiantes</a>
                    <a class="nav-link" href="../services/frmnotas.php">Notas</a>
                    <a class="nav-link" href="../services/frmprgacademicos.php">Prg. Academicos</a>
                    <a class="nav-link" href="../services/frmmaterias.php">Materias</a>
                    <a class="nav-link" href="../services/frmrrpedagogicos.php">RR. Pedagogicos</a>
                </nav>
                <div id="logo">
                    <img src="../img/banner_profesores.png" class="img-fluid" alt="logo corporativo" srcset="">
                </div>
            </header>
            <main>
                <div class="row">
                    <div class="col-12">
                        <!--Card-->
                        <div class="card text-center gap-3">
                            <div class="card-header d-flex justify-content-between">
                                <button type="button" id='btnAgregar' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar"><i class="bi bi-person-add p-1"></i> Agregar Profesor</button>
                                <h4>Datos Basicos de los Profesores</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!--tabla profesores-->
                                    <table class="table table-hover" id="tblProfesores">
                                        <thead class="table table-dark">
                                            <tr>
                                                <th scope="col">Identificacion</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Direccion</th>
                                                <th scope="col">Celular</th>
                                                <th scope="col">FechaNacimiento</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Ciudad</th>
                                                <th scope="col">Profesion</th>
                                                <th scope="col">Experiencia</th>
                                                <th scope="col">Genero</th>
                                                <th scope="col" style="width: 12%;">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-start">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                Dev. Bryan Jose Percy Derechos Reservados - 2023
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="../js/frmprofesores.js"></script>
    </body>
</html>

<div class="modal" tabindex="-1" id="modalAgregar" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos del Profesor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="text-semibold">Información Importante</span> Los campos remarcados con <span class="text-danger"> * </span> son necesarios.
                </div>
                <input type="hidden" name="txtId" id="txtId">
                <div class="row">
                    <div class="col-4">
                        <label>Identificacion<span class="text-danger"> * </span></label>
                        <input name="txtIdentificacion" id="txtIdentificacion" type="text" class="form-control prevenir-envio" placeholder="No. Documento" disabled> 
                    </div>            
                    <div class="col-4">
                        <label>Nombres<span class="text-danger"> * </span></label>
                        <input name="txtNombres" id="txtNombres" type="text" class="form-control prevenir-envio" placeholder="Nombres">
                    </div>
                    <div class="col-4">
                        <label>Apellidos<span class="text-danger"> * </span></label>
                        <input name="txtApellidos" id="txtApellidos" type="text" class="form-control prevenir-envio" placeholder="Apellidos">
                    </div>                        
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Dirección<span class="text-danger"> * </span></label>
                        <input name="txtDireccion" id="txtDireccion" type="text" class="form-control prevenir-envio" placeholder="Dirección">
                    </div>            
                    <div class="col-4">
                        <label>Celular<span class="text-danger"> * </span></label>
                        <input name="txtCelular" id="txtCelular" type="text" class="form-control prevenir-envio" placeholder="Celular">
                    </div>            
                    <div class="col-4">
                        <label>Fecha de Nacimiento<span class="text-danger"> * </span></label>
                        <input name="txtFecnac" id="txtFecnac" type="date" class="form-control prevenir-envio">
                    </div>            
                </div>
                <div class="row">
                    <div class="col-5">
                        <label>Email<span class="text-danger"> * </span></label>
                        <input name="txtEmail" id="txtEmail" type="email" class="form-control prevenir-envio" placeholder="Email">
                    </div>            
                    <div class="col-4">
                        <label>Ciudad<span class="text-danger"> * </span></label>
                        <input name="txtCiudad" id="txtCiudad" type="text" class="form-control prevenir-envio" placeholder="Ciudad">
                    </div>            
                    <div class="col-3">
                        <label>Genero<span class="text-danger"> * </span></label>
                        <input name="txtGenero" id="txtGenero" type="text" class="form-control prevenir-envio" placeholder="Genero">
                    </div>            
                </div>
                <div class="row">
                    <div class="col-6">
                        <label>Profesion<span class="text-danger"> * </span></label>
                        <input name="txtProfesion" id="txtProfesion" type="text" class="form-control prevenir-envio" placeholder="Profesion">
                    </div>            
                    <div class="col-6">
                        <label>Experiencia<span class="text-danger"> * </span></label>
                        <input name="txtExperiencia" id="txtExperiencia" type="text" class="form-control prevenir-envio" placeholder="Experiencia">
                    </div>                     
                </div>
                <div class="row">
                    <div class="col-12">
                        <p id="resultado"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-square p-1"></i>Cerrar</button>
                <button type="button" class="btn btn-primary btnInsertar" id="btnInsertar"><i class="bi bi-save p-1"></i> Guardar</button>
                <button type="button" class="btn btn-primary btnGrabarMod" id="btnGrabarMod"><i class="bi bi-pencil-square"></i> Modificar</button>
            </div>
        </div>
    </div>
</div>