<?php
require_once('../class/preference.php');
echo $_POST['userName'];
if(!empty($_POST['userName'])){
  header("Location: choosePreferences.php?userName=".$_POST['userName']);
   exit;
}
echo '<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
    height: 100%;
    font-family: "Inconsolata", sans-serif;
}
.bgimg {
    background-position: center;
    background-size: cover;
    background-image: url("/w3images/coffeehouse.jpg");
    min-height: 75%;
}
.menu {
    display: none;
}
</style>
<body>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">';

// $servername = "localhost";
// $username = "mysql";
// $password = "123456";
// $dbname = "preferences";
require_once("connection.php");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM preference";
$result = $conn->query($sql);
$i=0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $preferences[$i] = new Preference;
      $preferences[$i]->idPreference = $row["idPreference"];
      $preferences[$i]->preferenceName = $row["preferenceName"];      
      $i++;
    }
} else {
    echo "No preferences in the DB.";
}

session_start();

$_SESSION['idUser'] = $_POST['idUser'];

$sql = "select user.idUser,user.userName,preference.idPreference,preferenceName,priority
from preference,priority,user where user.idUser = priority.idUser
and priority.idPreference = preference.idPreference
and user.idUser = '" . $_SESSION['idUser'] . "
order by preference.idPreference asc';";

$result = $conn->query($sql);


//if(!empty($_POST['preferences'])) {
 echo'<div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px"><fieldset>
   <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">MODIFY SELECTED PREFERENCE(S)</span></h5>
   <form action="confirm.php" target="_blank" method="post">';


if ($result->num_rows > 0) {
  $i = 0;
  while($row = $result->fetch_assoc()) {
    if($i==0){
      echo "For User: " . $row['userName'] ;      
      $i++;
    }
    echo '<p>'. $row['preferenceName'] .
      '<select name="'. $row['idPreference'] . '">';
    for($j=0;$j<=10;$j++){
      if($j==0){
        echo '<option value="'.$j.'">Choose</option>';
      }else{
        if($j==$row['priority']){
          echo '<option value="'.$j.'" selected = "selected">'.$j.'</option>';
        }else{
          echo '<option value="'.$j.'">'.$j.'</option>';  
        }        
      }
    } 
    echo '</select></p>';
      //echo "<option value='" .$row['userName']. "'>" . $row['priority'] . $row['priority']. "'>" . $row['priority'] . "</option>";
  }
    //echo "</select>";
} else {
    echo "0 results";
}
$conn->close();



    // foreach ($_POST['preferences'] as $selected) {
    //   $namePreference = getPreferenceName($selected,$preferences);
    //   echo '<p>'. $namePreference .
    //   '<select name="' . $selected . '">


    //     <option value="0">Choose</option>
    //     <option value="1">1 Weak</option>
    //     <option value="2">2</option>
    //     <option value="3">3</option>
    //     <option value="4">4</option>
    //     <option value="5">5 Medium</option>
    //     <option value="6">6</option>
    //     <option value="7">7</option>
    //     <option value="8">8</option>
    //     <option value="9">9</option>
    //     <option value="10">10 Strong</option>
    //   </select></p>';
    // }
    //echo '<p><button class="w3-button w3-black" type="submit">SUBMIT</button></p>
     echo '<p><button style="float: left; width: 180px" class="w3-button w3-black" type="submit">SUBMIT</button></p> <button style="float: right; width: 180px" class="w3-button w3-black" type="reset" value="Reset">RESET</button>
     </fieldset>
    </form>
  </div>
</div>';
// }else{
//   echo "You did not choose any preference to set";
// }


echo '<!-- End page content -->
</div>



</body>
</html>';

// function getPreferenceName($idPreference, $preferences){
//   foreach ($preferences as $preference) {
//     if($idPreference==$preference->idPreference){
//       return $preference->preferenceName;
//     }
//   }
// }

// class Preference{
//     public $idPreference;
//     public $preferenceName;

//     public function print(){
//       echo $this->idPreference . " - " . $this->preferenceName;
//     }
// }
?>