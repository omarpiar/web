<?php
session_start();

//para validar que la variable no sea nula con 'isset'
if (isset($_SESSION['usuarioValido'])) {
    session_destroy();

    echo '
    <script>
    window.location.href="../index.html";
    </script>
    ';
}
?>