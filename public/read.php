<?php 
require "templates/header.php";
require "config.php";

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } ?>
        <h2>All Users</h2><?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            ?>
            <!-- <?php while($row = $result->fetch_assoc()) { ?> -->
                

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>Age</th>
          <th>Location</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($result as $row) : ?>
        <tr>
          <td><?php echo($row["id"]); ?></td>
          <td><?php echo($row["firstname"]); ?></td>
          <td><?php echo($row["lastname"]); ?></td>
          <td><?php echo($row["email"]); ?></td>
          <td><?php echo($row["age"]); ?></td>
          <td><?php echo($row["location"]); ?></td>
          <td><?php echo($row["date"]); ?> </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
        <?php    }
        } else {
            echo "0 results";
        }

    $conn->close();
?>
<a href="index.php">Back to home</a>


<?php require "templates/footer.php"; ?>