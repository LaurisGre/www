<?php

require '../bootloader.php';

$nav_array = nav();

$item_db = file_to_array(DB_FILE);

$user_id = $_COOKIE['user_id'] ?? uniqid();
$visits = ($_COOKIE['visits'] ?? 0) + 1;

setcookie('user_id', $user_id, time() + 3600, '/');
setcookie('visits', $visits, time() + 3600, '/');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Home</title>
</head>

<body>
	<h1>WELCOME TO AUTO-BBZ SHOP</h1>
	<header>
		<?php require ROOT . '/core/templates/nav.tpl.php'; ?>
	</header>
	<main>
		<div class="grid_box">
			<?php foreach ($item_db['items'] ?? [] as $item) : ?>
				<div class="grid_card">
					<?php foreach ($item as $param_name => $param_value) : ?>
						<div>
							<?php if ($param_name === 'img') : ?>
								<img src="<?php print $param_value; ?>" alt="">
							<?php else : ?>
								<?php print ucfirst($param_name) . ": $param_value"; ?>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</main>
</body>

</html>