<!DOCTYPE html>

<?php

if(hash("whirlpool", $_POST["password"])!="55effa4673892e8f3c2f21b122265b037e89227a80122c2b6b23c97cfa93d90e3c76388b86aa2990c07248b97533dd6cf5dd0e68aae889de3baae8dac034f52a") 
{
	die("invalid password");
}

$db=new SQLite3("data.db");
$title=$_POST["title"];
$content=$_POST["content"];
$id=$_POST["id"];

$stmt=$db->prepare("UPDATE posts SET title=:title, content=:content WHERE id=:id");

$stmt->bindValue(":content", $content, SQLITE3_TEXT);
$stmt->bindValue(":title", $title, SQLITE3_TEXT);
$stmt->bindValue(":id", $id, SQLITE3_INTEGER);

$successful=$stmt->execute();

if(!$successful)
{
	die($db->lastErrorMsg());
}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Post Submitted</title>
	</head>
	<body>
		<div class="content">
			<p>Edit successfully saved!</p>
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



