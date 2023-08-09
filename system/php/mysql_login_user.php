<?php
    session_start();
    require "./mysql_conn.php";

    $user_login = preg_replace("/[^[:alnum:]_]/","",$_POST["userlogin"]);
    $user_password = preg_replace("/[^[:alnum:]_]/","",$_POST["userpassword"]);
    $user_password_md5 = md5($user_password);
    $sql = "SELECT id, name, password, usertype, gain, gainpercent, total FROM users WHERE name = '" . $user_login . "' AND password = '" . $user_password_md5 . "'";
    $sql_response = sql_query($sql);
    //verifica o tamanho das linhas, se houver alguma ocorrencia, continua
    if(mysqli_num_rows($sql_response) > 0)
    {
        $user = mysqli_fetch_assoc($sql_response);
        //salva os dados em uma sessão!
        echo 202;
        $_SESSION["userid"] = $user["id"];
        $_SESSION["usertype"] = $user["usertype"];
        $_SESSION["username"] = $user["name"];
    }
    else
    {
        http_response_code(404);
        echo 404;
    }
?>