<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Dropdown Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <?php foreach ($dropdown as $menu): ?>
              <?php if(is_null($menu->menu_item_id)): ?>
                <li>
                  <a class="nav-link" href="#"><?php echo $menu->m_name; ?></a>
                </li>
              <?php else: ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $menu->m_name; ?></a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($dropdown_items as $item): ?>
                      <?php if($menu->menu_id == $item->m_id): ?>
                        <a class="dropdown-item" href="<?= base_url($item->m_item_url) ?>"><?php echo $item->m_item_name; ?></a>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                </li>
              <?php endif; ?>			
            <?php endforeach; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
