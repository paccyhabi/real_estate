<?php
$conn = mysqli_connect("b2mhaw2n2fq0cwnun5ll-mysql.services.clever-cloud.com","utsrxqoplbif9h27","W4yuokKQWfz1tNmvjUKO","b2mhaw2n2fq0cwnun5ll");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function times_ago($timestamp)
{
$time_ago=strtotime($timestamp);
$current_time=time(); 
$time_difference=$current_time-$time_ago;
$second=$time_difference;
$minutes=round($second/60);
$hours=round($second/3600);
$days=round($second/86400);
$weeks=round($second/604800);
$months=round($second/2629440);
$years=round($second/31553280);

if ($second<=60) {
	return "Just now";
}
elseif ($minutes<=60) {
	if ($minutes==1) {
		return "One minute Ago";
	}
	else{
		return " $minutes minutes ago";
	}
}

elseif ($hours<=24) {
	if ($hours==1) {
		return "One minute Ago";
	} 
	else{
		return "$hours hrs ago";
	}
}

elseif ($days<=7) {
	if ($days==1) {
		return "Yesterday";
	} 
	else{
		return " $days days ago";
	}
}

elseif ($weeks<=4.3) {
	if ($weeks==1) {
		return "a week ago";
	} 
	else{
		return " $weeks weeks ago";
	}
}

elseif ($months<=12) {
	if ($months==1) {
		return "a month ago";
	} 
	else{
		return " $months months ago";
	}
}
else{

	if ($years==1) {
	return " one Years ago";
}
else{
	return "$years years ago";

}

}
}
if (!class_exists("ltg")) {
	class ltg
	{
		public static function connect($value='')
		{	
			global $conn;
			if (!$conn) {
			 	exit("Database connection failed");
			}	else{
				return $conn;
			}			
		}	

		public static function select_events($value='')
		{
			
			$conn = self::connect();
			$class = $conn->query("SELECT * FROM `category` order by cat_name ASC");
			$return = $class;

			return $return;
		
}
public static function orders($value=''){
	$conn=self::connect();
	if (!empty($value)) {

		$sele_order=$conn->query("SELECT * from orders,product where product.product_id=orders.product_id and orders.user_id='$value' and order_status =0");
	}
		else{
			$sele_order=$conn->query("SELECT * from users,orders,product where product.product_id=orders.product_id and users.user_id=orders.user_id");
		}
		return $sele_order;
	}

	public static function confrim_orders($value=''){
	$conn=self::connect();
	if (!empty($value)) {

		$confrim_orders=$conn->query("SELECT * from orders,product where product.product_id=orders.product_id and orders.user_id='$value' and order_status !=0");
	}
		else{
			$confrim_orders=$conn->query("SELECT * from orders,product where product.product_id=orders.product_id and  order_status !=0");
		}
		return $confrim_orders;
	}

public static function orders_info($value=''){
	$conn=self::connect();
	if (!empty($value)) {

		$confrim_orders=$conn->query("SELECT * FROM `users`,orders_info where orders_info.user_id=users.user_id and orders_info.user_id='$value' order by orderinfo_id DESC");
	}
		else{
			$confrim_orders=$conn->query("SELECT * FROM `users`,orders_info where orders_info.user_id=users.user_id  order by orderinfo_id DESC");
		}
		return $confrim_orders;
	}
public static function users($value=''){
	$conn= self::connect();
	$ret=array();
	if (empty($value)) {
	$select_users=$conn->query("SELECT * FROM users where access !=0");

}
else{
$select_users=$conn->query("SELECT * FROM users where user_id='$value'");
 }
return $select_users;
}

public static function mycart($value=''){
	$conn = self::connect();
			$return=array();
			$cartnumber = $conn->query("SELECT * FROM `cart`,product where product.product_id=cart.product_id and cart.user_id='$value'");
		return $cartnumber;

}

public static function property($value=''){
	$conn = self::connect();
	if (!empty($value)) {
	$class = $conn->query("SELECT * FROM `product`,category where product.cat_id=category.cat_id and product.cat_id='$value' order by product_id DESC");
			
}
else{
	$class = $conn->query("SELECT * FROM `product`,category where product.cat_id=category.cat_id order by product_id DESC");
}
$return = $class;
return $return;

}
public static function property_cat($value=''){
	$conn = self::connect();
	if (!empty($value)) {
	$class = $conn->query("SELECT * FROM `product`,category where product.cat_id=category.cat_id and product.type='$value' order by product_id DESC");		
}
else{
	$class = $conn->query("SELECT * FROM `product`,category where product.cat_id=category.cat_id order by product_id DESC");
}
$return = $class;
return $return;

}

public static function single($value=''){
	$conn= self::connect();
	$sele_pro=$conn->query("SELECT * from product,category where category.cat_id=product.cat_id and  product_id='$value'");
	return $sele_pro;
}

}
}

?>