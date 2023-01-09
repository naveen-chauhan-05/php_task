 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .container{
            border: 2px solid black;
             width: 90%;
             margin: 10px auto;
        }
        table{
            width: 90%;
    text-align: center;
    border-collapse: collapse;
    margin: 10px auto;
}
.button{
    width: 20%;
    /* border: 2px solid green; */
    margin: 10px auto;
    margin-left: 53px;
}
 .button a{
    margin: 10px;
    border: 2px solid;
    text-decoration: none;
    padding: 5px;
    color: red;
     
    font-weight: bold;
 }
    </style>
 </head>
 <body>
    <?php
    require_once 'header.php';
    ?>
    <div class = "container">
    <table border ="2">
        
            <tr>
                <th>Employee Name</th>
                <th>Age</th>
                <th colspan = "2">Action</th>
            </tr>
    <?php
   if(!empty($show)){
    
    foreach ($show as $key => $value) {
         ?>
        <tr>
            <td>
                <?php echo $value['Emp_name'];?>
            </td>
            <td><?php echo $value['emp_age'];?></td>
            <td>
               <a href="?action=edit&id=<?php echo $value['EmpID'];?>">Edit</a>
            </td>
            <td>
                 <a href="?action=delete&id=<?php echo $value['EmpID'];?>" onclick="return del();">Delete</a>
            </td>
        </tr>
         <?php
    } 

   } 
    ?>
    </table>
    <div class="button">
        <a href="?action=add">AddData</a>
    </div>
</div>
 </body>
 </html>