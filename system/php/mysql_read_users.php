<?php
    session_start();
    require "./mysql_conn.php";

    if($_SESSION["usertype"] == "user")
    {
        http_response_code(404);
        echo 401;
        return;
    }

    $sql = "SELECT * FROM users";
    $sql_query = sql_query($sql);
    $sql_rows = mysqli_num_rows($sql_query);
    $users = array();
    class User
    {
        public $userid;
        public $username;
        public $usertype;
        public $usergain;
        public $userpercent;
        public $usertotal;

        function __construct($userid, $username, $usertype, $usergain, $userpercent, $usertotal)
        {
            $this->userid = $userid;
            $this->username = $username;
            $this->usertype = $usertype;
            $this->usergain = $usergain;
            $this->userpercent = $userpercent;
            $this->usertotal = $usertotal;
        }
    }

    if($sql_rows <= 0)
    {
        http_response_code(404);
        echo 204;
        return;
    }

    for($row = 0; $row < $sql_rows; $row++)
    {
        $user = mysqli_fetch_assoc($sql_query);
        $users[] = new User($user["id"], $user["name"], $user["usertype"], $user["gain"], $user["gainpercent"], $user["total"]); 
    }
    http_response_code(200);
    echo json_encode($users);
?>