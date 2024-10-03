<?php

class UsuariosC{

 public function IniciarSesionC(){

 	if(isset($_POST["usuario"])){

 		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"])){

 			$tablaBD = "usuarios";

 			$datosC = array("usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"]);

 			$resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

 			if($resultado["usuario"] == $_POST["usuario"] && $resultado["clave"] == $_POST["clave"]){

 				$_SESSION["Ingresar"] = true;

 				$_SESSION["id"] = $resultado["id"];
 				$_SESSION["usuario"] = $resultado["usuario"];
 				$_SESSION["clave"] = $resultado["clave"];
 				$_SESSION["nombre"] = $resultado["nombre"];
 				$_SESSION["apellido"] = $resultado["apellido"];
 				$_SESSION["documento"] = $resultado["documento"];
 				$_SESSION["foto"] = $resultado["foto"];
 				$_SESSION["rol"] = $resultado["rol"];

 				echo '<script>

 					window.location = "Inicio";
 				</script>';

 			}else{

 				echo '<br><div class="alert alert-danger">Error al Ingresar</div>';

 				}

 			}

 		}

	}

}