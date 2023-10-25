<?php

if(isset($_POST["SubmitLogin"]))
{

    include "../classes/cMainDBConect.php";
    include "../classes/cMainLoginController.php";

    $sCompanyName = $_POST["Company"];
    $sUsername = $_POST["UserName"];
    $sPwd = $_POST["Pwd"];

    $cLoginController = new cMainLoginController($sCompanyName,$sUsername,$sPwd);
   
    if($cLoginController->fLoginUser())
    {
       header("Location:../index.php?LoginSuccess");
       exit();
    } else
    {
       header("Location:../index.php?LoginFailed");
       exit();
    }



    header("location:../index.php?error=none");



}