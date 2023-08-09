const list = document.getElementById("list");
const number_animals = ["Avestruz","Águia","Burro","Borboleta","Cachorro","Cabra","Carneiro","Camelo","Cobra","Coelho","Cavalo","Elefante","Galo","Gato","Jacaré","Leão","Macaco","Porco","Pavão","Peru","Touro","Tigre","Urso","Veado","Vaca"];
const regxdate = /(\d{2})(\d{2})(\d{4})/gi;
const regxhour = /(\d{2})(\d{2})/gi;
const bt_cashclosing = document.getElementById("cashclosing");
const salesgain = document.getElementById("salesgain");
const salesspent = document.getElementById("salesspent");
const salessuplement = document.getElementById("salessuplement");
const salestotal = document.getElementById("salestotal");
const datepicker = document.getElementById("datepicker")
const mostrarmais = document.getElementById("mostrarmais");
const warn = document.getElementById("warn");
const warn_confirm = document.getElementById("warn_confirm");
const warn_cancel = document.getElementById("warn_cancel");
const warn_txt = document.getElementById("warn_txt");
var lastsale = "none";
var lastdate = "";
var reset = "Yesterday";
//auto start
function onAppEnter()
{
    getListToday();
}
function getDateToday()
{
    var date = new Date();
    var day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
    var month = date.getMonth() < 10 ? "0" + (date.getMonth() + 1) : (date.getMonth() + 1);
    var year = date.getFullYear() < 10 ? "0" + date.getFullYear() : date.getFullYear();
    lastdate = day + month + year;
}
function getListToday()
{
    if(reset == "Yesterday" || reset == "Date")
    {
        lastsale = "none";
        reset = "Today";
        list.innerHTML = "";
        mostrarmais.style.display = "none";
    }

    getDateToday();
    System.Notification("Conectando...");
    System.MySQL_read_user(read_user_sucess, read_user_error);
    function read_user_sucess(data)
    {
        var json = JSON.parse(data);
        salestotal.innerText = json.usertotal;
        salesgain.innerText = json.usergain;
        System.MySQL_check_close("date=" + lastdate, unlocked, closed);
    }
    function read_user_error(data)
    {
        System.Notification("Faça login para continuar!\n Redirecionando em 5 segundo.");
        bt_cashclosing.disabled = true;
        bt_cashclosing.classList.add("disabled");
        datepicker.disabled = "true";
        datepicker.classList.add("disabled")
        document.getElementById("username").innerText = "Faça login para continuar!!!";
        setTimeout(function(){
            location.href = "../login-adm.html";
        },5000);
        return;
    }

    function unlocked()
    {
        System.Notification("Obtendo vendas de hoje...");
        getSales();
    }
    function closed(data)
    {
        if(data == 401)
        {
            System.Notification("Caixa fechado! \n Volte amanhã!");
            bt_cashclosing.disabled = true;
            bt_cashclosing.classList.add("disabled");
            datepicker.disabled = "true";
            datepicker.classList.add("disabled");
            setTimeout(System.HideNotification, 3000);
        }
    }
}

function getListYesterday()
{
    if(reset == "Today" || reset == "Date")
    {
        lastsale = "none";
        reset = "Yesterday";
        list.innerHTML = "";
        mostrarmais.style.display = "none";
    }
    System.Notification("Obtendo vendas de ontem...");
    var ndate = new Date();
    var date = new Date(ndate.setDate(ndate.getDate() - 1));
    var day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
    var month = date.getMonth() < 10 ? "0" + (date.getMonth() + 1) : (date.getMonth() + 1);
    var year = date.getFullYear() < 10 ? "0" + date.getFullYear() : date.getFullYear();
    lastdate = day + month + year;

    getSales();
}
function getListByDate()
{
    if(reset == "Today" || reset == "Yesterday" || lastdate !== format)
    {
        var value = this.value.split("-");
        var reverse = value.reverse();
        var format = "";

        for(var d of reverse)
        {
            format += d;
        }
        lastsale = "none";
        reset = "Date";
        lastdate = format;
        list.innerHTML = "";
        mostrarmais.style.display = "block";
    }
    getSales();
}
function getSales()
{
    System.Notification("Obtendo vendas...");
    System.MySQL_read_salesdate("date=" + lastdate + "&saleid=" + lastsale, read_sales_sucess, read_sales_error);
}
function read_sales_sucess(data)
{
    var json = JSON.parse(data);

    for(var item of json)
    {
        var d = item.date.replace(regxdate, "$1/$2/$3");
        var h = item.hour.replace(regxhour, "$1:$2");
        var div = document.createElement("div");
        div.classList.add("l_item");
        div.innerHTML += "<b>" + item.id + "</b>";
        div.innerHTML += "<b>" + item.name + "</b>";
        div.innerHTML += "<b>" + item.number + " - " + number_animals[parseInt(item.number)-1] + "</b>";
        div.innerHTML += "<b>R$" + item.value + ",00</b>";
        div.innerHTML += "<b>" + d + "</b>";
        div.innerHTML += "<b>" + h + "</b>";
        div.innerHTML += "<img class='icon' src='./icons/icon-comp-gray.png'/>";
        list.appendChild(div);
    }
    lastsale = json[json.length-1].id;
    System.HideNotification();
}
function read_sales_error()
{
    System.Notification("Somente isto!\n ou nada para mostrar!!");
    setTimeout(System.HideNotification, 2000);
}
function cash_closing()
{
    var date = new Date();
    var ghour = date.getHours();
    var gmin = date.getMinutes();
    var fhour = ghour < 10 ? "0" + ghour : ghour;
    var fmin = gmin < 10 ? "0" + gmin : gmin;
    getDateToday();

    warn_cancel.addEventListener("click",function()
    {
        warn.style.display = "none";
    })
    warn_confirm.addEventListener("click",function()
    {
        System.Notification("Conectando...");
        System.MySQL_cash_close("date=" + lastdate + "&hour=" + fhour + fmin, closing_sucess, closing_error);

        warn.style.display = "none";
        function closing_sucess()
        {
            bt_cashclosing.disabled = true;
            bt_cashclosing.classList.add("disabled");
            System.Notification("Caixa fechado com sucesso! \n Até amanhã!");
            setTimeout(System.HideNotification, 3000);
        }
        function closing_error()
        {
            System.Notification("Ops!, Houve algum problema!");
            setTimeout(System.HideNotification, 3000);
        }
    })
    warn.style.display = "flex";
    warn_txt.innerText = "Após o fechamento deste caixa, não poderá fazer vendas e outras operações hoje!\n Você tem certeza?";
}
datepicker.addEventListener("change", getListByDate);
window.onload = onAppEnter;