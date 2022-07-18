<?php 
include('header.php');

if(isset($_POST['ID'])){
    $ID = $_POST['ID'];

    $sql = "DELETE FROM attendance WHERE ID='$ID'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record Deleted successfully";
    } else {
        echo "Error Deleted record: " . $conn->error;
    }
}else if(isset($_POST['delete'])){
    $sql = "TRUNCATE TABLE attendance";
    
    if ($conn->query($sql) === TRUE) {
        echo "All Record Deleted successfully";
    } else {
        echo "Error Deleting records: " . $conn->error;
    }
}

?>