<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Products-Sallaty</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
                <h1>Enter Your Information </h1>
            </div>
            <div class="add-product-form">
                <form action="submitCustomer.php" method="post" onsubmit="return validateForm()">
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your name">
                        </div>
                        <div class="add-product-form-col">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" placeholder="Enter your Age" pattern="[0-9]*" min="1" max="120" required>
                        </div>
                    </div>
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="Enter your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address">
                        </div>

                        <div class="add-product-form-col">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" placeholder="Enter your Phone" pattern="^\+966\d{8}$" title="Please enter a valid Saudi Arabia phone number starting with +966">
                        </div>
                    </div>
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" placeholder="Enter your Address">
                        </div>
                    </div>
                    <div class="add-product-form-row">
                        <div class="add-product-form-col">
                            <input type="submit" name="submit" value="Enter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'includes/stickyHeader.php'; ?>
    <script>
        function validateForm() {
            var inputs = document.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value == "") {
                    alert("All fields are required!");
                    return false;
                }
            }
            return true;
        }
    </script>

</body>

</html>