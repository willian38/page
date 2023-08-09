<?php
    session_start();

    require "./mysql_conn.php";
    
    if(empty($_SESSION["userid"]))
    {
        http_response_code(404);
        echo 404;
        return;
    }

    $sql = "SELECT gain, total, gainpercent FROM users WHERE id = " . $_SESSION["userid"];
    $sql_query = sql_query($sql);
    $user = mysqli_fetch_assoc($sql_query);

    class Userdata {
        public $usergain;
        public $usertotal;
        public $userpercent;
        function __construct()
        {
            global $user;
            $this->usergain = $user["gain"];
            $this->usertotal = $user["total"];
            $this->userpercent = $user["gainpercent"];
        }
    }
    http_response_code(200);
    $userdata = new Userdata();
    $json = json_encode($userdata);
    print_r($json);
?>