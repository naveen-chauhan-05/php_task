<?php
namespace Container;
include 'all_log.php';

$a = 9;
if($a==9){
    echo "new file";
}
else{
    $obj = new Log();
    echo "hello";
    $obj->addNotice("This is Notice of check page123", "text.txt");

}
 

?>