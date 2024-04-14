<?php 
	if (isset($_POST['edit'])) {
		# code...
		$tema = $_POST['themes'];
		$bgColor = $_COOKIE[$tema .'_bgColor'];
		$headingColor = $_COOKIE[$tema . '_headingColor'];
		$paragraphColor = $_COOKIE[$tema . '_colorParagraph'];
		$alignment = $_COOKIE[$tema . '_alignment'];
		$fontSize = $_COOKIE[$tema . '_fontSize'];
		
	}

?>
<?php 
        if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['bgColor']) && isset($_POST['colorH1']) 
		&& isset($_POST['colorParagraph']) && isset($_POST['fontSize'])) {
			if (!isset($_POST['alignment'])) {
				# code...
				echo "<h3 style=\"color: red;\">Please select alignment!</h3>";
			}else{
				$themeName = $_POST['name'];
				// Create a cookie with the theme name
				setcookie("submit", "submit", time()+120);
				setcookie('theme_' . $themeName, $themeName, time()+300);
				setcookie($themeName .'_bgColor', $_POST['bgColor'], time()+300);
				setcookie($themeName .'_headingColor', $_POST['colorH1'], time()+300);
				setcookie($themeName .'_alignment', $_POST['alignment'], time()+300);
				setcookie($themeName .'_colorParagraph', $_POST['colorParagraph'], time()+300);
				setcookie($themeName . '_fontSize', $_POST['fontSize'], time()+300);
			}
            
        }
		
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Themes</title>
</head>
<body>
	<form method="post" action="">
		<label>Name of your theme :</label>
		<input type="text" name="name" value="<?php echo $tema;?>">
		<br>
		<br>
		<label>Color of Page Background : </label>
		<input type="color" name="colorBg" value="<?php echo $bgColor;?>">
		<br>
		<br>
		<label>Color of Heading 1 : </label>
		<input type="color" name="colorH1" value="<?php echo $headingColor;?>">
		<br>
		<br>
		<label>Alignment of Heading 1</label>
		<select name="alignment" size="1">
			<option disabled>-- Choose the Alignment --</option>
			<option value="right" <?php echo ($alignment == 'right' ? ' selected' : '');?>>Right</option>
			<option value="center" <?php echo ($alignment == 'center' ? ' selected' : '');?>>Center</option>
			<option value="left" <?php echo ($alignment == 'left' ? ' selected' : '');?>>Left</option>
			<option value="justify" <?php echo ($alignment == 'justify' ? ' selected' : '');?>>Justify</option>
		</select>
		<br>
		<br>
		<label>Color of Paragraph : </label>
		<input type="color" name="colorParagraph" value="<?php echo $paragraphColor;?>">
		<br>
		<br>
		<label>Font size of Paragraph : </label>
		<input type="number" name="fontSize" value="<?php echo $fontSize;?>">px
		<br>
		<br>
		<input type="submit" name="submit">
	</form>
	
</body>
</html>