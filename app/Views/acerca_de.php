<!-- Componentes las cuales se mostrarán deacuerdo a lo seleccionado en el nav-bar -->
<?php $this->extend('layouts/layout'); ?>

<?php $this->section('contenido'); ?>
<section class="row text-center">
  <h2>ACERCA DE</h2>
</section>
<section class="row mt-4 justify-content-center">
  <div class="col-7 text-center">
    <p>
      Este sitio web, fue desarrollado como producto del proyecto de investigación "Modernización de
      la exhibición de la colección biológica de la UMAR, utilizando tecnologías de información y comunicación",
      con la clave de unidad programática 2IR2307.
    </p>
  </div>
</section>
<section class="row mt-5 text-center justify-content-center">
  <div class="col-12 col-md-6">
    <div class="row">
      <h6 class="fw-bold">Director del proyecto</h6>
      <p><a class="links" target="_blank" href="https://www.umar.mx/web/directorio/profesores/puerto_escondido/instituto_de_recursos/jesus_garcia">Dr. Jesús Garcia | Biología</a></p>
    </div>
    <div class="row mt-3">
      <h6 class="fw-bold">Desarrollo</h6>
      <p>Uriel Romeo Cruz | Servicio social | Informática</p>
    </div>
  </div>
  <div class="col-12 col-md-6 mt-3 mt-md-0">
    <h6 class="fw-bold">Colaboradores</h6>
    <p><a class="links" target="_blank" href="https://www.umar.mx/web/directorio/profesores/puerto_escondido/instituto_de_industrias/remedios_fabian">M.T.I. Remedios Fabian | Informática</a></p>
    <p><a class="links" target="_blank" href="https://www.umar.mx/web/directorio/profesores/puerto_escondido/instituto_de_industrias/manuel_alejandro_valdez">M. en C. Manuel Alejandro Valdés | Informática</a></p>
    <p><a class="links" target="_blank" href="https://www.umar.mx/web/directorio/profesores/puerto_escondido/instituto_de_industrias/alejandra_buenrostro">Dra. Alejandra Buenrostro | Zootecnia</a></p>
  </div>
</section>
<?php $this->endSection('contenido'); ?>