<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	<span id="current-subject">Выберите предмет</span>
	<span class="caret"></span>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	<?php 
		require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');  
		$query="SELECT * FROM subjects;";
		$result = $mysqli->query($query);
		if (!$result) {
			fprintf($stderr, "Error message: %s\n", $mysqli->error);
			exit(1);
		}
		while (($row = $result->fetch_array()))
			printf ('<li><a href="#" onclick="change_subject(this)"> %s </a></li>', $row['subject_name']);
	?>									
</ul>
<script> 
</script>
