<?php
use userDetails\model\Employee;
use App\user;
error_reporting( E_ALL );
ini_set('display_errors', '1');
require_once '../config/dbconnect.php';
 require_once '../model/dbOperation.php';
$obj1 = new user();
$conn = $obj1->connect(); 
$obj = new Employee($conn);
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
    require_once '../viewer/form.php';  
        break;
    case 'edit':
        
        $id = "";
        if(!empty($_GET['id'])&& $_GET['id']){
            $id = $_GET['id'];
        }
        $show = $obj->selectOneRow("employee_details", array("EmpID"=>$id));
        if(isset($_POST['save'])){
            $name = $_POST['name'];
            $age = $_POST['age'];
            if($name!=""&& $age!=""){
               
                $update =$obj->update1("employee_details", array('Emp_name'=>$name, 'emp_age'=>$age), array('EmpID' => $id));
                if($update){
                    header("Location: ../controller/indexMVC.php");
                }
                else{
                    echo " Not inserted";
                }
            }else{
                echo "Please All Field";
            }
            }
        require_once '../viewer/form.php';    
        break;
        case 'delete':
            $obj = new Employee($conn);
            $id = "";
            if(!empty($_GET['id'])&& $_GET['id']){
                $id = $_GET['id'];
            } 
            $delete = $obj->getDelete("employee_details", array('Empid'=>array($id)));
            if($delete){
                header("Location: ../model/indexMVC.php");
            }else{
                echo "Not Delete";
            }
            break;
    default:
    $show  = $obj->readData("employee_details");
    require_once '../viewer/show_data.php';
    break;
 }
    ?>
<body>   
</body>
</html>