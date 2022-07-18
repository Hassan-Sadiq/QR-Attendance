<?php 
include('header.php');

$STUDENTID = $_POST['STUDENTID'];
$FIRSTNAME = $_POST['FIRSTNAME'];
$MNAME = $_POST['MNAME'];
$LASTNAME = $_POST['LASTNAME'];
$AGE = $_POST['AGE'];
$GENDER = $_POST['GENDER'];

$sql = "INSERT INTO student (STUDENTID, FIRSTNAME, MNAME, LASTNAME, AGE, GENDER)
        VALUES ('$STUDENTID', '$FIRSTNAME', '$MNAME', '$LASTNAME', '$AGE', '$GENDER')";

if ($conn->query($sql) === TRUE) {
  echo "Record added successfully";
} else {
  echo "Record add failed: " . $conn->error;
}
?>