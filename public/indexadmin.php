<?php
session_start();

if (isset($_SESSION['usuarioValido'])) {
    

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CobosHub</title>
    <link rel="stylesheet" href="../src/styles/css/estiloindex.css">
    <link rel="stylesheet" href="../src/styles/css/estilomenu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.css">
</head>


<body>
    <div class="container-fluid" id="contenedorprincipal">
        <!--encabezado-->
        <header>
            <!--grid-->
            <div class="">
                <div class="row">
                    <div class="col p-5">
                        <h3>CobosHub Bienvenido
                        <?php
                            echo $_SESSION['usuarioValido']
                        ?>
                        </h3>
                    </div>


                    <!--menu desplegado y barra de busqueda-->
                    <div class="col p-5">
                        <div class="input-group">
                            <button class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
                                Categorias
                            </button>


                            <ul class="dropdown-menu">
                                <ol><a href="../src/views/refaccionaria.html" class="dropdown-item">Refaccionaría</a></ol>
                                <ol><a href="../src/views/videojuegos.html" class="dropdown-item">Videojuegos</a></ol>
                                <ol><a href="../src/views/ropa.html" class="dropdown-item">Ropa</a></ol>
                            </ul>
                            <input class="form-control" type="text" name="txtbuscar" placeholder="Buscar">
                            <button class="btn btn-warning" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg></button>
                        </div>
                    </div>


                    <div class="col p-5">
                        <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-cart3" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                            </svg></p>
                    </div>
                </div>
            </div>


        </header>


        <!--menu-->
        <nav>
            <ul>
                <li>
                    <a href="" data-bs-toggle="offcanvas" data-bs-target="#demo"><i><i class="fa-solid fa-bars"></i></i>
                        Todo</a>
                    <div class="offcanvas offcanvas-start text-bg-dark" id="demo">
                        <div class="offcanvas-header">
                            <h1 class="offcanvas-title">Información</h1>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p>Tendencias</p>
                            <p>Programas</p>
                            <p>Descuentos</p>
                            <p>Ayuda y configuración</p>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="">Promociones</a>
                </li>
                <li>
                    <a href="">Lo Mas Vendido</a>
                </li>
                <li id="perfil">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Perfil</a>
                    <ul class="dropdown-menu">
                        <ol><a href="../src/views/login.html" class="dropdown-item">Iniciar sesión</a></ol>
                        <ol><a href="../src/views/registro.html" class="dropdown-item">Registrarse</a></ol>
                        <ol><a href="../src/views/contraseña.html" class="dropdown-item">Recuperar contraseña</a></ol>
                        <ol><a href="../validacionesPHP/cerrarsesion.php" class="dropdown-item">Cerrar sesión</a></ol>
                    </ul>
                </li>
            </ul>
        </nav>

        <!--contenido-->
        <!--Carrusel de promociones-->
        <section>
            <iframe name="contenidoiframeindex" width="100%" height="100%" src="../src/views/promociones.html"
                frameborder="0"></iframe>
        </section>

        <!--Cartas de productos-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-bottom" src="../public/assets/img/card1.jpg" alt="Card image">
                            <h4 class="card-title">Camisa beige</h4>
                            <p class="card-text">Camisa de color beige para varón</p>
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-bottom" src="../public/assets/img/card2.jpg" alt="Card image">
                            <h4 class="card-title">Chaqueta americana</h4>
                            <p class="card-text">Chaqueta de color negro con blanco</p>
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-bottom" src="../public/assets/img/card3.jpg" alt="Card image">
                            <h4 class="card-title">Pans negro</h4>
                            <p class="card-text">Pans de color negro para varón</p>
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-bottom" src="../public/assets/img/card4.webp" alt="Card image">
                            <h4 class="card-title">Overol de mezclilla</h4>
                            <p class="card-text">Overol de mezclilla unisex</p>
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--pie de pagina-->
        <footer class="footer">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <p>Copyright © CobosHub 2024. Todos los derechos se encuentran reservados.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Politicas de privacidad</a></li>
                    <li class="list-inline-item"><a href="#">Terminos de uso</a></li>
                    <li class="list-inline-item"><a href="#">Contactanos</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
    </div>
</body>
</html>
<?php
//aqui se cierra el if
}else {
    echo 'Debes iniciar sesion <br>';
    echo'
    <a href="../src/views/login.html">Login</a>
    ';
}
?>