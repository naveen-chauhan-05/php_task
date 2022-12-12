<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>List All</title>
     <style>
.list_container{
    border:2px solid black;
    width 90%;
}
.table_container{
    width: 70%;
    margin: 10px auto;
    border: 2px solid red;
    /* margin: 5px; */

}
table{
    cell-padding: 10px;
    width: 90%;
    margin: 2px auto;
    border: 2px;
    border-collapse: collapse;
}
  tr td{
      padding: 8px;
 }
 
    </style>
 </head>
 <body>
 <?php
 include 'all_function.php';

 
 ?>
<div class="list_container">
    <div class="subcontainer">

    </div>
    <div class="table_container">
        <table border="2">
      
 <tr>
 <td><input type="checkbox" name ="" id = ""/>Title</td>
           <th>Author</th>
              <th>Category</th>
              <th>Date</th>
 </tr>
        
           
           <?php 
           $select  = select("post_category");
           echo "<tr>";
           foreach ($select as $key => $value) {
           echo  '<td><input type="checkbox" name ="" id = ""/>'.$value['title'].'</td>';
           echo "<td>".$value['post_user']."</td>";
           echo  '<td>'.$value['description'].'</td>';
           echo  '<td>'.$value['timestamp'].'</td>';
           echo "</tr>";
           }
           
           ?>
       
        </table>
    </div>
    <div class="footer">
    <?php 
    
    $count = count_row("post_category");
    echo $count;
    
    
    ?>
    
    </div>
</div>
  

     
 </body>
 </html>