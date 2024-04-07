<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Techshop</title>
        <link rel="stylesheet" href="../Public/css/global/common.css" />
        <link
            rel="shortcut icon"
            href="../Public/img/logo/logo.png"
            type="image/x-icon"
        />
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <?php echo '<link rel="stylesheet" href="../Public/css/pages/Manager/'.$data["Page"].'.css">' ?>
        <link rel="stylesheet" href="../Public/css/pages/Manager/internalManager.css" />
    </head>
    <body>
        <div class="internal-manager">
            <div class="navigation">
                <ul>
                    <li>
                        <div class="logo">
                            <img src="../Public/img/logo/logo.png" alt="">
                            <span class="title">Techshop</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="screen">
                <div class="topbar">
                    <div class="toggle">
                        <i class="fi fi-rr-menu-burger"></i>
                    </div>
                    <div class="title">
                        <?php echo $data["Title"] ?>
                    </div>
                    <div class="user-info role-id-value" id=<?php echo $_SESSION['role_id']; ?> >
                        <div class="user-fullname account-id-value" id=<?php echo $_SESSION['account_id']; ?>></div>
                        <div class="user">
                            <!-- <img src="../Public/img/staffAvatar/lenguyenthehien.png" alt=""> -->
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
                <div class="content-module">
                    <?php require_once "./MVC/Views/pages/Manager/".$data["Page"].".php" ?>
                </div>
            </div>
        </div>  
        <script type="text/javascript">
            var role_id = <?php echo json_encode($_SESSION['role_id']); ?>;
            sessionStorage.setItem('role_id', role_id);
            console.log(sessionStorage.getItem('role_id'));
        </script>
        <?php echo '<script src="../Public/js/Manager/'.$data["Page"].'.js"></script>'?>
        <script src="../Public/js/Manager/main.js"></script>
    </body>
</html>
