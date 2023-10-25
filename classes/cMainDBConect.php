<?php


class cMainDBConnect
{

    protected function fConnect()
    {
        try 
        {
            $sUserName = "root";
            $sPassword = "";
            $dbhDataBaseHandle = new PDO('mysql:host=localhost;dbname=Loginbase', $sUserName, $sPassword);
            return $dbhDataBaseHandle;
        } catch (PDOException $e) 
        {
            print "error!: " . $e->getmessage() . "<br/>";
            die();
        }
    }
}