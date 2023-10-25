<?php

include "cTemplateDatabaseConnect.php";
include "cTemplateDatabaseController.php";



if(isset($_POST['inTemplateName'])) {
    $inTemplateName = $_POST['inTemplateName'];
    $output = "";

    $cTemplateDatabaseController = new cTemplateDatabaseController();

    $stmnt = $cTemplateDatabaseController->fConnect()->prepare('select * from ' . $inTableName . ' where ID <> -1');

    if($stmnt->execute())
    {
        if($stmnt->rowCount() > 0)
        {
            $FetchData = $stmnt->fetchAll(PDO::FETCH_ASSOC);

            $element = "";


            foreach($FetchData as $Row)
            {
                switch(strtolower($Row['FieldType'])
                {
                        case "string":

                        break;
                        case "int"


                        break;
                        case "bool"


                        break;
                        case "date"

                        break;
                        case ""

                        //no field type


                        break;






                })
  
            }

        }


    }
    else 
    {
        return  $DisplayName = "Template Unavalible 23322";
        ////////FAil code
    }









    $response = $output;
    echo $response;
} else {
    echo "Error: No inTemplateName received.";
}








