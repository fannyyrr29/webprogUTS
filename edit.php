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
</body>
</html>