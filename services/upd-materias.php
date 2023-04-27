<?php
require_once('db_conexion.php');
try {
    $clConexion=new Conexion();
    $conexion=$clConexion->Conectar();
    
    $vId=(isset($_POST['vId'])) ? $_POST['vId']:'';
    $vCodigo=(isset($_POST['vCodigo'])) ? $_POST['vCodigo']:'';
    $vNombre=(isset($_POST['vNombre'])) ? $_POST['vNombre']:'';
    $vProgama=(isset($_POST['vProgama'])) ? $_POST['vProgama']:'';
    $vMateria=(isset($_POST['vMateria'])) ? $_POST['vMateria']:'';
    
    $sql="UPDATE tbl_materias SET ";
    $sql .="fld_codigo='".$vCodigo."'";
    $sql .=",fld_nombre='".$vNombre."'";
    $sql .=",fld_programa='".$vProgama."'";
    $sql .=",fld_tipo_materia='".$vMateria."'";
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