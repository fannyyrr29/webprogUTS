<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $themeName = $_POST['nameEdit'];
    $oldTheme = $_POST['oldThemes'];

    setcookie("submit", "", time()-3600);
	setcookie('theme_' . $oldTheme, "", time()-3600);
	setcookie($oldTheme .'_bgColor', "", time()-3600);
	setcookie($oldTheme .'_headingColor', "", time()-3600);
	setcookie($oldTheme .'_alignment', "", time()-3600);
	setcookie($oldTheme .'_colorParagraph',"", time()-3600);
	setcookie($oldTheme . '_fontSize', "", time()-3600);

    // Updating the cookies in the browser
    setcookie("submit", "submit", time()+3600);
    setcookie('theme_' . $themeName, $themeName, time()+3600);  
    setcookie($themeName . '_bgColor', $_POST['bgColorEdit'], time() + 3600);
    setcookie($themeName . '_headingColor', $_POST['colorH1Edit'], time() + 3600);
    setcookie($themeName . '_alignment', $_POST['alignmentEdit'], time() + 3600);
    setcookie($themeName . '_colorParagraph', $_POST['colorParagraphEdit'], time() + 3600);
    setcookie($themeName . '_fontSize', $_POST['fontSizeEdit'], time() + 3600);

    $bgColor = $_POST['bgColorEdit'];
    $headingColor = $_POST['colorH1Edit'];
    $alignment = $_POST['alignmentEdit'];
    $paragraphColor = $_POST['colorParagraphEdit'];
    $fontSize = $_POST['fontSizeEdit'];

}
//mendapatkan tema yang dikirimkan oleh index.php
if (isset($_GET['themes']) ? $_GET['themes'] : '') {
    # code...
    $themeName = isset($_GET['themes']) ? $_GET['themes'] : (isset($_POST['themes']) ? $_POST['themes'] : '');
    $bgColor = isset($_COOKIE[$themeName . '_bgColor']) ? $_COOKIE[$themeName . '_bgColor'] : '#FFFFFF';
    $headingColor = isset($_COOKIE[$themeName . '_headingColor']) ? $_COOKIE[$themeName . '_headingColor'] : '#000000';
    $paragraphColor = isset($_COOKIE[$themeName . '_colorParagraph']) ? $_COOKIE[$themeName . '_colorParagraph'] : '#000000';
    $alignment = isset($_COOKIE[$themeName . '_alignment']) ? $_COOKIE[$themeName . '_alignment'] : 'left';
    $fontSize = isset($_COOKIE[$themeName . '_fontSize']) ? $_COOKIE[$themeName . '_fontSize'] : '12';

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Themes</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            height: 100vh;
            width: 100vw;
        }
        .container {
            height: 100vh;
            position: relative;
        }
        .form {
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%, -50%);
            background-color: <?php echo $bgColor; ?>;
            padding: 10px;
            border-radius: 10px;
        }
        label, a {
            color: <?php echo $paragraphColor; ?>;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form">
            <h1 style="color:<?php echo $headingColor; ?>;">Edit Theme</h1>
            <form method="post" action="edit.php">
                <label>Name of your theme :</label>
                <input type="text" name="nameEdit" value="<?php echo $themeName; ?>">
                <br>
                <br>
                <label>Color of Page Background : </label>
                <input type="color" name="bgColorEdit" value="<?php echo $bgColor; ?>">
                <br>
                <br>
                <label>Color of Heading 1 : </label>
                <input type="color" name="colorH1Edit" value="<?php echo $headingColor; ?>">
                <br>
                <br>
                <label>Alignment of Heading 1</label>
                <select name="alignmentEdit" size="1">
                    <option value="right" <?php echo ($alignment == 'right' ? 'selected' : ''); ?>>Right</option>
                    <option value="center" <?php echo ($alignment == 'center' ? 'selected' : ''); ?>>Center</option>
                    <option value="left" <?php echo ($alignment == 'left' ? 'selected' : ''); ?>>Left</option>
                    <option value="justify" <?php echo ($alignment == 'justify' ? 'selected' : ''); ?>>Justify</option>
                </select>
                <br>
                <br>
                <label>Color of Paragraph : </label>
                <input type="color" name="colorParagraphEdit" value="<?php echo $paragraphColor; ?>">
                <br>
                <br>
                <label>Font size of Paragraph : </label>
                <input type="number" name="fontSizeEdit" value="<?php echo $fontSize; ?>">px
                <br>
                <br>
                <input type="hidden" name="oldThemes" value="<?php echo htmlspecialchars($themeName); ?>">
                <input type="submit" name="submit" value="Save Changes">
                <a href="index.php">Return to HOME PAGE</a>
            </form>
        </div>
    </div>
</body>

</html>
