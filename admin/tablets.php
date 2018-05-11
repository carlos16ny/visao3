<!DOCTYPE html>
<html>
<head>
	<title>Tech Pizza</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<meta name="charset utf-8">
</head>
<body>
	<section class="container">
		<h1 class="h1">Mesas</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Mesa ID</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php

					require_once 'assets/php/tablesClass.php';

					$tables = new Tables();
					$table = $tables->tablesList();

					while($row = $table->fetch(PDO::FETCH_OBJ)) { ?>
					<tr>
						<td><?php echo "Mesa " . $row->id_table ?></td>
						<?php if($row->status == "0"){ ?>
							<td><button class="btn btn-success btn-lg">Live</button></td>
						<?php } else { ?>
							<td><button class="btn btn-danger btn-lg btn-20">Ocupada</button></td>
						<?php } ?>
					</tr>


				<?php } ?>
			</tbody>
		</table>

	</section>



	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>
