        <table id="book-table" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
            <?php foreach (array_keys($lista[0]) as $titles): ?>              
              <td><?php echo $titles; ?></td>                          
            <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($lista as $asesor): ?>
              <tr>
                <?php foreach ($asesor as $data): ?>
                  <td><?php echo $data; ?></td>
                <?php endforeach; ?>
              </tr>           
            <?php endforeach; ?>
          </tbody>
        </table>