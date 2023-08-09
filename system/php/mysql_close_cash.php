<?php
    session_start();
    require "./mysql_conn.php";
    $date = $_POST["date"];
    $hour = $_POST["hour"];
    $userid = $_SESSION["userid"];
    $spent = 0;
    $suplement = 0;
    $usergain = 0;
    $usertotal = 0;
    $cash;

    $sql = "SELECT gain, total FROM users WHERE id=" . $userid;
    $sql_query = sql_query($sql);
    $sql_response = mysqli_fetch_assoc($sql_query);

    $usergain = $sql_response["gain"];
    $usertotal = $sql_response["total"];

    $sql = "SELECT value, type FROM money WHERE id=" . $userid;
    $sql_query = sql_query($sql);
    $sql_rows = mysqli_num_rows($sql_query);

    if($sql_rows > 0)
    {
        for($row = 0; $row < $sql_rows; $row++)
        {
            $money = mysqli_fetch_assoc($sql_query);
            if($money["type"] == "1")
            {
                $suplement += $money["value"];
            }
            else
            {
                $spent += $money["value"];
            }
        }
    }

    $sql = "INSERT INTO cashclosing VALUES ('','" . $date . "','" . $hour . "'," . $usertotal . "," . $usergain . "," . $spent . "," . $suplement . "," . $userid . ")";
    sql_query($sql);
    
    http_response_code(200);
?>