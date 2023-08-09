<?php
    session_start();
    require "./mysql_conn.php";

    $bet_name = preg_replace("/[^[:alnum:]_]/","",$_POST["betname"]);
    $bet_number = preg_replace("/[^[:alnum:]_]/","",$_POST["betnumber"]);
    $bet_date = preg_replace("/[^[:alnum:]_]/","",$_POST["betdate"]);
    $bet_hour = preg_replace("/[^[:alnum:]_]/","",$_POST["bethour"]);
    $bet_hash = preg_replace("/[^[:alnum:]_]/","",$_POST["bethash"]);

    $sql = "SELECT number FROM sales WHERE bethash='" . $bet_hash . "'";
    $sql_response = sql_query($sql);
    $sql_rows = mysqli_num_rows($sql_response);

    for($sql_row = 0; $sql_row < $sql_rows; $sql_row++)
    {
        if((int) $bet_number == (int) mysqli_fetch_assoc($sql_response)["number"])
        {
            http_response_code(404);
            return;
        }
    }
    //seleciona as vendas e valor da cota de uma aposta
    $sql = "SELECT sales, value FROM bets WHERE bethash='" . $bet_hash . "'";
    $sql_response = sql_query($sql);
    $bet = mysqli_fetch_assoc($sql_response);

    //atualiza as vendas da aposta
    $sql = "UPDATE bets SET sales = '" . ($bet["sales"] + 1) ."' WHERE bethash='" . $bet_hash . "'";
    sql_query($sql);
    //insere na tabela uma nova venda
    $sql = "INSERT INTO sales VALUES('','" . $bet_number . "','" . $bet_name . "','" . $bet["value"] . "','" . $bet_hash . "','" . $bet_date . "','" . $bet_hour . "','0')";
    sql_query($sql);
    //seleciona os dados do vendedor
    $sql = "SELECT total, gain, gainpercent FROM users WHERE id='" . $_SESSION["userid"] . "'";
    $sql_response = sql_query($sql);
    $user = mysqli_fetch_assoc($sql_response);

    $gain = $user["gainpercent"] * $bet["value"] / 100;
    //atualiza a comissão do vendedor
    $sql = "UPDATE users SET gain = '" . ($gain + $user["gain"]) ."', total = '" . ($bet["value"] + $user["total"]) . "' WHERE id='" . $_SESSION["userid"] . "'";
    sql_query($sql);
    
    http_response_code(200);
?>
