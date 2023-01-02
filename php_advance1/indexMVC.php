<?php
namespace userDetails;
require_once 'model/dbconnect.php';
require_once 'model/controler.php';
$obj1 = new user();
$conn = $obj1->connect(); 
    $action = "";
    if(!empty($_GET['action'])&& $_GET['action'])
 {
    $action = $_GET['action'];
 }
 switch($action){
    case 'add':
        if(isset($_POST['save'])){
            $name = $_POST['name'];
            $age = $_POST['age'];
            if($name!=""&& $age!=""){
                $obj = new Employee($conn);
                $insert = $obj->insert("employee_details", array('Emp_name'=>$name, 'emp_age'=>$age));
                if($insert){
                    header("Location: indexMVC.php");
                }
                else{
                    echo "no Not inserted";
                }
            }else{
                echo "Please All Field";
            }
            }
    require_once 'viewer/form.php';  
        break;
    case 'edit':
        $obj = new Employee($conn);
        $id = "";
        if(!empty($_GET['id'])&& $_GET['id']){
            $id = $_GET['id'];
        }
        $show = $obj->selectOneRow("employee_details", array("EmpID"=>$id));
        if(isset($_POST['save'])){
            $name = $_POST['name'];
            $age = $_POST['age'];
            if($name!=""&& $age!=""){
                $obj = new Employee($conn);
                $update =$obj->update1("employee_details", array('Emp_name'=>$name, 'emp_age'=>$age), array('EmpID' => $id));
                if($update){
                    header("Location: indexMVC.php");
                }
                else{
                    echo " Not inserted";
                }
            }else{
                echo "Please All Field";
            }
            }
        require_once 'viewer/form.php';    
        break;
        case 'delete':
            $obj = new Employee($conn);
            $id = "";
            if(!empty($_GET['id'])&& $_GET['id']){
                $id = $_GET['id'];
            }
            
            
            $delete = $obj->getDelete("employee_details", array('Empid'=>array($id)));
            if($delete){
                header("Location: indexMVC.php");
            }else{
                echo "Not Delete";
            }
            break;
    default:
    $obj = new Employee($conn);
    $show  = $obj->readData("employee_details");
    require_once 'viewer/show_data.php';
    break;
 }
    ?>
<body>   
</body>
</html>