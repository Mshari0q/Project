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
    
    <div class="add-product">
        <div class="container">
            <div class="add-product-title">
                <h1>Add Product</h1>
            </div>
            <div class="add-product-form">
                <form action="productAdded.php" method="POST" enctype="multipart/form-data">
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter product name">
                        </div>
                        <div class="add-product-form-col">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" placeholder="Enter product price">
                        </div>
                    </div>
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <label for="category">Category</label>
                            <select name="category" id="category" placeholder="Enter product category">
                            <?php
                                //connect to database
                                require_once 'includes/db_connect.php';
                                //retrieve data from the database
                                $query = "SELECT * FROM category";
                                $result = mysqli_query($conn, $query);
                                //display data
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value='" . $row['Name'] . "'>" . $row['Name'] . "</option>";
                                }
                            ?>
                           </select>
                        </div>
                        <div class="add-product-form-col">
                            <label for="qunat">quantity</label>
                            <input type="number" name="quant" id="quant" min = 0>
                        </div>
                    </div>
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter product description"></textarea>
                        </div>
                        <div class="add-product-form-col">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image">
                        </div>
                    </div>
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <input type="submit" name="submit" value="Add Product">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
    <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>