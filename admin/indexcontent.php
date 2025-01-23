<?php
if (!isset($_SESSION['id'])) {
  header('location:logout');
}

$query=mysqli_query($conn,"SELECT * FROM `users` where access=0");
$app=mysqli_num_rows($query);

$query4=mysqli_query($conn,"SELECT * FROM `product`");
$programs=mysqli_num_rows($query4);

$query2=mysqli_query($conn,"SELECT * FROM `category`");
$numev=mysqli_num_rows($query2);


$od=mysqli_query($conn,"SELECT * FROM `orders` where user_id='".$_SESSION['id']."'");
$orders=mysqli_num_rows($od);

$od2=mysqli_query($conn,"SELECT * FROM `orders_info` where user_id='".$_SESSION['id']."'");
$c_ord=mysqli_num_rows($od2);

$ord=ltg::orders_info($_SESSION['id']);
$order_if=mysqli_num_rows($ord);
?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            
            <div class="row">
              
              <?php
               if ($_SESSION['role']==1) {
               ?>
              <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>Users</h5>
                  </div>
                  <i class="fa fa-users" style="font-size: 50px;"></i><p class="img-circle" width="50"></p>
                  <p><b><a href="applicants">New users</a></b></p>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="small mt">New users</p>
                      <p><?php echo $app;?></p>
                    </div>
                    <div class="col-md-6">
                      <p class="small mt"></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>

                <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>Category</h5>
                  </div>
                  <i class="fa fa-crosshairs" style="font-size: 50px;"></i><p class="img-circle" width="50"></p>
                  <p><b><a href="events">Category Management</a></b></p>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="small mt">Numbers</p>
                      <p><?php echo $numev;?></p>
                    </div>
                    <div class="col-md-6">
                      <p class="small mt"></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
           <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>All Property</h5>
                  </div>
                  <i class="fa fa-comment-o" style="font-size: 50px;"></i><p class="img-circle" width="50"></p>
                  <p><b><a href="products">Property</a></b></p>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="small mt">Property in Stock</p>
                      <p><?php echo $programs;?></p>
                    </div>
                    <div class="col-md-6">
                      <p class="small mt"></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>




              <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>My pending orders</h5>
                  </div>
                  <i class="fa fa-users" style="font-size: 50px;"></i><p class="img-circle" width="50"></p>
                  <p><b><a href="my_orders">my orders</a></b></p>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="small mt">my orders</p>
                      <p><?php echo $orders;?></p>
                    </div>
                    <div class="col-md-6">
                      <p class="small mt"></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>Orders info</h5>
                  </div>
                  <i class="fa fa-ambulance" style="font-size: 50px;"></i><p class="img-circle" width="50"></p>
                  <p><b><a href="my_orders_info">Orders info</a></b></p>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="small mt">Numbers</p>
                      <p><?php echo $order_if;?></p>
                    </div>
                    <div class="col-md-6">
                      <p class="small mt"></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
           <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>Confirmed Orders</h5>
                  </div>
                  <i class="fa fa-ambulance" style="font-size: 50px;"></i><p class="img-circle" width="50"></p>
                  <p><b><a href="c_orders">Orders Status</a></b></p>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="small mt">Orders Approved</p>
                      <p><?php echo $c_ord;?></p>
                    </div>
                    <div class="col-md-6">
                      <p class="small mt"></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
  
              <?php
            }
            else{
              ?>
               <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>My pending orders</h5>
                  </div>
                  <i class="fa fa-users" style="font-size: 50px;"></i><p class="img-circle" width="50"></p>
                  <p><b><a href="my_orders">my orders</a></b></p>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="small mt">my orders</p>
                      <p><?php echo $orders;?></p>
                    </div>
                    <div class="col-md-6">
                      <p class="small mt"></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>Orders info</h5>
                  </div>
                  <i class="fa fa-ambulance" style="font-size: 50px;"></i><p class="img-circle" width="50"></p>
                  <p><b><a href="my_orders_info">Orders info</a></b></p>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="small mt">Numbers</p>
                      <p><?php echo $order_if;?></p>
                    </div>
                    <div class="col-md-6">
                      <p class="small mt"></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
           <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>Confirmed Orders</h5>
                  </div>
                  <i class="fa fa-ambulance" style="font-size: 50px;"></i><p class="img-circle" width="50"></p>
                  <p><b><a href="c_orders">Orders Status</a></b></p>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="small mt">Orders Approved</p>
                      <p><?php echo $c_ord;?></p>
                    </div>
                    <div class="col-md-6">
                      <p class="small mt"></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>

              <?php
            }
            ?>
            </div> 
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
              </div>
            </div>
          </div>