// error message to be logged
$error_message = $this->sCompanyDatabase;
  
// path of the log file where errors need to be logged
$log_file = "./my-errors.log";
  
// logging error message to given log file
error_log($error_message, 3, $log_file);