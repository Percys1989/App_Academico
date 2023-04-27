<?php
require_once('db_conexion.php'); 
try {
    $clConexion=new Conexion();
    $conexion=$clConexion->Conectar();
  
    $vCodigo=(isset($_POST['vCodigo'])) ? $_POST['vCodigo']:'';
    $vNombre=(isset($_POST['vNombre'])) ? $_POST['vNombre']:'';
    $vPrograma=(isset($_POST['vPrograma'])) ? $_POST['vPrograma']:'';
    $vMateria=(isset($_POST['vMateria'])) ? $_POST['vMateria']:'';
    
    $sql="INSERT INTO tbl_materias (fld_codigo,fld_nombre,fld_programa";
    $sql .=",fld_tipo_materia) VALUES (";
    $sql .="'".$vCodigo."'";
    $sql .=",'".$vNombre."'";
    $sql .=",'".$vPrograma."'";
    $sql .=",'".$vMateria."')";
  
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