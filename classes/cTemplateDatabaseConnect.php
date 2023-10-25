<?php

///////need to start

class cTemplateDatabaseConnect
{

    private $sUserName;
    private $sPwd;

    public function __construct($sUsername,$sPwd)
    {
        $this->sUserName = $sUsername;
        $this->sPwd = $sPwd;
   
    }

    protected function fConnect()
    {
        try 
        {
            $sUserName = "root";
            $sPassword = "";
            $dbhDataBaseHandle = new PDO('mysql:host=localhost;dbname=templatedb', $sUserName, $sPassword);
            return $dbhDataBaseHandle;
        } catch (PDOException $e) 
        {
            print "error!: " . $e->getmessage() . "<br/>";
            die();
        }
    }


    








}