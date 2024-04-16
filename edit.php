<?php 
	if (isset($_POST['edit'])) {
		# code...
		$tema = $_POST['themes'];
		$bgColor = $_COOKIE[$tema .'_bgColor'];
		$headingColor = $_COOKIE[$tema . '_headingColor'];
		$paragraphColor = $_COOKIE[$tema . '_colorParagraph'];
		$alignment = $_COOKIE[$tema . '_alignment'];
		$fontSize = $_COOKIE[$tema . '_fontSize'];

	}elseif (isset($_POST['submit'])) {

		//menghapus cookie lama
		$theme = $_POST['old'];
		setcookie("submit", "submit", time()-3600);
		setcookie('theme_' . $theme, "", time()-3600);
		setcookie($theme .'_bgColor', "", time()-3600);
		setcookie($theme .'_headingColor', "", time()-3600);
		setcookie($theme .'_alignment', "", time()-3600);
		setcookie($theme .'_colorParagraph',"", time()-3600);
		setcookie($theme . '_fontSize', "", time()-3600);
		
		//membuat cookie baru
		$tema = $_POST['nameEdit'];
		setcookie("submit", "submit", time()+3600);
		setcookie('theme_' . $tema, $tema, time()+3600);
		setcookie($tema .'_bgColor', $_POST['bgColorEdit'], time()+3600);
		setcookie($tema .'_headingColor', $_POST['colorH1Edit'], time()+3600);
		setcookie($tema .'_alignment', $_POST['alignmentEdit'], time()+3600);
		setcookie($tema .'_colorParagraph',$_POST['colorParagraphEdit'], time()+3600);
		setcookie($tema .'_fontSize', $_POST['fontSizeEdit'], time()+3600);

		$bgColor = $_POST['bgColorEdit'];
		$headingColor = $_POST['colorH1Edit'];
		$paragraphColor = $_POST['colorParagraphEdit'];
		$alignment = $_POST['alignmentEdit'];
		$fontSize = $_POST['fontSizeEdit'];
		
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
		<input type="hidden" name="old" value="<?php echo $tema;?>">
		<input type="submit" name="submit">
	</form>
	<a href="index.php">Return to HOME PAGE</a>
</body>
</html>