<?php
require_once('db_conexion.php');  
try {
    $clConexion=new Conexion();
    $conexion=$clConexion->Conectar();
    $vId=(isset($_POST['vId'])) ? $_POST['vId']:'';
    $sql ="SELECT fld_consecutivo as Id";
    $sql.=", fld_codigo as codigo";
    $sql.=", fld_nombre as nombre";
    $sql.=", fld_programa as programas";
    $sql.=", fld_tipo_materia as tipo_materias";
    $sql .=" FROM tbl_materias";
    $sql .="  WHERE fld_consecutivo=".$vId;
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $empRecords = $stmt->fetchall();
    $datosMateria = array();
    foreach($empRecords as $row){
        
        $datosMateria['codigo']=$row['codigo'];
        $datosMateria['nombre']=$row['nombre'];
        $datosMateria['programas']=$row['programas'];
        $datosMateria['tipo_materias']=$row['tipo_materias'];
    }
    echo json_encode($datosMateria,JSON_FORCE_OBJECT);
    $conexion= NULL;
}catch (Exception $e) {
        echo '<span class="label label-danger label-block">Error al cargar los datos</span>';
}
?>