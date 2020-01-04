<?php
include_once 'connection.php';

if(isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    echo $delete_id;

    $sql = "DELETE FROM forms WHERE id = '".$delete_id."'";
  
    if ($conn->query($sql) === TRUE) {
        echo "DELETED";
        } else {
        echo "ERROR";
    }
    
    $conn->close();
}