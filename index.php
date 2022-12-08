<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Login</title>
    <style>
.empty_Message{
    text-align: left;
    margin:0px;
    margin-left: 25px;
}
    </style>
</head>
<body>
 
 <?php 
 $loggin = false;
 $showMessage = "";
 $password  = $email = ""; 
 $passwordError = $email_error="";
 if($_SERVER['REQUEST_METHOD']=="POST"){
    include 'all_function.php';
     $email = $_POST['email'];
     if(!empty($_POST['email'])){
        $email = $_POST['email'];
        }
        else{
            $email_error = "Please filed Your Email";
        }
     if(!empty($_POST['password'])){
     $password = $_POST['password'];
     }
     else{
         $passwordError = "Please filed Your password";
     }
     if($password!=""){
            $row = selectOneRow("user_signup", array('email'=>$email ));
    
            if($row){
                if(password_verify($password, $row['password'])){
                    $loggin = true;
                    session_start();
                    $_SESSION['loggedIn']=true;
                    $_SESSION['email'] = $email;
                    
                    header("location: post.php");

                    }
                else{
                        $showMessage = "Sorry Wrong Password";
                     }

            }
            else{
                $showMessage = "Sorry wrong email";
            }
  
        }
            
 }
 ?>


  <div class="container_index">
   <div class="showMessage"><h3> <?php echo $showMessage?></h3></div>
    
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >

<div class="formInner_index">
    
    <input type="email" id="email" name="email" placeholder="Email">
    <p class ="empty_Message"><?php echo $email_error;?></p>
</div>

<div class="formInner_index">
  
    <input type="Password" id="email" name="password" placeholder="password">
    <p class ="empty_Message"><?php echo $passwordError;?></p>
</div>
 <div class="formButton">
<input type="submit" value="Submit" id = "submit">
 </div>


      </form>
      <h3 class = "login"><a href="signUp.php">Sign Up</a></h3>
  </div>
 
</body>
</html>