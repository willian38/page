const e_username = document.getElementById("username");
const e_betstatus = document.getElementById("betstatus");

//auto start
function onAppEnter()
{
    //ler status da corrida
    System.MySQL_read_bet(read_bet_sucess, read_bet_error);
    
    function read_bet_sucess(data)
    {
        var bets = JSON.parse(data);
        var bets_ready = [];

        for(var bet of bets)
        {
            if(bet.day > 0) bets_ready.push(bet);
        }

        var bets_len = bets_ready.length;
        if(bets_len <= 0) e_betstatus.innerText = "Apostas em andamento!";
    }
    function read_bet_error(status_code)
    {
        if(status_code == 404) e_betstatus.innerText = "Sem jogo no momento!";
        return;
    }
}
window.onload = onAppEnter;