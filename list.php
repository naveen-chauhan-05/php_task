<?php 
session_start();
if($_SESSION['loggedIn'] && $_SESSION['loggedIn']==true){
echo "login by ".$_SESSION['email'];

?>
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
    width 100%;
display: flex;
}
.menu{
  /*border: 2px solid green;*/
  align-self: start;
    padding: 15px;
    /* border: 2px solid green; */
    width: 15%;
    margin: 2px;

}
.all_page{
    text-align:center;
    border: 2px solid green;
    margin: 10px;
    font-size: 20px;
}
.field{
  /*border: 2px solid red;*/
  width: 80%;
}
.table_container{
    width: 100%;
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
     margin-right: 10px;
     background-color: #e5ede5;
     padding: 15px 5px;
        
     align-self: end;
     
      
 }
 .list_navbar{
     display: flex;
     width: 100%;
     margin: 2px auto;
     padding: 5px 0px;
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
        font-size: 18px;
     align-self: start;
     /* border: 2px solid black; */
     

 }
  
    .bottomDiv{
        display: flex;
    justify-content: space-between;
    width: 100%;
    }
    td a{
        text-decoration: none;
    }
    form{
      width: 100%;
    }
.para{
  color: red;
}
.deleteButton{
    border: 2px solid black;
        padding: 10px;
         font-size: 18px;
        border-radius: 10px;

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
  <div class = "menu">
                <div class= "all_page">
                <a href="post.php">Post</a>
                </div>
                <div class="all_page">
                <a href="list.php">Show list</a>
                </div>
                <div class="all_page">
                    <a href="category.php">Category</a>
                </div>
                <div class="all_page">
                    <a href="signOut.php">LogOut</a>
                </div>

    </div>
  <div class="field">
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
    <form action="" method="GET">
<input type="text" placeholder = "search" name = "value">
<input type="submit" value ="search" name = "search">
</form>
</div>
 </div>
    
    <?php if(isset($_POST['delete'])){
$delete_value = $_POST['edit'];
 
if(!empty($delete_value)){
  // $delete = getDelete();
  foreach ($delete_value as $key => $value) {
    $delete = getDelete('post_category', array('id'=>array($value)));
  }
  if($delete){
    echo "<p class ='para'>Your Value are deleted</p>";
  }

}else{
  echo "<p class = 'para'>Select any value for deleting!</p>";
}

  }?>
     <form action ="" method="post">
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
          if(isset($_GET['search'])){
            $search = $_GET['value'];
        
        }
            
              
          $select = select("post_category", $limit, $offset);
          
          $numberRows = count_row("post_category");
          
          if($catid!=""){
              $select = select("post_category", $limit, $offset, array('Game_Category'=>$catid));
               
              $numberRows = count_row("post_category", array('Game_Category'=>$catid));
           
        }
        if($firstDate!="" || $endDate!= ""){
            
          $select = select("post_category", $limit, $offset, array('Game_Category'=>$catid), array('timestamp' => $firstDate), array('timestamp'=>$endDate));
         
          $numberRows = count_row("post_category", array('Game_Category'=>$catid), array('timestamp'=> $firstDate), array('timestamp'=>$endDate));
            
    }
       if($search!=""){
        $array = select("post_category");
        
        foreach ($array as $key => $value) {
            if($search==$value['title']){
                 $temp = $value['title'];
                 $val = 'title';
                 
                
            }
            if($search==$value['post_user']){
                $temp = $value['post_user'];
                $val = 'post_user';
                
               
            }
            if($search==$value['description']){
                $temp = $value['description'];
                $val = 'description';
                
            }
        }
        $select = select("post_category", $limit, $offset, array($val=>$temp));
        $numberRows = count_row("post_category", array($val=>$temp));
       }
      
           echo "<tr>";

           foreach ($select as $key => $value) {
            // $v1  = selectOneRow("game_category", array('cid'=>$value['Game_Category']));
            // echo "<pre>";
            // print_r($select);
            $v2 = explode(",", $value['Game_Category']);
            echo "<pre>";
            $index = 0;
            foreach ($v2 as $k => $v) {
                $v1  = selectOneRow("game_category", array('cid'=>$v));
               
                if($index==0){
                $game = $v1['category_name'];
                }
                else{
                    $game .= " , ";
                    $game .= $v1['category_name'];
                }
                $index++;
            
            }
           echo  '<td><input type="checkbox" name ="edit[]" value='.$value['id'].'><a href="edit.php?title='.$value['id'].'&&success=true">'.$value['title'].'</a></td>';
           echo "<td>".$value['post_user']."</td>";
           echo  '<td>'.$game.'</td>';
           echo  '<td>'.$value['timestamp'].'</td>';
           echo "</tr>";
           }
           
           ?>
       
        </table>
        <div class="bottomDiv">
        <div class= "logOutDiv">
      <input type="submit" name="delete" value="Delete" class="deleteButton">
        </div>
      </form>
        
        <div class="footer">
       
    <?php  
  
    echo "<span class = 'text'>".$numberRows." items </span>";
      paging($limit, $numberRows, $page);
    
          
    ?>
    
    </div>
        </div>
  
    </div>
</div>
    
</div>
  

     
 </body>
 </html>
 <?php }
 else{
     header("Location: index.php;");
 }
 ?>