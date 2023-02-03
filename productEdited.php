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
    <style type="">
    
     </style>
</head>

<body>
<?php require_once 'includes/header.php'; ?>
    <div class="product-items">
                <!-- product -->
                <?php
                    $target_dir = "images/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $imgQuery = "";
                    if(is_uploaded_file($_FILES["image"]['tmp_name'])) {
                        require_once 'includes/imageupload.php';
                    }
                    
                //connect to database
                require_once 'includes/db_connect.php';
                //add data to the database
                
                $query = "UPDATE product SET Name = '$_POST[name]', Price = '$_POST[price]', Description = '$_POST[description]', Category_name = '$_POST[category]', Quantity = '$_POST[quant]' WHERE product_id = '$_POST[product_id]'";
                $result = mysqli_query($conn, $query);
               
                echo "Product Edited Successfully";
                if($imgQuery != ""){

                $result = mysqli_query($conn, $imgQuery);
                
                }
                mysqli_close($conn);
                ?>
            </div>
            
            <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>