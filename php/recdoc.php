<?php
$con = mysqli_connect("localhost", "root", "", "pharmacy");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $sql = "SELECT NAME, SUM(count) as total_count FROM doctors GROUP BY NAME 
    HAVING total_count >= 4
    ORDER BY total_count DESC
    LIMIT 5";
    $result = mysqli_query($con, $sql);

    // Check query result
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    $chart_data = [];
    $docname = array();
$sums = array();

while ($row = mysqli_fetch_assoc($result)) {
    $docname[] = $row['NAME'];
    $sums[] = $row['total_count'];
}

    // // Create the chart data array
    // $chart_data = [
    //     'docname' => $docname,
    //     'sums' => $sums,
    // ];

    // Convert the chart data to JSON
    $chart_data_json = json_encode($chart_data);

    // Output JSON data to the browser
    echo $chart_data_json;

    // Close the connection
    mysqli_close($con);
}
?>
