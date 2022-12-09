<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="CSS/styles.css">

<style>
 
</style>
</head>
<body>


<div class="container">

<h2 class = "mainHeading">CATEGORY ADD/EDIT</h2>
    
<div class="container_category">
  
      <?php 
      
      include 'all_function.php';
      $getId = false;
      
      ?>
      
      
      
    <div class = "subcontainer">
        <form action="" method="post" >
                 <div class="subcontainer0">

                     <div class="formInner">
                
                        <input type="text" id="title"  placeholder="Post">
                     </div>
            
                    <div class="formInner">
              
                     <textarea id="desc"  placeholder="Categories"></textarea>
                    </div>
            
                </div>
        </form>


    </div>

            <div class="subcontainer1">
            <?php
if($_GET['catid'] && $_GET['success']==true){
$val = $_GET['catid'];
$getId = true;
      $select_one_row = selectOneRow("game_category", array('cid'=>$val));
     
}
   ?>   
   
            <?php
      $game_category = $description = $parent_category = "";
      $game_error = $descriptionError = $categoryError = "";
      $show_Message = "";
      if(isset($_POST['save'])){
        
        if($getId==true){
            $game_category = $_POST['game'];
            $description = $_POST['description'];
            $parent_category = $_POST['parent_category'];
            
  $update = update1("game_category", array('parent_category' =>$parent_category, 'category_name'=> $game_category, 'game_description'=>$description), array('cid'=>$val));
  var_dump($update);
  if($update){
      $show_Message = "Yes Edition successfully";

  }
  else{
      $show_Message ="Sorry No Edition successfully";
  }
        }
        else{
           $game_category = $_POST['game'];
            $description = $_POST['description'];
            $parent_category = $_POST['parent_category'];
             
            $insert = insert("game_category", array('category_name'=>$game_category, 'game_description'=>$description, 'parent_category'=>$parent_category));
            
            if($insert){
                $show_Message = "Yes this is Inserted";

            }
            else{
                $show_Message = "This is not Inserted";
            }
        }
      }
      
      ?>

<div class="Innerclass">

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
<div class="formInner">
    <input type="text" placeholder="Title" name = "game" value ="<?php echo $select_one_row['category_name']?>">required
</div>
<div class="formInner">
    <textarea name="description" placeholder="Description" value =""><?php echo $select_one_row['game_description'];?></textarea>Not required
</div>
<div class="formInner">
 
    <select name="parent_category" id="">
    <option value="">Parent Category</option>
    <?php    $category = select('game_category');
 foreach ($category as $key => $value) {
  ?>
  <option value="<?php echo $value['cid'];?>" <?php if($getId==true && $val==$value['cid']){
      echo "selected='selected'";}
      ?>><?php echo $value['category_name'];?></option><?php
 }
   
    ?>
    </select>
</div>
<div class="formInner">
    <input type="submit" value="save" name = "save">
</div>
</div>
<div class="Innerclass2">
 
<?php  

$select = select("game_category");
echo "<pre>";
foreach ($select as $key => $value) {
    echo "<p class = 'update_button'><a href='category.php?catid=".$value['cid']."&&success=true'>".$value['category_name']."</a></p>";

}

?>
 
</div>
            </div>
            
            
                  </form>
       
   </div>
</div>
</body>
</html> 