<?php
  require "db_connection.php";

 
  

  function showCustomers($id) {
    require "db_connection.php";
    if($con) {
      $seq_no = 0;
      $query = "SELECT * FROM logs";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        if($row['ID'] == $id)
          showEditOptionsRow($seq_no, $row);
        else
          showCustomerRow($seq_no, $row);
      }
    }
  }

function showCustomerRow($seq_no, $row) {
    ?>
    <tr>
     
      <td><?php echo $row['L_ID'] ?></td>
      <td><?php echo $row['ID'] ?></td>
      <td><?php echo $row['action']; ?></td>
      <td><?php echo $row['cdate']; ?></td>
    </tr>
    <?php
  }

  ?>
