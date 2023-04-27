<?php
require_once('db_conexion.php');  // Se carga la clase conexion
$rspta = array();
try {
    $clConexion=new Conexion();
    $conexion=$clConexion->Conectar();
    $vId=(isset($_POST['vId'])) ? $_POST['vId']:'';
    
    $sql="DELETE FROM tbl_profesores ";
    $sql .=" WHERE fld_consecutivo=".$vId;
    $sqladd=$conexion->prepare($sql);
    $sqladd->execute();
    if ($sqladd->rowCount()>0){
    	$rspta['status']  = 'success';
		$rspta['message'] = 'Profesor eliminado correctamente...';
		} else {
		$rspta['status']  = 'error';
		$rspta['message'] = 'No se puede eliminar el Profesor ...';
    }
    echo json_encode($rspta);
 }catch (Exception $e) {
    $rspta['status']  = 'error';
    $rspta['message'] = 'No se puede eliminar el Profesor ...';
     echo json_encode($rspta);
 }
?>