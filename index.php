<?php
    session_start();
?>

<!DOCTYPE html>
<html lang = "en">


    <head>
            <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <link rel="stylesheet" href="../Unicorn2/MainStyles.css">
        <script type="text/javascript" src="TestJava.js"></script>

        <title>Main</title>

    </Head>



    <body>
        <div class="MainContainer">
            <div Class="MainHeader">


            <!---Title area --------------->
                <div class="TitleArea"> 
                    <img src="CoreImages\Unicorn.jpg" style='height: 95%; width: 95%; object-fit: contain'>
                </div>
                <div class="CompanyArea">
                    <?php 
                    IF (isset($_SESSION["sCompanyName"]))
                    {
                        Echo $_SESSION["sCompanyName"]; 
                    }else
                    {
                       Echo "Supermega";
                    }                
                    ?> 
                </div>
                <div class="UserSection">
                <?php

                    IF (isset($_SESSION["sUserName"]))
                    { 
                        ?>
                        <div id = "UserDisplayArea">
                            <span>
                                
                                <?php
                                    echo 'User: ',  $_SESSION["sUserName"];
                                ?>
                            </span>
                            <br>
                            <button type="button" class="LogOutButton" onclick="location.href='includes/iLogout.php';">LogOut</button>
                        </div>
                        
                        
                        <?php 
                    }
                    else {
                    ?>

                        echo "please log in ";


                    <?php
                    }
                ?>
                </div>
                
            </div>

<!---- main window-------------------------------->
            <div Class="MainWindow">
                <?php
                //echo "tits";
                    if (isset($_SESSION["iUserID"]))
                    { 
                        //echo "tits";
                        if ($_SESSION["iUserID"] >0)
                        {
                            include("classes\cMainProg.php");
                            //include("includes\iMainProg.php");
                            $cMainPrograme = new cMainProg();
                        }
                    }
                    else
                    { 
                        include 'Login.php';                   
                    }
                ?>
            </div>

        
        

        </div>



        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  


    </body>
    



</html>