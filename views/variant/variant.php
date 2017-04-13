<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap_Test</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="/math/stylesheets/bootstrap/css/bootstrap.min.css">
	<script src="/math/scripts/jquery-3.2.0.min.js"></script>
	<script src="/math/stylesheets/bootstrap/js/bootstrap.min.js"></script>
	
	</head>
	<body>
		<?php 
			require_once($_SERVER['DOCUMENT_ROOT'] . '/math/templates/navbar-template.html');  
		?>
		
		<div class="container-fluid" style="margin-top:4%">
			<div class="row">
				<div class="col-lg-offset-2 col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Вариант</h2>
						</div>
						<div class="panel-body">
							
						</div>
					</div>
				</div>
				<div class="col-lg-2">
					<?php 
						require_once($_SERVER['DOCUMENT_ROOT'] . '/math/templates/right-panel-template.html');  
					?>
				</div>
				<div class="col-lg-offset-2 col-lg-8 col-md-12 col-sm-12 col-xs-12" align="center">
					<div class="well">
						<?php 
							require_once($_SERVER['DOCUMENT_ROOT'] . '/math/templates/copyrights.html');  
						?>
					</div>
				</div>
			</div>
		</div>
	
	</body>
</html>
