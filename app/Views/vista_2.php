<?php $this->extend('layouts/layout'); ?>

<?php $this->section('contenido'); ?>

<div class="container-fluid " style="background-color: rgb(0 69 118); color:white;">
  <div class="container">
    <p class="">
      <a href="<?php echo base_url(); ?>" class="text-decoration-none link-light">Inicio</a>&emsp;>
      <a href="<?php echo base_url(); ?>cb" class="text-decoration-none link-light">&emsp;Colección biológica</a>&emsp;>
      <a href="<?php echo base_url(); ?>cb/especies" class="text-decoration-none link-light">&emsp;Consultar colección</a>&emsp;>
      <a class="text-decoration-none link-light">&emsp;Vista 2&emsp;<?= $especie->dtaxonomicos_nombre_comun ?></a>
    </p>
  </div>
</div>

<div class="container mt-5 mb-5">
  <div class="row mb-3">
    <div class="col-12 col-sm-6 text-center">
      <h5 class="fw-bolder"><?= $especie->dtaxonomicos_nombre_comun ?></h5>
    </div>
    <div class="col-12 col-sm-6 text-center">
      <div class="row d-flex justify-content-evenly mb-2 align-items-center ">
        <div class="col-2">
          <audio id="audio_ardillagris" src="<?= base_url() ?>public/audios/1.mp3"></audio>
          <button id="reproductorAudioArdilla" class="btn btn-primary" type="button"><i class="bi bi-volume-up"></i></button>
        </div>
        <div class="col-2">
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-play-circle"></i></button>
        </div>
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
              <img src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
              <img src="<?= base_url() ?>public/img/IMG_20230412_164600.jpg" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
              <img src="<?= base_url() ?>public/img/IMG_20230412_165008.jpg" class="d-block w-100" alt="...">
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
    </div>
    <div class="col-12 col-sm-6 order-1 order-sm-2">
      <div class="row text-center">
        <h5>Datos taxonómicos</h5>
      </div>
      <div class="row">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><b>Género:</b> <i class="fst-italic"><?= $especie->dtaxonomicos_genero ?></i></li>
          <li class="list-group-item"><b>Especie:</b> <i class="fst-italic"><?= $especie->dtaxonomicos_especie ?></i></li>
          <li class="list-group-item"><b>Nombre común:</b> <?= $especie->dtaxonomicos_nombre_comun ?></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
      <?php //if ($especie->img_estado_conservacion_v1_v2 || $especie->img_amenazas_v1_v2) { 
      ?>
      <li class="nav-item" role="estatus">
        <button class="nav-link active" id="estatus-tab" data-bs-toggle="tab" data-bs-target="#estatus-tab-pane" type="button" role="tab" aria-controls="estatus-tab-pane" aria-selected="true">Estatus</button>
      </li>
      <?php //} 
      ?>
      <li class="nav-item" role="descripcion">
        <button class="nav-link" id="descripcion-tab" data-bs-toggle="tab" data-bs-target="#descripcion-tab-pane" type="button" role="tab" aria-controls="descripcion-tab-pane" aria-selected="false">Descripción</button>
      </li>
      <?php if ($especie->img_distribucion_v2) { ?>
        <li class="nav-item" role="mapa">
          <button class="nav-link" id="mapa-tab" data-bs-toggle="tab" data-bs-target="#mapa-tab-pane" type="button" role="tab" aria-controls="mapa-tab-pane" aria-selected="false">Mapa</button>
        </li>
      <?php } ?>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="estatus-tab-pane" role="tabpanel" aria-labelledby="estatus-tab" tabindex="0">
        <div class="accordion mt-2" id="accordionExample1">
          <?php if ($especie->img_estado_conservacion_v1_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEstoyEnPeligro" aria-expanded="false" aria-controls="collapseEstoyEnPeligro">
                  Estoy en peligro
                </button>
              </h2>
              <div id="collapseEstoyEnPeligro" class="accordion-collapse collapse show" data-bs-parent="#accordionExample1">
                <div class="accordion-body text-center">
                  <figure class="figure">
                    <img class="w-75" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                    <figcaption class="figure-caption">Fuente: <?= $especie->fuente_img_estado_conservacion_v1_v2 ?>.</figcaption>
                  </figure>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->img_amenazas_v1_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMisEnemigos" aria-expanded="false" aria-controls="collapseMisEnemigos">
                  Mis enemigos
                </button>
              </h2>
              <div id="collapseMisEnemigos" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                <div class="accordion-body text-center">
                  <figure class="figure">
                    <img class="w-75" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                    <figcaption class="figure-caption">Fuente: <?= $especie->fuente_img_amenazas_v1_v2 ?>.</figcaption>
                  </figure>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <!-- Sección para la distribución -->
      <?php if ($especie->img_distribucion_v2 || $especie->info_distribucion_v2) { ?>
        <div class="tab-pane fade text-center" id="mapa-tab-pane" role="tabpanel" aria-labelledby="mapa-tab" tabindex="0">
          <p><?= $especie->info_distribucion_v2 ?></p>
          <figure class="figure mt-2">
            <img class="w-75" src="<?= base_url() ?>public/img/distribucion/vista2/<?= $especie->id ?>.png" alt="" srcset="">
            <figcaption class="figure-caption"><?= $especie->fuente_img_distribucion_v2 ?></figcaption>
          </figure>
        </div>
      <?php } ?>
      <div class="tab-pane fade " id="descripcion-tab-pane" role="tabpanel" aria-labelledby="descripcion-tab" tabindex="0">
        <div class="accordion mt-2" id="accordionExample">
          <?php
          //tratar de buscar funcionalidad para poder hacer los accordions-items de forma dinamica con la base de datos

          /*foreach ($especie as $e) {
          echo "<script>console.log('".$e."');</script>";
        }*/
          if ($especie->img_habitos_v2 || $especie->info_habitos_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Mis hábitos
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                  <p><?= $especie->info_habitos_v2 ?></p>
                  <figure class="figure">
                    <img class="w-75" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                    <figcaption class="figure-caption"><?= $especie->fuente_img_habitos_v1_v2 ?></figcaption>
                  </figure>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->img_coloracion_v2 || $especie->info_coloracion_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Cómo soy
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                  <p><?= $especie->info_coloracion_v2 ?></p>
                  <figure class="figure">
                    <img class="w-75" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                    <figcaption class="figure-caption">Fuente: <?= $especie->fuente_img_coloracion_v1_v2 ?>.</figcaption>
                  </figure>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->img_medidas_v1_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Cúanto mido
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                  <figure class="figure">
                    <img class="w-75" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                    <figcaption class="figure-caption">Fuente: <?= $especie->fuente_img_medidas_v1_v2 ?>.</figcaption>
                  </figure>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->img_formula_dentaria_v1_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                  Mis dientes
                </button>
              </h2>
              <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                  <figure class="figure">
                    <img class="w-75" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                    <figcaption class="figure-caption">Fuente: <?= $especie->fuente_img_formula_dentaria_v1_v2 ?>.</figcaption>
                  </figure>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->img_historia_natural_v2 || $especie->info_historia_natural_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                  Mi casa
                </button>
              </h2>
              <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                  <p><?= $especie->info_historia_natural_v2 ?></p>
                  <figure class="figure">
                    <img class="w-75" src="<?= base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                    <figcaption class="figure-caption">Fuente: <?= $especie->fuente_img_historia_natural_v1_v2 ?>.</figcaption>
                  </figure>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->carrusel_tipo_vegetacion_v2_v3_v4 || $especie->info_tipo_vegetacion_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                  Donde vivo
                </button>
              </h2>
              <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body d-flex justify-content-center">
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
          <?php } ?>
          <?php if ($especie->carrusel_alimentacion_v2_v3_v4 || $especie->info_alimentacion_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                  Qué como
                </button>
              </h2>
              <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body d-flex justify-content-center">
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
                <div>
                  <figcaption class="figure-caption text-center">Fuente: <?= $especie->fuentes_carrusel_alimentacion ?>.</figcaption>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_reproduccion_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReproduccion" aria-expanded="false" aria-controls="collapseReproduccion">
                  Reproduccion
                </button>
              </h2>
              <div id="collapseReproduccion" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                  <p><?= $especie->info_reproduccion_v2 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_periodo_gestacion_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGestacion" aria-expanded="false" aria-controls="collapseGestacion">
                  Gestación
                </button>
              </h2>
              <div id="collapseGestacion" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                  <p><?= $especie->info_periodo_gestacion_v2 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->info_numero_crias_huevos_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNumCrias" aria-expanded="false" aria-controls="collapseNumCrias">
                  Números de crias
                </button>
              </h2>
              <div id="collapseNumCrias" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body text-center">
                  <p><?= $especie->info_numero_crias_huevos_v2 ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($especie->carrusel_rastros_v1_v2) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                  Huellas
                </button>
              </h2>
              <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body d-flex justify-content-center">
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
                  <figcaption class="figure-caption text-center">Fuente: <?= $especie->fuentes_carrusel_rastros_v1_v2 ?>.</figcaption>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Video</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <video class="object-fit-scale" width="100%" controls src="<?php echo base_url() ?>public/videos/prueba_cbUmar.mp4"></video>
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