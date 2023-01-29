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
    <style type="">
    
     </style>
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
                <a href="Cart.html"><img src="images/Cart.png" width="50px" height="50px"></a>
            </div>
        </div>

    </div>
    <div class="product-items">
                <!-- product -->
                <?php
                    $target_dir = "images/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["image"]["tmp_name"]);
                        if($check !== false) {
                          echo "File is an image - " . $check["mime"] . ".";
                          $uploadOk = 1;
                        } else {
                          echo "File is not an image.";
                          $uploadOk = 0;
                        }
                      }
                     // Check if file already exists
                     if (file_exists($target_file)) {
                         echo "Sorry, file already exists.";
                         $uploadOk = 0;
                     }
                     // Check file size
                     if ($_FILES["image"]["size"] > 500000) {
                         echo "Sorry, your file is too large.";
                         $uploadOk = 0;
                     }
  
                     // Allow certain file formats
                     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" ) {
                             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                             $uploadOk = 0;
                     }
                    
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                

                //connect to database
                require_once 'includes/db_connect.php';
                //add data to the database
                echo $_POST['category'];
                $query = "insert into product (Name, Price, Image, Description, Category_name) values ('$_POST[name]', '$_POST[price]', '$target_file', '$_POST[description]', '$_POST[category]')";
                $result = mysqli_query($conn, $query);

        
                mysqli_close($conn);
                ?>
            </div>
            
            <?php include 'includes/stickyHeader.php'; ?>
</body>

</html>