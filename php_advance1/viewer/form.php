<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        .container{
            border: 2px solid black;
    width: 70%;
    margin: 10px auto;
        }
        .formInner{
            width: 80%;
    /* border: 2px solid green; */
     margin: 10px auto;
    height: 50px;
        }
        input[type="text"]{
            width: 90%;
     font-size: 20px;
    height: 90%;
        }
        ::placeholder{
            text-align: center;
            font-size: 20px;
        }
        .subheading{
            /* border: 2px solid; */
    text-align: center;
    width: 100%;
        }
        input[type="submit"]{
            margin: 5px 225px;
    width: 30%;
    height: 40px;
    font-size: 20px;
        }
    </style>
</head>
<body>
    <?php 
    require_once 'header.php';
    
    ?>
   <div class="container">
    <div class="subheading">
        <?php 
        $checkUpdate = false;
        if(!empty($_GET['id'])&& $_GET['id']){
            echo "<h2>UPDATE EMPLOYEE DETAILS</h2>";
            $checkUpdate = true;
        }
        else{
            echo "<h2>ADD NEW EMPLOYEE</h2>";
        }
        
        ?>
    </div>
    <?php 
    ?>
    <form action="" method = "post">
<div class="formInner">
    <input type="text" placeholder = "Employee Name" name = "name" value="<?php if($checkUpdate!=false){
        echo $show['Emp_name'];}?>">
</div>
<div class="formInner">
    <input type="text" placeholder = "Age" name="age" value="<?php if($checkUpdate!=false){
        echo $show['emp_age'];}?>">
</div>
<div class="formInner">
<?php if(!empty($_GET['id'])&& $_GET['id']){
    echo '<input type="submit" value="Update" name = "save">';
}else{
    echo '<input type="submit" value="Submit" name = "save">';
}
?>
</div>
    </form>
   </div> 
</body>
</html>