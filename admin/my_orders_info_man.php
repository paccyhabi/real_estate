
<?php include 'boot.php';
include'header.php';
include'sidebar.php';
$id=$_SESSION['id'];?>
<section id="main-content">
      <section class="wrapper">
      <h2>My Orders information</h2>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
                <div class="table-responsive">
        <table class="table  table-striped table-hover table-bordered" id="data">
  <thead>
                                            <tr>
                                                <th>
                                                    #N<sup>O</sup>
                                                </th>
                                                <th>Date</th>
                                                <th>
                                                    Names
                                                </th>
                                                <th>
                                                    Country
                                                </th>
                                                <th>Phone number</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                 <th>City/State</th>
                                                 <th>Payment Status</th>
                                                 <th>Orders Feed Back</th>
                                                 <th>Total Paid</th>
                                                 <th>Action</th>

                    
                                            </tr>
                                                
                                        </thead>
                                        <tbody>
                                            <?php
       $i=1;
       foreach (ltg::orders_info($_SESSION['id']) as $row) {
        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['order_date']; ?></td>
        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
         <td><?php echo $row['country']; ?></td>
         <td><?php echo $row['user_phone']; ?></td>
         <td><?php echo $row['user_email']; ?></td>
         <td><?php echo $row['address1']; ?></td>
         <td><?php echo $row['city']; ?></td>
         <td><?php echo $row['payment_status']; ?></td>
         <td><a data-toggle="modal" href="#feed_<?php echo $row['orderinfo_id'];?>"><?php echo $row['feedback']; ?></a></td>
         
          <td><?php echo number_format($row['total_paid']);?> Rwf</td>
            <td><a data-toggle="modal" href="#full_<?php echo $row['orderinfo_id'];?>"><button class="btn btn-theme">Choose Action</button></td>
           
        
            <?php
            include 'user_modal.php';
$i++;
}
?>
</tr></tbody></table></div></div></div></section></section>
    <?php include'footer.php';
    include'script.php';
  ?>
