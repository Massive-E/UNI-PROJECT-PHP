

<html>
<style>

    button:hover{
        background: purple;
    }

    body{
        display: flex;
        flex-direction: column;
        padding: 0.5%;
    }

    .head{
        width: 96%;
    }

    h1{
        float: right;
    }

    .mid{
        display: flex;
        float: bottom;
        flex-direction: row;
        height: 55%;
        margin-top: 1%;
    }

    #game {
        background-color: lightskyblue;
        width: 50%;
        border-style: solid;
    }
    .chat, .scoreboard{
        display: flex;
        margin-left: 1%;
        width: 20%;
        border-style: solid;
        padding: 1%;
        flex-direction: column;

    }
    .chat {
    }

    .Sent{
        justify-content: flex-start;
        height: 80%;
    }
    input{
        justify-content: flex-end;
    }

    button{
        width: 10%;
        height: 10%;
        background-color: transparent;
        border-style: solid;
        border-color: black;
        border-width: 1px;
        color: transparent;

    }

    #t{
        width: 10%;
        height: 10%;
        border-style: solid;
    }



</style>
<script>

    function sendMessage(){
        var wage = document.getElementById("wage");
        wage.addEventListener("keydown", function (e) {
            if (e.code === "Enter") {  //checks whether the pressed key is "Enter"
                validate();
            }
        });

        // sending message here
        function validate() {
            var send = new XMLHttpRequest();
            var text = "breh="+document.getElementById('message').value;
            var url ='bkCHAT.php';
            send.open("POST", url, true);
            send.send(text);

        }

    }
    function bruh(val){
        let temp= document.getElementById('noshow').innerHTML
        window.alert("FUCK YOU DUMBASS DELUSIONS OF GRANDEUR RETARD "+val +" ");

        let pass = "t"+val;
        let save = document.getElementById(val);
        save.style.background="orange";

    }

    function hovering(val){
        let col= val%10;
        let row= Math.floor (val/10);

        document.getElementById('position').innerText="[ "+col+" , "+row+" ]";
    }
    function table (){
        let table= document.getElementById('game');
        document.getElementById('game').innerHTML="";
        let sum =0;
        for (let x=0; x<10; x++){
            sum=x*10;
            let IT="";
            let c = document.createElement("div")
            c.setAttribute("class", 'row');
            for (let y=0; y<10; y++){
                let col="<td id='t"+(sum+y)+"'><button id="+ (sum+y)+" onclick='bruh("+ (sum+y) + ")' onmouseover='hovering("+(sum+y)+")'>_</button></td>";
                IT+=col;
            }
            c.innerHTML = IT;
            table.append(c);
        }
    }

</script>
<body onload="table()">
<div class="head" >
    <div style="float: right">
        <h1 id="name">Name</h1>
        <div></div><a href="../LOGINDOGSHIT.php" onclick="">Logout</a></div>
</div>
</div>

<a id='noshow' style="display: none">json_encode($CurrentPlayer)</a>

<a id='testing'> what</a>

<div class="mid" >
    <div id="game">
        <!--        this is the game section-->
    </div>

    <div class="scoreboard">
        Your Position: <a id="position">none </a>
        <div class = "leaderboard">
            <h4>Leader Board</h4>
            Team Red : <a id="RedCell"> 0</a> <br>
            Team Green :<a id="GreenCell"> 0</a> <br>
            Team Yellow :<a id="YellowCell"> 0</a> <br>
            Remaining Cells :<a id="remaining"> 99 </a> <br>
        </div>


        <div class="players">
            <h4>Players online</h4>
            Team Red : <a id="RedCount"> 0</a> <br>
            Team Green :<a id="GreenCount"> 0</a> <br>
            Team Yellow :<a id="YellowCount"> 0</a> <br>

        </div>

    </div>
    <div class="chat">
        this is the chat section
        <div class="Sent">

        </div>
        <input type="text" id="message" value="">
    </div>
</div>

</body>

</html>
