<div class="input-group">
	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" id="subject-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<span id="current-subject">Выберите предмет</span>
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="subject-dropdown">
			<?php 
				require_once($_SERVER['DOCUMENT_ROOT'] . '/math/config/system_inits.php');  
				$query="SELECT * FROM subjects;";
				$result = $mysqli->query($query);
				if (!$result) {
					fprintf($stderr, "Error message: %s\n", $mysqli->error);
					exit(1);
				}
				while (($row = $result->fetch_array()))
					printf ('<li><a href="#" onclick="change_subject(this, %d)"> %s </a></li>', $row['subject_id'], $row['subject_name']);
			?>									
		</ul>
	</div>

	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" id="category-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<span id="current-category">Выберите категорию</span>
			<span class="caret"></span>
		</button>
		<ul id="categories-list" class="dropdown-menu" aria-labelledby="category-dropdown">
											
		</ul>
	</div>

	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" id="subcategory-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<span id="current-subcategory">Выберите подкатегорию</span>
			<span class="caret"></span>
		</button>
		<ul id="subcategories-list" class="dropdown-menu" aria-labelledby="subcategory-dropdown">
											
		</ul>
	</div>

	<div class="checkbox">
		<label><input type="checkbox" value="">Из реального теста</label>
	</div>
</div>

<script>
	var curr_subject_id = -1; 
	var curr_category_id = -1;
	var curr_subcategory_id = -1;
	function change_subject(subj, id) {
		if (id != curr_subject_id) {
			var curr_category = document.getElementById('current-category');
			curr_category.innerHTML = "Выберете категорию";
			curr_category = -1;
			var curr_subcategory = document.getElementById('current-subcategory');
			curr_subcategory.innerHTML = "Выберете подкатегорию";
			curr_subcategory = -1;
		}
		
		curr_subject_id = id;
		var curr_subj = document.getElementById('current-subject');
		curr_subj.innerHTML = subj.innerHTML;
		get_categories(id);
	}
	
	function get_categories(subject_id) {
		$.get("/math/views/new-task/get-categories.php", { subject_id: subject_id }, 
		function(data) {
            if (data == "ERR")
           		alert('Произошла ошибка');
            else {
            	var list = document.getElementById('categories-list');
            	list.innerHTML = data;
            }
		});
	}
	
	function change_category(category, id) {
		if (id != curr_category_id) {
			var curr_subcategory = document.getElementById('current-subcategory');
			curr_subcategory.innerHTML = "Выберете подкатегорию";
			curr_subcategory = -1;
		}
		curr_category_id = id;
		var curr_category = document.getElementById('current-category');
		curr_category.innerHTML = category.innerHTML;
		//get_categories(id);
		get_subcategories(id);
	}
	
	function get_subcategories(category_id) {
		$.get("/math/views/new-task/get-subcategories.php", { category_id: category_id }, 
		function(data) {
            if (data == "ERR")
           		alert('Произошла ошибка');
            else {
            	var list = document.getElementById('subcategories-list');
            	list.innerHTML = data;
            }
		});
	}
	
	function change_subcategory(subcategory, id) {
		curr_subcategory_id = id;
		var curr_subcategory = document.getElementById('current-subcategory');
		curr_subcategory.innerHTML = subcategory.innerHTML;
	}
	
</script>
