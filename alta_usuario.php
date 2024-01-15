<?php

require("conexion.php");

$nombre = $_POST['nombre'];
echo($nombre);

$apellidos = $_POST['apellidos'];
echo($apellidos);

$genero = $_POST['genero'];
echo($genero);

$domicilio = $_POST['domicilio'];
echo($domicilio);

$usuario = $_POST['usuario'];
echo($usuario);

$contrasena = $_POST['password'];
$cifrado_contra = password_hash($contrasena, PASSWORD_DEFAULT, array("cost"=>12));
echo($cifrado_contra);

$sql = "INSERT INTO usuarios (id_usuario, nombre, apellidos, genero, domicilio, usuario, contrasena) VALUES (NULL, :nombre, :apellidos, :genero, :domicilio, :usuario, :contrasena)";
$result = $conex->prepare($sql);
$result->execute(array(":nombre"=>$nombre, ":apellidos"=>$apellidos, ":genero"=>$genero, ":domicilio"=>$domicilio, ":usuario"=>$usuario, ":contrasena"=>$cifrado_contra));

if ($result){
    header("location: formulario.html");
}else{
    header("location: formulario.html");
}

$result->closeCursor();

?>