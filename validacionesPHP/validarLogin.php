<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contraseña</title>
</head>
<body>
    <?php
//Iniciar la sesion 
session_start();

$usuario = $_POST['username'];
$contraseña = $_POST['password'];

//consultar a la base de datos el ususario y conraseña
//conectrase a la base de datos
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "coboshubbd";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //validar datos 
  $stmt = $conn->prepare("call coboshubbd.sp_validar_login(:usuarioU,:claveU);");
  $stmt->bindParam(':usuarioU', $usuario);
  $stmt->bindParam(':claveU', $contraseña);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();//para traerse todos los datos como un arreglo
                    
  //en la base de datos:
  $usuariobd= $result[0]['nombreLogin'];
  $contraseñabd =$result[0]['claveLogin'] ;

    //echo "usuario: $usuariobd";
    //echo "<br>";
    //echo "contraseñabd: $contraseñabd";
    //echo "<br>";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }


if ($usuariobd == $usuario && $contraseñabd == $contraseña) {
    $_SESSION['usuarioValido']=$usuariobd;

    echo '
    <script>
    window.location.href="../public/indexadmin.php";
    </script>
    ';
} else {
    echo '
    <script>
    window.location.href="../src/views/contraseñaIncorrecta.html";
    </script>
    ';
}


?>
</body>
</html>