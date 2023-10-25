<?php

require_once 'cMainDBConect.php';

class cMainLoginController extends cMainDBConnect
{
    private $sCompanyName;
    private $sUserName;
    private $sPwd;
    private $iCompanyID = 0;
    private $iUserID = 0;
    private $sCompanyDatabase = NULL;

    public function __construct($sCompanyName,$sUsername,$sPwd)
    {
        $this->sCompanyName = $sCompanyName;
        $this->sUserName = $sUsername;
        $this->sPwd = $sPwd;
   
    }

    private function fGetcompanyID()
    {
        $stmnt = $this->fConnect()->prepare('select CompanyID from Companies where CompanyName = ?');

        if(!$stmnt->execute(array($this->sCompanyName)))
        {
            $stmt = null;
            header("Location: ..\index.php?InvalidCompany");
            exit();
        }
        else if ($stmnt->rowCount() == 0)
        {
            $stmt = null;
            header("Location: ..\index.php?InvalidCompany");
            exit();
            
        }
        $FetchData = $stmnt->fetchAll(PDO::FETCH_ASSOC);

        return $this->iCompanyID = $FetchData[0]["CompanyID"];

    }

    private function fCheckUserExists()
    {
        $result = false;

        $stmnt = $this->fConnect()->prepare('select UserID from Users where Users.CompanyID = ? and Users.UserName = ?');

        if(!$stmnt->execute(array($this->iCompanyID,$this->sUserName)))
        {
            $stmt = null;
            header("Location: ..\index.php?InvalidUser");
            return $result;
            exit();
        }else if ($stmnt->rowCount() == 0)
        {
            $stmt = null;
            header("Location: ..\index.php?InvalidUser");
            return $result;
            exit();
        }
        $FetchData = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        $stmnt = null;
        $this->iUserID = $FetchData[0]["UserID"];
        $result = true;
        return $result;
    }

    private function fAuthenticatePassword()
    {
        
        $result = false;
        if ($this->sPwd == "")
        {
            header("Location: ..\index.php?NoPassword");
            return $result;
            exit();
        }

        $stmnt = $this->fConnect()->prepare('select UserPassword from users, companies where users.UserID = ? and users.CompanyID = ? and companies.CompanyID = ?');

        if(!$stmnt->execute(array($this->iUserID, $this->iCompanyID,$this->iCompanyID)))
        {
            $stmt = null;
            header("Location: ..\index.php?AuthFail");
            return $result;
            exit();
        }else if ($stmnt->rowCount() == 0)
        {
            $stmt = null;
            header("Location: ..\index.php?AtuhFailed");
            return $result;
            exit();
        }else 
        {      
            $FetchedData = $stmnt->fetchAll(PDO::FETCH_ASSOC);
            $sHashedPwd = $FetchedData[0]["UserPassword"];    ///////////needs modifying so that its actuly using hashed password in database - requires user creation to be implemented
            if ($this->sPwd == $sHashedPwd)
            {
                return true;
            }
        }
        return $result;
    }

    private function fLoginSessionStart()
    {
        session_start();
        $_SESSION["iCompanyID"] = $this->iCompanyID;
        $_SESSION["sCompanyName"] = $this->sCompanyName;
        $_SESSION["iUserID"] = $this->iUserID;
        $_SESSION["sUserName"] = $this->sUserName;
        $_SESSION["sCompanyDatabaseName"] = $this->sCompanyDatabase;
        $DBName = "companydb_".$this->sCompanyDatabase.$this->iCompanyID;
        $_SESSION["sCompanyDatabaseLoc"] = $DBName;
    }

    public function fLoginUser()
    {
 
        echo "echhggggo";

        $this->iCompanyID = $this->fGetcompanyID();

        $test = $this->iCompanyID;
        echo "$test";

        if($this->iCompanyID > 0)
        {
            if($this->fCheckUserExists() == 1)
            {
                echo "UserExists $this->iUserID";

                if ($this->fAuthenticatePassword() == 1)
                {
                    echo "valid Password";

                    if($this->fFindCompaniesDB())
                    {
                        $this->fLoginSessionStart();
                        return true;
                    }
                }
            }
        }
        return false;
    }


    private function fFindCompaniesDB()
    {
        $stmt = $this->fConnect()->Prepare('select CompanyDatabase from companies where CompanyID = ?');
        if(!$stmt->execute(array($this->iCompanyID)))
        {
            $stmnt = NULL;
            header("Location: ..\index.php?CompanyDBFail1");
        }else
        {
            $FetchedData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmnt = NULL;
            $this->sCompanyDatabase = $FetchedData[0]["CompanyDatabase"]; 

            if ($this->sCompanyDatabase != NULL || "")
            {
                return true;
            }
            else
            {
                header("Location: ..\index.php?CompanyDBFail3");
                exit();
            }
        }


    }

}