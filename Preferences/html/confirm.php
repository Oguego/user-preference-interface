<?php
$servername = "localhost";
$username = "mysql";
$password = "123456";
$dbname = "preferences";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();

// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$boolean = true;

if(!empty($_SESSION['userName'])){
  $sql = "SELECT MAX(idUser) as max from user";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if ($result->num_rows > 0) {
    $_SESSION['idUser'] = $row['max'] + 1;
  }else{
    $_SESSION['idUser'] = 1;
  }

  $sql = "INSERT INTO user (idUser,userName) VALUES (". $_SESSION['idUser'] . ",'". $_SESSION['userName'] ."')";
  $result = $conn->query($sql);

  for($i=1;$i<=10;$i++){
    if(!empty($_POST[$i])) {
      $priority = $_POST[$i];
      //$date = date('Y-m-d|H:i:s');
      $sql = "INSERT INTO priority (idUser,idPreference,priority) values (". $_SESSION['idUser'] ."," . $i . ",". $priority .")";

      if ($conn->query($sql) == TRUE) {
        // echo "New record created successfully <br>";
      }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
        $boolean = false;
      }
        
    }else{
      $sql = "INSERT INTO priority (idUser,idPreference,priority) values (". $_SESSION['idUser'] ."," . $i . ",0)";
      $conn->query($sql);
    }
  }
}else{
  for($i=1;$i<=10;$i++){
    if(!empty($_POST[$i])) {
      $priority = $_POST[$i];
        $sql = "UPDATE priority SET priority = " . $priority . " WHERE idUser = ". $_SESSION['idUser'] ." and idPreference = " . $i;
        if ($conn->query($sql) == TRUE) {
          // echo "New record updated successfully <br>";
        }else{
          echo "Error: " . $sql . "<br>" . $conn->error;
          $boolean = false;
        }
        
    }else{
      $sql = "INSERT INTO priority (idUser,idPreference,priority) values (". $_SESSION['idUser'] ."," . $i . ",0)";
      $conn->query($sql);
    }
  }
}

$conn->close();
session_destroy();
if ($boolean) {
  echo "Records updated successfully! <br>";
}
echo '<a href="home.php">Go back to <b>Home Page</b></a>';

?>