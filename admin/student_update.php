<?php 
include('header.php');

$ID = $_POST['ID'];
$STUDENTID = $_POST['STUDENTID'];
$FIRSTNAME = $_POST['FIRSTNAME'];
$MNAME = $_POST['MNAME'];
$LASTNAME = $_POST['LASTNAME'];
$AGE = $_POST['AGE'];
$GENDER = $_POST['GENDER'];

$sql = "UPDATE student 
SET STUDENTID='$STUDENTID', FIRSTNAME='$FIRSTNAME', MNAME='$MNAME', LASTNAME='$LASTNAME', AGE='$AGE', GENDER='$GENDER'
WHERE ID=$ID";

// $query = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

// if($query){
//     echo '<h2>Student Updated Successfully! Going back to list.</h2>';
//     // header("Location: ../student_list.php");  
// }else{
//     echo 'Student Update Failed';
//     // header("location:javascript://history.go(-1)");
// }
?>