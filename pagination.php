<?php
  include 'all_function.php';
// function pagination($var,$table){
//     if(isset($_GET["page"])){
//     $page = $_GET["page"];
// }
// else{
//     $page = 1;
// }
// // $page = 1;
// $num_per_page = 04;
// $start_from = ($page-1)*$num_per_page;
// echo $start_from;
// echo "<br>----------------------------------------------------";
// $i = $start_from;
// $select = select($table);
 
 

// foreach ($select as $key => $value) {
//   if( $i<$num_per_page){
//     echo "<pre>";
//      print_r($value);
//   }
//   $i++;
// }

  
 
//   echo "<br>";
// $count = count_row($table);
// $total_page = ceil($count/$num_per_page);
// echo $total_page;
// echo "<br>";
// if($page>1){
// echo"<a href='pagination.php?page=".($page-1)."'class = 'button'>< Previous</a>";

// }


// if($total_page >$page){
// echo"<a href='pagination.php?page=".($page+1)."' class = 'button' >Next ></a>";

// }

// }
 

function paging($limit,$numRows,$page){
 

  $allPages       = ceil($numRows / $limit);

  $start          = ($page - 1) * $limit;

  $querystring = "";

  foreach ($_GET as $key => $value) {
      if ($key != "page") $paginHTML .= "$key=$value&amp;";
  }

  $paginHTML = "";

  $paginHTML .= "Pages: ";

  for ($i = 1; $i <= $allPages; $i++) {
      $paginHTML .= "<a " . ($i == $page ? "class=\"selected\" " : "");
      $paginHTML .= "href=\"?{$querystring}page=$i";
      $paginHTML .= "\">$i</a> ";
  }

  return $paginHTML;

}
if(isset($_GET['page'])){
  $page = $_GET['page'];
}
else{
  $page = 1;
}
 
$limit = 05;
$i = 0;
$offset = ($limit * $page) -$limit;
echo "<table>";
$select = select("post_category", $limit, $offset);

foreach ($select as $key => $value) {
  echo "<tr>";
  if($i<$limit){
 foreach ($value as $key1 => $value1) {
   echo "<td>".$value1."</td>";
 }
 echo "</tr>";
}
 $i++;
}
echo "</table>";
echo "<br>";
$numberRows = count_row("post_category");
 
$pagein = paging($limit, $numberRows, $page);
echo $pagein;
 




// if(isset($_GET["page"])){
//     $page = $_GET["page"];
// }
// else{
//     $page = 1;
// }
// $num_per_page = 05;
// $start_from = ($page-1)*$num_per_page;
// $select = "SELECT p.id as id, p.fname as fname, p.lname as lname, p.age as age, p.dob as dob, p.gender as gender, p.education as edu, p.skill as skill, p.address1 as primary_address, p.address2 as secondary_address, st.state_name as state_name, c.country_name as country from `personal` p INNER JOIN `state_info` st ON p.state = st.SI INNER JOIN `country_info` c ON p.country = c.CID ORDER BY p.id asc limit $start_from, $num_per_page ;";
// $result = mysqli_query($conn, $select);
// if($result){
// $id = 1;
// while($row = mysqli_fetch_assoc($result)){
// $skk ="";
// $sql = "SELECT * FROM `user_skill` WHERE `skill_id` IN (".$row['skill'].")";
// $getdata = mysqli_query($conn, $sql);
// while($res = mysqli_fetch_assoc($getdata)){
// $skk .= $res['skill_content'].", "; 
// }
// echo "<tr>
// <td>".$row['id']."</td> 
// <td>".$row['fname']."</td> 
// <td>".$row['lname']."</td>
// <td>".$row['age']."</td>
// <td>".$row['dob']."</td>
// <td>".$row['gender']."</td>
// <td>".$row['edu']."</td>
//  <td>".$skk."</td>
//  <td>".$row['primary_address']."</td>
//  <td>".$row['secondary_address']."</td>
//  <td>".$row['state_name']."</td>
// <td>".$row['country']."</td>

// </tr>";
// $id++;
// }
// }
// else{
//    echo "not fetch";
// }
 

// </table>
// <div class="center_content">
// <?php
// $select1 = "SELECT p.fname as fname, p.lname as lname, p.age as age, p.dob as dob, p.gender as gender, p.education as edu,  p.skill as skill, p.address1 as primary_address, p.address2 as secondary_address, st.state_name as state_name, c.country_name as country from `personal` p INNER JOIN `state_info` st ON p.state = st.SI INNER JOIN `country_info` c ON p.country = c.CID;";
// $query_run = mysqli_query($conn, $select1);
// $total_record = mysqli_num_rows($query_run);
// $total_page = ceil($total_record/$num_per_page);
// if($page>1){
// echo"<a href='problem_11.php?page=".($page-1)."'class = 'button'>< Previous</a>";

// }


// if($total_page >$page){
// echo"<a href='problem_11.php?page=".($page+1)."' class = 'button' >Next ></a>";

// }

 

?>