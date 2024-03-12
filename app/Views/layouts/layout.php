<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/img/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>public/css/estilos.css" />
  <title>Colección biológica del LCB UMAR campus Puerto Escondido</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="d-none d-lg-block">
    <div class="container">
      <div class="row mt-5 mb-5 justify-content-center">
        <img src="<?php echo base_url() ?>public/img/Header-01_0_0.png" class="mt-3 mb-3 " style="width: 88%;">
      </div>
    </div>
  </header>
  <!-- style="background-color: #eef4f8;" de nav -->
  <nav class="navbar sticky-top navbar-expand-lg border-top border-secondary-subtle bg-white text-dark">
    <div class="container-fluid">
      <!-- Botón hamburguesa -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Logo de la UMAR -->
      <a class="navbar-brand d-lg-none" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url() ?>public/img/UMAR.png" alt="Logo" width="50" class="">
      </a>

      <!-- Botón de hamburguesa para mostrar el menu en dispositivos moviles -->

      <div class="collapse navbar-collapse justify-content-center" id="navbarScroll">
        <div>
          <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll " style="--bs-scroll-height: 200px">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>">INICIO</a>
            </li>
            <li class="nav-item dropdown ms-lg-3">
              <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">COLECCIÓN BIOLÓGICA</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>cb">Información</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>cb/especies">Consultar colección</a></li>
              </ul>
            </li>
            <li class="nav-item ms-lg-3">
              <a class="nav-link" href="<?php echo base_url(); ?>acerca_de">ACERCA DE</a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </nav>

  <?php $breadcrumb = explode("/", current_url()); ?>

  <div class="container-fluid " style="background-color: rgb(0 69 118); color:white;">
    <div class="container">
      <?php
      if (count($breadcrumb) == 6) {
        echo "inicio";
      } else {
        for ($i = 6; $i < count($breadcrumb) - 1; $i++) {
          echo '<a href="#" class="text-decoration-none link-light">' . $breadcrumb[$i] . '</a>';
          echo "\t\t>\t\t";
        }
        echo  $breadcrumb[count($breadcrumb) - 1];
      }
     
      
      ?>
    </div>

  </div>

  <div class="container mt-5 mb-5">
    <?php echo $this->renderSection('contenido'); ?>
  </div>

  <footer class="footer mt-auto py-3" style="background-color: rgb(0 69 118);">
    <div class="container text-center">
      <span class="text-white">Derechos reservados <a class="links" href="https://www.umar.mx/web/" target="_blank">UMAR</a> © 2024</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>