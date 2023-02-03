<!DOCTYPE html>
<html>
<?php require_once 'includes/adminlogin.php'; ?>

<head>
    <meta charset="UTF-8">
    <title>Revnue-Sallaty</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <?php

    require_once 'includes/header.php'; 
    //connect to database
    require_once 'includes/db_connect.php';
    //retrieve data from the database
    $sql = $conn->query("
    SELECT MONTH(order_date) as month, SUM(Total_Price) as Total_Price FROM Orders GROUP BY MONTH(order_date);"
    );

    $month_names = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $totals = array();
    while ($data = mysqli_fetch_assoc($sql)) {
        $months[] = $month_names[$data['month']-1];
        $totals[] = $data['Total_Price'];
    }

    ?>


    <div class="chart">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: <?php echo json_encode($months); ?>,
                datasets: [{
                    label: 'Revenue',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(255, 30, 122, 0.2)',
                        'rgba(182, 44, 122, 0.2)',
                        'rgba(54, 100, 200, 0.2)',
                        'rgba(182, 44, 207, 0.2)',
                        'rgba(201, 102, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132)',
                        'rgba(255, 159, 64)',
                        'rgba(255, 205, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(54, 162, 235)',
                        'rgba(153, 102, 255)',
                        'rgba(201, 203, 207)',
                        'rgba(255, 30, 122)',
                        'rgba(182, 44, 122)',
                        'rgba(54, 100, 200)',
                        'rgba(182, 44, 207)',
                        'rgba(201, 102, 86)'
                    ],
                    data: <?php echo json_encode($totals); ?>
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>



</body>

</html>