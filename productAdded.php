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
                    // Check if image file is a actual image or fake image and if it is, upload it
                    if(isset($_POST["submit"])) {
                        require_once 'includes/imageupload.php';
                    }
                //connect to database
                require_once 'includes/db_connect.php';
                //add data to the database
                echo $_POST['category'];
                $query = "insert into product (Name, Price, Image, Description, Category_name, Quantity) values ('$_POST[name]', '$_POST[price]', '$target_file', '$_POST[description]', '$_POST[category]', '$_POST[quant]')";
                $result = mysqli_query($conn, $query);

        
                mysqli_close($conn);
                ?>
            </div>
            
            <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>