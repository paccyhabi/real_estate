<?php include 'navbar.php';
 if (mysqli_num_rows($cart)>0) {
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
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $alltotal=0;
                                foreach ($cart as $mycart) {
                                        if (isset($_POST['status'])) {
                                            $status=$_POST['status'];
                                            $up=$conn->query("Update cart set qty='$status' where product_id={$_POST['product_id']}");
                                        }
                                    ?>
                                <tr>
                                    <form method="POST">
                                    <td class="shoping__cart__item">
                                        <img src="img/<?php echo $mycart['Image_url'];?>" alt="" width="100">
                                        <h5><?php echo $mycart['product_name'];?></h5>
                                    </td> 
                                    <td class="shoping__cart__price">
                                        <?php echo number_format($mycart['price']);?> rwf
                                    </td>
                                   <input type="hidden" name="product_id" value="<?php echo $mycart['product_id'];?>">
                                    <td class="shoping__cart__price">
                                        <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option selected> <?php echo $mycart['qty'];?></option>
                                                <option value="1"> 1</option>
                                                <option value="2"> 2</option>
                                                <option value="3"> 3</option>
                                                <option value="4"> 4</option>
                                                <option value="5"> 5</option>
                                                <option value="6"> 6</option>
                                            </select></td></form>
                                    </td>
                                    <td class="shoping__cart__total">

                                        <?php 
                                        $subtotal=$mycart['price'] * $mycart['qty'];
                                        echo number_format($subtotal,1);?> rwf
                                    </td>
                                    <form method="POST">
                                        <input type="hidden" name="user[]" value="<?php echo $mycart['user_id'];?>">
                                
                                    <td class="shoping__cart__item__close">
                             <a href="cart?delete=<?php echo $mycart['cart_id'];?>" title="Remove from Cart"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                <?php 
                                $alltotal +=$subtotal;
                            }
                            if (isset($_GET['delete'])) {
                                $dele=$conn->query("DELETE FROM cart where cart_id={$_GET['delete']}");
                                if ($dele) {
                                    ?><script>
                                        window.location.href='cart'
                                    </script>
                                    <?php
                                }
                                
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="all_property" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <p>If You are ready to place check out to Confirm Your Order and get more information after payment.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Total</h5>
                        <ul>
                            <li>Total to Pay: <span><?php
                            $_SESSION['total_price']=$alltotal;
                            echo number_format($alltotal);?> rwf</span></li>
                        </ul>
                       <button class="primary-btn" type="submit" name="checkout" style="border:none;margin-left: 2rem;">PROCEED TO CHECKOUT</button>
                   </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php';
    if (isset($_POST['checkout'])) {

foreach ($_POST['user'] as $user) {
$c=ltg::mycart($user);
while ($ck=mysqli_fetch_array($c)) {
$product_id=$ck['product_id'];
$date=date('d M Y');
$userid=$ck['user_id'];
$order_qty=$ck['qty'];
$price=$order_qty * $ck['price'];

$check=$conn->query("SELECT * FROM orders where user_id='$userid' and order_status='0' and product_id='$product_id'");

if (!mysqli_num_rows($check)) {
$insert_order=$conn->query("INSERT INTO `orders`(`order_id`, `user_id`, `product_id`, `order_date`, `order_qty`, `order_price`,order_status) VALUES (NULL,'$userid','$product_id','$date','$order_qty','$price',0)");

 if ($insert_order) {
        $del=$conn->query("DELETE FROM `cart` WHERE user_id={$_SESSION['id']}");
       echo"
        <script>
            window.location.href='checkout?user_id={$_SESSION['id']} && amount={$_SESSION['total_price']}'
        </script>";
    }
    else{

        echo $conn->error;
    }


}
else{
    ?><script>
        window.alert("Please Finish Your Orders before")
        window.history.back()
    </script>
    <?php
}
}
}
}

}

    else{
        ?>
        <script>
            window.alert("Your Cart is Empty")
            window.history.back()
        </script>
    <?php
    }
?>