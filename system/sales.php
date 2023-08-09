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
<div class="notification" id="notification">
    <div class="n_icon">
        <img src="./icons/icon-notification.png">
    </div>
    <div class="description">
        <b id="notification_text">Notificação!</b>
    </div>
</div>
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
        <div class="warn" id="warn">
            <img src="./icons/icon-warn.png" class="icon"/>
            <b id="warn_txt">Esta ação não podera ser desfeita <br> Você tem certeza?</b>
            <div class="warn_buttons">
                <button id="warn_cancel">Cancelar</button>
                <button id="warn_confirm">Confirmar</button>
            </div>
        </div>
        <div class="left">
            <div class="l_subtitle">
                <b>NUMERO</b>
                <b>NOME</b>
                <b>APOSTA</b>
                <b>VALOR</b>
                <b>DATA</b>
                <b>HORA</b>
            </div>
            <div class="l_list" id="list"></div>
        </div>
        <div class="right">
            <div class="r_info">
                <span><b>Detalhes sobre suas vendas!</b></span>
                <span><b>Total:</b></span>
                <span class="money"><p>R$</p><b id="salestotal">0,00</b></span>
                <span><b>Suplemento:</b></span>
                <span class="money"><p>R$</p><b id="salessuplement">0,00</b></span>
                <span><b>Sangria:</b></span>
                <span class="money"><p>R$</p><b class="sub" id="salesspent">0,00</b></span>
                <span><b>Comissão:</b></span>
                <span class="money"><p>R$</p><b id="salesgain">0,00</b></span>
                <span><b>Mostrar vendas de:</b></span>
                <button class="r_button" onclick="getListToday()">Hoje</button>
                <button class="r_button" onclick="getListYesterday()">Ontem</button>
                <span><b>Mostrar da data:</b></span>
                <input type="date" class="r_button" id="datepicker">
                <button class="r_button" onclick="getSales()" id="mostrarmais">Mostrar Mais</button>
                <span><b>Fechamento de caixa:</b></span>
                <button class="r_button" id="cashclosing" onclick="cash_closing()">Fechar caixa</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./javascript/system-sales.js"></script>
</body>
</html>