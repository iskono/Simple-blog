<!DOCTYPE html>

<?php

include_once "markdown/markdown.php";

if($_GET["time"]==NULL)
{
	die("No time passed\n");
}

$db=new SQLite3("data.db");
$stmt=$db->prepare("SELECT * FROM posts WHERE time=:time");
$stmt->bindValue(":time", $_GET["time"], SQLITE3_INTEGER);

$result=$stmt->execute();
$post=$result->fetchArray(); //Should only return one result

if(!$post)
{
	die($_GET["time"] . " does not appear to be a valid row reference");
}
$title=$post["title"];
$content=Markdown($post["content"]);
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css", href="style.css" />
		<title>Test page</title>
	</head>
	<body>
		<div class="content">
			<?php
			echo "<h1> $title </h1>";
			echo $content;
			?>
		</div>
		
		<div id="side">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="insert.html">New Post</a></li>
			</ul>
		</div>
	</body>
</html>
