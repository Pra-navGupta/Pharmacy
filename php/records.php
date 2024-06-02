<?php
$con = mysqli_connect("localhost", "root", "", "pharmacy");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $sql = "SELECT MEDICINE_NAME, SUM(TOTAL) as total_amount FROM sales GROUP BY MEDICINE_NAME ";
    $result = mysqli_query($con, $sql);

    // Check query result
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    $chart_data = [];
    $productname = [];
    $sales = [];

    // Fetch data from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        $productname[] = $row['MEDICINE_NAME'];
        $sales[] = $row['total_amount'];
    }

    // Convert the chart data to JSON
    $chart_data_json = json_encode($chart_data);

    // Output JSON data to the browser
    echo $chart_data_json;

    // Close the connection
    mysqli_close($con);
}
?>
