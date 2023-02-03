<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sallaty</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <script type="module" src="Function-map.js"></script>
    <style type="text/css">
        /* contact us page style */
        .body {
            background-color: #f2f2f2;
            padding: 50px 0;
        }
        .form-container {
            width: 100%;
            max-width: 700px;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: auto;
           
        }
        .form {
            width: 100%;
        }
        .form-control {
            margin-bottom: 20px;
            overflow: hidden;
        }
        .form-control label {
            float: left;
            width: 150px;
            margin-right: 20px;
            color: #333;
            font-weight: bold;
        }
        .form-control input {
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            border-radius: 3px;
        }
        .form-control textarea {
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            border-radius: 3px;
        }
        .form-control button {
            background-color: #333;
            border: 0;
            color: #fff;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border-radius: 3px;
        }
        .form-control button:hover {
            background-color: #555;
        }
        .form-control input:focus {
            outline: none;
        }
        .form-control textarea:focus {
            outline: none;
        }
        .form-control.success input {
            border-color: #2ecc71;
        }
        .form-control.error input {
            border-color: #e74c3c;
        }
        .form-control.error textarea {
            border-color: #e74c3c;
        }
        .form-control.error input~.text-error {
            display: block;
        }
        .form-control.error textarea~.text-error {
            display: block;
        }
        .text-error {
            display: none;
            color: #e74c3c;
            font-size: 14px;
            font-weight: 500;
        }
        .lg-title {
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .text-light {
            color: #999;
            font-size: 14px;
            font-weight: 500;
        }

      
        .map-container {
            width: 100%;
            max-width: 700px;
            margin: 0 0px 0px 300px;
           
        }
        #map {
            width: 100%;
            height: 400px;
        }
        


        



        
       
        </style>
</head>
<title> Contact us </title>
<link rel="stylesheet" href="style.css">

<body class="body-color">
    <div class="header" id="myHeader">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo-corp-prev.png" width="125px">
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

    <!-- body -->
    <div class="body">
        <!-- contact us form -->
        <table>
        <tr>
            <td>
        <div class="form-container" > 
            <form  action="https://formspree.io/f/xnqoqzqk" method="POST" class="form">
                <h1 class="lg-title">Contact us</h1>
                <p class="text-light">We are here to help you</p>
                <div class="form-control">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-control">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message" required></textarea>
                </div>
                <button type="submit" class="btn">Send</button>
            </form>
        </div>
        </td>
        <td>
        <!-- contact us map -->
        <div class="map-container">
            <div id="map"></div>
        </div>
        </td>
        </tr>
    </table>
    </div>
    <!-- footer -->
    <div class="footer">

    </div>


      
    </div>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvjaiSpgO6mjHxPtOHdGEHVNqnav3zuGU&callback=initMap">
        </script>

</body>

</html>