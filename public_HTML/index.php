<?php

require '../bootloader.php';

$user_id = $_COOKIE['user_id'] ?? uniqid();
$visits = ($_COOKIE['visits'] ?? 0) + 1;

setcookie('user_id', $user_id, time() + 3600, '/');
setcookie('visits', $visits, time() + 3600, '/');

$h1 = "Hi, this is your ID $user_id";
$h2 = "You visited $visits times";

var_dump($_COOKIE);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Home</title>
</head>

<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="users.php">Users</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h1>THIS IS THE HOME PAGE</h1>
		<?php print $h1; ?>
		<?php print $h2; ?>
	</main>
</body>

</html>