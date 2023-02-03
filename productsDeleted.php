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
                     //connect to database
                     require_once 'includes/db_connect.php';
                    // loop over all checked checkboxes from the form and delete the product

                    if (!empty($_POST['delete'])) {

                        foreach ($_POST['delete'] as $value) {
                           
                             //delete data from the database
                                $query = "DELETE FROM product WHERE Product_id = '$value'";
                                $result = mysqli_query($conn, $query);
                        }
                        echo 'Item(s) deleted successfully.';

                    } else {
                        echo 'No items were selected.';
                    }
                   
        
                mysqli_close($conn);
                ?>
            </div>
            
            <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>