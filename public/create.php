<?php
require "templates/header.php";
require "config.php";
if (isset($_POST['submit'])) {
    $conn= new mysqli($host, $username, $password, $dbname);

    if($conn->connect_error)
    die("connection failed" . $conn->connect_error);

    //   print_r($_POST);
    $sql = "INSERT INTO users (firstname, lastname, email, age, location)
    VALUES (?,?,?,?,?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param("sssis",$_POST['firstname'],$_POST['lastname'], $_POST['email'], $_POST['age'],$_POST['location']);
    $statement->execute();
    echo($_POST['firstname']);
    echo "successfully Added";
 }

?>

<h2>Add a user</h2>
<form method="post">
  <label for="firstname">First Name</label>
  <input type="text" name="firstname" id="firstname">
  <label for="lastname">Last Name</label>
  <input type="text" name="lastname" id="lastname">
  <label for="email">Email Address</label>
  <input type="text" name="email" id="email">
  <label for="age">Age</label>
  <input type="text" name="age" id="age">
  <label for="location">Location</label>
  <input type="text" name="location" id="location">
  <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>