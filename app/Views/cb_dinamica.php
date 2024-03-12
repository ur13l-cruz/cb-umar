<!-- Componentes las cuales se mostrarán deacuerdo a lo seleccionado en el nav-bar -->
<?php $this->extend('layouts/layout'); ?>

<?php $this->section('contenido'); ?>
<section class="row text-center mt-3">
  <h2>COLECCIÓN BIOLÓGICA</h2>
</section>
<section class="row mt-5">
  <div class="col-md-4">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Nombre común o científico" aria-label="Buscar especimen" aria-describedby="btnBuscarEscecimen">
      <button class="btn btn-primary" type="button" id="btnBuscarEscecimen">Buscar</button>
    </div>
  </div>
</section>
<section class="row mt-3">
  <!-- tabla rellenada con la informacion de la base de datos, con js mostrar las filas. -->
  <div class="table-responsive">
    <table class="table text-center align-middle">
      <thead>
        <tr>
          <th scope="col">Nombre común</th>
          <th scope="col">Nombre científico</th>
          <th scope="col">Vistas</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($especies as $especie) {
          echo "<tr>";
          echo "<td>$especie->dtaxonomicos_nombre_comun</td>";
          echo "<td>$especie->dtaxonomicos_especie</td>";
          echo '<td>
            <div class="btn-group" role="" aria-label="Grupo vistas">
              <a class="btn btn-primary border border-light" href="'.base_url().'cb/especies/v1/'. $especie->id .'" role="button">1</a>
              <a class="btn btn-primary border border-light" href="'.base_url().'cb/especies/v2/'. $especie->id .'" role="button">2</a>
              <a class="btn btn-primary border border-light" href="'.base_url().'cb/especies/v3/'. $especie->id .'" role="button">3</a>
              <a class="btn btn-primary border border-light" href="'.base_url().'cb/especies/v4/'. $especie->id .'" role="button">4</a>
            </div>
          </td>';
          echo "</tr>";
        } ?>
      </tbody>
    </table>
  </div>
</section>
<?php $this->endSection('contenido'); ?>