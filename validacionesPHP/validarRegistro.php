<?php

$nombreUsuario = $_POST['nombre'];
$apellidoPaternoUsuario = $_POST['apellidoPaterno'];
$apellidoMaternoUsuario = $_POST['apellidoMaterno'];
$emailUsuario = $_POST['correo'];
$telefonoUsuario = $_POST['telefono'];
$fotoUsuario=addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
$nombreLogin = $_POST['usuario'];
$claveLogin = $_POST['contrasena'];
$idRolUsuario = $_POST['tipoUsuario'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coboshubbd";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("call coboshubbd.crear_cuenta(?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $nombreUsuario, PDO::PARAM_STR);
    $stmt->bindParam(2, $apellidoPaternoUsuario, PDO::PARAM_STR);
    $stmt->bindParam(3, $apellidoMaternoUsuario, PDO::PARAM_STR);
    $stmt->bindParam(4, $emailUsuario, PDO::PARAM_STR);
    $stmt->bindParam(5, $telefonoUsuario, PDO::PARAM_STR);
    $stmt->bindParam(6, $fotoUsuario, PDO::PARAM_LOB);
    $stmt->bindParam(7, $nombreLogin, PDO::PARAM_STR);
    $stmt->bindParam(8, $claveLogin, PDO::PARAM_STR);
    $stmt->bindParam(9, $idRolUsuario, PDO::PARAM_INT);
    $stmt->execute();

} catch (PDOException $e) {
    echo 'Error de sintaxis de SQL' . $e->getMessage();
}
$conn = null;

if ($stmt->execute()) {
    header("Location: ../index.html?registered=true");
    exit;
} else {
    $mensaje = "Error al registrar. Intente nuevamente.";
    header("Location: validarRegistro.php?mensaje=$mensaje");
    exit;
}
?>