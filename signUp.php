<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Sign Up</title>
    <style>
    .empty_Message{
        margin: 0px;
    margin-left: 20px;
    }
    </style>
</head>
 
<body>
    <?php
    $email=$pass =$cpass =""; 
    $info = "";
    $showError = true;
    $email_error=$pass_error= $cpass_error= "";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        include 'all_function.php';
     
        if(!empty($_POST['email'])){
       
        }
    else{
        $email_error = "Please Enter your Email";
    }
    if(!empty($_POST['pass'])){
        $pass = $_POST['pass'];
        }
    else{
        $pass_error = "Please Enter your Password";
    }
     
      
        if(!empty($_POST['cpass'])){
            $cpass = $_POST['cpass'];
            }
        else{
            $cpass_error = "Please Enter your Confirm Password";
        }
        $email = $_POST['email'];
        $pass = $_POST['cpass'];
        $cpass = $_POST['pass'];
        if($email!="" && $pass!="" && $cpass != ""){
            
   if($pass == $cpass){
                $hashpass = password_hash($pass, PASSWORD_DEFAULT);
            $showMessage = insert("user_signup", array('email'=> $email, 'password' => $hashpass));
            if($showMessage){
                $showError = false;
            $info = "Your form Submited Now You Logged In!";

            }
            else{
                $info = "Not available";
}
   }
   else{
       $info = "password does not match ";
   }
        }
        else{
            $info =  "Please Fill Requaired Filled";
        }
        }
    ?>
    <div class="container">
<div class = "getMessage"><h2><?php echo $info?></h2></div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
            <hea</head>
            <div class="formInner">
                <input type="email" name="email" placeholder="Email">
                  <p class ="empty_Message"><?php echo $email_error;?></p>
            </div>
            <div class="formInner">
                <input type="password" name="pass" id="pass" placeholder="Password">
                <p class ="empty_Message"><?php echo $pass_error;?></p>
            </div>
            <div>
                <input type="password" name="cpass" id="cpass" placeholder="Confirm Your Passsword">
                <p class ="empty_Message"><?php echo $cpass_error;?></p>
            </div>
            <input type="submit" value="Submit" id="submit" name = "submit">
            <h3 class = "login"><a href="index.php">Log In! </a></h3>
        </form>
    </div>
</body>
</html>