<?php
	session_start();
	include('../conn.php');
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../');
    exit();
	}