<html>
<head>
	<title>User Profile</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
</head>
<body>
<!-- 	<?php
	// var_dump($user_profile);
	// die();

	?> -->
User Alias: <?= $user_profile[0]['Alias']?><br>
Name: <?= $user_profile[0]['name']?><br>
Email: <?= $user_profile[0]['email']?><br>
Total Review: <?= COUNT($user_profile)?><br>
<?php 
	foreach($user_profile as $book_title){?>
<a href="/users/get_reviews_by_id/<?=$book_title['id'] ?>"><?= $book_title['Title']?></a><br>
	<?}?>
</body>
</html>