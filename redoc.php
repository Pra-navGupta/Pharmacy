<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Analytical Records</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>
    <script src="js/jquery.js"></script>
  </head>
  <body>
    <?php include("sections/sidenav.html"); ?>
    <div class="container-fluid">
      <div class="container">
        <!-- header section -->
        <?php
          require "php/header.php";
          createHeader('book', 'Records', 'All Records');
          // header section end
        ?>
        <div class="row">
  <!-- <div class="row col col-md-6"> -->
    <?php require "php/recdoc.php"; ?>
    <div style="width:60%;height:20%;text-align:center">
      <h2 class="page-header">Doctor Count </h2>
      <?php if (!empty($docname) && !empty($sums)): ?>
        <p><canvas id="chartjs_bar"></canvas></p>
        <script type="text/javascript">
          var docNames = <?php echo json_encode($docname); ?>;
          var countData = <?php echo json_encode($sums); ?>;
          console.log("Doctor Names: ", docNames);
          console.log("Doctor Count: ", countData);

          if (Array.isArray(docNames) && Array.isArray(countData)) {
    var ctx = document.getElementById("chartjs_bar").getContext('2d');
    var constantColors = "blue";
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: docNames,
        datasets: [{
          data: countData,
          backgroundColor: constantColors,
        }]
      },
      options: {
        legend: {
          display: false,
        },
      }
    });
          } else {
            console.error("Data arrays are null or undefined.");
          }
        </script>
      <?php else: ?>
        <p>No data available for the chart.</p>
      <?php endif; ?>
    </div>
  </div>
</div>
<hr style="border-top: 2px solid #ff5252;">
