	<!-- Bootstrap core JavaScript -->
	<script src="<?= base_url('assets/jquery/jquery.slim.min.js') ?>"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>  
	<script type="text/javascript">
		$(document).ready(function() {
			$('#<?php echo "book-table" ?>').DataTable({
				"pageLength" : 10,
				"language": {
					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
				}		        
		    });
		});
	</script>
</body>
</html>