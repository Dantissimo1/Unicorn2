<?php
if(!isset($_SESSION))
{
    session_start();
}

?>

<!DOCTYPE html>
<html lang = "en">


    <head>
        <link rel="stylesheet" href="../Unicorn2/LoginWindowStyles.css">
        <link rel="stylesheet" href="../Unicorn2/MainStyles.css">

        <meta charset="utf8">
        <meta name="Main" content="width=device-width, initial-scale = 1.0">
        <title>Main</title>

        

    </Head>



    <body>
        <div class="LoginContainer">

            <div class="LoginWindow">
                <div id="LoginHeadContainer">
                    <h1 id="LoginHead">Login</h1>
                    <div id="LoginDesc">
                        Please enter your compnay credentials below to log in.
                    </div>
                </div>

                <form id="LoginForm" action="includes\iMainLogin.php" method="post">
                    <input class="LoginInputfield" type="text" name="Company" placeholder="Company Name">
                    <br>
                    <input class="LoginInputfield" type ="text" name="UserName" placeholder="User Name">
                    <br>
                    <input class="LoginInputfield" type ="password" name="Pwd" placeholder="****Password****">
                    <br>
                    <button class="LoginButton" type="submit" name = "SubmitLogin">Submit</button>
                </form>


            </div>
        </div>
    </Body>

</html>