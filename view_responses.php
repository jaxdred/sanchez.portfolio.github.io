<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Survey Responses</title>
  <link rel="stylesheet" href="view_responses_styles.css"/>
</head>
<body>
  <h1>Survey Responses</h1>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Relationship</th>
        <th>Goodness</th>
        <th>Attributes</th>
        <th>Reason</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Database connection
      $servername = "localhost";
      $username = "root"; // Default XAMPP username
      $password = ""; // Default XAMPP password, if you haven't set any
      $database = "survey_db"; // Your database name
      
      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Fetch data from database
      $sql = "SELECT * FROM survey_responses";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["name"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "<td>" . $row["number"] . "</td>";
              echo "<td>" . $row["relationship"] . "</td>";
              echo "<td>" . $row["goodness"] . "</td>";
              echo "<td>" . $row["attributes"] . "</td>";
              echo "<td>" . $row["reason"] . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='7'>No responses found</td></tr>";
      }

      // Close connection
      $conn->close();
      ?>
    </tbody>
  </table>
</body>
</html>