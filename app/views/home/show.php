<html>
<head>

</head>
<body>
<?php
	if(isset($data)){
		?>
			<h1>Success!</h1>
			<p>You created user: <?=$data->username?></p>
		<?php
	}else {
		?>
			<h1>Error!</h1>
			<p>Something went wrong!</p>
		<?php
	}
	
?>

</body>
</html>