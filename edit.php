<?php 
session_start();
if($_SESSION['loggedIn'] && $_SESSION['loggedIn']==true){
echo "login by ".$_SESSION['email'];
include 'all_function.php';                   
// include 'all_function.php';
$getId = false;
$show_Message = "";
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
    .editContainer{
        border: 2px solid black;
        width: 80%;
        margin: 10px auto;
        text-align: center;
    }
    .formInner_edit{
        /* border: 2px solid red; */
        margin: 10px auto;
        width: 60%;
    }
    input[type="text"]{
        width: 100%;
        height: 50px;
        text-align: center;
    }
    select{
        width: 100%;
        text-align: center;
        height: 50px;
    }
    
    </style>
</head>
<body>
<div class="editContainer">
<?php 
if(!empty($_GET['title']) && $_GET['title'] && $_GET['success']==true){ 
    $id= $_GET['title'];
    $select = selectOneRow("post_category", array('id'=>$id));
    $getId = true;
    }
    
$title = $category = $user_name = $date = "";
$titleError = $categoryError = $user_nameError = $dateError = "";
$getUpdate = false;
$getMessage = "";
 
if(isset($_POST['update'])){
    $idEdit = $_POST['editId'];
    
            if(empty($_POST['title'])){
                $titleError = "Plese fill title";
            }
            else{
                $title = $_POST['title'];
            }
            if(empty($_POST['category'])){
                $categoryError = "Plese fill category";
            }
            else{
                $category = $_POST['category'];
            }

        
        if(empty($_POST['user_name'])){
            $titleError = "Plese fill user name";
        }
        else{
            $user_name = $_POST['user_name'];
        }
        if(empty($_POST['date'])){
            $dateError = "Plese fill user name";
        }
        else{
            $date = $_POST['date'];
        }
        $title = $_POST['title'];
        $category = $_POST['category'];
        $user_name = $_POST['user_name'];
        $date = $_POST['date'];

    if($title!="" && $category>0 && $user_name != "" && $date != ""){
       
        $update = update1("post_category", array('title'=>$title, 'Game_Category'=>$category, 'post_user'=>$user_name, 'timestamp'=>$date), array('id' => $idEdit));
         
        if($update){
            $getUpdate = true;
            header("Location: list.php");
        }   
        else{
            $getMessage = "Sorry Not Updated";
        }    
    }
    else{
    $getMessage = "Please Not update any empty value";
}
 
}

?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST"> 
    <input type="hidden" value = "<?php echo $id;?>" name = "editId"> 
        <div class="formInner_edit">
                <input type="text" name="title" value= "<?php if($getId==true){ echo $select['title'];}?>">
                <p class ="empty_Message"><?php echo $email_error;?></p>
        </div>

        <div class="formInner_edit">
                <select name="category" id="">
                    <option value=""> Category</option>
                        <?php    $category = select('game_category');
                            foreach ($category as $key => $value) {
                            ?>
                                <option value="<?php echo $value['cid'];?>" <?php if($getId==true && $select['Game_Category']   ==$value['cid']){
                                echo "selected='selected'";} 
                                ?>><?php echo $value['category_name'];?></option><?php
                             }
                        
                            ?>
                </select>
        </div>
             
        <div class="formInner_edit">
                <input type="text" name="user_name" value= "<?php echo $select['post_user'];?>">
                  <p class ="empty_Message"><?php echo $email_error;?></p>
        </div>

        <div class="formInner_edit">
                <input type="text" name="date" value= "<?php echo $select['timestamp'];?>">
                <p class ="empty_Message"><?php echo $email_error;?></p>
        </div>
        <input type="submit" value="Update" name = "update">
            
    </form>
</div>
</body>
</html>
 <?php }
 else{
    $_SESSION['loggedin']=false;
    header("Location: index.php");
 }