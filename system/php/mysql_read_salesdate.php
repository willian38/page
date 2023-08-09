<?php

    $date = $_POST["date"];
    $saleid = $_POST["saleid"];

    require "./mysql_conn.php";
    $sql;
    if($saleid == "none")
    {
        $sql = "SELECT id, number, name, value, bethash, date, hour FROM sales WHERE date=" . $date;
    }
    else
    {
        $sql = "SELECT id, number, name, value, bethash, date, hour FROM sales WHERE date=" . $date . " AND id > " . $saleid . " AND id < " . $saleid + 100;
    }
    $sql_query = sql_query($sql);
    $sql_rows = mysqli_num_rows($sql_query);
    $sales = array();

    if($sql_rows <= 0)
    {
        http_response_code(404);
        echo 204;
        return;
    }
    $row = 0;
    if($saleid != "none")
    {
        $row = $saleid;
    }

    for(;$row < $sql_rows; $row++)
    {
        $fet = mysqli_fetch_assoc($sql_query);
        if($fet != null)
        {
            $sales[] = $fet;
        }
    }
    http_response_code(200);
    echo json_encode($sales);
?>