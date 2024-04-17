<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon, icono de la página -->
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/img/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url() ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Iconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/css/estilos.css" />
  <!-- Estilos de OpenLayers, mapa para la geolocalización-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v9.1.0/ol.css">
  <title>Colección biológica del LCB UMAR campus Puerto Escondido</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <!-- Header -->
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
      <!-- Menú de navegación, opciones -->
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
  <!-- Contenido dinamico -->
  <div class="">
    <?php echo $this->renderSection('contenido'); ?>
  </div>
  <!-- Footer -->
  <footer class="footer mt-auto py-3" style="background-color: rgb(0 69 118);">
    <div class="container text-center">
      <span class="text-white">Derechos reservados <a class="links" href="https://www.umar.mx/web/" target="_blank">UMAR</a> © 2024</span>
    </div>
  </footer>
  <!-- Bootstrap JS -->
  <script src="<?php echo base_url() ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- OpenLayers JS -->
  <script src="https://cdn.jsdelivr.net/npm/ol@v9.1.0/dist/ol.js"></script>
  <!-- JavaScript personalizado -->
  <script>
    // Inicializa los tooltips de Bootstrap
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    /**
     * Crea una nueva instancia de mapa OpenLayers.
     *
     * @param {string} target - El ID del elemento HTML donde se renderizará el mapa.
     * @param {number[]} center - Las coordenadas del centro del mapa en el formato [longitud, latitud].
     * @param {number} zoom - El nivel de zoom inicial del mapa.
     * @returns {ol.Map} La nueva instancia de mapa OpenLayers creada.
     */
    var map = new ol.Map({
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM()
        })
      ],
      target: 'map',
      view: new ol.View({
        center: ol.proj.fromLonLat([0, 0]),
        zoom: 1
      })
    });

    /**
     * Obtiene las coordenadas geográficas de una localidad utilizando el servicio de geocodificación de OpenStreetMap.
     *
     * @param string $localidad La localidad de la cual se desean obtener las coordenadas.
     * @param callable $callback La función de devolución de llamada que se ejecutará una vez que se obtengan las coordenadas.
     *                           Recibe un arreglo con las coordenadas en el siguiente formato: [longitud, latitud].
     * @return void
     */
    function getCoordinates(localidad, callback) {
      fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + localidad)
        .then(function(response) {
          return response.json();
        })
        .then(function(json) {
          var lat = json[0].lat;
          var lon = json[0].lon;
          callback([parseFloat(lon), parseFloat(lat)]);
        });
    }
  </script>
  <!-- JavaScript dinamico de cada pagina a renderizar -->
  <?php echo $this->renderSection('javascript'); ?>
</body>

</html>