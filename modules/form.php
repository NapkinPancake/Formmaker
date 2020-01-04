<?php

//// VALIADATION //////
$dataSaved= false;
$errText="";
$name = $email = $task = $description = $date = "";
$correctName = $correctEmail = $correctTask = $correctDescription = $correctDate = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $errText = 'Required';
  } else {
    $name = test_input($_POST["name"]);
    $correctName = true;
  }
  
  if (empty($_POST["email"])) {
    $errText = 'Required';
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
      } else {
        $correctEmail = true;
      }
  }

  if (empty($_POST["task"])) {
    $errText = 'Required';
  } else {
    $task = test_input($_POST["task"]);
    $correctTask = true;
  }

  if (empty($_POST["description"])) {
    $errText = 'Required';
  } else {
    $description = test_input($_POST["description"]);
    if (mb_strlen($description) > 1000) {
        $errDescription = 'Max 1000 characters';
    } else {
        $correctDescription = true;
    }
  }

  if (empty($_POST["date"])) {
    $errText = 'Required';
  } else {
    $date = test_input($_POST["date"]);
    $correctDate = true;
   }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//////// SAVE DATA ////////
if ($correctName && $correctEmail && $correctTask && $correctDescription && $correctDate) {
    include_once 'php/DB/connection.php';

    $sql = "INSERT INTO forms (name , email , task , description, date) VALUES ('$name', '$email', '$task', '$description', '$date');";

    if ($conn->query($sql) === TRUE) {
      $dataSaved=true;//                               <======================================= DATA SAVED = TRUE
      $dateOldFormat = date_create($date); 
      $dateNewFormat = date_format($dateOldFormat,"d.m.Y");  
      /////SEND EMAIL ////
    $to = $email;
    $subject = "Signed form";
    $txt = "Dear, ".$name."\r\n".
            "Just a few moments prior You signed a form in warden.store website.". "\r\n" .
            "Our team is hurry to send you a copy of this form:"."\r\n".
            "Task: ".$task."\r\n".
            "Have to be finished at: ".$dateNewFormat."\r\n".
            "Description: ".$description."\r\n".
    $headers = "From: karpe.andrew@gmail.com";

    $sendMail = mail($to,$subject,$txt,$headers);
    if ($sendMail) {
        echo 'Email was sent';
    } else {
        echo "Email wasn't sent";
    }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id='addForm' method='POST'>
    <div class="form-group" id='formDiv' name="<?php if($dataSaved) {echo 'dataSaved';}?>" >
            <input type="text" name="name" class='form-control mt-4' placeholder="Full Name" required>
            <span class='badge badge-danger'><?php if (isset($errText)) { echo $errText; }?></span>
            <input type="text" name="email" class='form-control mt-4' placeholder="Email" id='emailForm' required>
            <span class='badge badge-danger'><?php if (isset($errText)) { echo $errText; };if (isset($errEmail)) { echo $errEmail; }?></span>                
            <input type="text" name="task" class='form-control mt-4' placeholder="Task" required>
            <span class='badge badge-danger'><?php if (isset($errText)) { echo $errText; }?></span>
            <textarea name="description" class='form-control mt-4' placeholder="Description" maxlength="1000" required></textarea>
            <span class='badge badge-danger'><?php if (isset($errText)) { echo $errText; };if (isset($errDescription)) { echo $errDescription; }?></span>
            <input type="text" name='date' id="datepicker" placeholder="Completing date" class='form-control mt-4' required readonly>
            <span class='badge badge-danger'><?php if (isset($errText)) { echo $errText; }?></span>
            <input type="button" id='sendFormBtn' value="Save" class='form-control mt-4 btn-primary' required>
    </div>
</form>



