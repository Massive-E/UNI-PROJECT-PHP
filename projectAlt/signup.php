<!DOCTYPE html>
<html>
<head>

    <title>SignUp Form</title>

</head>
<body>

<script>


    function validateNewSignUp() { // sends request to Loginhandler.php to confirm username availability. LoginHandler.php responds true on insertion, false on username already taken

        var userName = document.getElementById("Uname").value;
        var password = document.getElementById("pass").value;
        var confirmPassword = document.getElementById("Confirmpass").value;

        var team =  document.getElementById("color").value;


        if (password !== confirmPassword){

            document.getElementById("PassError").innerHTML = "Passwords don't match";
            return;
        }


        error = false;

        DBR = new XMLHttpRequest();

        DBR.onreadystatechange = function () {

            let response = JSON.parse(DBR.response);

            if (response.code === true){

                document.getElementById("button").form.submit();
            }

            else {

                if (!error) {

                    document.getElementById("Uname").value = null;
                    document.getElementById("PassError").innerText = "User Name is already taken. Please choose another name";
                    error = true;
                }


            }

        }

        DBR.open("GET", "DBsignup.php?" + "userName=" + userName + "&password=" + password + "&team=" + team+"&SIGNIN=true");
        DBR.send();


    }


</script>

<h1>Sign Up Form</h1>
<a id="PassError"></a>
<form action="login.php" method="post">

        Username : <input type="text" id = "Uname" ><br>
        Password : <input type="password" id = "pass" > <br>
        Confirm Password : <input type="password" id = "Confirmpass"> <br>
        Select Team :
        <select id="color" >
            <option value="red">Red </option>
            <option value="green">Green </option>
            <option value="yellow">Yellow</option>
        </select>
        <button type="button" id="button" onclick="validateNewSignUp()">Login</button> <!--no submit button,rather,onclick function used-->
</form>

</body>
</html>
