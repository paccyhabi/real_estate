
<?php include 'boot.php';
include'header.php';
include'sidebar.php';
$id=$_SESSION['id'];?>
<section id="main-content">
      <section class="wrapper">
      <h2>My Orders Confrimed orders</h2>
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
                                                    Products name
                                                </th>
                                                <th>
                                                    Qty
                                                </th>
                                                <th>order price</th>
                                                <th>order Date</th>
                    
                                            </tr>
                                                
                                        </thead>
                                        <tbody>
                                            <?php
       $i=1;
       foreach (ltg::confrim_orders($_SESSION['id']) as $row) {
        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['product_name']; ?></td>
         <td><?php echo $row['order_qty']; ?></td>
          <td><?php echo number_format($row['order_price']);?> Rwf</td>
           <td><?php echo $row['order_date']; ?></td>
        
            <?php
$i++;
}
?>
</tr></tbody></table></div></div></div></section></section>
    <?php include'footer.php';
    include'script.php';
  ?>
