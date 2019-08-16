  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Asesores</h1>
        <p class="lead">Datos basicos de los asesores Ondas Valle!</p>

        <div class="row">
          <?php if (isset($error)) : ?>
            <div class="col-md-12">
              <div class="alert alert-danger" role="alert">
                <?= $error ?>
              </div>
            </div>
          <?php endif; ?>
      <?php echo form_error('accept_terms_checkbox') ?>
          <div class="col-md-12">
            <form action="<?= site_url('asesores/getData') ?>" method="POST">
              
              <div class="form-group">
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="nombre" name="dato[nombre]" checked>
                  <label class="custom-control-label" for="nombre">Nombres</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="apellido" name="dato[apellido]" checked>
                  <label class="custom-control-label" for="apellido">Apellidos</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="sexo" name="dato[fk_id_sexo]">
                  <label class="custom-control-label" for="sexo">Sexo</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="etnia" name="dato[fk_id_etnia]">
                  <label class="custom-control-label" for="etnia">Etnia</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="telefono" name="dato[telefono]">
                  <label class="custom-control-label" for="telefono">Telefono</label>
                </div>
              </div>
              
              <div class="form-group">                
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="celular" name="dato[celular]">
                  <label class="custom-control-label" for="celular">Celular</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="documento" name="dato[documento]">
                  <label class="custom-control-label" for="documento">Documento</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="email" name="dato[asesor_email]">
                  <label class="custom-control-label" for="email">e-mail</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="nivel" name="dato[fk_id_nivela]">
                  <label class="custom-control-label" for="nivel">Nivel Academico</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="mpio" name="dato[fk_id_mpio]">
                  <label class="custom-control-label" for="mpio">Municipio</label>
                </div>
              </div>

              <div class="form-group">
                <input type="submit" class="button is-link" value="Consultar">
              </div>
            </form>
          </div>
        </div>

<?php var_dump($lista); ?>

        <table id="book-table" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <td>Nombres</td>
              <td>Apellidos</td>
              <td>Telefono</td>
              <td>Celular</td>
              <td>e-mail</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($lista as $asesor): ?>
              <tr>
                <td><?php echo $asesor['primer_nombre'].' '.$asesor['segundo_nombre'] ; ?></td>
                <td><?php echo $asesor['primer_apellido'].' '.$asesor['segundo_apellido'] ; ?></td>
                <td><?php echo $asesor['telefono'] ; ?></td>
                <td><?php echo $asesor['celular'] ; ?></td>
                <td><?php echo $asesor['asesor_email'] ; ?></td>
              </tr>           
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
