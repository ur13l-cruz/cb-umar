<!-- Componentes las cuales se mostrarán deacuerdo a lo seleccionado en el nav-bar -->
<?php $this->extend('layouts/layout'); ?>

<?php $this->section('contenido'); ?>

<div class="container-fluid " style="background-color: rgb(0 69 118); color:white;">
  <div class="container">
    <p class="">
      <a href="<?php echo base_url(); ?>" class="text-decoration-none link-light">Inicio</a>&emsp;>
      <a class="text-decoration-none link-light">&emsp;Colección biológica</a>&emsp;>
      <a class="text-decoration-none link-light">&emsp;Consultar colección</a>
    </p>
  </div>
</div>

<div class="container">
  <section class="row text-center mt-3">
    <h2>COLECCIÓN BIOLÓGICA</h2>
  </section>

  <section class="row mt-5">
    <div class="col-md-4">
      <div class="input-group mb-3">
        <input id="inputBuscarEscecimen" type="text" class="form-control" placeholder="Nombre común o científico" aria-label="Buscar especimen" aria-describedby="btnBuscarEscecimen">
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
            if ($especie->consulta_restrigida == 0) {
              echo "<tr>";
              echo "<td>$especie->dtaxonomicos_nombre_comun</td>";
              echo "<td class='fst-italic'>$especie->dtaxonomicos_genero $especie->dtaxonomicos_especie</td>";
              echo '<td>
                        <div class="btn-group" role="" aria-label="Grupo vistas">
                          <a class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="8 años o menos" href="' . base_url() . 'cb/especies/v1/' . $especie->id . '" role="button"><img width="25" height="25" src="' . base_url() . '/public/img/icono_v1.svg" alt=""/></a>
                          <a class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="9 a 14 años" href="' . base_url() . 'cb/especies/v2/' . $especie->id . '" role="button"><img width="25" height="25" src="' . base_url() . '/public/img/icono_v2.svg" alt=""/></a>
                          <a class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="15 a 17 años" href="' . base_url() . 'cb/especies/v3/' . $especie->id . '" role="button"><img width="25" height="25" src="' . base_url() . '/public/img/icono_v3.svg" alt=""/></a>
                          <a class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="18 años o más" href="' . base_url() . 'cb/especies/v4/' . $especie->id . '" role="button"><img width="25" height="25" src="' . base_url() . '/public/img/icono_v4.svg" alt=""/></a>
                        </div>
                    </td>';
              echo "</tr>";
            }
          } ?>
        </tbody>
      </table>
    </div>
  </section>
  <section class="row mt-3 mb-3 border border-2 rounded" style="text-align: justify;">
    <h5>Simbología</h5>
    <div>
      <img width="50" height="50" src="<?= base_url() ?>/public/img/icono_v1.svg" alt="" />
      Vista 1: va dirigida a personas de 8 años o menos, es decir, niños estudiantes de los primeros grados de primaria, de prescolar o menores. La característica principal de esta vista es que no contendrá textos explicativos, solo imágenes.
    </div>
    <div class="">
      <img width="50" height="50" src="<?= base_url() ?>/public/img/icono_v2.svg" alt="" />
      Vista 2: va dirigida a personas de 9 a 14 años, es decir, niños estudiantes de secundaria o de los últimos grados de primaria. La característica principal de esta vista es que contendrá textos explicativos breves.
    </div>
    <div class="">
      <img width="50" height="50" src="<?= base_url() ?>/public/img/icono_v3.svg" alt="" />
      Vista 3: va dirigida a personas de 15 a 17 años, es decir, jóvenes estudiantes de preparatoria. La característica principal de esta vista es que contendrá textos más explicativos, pero sin rigor científico.
    </div>
    <div class="">
      <img width="50" height="50" src="<?= base_url() ?>/public/img/icono_v4.svg" alt="" />
      Vista 4: va dirigida a personas de 18 años o más, es decir, adultos estudiantes de universidad, profesores o investigadores. La característica principal de esta vista es que contendrá textos con rigor científico, con citas y referencias.
    </div>
  </section>
</div>

<script>
  document.getElementById('btnBuscarEscecimen').addEventListener('click', function() {
    // Obtiene el término de búsqueda del campo de entrada
    var terminoBusqueda = document.getElementById('inputBuscarEscecimen').value.toLowerCase();

    // Obtiene todas las filas de la tabla
    var filas = document.querySelectorAll('tbody tr');

    // Itera sobre cada fila de la tabla
    filas.forEach(function(fila) {
      // Comprueba si la fila tiene suficientes celdas
      if (fila.cells.length >= 2) {
        // Obtiene las celdas de nombre común y nombre científico de la fila
        var celdaNombreComun = fila.cells[0];
        var celdaNombreCientifico = fila.cells[1];

        // Comprueba si el término de búsqueda está en el nombre común o en el nombre científico
        if (celdaNombreComun.textContent.toLowerCase().includes(terminoBusqueda) || celdaNombreCientifico.textContent.toLowerCase().includes(terminoBusqueda)) {
          // Si el término de búsqueda está en el nombre común o en el nombre científico, muestra la fila
          fila.style.display = '';
        } else {
          // Si el término de búsqueda no está en el nombre común ni en el nombre científico, oculta la fila
          fila.style.display = 'none';
        }
      }
    });
  });
</script>

<?php $this->endSection('contenido'); ?>