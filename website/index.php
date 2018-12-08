<?php
$connect = mysqli_connect("mysql.aarias.colexio-karbo.com", "karbo_aarias", "ACruz*2017", "karbo_aarias"); 
//starting a session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Consulta tu cuenta antes de pedirla.">
  <meta name="author" content="Aitor Arias Cruz">
  <meta name="keywords" content="bar, bares, app, cruceros, restaurantes, hotel, gestion, comunicacion, viajes" />

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <title>El bar de la esquina</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
    rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic"
    rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">El bar de la esquina</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">¡Conócenos!</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Haz tu pedido</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#descarga">Administrador</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacta con nosotros</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 <header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-10  mx-auto">
          <h1 class="text-uppercase">
            <strong>El bar de la esquina.</strong>
          </h1>
          <hr>
        </div>
        <div class="col-lg-8 mx-auto text-black">
          <p class="text-black"><strong><br><br>
			  <br> Ya disponible.</strong></p>
            <br><br>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">¡Conócenos!</a>
        </div>
      </div>
    </div>
  </header>

  <section class="bg-primary" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading text-white">¿Qué tenemos de especial?</h2>
          <hr class="light my-4">
          <p class="text-faded mb-4">
          "El bar de la esquina" es de los primeros bares online en la que puedes conocer tu gasto antes de entrar a nuestro establecimiento. Esta idea surge debido al examen propuesto por Lucía, profesora del Colegio Karbo correspondiente a la FP de Desarrollo de Aplicaciones multiplataforma. Además, el administrador de la web puede acceder a modificar, crear, borrar y ver los platos del local es unos clicks. El diseño de la web está apoyada con Boostrap, lo cual nos permite un diseño más visual, además de poder ser vista desde cualquier dispositivo. Las principales tecnologías son: PHP, MySQL, HTML, CSS y JavaScript.
          </p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Haz tu pedido</a>
        </div>
      </div>
    </div>
  </section>

  <section id="services">
  <div class="container" style="width:60%;">
	<h2 align="center">Pedido online</h2>
  <div class="container text-center">
      <a class="btn btn-dark btn-xl sr-button" href="../php/index.php">Solicita la factura</a>
    </div>
    <div class="container">
  </section>

  

  <section class="bg-dark text-white" id="descarga">
    <div class="container text-center">
      <h2 class="mb-4">Administrador</h2>
      <a class="btn btn-light btn-xl sr-button" href="../php/CRUD/index.php">Accede a la administración</a>
    </div>
  </section>
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading">Contacta con nosotros</h2>
          <hr class="my-4">
          <p class="mb-5">¿Quieres ponerte en contacto conmigo?
            <br>¿Tienes alguna sugerencia?
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 mr-auto text-center">
          <a href="mailto:hello@buleapp.com">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:aitor.arias.cruz@colexio-karbo.com">Correo Karbo Aitor Arias</a>
            </p>
          </a>
        </div>

        <div class="col-lg-4 mr-auto text-center">
          <a href="mailto:aitor.acruz@gmail.com">
            <i class="fa fa-user fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:aitor.acruz@gmail.com">Correo personal</a>
            </p>
          </a>
        </div>

        <div class="col-lg-4 mr-auto text-center">
          <a href="mailto:hello@buleapp.com">
            <i class="fa fa-github fa-4x mb-3 sr-contact"></i>
            <p>
              <a href="https://github.com/aitorbuleapp">Perfil de GitHub</a>
            </p>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>

</html>