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
        <title>Scholl Manager - Estudiantes</title>
    </head>
    <body>
        <div class="container-fluid gap-3">  
            <header>
                <nav class="nav nav-pills nav-fill">
                    <a class="nav-link active" href="frmlogin.php"><i class="bi bi-house p-1"></i> Inicio</a>
                    <a class="nav-link" href="../services/frmprofesores.php">Profesores</a>
                    <a class="nav-link active disabled fw-bolder" aria-current="page" tabindex="-1" aria-disabled="true">Estudiantes</a>
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
                            <button type="button" id='btnAgregar' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar"><i class="bi bi-person-add p-1"></i> Agregar Estudiante</button>
                                <h4>Datos Basicos de los Estudiantes</h4>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <!--tabla estudiantes-->
                                <table class="table table-hover" id="tblEstudiantes">
                                    <thead class="table table-dark">
                                        <tr>
                                            <th scope="col">Cedula</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Fecha_Nacimiento</th>
                                            <th scope="col">Direccion</th>
                                            <th scope="col">Ciudad</th>
                                            <th scope="col">Celular</th>
                                            <th scope="col">Email</th>
                                            <th scope="col" style="width: 11%;">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-start">
                                        <!-- <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>
                                                <button class="btn btn-success p-1"><i class="bi bi-pencil-square"></i></button>
                                                <button class="btn btn-danger p-1"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <div class="card-footer text-muted">
                                Dev. Bryan Jose Percy <i class="fa-regular fa-copyright"></i> Derechos Reservados - 2023
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="../js/frmestudiantes.js"></script>
  </body>
</html>
<!-- Modal Agregar -->
<div class="modal" tabindex="-1" id="modalAgregar" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos de los Estudiantes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="text-semibold">Información Importante</span> Los campos remarcados con <span class="text-danger"> * </span> son necesarios.
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Identificacion<span class="text-danger"> * </span></label>
                        <input name="txtIdentificacion" id="txtIdentificacion" type="text" class="form-control prevenir-envio" placeholder="No. Documento">
                    </div>            
                    <div class="col-8">
                        <label>Nombre<span class="text-danger"> * </span></label>
                        <input name="txtNombre" id="txtNombre" type="text" class="form-control prevenir-envio" placeholder="Nombre">
                    </div>            
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Fecha Nacimiento<span class="text-danger"> * </span></label>
                        <input name="txtFechaNcto" id="txtFechaNcto" type="date" class="form-control prevenir-envio" placeholder="Fecha Nacimiento">
                    </div>            
                    <div class="col-8">
                        <label>Dirección<span class="text-danger"> * </span></label>
                        <input name="txtDireccion" id="txtDireccion" type="text" class="form-control prevenir-envio" placeholder="Dirección">
                    </div>            
                </div>
                <div class="row">
                    <div class="col-6">
                        <label>Email<span class="text-danger"> * </span></label>
                        <input name="txtEmail" id="txtEmail" type="text" class="form-control prevenir-envio" placeholder="Email">
                    </div>            
                    <div class="col-4">
                        <label>Celular<span class="text-danger"> * </span></label>
                        <input name="txtCelular" id="txtCelular" type="text" class="form-control prevenir-envio" placeholder="Celular">
                    </div>            
                    <div class="col-2">
                        <label>Tel fijo<span class="text-danger"> * </span></label>
                        <input name="txtTelefono" id="txtTelefono" type="text" class="form-control prevenir-envio" placeholder="Telefono">
                    </div>            
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-square p-1"></i>  Cancelar</button>
                <button type="button" class="btn btn-primary"><i class="bi bi-save p-1"></i>  Guardar</button>
            </div>
        </div>
    </div>
</div>