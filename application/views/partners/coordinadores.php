  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Equipo Ondas</h1>        
        <p class="lead">Datos basicos de los <?php echo $parternType; ?> Ondas Valle!</p>

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
            <form action="<?= site_url('equipo/getData') ?>" method="POST">
              
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
                  <input type="checkbox" class="custom-control-input" id="sexo" name="dato[sexo]">
                  <label class="custom-control-label" for="sexo">Sexo</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="etnia" name="dato[etnia]">
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
                  <input type="checkbox" class="custom-control-input" id="email" name="dato[coordinadores_email]">
                  <label class="custom-control-label" for="email">e-mail</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="nivel" name="dato[nivel_academico]">
                  <label class="custom-control-label" for="nivel">Nivel Academico</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="mpio" name="dato[municipio]">
                  <label class="custom-control-label" for="mpio">Municipio</label>
                </div>
              </div>

              <input type="hidden" id="parternType" name="parternType" value="coordinadores">

              <div class="form-group">
                <input type="submit" class="button is-link" value="Consultar">
              </div>
            </form>
          </div>
        </div>