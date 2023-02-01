<!DOCTYPE html>
<html>
<?php
// check if user is logged in
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

?>
<head>
    <meta charset="UTF-8">
    <title>Products-Sallaty</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header" id="myHeader">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="images/logo-corp-prev.png" width="125px"></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="Products.php">Products</a></li>
                        <li><a href="Contact.html">Contact us</a></li>
                        <li><a href="Administrator.php">Administrator</a></li>
                    </ul>
                </nav>
                <a href="Cart.php"><img src="images/Cart.png" width="50px" height="50px"></a>
            </div>
        </div>
    </div>

    <?php
              $product_id = $_GET['product_id'];
                //connect to database
                require_once 'includes/db_connect.php';
                //retrieve data from the database
                $sql = "SELECT * FROM product WHERE Product_id = $product_id";  
                $result = mysqli_query($conn, $sql);
                $product = mysqli_fetch_assoc($result);
                $catid = $product['Category_name'];
            
                $sqlcategory = "SELECT * FROM category where Name = '$catid'";
                $resultcategory = mysqli_query($conn, $sqlcategory);
                $category = mysqli_fetch_assoc($resultcategory);
                ?>
        
    <div class="add-product">
        <div class="container">
            <div class="add-product-title">
                <h1>edit Product: <?php echo $product['Name']; ?></h1>
            </div>
            <div class="add-product-form">
                <form action="productEdited.php" method="POST" enctype="multipart/form-data">
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="<?php echo $product['Name']; ?>">
                        </div>
                        <div class="add-product-form-col">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" value="<?php echo $product['Price']; ?>">
                        </div>
                    </div>
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                        <label for="category">Category</label>
                            <select name="category" id="category" placeholder="Enter product category">
                            <?php
                                //retrieve data from the database
                                $query = "SELECT * FROM category";
                                $resultcat = mysqli_query($conn, $query);
                                //display data
                                while ($row = mysqli_fetch_array($resultcat)) {
                                    if($row['Name'] == $product['Category_name'])
                                        echo "<option value='" . $row['Name'] . "' selected>" . $row['Name'] . "</option>";
                                    else
                                        echo "<option value='" . $row['Name'] . "'>" . $row['Name'] . "</option>";
                                }
                            ?>
                           </select>
                           
                        </div>
                        <div class="add-product-form-col">


                            <label for="qunat">quantity</label>
                            <input type="number" name="quant" id="quant" min = 0 value = <?php echo $product['Quantity'] ?> >
                        </div>
                       
                    </div>
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" ><?php echo $product['Description']; ?></textarea>
                        </div>
                        <div class="add-product-form-col">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" src="<?php echo $product['Image']; ?>">
                        </div>
                    </div>
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <input type="hidden" name="product_id" value="<?php echo $product['Product_id']; ?>">
                            <input type="submit" name="submit" value="Edit Product">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
    <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>