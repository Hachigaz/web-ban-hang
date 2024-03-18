<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Master</title>
        <meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate" />
        <link rel="stylesheet" href="../Public/css/components/header.css">
        <link rel="stylesheet" href="../Public/css/global/common.css">
        <script src="../Public/js/test.js"></script>
    </head>
    <body>
        <?php require_once "./MVC/Views/blocks/header.php" ?>
        <?php require_once "./MVC/Views/pages/".$data["Page"].".php" ?>
        <?php require_once "./MVC/Views/blocks/footer.php" ?>
    </body>
</html>
