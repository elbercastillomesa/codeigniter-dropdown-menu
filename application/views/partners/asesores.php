  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Asesores</h1>
        <p class="lead">Base in Phearun Web Dev but updated to Current Bootstrap, CI and jQuery versions!</p>
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
