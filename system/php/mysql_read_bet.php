<?php
    require "./mysql_conn.php";

    $sql = "SELECT id, day, days, awards, bethash, value, sales FROM bets WHERE day <= 0";
    $sql_response = sql_query($sql);
    $sql_rows = mysqli_num_rows($sql_response);
    
    $bets = array();

    if($sql_rows <= 0)
    {
        http_response_code(404);
        return;
    }

    for($sql_row = 0; $sql_row < $sql_rows; $sql_row++)
    {
        $bets[] = mysqli_fetch_assoc($sql_response);
    }
    
    http_response_code(200);
    echo json_encode($bets);
?>