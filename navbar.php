<!DOCTYPE html>
<html lang="en">
<?php include 'conn.php';
$num=0;
session_start();
if (isset($_SESSION['id'])) {
 $cart=ltg::mycart($_SESSION['id']);
 $num=mysqli_num_rows($cart);

}

?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Real Estate">
    <meta name="keywords" content="Real,Estate,Online,Shoping">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real | Estate</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="style/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="style/nice-select.css" type="text/css">
    <link rel="stylesheet" href="style/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="style/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="style/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="style/style.css" type="text/css">
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index"><h1>Real Estate</h1></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="cart" title="Your Cart"><i class="fa fa-shopping-bag"></i> <span><?php echo $num;?></span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">French</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <?php if (isset($_SESSION['name'])) {
               ?> <div class="header__top__right__auth">
                <a href="admin/"><i class="fa fa-user"></i> <?php echo $_SESSION['name'];?></a>
            </div>
               <?php
            }
            else{
                ?>
                <div class="header__top__right__auth">
                <a href="login"><i class="fa fa-user"></i> Login</a>
            </div>
            <?php
            }
            ?>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
            <li class="active"><a href="./index">Home</a></li>
            <li><a href="./properies?ref=For sale">For sale items</a></li>
            <li><a href="./properies?ref=For rent">For Rent items</a></li>
            <li><a href="./contact">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> realestate@gmail.com</li>
                <li>Free Shipping for all cars to 200,000rwf</li>
            </ul>
        </div>
    </div>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> realestate@gmail.com</li>
                                <li>Free Shipping for all Order of 200,000rwf</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                            <?php if (isset($_SESSION['name'])) {
               ?> <div class="header__top__right__auth">
                <a href="admin/"><i class="fa fa-user"></i> <?php echo $_SESSION['name'];?></a>
            </div>
               <?php
            }
            else{
                ?>
                <div class="header__top__right__auth">
                <a href="login"><i class="fa fa-user"></i> Login</a>
            </div>
            <?php
            }
            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index"><h2>Real Estate</h2></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index">Home</a></li>
                            <li><a href="./properies?ref=For sale">For sale items</a></li>
                            <li><a href="./properies?ref=For rent">For Rent items</a></li>
                            <li><a href="./contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <div class="header__cart">
                        <ul>
                           <li><a href="cart" title="Your Cart"><i class="fa fa-shopping-bag"></i> <span><?php echo $num;?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>