const e_username = document.getElementById("username");//
const e_container = document.getElementById("c_container");//
const e_animal_buttons = document.getElementById("c_numbers");//
const e_animal_buttons_select = document.getElementById("c_input_select");//
const e_animal_buttons_close = document.getElementById("numbers_close");//
const e_input_name = document.getElementById("c_input_name");//
const e_animal_buttons_container = document.getElementById("c_input_select");//
const e_button_confirm = document.getElementById("c_button_confirm");//
const e_button_cancel = document.getElementById("c_button_cancel");//
const e_betnumber = document.getElementById("betnumber");//
const e_betvalue = document.getElementById("betvalue");//
const e_betdate = document.getElementById("betdate");//
const e_bethours = document.getElementById("bethours");//
const e_warn = document.getElementById("c_warn");//
const e_message = document.getElementById("c_message");//
const e_message_close = document.getElementById("c_message_close");//
const e_betbutton = document.getElementById("c_input_select_bet");//
const e_betlist = document.getElementById("betlist");//
const e_list = document.getElementById("list");//
const e_betlist_close = document.getElementById("betlistclose");//
const e_animal_buttons_backup = [];
const date = new Date();
const number_animals = ["Avestruz","Águia","Burro","Borboleta","Cachorro","Cabra","Carneiro","Camelo","Cobra","Coelho","Cavalo","Elefante","Galo","Gato","Jacaré","Leão","Macaco","Porco","Pavão","Peru","Touro","Tigre","Urso","Veado","Vaca"];

var betnumber;
var bethash;
var betdate;
var bethour;
var betid;

//auto start
function onAppEnter()
{
    var gday = date.getDate();
    var gmonth = date.getMonth() + 1;
    var gyear = date.getFullYear();
    var ghour = date.getHours();
    var gmin = date.getMinutes();
    var fday = gday < 10 ? "0" + gday : gday;
    var fmont = gmonth < 10 ? "0" + gmonth : gmonth;
    var fhour = ghour < 10 ? "0" + ghour : ghour;
    var fmin = gmin < 10 ? "0" + gmin : gmin;

    betdate = fday + "/" + fmont + "/" + gyear;
    bethour = fhour + ":" + fmin;

    e_betdate.innerText = betdate;
    e_bethours.innerText = bethour;

    System.MySQL_read_user(login_on,login_off);

    function login_on()
    {
        System.MySQL_read_user(login_on,login_off);
        System.MySQL_check_close("date=" + fday + fmont + gyear, unlocked, locked);

        function unlocked()
        {
            e_betbutton.addEventListener("click", open_betlist);
            e_animal_buttons_select.addEventListener("click", open_numberslist);
            e_betlist_close.addEventListener("click", close_betlist);
            e_animal_buttons_close.addEventListener("click", close_animal_buttonslist);
            e_message_close.addEventListener("click", closeMessageSell);
            e_button_cancel.addEventListener("click", clickCancel);
            e_button_confirm.addEventListener("click", clickConfirm);
        }
        function locked()
        {
            System.Notification("Caixa fechado!\nVolte amanhã!");
            e_betbutton.classList.add("c_button_disabled");
            e_betbutton.classList.remove("c_button");
            return;
        }
    }
    function login_off()
    {
        e_betbutton.classList.add("c_button_disabled");
        e_betbutton.classList.remove("c_button");
        e_username.innerText = "Faça login para continuar!!!";
        
        System.Notification("Faça login para continuar!\n Redirecionando em 5 segundo.");
        setTimeout(function(){
            location.href = "../login-adm.html";
        },5000);
    }
}
//clicks


function open_betlist() { 
    
    var HideNotification = System.Notification("Obtendo lista de apostas...");
    System.MySQL_read_bet(read_bet_sucess, read_bet_error);
    function read_bet_sucess(data)
    {
        HideNotification();
        e_betlist.innerHTML = "";
        var bets = JSON.parse(data);
        for(var bet of bets)
        {
            var e_span = document.createElement("span");
            e_span.classList.add("c_item_list");
            e_span.innerHTML += "<b>" + bet.id + "</b>";
            e_span.innerHTML += "<b>Numeros restantes: " + (25 - bet.sales) + "</b>";
            e_span.innerHTML += "<b>Cota: R$" + bet.value + ",00!</b>";
            e_span.innerHTML += "<b>" + bet.days + " Dias</b>";
            e_span.hash = bet.bethash;
            e_span.number = bet.id;
            e_span.value = bet.value;
            e_span.addEventListener("click", selectBet)
            e_betlist.appendChild(e_span);
        }
        e_list.style.display = "flex"; 
    }
    function read_bet_error(status_code)
    {
        e_warn.innerText = "Não há jogos disponiveis no momento!";
        return;
    } 
}
function open_numberslist () { if(bethash) e_animal_buttons.style.display = "flex"; };
function close_betlist() { e_list.style.display = "none"; }
function close_animal_buttonslist() { e_animal_buttons.style.display = "none" };
function closeMessageSell() {
    var time = 0.5;
    e_message.style.animationName = "c_messg_hide";
    e_message.style.animationDuration = time + "s";

    setTimeout(function()
    {
        e_message.style.display = "none";
        e_container.style.display = "flex"; 

    }, (time) * 1000);

}
function clickCancel() { location.href = location.href };
function clickConfirm()
{
    var HideNotification = System.Notification("Conectando...");
    var name = System.GetASCII(e_input_name.value);
    
    if(name == "" || name == " " || !name)
    {
        e_warn.innerText = "Insira um nome!";
        return;
    }
    else if(!bethash)
    {
        e_warn.innerText = "Selecione uma das apostas!";
        return;
    }
    else if(!betnumber)
    {
        e_warn.innerText = "Selecione um numero/bicho!";
        return;
    }

    System.MySQL_write_sale("betname=" + name + "&betnumber=" + betnumber + "&betdate=" + betdate + "&bethour=" + bethour + "&bethash=" + bethash, write_sale_sucess, write_sale_error);
    
    function write_sale_sucess()
    {
        e_warn.innerText = "";
        e_message.style.animationName = "c_messg";
        e_message.style.animationDuration = "2.5s";
        e_container.style.display = "none";
        e_message.style.display = "flex";
        e_betbutton.innerText = "SELECIONE"
        HideNotification();
        numbersLeftUpdate();
        return;
    }
    function write_sale_error()
    {
        HideNotification = System.Notification("O Número selecionado já foi vendido!");
        setTimeout(HideNotification, 2000);
        return;
    }
}

function selectBet()
{
    bethash = this.hash;
    e_animal_buttons_container.classList.remove("c_button_disabled");
    e_animal_buttons_container.classList.add("c_button");
    e_betbutton.value = "APOSTA NÚMERO: " + this.number;
    e_list.style.display = "none";
    e_betvalue.innerText = "R$" + this.value;

    numbersLeftUpdate();
}
function numbersLeftUpdate()
{
    e_betnumber.innerText = "Vazio!";
    betnumber = null;

    System.MySQL_read_leftnumbers("bethash=" + bethash, read_numbers_sucess)
    
    function read_numbers_sucess(response)
    {
        var numbers = JSON.parse(response);
        var buttons_animal = document.querySelectorAll(".c_numbers_item");
        for(var button_index = 0; button_index < buttons_animal.length; button_index++)
        {
            var button = buttons_animal[button_index];
            if(e_animal_buttons_backup.length < 25) e_animal_buttons_backup.push(button.innerHTML);
            var on = true;
            for(var number of numbers)
            {
                if(number == button_index + 1)
                {
                    button.innerHTML = "<div class='i_number disabled'><b>Vendido!</b></div>";
                    on = false;
                }
            }
            if(on)
            {
                button.innerHTML = e_animal_buttons_backup[button_index];
                button.number = button_index;
                button.addEventListener("click", animalButtonClick);
            }            
        }
    }
}

function animalButtonClick()
{
    betnumber = this.number + 1;
    betn = number_animals[this.number] + " - " + (this.number + 1);
    e_betnumber.innerText = betn;
    e_animal_buttons.style.display = "none";
}
//selecao dos bichos
window.onload = onAppEnter;