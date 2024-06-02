<?php
$con = mysqli_connect("localhost", "root", "", "pharmacy");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // Assuming you have a SALE_DATE column in your 'sales' table
    $sql = "SELECT INVOICE_DATE, SUM(TOTAL_AMOUNT) as total_amount 
            FROM invoices 
            WHERE INVOICE_DATE = CurDATE()  -- Selects data for the current date
            GROUP BY INVOICE_DATE";

    $result = mysqli_query($con, $sql);

    // Check query result
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    $chart_data = [];
    $cids = [];
    $dsale = [];

    // Fetch data from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        $cids[] = $row['INVOICE_DATE'];
        $dsale[] = $row['total_amount'];
    }

    // Convert the chart data to JSON
    $chart_data_json = json_encode($chart_data);

    // Output JSON data to the browser
    echo $chart_data_json;

    // Close the connection
    mysqli_close($con);
}
?>
