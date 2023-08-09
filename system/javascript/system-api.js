(function(root, factory)
{
    if(typeof root === "object" && typeof factory === "function")
    {
        root["System"] = factory();
    }
    else
    {
        console.error("error:" + typeof root + " / " + typeof factory);
    }
})(this, function(){
    //URL do servidor
    const regx = /[^a-z^0-9^A-Z]/g;
    const server_url_nuser = "./php/mysql_write_user.php";
    const server_url_rzuser = "./php/mysql_reset_user.php";
    const server_url_duser = "./php/mysql_delete_user.php";
    const server_url_rusers = "./php/mysql_read_users.php";
    const server_url_ruser = "./php/mysql_read_user.php";
    const server_url_checkclose = "./php/mysql_check_close.php";
    const server_url_nbet = "./php/mysql_write_bet.php";
    const server_url_cash_close = "./php/mysql_close_cash.php";
    const server_url_nsale = "./php/mysql_write_sale.php";
    const server_url_rsalesdate = "./php/mysql_read_salesdate.php";
    const server_url_rbet = "./php/mysql_read_bet.php";
    const server_url_rleft = "./php/mysql_read_leftnumbers.php";
    
    const xhttp = new XMLHttpRequest();

    //estabelece uma conexão HTTP
    function xhttp_connection(url, data, callback, callback_status)
    {
        //verifica se os parametros estão vazios, se estiverem, mostra menssagem de erro
        if(!url || data == undefined)
        {
            console.error("xhttp_connection param undefined!");
            return
        }
        //envia os dados para o servidor, ou apenas recebe
        xhttp.open("POST", url);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(data);
        //verifica os estados da conexão
        xhttp.onreadystatechange = function()
        {
            //verifica status da conexão!
            if(this.status == 200 && this.readyState == 4)
            {
                if(callback) callback(this.responseText);
            }
            else if(this.status == 404 && this.readyState == 4) //chama o callback em caso de erro ou status
            {
                if(callback_status) callback_status(this.responseText);
            }
        }
    }
    function GetASCII(data)
    {
        return data.replace(regx, "");
    }
    function Notification(text)
    {
        var notification = document.getElementById("notification");
        var notification_txt = document.getElementById("notification_text");

        if(!notification)
        {
            console.warn("Notification HTML not found!");
            return;
        }
        notification.style.animationName = "n_show";
        notification.style.display = "flex";
        notification_txt.innerText = text;

        function Hide()
        {
            notification.style.animationName = "n_hide";
            setTimeout(function(){
                notification.style.display = "none";
            },490);
        }
        return Hide;
    }
    function HideNotification()
    {
        var notification = document.getElementById("notification");
        notification.style.animationName = "n_hide";
            setTimeout(function(){
                notification.style.display = "none";
            },490);
    }
    function MySQL_read_users(callback, callback_status){ xhttp_connection(server_url_rusers, 0, callback, callback_status) }
    function MySQL_read_user(callback, callback_status){ xhttp_connection(server_url_ruser, 0, callback, callback_status) }
    function MySQL_read_bet(callback, callback_status){ xhttp_connection(server_url_rbet, 0, callback, callback_status) }
    function MySQL_read_leftnumbers(data, callback, callback_status) { xhttp_connection(server_url_rleft, data, callback, callback_status) }
    function MySQL_read_salesdate(data, callback, callback_status) { xhttp_connection(server_url_rsalesdate, data, callback, callback_status) }
    function MySQL_reset_user(data, callback, callback_status) { xhttp_connection(server_url_rzuser, data, callback, callback_status) }
    function MySQL_delete_user(data, callback, callback_status) { xhttp_connection(server_url_duser, data, callback, callback_status) }
    function MySQL_write_sale(data, callback, callback_status) { xhttp_connection(server_url_nsale, data, callback, callback_status) }
    function MySQL_check_close(data, callback, callback_status) { xhttp_connection(server_url_checkclose, data, callback, callback_status) }
    function MySQL_cash_close(data, callback, callback_status) { xhttp_connection(server_url_cash_close, data, callback, callback_status) }
    
    return {
        xhttp_connection,
        MySQL_read_user,
        MySQL_read_users,
        MySQL_read_bet,
        MySQL_read_leftnumbers,
        MySQL_read_salesdate,
        MySQL_reset_user,
        MySQL_delete_user,
        MySQL_write_sale,
        MySQL_check_close,
        MySQL_cash_close,
        Notification,
        HideNotification,
        GetASCII
    }
});