<?php
  include 'all_function.php';
 
 

// function paging($limit,$numRows,$page){
 

//   $allPages       = ceil($numRows / $limit);
   

//   $start         = ($page - 1) * $limit;

 
 
 
   

 

//   // for ($i = 1; $i <= $allPages; $i++) {
//   //     $paginHTML .= "<a " . ($i == $page ? "class=\"selected\" " : "");
//   //     // $paginHTML .= "href=\"?{$querystring}page=$i";
//   //     // $paginHTML .= "\">$i</a> ";
   
  
//   if($page>2)
//   {
//  echo  "<a href ='".$_SESVER['PHP_SELF']."?page=".($page-2)."'> <<</a>";
    
//   }
//   if($page>1)
//   {
//  echo  "<a href ='".$_SESVER['PHP_SELF']."?page=".($page-1)."'> <</a>";
    
//   }
//   echo " hello ";
//   if($allPages>$page){
//     echo "<a href='".$_SESVER['PHP_SELF']."?page=".($page+1)."'> ></a>";
//   }
//   if($allPages>$page && $page != $allPages-1 && $page !=$allPages){
//     echo "<a href='".$_SESVER['PHP_SELF']."?page=".($page+2)."'> >></a>";
//   }



// }


if(isset($_GET['page'])){
  $page = $_GET['page'];
}
else{
  $page = 1;
}
 
$limit = 5;
$i = 0;
$offset = ($limit *$page)-$limit;
 
echo "<table>";
$select = select("post_category", $limit, $offset);

foreach ($select as $key => $value) {
  echo "<tr>";
  
 foreach ($value as $key1 => $value1) {
   echo "<td>".$value1."</td>";
 }
 echo "</tr>";
}
 

echo "</table>";
echo "<br>";
$numberRows = count_row("post_category");
 
$pagein = paging($limit, $numberRows, $page);
echo $pagein;
 




 

?>