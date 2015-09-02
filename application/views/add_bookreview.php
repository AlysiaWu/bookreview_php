<html>
<head>
	<title></title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
</head>
<body>
<h1>Add a New Book Title and a Review</h1>

<form action = "/users/add_book_review" method = "post">
	Book Title: <input type = 'text' name = 'title'><br>
	Author:
	<br>	Choose from the list:
	<select name ="author">
		<?php
foreach($authors as $author){?>	  												
		<option value = "<?= $author['author']?>"><?= $author['author']?></option>
		<?}?>	
	</select><br>
	Or add a new author:
		<input type = 'text' name = 'author'><br>
	Review: <br><textarea name = 'review'></textarea><br>
	Rating: <select name = "rating">
		<option value = '1'>1</option>
		<option value = '2'>2</option>
		<option value = '3'>3</option>
		<option value = '4'>4</option>
		<option value = '5'>5</option>
	</select><br>
		<input type= 'submit' value = "Add Book and Review">
</form>


</body>
</html>