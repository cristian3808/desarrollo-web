<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR COOKIE IDIOMA</title>
</head>
<body>
    <?php
setcookie("selecionidioma", $_GET["idioma"], time()+ 2629750);
header("Location:cookie_idioma.php");
    ?>
</body>
</html>