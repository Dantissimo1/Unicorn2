<?php

class cUserDisplay
{

    public function __construct()
    {
        ?>

        <!DOCTYPE html>
        <html lang = "en">
            <head>
                <link rel="stylesheet" href="../Unicorn2/LoginWindowStyles.css">
                <meta charset="utf8">
                <meta name="Main" content="width=device-width, initial-scale = 1.0">
                <title>Main</title>
                <!-- <script type="text/javascript" src="TestJava.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
            </Head>

            <body>

            <div id = "UserInfoContainer">
            <?php
                IF (isset($_SESSION["sUserName"]))
                {
                ?>
                    
                    echo "pen";
                    
                    
                       
                <?php
                }
                else {
                ?>

                    echo "please log in ";


                <?php
                }

            ?>
            </div>

            </body>

        



            <?php
    }

}

?>