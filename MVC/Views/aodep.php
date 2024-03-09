<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="header-wrapper">
        <div class="header">
            <?php 
                require_once "./MVC/Views/blocks/header.php";
                require_once "./MVC/Views/blocks/navbar.php";
            ?>
        </div>
    </div>
    <div class="main">
        <?php require_once "./MVC/Views/pages/".$data["Page"].".php" ?>
    </div>
    <div class="footer">
        <?php require_once "./MVC/Views/blocks/footer.php" ?>
    </div>
</body>
</html>