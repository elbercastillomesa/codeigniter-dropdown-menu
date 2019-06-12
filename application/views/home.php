<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dropdown Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

</head>

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
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>

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
									<a class="dropdown-item" href="#"><?php echo $item->m_item_name; ?></a>
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

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">A Dropdown Menu Example</h1>
        <p class="lead">Base in Phearun Web Dev but updated to Current Bootstrap, CI and jQuery versions!</p>
        <ul class="list-unstyled">          
		<p class="lead">Check the tutorial on Youtube <a href="https://www.youtube.com/watch?v=ZERodexagZA">Here!</a></p>
		<p class="lead">GitHub example <a href="https://github.com/elbercastillomesa/codeigniter-dropdown-menu">Here!</a></p>
		<li>Bootstrap 4.3.1</li>
          <li>jQuery 3.4.1</li>
          <li>CodeIgniter 3.1.10</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/jquery/jquery.slim.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>