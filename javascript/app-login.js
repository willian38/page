(function()
{
    //variaveis
    const server_login = "./system/php/mysql_login_user.php";
    const http = new XMLHttpRequest();
    const user_login = document.getElementById("login");
    const user_password = document.getElementById("password");
    const send_button = document.getElementById("send-button");
    const errElem = document.getElementById("err");
    const regx = /[^a-z^0-9^A-Z]/g;
    send_button.addEventListener("click", dataPurify);

    //tratando os dados obtidos
    function dataPurify()
    {
        //retirando caracteres especiais
        var login = user_login.value.replace(regx,"");
        var password = user_password.value.replace(regx,"");

        sendRequest(login, password);
    }
    function sendRequest(login, password)
    {
        //enviando post com os dados
        errElem.innerText = "Conectando...";
        http.open("POST", server_login, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("userlogin=" + login + "&userpassword=" + password);
        
        http.onload = function()
        {
            //verificando resposta recebida
            var response = parseInt(this.responseText);
            if(response == 404)
            {
                errElem.innerText = "Login ou Senha invalidos!";
            }
            else if(response == 202)
            {
                errElem.innerText = "Conectado!"
                setTimeout(function(){ location.href = "./system/home.php"; }, 2000);
            }
        }
    }

})();