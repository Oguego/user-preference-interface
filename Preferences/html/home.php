<?php
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
<div class="w3-sand w3-grayscale w3-large">


<!-- Contact/Area Container -->
<div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px"><fieldset>
    <h2 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">RETRIEVE OR SETUP USER(S)</span></h2>
    <form action="showModifyPreferences.php" target="_blank" method="post">';


$servername = "localhost";
$username = "mysql";
$password = "123456";
$dbname = "preferences";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql1 = "INSERT INTO user (idUser,userName) values (2," . $name . ")"; //New addition
//$result1 = $conn->query($sql1);

$sql = "select * from user";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  //echo "hola";

    echo "<label> New User: </label>";
    echo "<input type='text' name='userName'>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    echo "<label> Existing User: </label>";

    echo "<select name='idUser'>";
    // output data of each row
    echo '<option value="0">Select Name</option>';
    while($row = $result->fetch_assoc()) {
      echo "<option value='" .$row['idUser']. "'>" . $row['userName'] . "</option>";
    }
    echo "</select>";
} else {
    echo "No users in the DB.";
}
$conn->close();

 

      echo '<p><button style="float: left; width: 180px" class="w3-button w3-black" type="submit">SUBMIT</button></p> <button style="float: right; width: 180px" class="w3-button w3-black" type="reset" value="Reset">RESET</button>
      </fieldset>
    </form>
  </div>
</div>

<!-- End page content -->
</div>


</body>
</html>'
?>