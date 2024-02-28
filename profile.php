<?php
	require "Efunctions.php";
	check_login();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
</head>
<body>
	<?php if(check_login(false)):?>
		Hi, <?=$_SESSION['USER']->fullname?>;
		<br><br>
		<?php if(!check_verified()):?>
			<a href="EmailVerification.php">
				<button>Verify Profile</button>
			</a>
		<?php endif;?>
	<?php endif;?>
</body>
</html>