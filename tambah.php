<?php 
    if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['bgColor']) && isset($_POST['colorH1']) 
	&& isset($_POST['colorParagraph']) && isset($_POST['fontSize']) && isset($_POST['alignment'])) {
		$themeName = $_POST['name'];
		// Create a cookie with the theme name
		setcookie("submit", "submit", time()+3600);
		setcookie('theme_' . $themeName, $themeName, time()+3600);
		setcookie($themeName .'_bgColor', $_POST['bgColor'], time()+3600);
		setcookie($themeName .'_headingColor', $_POST['colorH1'], time()+3600);
		setcookie($themeName .'_alignment', $_POST['alignment'], time()+3600);
		setcookie($themeName .'_colorParagraph', $_POST['colorParagraph'], time()+3600);
		setcookie($themeName . '_fontSize', $_POST['fontSize'], time()+3600);
            
    }
		
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert Themes</title>
	<link rel="stylesheet" href="style.css">
	<style>
		.container{
			height: 100vh;
			position: relative;
		}
		.form{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		<?php if(isset($_POST['submit'])) : ?>
			.form{
				background-color: <?php echo $_POST['bgColor'];?>;
				padding: 10px;
				border-radius: 10px;
			} label, a{
				color: <?php echo $_POST['colorParagraph']?>;
			}h1{
				color: <?php echo $_POST['colorH1'] ?>;
			}
		<?php endif; ?>
	</style>
</head>
<body>
	<div class="container">
		<div class="form">
			<h1>Insert Theme</h1>
			<form method="post" action="">
				<label>Name of your theme :</label>
				<input type="text" name="name" required autocomplete="on" autofocus>
				<br>
				<br>
				<label>Color of Page Background : </label>
				<input type="color" name="bgColor" required autocomplete="on">
				<br>
				<br>
				<label>Color of Heading 1 : </label>
				<input type="color" name="colorH1" required autocomplete="on">
				<br>
				<br>
				<label>Alignment of Heading 1 :</label>
				<select name="alignment" size="1" required autocomplete="on">
					<option disabled selected hidden>-- Choose the Alignment --</option>
					<option value="right">Right</option>
					<option value="center">Center</option>
					<option value="left">Left</option>
					<option value="justify">Justify</option>
				</select>
				<br>
				<br>
				<label>Color of Paragraph : </label>
				<input type="color" name="colorParagraph" required autocomplete="on">
				<br>
				<br>
				<label>Font size of Paragraph : </label>
				<input type="number" name="fontSize" required autocomplete="on"> px
				<br>
				<br>	
				<input type="submit" name="submit">
				<a href="index.php">Return to HOME PAGE</a>
			</form>
		</div>
	</div>
	

</body>
</html>