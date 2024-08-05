<?php

// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'coboshubbd';

// Connect to database using PDO
$dsn = "mysql:host=$db_host;dbname=$db_name";
$conn = new PDO($dsn, $db_username, $db_password);

// Set error mode to exceptions
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Recover password

    $correo_electronico = $_POST['correo'];

    // Call stored procedure to recover password
    $stmt = $conn->prepare("call coboshubbd.sp_recuperarClave(:correo_electronico)");
    $stmt->bindParam(":correo_electronico", $correo_electronico);
    $stmt->execute();
    $result = $stmt->fetchAll();

   
        
    $email = $result[0]['emailusuario'];
    $contraseña = $result[0]['claveLogin'];
    $usuario = $result[0]['nombreUsuario'];

            $to=$email;
            $subject="Recuperar contraseña";
            $message="Hola $usuario, hemos recibido su solicitud de recuperar su contraseña, su clave es: $contraseña";
            $headers='From: picazoaranzoloomar@gmail.com'."\r\n".'Reply-To: omarpicazoaranzolo@gmail.com';            

            // Send the email
            if (mail($to,$subject,$message,$headers)) {
                echo '
    <script>
    window.location.href="../src/views/correoEnviado.html";
    </script>
    ';
            } else {
                echo "No se logro enviar el correo";
            }
        
    


// Close database connection
$conn = null;
?>