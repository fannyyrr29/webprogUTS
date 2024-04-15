<?php 
	//mendapatkan nilai yang dikirimkan dari index.phps
	if (isset($_POST['edit'])) {
		# code...
		$tema = $_POST['themes'];
		$themeName = $_COOKIE['theme_' . $tema];
		$bgColor = $_COOKIE[$tema .'_bgColor'];
		$headingColor = $_COOKIE[$tema . '_headingColor'];
		$paragraphColor = $_COOKIE[$tema . '_colorParagraph'];
		$alignment = $_COOKIE[$tema . '_alignment'];
		$fontSize = $_COOKIE[$tema . '_fontSize'];
	}
	//ketika user menekan tombol submit
	else if (isset($_POST['submitEdit'])) {
		$newTheme = $_POST['nameEdit'];
		if ($_POST['oldTheme'] !== "") {
			# code...
			$oldTheme = $_COOKIE['theme_' . $_POST['oldTheme']];

		}

		//destroy cookie ketika user mengubah nama tema
		if ($oldTheme != $newTheme) {
			// Delete old theme cookies
			setcookie('theme_'. $oldTheme,"", time()-3600);
			setcookie($oldTheme .'_bgColor', "", time()-3600);
			setcookie($oldTheme .'_headingColor', "", time()-3600);
			setcookie($oldTheme .'_alignment', "", time()-3600);
			setcookie($oldTheme .'_colorParagraph', "", time()-3600);
			setcookie($oldTheme . '_fontSize', "", time()-3600);
			echo "cookie has been destroyed";
		}
		// membuat cookie baru dengan nama tema baru
		setcookie('theme_'. $newTheme,$_POST['nameEdit'], time()+3600);
		setcookie($newTheme .'_bgColor', $_POST['bgColorEdit'], time()+3600);
		setcookie($newTheme .'_headingColor', $_POST['colorH1Edit'], time()+3600);
		setcookie($newTheme .'_alignment', $_POST['alignmentEdit'], time()+3600);
		setcookie($newTheme .'_colorParagraph', $_POST['colorParagraphEdit'], time()+3600);
		setcookie($newTheme . '_fontSize', $_POST['fontSizeEdit'], time()+3600);

		$tema = $_COOKIE['theme_' . $newTheme];
		$bgColor = $_COOKIE[$newTheme .'_bgColor'];
		$headingColor = $_COOKIE[$newTheme . '_headingColor'];
		$paragraphColor = $_COOKIE[$newTheme . '_colorParagraph'];
		$alignment = $_COOKIE[$newTheme . '_alignment'];
		$fontSize = $_COOKIE[$newTheme . '_fontSize'];
		echo $tema;
		echo $bgColor;
		echo $headingColor;
		echo $paragraphColor;
		echo $alignment;
		echo $fontSize;

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
		<input type="text" name="nameEdit" value="<?php echo $tema;?>">
		<br>
		<br>
		<label>Color of Page Background : </label>
		<input type="color" name="bgColorEdit" value="<?php echo $bgColor;?>">
		<br>
		<br>
		<label>Color of Heading 1 : </label>
		<input type="color" name="colorH1Edit" value="<?php echo $headingColor;?>">
		<br>
		<br>
		<label>Alignment of Heading 1</label>
		<select name="alignmentEdit" size="1">
			<option disabled>-- Choose the Alignment --</option>
			<option value="right" <?php echo ($alignment == 'right' ? ' selected' : '');?>>Right</option>
			<option value="center" <?php echo ($alignment == 'center' ? ' selected' : '');?>>Center</option>
			<option value="left" <?php echo ($alignment == 'left' ? ' selected' : '');?>>Left</option>
			<option value="justify" <?php echo ($alignment == 'justify' ? ' selected' : '');?>>Justify</option>
		</select>
		<br>
		<br>
		<label>Color of Paragraph : </label>
		<input type="color" name="colorParagraphEdit" value="<?php echo $paragraphColor;?>">
		<br>
		<br>
		<label>Font size of Paragraph : </label>
		<input type="number" name="fontSizeEdit" value="<?php echo $fontSize;?>">px
		<br>
		<br>
		<input type="hidden" name="oldTheme" value="<?php echo $old;?>">
		<input type="submit" name="submitEdit">
	</form>
	<a href="index.php">Return to HOME PAGE</a>
</body>
</html>