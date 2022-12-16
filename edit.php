<?php 
error_reporting( E_ALL );
ini_set('display_errors', '1');
session_start();
if($_SESSION['loggedIn'] && $_SESSION['loggedIn']==true){
// echo "login by ".$_SESSION['email'];
include 'all_function.php';                   
// include 'all_function.php';
$getId = false;
$show_Message = "";
?>
<?php 
if(!empty($_GET['title']) && $_GET['title'] && $_GET['success']==true){ 
    $id= $_GET['title'];
    $select = selectOneRow("post_category", array('id'=>$id));
    $getId = true;
    
    }
    
$title = $game_category = $user_name = $date = $game = $desc ="";
$titleError = $gameError = $user_nameError = $dateError = $descError ="";
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
            if(empty($_POST['desc'])){
                $descError= "Plese fill Descriptoin";
            }
            else{
                $desc = $_POST['desc'];
            }
            if(empty($_POST['categoryName'])){
                $categoryError = "Plese fill category";
            }
            else{
                $game_category = $_POST['categoryName'];
                $game = implode(",", $game_category);
            }
 
        if(empty($_POST['user_name'])){
            $user_nameError = "Plese fill user name";
        }
        else{
            $user_name = $_POST['user_name'];
        }
        if(empty($_POST['date'])){
            $dateError = "Plese fill date";
        }
        else{
            $date = $_POST['date'];
        }
        $title = $_POST['title'];
      
        $user_name = $_POST['user_name'];
        $date = $_POST['date'];  
    if($title!="" && strlen($game)!=0 && $user_name != "" && $date != ""){   
        $update = update1("post_category", array('title'=>$title, 'Game_Category'=>$game, 'post_user'=>$user_name, 'timestamp'=>$date), array('id' => $idEdit));  
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
        /* text-align: center; */
    }
    .formInner_edit{
        /* border: 2px solid red; */
        margin: 10px auto;
        width: 80%;
    }
    input[type="text"]{
        width: 100%;
        height: 50px;
        font-size: 15px;
        text-align: center;
    }
    textarea{
    width: 100%%;
    font-size: 15px;
}
   
    .mainHeading{
        text-align: center;
        color: red;
        font-size: 30px;
        margin: 5px;
    }
    
input[type ='submit']{
width: 70%;
height: 50px;
font-size: 20px;
}

.formContent{
    display: flex;
    /* border: 2px solid black; */
    margin: 2px;
}
.firstDiv{
    /* border: 2px solid green; */
    margin: 5px;
    width: 45%;
}
.secondDiv{
    /* border: 2px solid red; */
    margin: 5px;
    width: 50%;
}
.hiddendiv1{
    border: 2px solid black;   
    width: 100%;
    padding: 5px;
}
.para{
    font-size: 20px;
    margin: 5px;
    color: red;
    font-weight: bolder;
} 
    </style>
</head>
<body>
<div class="editContainer">
    <h3 class="mainHeading">Welcome Edit Page</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST"> 
    <div class="formContent">
    <div class="firstdiv">
    <input type="hidden" value = "<?php echo $id;?>" name = "editId"> 
        <div class="formInner_edit">
        <label for="title" class = "para"> Title</label><br>
                <input type="text" name="title" id="title" value= "<?php if($getId==true){ echo $select['title'];}else{if($getUpdate!=true){
                    echo $title;
                }}?>">
                <p class ="empty_Message"><?php echo $titleError;?></p>
        </div>
        <div class="formInner_edit">
        <label for="desc"class = "para"> Description</label><br>
         <textarea name="desc" id="" cols="39" rows="10">
         <?php if($getId==true){ echo $select['description'];}else{if($getUpdate!=true){
                    echo $desc;
                }}?></textarea>
                <p class ="empty_Message"><?php echo $descError;?></p>
        </div>

        
             
        <div class="formInner_edit">
        <label for="user"class = "para">Author</label><br>
                <input type="text" name="user_name" id = "user"value= "<?php if($getId==true){echo $select['post_user'];}else{
                    if($getUpdate!=true){ echo $user_name;}}?>">
                  <p class ="empty_Message"><?php  echo $user_nameError;?></p>
        </div>
        </div>
        <div class="secondDiv">
        <div class="formInner_edit">
        
        <input type="submit" value="Update" id = "cat" name = "update" ></div>
        <div class="formInner_edit">   
                    <div class="hiddendiv1" id ="divHide">
                    <label for="desc"class = "para">Category</label><br>
                    <hr>
                                    <?php 
                                   if($getId!=true){
                                    $select = selectOneRow("post_category", array('id'=>$idEdit));
                                   } 
                                   if($getId==true){
                                  $var_array = explode(",", $select['Game_Category']);
                                   }else{
                                       $var_array = explode(",", $game);
                                   }
                                  $table = select("game_category");
                                  foreach ($table as $key => $value) {
                                       ?>
                                       <input type="checkbox" value="<?php echo $value['cid'];?>"<?php foreach ($var_array as $k=> $v){
                                           if($v==$value['cid']){
                                            echo 'checked="checked"';
                                           }

                                        }
                                       ?> name = "categoryName[]"id = "cat"> <?php echo $value['category_name'];?><br>
                                  <?php }
                                    ?>
                                </div>
                             
                </div>
        <div class="formInner_edit">
        <label for="date" class = "para"> Date</label><br>
                <input type="date" name="date" id ="date" value= "<?php if($getId==true){echo $select['timestamp'];}else{
                    if($getUpdate!=true){ echo $date;}}?>">
                <p class ="empty_Message"><?php echo $dateError;?></p>
        </div>
       
        </div>
            </div>
    </form>
</div>
 
</body>
</html>
 <?php }
 else{
    $_SESSION['loggedin']=false;
    header("Location: index.php");
 }