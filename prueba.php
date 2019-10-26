<?php
	$password_segura= password_hash('54321',PASSWORD_BCRYPT,['cost'=>4]);
	$rest=password_verify('54321',$password_segura);

	echo var_dump($rest);
?>