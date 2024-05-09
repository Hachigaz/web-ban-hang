<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Techshop</title>
        <meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate" />
        <link rel="stylesheet" href="../Public/css/components/header.css">
        <link rel="stylesheet" href="../Public/css/global/common.css">
        <link rel="stylesheet" href="../Public/css/Shopcart/Shopcart.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <?php require_once "./MVC/Views/blocks/header.php" ?>
        <div class="all">
                <div class="header">
                    Lịch sử đơn hàng
                </div>
                <div>
                    <table>
                        <tbody>

                        </tbody>
                    </table>
                </div>
        </div>

 
        <?php require_once "./MVC/Views/pages/".$data["Page"].".php" ?>
    </body>
        <script src="../Public/scripts/OrderHistory/script.js"> </script>
</html>
