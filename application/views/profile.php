<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
</head>
<body>

	<h2>Welcome <?= $this->session->userdata($user['name'])?></h2>
	<h2>User Information</h2>
	First Name: <?= $this->session->userdata($user['name'])?>
	lastt Name: <?= $this->session->userdata($user['name'])?>
	Email: <?= $this->session->userdata($user['email'])?>
	<a href="users/logoff">Logg Off</a>
    
</body>
</html>