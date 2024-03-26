<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Techshop</title>
        <link rel="stylesheet" href="../Public/css/global/common.css" />
        <link rel="stylesheet" href="../Public/css/pages/internalManager.css" />
        <link
            rel="shortcut icon"
            href="../Public/img/logo/logo.png"
            type="image/x-icon"
        />
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel="stylesheet" href="../Public/css/pages/homeManager.css">
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
                    <div class="search">
                        <label for="">
                            <input type="text" placeholder="Search here">
                            <i class="fi fi-rr-search"></i>
                        </label>
                    </div>
                    <div class="user">
                        <img src="../Public/img/members/lenguyenthehien.png" alt="">
                    </div>
                </div>
                <div class="content-module">
                    
                </div>
            </div>
        </div>  
        <script type="text/javascript">
            var role_id = <?php echo json_encode($_SESSION['role_id']); ?>;
            sessionStorage.setItem('role_id', role_id);
            console.log(sessionStorage.getItem('role_id'));
        </script>
        <script src="../Public/js/InternalManager/main.js"></script>
        <script src="../Public/js/InternalManager/homeManager.js"></script>
    </body>
</html>
