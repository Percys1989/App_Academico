<?php
require_once('db_conexion.php'); 
try {
    $clConexion=new Conexion();
    $conexion=$clConexion->Conectar();

    $vId=(isset($_POST['vId'])) ? $_POST['vId']:'';
    $vIdentificacion=(isset($_POST['vIdentificacion'])) ? $_POST['vIdentificacion']:'';
    $vNombre=(isset($_POST['vNombre'])) ? $_POST['vNombre']:'';
    $vApellido=(isset($_POST['vApellido'])) ? $_POST['vApellido']:'';
    $vDireccion=(isset($_POST['vDireccion'])) ? $_POST['vDireccion']:'';
    $vCelular=(isset($_POST['vCelular'])) ? $_POST['vCelular']:'';
    $vFecnac=(isset($_POST['vFecnac'])) ? $_POST['vFecnac']:'';
    $vEmail=(isset($_POST['vEmail'])) ? $_POST['vEmail']:'';
    $vCiudad=(isset($_POST['vCiudad'])) ? $_POST['vCiudad']:'';
    $vGenero=(isset($_POST['vGenero'])) ? $_POST['vGenero']:'';
    $vProfesion=(isset($_POST['vProfesion'])) ? $_POST['vProfesion']:'';
    $vExperiencia=(isset($_POST['vExperiencia'])) ? $_POST['vExperiencia']:'';
    
    $sql="UPDATE tbl_profesores SET ";
    $sql .="fld_id='".$vIdentificacion."'";
    $sql .=",fld_nombre='".$vNombre."'";
    $sql .=",fld_apellido='".$vApellido."'";
    $sql .=",fld_direccion='".$vDireccion."'";
    $sql .=",fld_celular='".$vCelular."'";
    $sql .=",fld_fecnac='".$vFecnac."'";
    $sql .=",fld_email='".$vEmail."'";
    $sql .=",fld_ciures='".$vCiudad."'";
    $sql .=",fld_genero='".$vGenero."'";
    $sql .=",fld_profesion='".$vProfesion."'";
    $sql .=",fld_experiencia='".$vExperiencia."'";
    $sql .=" WHERE fld_consecutivo=".$vId;
    $sqladd=$conexion->prepare($sql);
    $sqladd->execute();
    if ($sqladd->rowCount()>0){
        $data=1;
    }   else {
        $data=0;
    }
    echo json_encode($data);
 }catch (Exception $e) {
     $data=3;     
     echo json_encode($data);
 }
?>