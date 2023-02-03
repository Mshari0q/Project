<!DOCTYPE html>
<html>
<?php $product_id = $_GET['product_id']; ?>

<head>
    <meta charset="UTF-8">
    <title>Products-Sallaty</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>
<?php require_once 'includes/header.php'; ?>
    <div class="small-container">
        <?php
        //connect to database
        require_once 'includes/db_connect.php';
        //retrieve data from the database
        $sql = "SELECT * FROM product WHERE Product_id = $product_id";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result); {
        ?>
            <div class="product-container">
                <h1 class="product-name-one">
                    Name: <?php echo $product['Name']; ?>
                </h1>
                <img class="product-image" src="<?php echo $product['Image']; ?>" alt="<?php echo $product['Name']; ?>">
                <p class="product-Category-name">Category Name: <?php echo $product['Category_name']; ?></p>
                <p class="product-description">Description: <?php echo $product['Description']; ?></p>
                <p class="product-price">Price: <?php echo $product['Price']; ?></p>
            </div>

        <?php
        }
        mysqli_close($conn);
        ?>
    </div>
    <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>