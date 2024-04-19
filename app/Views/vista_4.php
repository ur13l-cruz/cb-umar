<?php $this->extend('layouts/layout'); ?>

<?php $this->section('contenido'); ?>
<?php
foreach ($especie as $key => $value) {
  echo "<script>console.log('".$value."')</script>";
}
$contadorTabDescripcion = 0;

$isDatosTaxonomicos = false;
$isDatosCuratoriales = false;
$isDatosColecta = false;

?>
<!-- Sección de navegación, Breadcrumb -->
<div class="container-fluid " style="background-color: rgb(0 69 118); color:white;">
  <div class="container">
    <p class="">
      <a href="<?php echo base_url(); ?>" class="text-decoration-none link-light">Inicio</a>&emsp;>
      <a href="<?php echo base_url(); ?>cb" class="text-decoration-none link-light">&emsp;Colección biológica</a>&emsp;>
      <a href="<?php echo base_url(); ?>cb/especies" class="text-decoration-none link-light">&emsp;Consultar colección</a>&emsp;>
      <a class="text-decoration-none link-light">&emsp;Vista 4&emsp;<?= $especie->dtaxonomicos_nombre_comun ?></a>
    </p>
  </div>
</div>

<div class="container mt-5 mb-5">
  <!-- Sección de título, botón para reproducción de audio y para abrir el modal del video -->
  <div class="row mb-3">
    <!-- Título -->
    <div class="col-12 col-sm-6 text-center">
      <h5 class="fst-italic fw-bolder"><?= $especie->dtaxonomicos_genero ?> <?= $especie->dtaxonomicos_especie ?></h5>
    </div>
    <!-- Botones de reproducción de audio y video -->
    <div class="col-12 col-sm-6 text-center">
      <div class="row d-flex justify-content-evenly mb-2 align-items-center ">
        <?php if ($especie->audio_especie) { ?>
          <div class="col-2">
            <audio id="audio_ardillagris" src="<?= base_url() ?>public/<?= $especie->audio_especie ?>.mp3"></audio>
            <button id="reproductorAudioArdilla" class="btn btn-primary" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Fuente: "><i class="bi bi-volume-up" id="iconAudio"></i></button>
          </div>
        <?php } ?>
        <?php if ($especie->video_especie) { ?>
          <div class="col-2">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalVideoEspecieV4"><i class="bi bi-play-circle"></i></button>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-6 order-2 order-sm-1">
      <?php if ($especie->carrusel_especie_viva) { ?>
        <div class="row">
          <!-- Carousel imagenes especie viva -->
          <?php
          $ruta = "public/" . $especie->carrusel_especie_viva . "/";
          $existeRuta = is_dir($ruta);
          ?>
          <div id="carouselExample2" class="carousel slide">
            <div class="carousel-inner">
              <?php
              //saber cuantos archivos tiene mi ruta
              if ($existeRuta) {
                $archivos = scandir($ruta);
                $cantidad = count($archivos) - 2;
                $active = "active";
                for ($i = 0; $i < $cantidad; $i++) {
                  echo '
                  <div class="carousel-item ' . $active . '">
                    <img src="' . base_url() . 'public/' . $especie->carrusel_especie_viva . '/' . $archivos[$i + 2] . '" class="d-block w-100" alt="...">
                  </div>';
                  $active = "";
                }
              }
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <?php if ($existeRuta) { ?>
            <figcaption class="figure-caption text-center">Fuente: <?= $especie->fuentes_carrusel_especie_viva ?></figcaption>
          <?php } ?>

        </div>
      <?php } ?>
      <?php if ($especie->carrusel_especie_coleccion) { ?>
        <div class="row mt-3">
          <!-- Carousel imagenes especie en colección -->
          <?php
          $ruta = "public/" . $especie->carrusel_especie_coleccion . "/";
          $existeRuta = is_dir($ruta);
          ?>
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <?php
              //saber cuantos archivos tiene mi ruta
              if ($existeRuta) {
                $archivos = scandir($ruta);
                $cantidad = count($archivos) - 2;
                $active = "active";
                for ($i = 0; $i < $cantidad; $i++) {
                  echo '
                  <div class="carousel-item ' . $active . '">
                    <img src="' . base_url() . 'public/' . $especie->carrusel_especie_coleccion . '/' . $archivos[$i + 2] . '" class="d-block w-100" alt="...">
                  </div>';
                  $active = "";
                }
              }
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <figcaption class="figure-caption text-center">Fuente: <?= $especie->fuentes_carrusel_especie_coleccion ?></figcaption>
        </div>
      <?php } ?>
    </div>
    <div class="col-12 col-sm-6 order-1 order-sm-2">
      <div class="row text-center">
        <h5 class="">Datos taxonómicos</h5>
      </div>
      <div class="row">
        <ul class="list-group list-group-flush">
          <?php if ($especie->dtaxonomicos_phyllum) { ?>
            <li class="list-group-item"><b>Phyllum:</b> <?= $especie->dtaxonomicos_phyllum ?></li>
          <?php } ?>
          <?php if ($especie->dtaxonomicos_clase) { ?>
            <li class="list-group-item"><b>Clase o taxa:</b> <?= $especie->dtaxonomicos_clase ?></li>
          <?php } ?>
          <?php if ($especie->dtaxonomicos_orden  && $especie->dtaxonomicos_orden != "") { ?>
            <li class="list-group-item"><b>Orden:</b> <?= $especie->dtaxonomicos_orden ?></li>
          <?php } ?>
          <?php if ($especie->dtaxonomicos_familia && $especie->dtaxonomicos_familia != "") { ?>
            <li class="list-group-item"><b>Familia:</b> <?= $especie->dtaxonomicos_familia ?></li>
          <?php } ?>
          <?php if ($especie->dtaxonomicos_genero && $especie->dtaxonomicos_genero != "") { ?>
            <li class="list-group-item"><b>Género:</b> <i><?= $especie->dtaxonomicos_genero ?></i></li>
          <?php } ?>
          <?php if ($especie->dtaxonomicos_especie && $especie->dtaxonomicos_especie != "") { ?>
            <li class="list-group-item"><b>Especie:</b> <i><?= $especie->dtaxonomicos_especie ?></i></li>
          <?php } ?>
          <?php if ($especie->dtaxonomicos_subespecie && $especie->dtaxonomicos_subespecie != "") { ?>
            <li class="list-group-item"><b>Subespecie:</b> <i><?= $especie->dtaxonomicos_subespecie ?></i></li>
          <?php } ?>
          <?php if ($especie->dtaxonomicos_nombre_comun && $especie->dtaxonomicos_nombre_comun != "") { ?>
            <li class="list-group-item"><b>Nombre común:</b> <?= $especie->dtaxonomicos_nombre_comun ?></li>
          <?php } ?>
          <?php if ($especie->dtaxonomicos_autoridad_taxnomica && $especie->dtaxonomicos_determinador != "") { ?>
            <li class="list-group-item"><b>Autoridad taxonómica:</b> <?= $especie->dtaxonomicos_autoridad_taxnomica ?></li>
          <?php } ?>
          <?php if ($especie->dtaxonomicos_determinador && $especie->dtaxonomicos_determinador != "") { ?>
            <li class="list-group-item"><b>Determinador:</b> <?= $especie->dtaxonomicos_determinador ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
      <li class="nav-item" role="coleccion">
        <button class="nav-link active" id="coleccion-tab" data-bs-toggle="tab" data-bs-target="#coleccion-tab-pane" type="button" role="tab" aria-controls="coleccion-tab-pane" aria-selected="true">Colección</button>
      </li>
      <?php if ($especie->info_estado_conservacion_v3_v4 || $especie->info_amenazas_v3_v4) { ?>
        <li class="nav-item" role="estatus">
          <button class="nav-link" id="estatus-tab" data-bs-toggle="tab" data-bs-target="#estatus-tab-pane" type="button" role="tab" aria-controls="estatus-tab-pane" aria-selected="true">Estatus</button>
        </li>
      <?php } ?>
      <li class="nav-item" role="descripcion">
        <button class="nav-link" id="descripcion-tab" data-bs-toggle="tab" data-bs-target="#descripcion-tab-pane" type="button" role="tab" aria-controls="descripcion-tab-pane" aria-selected="false">Descripción</button>
      </li>
      <?php if ($especie->img_distribucion_v3_v4) { ?>
        <li class="nav-item" role="mapa">
          <button class="nav-link" id="mapa-tab" data-bs-toggle="tab" data-bs-target="#mapa-tab-pane" type="button" role="tab" aria-controls="mapa-tab-pane" aria-selected="false">Mapa</button>
        </li>
      <?php } ?>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="coleccion-tab-pane" role="tabpanel" aria-labelledby="coleccion-tab" tabindex="0">
        <div class="accordion mt-2" id="accordionColeccion">
          <?php /* $especie->info_estado_conservacion_v3_v4 */ if (true) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosCuratoriales" aria-expanded="true" aria-controls="collapseDatosCuratoriales">
                  Datos curatoriales
                </button>
              </h2>
              <div id="collapseDatosCuratoriales" class="accordion-collapse collapse show" data-bs-parent="#accordionColeccion">
                <div class="accordion-body text-justify">
                  <?php if ($especie->dcuratoriales_clave) { ?>
                    <p><b>Clave:</b> <?= $especie->dcuratoriales_clave ?></p>
                  <?php } ?>
                  <p><b>Colección:</b> <?= $especie->dcuratoriales_coleccion ?></p>
                  <p><b>Código de sección:</b> <?= $especie->dcuratoriales_codigo_seccion ?></p>
                  <p><b>Métodos de preservación:</b>
                    <?php if ($especie->dcuratoriales_mdp == "Os") { ?>
                      Osteotecnia
                      <img width="50" src="<?= base_url() ?>/public/img/Os.png" alt="" srcset="">
                    <?php } ?>
                    <?php if ($especie->dcuratoriales_mdp == "Pi") { ?>
                      Piel
                      <img width="50" src="<?= base_url() ?>/public/img/Pi.png" alt="" srcset="">
                    <?php } ?>
                    <?php if ($especie->dcuratoriales_mdp == "Li") { ?>
                      Líquido
                      <img width="50" src="<?= base_url() ?>/public/img/Li.png" alt="" srcset="">
                    <?php } ?>
                    <?php if ($especie->dcuratoriales_mdp == "Di") { ?>
                      Diafanizado
                      <img width="50" src="<?= base_url() ?>/public/img/Di.png" alt="" srcset="">
                    <?php } ?>
                    <?php if ($especie->dcuratoriales_mdp == "Fct") { ?>
                      Fototrampeo
                      <img width="50" src="<?= base_url() ?>/public/img/Fct.png" alt="" srcset="">
                    <?php } ?>
                    <?php if ($especie->dcuratoriales_mdp == "Hu") { ?>
                      Huellas en yeso
                      <img width="50" src="<?= base_url() ?>/public/img/Hu.png" alt="" srcset="">
                    <?php } ?>
                    <?php if ($especie->dcuratoriales_mdp == "Lam") { ?>
                      Montaje en laminilla (parásitos)
                      <img width="50" src="<?= base_url() ?>/public/img/Lam.png" alt="" srcset="">
                    <?php } ?>
                  </p>
                  <?php if ($especie->dcuratoriales_codigo_numerico) { ?>
                    <p><b>Código numérico:</b> <?= $especie->dcuratoriales_codigo_numerico ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if (true) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosColecta" aria-expanded="false" aria-controls="collapseDatosColecta">
                  Datos de colecta
                </button>
              </h2>
              <div id="collapseDatosColecta" class="accordion-collapse collapse" data-bs-parent="#accordionColeccion">
                <div class="accordion-body text-justify">
                  <?php if ($especie->dcolecta_fecha_ingreso) { ?>
                    <p><b>Fecha ingreso:</b> <?= $especie->dcolecta_fecha_ingreso ?></p>
                  <?php } ?>
                  <?php if ($especie->dcolecta_numero_ejemplares) { ?>
                    <p><b>Número de ejemplares:</b> <?= $especie->dcolecta_numero_ejemplares ?></p>
                  <?php } ?>
                  <?php if ($especie->dcolecta_sexo) { ?>
                    <p><b>Sexo:</b> <?= $especie->dcolecta_sexo ?></p>
                  <?php } ?>
                  <?php if ($especie->dcolecta_edad) { ?>
                    <p><b>Edad:</b> <?= $especie->dcolecta_edad ?></p>
                  <?php } ?>
                  <?php if ($especie->dcolecta_proposito) { ?>
                    <p><b>Propósito primario:</b> <?= $especie->dcolecta_proposito ?></p>
                  <?php } ?>
                  <?php if ($especie->dcolecta_colector) { ?>
                    <p><b>Colector o donante:</b> <?= $especie->dcolecta_colector ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- Modificar if para poder eliminar el item cuando no tenga ningun valor para datos geograficos -->
          <?php if (true) { ?>
            <!-- Sección para el elemento desplegable datos geográficos -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosGeograficos" aria-expanded="false" aria-controls="collapseDatosGeograficos">
                  Datos geográficos
                </button>
              </h2>
              <div id="collapseDatosGeograficos" class="accordion-collapse collapse" data-bs-parent="#accordionColeccion">
                <div class="accordion-body text-justify">
                  <?php if ($especie->dgeograficos_pais) { ?>
                    <p><b>País:</b> <?= $especie->dgeograficos_pais ?></p>
                  <?php } ?>
                  <?php if ($especie->dgeograficos_estado) { ?>
                    <p><b>Estado:</b> <?= $especie->dgeograficos_estado ?></p>
                  <?php } ?>
                  <?php if ($especie->datos_restringidos == 0) { ?>
                    <?php if ($especie->dgeograficos_municipio) { ?>
                      <p><b>Municipio:</b> <?= $especie->dgeograficos_municipio ?></p>
                    <?php } ?>
                    <?php if ($especie->dgeograficos_localidad) { ?>
                      <p><b>Localidad:</b> <?= $especie->dgeograficos_localidad ?></p>
                    <?php } ?>
                    <?php if ($especie->dgeograficos_coordenadas) { ?>
                      <p><b>Coordenadas (UTM):</b> <?= $especie->dgeograficos_coordenadas ?></p>
                    <?php } ?>
                    <?php if ($especie->dgeograficos_altitud) { ?>
                      <p><b>Altitud (msnm):</b> <?= $especie->dgeograficos_altitud ?></p>
                    <?php } ?>
                    <div id="map" style="width: 100%; height: 400px"></div>
                  <?php } else { ?>
                    <p class="text-danger"><b>Datos restringidos: La georreferencia del ejemplar es información sensible, por lo que se ha restringido su publicación. </b></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <?php if ($especie->info_estado_conservacion_v3_v4 || $especie->info_amenazas_v3_v4) { ?>
        <div class="tab-pane fade" id="estatus-tab-pane" role="tabpanel" aria-labelledby="estatus-tab" tabindex="0">
          <div class="accordion mt-2" id="accordionEstatus">
            <?php if ($especie->info_estado_conservacion_v3_v4) { ?>
              <!-- Sección para el elemento desplegable estado de conservación -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseEstadoConservacion" aria-expanded="true" aria-controls="collapseEstadoConservacion">
                    Estado de conservación
                  </button>
                </h2>
                <div id="collapseEstadoConservacion" class="accordion-collapse collapse show" data-bs-parent="#accordionEstatus">
                  <div class="accordion-body text-justify">
                    <p class=""></p>
                    <?= $especie->info_estado_conservacion_v3_v4 ?>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php if ($especie->info_amenazas_v3_v4) { ?>
              <!-- Sección para el elemento desplegable amenazas -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAmenazas" aria-expanded="false" aria-controls="collapseAmenazas">
                    Amenazas
                  </button>
                </h2>
                <div id="collapseAmenazas" class="accordion-collapse collapse" data-bs-parent="#accordionEstatus">
                  <div class="accordion-body text-justify">
                    <p><?= $especie->info_amenazas_v3_v4 ?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
      <!-- Sección para la distribución -->
      <?php if ($especie->img_distribucion_v3_v4 || $especie->info_distribucion_v4) { ?>
        <div class="tab-pane fade" id="mapa-tab-pane" role="tabpanel" aria-labelledby="mapa-tab" tabindex="0">
          <p class="text-justify"><?= $especie->info_distribucion_v4 ?></p>
          <div class="d-flex justify-content-center">
            <figure class="figure col-sm-8">
              <img class="w-100" src="<?= base_url() ?>public/img/distribucion/vista34/<?= $especie->id ?>.png" alt="" srcset="">
              <figcaption class="figure-caption text-center"><?= $especie->fuente_img_distribucion_v3_v4 ?></figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      <!-- Sección para el elemento tab descripción -->
      <div class="tab-pane fade " id="descripcion-tab-pane" role="tabpanel" aria-labelledby="descripcion-tab" tabindex="0">
        <!-- Sección para los desplegables descripción -->
        <div class="accordion mt-2 " id="accordionDescripcion">
          <?php if ($especie->carrusel_habitos_v3_v4 || $especie->info_habitos_v3_v4) { ?>
            <!-- Sección para el elemento desplegable hábitos -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHabitos" aria-expanded="true" aria-controls="collapseHabitos">
                  Hábitos
                </button>
              </h2>
              <!-- Modal hábitos -->
              <div id="collapseHabitos" class="accordion-collapse collapse show" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body">
                  <div class="text-justify">
                    <?= $especie->info_habitos_v3_v4 ?>
                  </div>
                  <!-- carrusel habitos -->
                  <div class="d-flex justify-content-center">
                    <div id="carouselHabitos" class="carousel slide col-12 col-sm-6">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_164600.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_165008.jpg" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselHabitos" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselHabitos" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                  <div class="text-center">
                    <figcaption class="figure-caption">Fuente: <?= $especie->fuentes_carrusel_habitos_v3_v4 ?></figcaption>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->img_coloracion_v3_v4 || $especie->info_coloracion_v3_v4) { ?>
            <!-- Sección para el elemento desplegable coloración -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseColoracion" aria-expanded="false" aria-controls="collapseColoracion">
                  Coloración
                </button>
              </h2>
              <div id="collapseColoracion" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body">
                  <div class="text-justify">
                    <p><?= $especie->info_coloracion_v3_v4 ?></p>
                  </div>
                  <div class="d-flex justify-content-center">
                    <figure class="figure col-sm-6">
                      <img class="w-100" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                      <figcaption class="figure-caption text-center">Fuente: <?= $especie->fuente_img_coloracion_v3_v4 ?>.</figcaption>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_medidas_v4) { ?>
            <!-- Sección para el elemento desplegable medidas -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMedidas" aria-expanded="false" aria-controls="collapseMedidas">
                  Medidas
                </button>
              </h2>
              <div id="collapseMedidas" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_medidas_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_formula_dentaria_v4 || $especie->img_formula_dentaria_v3_v4) { ?>
            <!-- Sección para el elemento desplegable fórmula dentaria -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFormulaDentaria" aria-expanded="false" aria-controls="collapseFormulaDentaria">
                  Fórmula dentaria
                </button>
              </h2>
              <div id="collapseFormulaDentaria" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-center">
                  <div class="text-justify">
                    <p><?= $especie->info_formula_dentaria_v4 ?></p>
                  </div>
                  <div class="d-flex justify-content-center">
                    <figure class="figure col-sm-6">
                      <img class="w-100" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                      <figcaption class="figure-caption">Fuente: <?= $especie->fuente_img_formula_dentaria_v3_v4 ?>.</figcaption>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_historia_natural_v4) { ?>
            <!-- Sección para el elemento desplegable historia natural -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHistoriaNatural" aria-expanded="false" aria-controls="collapseHistoriaNatural">
                  Historia natural
                </button>
              </h2>
              <div id="collapseHistoriaNatural" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <?= $especie->info_historia_natural_v4 ?>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->carrusel_tipo_vegetacion_v2_v3_v4 || $especie->info_tipo_vegetacion_v4) { ?>
            <!-- Sección para el elemento desplegable tipo de vegetación -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTipoVegetacion" aria-expanded="false" aria-controls="collapseTipoVegetacion">
                  Tipo de vegetación
                </button>
              </h2>
              <div id="collapseTipoVegetacion" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body ">
                  <div class="text-justify">
                    <?= $especie->info_tipo_vegetacion_v4 ?>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div id="carouselTipoVegetacion" class="carousel slide col-12 col-sm-6">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_164600.jpg" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_165008.jpg" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselTipoVegetacion" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselTipoVegetacion" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                  <div class="text-center">
                    <figcaption class="figure-caption">Fuente: <?= $especie->fuentes_carrusel_tipo_vegetacion ?>.</figcaption>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_intervalo_altitud_v4) { ?>
            <!-- Sección para el elemento desplegable intervalo de altitud -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIntervaloAltitud" aria-expanded="false" aria-controls="collapseIntervaloAltitud">
                  Intervalo de altitud
                </button>
              </h2>
              <div id="collapseIntervaloAltitud" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_intervalo_altitud_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->carrusel_alimentacion_v2_v3_v4 || $especie->info_alimentacion_v4) { ?>
            <!-- Sección para el elemento desplegable alimentación -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAlimentacion" aria-expanded="false" aria-controls="collapseAlimentacion">
                  Alimentación
                </button>
              </h2>
              <div id="collapseAlimentacion" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body">
                  <div class="text-justify">
                    <?= $especie->info_alimentacion_v4 ?>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div id="carouselAlimentacion" class="carousel slide col-12 col-sm-6">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_164600.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_165008.jpg" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselAlimentacion" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselAlimentacion" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                  <div class="text-center">
                    <figcaption class="figure-caption">Fuente: <?= $especie->fuentes_carrusel_alimentacion ?>.</figcaption>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_dimorfismo_sexual) { ?>
            <!-- Sección para el elemento desplegable dimorfismo sexual -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDimorfismoSexual" aria-expanded="false" aria-controls="collapseDimorfismoSexual">
                  Dimorfismo sexual
                </button>
              </h2>
              <div id="collapseDimorfismoSexual" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_dimorfismo_sexual ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_reproduccion_v4) { ?>
            <!-- Sección para el elemento desplegable reproducción -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReproduccion" aria-expanded="false" aria-controls="collapseReproduccion">
                  Reproducción
                </button>
              </h2>
              <div id="collapseReproduccion" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_reproduccion_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_periodo_gestacion_v3_v4) { ?>
            <!-- Sección para el elemento desplegable periodo de gestación -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePeriodoGestacion" aria-expanded="false" aria-controls="collapsePeriodoGestacion">
                  Periodo de gestación
                </button>
              </h2>
              <div id="collapsePeriodoGestacion" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_periodo_gestacion_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_numero_crias_huevos_v3_v4) { ?>
            <!-- Sección para el elemento desplegable número de crías por parto o huevos por nidada -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNumeroCrias" aria-expanded="false" aria-controls="collapseNumeroCrias">
                  Número de crías por parto o huevos por nidada.
                </button>
              </h2>
              <div id="collapseNumeroCrias" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_numero_crias_huevos_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->carrusel_rastros_v3_v4 || $especie->info_rastros_v3_v4) { ?>
            <!-- Sección para el elemento desplegable rastros -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseRastros" aria-expanded="false" aria-controls="callapseRastros">
                  Rastros
                </button>
              </h2>
              <div id="callapseRastros" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body">
                  <div class="text-justify">
                    <?= $especie->info_rastros_v3_v4 ?>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div id="carouselRastros" class="carousel slide col-12 col-sm-6">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_164600.jpg" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                          <img src="<?= base_url() ?>public/img/IMG_20230412_165008.jpg" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselRastros" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselRastros" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                  <div>
                    <figcaption class="figure-caption text-center">Fuente: <?= $especie->fuentes_img_rastros_v3_v4 ?>.</figcaption>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_localizacion_huesped) { ?>
            <!-- Sección para el elemento desplegable localización en el huésped -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseLocalizacionHuesped" aria-expanded="false" aria-controls="callapseLocalizacionHuesped">
                  Localización en el huésped
                </button>
              </h2>
              <div id="callapseLocalizacionHuesped" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_localizacion_huesped ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_huevo_v3_v4) { ?>
            <!-- Sección para el elemento desplegable huevo -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseHuevo" aria-expanded="false" aria-controls="callapseHuevo">
                  Huevo
                </button>
              </h2>
              <div id="callapseHuevo" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_huevo_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_larva_v3_V4) { ?>
            <!-- Sección para el elemento desplegable larva -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseLarva" aria-expanded="false" aria-controls="callapseLarva">
                  Larva
                </button>
              </h2>
              <div id="callapseLarva" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_larva_v3_V4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_adulto_v3_v4) { ?>
            <!-- Sección para el elemento desplegable adulto -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseAdulto" aria-expanded="false" aria-controls="callapseAdulto">
                  Adulto
                </button>
              </h2>
              <div id="callapseAdulto" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_adulto_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_ciclo_biologico_v3_v4 || $especie->img_ciclo_biologico_v3_v4) { ?>
            <!-- Sección para el elemento desplegable ciclo biológico -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseCicloBiologico" aria-expanded="false" aria-controls="callapseCicloBiologico">
                  Ciclo biológico
                </button>
              </h2>
              <div id="callapseCicloBiologico" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body">
                  <p class="text-justify"><?= $especie->info_ciclo_biologico_v3_v4 ?></p>
                  <div class="d-flex justify-content-center">
                    <figure class="figure col-sm-6">
                      <img class="w-100" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                      <figcaption class="figure-caption">Fuente: <?= $especie->fuente_img_ciclo_biologico_v3_v4 ?>.</figcaption>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_hospedero_definitivo_v3_v4) { ?>
            <!-- Sección para el elemento desplegable hospedero definitivo -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseHospederoDefinitivo" aria-expanded="false" aria-controls="callapseHospederoDefinitivo">
                  Hospedero definitivo
                </button>
              </h2>
              <div id="callapseHospederoDefinitivo" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_hospedero_definitivo_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_hospedero_intermediario_v3_v4) { ?>
            <!-- Sección para el elemento desplegable hospedero intermediario -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseHospederoIntermediario" aria-expanded="false" aria-controls="callapseHospederoIntermediario">
                  Hospedero intermediario
                </button>
              </h2>
              <div id="callapseHospederoIntermediario" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_hospedero_intermediario_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_hospedero_accidental_v3_v4) { ?>
            <!-- Sección para el elemento desplegable hospedero accidental -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseHospederoAccidental" aria-expanded="false" aria-controls="callapseHospederoAccidental">
                  Hospedero accidental
                </button>
              </h2>
              <div id="callapseHospederoAccidental" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_hospedero_accidental_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_hospedero_colecta_v3_v4) { ?>
            <!-- Sección para el elemento desplegable hospedero de la colecta -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseHospederoColecta" aria-expanded="false" aria-controls="callapseHospederoColecta">
                  Hospedero de la colecta
                </button>
              </h2>
              <div id="callapseHospederoColecta" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_hospedero_colecta_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->referencias_v4) { ?>
            <!-- Sección para el elemento desplegable referencias -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#callapseReferencias" aria-expanded="false" aria-controls="callapseReferencias">
                  Referencias
                </button>
              </h2>
              <div id="callapseReferencias" class="accordion-collapse collapse" data-bs-parent="#accordionDescripcion">
                <div class="accordion-body text-justify">
                  <p><?= $especie->referencias_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if ($especie->video_especie) { ?>
  <!-- Modal para visualizar el video de la especie -->
  <div class="modal fade" id="modalVideoEspecieV4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <video class="object-fit-scale" width="100%" controls src="<?php echo base_url() ?>public/<?= $especie->video_especie ?>.mp4"></video>
          <figcaption class="figure-caption">Fuente video.</figcaption>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<script>
  <?php if ($especie->audio_especie) { ?>
    /**
     * Este código controla la reproducción de un archivo de audio en la página web.
     */

    // Indica si el audio se está reproduciendo o no. Es un valor booleano.
    var isPlaying = false;
    // El elemento de audio en la página web. Se obtiene mediante el ID 'audio_ardillagris'.
    var audio = document.getElementById('audio_ardillagris');
    // El elemento de icono de audio en la página web. Se obtiene mediante el ID 'iconAudio'.
    let elementoAudio = document.getElementById('iconAudio');
    /*Al hacer clic en el elemento con el ID 'reproductorAudioArdilla', se activa una función que controla la reproducción del audio.
     *   Si el audio se está reproduciendo, se pausa. Si no se está reproduciendo, se reproduce.
     *   Después de cada clic, el valor de isPlaying se invierte para reflejar el estado actual de reproducción.
     */
    document.getElementById('reproductorAudioArdilla').addEventListener('click', function() {
      if (isPlaying) {
        audio.pause();
      } else {
        audio.play();
      }
      isPlaying = !isPlaying;
    });
  <?php } ?>
</script>
<?php $this->endSection('contenido'); ?>

<?php $this->section('javascript'); ?>
<script>
  <?php if ($especie->dgeograficos_estado != '' && $especie->dgeograficos_pais != '') { ?>
    /**
     * Obtiene las coordenadas de una localidad y crea un marcador en el mapa.
     *
     * @param string $localidad El nombre de la localidad.
     * @param callable $callback La función de devolución de llamada que se ejecuta cuando se obtienen las coordenadas.
     *                           Debe aceptar un parámetro que representa las coordenadas.
     * @return void
     */
    getCoordinates('<?= $especie->dgeograficos_localidad ?> <?= $especie->dgeograficos_estado ?> <?= $especie->dgeograficos_pais ?>', function(coords) {
      var localidad = ol.proj.fromLonLat(coords);
      var point = new ol.geom.Point(localidad);
      var feature = new ol.Feature(point);
      var icon = new ol.style.Icon({
        src: 'https://cdn-icons-png.flaticon.com/512/5737/5737612.png',
        scale: 0.05
      });
      // Crea un estilo para el marcador
      var style = new ol.style.Style({
        image: icon
      });
      // Añade el estilo al marcador
      feature.setStyle(style);
      // Crea una capa de vector y añade el marcador
      var vectorLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
          features: [feature]
        })
      });

      // Añade la capa de vector al mapa
      map.addLayer(vectorLayer);
      // Centra el mapa en la localidad
      map.getView().setCenter(localidad);
      // Cambia el zoom a 6
      map.getView().setZoom(6);
    });
  <?php } ?>
</script>
<?php $this->endSection(); ?>