<!DOCTYPE html>
<html>
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
<div class="header">
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
                        <li><a href="Customers Orders.php">Previous Orders</a></li>
                        <li><a href="Administrator.php">Administrator</a></li>
                    </ul>
                </nav>
                <a href="Cart.php"><img src="images/Cart.png" width="50px" height="50px"></a>
            </div>
        </div>
    </div>
    <div class="product-items">
                <!-- product -->
                <?php

                
                //connect to database
                require_once 'includes/db_connect.php';
                
                
                SESSION_START();
                //add order to the database
                 // subtotal
                 $subtotal = 0;
                 foreach($_SESSION['cart'] as $pid => $quan){
                    $sql = "SELECT * FROM product WHERE Product_id = $pid";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $price = $row['Price'];
                    $total = $price * $quan;
                    $subtotal += $total;
                 }
                    // tax
                    $amountPaid = $subtotal * 1.15;
                    $order_date = date("Y-m-d");
                //retrieve data from the database for the logged-in user
                $query = "SELECT id FROM Customer WHERE phone = '" . $_SESSION['phone'] . "'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $customer_id = $row['id'];
                    $sql = "INSERT INTO orders (order_date, Total_Price, customer_id) VALUES ('$order_date', '$amountPaid', '$customer_id')";
                    if(mysqli_query($conn, $sql)){
                        $order_id = mysqli_insert_id($conn);
                        foreach($_SESSION['cart'] as $pid => $quan){
                           
                            $subQuant = "update product set Quantity = Quantity - $quan where Product_id = $pid";
                            mysqli_query($conn, $subQuant);
                            $sql = "INSERT INTO order_product (order_id, product_id, quantity) VALUES ('$order_id', '$pid', '$quan')";
                            if(mysqli_query($conn, $sql)){
                               echo "Records inserted successfully.";
                               $_SESSION['cart'] = array();
                            } else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                            }
                        }
                       // retrieve order IDs from the cookie, if it exists
                            $order_ids = isset($_COOKIE['order_ids']) ? json_decode($_COOKIE['order_ids'], true) : [];

                        // add the new order ID to the array
                            $order_ids[] = $order_id;

                        // store the updated array in a cookie
                            setcookie('order_ids', json_encode($order_ids), time() + (86400 * 30), "/");
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
                    




        
                mysqli_close($conn);
                ?>
            </div>
            
    <script>
        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;
        
        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
</body>

</html>