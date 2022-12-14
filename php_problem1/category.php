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
    <title>Category</title>
    <link rel="stylesheet" href="CSS/styles12.css">
    <style>
.login{
    border: 2px solid black;
    padding: 10px;
    border-radius: 10px;
    margin: 10px;
    font-size: 18px;
}
a{
    text-decoration: none;
}

</style>
</head>

<body>


<div class="container">
<h2 class = "mainHeading">CATEGORY ADD/EDIT</h2>
<div class="container_category">
    <div class = "subcontainer_category">
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

    <div class="subcontainer1">
                            <?php 
                    
                    include 'all_function.php';
                    $getId = false;
                    $show_Message = "";
                    
                    ?>
                            <?php
                if(!empty($_GET['catid'])&&$_GET['catid'] && $_GET['success']==true){
                    $getId = true;
                $val = $_GET['catid'];

                    $select_one_row = selectOneRow("game_category", array('cid'=>$val));
                    
                }
                    $game_category = $description = $parent_category = "";
                    
                    
                $_SESSION['error']= [];

                $check_empty = false;
                if(isset($_POST['save'])){    
                if($getId==true){     
                    if($_POST['game']== ""){
                        $_SESSION['error']['game'] = "Game Title Should not be empty";
                    
                    }
                    else{
                        $game_category = $_POST['game'];
                    }
                    if($_POST['description']== ""){
                        $_SESSION['error']['description'] = "Game Description  Should not be empty";
                    
                    }
                    else{
                        $description = $_POST['description'];
                    }
                        $parent_category = $_POST['parent_category'];
                    
                    if($game_category!="" && $description != "" ){
                                $update = update1("game_category", array('parent_category' =>$parent_category, 'category_name'=> $game_category, 'game_description'=>$description), array('cid'=>$val));
                            
                                if($update){
                                    $check_empty = true;
                                    $show_Message = "Yes Edition successfully";
                                

                                }
                                else{
                                    $show_Message ="Sorry No Edition successfully";
                            
                                }
                        }
                    
                    else{
                    $show_Message = "In update You can not update Empty value";
                
                    }
                }
                    else{        

                        if($_POST['game']== ""){
                            $_SESSION['error']['game'] = "***Game Title Not be empty";
                        
                        }
                        else{
                            $game_category = $_POST['game'];
                        }
                        if($_POST['description']== ""){
                            $_SESSION['error']['description'] = "***Your description is empty so You didn't update any value";
                        
                        }
                        else{
                            $description = $_POST['description'];
                        }
                            
                        
                        
                            $parent_category = $_POST['parent_category'];
                        
                        if($game_category!="" && $description != ""){
                                $insert = insert("game_category", array('category_name'=>$game_category, 'game_description'=>$description, 'parent_category'=>$parent_category));
                                
                                if($insert){
                                    $check_empty = true;
                                    $show_Message = "Your Game category & Description are Inserted";

                                }
                                else{
                                    $show_Message = "This is not Inserted";
                                
                                }
                        }
                        else{
                            $show_Message=  "Sorry not Empty any field ";
                    
                        }
                    }  
                }
                    
                    ?>

        <div class="Innerclass">
                        <?php if(isset($_POST['save'])){echo "<h3 class ='mainHeading  '>".$show_Message."</h3>";}?>
                                <form action="" method="post" >
                        <div class="formInner">
                            <input type="text" placeholder="Title" name = "game" value ="<?php if($getId != false){echo $select_one_row['category_name'];}else{
                                if(!empty($game_category) && $check_empty!=true){
                                    echo $game_category;
                                }
                            }
                            ?>">required
                            <?php if(isset($_SESSION['error']['game']))echo "<p class ='para'>".$_SESSION['error']['game']."</p>";?>
                        </div>
                        <div class="formInner">
                                <textarea name="description" placeholder="Description" value =""><?php if($getId !=false){echo $select_one_row['game_description'];}else{
                                if(!empty($description) && $check_empty!=true){
                                    echo $description;
                                }
                                }?></textarea>Not required
                             <?php if(isset($_SESSION['error']['description']))echo "<p  class ='para'>".$_SESSION['error']['description']."</p>";?>
                        </div>
                        <div class="formInner">
                        
                            <select name="parent_category" id="">
                            <option value="">Parent Category</option>
                            <?php    $category = select('game_category');
                        foreach ($category as $key => $value) {
                        ?>
                        <option value="<?php echo $value['cid'];?>" <?php if($getId==true && $val==$value['cid']){
                            echo "selected='selected'";}else{
                                if(!empty($parent_category) && $check_empty!=true && $parent_category == $value['cid']){
                                    echo "selected='selected'";
                                }
                            }
                            ?>><?php echo $value['category_name'];?></option><?php
                        }
                        
                            ?>
                            </select>
                             
                        </div>
                        <div class="formInner">
                            <input type="submit" value="save" name = "save" class = "submit button_secondary">
                         
                        
                        </div>
                        
                        </form>
        </div>
     <div class="Innerclass2">
                
                <?php  

                $select = select("game_category");
        
        echo '<p class = "update_button"><a href="category.php">Add new Category</a></p>';
                foreach ($select as $key => $value) {
                    echo "<p class = 'update_button'><a href='category.php?catid=".$value['cid']."&&success=true'>".$value['category_name']."</a></p>";

                }

                ?>
                
    </div>
    </div>
                            
                            
                
       
</div>
  
</div>
</body>
</html> 
<?php }
else{
    header("Location: index.php");
}