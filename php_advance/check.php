<?php 
use Container\Log;
include 'all_log.php';

function handler($errno, $errstr, $errfile, $errline){
    $obj = new Log();
    
     
    if($errno==8){
        $message = $errstr . ':' . $errfile . ' errno  ' . $errline ;
        $obj->addWarn($message, $logFilePath);
    }elseif($errno==2){
        $message = $errstr . ':' . $errfile . ' errno  ' . $errline ;
        $obj->addNotice($message, $logFilePath);
    }
    
}
function myException($e){
    $logFilePath = 'text.txt';
    $obj = new Log();   
    $obj->addErr($e, $logFilePath);
}
set_error_handler("handler");
set_exception_handler("myException");
echo "Your Name is " . $name; // $name here is not define
include 'ab.txt';
 
function div($value){

}
div();
div(12, 12);
?>