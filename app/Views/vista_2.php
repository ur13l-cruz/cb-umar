<?php $this->extend('layouts/layout'); ?>

<?php $this->section('contenido'); ?>

<div class="row mb-3">
  <div class="col-6 text-center">
    <h5 class="text-uppercase"><?php echo $especie->dtaxonomicos_nombre_comun . PHP_EOL . $especie->dtaxonomicos_especie ?></h5>
    <?php //echo "<script>console.log('". var_dump($especie)."');</script>"; ?>
  </div>
  <div class="col-6 text-center">
    <div class="row d-flex justify-content-evenly mb-2 align-items-center ">
      <div class="col-2">
        <audio id="audio_ardillagris" src="<?php echo base_url() ?>public/audios/audio_ardillagris.mp3"></audio>
        <button id="reproductorAudioArdilla" class="btn btn-primary" type="button"><i class="bi bi-volume-up"></i></button>
      </div>
      <div class="col-2">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-play-circle"></i></button>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-6">
    <div class="row">
      <!-- Carousel imagenes especie viva -->
      <div id="carouselExample2" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <figure class="figure">
              <img src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" class="d-block w-100" alt="...">
              <figcaption class="figure-caption">Fuente imagen.</figcaption>
            </figure>
          </div>
          <div class="carousel-item">
            <figure class="figure">
              <img src="<?php echo base_url() ?>public/img/IMG_20230412_164600.jpg" class="d-block w-100" alt="...">
              <figcaption class="figure-caption">Fuente imagen.</figcaption>
            </figure>
          </div>
          <div class="carousel-item">
            <figure class="figure">
              <img src="<?php echo base_url() ?>public/img/IMG_20230412_165008.jpg" class="d-block w-100" alt="...">
              <figcaption class="figure-caption">Fuente imagen.</figcaption>
            </figure>
          </div>
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
    </div>
    <div class="row mt-3">
      <!-- Carousel imagenes especie en colección -->
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <figure class="figure">
              <img src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" class="d-block w-100" alt="...">
              <figcaption class="figure-caption">Fuente imagen.</figcaption>
            </figure>
          </div>
          <div class="carousel-item">
            <figure class="figure">
              <img src="<?php echo base_url() ?>public/img/IMG_20230412_164600.jpg" class="d-block w-100" alt="...">
              <figcaption class="figure-caption">Fuente imagen.</figcaption>
            </figure>
          </div>
          <div class="carousel-item">
            <figure class="figure">
              <img src="<?php echo base_url() ?>public/img/IMG_20230412_165008.jpg" class="d-block w-100" alt="...">
              <figcaption class="figure-caption">Fuente imagen.</figcaption>
            </figure>
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
    </div>
    <!-- 
    <div class="row mt-3 border border-black">
      video
      <video src="" class="object-fit-contain" autoplay></video>
    </div>
    -->
  </div>
  <div class="col-6">
    <div class="row text-center">
      <h5>Datos taxonómicos</h5>
    </div>
    <div class="row">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Nombre común: <?php echo $especie->dtaxonomicos_nombre_comun ?></li>
      </ul>
    </div>
  </div>
</div>
<div class="row mt-5">
  <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="estatus">
      <button class="nav-link active" id="estatus-tab" data-bs-toggle="tab" data-bs-target="#estatus-tab-pane" type="button" role="tab" aria-controls="estatus-tab-pane" aria-selected="true">Estatus</button>
    </li>
    <li class="nav-item" role="descripcion">
      <button class="nav-link" id="descripcion-tab" data-bs-toggle="tab" data-bs-target="#descripcion-tab-pane" type="button" role="tab" aria-controls="descripcion-tab-pane" aria-selected="false">Descripción</button>
    </li>
    <li class="nav-item" role="mapa">
      <button class="nav-link" id="mapa-tab" data-bs-toggle="tab" data-bs-target="#mapa-tab-pane" type="button" role="tab" aria-controls="mapa-tab-pane" aria-selected="false">Mapa</button>
    </li>

  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="estatus-tab-pane" role="tabpanel" aria-labelledby="estatus-tab" tabindex="0">
      <div class="accordion mt-2" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEstoyEnPeligro" aria-expanded="false" aria-controls="collapseEstoyEnPeligro">
              Estoy en peligro
            </button>
          </h2>
          <div id="collapseEstoyEnPeligro" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMisEnemigos" aria-expanded="false" aria-controls="collapseMisEnemigos">
              Mis enemigos
            </button>
          </h2>
          <div id="collapseMisEnemigos" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="mapa-tab-pane" role="tabpanel" aria-labelledby="mapa-tab" tabindex="0">
      <figure class="figure">
        <img class="w-50" src="<?php echo base_url() ?>public/img/img_distribucion_ardilla-vientre-rojo.png" alt="" srcset="">
        <figcaption class="figure-caption">Fuente imagen.</figcaption>
      </figure>
    </div>
    <div class="tab-pane fade" id="descripcion-tab-pane" role="tabpanel" aria-labelledby="descripcion-tab" tabindex="0">
      <div class="accordion mt-2" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Mis hábitos
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Cómo soy
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Cúanto mido
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
              Mis dientes
            </button>
          </h2>
          <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
              Mi casa
            </button>
          </h2>
          <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
              Donde vivo
            </button>
          </h2>
          <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
              Qué como
            </button>
          </h2>
          <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
              Huellas
            </button>
          </h2>
          <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <figure class="figure">
                <img class="w-50" src="<?php echo base_url() ?>public/img/IMG_20230412_164226.jpg" alt="" srcset="">
                <figcaption class="figure-caption">Fuente imagen.</figcaption>
              </figure>
            </div>
          </div>
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
        <video class="object-fit-scale" width="100%" controls autoplay src="<?php echo base_url() ?>public/videos/prueba_cbUmar.mp4"></video>
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