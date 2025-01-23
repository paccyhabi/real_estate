<?php include 'navbar.php';?>
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Real Estate</h2>
                        <div class="breadcrumb__option">
                            <a href="./index">Home</a>
                            <span>All</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
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
                </div>
                <div class="col-lg-9 col-md-7 col-sm-12 col-xs-12">
                    
                    <div class="row">
                        <?php 
                        foreach (ltg::property() as $value) {
                            ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/<?php echo $value['Image_url'];?>">
                                    <form method="POST">
                                    <ul class="product__item__pic__hover">
                                        <li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h2><a href="single_property?ref=<?php echo $value['product_id'];?>"><?php echo $value['product_name'];?></a></h2>
                                    <p><?php echo $value['cat_name'];?></p>
                                    <p><?php echo $value['type'];?></p>
                                    <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                                    <input type="hidden" name="cat_id" value="<?php echo $value['cat_id'];?>">
                                    <input type="hidden" name="price" value="<?php echo $value['price'];?>">

                                    <h5><?php echo number_format($value['price'],1);?> Rwf</h5>
                                    <button type="submit" name="cart" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to Cart</button></li></form>
                                </div>
                            </div>
                        </div>
                        <?php
                        } 

                        if (isset($_POST['cart'])) {
                            if(!isset($_SESSION['id'])){
                                ?>
                                <script>
                                    window.alert('please Login first')
                                    window.location.href='login'
                                </script>
                                <?php
                            }
                            else{
                                $product_id=$_POST['product_id'];
                                $price=$_POST['price'];
                                $userid=$_SESSION['id'];
                                $cat_id=$_POST['cat_id'];
                                $qty=1;
                                $insert_cart=NULL;

                                $select_cart=$conn->query("SELECT * from cart where product_id='$product_id' and user_id='$userid'");
                                if (mysqli_num_rows($select_cart)==0) {

                                    $insert_cart=$conn->query("INSERT INTO `cart`(`cart_id`, `product_id`, `cat_id`, `user_id`, `qty`) VALUES (NULL,'$product_id','$cat_id','$userid','$qty')");

                                    if ($insert_cart) {
                                        ?>
                                        <script>
                                            window.alert("Product Added to Cart")
                                            window.history.back()
                                        </script>
                                        <?php
                                        
                                    }
                                    else{
                                        ?>
                                        <script>
                                            window.alert("something went Wrong")
                                            window.history.back()
                                        </script>
                                        <?php
                                    }

                                    
                                }
                                else{
                                    ?><script>
                                            window.alert("Please You have this Products exist to cart")
                                            window.history.back()
                                        </script>
                                    <?php
                                }


                            }
                        }
                        ?>


                    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php';?>