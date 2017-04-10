<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap_Test</title>

    <!-- Bootstrap -->
    
    <link href="/math/stylesheets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
	<script src="/math/stylesheets/bootstrap/js/bootstrap.min.js"></script>
	<script src="/math/templates/navbar_template.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		
	</head>
	<body>
		<?php 
			require_once($_SERVER['DOCUMENT_ROOT'] . '/math/templates/navbar-template.html');  
		?>
		
		<div class="container-fluid" style="margin-top:4%">
			<div class="row">
				<div class="col-lg-offset-1 col-lg-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Название панели</h3>
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
			</div>
		</div>
	
	</body>
</html>
