<?php
	class Conexion {

		public static function Conectar(){
			$driver = 'mysql'; //mysql no cambiar
			$host = 'estudianteinca.com'; //localhost
			$dbname = 'estudia4_31'; //bdd
			$username ='estudia4_31'; //usuario
			$passwd = 'Usuario.31'; //contra
			// $host = 'localhost';
			// $dbname = 'db_academico';
			// $username ='root';
			// $passwd = 'Centro$inca123.';
			$server=$driver.':host='.$host.';dbname='.$dbname;
			try {
				$conexion = new PDO($server,$username,$passwd);
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conexion -> exec("SET NAMES 'utf8';");
			} catch (Exception $e) {

				$conexion = null;
            	echo '<span class="label label-danger label-block">ERROR AL CONECTARSE A LA BASE DE DATOS, PRESIONE F5</span>';
            	exit();
			}
			return $conexion;

		}

	}
	$host = 'estudianteinca.com'; //localhost
	$dbname = 'estudia4_31'; //bdd
	$username ='estudia4_31'; //usuario
	$passwd = 'Usuario.31'; //contra
	$conexion = mysqli_connect($host,$username,$passwd,$dbname);
?>