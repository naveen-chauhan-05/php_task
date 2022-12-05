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
    
}
.subcontainer{
    width: 30%;
    height: 200px; 
    border: 2px solid red;
     margin: 10px;
   
}   
.subcontainer1{
     margin: 10px;
width: 80%;
border: 2px solid green;
height: 500px;
display: flex;

}
.Innerclass{
  
    margin: 10px;
    width: 70%;
}
.Innerclass2{
    border: 2px solid gray;
    margin: 10px;
    width: 30%;
}
::placeholder {  
  text-align: center;
  font-size: 15px;
}
.formInner{
    margin: 10px;
  
}
input[type=text],input[type=submit]{
            width: 70%;
            height: 60px
           
        }

        .Innerclass2 input[type=text]{
            width: 100%;
            height: 60px
           
        }     
textarea{
    width: 70%;
    height: 100px;
}
</style>
</head>
<body>
   <div class="container">
      

        <form action="" method="post" >
            <div class="subcontainer">

            <div class="formInner">
                
                <input type="text" id="title" name="title" placeholder="Post">
            </div>
            
            <div class="formInner">
              
                 <textarea name="description" id="desc"  ="Categories"></textarea>
            </div>
            
            </div>
            <div class="subcontainer1">
<div class="Innerclass">
<div class="formInner">
    <input type="text" placeholder="Title" name = "title">required
</div>
<div class="formInner">
    <textarea name="description" placeholder="Description" ></textarea>Not required
</div>
<div class="formInner">
    <input type="text" placeholder="Present Categories" name="pcategories">Not Required
</div>
<div class="formInner">
    <input type="submit" value="save">
</div>
</div>
<div class="Innerclass2">
    <div class="formInner"><input type="text" value="Cricket"></div>
    <div class="formInner"> <input type="text" value="Footbal"></div>
   <div class="formInner">   <input type="text" value="BaseBall"></div>
 
</div>
            </div>
            
                  </form>
       
   </div>
</body>
</html> 