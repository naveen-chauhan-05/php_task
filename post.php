<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>

<style>

    .container{
    margin: 25px auto;
    width: 100%;
    height: 800px;
    border: 2px solid black;
}
form{
    display: flex;
    height: 100%;
}
.formContainer{
     
    width: 20%;
    height: 70%;
}
textarea{
    height: 90%;
    margin: 10px;
    width: 90%;
    text-align: center;

}
.formContainer2{
    
     width: 30%;
     height: 60%;
 }
 .formContainer3{
     border: 2px solid black;
    width: 30%;
     height: 60%;
 }
 input[type = "text"]{
    margin: 10px;
width: 90%;
height: 40px;
 }
 input[type = "submit"]{    
     margin: 20px;
     padding: 15px 40px;
 }
 ::placeholder{
     text-align: center;
 }
 h3{
     margin: 0px 10px;
     display: inline-block;
 }
 .checkboxInner{
     border: 1px solid black;
 }

</style>
</head>
<body>
   <div class="container">
      <?php
      if($_SERVER['REQUEST_METHOD']=="POST"){
          include 'all_function.php';
      $title = $_POST['title'];
      $description  = $_POST['description'];
      $category = $_POST['category_game'];
      
       var_dump($category);
      $showMessage = insert("post_category", array('title'=> $title,'description' => $description, '	Game_Category' => $category));
    
      if($showMessage){
          echo "inserted your data  ";
      }
      else{
          echo "not inserted";
      }
      }
      
      ?>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
          
            <div class="formContainer">
                <textarea name="textarea" placeholder="Post"></textarea>
            </div>

            <div class="formContainer2">
            <input type="text" placeholder="Title" name = "title">   
            <textarea  placeholder="Description" name= "description"></textarea> 
            </div>
            <div class="formContainer3">
            <input type="submit" value="Publish">
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
                            <h3><a href="post.php">ALl category</a></h3>
                            <h3><a href="mostCategory.php">Most Used</a></h3>
                            <div class="category">
                               <input type="checkbox"   name = "category_game" value="1">Footbal<br>
                               <input type="checkbox" name = "category_game" value ="2">Cricket<br>
                               <input type="checkbox" name = "category_game1"value ="3">BaseBall<br>
                            </div>
                        
                        </div>
                        <div>
                                <a href="category.php">+add new Category</a>
                            </div>
                            
                </div>
            </div>
                  </form>
       
   </div>
</body>
</html> 