<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Themes</title>
</head>
<body>
	<form>
		<label>Name of your theme :</label>
		<input type="text" name="name">
		<br>
		<br>
		<label>Color of Page Background : </label>
		<input type="color" name="colorBg">
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
		<input type="submit" name="submit">
	</form>
	<?php 
		if (isset($_POST['submit'])) {
    		$themeName = $_POST['name'];
    		// Mengecek apakah cookie dengan nama tema sudah ada atau tidak
    		if (!isset($_COOKIE[$themeName])) {
        		// Jika belum ada, maka buat cookie baru dengan nama tema
        		setcookie($themeName . '[bgColor]', $_POST['bgColor']);
        		setcookie($themeName . '[headingColor]', $_POST['colorH1']);
        		setcookie($themeName . '[alignment]', $_POST['alignment']);
        		setcookie($themeName . '[colorParagraph]', $_POST['colorParagraph']);
        		setcookie($themeName . '[fontSize]', $_POST['fontSize']);	
    		}else{
				echo "Theme name has already exist!";
			}
		}
		foreach ($_COOKIE as $key => $value) {
			# code...
			echo $key;
		}
	 ?>
</body>
</html>