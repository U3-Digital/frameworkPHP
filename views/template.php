<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="views\css\login.css" rel="stylesheet" id="bootstrap-css">
  <link href="views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link href=" views\vendor\datatables\dataTables.bootstrap4.css" rel="stylesheet">
 

<link href="views\css\sidebar.css" rel="stylesheet">
<link href="views\css\editarPerfil.css" rel="stylesheet">
<link href="views\css\usuarios.css" rel="stylesheet">
<title>FrameWork</title>
</head>
<body>
</body>
</html>
<?php
$modulos = new Enlaces();
$modulos -> enlacesController();
?><script src="views/vendor/jquery/jquery.min.js"></script>
<script src="views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="views\js\generales.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/9aa27d183b.js" crossorigin="anonymous"></script>
<!-- <script src="views\vendor\datatables\dataTables.bootstrap4.js" crossorigin="anonymous"></script> -->
<script src="views/vendor/datatables/jquery.dataTables.js"></script>
	<script src="views/vendor/datatables/dataTables.bootstrap4.js"></script>


	<script>
		$(function() {
			$('#example').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": false,
				"autoWidth": false,
				"responsive": true,
				"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
				"iDisplayLength": 10,	//CUANTOS RRESULTADOS MOSTRAR
				"language":idioma_español
				
			}
			);		
		});

		var idioma_español={
						"decimal":        "",
						"emptyTable":     "",
						"info":           "Showing _START_ to _END_ of _TOTAL_ entries",
						"infoEmpty":      "Showing 0 to 0 of 0 entries",
						"infoFiltered":   "(filtered from _MAX_ total entries)",
						"infoPostFix":    "",
						"thousands":      ",",
						"lengthMenu":     "Mostrar _MENU_ Resultados",
						"loadingRecords": "Loading...",
						"processing":     "Processing...",
						"search":         "Buscar:",
						"zeroRecords":    "Sin resultados",
						"paginate": {
							"first":      "Primero",
							"last":       "Ultimo",
							"next":       "Siguiente",
							"previous":   "Anterior"
						},
						"aria": {
							"sortAscending":  ": activate to sort column ascending",
							"sortDescending": ": activate to sort column descending"
						}
}
	</script>
