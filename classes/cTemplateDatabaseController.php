<?php


require_once 'cTemplateDatabaseConnect.php';




class cTemplateDatabaseController extends cTemplateDatabaseConnect
{

    public function __construct()
    {
        

   
    }

    public function GetDisplayName($sTableName)
    {
        $inTableName = $sTableName;
        $DisplayName = "";

        $currentRow = array(
            "TemplateName" => "Blank",
            "DisplayName" => " ",
        );

        $stmnt = $this->fConnect()->prepare('select DisplayName from ' . $inTableName . ' where ID = -1');

        if($stmnt->execute())
        {
            $FetchData = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            //$stmnt = NULL;   
            return  $DisplayName = $FetchData[0]["DisplayName"];
        }
        else 
        {
            return  $DisplayName = "Template Unavalible 23322";
            ////////FAil code
        }

    }

}