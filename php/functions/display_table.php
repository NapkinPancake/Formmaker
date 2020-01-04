<?php 
if ($result->num_rows > 0) {
 echo 
 '<table class="table">
 <tr>
     <th scope="col">Full Name</th>
     <th scope="col">Email</th>
     <th scope="col">Task</th>
     <th scope="col">Description</th>
     <th scope="col">Completed at</th>
     <th scope="col">Created at</th>
     <th scope="col"></th>
 </tr>';


 
 while($row = $result->fetch_assoc()) {
    $dateOldFormat = date_create($row['date']); 
    $date = date_format($dateOldFormat,"d.m.Y");

    $createdAtOldFormat = date_create($row['created_at']);
    $created_at = date_format($createdAtOldFormat,"d.m.Y");

     echo '<tr>';
     echo '<td>'.$row['name'].'</td>';
     echo '<td>'.$row['email'].'</td>';
     echo '<td>'.$row['task'].'</td>';
     echo '<td>'.$row['description'].'</td>';
     echo '<td>'.$date.'</td>';
     echo '<td>'.$created_at.'</td>';
     echo 
     "<td>
       <button id=".$row['id']." type='button' class='close deleteBtn' aria-label='Close'>
       <span aria-hidden='true'>&times;</span>
       </button>
     </td>
     </tr>";
 }

 echo '</table>';
} else {
 echo 
 '<table class="table">
 <tr>
     <th scope="col">Full Name</th>
     <th scope="col">Email</th>
     <th scope="col">Task</th>
     <th scope="col">Description</th>
     <th scope="col">Completed at</th>
     <th scope="col">Created at</th>
     <th scope="col"></th>
 </tr>';
}