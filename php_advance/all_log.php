<?php
namespace Container;
class Log{
    public static $fileName;
    // public static $fname;
    public function addWarn($logMsg, $fname = null){
        if($fname!=Null){
            $fname = $fname;
        }
        else{
            $fname = self::$fileName;
        }
        self::addData($logMsg, $fname, "| Warning |");
    }
    public function addErr($logMsg, $fname=NULL){
        
        if($fname!=NULL){
            $fname = $fname;
        }
        else{
            $fname = self::$fileName;
        }
        self::addData($logMsg, $fname, "| ERROR |");
    }
    public function addNotice($logMsg, $fname=NULL){
        if($fname!=NULL){
            $fname = $fname;
        }
        else{
            $fname = self::$fileName;
        }
        self::addData($logMsg, $fname, "| Notice |"); 
    }

    private static function addData($logMsg, $fname, $type)
    {
        $fopen  = fopen($fname, "a+");
    
        fwrite($fopen, "\n{$type}======> {$logMsg} ");  
         
    }
}
// Log::$fileName = "text.txt";
//  $obj = new Log();
// $obj->addErr("This is Error");
// $obj->addWarn("Hello This is Warning", "text.txt");
// $obj->addNotice("This is Notice of check page");
?>