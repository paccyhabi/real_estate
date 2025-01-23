
<?php include 'boot.php';
include'header.php';
include'sidebar.php';
$id=$_SESSION['id'];?>
<section id="main-content">
      <section class="wrapper">
      <h2>All Orders pending orders</h2>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
        <table class="table  table-striped table-hover table-bordered" id="data">
  <thead>
                                            <tr>
                                                <th>
                                                    #N<sup>O</sup>
                                                </th>
                                                <th>
                                                    Names
                                                </th>
                                                <th>
                                                    Phone
                                                </th>
                                                <th>
                                                    Products name
                                                </th>
                                                <th>
                                                    Qty
                                                </th>
                                                <th>
                                                    Order status
                                                </th>
                                                 
                                                <th>order price</th>
                                                <th>order Date</th>
                                                <th>Action</th>
                    
                                            </tr>
                                                
                                        </thead>
                                        <tbody>
                                            <?php
       $i=1;
       foreach (ltg::orders() as $row) {
        $status=$row['order_status'];
        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
        <td><?php echo $row['user_phone']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['order_qty']; ?></td>
          <?php if ($status==0) {
            ?>
            <td class="alert-warning">Pending</td>
            <?php
          }
          else if ($status==2) {
            ?>
            <td class="alert-danger">Canceled</td>
            <?php
          }
          else{
            ?>
            <td class="alert-success">Approved</td>

        <?php
          }
          ?>
          <td><?php echo number_format($row['order_price']);?> Rwf</td>
           <td><?php echo $row['order_date']; ?></td>
           <td><a data-toggle="modal" href="#order_<?php echo $row['user_id'];?>"><button class="btn btn-theme">Choose Action</button></td>
    
<?php
include 'user_modal.php';
$i++;
}
?>
</tr></tbody></table></div></div></div></section></section>
    <?php include'footer.php';
    include'script.php';
  ?>
