<?php
    session_start();
    require "./mysql_conn.php";
    $date = $_POST["date"];

    $sql = "SELECT date FROM cashclosing WHERE date = " . $date . " AND userid = " . $_SESSION["userid"];
    $sql_query = sql_query($sql);
    $sql_rows = mysqli_num_rows($sql_query);
    if($sql_rows > 0)
    {
        http_response_code(404);
        echo 401;
        return;
    }
    http_response_code(200);
?>