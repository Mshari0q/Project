<!DOCTYPE html>
<html>
<?php
session_start();
// if (!isset($_SESSION['logged_in_user']) || $_SESSION['logged_in_user'] !== true) {
//     header("Location: Phone Check.php");
//     exit;
// }
?>

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

    <!--Display Orders-->
    <div class="Display-Orders">
        <table class="Table-Orders">
            <thead>
                <tr>
                    <th>
                        <h1>Order ID</h1>
                    </th>
                    <th>
                        <h1>Total Price</h1>
                    </th>
                    <th>
                        <h1>Date</h1>
                    </th>
                    <th>
                        <h1>More Information</h1>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                //connect to database
                require_once 'includes/db_connect.php';
                // retrieve order IDs from the cookie, if it exists
                     $order_ids = isset($_COOKIE['order_ids']) ? json_decode($_COOKIE['order_ids'], true) : [];

                //loop through the result set and display the information
                 foreach($order_ids as $order_id) {
                     $sql = "SELECT * FROM orders WHERE Order_id = $order_id";
                     $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
                    <tr>
                        <td><?php echo $row['Order_id']; ?></td>
                        <td>SAR <?php echo $row['Total_Price']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><a href="One Order.php?Order_id=<?php echo $row['Order_id']; ?>"><button type="button" class="More-Information-btn"> More Information</button></a></td>
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
