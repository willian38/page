<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>PDV - Inicio</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='./css/app-home.css'>
    <script type="text/javascript" src="./javascript/system-api.js"></script>
</head>
<body>
<div class="desktop_sidebar">
    <a class="sidebar_button active">
        <img class="sidebar_button_icon" src="./icons/icon-painel-0.png">
        <b class="sidebar_button_description">INICIO</b>
    </a>
    <a class="sidebar_button" href="./newbet.php">
        <img class="sidebar_button_icon" src="./icons/icon-new-game.png">
        <b class="sidebar_button_description">FAZER APOSTA</b>
    </a>
    <a class="sidebar_button" href="./sales.php">
        <img class="sidebar_button_icon" src="./icons/icon-sell.png">
        <b class="sidebar_button_description">VENDAS</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-relatory.png">
        <b class="sidebar_button_description">RELATORIO</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-suplement.png">
        <b class="sidebar_button_description">ENTRADA/SAIDA</b>
    </a>
    <a class="sidebar_button">
        <img class="sidebar_button_icon" src="./icons/icon-spent.png">
        <b class="sidebar_button_description">SANGRIA</b>
    </a>
    <a class="sidebar_button" href="./users.php">
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
        <div class="content_left">
            <div class="noresult">
                <h1 id="betstatus"></h1>
            </div>
            <b class=" subtitle">Resultados de hoje</b>
            <div class="content_list ">
                <div class="list_hours">
                    <b>Posição</b>
                    <b>11:00</b>
                    <b>14:00</b>
                    <b>16:00</b>
                    <b>18:00</b>
                    <b>21:00</b>
                </div>
                <div class="list_colums">
                    <div class="column">
                        <div class="column_item"><b>1°</b></div>
                        <div class="column_item"><b>2°</b></div>
                        <div class="column_item"><b>3°</b></div>
                        <div class="column_item"><b>4°</b></div>
                        <div class="column_item"><b>5°</b></div>
                    </div>
                    <div class="column">
                        <div class="column_item"><b>0000</b></div>
                        <div class="column_item"><b>0000</b></div>
                        <div class="column_item"><b>0000</b></div>
                        <div class="column_item"><b>0000</b></div>
                        <div class="column_item"><b>0000</b></div>
                    </div>
                    <div class="column">
                        <div class="column_item"><b>0000</b></div>
                        <div class="column_item"><b>0000</b></div>
                        <div class="column_item"><b>0000</b></div>
                        <div class="column_item"><b>0000</b></div>
                        <div class="column_item"><b>0000</b></div>
                    </div>
                    <div class="column">

                    </div>
                    <div class="column">

                    </div>
                    <div class="column">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./javascript/system-home.js"></script>
</body>
</html>