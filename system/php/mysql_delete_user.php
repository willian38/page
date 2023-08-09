<?php
    require "./mysql_conn.php";

    $userid = $_POST["userid"];

    $sql = "DELETE FROM users WHERE id=" . $userid;
    $sql_query = sql_query($sql);

    http_response_code(200);
?>