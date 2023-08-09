<?php
    require "./mysql_conn.php";

    $userid = $_POST["userid"];

    $sql = "UPDATE users SET gain = 0, total = 0 WHERE id = ". $userid;
    $sql_query = sql_query($sql);

    http_response_code(200);

?>