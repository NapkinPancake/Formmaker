<?php
include_once '../DB/connection.php';

if(!empty($_POST["search"])){

   $search = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["search"]))));

   if ($search == '') {
    $sql = "SELECT * FROM forms;";
   } else {
    $sql = "SELECT * FROM forms WHERE name LIKE '%$search%' OR task LIKE'%$search%';";
   }

    $result = $conn->query($sql);

    ///DISPLAY TABLE //////

    include 'display_table.php';
}