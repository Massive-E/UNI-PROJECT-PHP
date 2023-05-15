<?php
//session_destroy();
require_once ('playerClass.php');
session_start();

$Player=  new playerClass();
$Player=  unserialize($_SESSION['player']);

?>

<html>
<style>
    

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
        background-color: <?php echo $Player->getplayerTeam();?>;
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


    :root {
        --grid-cols: 1;
        --grid-rows: 1;
    }

    #container {
        align-content: flex-start;
        display: grid;
        grid-gap: 0em;
        grid-template-rows: repeat(var(--grid-rows), 1fr);
        grid-template-columns: repeat(var(--grid-cols), 1fr);

    }

    .grid-item {
        border: 1px solid #ddd;
        text-align: center;
        background-color: lightskyblue;
    }

    .grid-item:hover {

        background-color: orange;
    }





</style>
<script>

    // sending message here

    let name='';
    let color=''
    function getPlayerInfo(){
        name= document.getElementById('name').innerText;
        color= document.getElementById('color').innerText;
    }


    function Logout(){
        getPlayerInfo();

            let Name = name;

            // sending to DB file
            let DBR = new XMLHttpRequest();

            DBR.onreadystatechange = function () {
                let response = JSON.parse(DBR.response);

                if (response.code === true){
                    document.getElementsByTagName("form")[0].submit();
                }

            }

            DBR.open("GET", "DBlogin.php?" + "userName=" + Name+"&LOGOUT=true");
            DBR.send();
    }



</script>
<body onload="table()">
<div class="head" >
    <div style="float: right">
        <h1 id="name"><?php echo $Player->getPlayerName(); ?></h1>

        <div></div><a href="login.php" onclick="Logout()">Logout</a></div>
    <form hidden action="login.php">
    </form>
</div>
</div>


<a hidden id="color"><?php echo $Player->getPlayerTeam(); ?></a>
<div id="ship"><img src="ship.png" height="16px" width="16px"></div>



<div class="mid" >
    <div id="game">
        <div id="container"> </div>

        <script>

            function setParent(cell) {
                newParent=cell;
                child=document.getElementById('ship');
                newParent.appendChild(child);
            }

            function setToolTip(cell){
                newParent=cell;
                child=document.getElementById('tooltip');
                newParent.appendChild(child);
            }

            const container = document.getElementById("container");

            function makeRows(rows, cols) {
                container.style.setProperty('--grid-rows', rows);
                container.style.setProperty('--grid-cols', cols);
                let count=0;
                rand= Math.floor(Math.random() * 100);
                for (c = 0; c < (rows * cols); c++) {

                    let cell = document.createElement("div");

                    cell.innerText = (c );
                    cell.id= (c);


                    if (c===rand){
                        setParent(cell);
                    }

                    // color updating
                    cell.addEventListener("click", function(){
                        getPlayerInfo();
                        // alert("You have clicked "+cell.id);

                        setParent(cell);

                        let DBR = new XMLHttpRequest();

                        DBR.onreadystatechange = function () {
                            $color=this.response;
                            cell.style.background=$color;
                            document.getElementById('testing').innerText=$color;
                        }

                        DBR.open("GET", "buttonGenerate.php?" + "index=" + cell.id+"&color="+color+"&userName="+name);
                        DBR.send();

                    });

                    cell.addEventListener("mouseover", function (){
                        id = cell.id;
                        let DBR = new XMLHttpRequest();

                        DBR.onreadystatechange = function () {

                            document.getElementById('tooltiptext').innerHTML=this.response;
                        }

                        DBR.open("GET", "tooltip.php?" + "index=" + cell.id);
                        DBR.send();

                        // setToolTip(cell);

                    });

                    container.appendChild(cell).className = "grid-item";
                    count++;
                };
            };
            makeRows(10, 10);




            let count=0;

            setInterval(function(){

                cell = document.getElementById(count);


                let DBRC = new XMLHttpRequest();

                DBRC.onreadystatechange = function () {
                    color=this.response;
                    cell.style.background=color
                }

                DBRC.open("GET", "colorload.php?" + "index="+ count);
                DBRC.send();

                count = count+1;
                if (count===100){ count=0}
            }, 75);




        </script>

    </div>

    <div class="scoreboard">
        <div id="stats"></div>

        <script>
            getPlayerInfo();
            setInterval(function(){
                let DBR = new XMLHttpRequest();

                DBR.onreadystatechange = function () {
                    document.getElementById("stats").innerHTML=this.response;
                }

                DBR.open("GET", "DBstats.php?" + "userName=" + name);
                DBR.send();

            }, 500);
        </script>

    </div>
    <div class="chat">


        <div id="sent" class="sent">
            <script>
                setInterval(function(){

                    getPlayerInfo();
                    let Name = name;

                    // sending to DB file
                    let DBR = new XMLHttpRequest();

                    DBR.onreadystatechange = function () {
                        document.getElementById("sent").innerHTML=this.response;
                    }

                    DBR.open("GET", "DBmessageGet.php?" + "userName=" + Name+"&R=true");
                    DBR.send();

                },1000);
            </script>

        </div>

        <input type="text" id="message">
        <script>

            var wage = document.getElementById("message");
            wage.addEventListener("keydown", function (e) {
                if (e.code === "Enter") {  //checks whether the pressed key is "Enter"
                    let message = document.getElementById('message').value;
                    let Name = name;
                    getPlayerInfo();
                    let Color= color;


                    // sending to DB file
                    let DBR = new XMLHttpRequest();

                    DBR.onreadystatechange = function () {
                        // document.getElementById('testing').innerText=this.responseText;
                    }

                    DBR.open("GET", "DBmessageSend.php?" + "userName=" + Name+ "&color="+ Color+ "&message=" +message+"&S=true");
                    DBR.send();
                    document.getElementById('message').value="";
                }
            });

        </script>
    </div>
</div>
<br>
<br>
<div id="tooltip" class="tooltip"><span class="tooltiptext" id="tooltiptext">bruh</span></div>
</body>

</html>

