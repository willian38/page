<?php
    session_start();
    require "./mysql_conn.php";
    
    if($_SESSION["usertype"] == "user")
    {
        http_response_code(401);
        return;
    }
    //Recebe os dados do usuario pelo sistema e os trata
    $user_login = preg_replace("/[^[:alnum:]_]/","",$_POST["userlogin"]);
    $user_type = preg_replace("/[^[:alnum:]_]/","",$_POST["usertype"]);
    $user_password = preg_replace("/[^[:alnum:]_]/","",$_POST["userpassword"]);
    $user_gain_percent = preg_replace("/[^[:alnum:]_]/","",$_POST["usergainpercent"]);
    //criptografando a senha
    $user_password_md5 = md5($user_password);
    //verifica se os dados não estão vazios
    if(empty($user_login) || empty($user_password) || empty($user_type) || empty($user_gain_percent))
    {
        echo 404; //codigo de erro para o sistema
        return;
    }
    //verifica se a senha tem o tamanho minimo de 4 caracteres
    if(strlen($user_password) < 4)
    {
        echo 411; //codigo de erro de tamanho requerido
        return;
    }
    //SQL para inserir os dados do novo usuario
    $sql = "INSERT INTO users VALUES ('', '". $user_type ."','" . $user_login . "','" . $user_password_md5  . "','" . $user_gain_percent . "',0,0)";
    //Inserindo os dados na tabela
    sql_query($sql);
    //retornando codigo de sucesso
    echo 201;

    return;
?>