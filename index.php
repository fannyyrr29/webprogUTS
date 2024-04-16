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
		$choosen = "";
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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<style type="text/css">
		.container{
			display: grid;
			grid-template-columns: 600px auto;
			grid-gap: 20px;
			height: 100vh;
		}
		.form{
			padding: 40px;
			margin: auto;
			box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.8);
		}
		.result{
			padding-right: 40px;
			margin: auto;
		}
		.button{
			display: flex;
			justify-content: center;
			gap: 20px;
		}
		.dotted-background {
    		background-image: radial-gradient(circle at 0.5px 0.5px, #ffffff 0.5px, transparent 0.5px); /* Dotted pattern */
    		background-size: 10px 10px; /* Adjust the size of the dots */
		}
		.developer{
			position: fixed;
			padding: 10px;
		}
		<?php if(isset($_POST['choosen'])) : ?>
		body{
			background-color: <?php echo $bgColor; ?>;
		}
		h1{
			color: <?php echo $headingColor;?>;
			text-align: <?php echo $alignment;?>;
			margin-bottom: 10px;
		}
		p{
			color: <?php echo $paragraphColor;?>;
			font-size: <?php echo $fontSize; ?>px;
			text-align: justify;
		}
		label{
			color: <?php echo $paragraphColor;?>;
		}
		.bg{
			background-color:<?php echo $headingColor?>;
			box-shadow: 2px 0px 5px <?php echo $paragraphColor?>;
		}
		.developer p{
			color: <?php echo $paragraphColor;?>;
		}
		<?php endif; ?>
		
	</style>
</head>
<body>
	<div class="developer">
		<p>Fanny Rorencia Ribowo - 160422005</p>
		<p>Kresnayana Nanda Arifink - 160422071</p>
		<p>Christopher Pengalila - 160422073</p>
	</div>
	<div class="container dotted-background">
		<div class="form bg">
		<form method="post" action="<?php echo $choosen;?>">
			<label>Theme : </label>
			<select size="1" name="themes" required >
				<option value="" disabled selected hidden>--Choose Theme--</option>
				<?php 
					if (isset($_COOKIE['submit'])) {
						foreach ($_COOKIE as $name => $value) {
							if (strpos($name, 'theme_') === 0) {
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
			<div class="button">
				<input type="submit" name="choosen" value="Choose The Theme">
				<input type="submit" name="edit" value="Edit The Theme">
			</div>
			
		</form>
		</div>
		<div class="result">
			<h1>Heading 1</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, 
			nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
		</div>
	</div>
</body>
<footer>
	
</footer>
</html>