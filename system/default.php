<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>PDV - Vendas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='./css/app-sales.css'>
    <script type="text/javascript" src="./javascript/system-api.js"></script>
</head>
<body>
<div class="desktop_sidebar">
    <a class="sidebar_button" href="./home.php">
        <img class="sidebar_button_icon" src="./icons/icon-painel-0.png">
        <b class="sidebar_button_description">INICIO</b>
    </a>
    <a class="sidebar_button" href="./newbet.php">
        <img class="sidebar_button_icon" src="./icons/icon-new-game.png">
        <b class="sidebar_button_description">FAZER APOSTA</b>
    </a>
    <a class="sidebar_button active">
        <img class="sidebar_button_icon" src="./icons/icon-sell.png">
        <b class="sidebar_button_description">VENDAS</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-relatory.png">
        <b class="sidebar_button_description">RELATORIO</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-suplement.png">
        <b class="sidebar_button_description">SUPLEMENTO</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-spent.png">
        <b class="sidebar_button_description">SANGRIA</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-user.png">
        <b class="sidebar_button_description">USUARIOS</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-win.png">
        <b class="sidebar_button_description">RESULTADOS</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-bet.png">
        <b class="sidebar_button_description">APOSTAS</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-config.png">
        <b class="sidebar_button_description">CONFIGURAÇÔES</b>
    </a>
</div>
<div class="desktop_sidebar_margin"></div>
<div class="desktop_content">
    <div class="desktop_content_top">
        <div class="content_top_username">
            <b id="username"> <?php echo $_SESSION["username"]; ?> </b>
        </div>
    </div>
    <div class="desktop_content_bottom">
        
    </div>
</div>

</body>
</html>