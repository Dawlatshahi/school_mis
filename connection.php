<?php

	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "school_mis");
	
	if(!isset($_SESSION)) {
		session_start();
	}
	
	require_once("jdf.php");

	function getValue($value) {
		global $con;
		return mysqli_real_escape_string($con, $value);
	}
	
	function showLevel($level) {
		switch($level) {
			case "0":
				return "فاقد";
			break;
			case "1":
				return "مشاهده";
			break;
			case "2":
				return "ایجاد";
			break;
			case "4":
				return "ویرایش";
			break;
			case "8":
				return "حذف";
			break;
		}
	}
	
	$url = $_SERVER["PHP_SELF"];
	
	if(strpos($url, "login.php")<1) {
		if(!isset($_SESSION["login"])) {
			header("location:login.php");
		}
	}
	
	
	function checkLevel($page_admin, $page_academic, $page_student, $page_teacher, $page_staff, $page_finance,  $page_library, $page_stock, $page_it) {
		
		$redirect = true;
		
		if($_SESSION["admin_level"] >= $page_admin) {
			$redirect = false;
		}
		
		if($_SESSION["academic_level"] >= $page_academic) {
			$redirect = false;
		}
		
		if($_SESSION["student_level"] >= $page_student) {
			$redirect = false;
		}
		
		if($_SESSION["teacher_level"] >= $page_teacher) {
			$redirect = false;
		}
		
		if($_SESSION["staff_level"] >= $page_staff) {
			$redirect = false;
		}
		
		if($_SESSION["finance_level"] >= $page_finance) {
			$redirect = false;
		}
		
		
		if($_SESSION["library_level"] >= $page_library) {
			$redirect = false;
		}
		
		if($_SESSION["stock_level"] >= $page_stock) {
			$redirect = false;
		}
		
		
		if($_SESSION["it_level"] >= $page_it) {
			$redirect = false;
		}
		
		if($redirect) {
			header("location:home.php?authorize=failed");
			exit();
		}
		
	}
	
	
?>