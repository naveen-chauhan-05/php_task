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
    
    display: flex;
    flex-direction: row;
    flex-wrap:wrap;

}
table{
    cell-padding: 10px;
    width: 100%;
   border: 2px dashed #c1c7c2;
   
    /* align-self: end; */
    border-collapse: collapse;
}
  tr td{
      padding: 8px;
 }
 .footer{
     
     margin: 5px;
     background-color: #e5ede5;
     padding: 15px 5px;
        
     align-self: end;
     width: 30%;
      
 }
 .list_navbar{
     display: flex;
     width: 70%;
     margin: 2px auto;
     padding: 5px;
     border: 2px solid black;
     justify-content: space-evenly;

 }
 ::placeholder{
     text-align: center;
 }
 .logOutDiv{
    margin: 5px;
     /* background-color: #e5ede5; */
     padding: 15px 5px;
        
     align-self: start;
     width: 10%;

 }
 .logOut{
        border: 2px solid black;
        padding: 10px;
        border-radius: 10px;
    }
    .bottomDiv{
        display: flex;
    justify-content: space-between;
    width: 100%;
    }

    </style>
 </head>
 <body>
 <?php
 include 'all_function.php';
//  $category = select('game_category');
//  echo "<pre>";
//  print_r($category);
 
 ?>

<div class="list_container">
<div class="list_navbar">
 <div class="firstDiv">
    <form action="" method ="get">
<select name="select" id="">
<?php    $category = select('game_category');
echo "<option value = ''> All Category </a></option>";
 
 foreach ($category as $key => $value) {
     
  ?>
  <option value="<?php echo $value['cid'];?>" <?php if(!empty($_GET['select']) && $_GET['select']==$value['cid']){
      echo "selected='selected'";}?> >
       <?php echo $value['category_name'];?> </option> <?php
 }
   
    ?>
</select>
</div>
<div class="secondDiv">
<input type="text" name= "Date1" placeholder = "first Date" onclick= "(this.type='date')">
</div>
<div class="thirdDiv">
<input type="text" name= "Date2" placeholder = "End Date" onclick= "(this.type='date')">
</div>
<div class="fourthDiv">
    <input type="submit" value = "filter" name = "filter">
</div>
</form>
<div class="thourthDiv">
<input type="search">
<input type="submit" value ="Search Post">
</div>
 </div>
    <div class="subcontainer">

    </div>
    <div class="table_container">
        <table border="1">
      
 <tr>
 <td><input type="checkbox" name ="" id = ""/>Title</td>
           <th>Author</th>
              <th>Category</th>
              <th>Date</th>
 </tr>
        
           
           <?php 
           if(isset($_GET['page'])){
            $page = $_GET['page'];
          }
          else{
            $page = 1;
          }
           
          $limit = 5;
          $i = 0;
          $offset = ($limit *$page)-$limit;
          if(isset($_GET['filter'])){
                $catid = $_GET['select'];
                $firstDate = $_GET['Date1'];
                $endDate= $_GET['Date2'];
                
                
          }
          if($catid==""){  
          $select = select("post_category", $limit, $offset);
          
          $numberRows = count_row("post_category");
          }
          else{
              $select = select("post_category", $limit, $offset, array('Game_Category'=>$catid));
               
              $numberRows = count_row("post_category", array('Game_Category'=>$catid));
              
          }
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
        <div class="bottomDiv">
        <div class= "logOutDiv">
        <a href="signOut.php" class="logOut">LogOut</a>
        </div>
        <div class="footer">
       
    <?php  
  
    echo "<span class = 'text'>".$numberRows." items </span>";
      paging($limit, $numberRows, $page);
    
          
    ?>
    
    </div>
        </div>
  
    </div>

    
</div>
  

     
 </body>
 </html>