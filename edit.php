<!DOCTYPE html>

<?php

if($_GET["id"]==NULL)
{
	die("No ide passed\n");
}

$db=new SQLite3("data.db");
$stmt=$db->prepare("SELECT * FROM posts WHERE id=:id");
$stmt->bindValue(":id", $_GET["id"], SQLITE3_INTEGER);

$result=$stmt->execute();
$post=$result->fetchArray(); //Can only return one result

if(!$post)
{
	die($_GET["id"]." does not appear to be a valid row reference");
}

$title=$post["title"];
$content=$post["content"]; //don't format post, we want it in it's raw format
$id=$post["id"];

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Edit Post</title>
	</head>
	<body>
		<div class="content">
			<form action="handle_edit_post.php" method="post">
				<?php
					echo "<h2>Post Title</h2> <input type='text' name='title' value='$title' />";
					echo "<h2>Content:</h2>";
					echo "<textarea name='content' rows=30 cols=145>$content</textarea>";
					echo "<input type='hidden' name='id' value='$id' />";
				?>
				<input type="password" name="password" />
				<input type="submit" value="Save!" />
			</form>
		</div>
		<div id="side">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="insert.html">New post</a></li>
			</ul>
		</div>
	</body>
</html>
