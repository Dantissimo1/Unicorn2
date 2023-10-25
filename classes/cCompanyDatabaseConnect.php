<?php

class cCompanyDatabaseConnect
{

    protected function fConnect($sCompanyDatabaseLoc)
    {
        try 
        {
            $sUserName = "root";
            $sPassword = "";
            $dsn = "mysql:host=localhost;dbname=$sCompanyDatabaseLoc";
            $dbhDataBaseHandle = new PDO($dsn, $sUserName, $sPassword);
            return $dbhDataBaseHandle;
        } catch (PDOException $e) 
        {
            print "error! $sCompanyDatabaseLoc : " . $e->getmessage() . "<br/>";
            die();
        }
    }
}