<?php
    include_once '../DB/connection.php';
    
    //// SORTING FILTER  //////
    $columnToSortBy = 'id';

    if(isset($_GET['sortBy'])) {
        $columnToSortBy = $_GET['sortBy'];
    } 

    $sql = "SELECT * FROM forms ORDER BY $columnToSortBy DESC;";
    $result = $conn->query($sql);
  
    //// DISPLAY TABLE //////
    
    include 'display_table.php';
    


