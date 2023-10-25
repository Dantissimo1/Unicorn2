<?php

require_once ('index.php');

class cMainProg
{

    public function __construct()
    {

        

        ?>

        <!DOCTYPE html>
        <html lang = "en">
            <head>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
                <link rel="stylesheet" href="../Unicorn2/MainProgStyles.css">
                <meta charset="utf8">
                <meta name="Main" content="width=device-width, initial-scale = 1.0">
                <title>Main</title>
                <script type="text/javascript" src="TestJava.js"></script>
            </Head>

            <body>
                <div class = "ProgContainer">
                    <div class = "TopMenu">


                    



                        <?php
                        /*
                            include("classes\cCompanyDatabseController.php");
                            $cCompanyDatabaseController = new cCompanyDatabaseController();
                            $cCompanyDatabaseController->SerchForWeighTabs();
                            
                            
                            */
                        ?>

                    

                    </div>
                    

                    <div class = "SideBar">
                        <button type="button" class="SideNavButton" onclick="fLoadWeighTopTabs()">Weighing</button>
                        <button type="button" class="SideNavButton" onclick="alert('Records')">Records</button>
                        <button type="button" class="SideNavButton" onclick="alert('Reports')">Reports</button>
                        <button type="button" class="SideNavButton" onclick="alert('Admin')">Admin</button>
                        
                    </div>

                    <div class="MainArea">
                        <h1>Main area</h1>



                      


                    </div>

                </div>


                <!------------------------------------     first load php  --------------------------------->
                <?php
                if(!isset($_SESSION["bFirstLoadDone"]))
                {
                    $_SESSION["bFirstLoadDone"] = "1";
                    ?>
                    <script>
                        document.getElementsByClassName("TopMenu")[0].innerHTML = "Hello TEsting";
                        
                        fLoadWeighTopTabs();

                    </script>
                    <?php

                }
                ?>



<!-------------------------------Load Weigh Tabs Java-------------------------------->
                <script>
                    function fLoadWeighTopTabs() 
                    {
                        document.getElementsByClassName("MainArea")[0].innerHTML = "Hello TEsting";

                        $.ajax({
                            method: "POST",
                            url: "Queries/qGetTabs.php",
                            data: { text: $(".TopMenu").text() }
                            })
                            .done(function( response ) 
                            {
                                $(".TopMenu").html(response);
                            });
                    }

                    function fLoadTemplateBody($inTemplateName)
                    {
                        $.ajax({
                            method: "POST",
                            url: "Queries/qLoadTemplateBody.php",
                            data: { inTemplateName: $inTemplateName }
                            })
                            .done(function( response ) 
                            {
                                $(".TopMenu").html(response);
                            });

                        


                        document.getElementsByClassName("MainArea")[0].innerHTML = $inTemplateName;

                    }


                </script> 






            </body>





        </html>

        <?php


    }






}

