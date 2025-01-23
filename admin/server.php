<?php   
include 'session.php';
if (isset($_POST['status']) and isset($_POST['roll'])) {
 $status=$_POST['status'];
 $order_id=$_POST['roll'];

 $update=$conn->query("UPDATE `orders` SET order_status='$status' WHERE order_id='$order_id'");

 if ($update) {
 echo'<div class="alert alert-success">
    <strong>Success!</strong> Updated
  </div>';
 }
 else{
  echo'<div class="alert alert-danger">
    <strong>Sorry!</strong> Try  later
  </div>';
 }
}
if (isset($_POST['reg_approve_order'])) {
 $status=$_POST['status'];
 $order_id=$_POST['orderinfo_id'];

 $update=$conn->query("UPDATE `orders_info` SET payment_status='$status' WHERE orderinfo_id='$order_id'");

 if ($update) {
?>
<script>
  window.alert("Updated very well")
  window.location.href='my_orders_info_man'
</script>
<?php
 }
 else{
  ?>
<script>
  window.alert("invalid")
  window.history.back()
</script>
<?php
 }
 }

if (isset($_POST['appove_order'])) {
 $status=$_POST['status'];
 $order_id=$_POST['orderinfo_id'];

 $update=$conn->query("UPDATE `orders_info` SET feedback='$status' WHERE orderinfo_id='$order_id'");

 if ($update) {
?>
<script>
  window.alert("Updated very well")
  window.location.href='my_orders_info_man'
</script>
<?php
 }
 else{
  ?>
<script>
  window.alert("invalid")
  window.history.back()
</script>
<?php
 }
 }



?>
