<?php
require_once('db_conexion.php');  // Se carga la clase conexion
try {
    $clConexion=new Conexion();
    $conexion=$clConexion->Conectar();
    $vId=(isset($_POST['vId'])) ? $_POST['vId']:'';
    $sql ="SELECT fld_consecutivo as Id";
    $sql.=", fld_id as Identificacion";
    $sql.=", fld_nombre as Nombres";
    $sql.=", fld_apellido as Apellidos";
    $sql.=", fld_direccion as Direccion";
    $sql.=", fld_celular as Celular";
    $sql.=", fld_fecnac as FechaNacimiento";
    $sql.=", fld_email as Email";
    $sql.=", fld_ciures as Ciudad";
    $sql.=", fld_profesion as Profesion";
    $sql.=", fld_experiencia as Experiencia";
    $sql.=", fld_genero as Genero";
    $sql .=" FROM tbl_profesores";
    $sql .="  WHERE fld_consecutivo=".$vId;
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $empRecords = $stmt->fetchall();
    $datosProfesor = array();
    foreach($empRecords as $row){
        
        $datosProfesor['Identificacion']=$row['Identificacion'];
        $datosProfesor['Nombres']=$row['Nombres'];
        $datosProfesor['Apellidos']=$row['Apellidos'];
        $datosProfesor['Direccion']=$row['Direccion'];
        $datosProfesor['Celular']=$row['Celular'];
        $datosProfesor['FechaNacimiento']=$row['FechaNacimiento'];
        $datosProfesor['Email']=$row['Email'];
        $datosProfesor['Ciudad']=$row['Ciudad'];
        $datosProfesor['Profesion']=$row['Profesion'];
        $datosProfesor['Experiencia']=$row['Experiencia'];
        $datosProfesor['Genero']=$row['Genero'];
    }
    echo json_encode($datosProfesor,JSON_FORCE_OBJECT);
    $conexion= NULL;
}catch (Exception $e) {
        echo '<span class="label label-danger label-block">Error al cargar los datos</span>';
}
?>