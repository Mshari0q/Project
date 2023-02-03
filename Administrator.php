<!DOCTYPE html>
<html>
<?php require_once 'includes/adminlogin.php'; ?>

<head>
    <meta charset="UTF-8">
    <title>Administrator-Sallaty</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>

<?php require_once 'includes/header.php'; ?>

    <div class="content">
        <div class="side-admin-menu">
            <div class="admin-info">
                <div class="admin-image">
                    <img src="images/user.png" width="100px" height="100px">
                </div>
                <div class="admin-name">
                   <h3><?php echo $_SESSION['loginUser'] ?></h3>
                </div>


            </div>


            <ul>
                <li><a href="Administrator.php">Dashboard</a></li>
                <li><a href="adminProducts.php">Products</a></li>
                <li><a href="Customers.php">Customers</a></li>
                <li><a href="Orders.php">Orders</a></li>
                <li><a href="Revenue.php">Revenue</a></li>
            </ul>
            <div class="logout-btn">
                <a href="logout.php">Logout</a>
            </div>


        </div>
        <div class="Dashboard">
            <h1>Dashboard</h1>
            <div class="dashboard-content">
                <div class="dashboard-box-row">
                    <div class="dashboard-box">
                        <div class="box-icon">
                            <img src="images/product.png" width="50px" height="50px">

                        </div>
                        <h2>Products</h2>

                        <a href="adminProducts.php">Go to Products</a>
                    </div>
                    <div class="dashboard-box">
                        <div class="box-icon">
                            <img src="images/user.png" width="50px" height="50px">

                        </div>
                        <h2>Customers</h2>

                        <a href="Customers.php">Go to Customers</a>
                    </div>

                </div>
                <div class="dashboard-box-row">
                    <div class="dashboard-box">
                        <div class="box-icon">
                            <img src="images/money.png" width="50px" height="50px">

                        </div>
                        <h2>Revenue</h2>

                        <a href="Revenue.php">Go to Revenue</a>
                    </div>
                    <div class="dashboard-box">
                        <div class="box-icon">
                            <img src="images/clipboard.png" width="50px" height="50px">

                        </div>
                        <h2>Orders</h2>

                        <a href="Orders.php">Go to Orders</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>