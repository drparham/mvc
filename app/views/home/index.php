<html>
<head>
</head>
<body>
	<div>
		<h1>Hello World</h1>
		<p>Hello, </p>
		<?php
			if(isset($data)){
				foreach($data as $user){
				?>
					<p><a href='mailto:<?=$user->email?>'><?=$user->username?></p>
				<?php
				}
			}
			
		?>
		
	</div>
</body>
</html>