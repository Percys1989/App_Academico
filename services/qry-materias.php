<?php
require_once('db_conexion.php'); 
try {
    $clConexion=new Conexion();
    $conexion=$clConexion->Conectar();
    
    $sql="SELECT COUNT(*) ";
    $sql .=" AS allcount FROM tbl_materias";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch();
    $totalRecords = $records['allcount'];
    
    $sql="SELECT COUNT(*)";
    $sql .=" AS allcount FROM tbl_materias ";
    $sql .=" WHERE 1 ";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch();
    $totalRecordwithFilter = $records['allcount'];
    
    $sql ="SELECT fld_consecutivo as Id";
    $sql.=", fld_codigo as codigo";
    $sql.=", fld_nombre as nombre";
    $sql.=", fld_programa as programas";
    $sql.=", fld_tipo_materia as tipo_materias";
   
    $sql .=" FROM tbl_materias";
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
            'codigo'=>$row['codigo']
            ,'nombre'=>$row['nombre']
            ,'programas'=>$row['programas']
            ,'tipo_materias'=>$row['tipo_materias']
            ,'Accion'=>$op
        );
    }
    
    $response = array(
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
    );
    
    echo json_encode($response);
    $conexion= NULL;
}catch (Exception $e) {
        
        echo '<span class="label label-danger label-block">Error al cargar los datos</span>';
}
?>