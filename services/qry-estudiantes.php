<?php
require_once('db_conexion.php');  // Se carga la clase conexion
try {
    $clConexion=new Conexion();
    $conexion=$clConexion->Conectar();
    ## Calcular el total numero de registros sin filtro
    $sql="SELECT COUNT(*) ";
    $sql .=" AS allcount FROM tbl_estudiantes";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch();
    $totalRecords = $records['allcount'];
    
    ## Total numero de registros con filtro
    $sql="SELECT COUNT(*)";
    $sql .=" AS allcount FROM tbl_estudiantes ";
    $sql .=" WHERE 1 ";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch();
    $totalRecordwithFilter = $records['allcount'];
    
    ## Obetener los registros de la tabla.
    $sql ="SELECT fld_consecutivo as Id";
    $sql.=", fld_id as Identificacion";
    $sql.=", fld_nombre as Nombres";
    $sql.=", fld_apellido as Apellidos";
    $sql.=", fld_fecnad as Fecha_Nacimiento";
    $sql.=", fld_direccion as Direccion";
    $sql.=", fld_ciures as Ciudad";
    $sql.=", fld_celular as Celular";
    $sql.=", fld_email as Email";
   
    $sql .=" FROM tbl_estudiantes";
    $sql .="  WHERE 1 ORDER BY 1";

    $stmt = $conexion->prepare($sql);
   
    $stmt->execute();
    $empRecords = $stmt->fetchall();
    
    $data = array();
    
    foreach($empRecords as $row){
        $op ='

        <button class="btn btn-datatable btn-primary p-1 btnConsultar" id="'.$row['Id'].'">
           <i class="bi bi-search"></i>
        </button>

        <button class="btn btn-datatable btn-success p-1 btnModificar" id="'.$row['Id'].'">
            <i class="bi bi-pencil-square"></i>
        </button>

        <button class="btn btn-datatable btn-danger p-1 btnEliminar" id="'.$row['Id'].'">
            <i class="bi bi-eraser-fill"></i>
        </button>
        ';
        $data[] = array(
            'Identificacion'=>$row['Identificacion']
            ,'Nombres'=>$row['Nombres']
            ,'Apellidos'=>$row['Apellidos']
            ,'Fecha_Nacimiento'=>$row['Fecha_Nacimiento']
            ,'Direccion'=>$row['Direccion']
            ,'Ciudad'=>$row['Ciudad']
            ,'Celular'=>$row['Celular']
            ,'Email'=>$row['Email']
            ,'Accion'=>$op
        );
    }
    
    ## respuesta
    $response = array(
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
    );
    # Devuelve la información al formulario
    echo json_encode($response);
    $conexion= NULL;
}catch (Exception $e) {
        
        echo '<span class="label label-danger label-block">Error al cargar los datos</span>';
}
?>