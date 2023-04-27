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
?> <!doctype html>
<html lang="es">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Boostrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <!--IconBoostrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <!--Datatable-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
        <title>Scholl Manager - Notas</title>
  </head>
  <body>
    <div class="container-fluid">
        <header>
            <nav class="nav nav-pills nav-fill">
                <a class="nav-link active" href="frmlogin.php"><i class="bi bi-house p-1"></i> Inicio</a>
                <a class="nav-link" href="../services/frmprofesores.php">Profesores</a>
                <a class="nav-link" href="../services/frmestudiantes.php">Estudiantes</a>
                <a class="nav-link active disabled fw-bolder" aria-current="page" tabindex="-1" aria-disabled="true">Notas</a>
                <a class="nav-link" href="../services/frmprgacademicos.php">Prg. Academicos</a>
                <a class="nav-link" href="../services/frmmaterias.php">Materias</a>
                <a class="nav-link" href="../services/frmrrpedagogicos.php">RR. Academicos</a>
            </nav>
            <div id="logo">
                <img src="../img/banner_profesores.png" class="img-fluid" alt="logo corporativo" srcset="">
            </div>
        </header>
        <main>
            <div class="row">
                <div class="col-12">
                    <div class="card text-center gap-3">
                        <!--card-->
                        <div class="card-header d-flex justify-content-between">
                        <button type="button" id='btnAgregar' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar"><i class="bi bi-person-add p-1"></i> Agregar Nota</button>
                            <h4>Datos de las Notas</h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <!--Tabla notas-->
                            <table class="table table-hover" id="tblnotas">
                                <thead class="table table-dark">
                                    <tr>
                                        <th scope="col">Codigo Estudiante</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Materia</th>
                                        <th scope="col">Tipo de Materia</th>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Accion</th>
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
                            Dev. Bryan Jose Percy Derechos Reservados - 2023
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../js/frmnotas.js"></script>
  </body>
</html>
<!-- Modal Agregar -->
<div class="modal" tabindex="-1" id="modalAgregar" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos de las Notas</h5>
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
                    <div class="col-8">
                        <label>Dirección<span class="text-danger"> * </span></label>
                        <input name="txtDireccion" id="txtDireccion" type="text" class="form-control prevenir-envio" placeholder="Dirección">
                    </div>            
                    <div class="col-4">
                        <label>Telefono<span class="text-danger"> * </span></label>
                        <input name="txtTelefono" id="txtTelefono" type="text" class="form-control prevenir-envio" placeholder="Telefono">
                    </div>            
                </div>
                <div class="row">
                    <div class="col-6">
                        <label>Email<span class="text-danger"> * </span></label>
                        <input name="txtEmail" id="txtEmail" type="text" class="form-control prevenir-envio" placeholder="Email">
                    </div>            
                    <div class="col-4">
                        <label>Fecha Nacimiento<span class="text-danger"> * </span></label>
                        <input name="txtFechaNcto" id="txtFechaNcto" type="date" class="form-control prevenir-envio" placeholder="Fecha Nacimiento">
                    </div>            
                    <div class="col-2">
                        <label>Barrio<span class="text-danger"> * </span></label>
                        <input name="txtBarrio" id="txtBarrio" type="text" class="form-control prevenir-envio" placeholder="Barrio">
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