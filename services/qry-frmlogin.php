<?php
    require_once("db_conexion.php");

    session_start();

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $query = "SELECT COUNT(*) as contar from tbl_usuarios WHERE fld_usuario='$usuario' AND fld_clave=md5('$clave')";
    $consulta = mysqli_query($conexion,$query);
    $array = mysqli_fetch_array($consulta);

    if ($array['contar']>0) {
        $_SESSION['username'] = $usuario;
        header("location: frmlogin.php");
    } else {
        header("location: ../index.php");
    }


?>

<!-- <?php
    // require_once("db_conexion.php");

    // session_start();

    // $usuario = $_POST['usuario'];
    // $clave = $_POST['clave'];

    // $query = "SELECT COUNT(*) as contar from tbl_usuarios WHERE fld_usuario=? AND fld_clave=?";
    // $stmt = mysqli_prepare($conexion, $query);
    // mysqli_stmt_bind_param($stmt, "ss", $usuario, hash('sha256', $clave));
    // mysqli_stmt_execute($stmt);
    // $resultado = mysqli_stmt_get_result($stmt);
    // $array = mysqli_fetch_array($resultado);

    // if ($array['contar']>0) {
    //     $_SESSION['username'] = $usuario;
    //     header("location: frmlogin.php");
    // } else {
    //     header("location: ../index.php");
    // }


?> -->