<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style type="text/css">
	.book{
		margin-left:300px;
		padding:20px;
		background-color: #00FF00;
		width: 200px;
	    height: 150px;
	    overflow: scroll;
	    display: inline-block;
	    vertical-align: top;
	}
	.review {
		display: inline-block;
		vertical-align: top;
	}
	</style>
</head>
<body>
<div class = "container">
	<div class = "review">
	<h2>Welcome <?= $this->session->userdata('user')['name']?></h2>
	<a href="/users/add">Add a new review</a>
	<a href="/users/logout">Logg Off</a>
	<h2>Recent Book reviews: </h2>
	<?php
// var_dump($reviews);
// die();
	for($i= COUNT($reviews)-1; $i>=COUNT($reviews)-3; $i--){?>
	<strong><a href="/books/<?= $reviews[$i]['id']?>"><?= $reviews[$i]['title']?></a></strong>
	<p>Rating: <?= $reviews[$i]['rating']?></p>
	<a href="/users/user_profile/<?= $reviews[$i]['users_id']?>"><?= $reviews[$i]['Alias']?></a> says: <?= $reviews[$i]['review']?> <br>
	<?= $reviews[$i]['created_at']?><hr>
	<?}?>
	</div>
	<div class = "book">
		<?php
		// COUNT($reviews)
		for($j= 0; $j<COUNT($reviews)-3; $j++){?>
		<a href="/books/<?= $reviews[$i]['id']?>"><?= $reviews[$j]['title']?></a>
		<?}?>
	</div>
</div>
</body>
</html>