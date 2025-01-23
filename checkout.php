<?php include 'navbar.php';
if ($_GET && isset($_GET['user_id']) && isset($_GET['amount'])) {
    ?>

    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                       <ul>
                                 <?php  
                            foreach (ltg::select_events() as $key) {
                                ?>
                            <li><a href="properies_cat?ref=<?php echo $key['cat_id'];?>" title="<?php echo $key['cat_name'];?>"><?php echo $key['cat_name'];?></a></li>
                            <?php
                            } 
                            ?>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+250780202826</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                    $user_info=ltg::users($_SESSION['id']);
                                    $get_info=mysqli_fetch_array($user_info);
                                    ?>
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="fname" value="<?php echo $get_info['fname'];?>" readonly> 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="lname" value="<?php echo $get_info['lname'];?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="<?php echo $get_info['user_phone'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="<?php echo $get_info['user_email'];?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address1" placeholder="Street Address" class="checkout__input__add">

                                <input type="text"  name="address2" placeholder="kigali, Kicukiro, sonatube (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="zip" required>
                            </div>
                           
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total/Price</span></div>
                                <ul>
                                    <?php foreach (ltg::orders($_GET['user_id']) as $key) {
                                        ?>
                                      <li><?php echo $key['product_name'];?> <span><?php echo number_format($key['order_price']);?> rwf</span></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <div class="checkout__order__subtotal">Total <span><?php echo number_format($_GET['amount'],1);?> rwf</span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn" name="place_order">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include 'footer.php';


    if (isset($_POST['place_order'])) {
        if (!empty($_POST['country']) && !empty($_POST['address1']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip'])) {

            $add=$_POST['address2'];
            $country=$_POST['country'];
            $state=$_POST['state'];
            $userid=$_SESSION['id'];
            $add1=$_POST['address1'];
            $zip=$_POST['zip'];
            $city=$_POST['city'];
            $country=mysqli_real_escape_string($conn,$country);
            $state=mysqli_real_escape_string($conn,$state);
            $add1=mysqli_real_escape_string($conn,$add1);
            $add=mysqli_real_escape_string($conn,$add);
            $city=mysqli_real_escape_string($conn,$city);
            $payment_status="pending";
            $feed="pending";
            $total=$_SESSION['total_price'];
            $token=uniqid();
            $date=date('d M Y');

            $sel_data=$conn->query("SELECT * FROM orders_info WHERE user_id='$userid' and payment_status='pending'");

            if (!mysqli_num_rows($sel_data)) {
 $insert=$conn->query("INSERT INTO `orders_info`(`orderinfo_id`, `user_id`, `country`, `address1`, `address2`, `city`, `state`, `zip`, `payment_status`, `total_paid`, `feedback`,token,order_date) VALUES (NULL,'$userid','$country','$add1','$add','$city','$state','$zip','$payment_status','$total','$feed','$token','$date')");

            if ($insert) {

                $update=$conn->query("UPDATE `orders` SET  `order_status`=1 WHERE `order_id`='".$_SESSION['id']."'");
                ?><script>
                    window.location.href='payment?token=<?php echo $token;?>'
                </script>
                <?php
            }
            else{
                echo $conn->error;
            }
        }
        else{
            ?>
            <script>
                window.alert("Please end your Orders")
                window.location.href='admin/my_orders'
            </script>
            <?php
        }

        }

        else{
            ?><script>
                window.alert("Please all data are required")
                window.history.back()
            </script>
            <?php
        }
    }
}
?>