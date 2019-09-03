  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Equipo</h1>
        <p class="lead">Datos basicos del Equipo Ondas Valle!</p>

        <div class="row">
          <?php if (isset($error)) : ?>
            <div class="col-md-12">
              <div class="alert alert-danger" role="alert">
                <?= $error ?>
              </div>
            </div>
          <?php endif; ?>

              <div class="form-group">
                <input type="submit" class="button is-link" value="Consultar">
              </div>
            </form>
          </div>
        </div>