<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
		*,
		*::before,
		*::after {
			box-sizing: border-box;
			-webkit-box-sizing: border-box; 
		}
		body{
			font-family: 'Sagoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background-color: #f7f7ff;
			padding: 10px;
			margin: 0;
		}
		._container{
			max-width: 400px;
			background-color: #ffffff;
			padding: 20px;
			margin: 0 auto;
			border: 1px solid #cccccc;
			border-radius: 2px;
		}
		._img{
			overflow: hidden;
			width: 100px;
			height: 100px;
			margin: 0 auto;
			border-radius: 50%;
			box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
		}
		._img > img{
			width: 100px;
			min-height: 100px;
		}
		._info{
			text-align: center;
		}
		._info h1{
			margin: 10px 0;
			text-transform: capitalize;
		}
		._info p{
			color: #555555;
		}
		._info a{
			display: inline-block;
			background-color: #E53E3E;
			color: #fff;
			text-decoration: none;
			padding: 5px 10px;
			border-radius: 2px;
			border: 1px solid rgba(0,0,0,0.1);
		}
	</style>
</head>
<body>
	<div class="_container">
		<div class="_img">
		</div>
		<div class="_info">
				<?php if (isset($_GET['code'])): ?>
				<?php else: ?>
					<a href="<?php echo $client->createAuthUrl(); ?>">Login Dengan Google</a>
			<?php endif ?>
		</div>
	</div>
</body>
</html>