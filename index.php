<?php 
	$choosen = ""; // menginisiasi $choosen variable
	$bgColor = "";
	$headingColor = "";
	$paragraphColor = "";
	$alignment = "";
	$fontSize = "";
	if (isset($_POST["choosen"])) {
    	$tema = $_POST['themes'];
		$bgColor = $_COOKIE[$tema .'_bgColor'];
		$headingColor = $_COOKIE[$tema . '_headingColor'];
		$paragraphColor = $_COOKIE[$tema . '_colorParagraph'];
		$alignment = $_COOKIE[$tema . '_alignment'];
		$fontSize = $_COOKIE[$tema . '_fontSize'];
		$choosen = "index.php";
	} else if(isset($_POST['edit'])){
		$tema = $_POST['themes'];
		$bgColor = $_COOKIE[$tema .'_bgColor'];
		$headingColor = $_COOKIE[$tema . '_headingColor'];
		$paragraphColor = $_COOKIE[$tema . '_colorParagraph'];
		$alignment = $_COOKIE[$tema . '_alignment'];
		$fontSize = $_COOKIE[$tema . '_fontSize'];
    	$choosen = "edit.php"; //mengubah $choosen menjadi edit.php
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THEMES</title>
		<style type="text/css">
			<?php if(isset($_POST['choosen'])) : ?>
			body{
				background-color: <?php echo $bgColor; ?>;
			}
			h1{
				color: <?php echo $headingColor;?>;
				text-align: <?php echo $alignment;?>;
			}
			p{
				color: <?php echo $paragraphColor;?>;
				font-size: <?php echo $fontSize; ?>px;
			}
			<?php endif; ?>
		</style>
</head>
<body>
	<form method="post" action="<?php echo $choosen;?>">
		<label>Theme : </label>
		<select size="1" name="themes" required >
			<option value="" disabled selected hidden>--Choose Theme--</option>
			<?php 
			if (isset($_COOKIE['submit'])) {
				foreach ($_COOKIE as $name => $value) {
					# code...
					if (strpos($name, 'theme_') === 0) {
						# code...
						$theme = explode('_', $name);
						$themeName = $theme[1];
						echo "<option value=\"$themeName\">$themeName</option>";
					}
				}
			}
			?>
		</select>	
		<a href="tambah.php">Add New Theme</a>
		<br>
		<br>
		<input type="submit" name="choosen" value="Choose The Theme">
		<input type="submit" name="edit" value="Edit The Theme">
	</form>
	<hr>
	<h1>Heading 1</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, 
		nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
</body>
</html>