<html>
<head>
	<title>Show one book</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
	<style type="text/css" href = "style.css"></style>
</head>
<body>
<div class = "container">
	<a href="/users/books">Home</a>
	<a href="/users/logout">Logout</a>

<h2><?= $reviews[0]['title']?></h2> 
<h2>Author: <?= $reviews[0]['author']?></h2> 

<h3>Reviews</h3><hr>

<?php 
// var_dump($reviews);
// die();
foreach($reviews as $review){?>
Rating: <?= $review['rating']?><br>

<a href="/users/user_profile/<?= $review['users_id']?>"><?= $review['Alias']?></a> says: 
<?= $review['review']?><br>
<?= $review['created_at']?><br>
<?php if($this->session->userdata('user_id') == $review['users_id']){?>
	<a href="/users/delete/<?= $review['id']?>">Delete this review</a><hr>
<?}?>
<?}?>

<form action = "/users/add_book_review" method = "post">
<input type = "hidden" name = "title" value = "<?= $reviews[0]['title']?>">
<input type = "hidden" name = "author" value = "<?= $reviews[0]['author']?>">
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

</div>

</body>
</html>