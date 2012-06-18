<!DOCTYPE html>

<?php
	touch("data.db");

	$db=new SQLite3("data.db");
	$success=$db->exec("CREATE TABLE posts(content TEXT, title TEXT, time INTEGER);");

	if(!$success)
	{
		die("Failed to create database");
	}

	$success=$db->exec("INSERT INTO posts VALUES ('This is just an example post', 'Hello, World!', strftime('%s', 'now'))");
	if(!$success)
	{
		die("Failed to make example post to database");
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Database setup</title>
	</head>
	<body>
		<div class="content">
			<p>Your new database has been created successfully, and an example post has been made in it.</p>
		</div>
		<div id="side">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="insert.html">New post</a></li>
			</ul>
		</div>
	</body>
</html>
