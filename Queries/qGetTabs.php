<?php
session_start();

include "../classes/cCompanyDatabaseConnect.php";
include "../classes/cCompanyDatabaseController.php";
include "../classes/cTemplateDatabaseConnect.php";
include "../classes/cTemplateDatabaseController.php";

$inDatabaseName = $_SESSION['sCompanyDatabaseLoc'];
$cCompanyDatabaseController = new cCompanyDatabaseController($inDatabaseName);
$cTemplateDatabaseController = new cTemplateDatabaseController();

$aRows = array();
$output="";


    if($cCompanyDatabaseController->fSerchForWeighTabs())
    {
        $FetchedData = $cCompanyDatabaseController->fSerchForWeighTabs();

        //// create an array of structs each row needs a struct with template location and display name
        for ($i = 0; $i < count($FetchedData); $i++) 
        {    
            $sTableName = /*"templatedb." . */$FetchedData[$i]['TemplateName'];
            $DisplayName = $cTemplateDatabaseController->GetDisplayName($sTableName);
            $aCurrentTab = array("TableName" => $sTableName, "DisplayName" => $DisplayName, "CSSID" => $sTableName);
            $aRows[] = $aCurrentTab;

            

            //$output = $output . "<html><div class='WeighTab' id='$i'>" . $FetchedData[$i]["TemplateName"] . "</div></html>";
            $output = $output . "<html><button type='button' class='WeighTab' id='$sTableName' onclick='fLoadTemplateBody(\"" . $FetchedData[$i]['TemplateName'] . "\")'>  $DisplayName </button></html>";

        }
        $_SESSION['WeighTabs'] = $aRows;
    }

//$response = json_encode($aRows);
$response = $output;
echo $response;
?>