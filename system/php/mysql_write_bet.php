<?php
    require "./mysql_conn.php";
    //recebe os dados da nova temporada
    $random_number = rand(100,999);
    $bet_days = preg_replace("/[^[:alnum:]_]/","",$_POST["betdays"]);
    $bet_value = htmlspecialchars($_POST["betvalue"]);
    $bet_awards = $_POST["betawards"];
    $bet_hash = md5($bet_days . $random_number);
    //verifica se não está vazio
    if(empty($bet_days) || empty($bet_awards) || empty($bet_value))
    {
        echo 404;
        return;
    }
    //sql para criar nova temporada
    $sql = "INSERT INTO bets VALUES ('',0,'" . $bet_days . "','" . $bet_awards . "','" . $bet_hash. "','" . $bet_value . "',0)";
    //coloca na tabela
    sql_query($sql);
    echo 201; //retorna codigo de sucesso
?>