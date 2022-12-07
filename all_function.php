
<?php
function db(){
$servername = "localhost";
$username = "root";
$password = "root";
$database = "database15";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Connection Failed With Database".mysqli_connect_error());
}
else{
 
return $conn;

}
}  

 function checkTable($table){
    $conn = db();
    $show = "SHOW TABLES";
    $i = 0;
    $res = mysqli_query($conn, $show);
    $count = mysqli_num_rows($res);     
    $tablefound = false;   
while($data = mysqli_fetch_array($res)) {
    if($data[$i] == $table){
        $tablefound =true;
     break;
    }
    $i= $i++;
}
return $tablefound;
 
 }
 
 function select($table){
    $conn = db();
   $table1 = checkTable($table);
   if($table1){
       $sql = "SELECT * FROM $table";
       $result = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($result);
 
       if($result)
       {
        if($count>0){
       while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       {
             $val[] = $row;

       }
       return $val;
    }
    else{
        echo "Table is empty";
    }
       }
       else{
           echo "no data fetch form your table";
       }
   }
   else{
       echo "Table not Found In your Database";
   }

    }

    function count_row($table){
        $conn = db();
        $table1 = checkTable($table);
        if($table1){
            $sql = "SELECT * FROM $table";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
      return $count;
        }
        else{
            echo $table." Not match ";
        }
    }


 function selectOneRow($table, $array){
 $conn = db();
 
 $row_value = array();
$table1 = checkTable($table);
if($table1){
    $sql = "SELECT * FROM $table where ";
    foreach ($array as $key => $value) {
         $sql .= $key." = '".$value."'";
    }
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
 
    if($result)
    {
        if($count>0){
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        return $row;
    }
   
}
    }

 
 }
}
  
 function emptyData($table){
     $conn = db();
     $table2 = checkTable($table);
     if($table2){
        $sql  = "TRUNCATE TABLE $table";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        echo $count."<br>";
        if($sql){
            echo "Your table Has been Truncated";
    }
        else{
            echo "table not trucated";
        }
        
     }
     else{
         echo "Table not exist";
     }

 }

 function insert($table, $data){
$conn = db();
$showMessage = false;
$table1 = checkTable($table);
if($table1){
 
foreach($data as $key => $value){
     

    $k[] = $key;
    $v[] = "'".$value."'";
     
}
 
$row = implode(', ', array_values($k));

$values = implode(', ', array_values($v));
 
$sql = "INSERT INTO $table($row) VALUES($values)";
 
$query = mysqli_query($conn, $sql);
if($query)
{
    $showMessage = true;
   
}
 
}
else{
    echo "no This table not preseting the database";
}
 return $showMessage;
 }

 
//------------update Query ----------------------------
  
function update1($table_name, $myarray, $my_wheres) {
    $conn = db();
    $table1 =checkTable($table);
    if($table1){
    $sql = " UPDATE `".$table_name.
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
else{
    echo "Table not found your database";
}
    }
 echo $sql;
 echo "<br>";
    $run = mysqli_query($conn, $sql);
     
    return $run;
}


// ---------- update function call -----------
// $update = update1("Table123", array('Name'=>'Mera', 'age' =>21), array('id' => 8));
// var_dump($update);
// if($update){
//     echo "Your Columns are updated";

// }
// else{
//     echo "Your columns not updated";
// }



// ---------------------------------- Query for JOIN Two TABLE --------------------------------


function joinTable($array){
    $conn = db();
    $val_key ='';
    $select = "SELECT ";
     $i = 0;
     $j = 0;
     $k = 0;
$foreign = array();
$temp="";
 foreach ($array as $main_key => $main_value) {
     
   if($i==0){
     foreach ($main_value['fields'] as $key => $value) {
         $select .= " ".$main_value['tablename'].".";
         $select .= $value.", "; 
     }
     
    }else{
 
        
    
        
        if($k<count($main_value)-1){
            $select .= " ".$main_value['tablename'].".";
            $select .= $main_value['field'].",";
            }
            else{$select .= " ".$main_value['tablename'].".";
                $select .= $main_value['field']." ";
                 
               
            } $k++; 
           
        
    }
    $i++;
    
 }
 $select .= " FROM "; 
 
 foreach ($array as $key => $v1) {

$m = $j-1;
if($j==0){
   $select .= $v1['tablename'];
   $temp = $v1['tablename'];
   foreach ($v1['foreign'] as $key => $value) {
       $foreign[] = $value; 
   }
  
}

else{
    $select .= " INNER JOIN ";
    $select .= $v1['tablename'];
    $select .= " ON ";
     
     
    for ($k=0; $k < count($foreign); $k++) { 
        if($m==0){
           $select .= $temp.".".$foreign[$k]." = ".$v1['tablename'].".".$v1['primary_key'];
     break;
        }
    
        else{
            $select .= $temp.".".$foreign[$k+2]." = ".$v1['tablename'].".".$v1['primary_key'];
            break;
        }
    }

}
    $j++;
 }
 

 $query = mysqli_query($conn, $select);
 
 $count = mysqli_num_rows($query);
 if($query){
     while ($row = mysqli_fetch_assoc($query)) {
        $value1[] = $row;
     }
 }
 else{
     echo "No! Not match your value"; 
 }
return $value1;
}


$array = array(
        0=>array('tablename' => 'personal',
                'fields' =>  array(
                'fname', 'lname', 'age', 'dob', 'gender', 'education', 'address1', 'address2'), 
                'foreign' => array('skill', 'state', 'country')
                ),
        1=> array(
                'tablename' =>'user_skill',
                'primary_key' => 'skill_id',
                'field' =>  'skill_content'
                
                ),
        2 => array(
                'tablename' => 'state_info',
                'field' => 'state_name',
                'primary_key' => 'SI'
                ),
        3 => array(
            'tablename' => 'country_info',
            'field' =>  'country_name',
            'primary_key' => 'CID'
            )
);
 
 
function countRowCondition($table, $array){
    $conn = db();
    $count_value="";
    $store_array = array();
    $tablecheck = checkTable($table);
    if($tablecheck){
       $sql = "SELECT ";
    
       foreach ($array as $key => $value) {
           $count_value=$value;
             $sql .= $value.",";
            
       }
       $sql .= " COUNT(".$count_value.") as most FROM ". $table. " GROUP BY ". $count_value. " HAVING COUNT(".$count_value.") > 1 ORDER BY most DESC";
     
       $query = mysqli_query($conn, $sql);
        
       
       if($query){
            while($row = mysqli_fetch_assoc($query)){
                $store_array[] = $row;
            }
        
       }
    }
    else{
        echo "not check table";
    }
return $store_array;

}

 
?>