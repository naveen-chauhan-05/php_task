<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
.container{
    margin: 25px auto;
    width: 60%;
    height: 400px;
    border: 2px solid black;
}
.formInner{
    margin: 20px auto;
    text-align: center;
    width: 80%;
    text-align: center;
    width: 80%;
    
}
input[type=password], input[type=email], input[type=submit]{
            width: 90%;
            height: 50px
           
        }
        ::placeholder {  
  text-align: center;
  font-size: 15px;
}
.formButton{
    margin: 20px auto;
    text-align: center;
    width: 40%;
}
    </style>
</head>
<body>
 
 <?php 
 $loggin = false;
 $showMessage = "";
 if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'all_function.php';
     $email = $_POST['email'];
     $password = $_POST['password'];

     $row = selectOneRow("user_signup", array('email'=>$email ));
     print_r($row);
     if($row){
         if(password_verify($password, $row['password'])){
            $loggin = true;
            session_start();
            $_SESSION['loggedIn']=true;
            $_SESSION['email'] = $email;
            header("location: category.php");

         }
         else{
              $showMessage = "Sorry Wrong Password";
         }

     }
     else{
         $showMessage = "Sorry wrong email";
     }
     echo $showMessage;
     
 }
 ?>


  <div class="container">
    
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >

<div class="formInner">
    
    <input type="email" id="email" name="email" placeholder="Email">
</div>

<div class="formInner">
  
    <input type="Password" id="email" name="password" placeholder="password">
</div>
 <div class="formButton">
<input type="submit" value="Submit">
 </div>


      </form>
      <h1><a href="signUp.php">Sign Up</a></h1>
  </div>
 
</body>
</html>