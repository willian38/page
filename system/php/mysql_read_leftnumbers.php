<?php
    require "./mysql_conn.php";
    $bet_hash = $_POST["bethash"];

    if(empty($bet_hash))
    {
        http_response_code(404);
        return;
    }

    $sql = "SELECT number FROM sales WHERE bethash='" . $bet_hash . "'";
    $sql_query = sql_query($sql);
    $sql_rows = mysqli_num_rows($sql_query);
    $numbers = array();

    for($i = 0; $i < $sql_rows; $i++)
    {
        $numbers[] = (int) mysqli_fetch_assoc($sql_query)["number"];
    }

    http_response_code(200);
    echo json_encode($numbers)
?>
