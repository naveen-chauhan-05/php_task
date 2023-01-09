<?php
namespace userDetails\model;
use App\user;
error_reporting( E_ALL );
ini_set('display_errors', '1');
require_once '../config/dbconnect.php';
$obj = new user();
$conn = $obj->connect();
class Employee{
    public  $conn;
    function __construct($connect){
 $this->conn = $connect;
  
    }
    function checkTable($table){
        
        $show = "SHOW TABLES";
        $i = 0;
        $res = $this->conn->query($show);
        $count = mysqli_num_rows($res);     
        $tablefound = false;   
    while($data = $res->fetch_array()) {
        if($data[$i] == $table){
            $tablefound =true;
             
         break;
        }
        $i= $i++;
    }
    return $tablefound;
     
     }
    function readData($table){
        $showData = array();
        $table1 = self::checkTable($table);
         if($table1){
            
        $select = "SELECT * FROM `$table` ";
        echo "<br>";
        
       $result =  $this->conn->query($select);     
      
        if($result){
            while($row = $result->fetch_assoc()){
             $showData[] = $row;
            }
        }
    }
    return $showData; 
    }

    function insert($table, $data){
        $showMessage = false; 
        $table1 = self::checkTable($table);
        if($table1){        
        foreach($data as $key => $value){   
            $k[] = $key;
            $v[] = "'".$value."'";
             
        }
         
        $row = implode(', ', array_values($k));
        
        $values = implode(', ', array_values($v));
         
        $sql = "INSERT INTO $table ($row) VALUES($values)";
         echo $sql;
         echo "<br>";
        $result = $this->conn->query($sql);
        if($result)
        {
            $showMessage = true;
         
        }
    }
        return $showMessage;
    }


    function update1($table, $myarray, $my_wheres) {
        
        $table1 =self::checkTable($table);
        if($table1){
        
        $sql = " UPDATE `".$table.
        "` SET ";
        $i = 0;
       
            foreach($myarray as $key => $value) {
                $sql .= $key.
                " = '".$value."'";
                
                if ($i < count($myarray) - 1) {
                    $sql .= ", ";
                }     
                $i++;
            }
            if (count($my_wheres) > 0) {
                $sql .=" WHERE ";
                $i = 0;
                foreach ($my_wheres as $key => $value) {
    
                    $sql .= $key.
                    " = ".$value;
                
                    if ($i < count($my_wheres) - 1) {
                        $sql .= " AND ";
                    }
                    $i++;      
            }
          
            }
            echo $sql;
            echo "<br>";
            $run = $this->conn->query($sql); 
            var_dump($run);     
            return $run;
        }

            else{
                echo "Table not found your database";
            }
    }

    function getDelete($table, $delete){
        
        $table1 = self::checkTable($table);
        if($table1){
            $detete = false;
            $sql = " DELETE FROM `".$table.
            "` WHERE ";
            
          foreach ($delete as $key => $value) {
            $sql .= $key." IN (";
            $i = 0;
            foreach ($value as $value1) {
               
               if($i==0){
                $sql .= $value1;
               }
               else{
                $sql .= ", ";
                $sql .= $value1;
               }
                
                $i++;
            }
            $sql .=" )";
          }
        
        $query =$this->conn->query($sql);
        if($query){
            
            $delete = true;
            return $delete;
        }
        }
        
        
    }

    function selectOneRow($table, $array){
        $row_value = array();
        
       $table1 = self::checkTable($table);
       
       if($table1){
           $sql = "SELECT * FROM $table where ";
          
           
           foreach ($array as $key => $value) {
                $sql .= $key." = '".$value."'";
           }
            
           $result = $this->conn->query($sql);
           //  var_dump($result);
           $count = $result->num_rows;
        
           if($result)
           {
               if($count>0){
           while($row = $result->fetch_array(MYSQLI_ASSOC))
           {
            
               return $row;
           }
          
       }
           }
       
        
        }
       }
         

         
}
// $obj1 = new Employee($conn);
// // $delete = $obj1->getDelete("employee_details", array('Empid'=>array(3)));
// $array = $obj1->readData("employee_details");
// print_r($array);
//  $insert = $obj1->insert("employee_details", array('Emp_name'=>"Praveen", 'emp_age'=>'12'));
// $update =$obj1->update1("employee_details", array('Emp_name'=>'Mera', 'emp_age'=>19), array('EmpID' => '4'));
?>