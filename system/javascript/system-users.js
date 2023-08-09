const list = document.getElementById("list");
const bt_edit = document.getElementById("bt_edit");
const bt_delete = document.getElementById("bt_delete");
const bt_reset = document.getElementById("bt_reset");
const bt_new = document.getElementById("bt_new");
const warn = document.getElementById("warn");
const warn_cancel = document.getElementById("warn_cancel");
const warn_confirm = document.getElementById("warn_confirm");

var item_selected;
var item_id;
function onAppStart()
{
    System.Notification("Obtendo dados de usuarios...");
    System.MySQL_read_users(read_users_sucess, read_users_eror);

}
function read_users_sucess(data)
{
    System.HideNotification();
    var users = JSON.parse(data);

    list.innerHTML = "";
    for(var user of users)
    {
        var div = document.createElement("div");
            div.classList.add("l_item");
            div.innerHTML += "<b>" + user.userid + "</b>";
            div.innerHTML += "<b>" + user.usertype + "</b>";
            div.innerHTML += "<b>" + user.username + "</b>";
            div.innerHTML += "<b>" + user.userpercent + "</b>";
            div.innerHTML += "<b>R$" + parseInt(user.usergain) + ",00</b>";
            div.innerHTML += "<b>R$" + user.usertotal + ",00</b>";
            div.id = user.userid;
            div.addEventListener("click", clickItemList);
            list.appendChild(div);
    }
}
function read_users_eror(status_code)
{
    if(status_code == 204) System.Notification("Nenhum usuario encontrado!");
    else if(status_code == 401) 
    {
        System.Notification("Apenas administradores \n podem acessar essa tela!");
        disableButtons();
    }
    else if(status_code == 404) System.Notification("Falha na comunicação!");
    setTimeout(System.HideNotification, 5000);
}
function clickItemList()
{
    enableButtons();
    if(item_selected) item_selected.classList.remove("selected");
    item_selected = this;
    item_id = this.id;
    this.classList.add("selected");
}

function enableButtons()
{
    var e = [bt_edit, bt_reset, bt_delete];
    for(var i in e)
    {
        var t = e[i];
        t.classList.remove("r_button--disabled");
        i < 2 ? t.classList.add("r_button--blue") : t.classList.add("r_button--red");
    }
}
function disableButtons()
{
    var e = [bt_new,bt_delete, bt_edit, bt_reset];
    for(var i in e)
    {
        var t = e[i];
        t.classList.add("r_button--disabled");
        i < 2 ? t.classList.remove("r_button--blue") : t.classList.remove("r_button--red");
        
    }
}

function resetUserData()
{
    if(!item_id) return;
    warn.style.display = "flex";
    warn_confirm.addEventListener("click", reset);

    function reset()
    {
        warn.style.display = "none";
        System.Notification("Conectando...");
        System.MySQL_reset_user("userid=" + item_id, sucess, error);

        function sucess()
        {
            System.Notification("Executado com sucesso!\nAtualizando...");
            System.MySQL_read_users(read_users_sucess, read_users_eror);
            setTimeout(System.HideNotification, 3000);
        }

        function error()
        {
            System.Notification("Ops!, Houve um erro!");
            setTimeout(System.HideNotification, 3000);
        }
    }
}

function deleteUser()
{
    if(!item_id) return;
    warn.style.display = "flex";
    warn_confirm.addEventListener("click", delete_user);

    function delete_user()
    {
        warn.style.display = "none";
        System.Notification("Conectando...");
        System.MySQL_delete_user("userid=" + item_id, sucess, error);

        function sucess()
        {
            System.Notification("Executado com sucesso!\nAtualizando...");
            System.MySQL_read_users(read_users_sucess, read_users_eror);
            setTimeout(System.HideNotification, 3000);
        }

        function error(data)
        {
            System.Notification("Ops!, Houve um erro!");
            setTimeout(System.HideNotification, 3000);
        }
    }
}

bt_delete.addEventListener("click", deleteUser);
bt_reset.addEventListener("click", resetUserData);
warn_cancel.addEventListener("click", function()
{
    warn.style.display = "none";
})
window.onload = onAppStart;