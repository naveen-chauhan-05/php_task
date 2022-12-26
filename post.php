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
    <link rel="stylesheet" href="CSS/styles12.css">
    <title>Post</title>
<?php
$showMessage = false;

?>
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
   <div class="post_container">
      <?php
     
      $session_email = $_SESSION['email'];
        $insert = false;
         include 'all_function.php';
         $showHeading ="";
         $title =  $description = $category ="";
         $title_error = $description_error = $category_error = "";
      if($_SERVER['REQUEST_METHOD']=="POST"){
           if(!empty($_POST['title'])){
            $title = $_POST['title'];
           }
           else{
            $title_error = "Please Filled Title ";  
           }
           if(!empty($_POST['description'])){
            $description  = $_POST['description'];
           }
           else{
            $description_error = "Please Filled Description";  
           }
           if(!empty($_POST['category_game'])){
            $cat = $_POST['category_game'];
            $category = implode(",", $cat);
           }
           else{
            $category_error = "Please Filled Category";  
           }
     
           $author = $_POST['author'];
          
        if($title!="" && $description!="" && $category!="" && $author != ""){
            $showMessage = insert("post_category", array('title'=> $title,'description' => $description, '	Game_Category' => $category, 'post_user'=> $author));
            
            if($showMessage){
                    $insert = true;
                $showHeading ="Inserted your data";
            }
            else{
                $showHeading= "Not inserted";
            }
            }
      }
   
      
      ?>
     
    <div class="subContainer">
    <h1 class="mainHeading">POST</h1>
      
    
          
            <div class= "post_form">
        
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
<div class="subcontainer_post">
<h2 class="subHeading">
           <?php echo $showHeading;?>
       </h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id = "form">

            <div class="formContainer2">
          
            <input type="text" placeholder="Title" name = "title">  
            <p class ="empty_Message"><?php echo $title_error;?></p> 
            <textarea  placeholder="Description" name= "description"></textarea>
            
            <p class ="empty_Message"><?php echo $description_error;?></p> 
            <?php   $select = selectOneRow('user_signup', array('email' =>$session_email));
              
            echo '<input type="hidden" value="'.$select['Author'].'" name = "author">';
         
            ?>
            </div>
            <div class="formContainer3">
             <input type="submit" id = "submit" class = "button_secondary submit" value="Publish">
            
                <div class="checkbox">

                        <div class="checkboxInner">
                            <h3 class="subheading">
                                Categories
                            </h3>
                            <h3>
                                ^
                            </h3>
                            <h3>

                            </h3>
                            <hr>
                          <div class="category_content">
                                <h3 class="clicker" id ="allcategory" onclick = "toggleShow()">All Categories</h3>
                                 <h3 class="clicker"  onclick = "toggleHide()" id = "most" >Most Used</h3>

                          

                                <div class="hiddendiv1" id ="divHide">
                                    <?php 
                                    $showdiv = false;
                                    $table = select("game_category");
                                    $i = 0;
                                    foreach ($table as $key => $value) {
                                    echo '<input type="checkbox" name ="category_game[]" value = "'.$value['cid'].'">'.$value['category_name'].'<br>';
                                    $i++;
                                     }
                                
                                    ?>
                                </div>
                                      <div class="hiddendiv" id= "showDiv">
                                      <?php
                                      $select_array = select("post_category");
                                       foreach ($select_array as $key => $value) {
                                       
                                           $value_array = explode(",", $value['Game_Category']);
                                       
                                        //    $array = countRowCondition("post_category", $value_array);
                                       }
                                       $array = countRowCondition("post_category", array('Game_Category'));
                                 $showdiv = false;
                                 $table = select("game_category");
                                  
                                  
                                 foreach ($array as $key1 => $value1) {
                                   
                                    
                                    $i = 1;
                                    $check = $value1['Game_Category'];
                                     foreach ($table as $key => $value) {
                                       if($check==$i)
                                          {
                                        echo '<input type="checkbox" name ="category_game[]" value = "'.$i.'">'.$value['category_name'].'<br>';
                                        
                                    
                                     }
                                    
                                    $i++;
                                  
                                 }
                                
                              }
                                 
                                 ?>
                                </div>
                                <p class ="empty_Message"><?php echo $category_error;?></p>
                            </div>
                                <div class="edit_page">
                                        <a href="category.php">+add new Category</a>
                            </div>
                            
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
       
   </div>
   <script>
function toggleHide(){
    let most = document.getElementById('most'); 
    let showDiv = document.getElementById('showDiv');
    let divHide = document.getElementById('divHide');
    showDiv.style.display = "block";
    if(showDiv.style.display = "block"){

divHide.style.display = "none";
    }
    else{

divHide.style.display = "block";
showDiv.style.display = "none";
    }
  
}

    function toggleShow(){
        let most = document.getElementById('most'); 
    let divHide = document.getElementById('divHide');
    divHide.style.display = "block";
    if( divHide.style.display = "block"){
        showDiv.style.display = "none";  
    }
    }
    

 
   </script>
</body>
</html> 
<?php }
else{
    header("Location: index.php");
}
?>