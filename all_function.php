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
 
 function select($table, $limit=NULL, $offset=NULL, $where=NULL, $firstDate=NULL, $endDate=NULL){

    $conn = db();
   
   $table1 = checkTable($table);
   if($table1){
    $sql = "SELECT * FROM $table ";
    if($where!=NULL){
        $sql .= " WHERE ";
        foreach ($where as $key => $value) {
            if($value ==""){
                break;
            }
        $sql .= $key." = '".$value."'";
        }
       
    }
    if($firstDate!=NULL){
        if($value!=""){
            $sql  .= " && ";
        }
    
        foreach ($firstDate as $key1 => $value1) {
            if($value1==""){
                break;
            }
        $sql .= $key1. " >= '".$value1."'";
        }
    }
    if($endDate!=NULL){
        if($value1!=""){

            $sql  .= " && ";
        }
     
        foreach ($endDate as $key2 => $value2) {
            $sql .= $key2. " <= '".$value2."'";
            }
    
    }
       if($limit && $offset>=0 ){
        $sql .= " LIMIT ".$limit." OFFSET ".$offset;
         
       }
     
       $result = mysqli_query($conn, $sql);
       $count = mysqli_num_rows($result);
       echo "<br>";
 
        
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
        echo "In Table No value";
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

    function count_row($table, $array=NULL, $firstDate=NULL, $endDate=NULL){
        $conn = db();
        $table1 = checkTable($table);
        if($table1){
        
            $sql = "SELECT * FROM $table";
            if($array!=NULL){
                $sql .= " WHERE ";
                foreach ($array as $key => $value) {
                    if($value ==""){
                        break;
                    }
                $sql .= $key." = '".$value."'";
                }
               
            }
            if($firstDate!=NULL){
                if($value!=""){
                    $sql  .= " && ";
                }
            
                foreach ($firstDate as $key1 => $value1) {
                    if($value1==""){
                        break;
                    }
                $sql .= $key1. " >= '".$value1."'";
                }
            }
            if($endDate!=NULL){
                if($value1!=""){
        
                    $sql  .= " && ";
                }
             
                foreach ($endDate as $key2 => $value2) {
                    $sql .= $key2. " <= '".$value2."'";
                    }
            
            }

            
              
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
    //  var_dump($result);
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
//  call selectOneRow() function 
// $select = selectOneRow('user_signup', array('email' =>'naveen@gmail.com'));
// $students = selectOneRow('personal',array('Id'=>'4'));
// print_r($students);
// print_r($select);

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
// --------------- call Insert Function ------------------



//  $insert = insert("game_category", array('category_name'=>'Volley-Ball', 'game_description'=>'Hello this is new game', 'parent_category'=>'1'));
//  var_dump($insert);






//------------update Query ----------------------------
  
function update1($table, $myarray, $my_wheres) {
    $conn = db();
    $table1 =checkTable($table);
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
        
        $run = mysqli_query($conn, $sql);      
        return $run;
    }
        else{
            echo "Table not found your database";
        }
}


// ---------- update function call -----------
// $update = update1("post_category", array('title'=>'Mera'), array('id' => '1'));
// var_dump($update);
// if($update){
//     echo "<br>Your Columns are updated";

// }
// else{
//     echo "<br>Your columns not updated";
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
//  echo $select;   
 
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
//  $array1  = array(
//         0=> array('tablename'=>'post_category',
//                 'fields'=>array('title', 'description'),
//                 'foreign' => array('Game_Category')),
//         1=> array(
//                  'tablename'=> 'game_category',
//                 'primary_key' => 'cid', 
//                 'field' => 'category_name'
//     )
//  );
//  $value = joinTable($array1);
//  echo "<pre>";
//  print_r($value);
 
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
 


// function for pagination 
function paging($limit,$numRows,$page){
 
 
echo '<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
  .pagination{
        border: 2px solid blue;
        padding: 5px;
        font-size: 18px;
        margin: 5px;
        text-decoration: none;
        color: blue;
    }
    .text{
        font-size: 18px;
    }
    </style>
</head>
<body>';
$allPages       = ceil($numRows / $limit);
     
  
$start         = ($page - 1) * $limit;


// for ($i = 1; $i <= $allPages; $i++) {
//     $paginHTML .= "<a " . ($i == $page ? "class=\"selected\" " : "");
//     // $paginHTML .= "href=\"?{$querystring}page=$i";
//     // $paginHTML .= "\">$i</a> ";
 

if($page>2)
{
    if (empty($_GET['filter']) && empty($_GET['search'])) {
       
        echo  "<a href ='".$_SESVER['PHP_SELF']."?page=".($page-2)."' class = 'pagination'> <<</a>";
    }
    else{
        if($_GET['filter']){
        echo "<a href='?select=".$_GET['select']."&Date1=".$_GET['Date1']."&Date2=".$_GET['Date2']."&filter=filter".$_SESVER['PHP_SELF']."&page=".($page-2)."' class = 'pagination'> <<</a>";
        }
        else{
            echo "<a href='?value=".$_GET['value']."&search=search".$_SESVER['PHP_SELF']."&page=".($page-2)."' class = 'pagination'> <<</a>";
        }
    }
  
}
if($page>1)
{
    if (empty($_GET['filter']) && empty($_GET['search'])) {
       
        echo  "<a href ='".$_SESVER['PHP_SELF']."?page=".($page-1)."' class = 'pagination'> <</a>";
    }
    else{
        if($_GET['filter']){
        echo "<a href='?select=".$_GET['select']."&Date1=".$_GET['Date1']."&Date2=".$_GET['Date2']."&filter=filter".$_SESVER['PHP_SELF']."&page=".($page-1)."' class = 'pagination'> <</a>";
        }
        else{
            echo "<a href='?value=".$_GET['value']."&search=search".$_SESVER['PHP_SELF']."&page=".($page-1)."' class = 'pagination'> <</a>";
        }
    }
}
echo "<span class = 'text'>".$page." of ". $allPages."</span>";
if($allPages>$page){
    if (empty($_GET['filter']) && empty($_GET['search'])) {
         
  echo "<a href='".$_SESVER['PHP_SELF']."?page=".($page+1)."' class = 'pagination'> ></a>";
}
 
    else{
        if($_GET['filter']){
            echo $_GET['date1'];
                echo "<a href='?select=".$_GET['select']."&Date1=".$_GET['Date1']."&Date2=".$_GET['Date2']."&filter=filter".$_SESVER['PHP_SELF']."&page=".($page+1)."' class = 'pagination'> ></a>";
                
            }
            else{
                echo "<a href='?value=".$_GET['value']."&search=search".$_SESVER['PHP_SELF']."&page=".($page+1)."' class = 'pagination'> ></a>";
            }
}
}
if($allPages>$page && $page != $allPages-1 && $page !=$allPages){
    if (empty($_GET['filter']) && empty($_GET['search'])) {
       
        echo  "<a href ='".$_SESVER['PHP_SELF']."?page=".($page+2)."' class = 'pagination'> >></a>";
    }
    else{
        if($_GET['filter']){
        echo "<a href='?select=".$_GET['select']."&Date1=".$_GET['Date1']."&Date2=".$_GET['Date2']."&filter=filter".$_SESVER['PHP_SELF']."&page=".($page+2)."' class = 'pagination'> >></a>";
        }
        else{
            echo "<a href='?value=".$_GET['value']."&search=search".$_SESVER['PHP_SELF']."&page=".($page+2)."' class = 'pagination'> >></a>";
        }
    }
  
}
echo '</body>
</html>';
}

function getDelete($table, $delete){
    $conn = db();
    $table1 = checkTable($table);
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
    
    $query = mysqli_query($conn, $sql);
    if($query){
        
        $delete = true;
        return $delete;
    }
    }
    
    
}
//  $delete = getDelete("post_category", array('id'=>array(8, 11)));
//  var_dump($delete);
 
?>