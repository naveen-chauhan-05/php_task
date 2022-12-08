<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
<?php
$showMessage = false;

?>
<style>

    .container{
   
    width: 100%;
    height: 600px;
    /* border: 2px solid black; */
}
.mainHeading{
    text-align: center;
    margin: 2px;
}
.subContainer{
    border: 2px solid black;
    margin: 2px auto;
    width:  90%;
    height: 80%;
}
.subHeading{
    margin: 2px;
    text-align: center;
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
     /* border: 2px solid black; */
    width: 40%;
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
     border: 2px solid black;
 }

 .category_content{
     margin: 5px;
 }
 .edit_page{
     margin: 5px;
 }
 .clicker {
        width: 30%;
 color: blue;
outline:none;
cursor:pointer;
}
.hiddendiv1{
    background-color: yellow;
}
.hiddendiv{
 display: none;

 
 
}


</style>
</head>
<body>
   <div class="container">
      <?php
         include 'all_function.php';
         $showHeading ="";
      if($_SERVER['REQUEST_METHOD']=="POST"){
           
      $title = $_POST['title'];
      $description  = $_POST['description'];
      $category = $_POST['category_game'];
      
        
      $showMessage = insert("post_category", array('title'=> $title,'description' => $description, '	Game_Category' => $category));
    
      if($showMessage){
         $showHeading ="Inserted your data";
      }
      else{
          $showHeading= "Not inserted";
      }
      }

      
      ?>
      <h1 class="mainHeading">POST</h1>
    <div class="subContainer">
       <h2 class="subHeading">
           <?php echo $showHeading;?>
       </h2>
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
                          <div class="category_content">
                                <h3 class="clicker" id ="allcategory" onclick = "toggleShow()">All Categories</h3>
                                 <h3 class="clicker"  onclick = "toggleHide()" id = "most" >Most Used</h3>

                                <div class="hiddendiv" id= "showDiv">
                                 <?php
                                 $array = countRowCondition("post_category", array("Game_Category"));
                                 $showdiv = false;
                                 $table = select("game_category");
                                
                                  
                                 foreach ($array as $key1 => $value1) {
                                    
                                    $i = 1;
                                    $check = $value1['Game_Category'];
                                     foreach ($table as $key => $value) {
                                       if($check==$i)
                                          {
                                        echo '<input type="checkbox" name ="category_game" value = "'.$i.'">'.$value['category_name'].'<br>';
                                    
                                     }
                                    
                                    $i++;
                                  
                                }
                                
                            }
                                 
                                 ?>
                                </div>

                                <div class="hiddendiv1" id ="divHide">
                                    <?php 
                                    $showdiv = false;
                                    $table = select("game_category");
                                    $i = 0;
                                    foreach ($table as $key => $value) {
                                    echo '<input type="checkbox" name ="category_game" value = "'.$i.'">'.$value['category_name'].'<br>';
                                    $i++;
                                     }
                                
                                    ?>
                                </div>
                            </div>
                                <div class="edit_page">
                                        <a href="category.php">+add new Category</a>
                            </div>
                            
                </div>
            </div>
        </form>
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