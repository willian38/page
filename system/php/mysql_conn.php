<?php
    require "./mysql_acess.php";
    //estabelece conexão com MySQL
    $mysqli_connection = mysqli_connect($mysql_url, $mysql_user, $mysql_password, $mysql_dbname);
    if(mysqli_connect_errno()) die("MySQL Connection Err:" . mysqli_connect_error());
    //LIB
    function sql_query($sql_query)
    {
        global $mysqli_connection;
        //armazena o valor da query
        $query_result =  mysqli_query($mysqli_connection,$sql_query);
        //verifica se é valida ou contem algo, caso contrario retorna false
        if(empty($query_result))
        {
            return false;
        }
        //retorna o valor obtiddo na query
        return $query_result;
    }
?>