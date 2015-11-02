<!doctype html>
<html>
	<head>
		<title>PlainOldPHP</title>
	</head>
	<body>
		<h1> Hello <?php echo  isset($_GET['name']) ? $_GET['name']: ''; ?> </h1>
		<form method="GET">
			<input type="text" name="name" /><input type="submit" />
		</form>
	</body>
</html>
