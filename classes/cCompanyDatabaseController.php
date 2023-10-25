<?php



include 'cMainLoginController.php';



class cCompanyDatabaseController extends cCompanyDatabaseConnect
{

    public function __construct($inDatabaseName)
    {
        
        $_SESSION["sCompanyDatabaseLoc"] = $inDatabaseName;
   
    }



    public function fSerchForWeighTabs()
    {
        
        $aTabArray = array(null);


        if(isset($_SESSION["sCompanyDatabaseLoc"]))
        {
            $stmnt = $this->fConnect($_SESSION["sCompanyDatabaseLoc"])->prepare('select * from templates');

            if(!$stmnt->execute())
            {
                $stmt = null;
                echo 'Execute Failed 5472';
                exit();
            }else if ($stmnt->rowCount() == 0)
            {
                $stmt = null;
                echo 'NoTemplatesNamed 5472';
                exit();
            }else
            {
                return $aTabArray = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            }      
        }else
        {           
            echo "nosession";
            exit();
        }

        
    }


}