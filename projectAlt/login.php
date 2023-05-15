<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<script>

    function CheckUser() { // sends request to Loginhandler.php to confirm username availability. LoginHandler.php responds true on insertion, false on username already taken

        let Name = document.getElementById("name").value;
        let Pass = document.getElementById("pass").value;
        let Team ="";
        let error = false;

        // sending to DB file
        let DBR = new XMLHttpRequest();

        DBR.onreadystatechange = function () {

            let response = JSON.parse(DBR.response);

            if (response.code === true){

                document.getElementById("color").value = response.team;

                document.getElementsByTagName("form")[0].submit();
            }

            else {

                if (!error) {
                    document.getElementById("name").value = "error";
                    error = true;
                }
            }

        }

        DBR.open("GET", "DBlogin.php?" + "userName=" + Name + "&password=" + Pass + "&team=" + Team+"&LOGIN=true");
        DBR.send();
    }

</script>


<h1>Login </h1>

<form action="game.php" method="post">

    <a>Username</a><input type="text" id = "name" placeholder="Enter Name" >
    <br>
    <a>Password</a> <input type="password" id = "pass" placeholder="Enter Password">
    <input type="hidden" id = "color">
    <br>
    <button type="button" onclick="CheckUser()">Login</button>
</form>

<form action="signup.php">
    signup here <input type="submit" value="signup">

</form>

</body>
</html>
