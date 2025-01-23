<?php include 'navbar.php';
?>
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Our departments</span>
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
                    <div class="hero__item set-bg" data-setbg="img/banner.jpg">
                        <div class="hero__text">
                            <span>Real Estate</span>
                            <h2>Cars & <br />House</h2>
                            <p>Join with your Deal</p>
                            <a href="all_property" class="primary-btn">ALL WE HAVE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php
                    foreach (ltg::property() as $row) {
                    ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/<?php echo $row['Image_url'];?>">
                            <h5><a href="properies_cat?ref=<?php echo $key['cat_id'];?>" title="<?php echo $row['cat_name'];?>"><?php echo $row['cat_name'];?></a></h5>
                        </div>
                    </div>
                    <?php 
                }

                    ?> 
                </div>
            </div>
        </div>
    </section><br>

    <?php include 'footer.php';
?>