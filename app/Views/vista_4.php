<?php $this->extend('layouts/layout'); ?>

<?php $this->section('contenido'); ?>
<?php

$isDatosTaxonomicos = false;
$isDatosCuratoriales = false;
$isDatosColecta = false;

?>

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
  <div class="row mb-3">
    <div class="col-12 col-sm-6 text-center">
      <h5 class="fst-italic fw-bolder"><?= $especie->dtaxonomicos_genero ?> <?= $especie->dtaxonomicos_especie ?></h5>
    </div>
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
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-play-circle"></i></button>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-6 order-2 order-sm-1">
      <div class="row">
        <!-- Carousel imagenes especie viva -->
        <?php
        $ruta = "public/img/especie_viva/" . $especie->id . "/";
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
                    <img src="' . base_url() . 'public/img/especie_viva/' . $especie->id . '/' . $archivos[$i + 2] . '" class="d-block w-100" alt="...">
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
      <?php if ($especie->carrusel_especie_coleccion) { ?>
        <div class="row mt-3">
          <!-- Carousel imagenes especie en colección -->
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <?php
              //saber cuantos archivos tiene mi ruta
              /*
            $ruta = "public/img/especie_viva/" . $especie->id . "/";
            $existeRuta = is_dir($ruta);
            if ($existeRuta) {
              echo "<script>console.log('Existe');</script>";
              $archivos = scandir($ruta);
              $cantidad = count($archivos) - 2;
              $active = "active";
              for ($i = 0; $i < $cantidad; $i++) {
                echo '
                  <div class="carousel-item ' . $active . '">
                    <img src="' . base_url() . 'public/img/especie_coleccion/' . $especie->id . '/' . $archivos[$i + 2] . '" class="d-block w-100" alt="...">
                  </div>';
                $active = "";
              }
            }*/
              ?>
              <div class="carousel-item active">
                <img src="<?= base_url() ?>public/img/especie_coleccion/1/foto1.jpg" class="d-block w-100" alt="...">

              </div>
              <div class="carousel-item">
                <img src="<?= base_url() ?>public/img/especie_coleccion/1/foto1.jpg" class="d-block w-100" alt="...">

              </div>
              <div class="carousel-item">
                <img src="<?= base_url() ?>public/img/especie_coleccion/1/foto1.jpg" class="d-block w-100" alt="...">
              </div>
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
      <?php //if ($especie->img_estado_conservacion_v1_v2 || $especie->img_amenazas_v1_v2) { 
      ?>
      <li class="nav-item" role="estatus">
        <button class="nav-link" id="estatus-tab" data-bs-toggle="tab" data-bs-target="#estatus-tab-pane" type="button" role="tab" aria-controls="estatus-tab-pane" aria-selected="true">Estatus</button>
      </li>
      <?php //} 
      ?>
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
        <div class="accordion mt-2" id="accordionExample01">
          <?php /* $especie->info_estado_conservacion_v3_v4 */ if (true) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosCuratoriales" aria-expanded="true" aria-controls="collapseDatosCuratoriales">
                  Datos curatoriales
                </button>
              </h2>
              <div id="collapseDatosCuratoriales" class="accordion-collapse collapse show" data-bs-parent="#accordionExample01">
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
          <?php if ($especie->dcolecta_numero_ejemplares) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosColecta" aria-expanded="false" aria-controls="collapseDatosColecta">
                  Datos de colecta
                </button>
              </h2>
              <div id="collapseDatosColecta" class="accordion-collapse collapse" data-bs-parent="#accordionExample01">
                <div class="accordion-body text-justify">
                  <p><b>Fecha ingreso:</b> <?= $especie->dcolecta_fecha_ingreso ?></p>
                  <p><b>Número de ejemplares:</b> <?= $especie->dcolecta_numero_ejemplares ?></p>
                  <p><b>Sexo:</b> <?= $especie->dcolecta_sexo ?></p>
                  <p><b>Edad:</b> <?= $especie->dcolecta_edad ?></p>
                  <p><b>Propósito primario:</b> <?= $especie->dcolecta_proposito ?></p>
                  <p><b>Colector o donante:</b> <?= $especie->dcolecta_colector ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- Modificar if para poder eliminar el item cuando no tenga ningun valor para datos geograficos -->
          <?php if (true) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosGeograficos" aria-expanded="false" aria-controls="collapseDatosGeograficos">
                  Datos geográficos
                </button>
              </h2>
              <div id="collapseDatosGeograficos" class="accordion-collapse collapse" data-bs-parent="#accordionExample01">
                <div class="accordion-body text-justify">
                  <p><b>País:</b> <?= $especie->dgeograficos_pais ?></p>
                  <p><b>Estado:</b> <?= $especie->dgeograficos_estado ?></p>
                  <?php if ($especie->datos_restringidos == 0) { ?>
                    <p><b>Municipio:</b> <?= $especie->dgeograficos_municipio ?></p>
                    <p><b>Localidad:</b> <?= $especie->dgeograficos_localidad ?></p>
                    <p><b>Coordenadas (UTM):</b> <?= $especie->dgeograficos_coordenadas ?></p>
                    <p><b>Altitud (msnm):</b> <?= $especie->dgeograficos_altitud ?></p>
                    <div>mapa</div>
                  <?php } else { ?>
                    <p class="text-danger"><b>Datos restringidos: La georreferencia del ejemplar es información sensible, por lo que se ha restringido su publicación. </b></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="tab-pane fade" id="estatus-tab-pane" role="tabpanel" aria-labelledby="estatus-tab" tabindex="0">
        <div class="accordion mt-2" id="accordionExample1">
          <?php if ($especie->info_estado_conservacion_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseEstoyEnPeligro" aria-expanded="true" aria-controls="collapseEstoyEnPeligro">
                  Estado de conservación
                </button>
              </h2>
              <div id="collapseEstoyEnPeligro" class="accordion-collapse collapse show" data-bs-parent="#accordionExample1">
                <div class="accordion-body text-justify">
                  <p class=""></p>
                  <?= $especie->info_estado_conservacion_v3_v4 ?>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_amenazas_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMisEnemigos" aria-expanded="false" aria-controls="collapseMisEnemigos">
                  Amenazas
                </button>
              </h2>
              <div id="collapseMisEnemigos" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_amenazas_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
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
      <div class="tab-pane fade " id="descripcion-tab-pane" role="tabpanel" aria-labelledby="descripcion-tab" tabindex="0">
        <div class="accordion mt-2 " id="accordionExample">
          <?php
          //tratar de buscar funcionalidad para poder hacer los accordions-items de forma dinamica con la base de datos

          /*foreach ($especie as $e) {
          echo "<script>console.log('".$e."');</script>";
        }*/
          if ($especie->carrusel_habitos_v3_v4 || $especie->info_habitos_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Hábitos
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="text-justify">
                    <?= $especie->info_habitos_v3_v4 ?>
                  </div>
                  <!-- carrusel habitos (mejorar para ocultarlo si no tiene imagenes)-->
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
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Coloración
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Medidas
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_medidas_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_formula_dentaria_v4 || $especie->img_formula_dentaria_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                  Fórmula dentaria
                </button>
              </h2>
              <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                  Historia natural
                </button>
              </h2>
              <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <?= $especie->info_historia_natural_v4 ?>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->carrusel_tipo_vegetacion_v2_v3_v4 || $especie->info_tipo_vegetacion_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                  Tipo de vegetación
                </button>
              </h2>
              <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body ">
                  <div class="text-justify">
                    <?= $especie->info_tipo_vegetacion_v4 ?>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div id="carouselDondeVivo" class="carousel slide col-12 col-sm-6">
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
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselDondeVivo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselDondeVivo" data-bs-slide="next">
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
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse05" aria-expanded="false" aria-controls="collapse05">
                  Intervalo de altitud
                </button>
              </h2>
              <div id="collapse05" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_intervalo_altitud_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->carrusel_alimentacion_v2_v3_v4 || $especie->info_alimentacion_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                  Alimentación
                </button>
              </h2>
              <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="text-justify">
                    <?= $especie->info_alimentacion_v4 ?>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div id="carouselQueComo" class="carousel slide col-12 col-sm-6">
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
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselQueComo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselQueComo" data-bs-slide="next">
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
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDimorfismoSexual" aria-expanded="false" aria-controls="collapseDimorfismoSexual">
                  Dimorfismo sexual
                </button>
              </h2>
              <div id="collapseDimorfismoSexual" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_dimorfismo_sexual ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_reproduccion_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReproduccion" aria-expanded="false" aria-controls="collapseReproduccion">
                  Reproducción
                </button>
              </h2>
              <div id="collapseReproduccion" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_reproduccion_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_periodo_gestacion_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGestacion" aria-expanded="false" aria-controls="collapseGestacion">
                  Periodo de gestación
                </button>
              </h2>
              <div id="collapseGestacion" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_periodo_gestacion_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_numero_crias_huevos_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNumCrias" aria-expanded="false" aria-controls="collapseNumCrias">
                  Número de crías por parto o huevos por nidada.
                </button>
              </h2>
              <div id="collapseNumCrias" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_numero_crias_huevos_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->carrusel_rastros_v3_v4 || $especie->info_rastros_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                  Rastros
                </button>
              </h2>
              <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="text-justify">
                    <?= $especie->info_rastros_v3_v4 ?>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div id="carouselHuellas" class="carousel slide col-12 col-sm-6">
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
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselHuellas" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselHuellas" data-bs-slide="next">
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
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                  Localización en el huésped
                </button>
              </h2>
              <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_localizacion_huesped ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_huevo_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                  Huevo
                </button>
              </h2>
              <div id="collapse10" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_huevo_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_larva_v3_V4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                  Larva
                </button>
              </h2>
              <div id="collapse11" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_larva_v3_V4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_adulto_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                  Adulto
                </button>
              </h2>
              <div id="collapse12" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_adulto_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_ciclo_biologico_v3_v4 || $especie->img_ciclo_biologico_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                  Ciclo biológico
                </button>
              </h2>
              <div id="collapse13" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                  Hospedero definitivo
                </button>
              </h2>
              <div id="collapse14" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_hospedero_definitivo_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_hospedero_intermediario_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                  Hospedero intermediario
                </button>
              </h2>
              <div id="collapse15" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_hospedero_intermediario_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_hospedero_accidental_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                  Hospedero accidental
                </button>
              </h2>
              <div id="collapse16" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_hospedero_accidental_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_hospedero_colecta_v3_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                  Hospedero de la colecta
                </button>
              </h2>
              <div id="collapse17" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-justify">
                  <p><?= $especie->info_hospedero_colecta_v3_v4 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->referencias_v4) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapse18">
                  Referencias
                </button>
              </h2>
              <div id="collapse18" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<script>
  var isPlaying = false;
  var audio = document.getElementById('audio_ardillagris');
  let elementoAudio = document.getElementById('iconAudio');
  //
  document.getElementById('reproductorAudioArdilla').addEventListener('click', function() {
    if (isPlaying) {
      audio.pause();
    } else {
      audio.play();
    }
    isPlaying = !isPlaying;
  });
</script>



<?php $this->endSection('contenido'); ?>