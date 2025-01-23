<aside>
      <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile"><img src="../img/users.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $_SESSION['name'];?></h5>b 
          <li class="mt">
            <a class="active" href="index">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <?php if ($_SESSION['role']==1) {
            ?>
          <li class="mt">
            <a href="events">
              <i class="fa fa-plus"></i>
              <span>Add Category</span>
              </a>
          </li>

          <li class="mt">
            <a href="all_orders">
              <i class="fa fa-ambulance"></i>
              <span>Orders</span>
              </a>
          </li>

          <li class="mt">
            <a href="my_orders_info_man">
              <i class="fa fa-ambulance"></i>
              <span>Orders info</span>
              </a>
          </li>


           <li class="mt">
            <a href="../all_property" target="_blank">
              <i class="fa fa-angle-right"></i>
              <span>Open shop</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Orders Management</span>
              </a>
            <ul class="sub">
              
              <li><a href="my_orders_info"><i class="fa fa-sort-desc"></i> Orders info Management</a></li>
              <li><a href="my_orders"><i class="fa fa-sort-desc"></i> My orders</a></li>
            </ul>
            
          </li>
          <?php
        }
        else{
      ?>

            <li class="mt">
            <a href="../all_property" target="_blank">
              <i class="fa fa-angle-right"></i>
              <span>Open shop</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Orders Management</span>
              </a>
            <ul class="sub">
              
              <li><a href="my_orders_info"><i class="fa fa-sort-desc"></i> Orders info Management</a></li>
              <li><a href="my_orders"><i class="fa fa-sort-desc"></i> My orders</a></li>
            </ul>
            
          </li>
          <?php
         }
          ?>
        </ul>
      </div>
    </aside>