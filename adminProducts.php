<!DOCTYPE html>
<html>
<?php require_once 'includes/adminlogin.php'; ?>
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

    <div class="products">
        <div class="container">
            <h1 class="lg-title">Sallaty products</h1>
            <form action="modifyProducts.php" method="POST" enctype="multipart/form-data">
            <div class="edit-products">
                <a href="addProduct.php"><button type="button" class="btn-add">Add Product</button></a>
                <a href="DeleteProduct.php"><input type="submit" value="Delete Product"> <input type="hidden" name="srcfile" value="delete"> </a>
                <input type="text" placeholder="Search..">
            </div>

            <div class="product-items">
                <!-- product -->
                <?php
                //connect to database
                require_once 'includes/db_connect.php';
                //retrieve data from the database
                $query = "SELECT * FROM product";
                $result = mysqli_query($conn, $query);

                //loop through the result set and display the information
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="product">
                        <div class="product-content">
                            <div class="product-img">
                                <img src="<?php echo $row['Image']; ?>" width="200px" height="200px">
                            </div>
                            <div class="admin-product-btns">
                            <a style="text-align:center;  " href="editProduct.php?product_id=<?php echo $row['Product_id']; ?>" class="btn-cart">Edit</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-info-top">
                                <h2 class="sm-title"><?php echo $row['Category_name']; ?></h2>
                            </div>
                            <a href="One Product.php?product_id=<?php echo $row['Product_id']; ?>" class="product-name"><?php echo $row['Name']; ?></a>
                            <p class="product-price">SAR <?php echo $row['Price']; ?></p> <input type="checkbox" id=<?php echo $row['Name'] ?> name="delete[]" value=<?php echo $row['Product_id'] ?>>
                        </div>
                    </div>
                <?php
                }
                mysqli_close($conn);
                ?>
            </div>
            </form>
        </div>
    </div>
    
    <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>