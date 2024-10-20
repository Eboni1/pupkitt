<?php
session_start();
include '../connection.php';
include '../functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

 $sortBy = (isset($_POST['sortBy']) ? $_POST['sortBy'] : NULL);
 $sql = "SELECT * FROM `users`";
 if($sortBy != NULL) {
  $sql .= ' ORDER BY ' . $sortBy;
 }
 $result = mysqli_query($con, $sql);
 if(mysqli_num_rows($result) > 0) {
  echo '
  <table>
   <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>SSN</th>
   </tr>';
  while($row = mysqli_fetch_array($result)) {
   echo '
   <tr>
    <td>' . $row['id'] . '</td>
    <td>' . $row['firstname'] . '</td>
    <td>' . $row['lastname'] . '</td>
    <td>' . $row['address'] . '</td>
   </tr>';
  }
  echo '
  </table>';
 }
?>

  <form>
   <select name="sortBy">
    <option value="Pending">Pending</option>
    <option value="Delivered">Delivered</option>
   </select>
   <button type="submit" formaction="?" formmethod="post">Submit</button>
  </form>
</body>
</html>