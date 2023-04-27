<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholl Manager - login</title>
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
    <style>
        .bg{
            background-image: url(img/bglogin.jpg);
            background-position: center center;
        }
    </style>
</head>
<body>
    <div class="container-fluid w-75 bg-primary mt-4 rounded shadow">
        <div class="row aling-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
            </div>
            <!-- Inicio de sesion -->
            <div class="col bg-white p-5 rounded-end" id="frmIniSesion" style="display: block;">
                <h2 class="fw-bold text-center text-primary py-5">Bienvenido</h2>
                <form action="services/qry-frmlogin.php" method="POST" id="login-form">
                    <div class="mb-4">
                        <label for="" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario"  autofocus required>
                    </div>
                    <div class="mb-4">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="clave" id="clave" autofocus required>
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" name="connected" id="" class="form-check-input">
                        <label for="connected" class="form-check-label"> Recordar</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" id="btn-login" class="btn btn-primary">Ingresar</button>
                    </div>
                    <div class="my-3">
                        <!-- <span> No tienes Cuenta? <a href="#" type="btn" onclick="registro()">Registrarse</a></span><br> -->
                        <span><a href="#">Recuperar Contraseña</a></span>
                    </div>
                </form>
                <h5>usuario:admin</h5>
                <h5>clave:123456</h5>
                <div class="container-fluid w-100 my-5">
                    <div class="row text-center">
                        <div class="col-12">Iniciar Sesion con:</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-primary w-100 my-1"> 
                                <div class="row aling-item-center ">
                                    <div class="col-2 d-none d-md-block">
                                        <i class="bi bi-facebook"></i>
                                    </div>
                                    <div class="col-12 col-md-10 text-center">
                                        Facebook
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-danger w-100 my-1"> 
                                <div class="row aling-item-center ">
                                    <div class="col-2 d-none d-md-block">
                                    <i class="bi bi-google"></i>
                                    </div>
                                    <div class="col-12 col-md-10 text-center">
                                        Google
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Registro
            <div class="col bg-white p-5 rounded-end" id="frmRegistro" style="display: none;">
                <h2 class="fw-bold text-center text-primary py-5">Registro de Usuario</h2>

                <form action="services/frmlogin.php" method="POST">  
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo Electronico</label>
                        <input type="email" class="form-control" name="email" id="email" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required autofocus>
                        <label for="confpassword" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="confpassword" id="confpassword" required autofocus>
                    </div>
                    <div class="d-grid">
                        <input type="submit" value="Registrarse" class="btn btn-primary" id="btnRegistro" onclick="">
                    </div>
                    <div class="my-3">
                        <span> ya tienes cuenta? <a href="index.php" type="btn" onclick="registro()">Iniciar Sesion</a></span><br>
                    </div>
                </form>
                <div class="container w-100 my-5">
                    <div class="row text-center">
                        <div class="col-12">Registrarse con:</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-primary w-100 my-1"> 
                                <div class="row aling-item-center ">
                                    <div class="col-2 d-none d-md-block">
                                        <i class="bi bi-facebook"></i>
                                    </div>
                                    <div class="col-12 col-md-10 text-center">
                                        Facebook
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-danger w-100 my-1"> 
                                <div class="row aling-item-center ">
                                    <div class="col-2 d-none d-md-block">
                                    <i class="bi bi-google"></i>
                                    </div>
                                    <div class="col-12 col-md-10 text-center">
                                        Google
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <script src="js/funciones.js"></script>
</body>
</html>