<?php 
include('header.php');

$ID = $_POST['ID'];

$sql = "DELETE FROM student WHERE ID='$ID'";

if ($conn->query($sql) === TRUE) {
    echo "Record Deleted successfully";
} else {
    echo "Error Deleted record: " . $conn->error;
}
?>