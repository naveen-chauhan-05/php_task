<html>
<head>
<title></title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php

// include('fun.php');
include 'all_function.php';
// if(isset($_GET['id']))
// {
// $id = $_GET['id'];
$id = 4;
// db($conn);
$students = selectOneRow('personal',array('Id'=>$id));
echo "<pre>";
  $education = $students['education'];
//   echo $education

$edu = explode(',', $education);
print_r($edu);
 
 

?>
<form action="" method = "post">
<input type="text" name="" id="" value = "<?php echo $students['fname'];?>">



</form>
<!-- 
<form action ="" method="post">
<?php
// print_r($students);
echo '<input type="text" value = "'.$students['id'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['fname'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['lname'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['age'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['dob'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['gender'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['education_qualification'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['skill'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['address1'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['address2'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['country'].'">';
echo "<br>";
echo '<input type="text" value = "'.$students['state'].'">';
echo '<button type="submit" name = "save" class="btn btn-primary" value="'.$i.'">Submit</button>';

?>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
echo" plase try ";
if(isset($_POST['seve'])) {

// $dataname =[

// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $age = $_POST['age'];
// $dob = $_POST['dob'];
// $gender = $_POST['gender'];
// $education_qualification = $_POST['education_qualification'];
// $skill = $_POST['skill'];
// $address1 = $_POST['address1'];
// $address2 = $_POST['address2'];
// $country = $_POST['country'];
// $state = $_POST['state'];


// ],
$dataname=[
'fname'=>$fname,
'lname'=>$lname,
'age'=> $agem,
'dob'=>$dob,
'gender'=>$gender,
'education_qualification'=>$education_qualification,
'skill'=>$skill,
'address1'=>$address1,
'address2'=>$address2,
'country'=>$country,
'state'=> $sate

];

// echo $dataname;
die;

$where = [
'id'=>$id
];

$update_data = update('Students', $dataname , $whare );
if($update_data){
echo "data update successfully";
}else{
echo" plase try ";
}


}
}
// }
?> --> -->