<!DOCTYPE html>

<?php

$db=new SQLite3("data.db");
$title=$db->escapeString($_POST["title"]);
$content=$db->escapeString($_POST["content"]);

$successful=$db->exec("INSERT INTO posts VALUES ('".$content."', '".$title."', strftime('%s', 'now'))");

if(!$successful)
{
	die($db->lastErrorMsg());
}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="test.css" />
		<title>Post Submitted</title>
	</head>
	<body>
		<div class="content">
			<p>Your post was sumbitted succesfully.</p>
			<p><a href="index.php">Return to home page</a></p>
		</div>
		<div id="side">
			<ul>
				<li> <a href="index.php">Home</a></li>
				<li><a href="insert.html">New post</a></li>
			</ul>
		</div>
	</body>
</html>
