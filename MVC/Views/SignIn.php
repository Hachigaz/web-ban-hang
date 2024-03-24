<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master</title>
    
    <link rel="stylesheet" href="../Public/css/globals/globals.css">
    <link rel="stylesheet" href="../Public/css/globals/components.css"> 
    <script src="../Public/scripts/components/globals.js"></script>
</head>
<body>
    <div class="main">
        <div id="notifications-wrapper">
            <div class="overlay-notification-wrapper" style="display:none">
                <div class="notification-overlay">
            
                </div>
                <div id="text-message-notification" class="notification-container">
                    <div class="notification-text">
                        Error
                    </div>
                </div>
                <div id="text-image-notification" class="notification-container">
                    <div class="notification-text">
                        
                    </div>
                </div>
            </div>
            <div class="slider-notification-wrapper" style="display:none">
                <div class="notification-box">
                    <div class="notification-header">
                        <div class="exit-button no-user-select" onclick="closeSliderDialog(this.parentElement.parentElement.parentElement)">
                            Đóng
                        </div>
                    </div>
                    <div class="notification-info">
                        <div class="notification-message">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once "./MVC/Views/pages/".$data["Page"].".php" ?>
    </div>
</body>
</html>