<!DOCTYPE html>
<html>
<?php require_once 'includes/adminlogin.php'; ?>
<head>
  <meta charset="UTF-8">
  <title>Login-Sallaty</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>

<?php require_once 'includes/header.php'; ?>

  <!--Display Customers-->
  <div class="Display-Orders">
    <h1>Customers Information</h1>
    <table class="Table-Orders">
      <thead>
        <tr>
          <th>
            <h1>Customer ID</h1>
          </th>
          <th>
            <h1>Name</h1>
          </th>
          <th>
            <h1>Age</h1>
          </th>
          <th>
            <h1>Email</h1>
          </th>
          <th>
          <h1>Phone</h1>
          </th>
          <th>
            <h1>Address</h1>
          </th>
          <th>
            <h1>Created at</h1>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        //connect to database
        require_once 'includes/db_connect.php';
        //retrieve data from the database
        $query = "SELECT * FROM customer";
        $result = mysqli_query($conn, $query);
        //loop through the result set and display the information
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
          </tr>
        <?php
        }
        mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </div>
  <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>

