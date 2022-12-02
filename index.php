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
  <div class="container">
      <form action="" method="post" >

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
  </div>
 
</body>
</html>