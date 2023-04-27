<?php
require_once('db_conexion.php');
try {
    $clConexion=new Conexion();
    $conexion=$clConexion->Conectar();
   
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
    
    // Se arma la instruccion INSERT INTO
    $sql="INSERT INTO tbl_profesores (fld_id,fld_nombre,fld_apellido,fld_direccion,fld_celular";
    $sql .=",fld_fecnac,fld_email,fld_ciures,fld_profesion,fld_experiencia,fld_genero) VALUES (";
    $sql .="'".$vIdentificacion."'";
    $sql .=",'".$vNombre."'";
    $sql .=",'".$vApellido."'";
    $sql .=",'".$vDireccion."'";
    $sql .=",'".$vCelular."'";
    $sql .=",'".$vFecnac."'";
    $sql .=",'".$vEmail."'";
    $sql .=",'".$vCiudad."'";
    $sql .=",'".$vProfesion."'";
    $sql .=",'".$vExperiencia."'";
    $sql .=",'".$vGenero."')";
  
    // SE prerara la instruccion y se le envia a la conexion 
    $sqladd=$conexion->prepare($sql);
    // SE ejecuta la instruccion
    $sqladd->execute();
    // Se valida si tuvo algun resultado
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