<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD{

	static public function IniciarSesionM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

}