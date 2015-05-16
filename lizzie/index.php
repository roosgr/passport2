<?
	require_once('init_categories.php');
?><html>
<head>
	<title></title>
	<style type="text/css">
	textarea	{
		width: 100%;
		height: 50%;
	}
	</style>
</head>
<body>
	<form action="form.php" method="post">
		<textarea name="categories"></textarea>
		<button type="submit">submit</button>
	</form>
</body>
</html>