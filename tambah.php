<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Themes</title>
</head>
<body>
	<form method="post" action="">
		<label>Name of your theme :</label>
		<input type="text" name="name">
		<br>
		<br>
		<label>Color of Page Background : </label>
		<input type="color" name="bgColor">
		<br>
		<br>
		<label>Color of Heading 1 : </label>
		<input type="color" name="colorH1">
		<br>
		<br>
		<label>Alignment of Heading 1</label>
		<select name="alignment" size="1">
			<option disabled selected>-- Choose the Alignment --</option>
			<option value="right">Right</option>
			<option value="center">Center</option>
			<option value="left">Left</option>
			<option value="justify">Justify</option>
		</select>
		<br>
		<br>
		<label>Color of Paragraph : </label>
		<input type="color" name="colorParagraph">
		<br>
		<br>
		<label>Font size of Paragraph : </label>
		<input type="number" name="fontSize">px
		<br>
		<br>	
		<input type="hidden" name="item[]">
		<input type="submit" name="submit">
	</form>
	<?php 
		$theme = array();
		if (isset($_POST['submit'])) {
    		$themeName = $_POST['name'];
			array_push($theme, $themeName );
    		// Mengecek apakah cookie dengan nama tema sudah ada atau tidak
    		if (!isset($_COOKIE[$themeName])) {
        		// Jika belum ada, maka buat cookie baru dengan nama tema
        		setcookie($themeName . '[bgColor]', $_POST['bgColor']);
        		setcookie($themeName . '[headingColor]', $_POST['colorH1']);
        		setcookie($themeName . '[alignment]', $_POST['alignment']);
        		setcookie($themeName . '[colorParagraph]', $_POST['colorParagraph']);
        		setcookie($themeName . '[fontSize]', $_POST['fontSize']);	
    		}
			// setcookie("tema", json_encode($theme), time() + 3600);
			print_r($theme);
		}
		

		
	 ?>
</body>
</html>