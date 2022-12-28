<?php
namespace Container;
class Log{
    public static $fileName;

    public static function addWarn($logMsg, $fname = null){
        if($fname!=Null){
            $fname = $fname;
        }
        else{
            $fname = self::$fileName;
        }
        self::addData($logMsg, $fame, "| DATA |");
    }

    private static function addData($logMsg,$fname, $type)
    {
        $fopen  = fopen($fname, 'a+');
        fwrite($fopen, " {$logMsg} sdafsdf: {$type}");  
         echo "hello";
    }
}

Log::addWarn("hello this is my message", "php_advance/store_log.txt");
?>