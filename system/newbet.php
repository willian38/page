<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>PDV - Fazer Aposta</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='./css/app-newbet.css'>
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
    <a class="sidebar_button active">
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
            <div class="c_message" id="c_message">
                <img class="icon" src="./icons/select.png">
                <h1 class="c_text">Venda Concluida!</h1>
                <div class="m_buttons">
                    <div class="m_button" id="c_message_close">
                        <div class="anim_efect"></div>
                        <img class="m_icon" src="./icons/icon-cancel-green.png">
                        <b>Fechar</b>
                    </div>
                    <div class="m_button" id="c_message_comp">
                        <div class="anim_efect"></div>
                        <img class="m_icon" src="./icons/icon-comp.png">
                        <b>Comprovante</b>
                    </div>
                </div>
            </div>
            <div class="c_container" id="c_container">
                <div class="c_betlist" id="list">
                    <span class="n_subtitle">
                        <img class="n_icon" src="./icons/icon-cancel-blue.png" id="betlistclose"><b class="c_subtitle" style="text-align: center;">Selecione uma aposta!</b>
                    </span>
                    <div class="c_list" id="betlist"></div>
                </div>
                <div class="c_numbers" id="c_numbers">
                    <span class="n_subtitle">
                        <img class="n_icon" src="./icons/icon-cancel-blue.png" id="numbers_close"><b class="c_subtitle" style="text-align: center;">Selecione um bicho!</b>
                    </span>
                    <div class="c_numbers_line">
                        <div class="c_numbers_item avestrus">
                            <div class="i_number">
                                <b>01</b>
                                <b>01 - 02 - 03 - 04</b>
                            </div>
                        </div>
                        <div class="c_numbers_item aguia">
                            <div class="i_number">
                                <b>02</b>
                                <b>05 - 06 - 07 - 08</b>
                            </div>
                        </div>
                        <div class="c_numbers_item burro">
                            <div class="i_number">
                                <b>03</b>
                                <b>09 - 10 - 11 - 12</b>
                            </div>
                        </div>
                        <div class="c_numbers_item borboleta">
                            <div class="i_number">
                                <b>04</b>
                                <b>13 - 14 - 15 - 16</b>
                            </div>
                        </div>
                        <div class="c_numbers_item cachorro">
                            <div class="i_number">
                                <b>05</b>
                                <b>17 - 18 - 19 - 20</b>
                            </div>
                        </div>
                    </div>
                    <div class="c_numbers_line">
                        <div class="c_numbers_item cabra">
                            <div class="i_number">
                                <b>06</b>
                                <b>21 - 22 - 23 - 24</b>
                            </div>
                        </div>
                        <div class="c_numbers_item carneiro">
                            <div class="i_number">
                                <b>07</b>
                                <b>25 - 26 - 27 - 28</b>
                            </div>
                        </div>
                        <div class="c_numbers_item camelo">
                            <div class="i_number">
                                <b>08</b>
                                <b>29 - 30 - 31 - 32</b>
                            </div>
                        </div>
                        <div class="c_numbers_item cobra">
                            <div class="i_number">
                                <b>09</b>
                                <b>33 - 34 - 35 - 36</b>
                            </div>
                        </div>
                        <div class="c_numbers_item coelho">
                            <div class="i_number">
                                <b>10</b>
                                <b>37 - 38 - 39 - 40</b>
                            </div>
                        </div>
                    </div>
                    <div class="c_numbers_line">
                        <div class="c_numbers_item cavalo">
                            <div class="i_number">
                                <b>11</b>
                                <b>41 - 42 - 43 - 44</b>
                            </div>
                        </div>
                        <div class="c_numbers_item elefante">
                            <div class="i_number">
                                <b>12</b>
                                <b>45 - 46 - 47 - 48</b>
                            </div>
                        </div>
                        <div class="c_numbers_item galo">
                            <div class="i_number">
                                <b>13</b>
                                <b>49 - 50 - 51 - 52</b>
                            </div>
                        </div>
                        <div class="c_numbers_item gato">
                            <div class="i_number">
                                <b>14</b>
                                <b>53 - 54 - 55 - 56</b>
                            </div>
                        </div>
                        <div class="c_numbers_item jacare">
                            <div class="i_number">
                                <b>15</b>
                                <b>57 - 58 - 59 - 60</b>
                            </div>
                        </div>
                    </div>
                    <div class="c_numbers_line">
                        <div class="c_numbers_item leao">
                            <div class="i_number">
                                <b>16</b>
                                <b>61 - 62 - 63 - 64</b>
                            </div>
                        </div>
                        <div class="c_numbers_item macaco">
                            <div class="i_number">
                                <b>17</b>
                                <b>65 - 66 - 67 - 68</b>
                            </div>
                        </div>
                        <div class="c_numbers_item porco">
                            <div class="i_number">
                                <b>18</b>
                                <b>69 - 70 - 71 - 72</b>
                            </div>
                        </div>
                        <div class="c_numbers_item pavao">
                            <div class="i_number">
                                <b>19</b>
                                <b>73 - 74 - 75 - 76</b>
                            </div>
                        </div>
                        <div class="c_numbers_item peru">
                            <div class="i_number">
                                <b>20</b>
                                <b>77 - 78 - 79 - 80</b>
                            </div>
                        </div>
                    </div>
                    <div class="c_numbers_line">
                        <div class="c_numbers_item touro">
                            <div class="i_number">
                                <b>21</b>
                                <b>81 - 82 - 83 - 84</b>
                            </div>
                        </div>
                        <div class="c_numbers_item tigre">
                            <div class="i_number">
                                <b>22</b>
                                <b>85 - 86 - 87 - 88</b>
                            </div>
                        </div>
                        <div class="c_numbers_item urso">
                            <div class="i_number">
                                <b>23</b>
                                <b>89 - 90 - 91 - 92</b>
                            </div>
                        </div>
                        <div class="c_numbers_item veado">
                            <div class="i_number">
                                <b>24</b>
                                <b>93 - 94 - 95 - 96</b>
                            </div>
                        </div>
                        <div class="c_numbers_item vaca">
                            <div class="i_number">
                                <b>25</b>
                                <b>97 - 98 - 99 - 00</b>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="c_warn" id="c_warn"></p>
                <b class="c_subtitle">Nome</b>
                <input class="c_input" autocomplete="false" spellcheck="false" type="text" placeholder="Insira o nome do jogador!" id="c_input_name">
                <b class="c_subtitle">Escolha uma das aposta.</b>
                <input class="c_button" autocomplete="false" spellcheck="false" type="button" value="SELECIONAR" id="c_input_select_bet">
                <b class="c_subtitle">Escolha um bicho.</b>
                <input class="c_button_disabled" autocomplete="false" spellcheck="false" type="button" value="SELECIONAR" id="c_input_select">
                <div class="c_line">
                    <b class="c_subtitle">Valor da cota:</b>
                    <b class="c_subtitle" id="betvalue">R$0,00</b>
                </div>
                <div class="c_line">
                    <b class="c_subtitle">Numero:</b>
                    <b class="c_subtitle" id="betnumber">Vazio!</b>
                </div>
                <div class="c_line">
                    <b class="c_subtitle">Data da aposta:</b>
                    <b class="c_subtitle" id="betdate">00/00/0000</b>
                </div>
                <div class="c_line">
                    <b class="c_subtitle">Hora da aposta:</b>
                    <b class="c_subtitle" id="bethours">00:00</b>
                </div>
                <div class="c_line">
                    <input class="c_button" type="button" value="CANCELAR" id="c_button_cancel">
                    <input class="c_button" type="button" value="CONFIRMAR" id="c_button_confirm">
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./javascript/system-newbet.js"></script>
</body>
</html>