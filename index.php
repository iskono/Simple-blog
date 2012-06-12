<!DOCTYPE html>

<?php
$db=new SQLite3("data.db");
$result=$db->query("SELECT * FROM posts ORDER BY time DESC");
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="test.css" />
		<title>Test page</title>
	</head>
	<body>
		
		<?php
			while($row=$result->fetchArray())
			{
				echo "<div class=\"content\">";
				echo "<h1>".$row["title"]."</h1>\n";
				echo "<p>".$row["content"]."</p>\n";
				echo "</div>";
			}
		?>
		
		<div id="side">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="insert.html">New post</a></li>
			</ul>
		</div>
	</body>
</html>
