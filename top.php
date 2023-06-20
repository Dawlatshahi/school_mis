<?php
	if(!isset($_SESSION)) { 
		session_start();
	}
	
	if(isset($_GET["search"])) { 
		$search = $_GET["search"];
		$section = $_GET["section"];
		$page = "";
		
		if($section == "شاگردان") {
			$page = "student_list.php";
		}
		else if($section == "معلمین") {
			$page = "teacher_list.php";
		}
		else if($section == "کارمندان") {
			$page = "staff_list.php";
		}
		
		header("location:$page?q=$search");
	}
	
?>

<!DOCTYPE html>
<html>
<head>
<title>School MIS</title>

<meta charset="utf-8">


<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</head>
<body>

<div class="container">

<div class="main">
  <div class="header noprint">
    <div class="block_header">
	
      <div class="logo pull-right col-lg-3 col-md-6 col-sm-6 col-xs-12"><img src="images/logo.png" width="250" border="0" alt="logo" /></div>
	  
	  
      <div class="search pull-left col-lg-5 col-md-6 col-sm-6 col-xs-12">
	  
		<div style="margin-top:20px;" class="pull-left col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
			<?php if(isset($_SESSION["login"])) { ?>
		
			<form method="get">
				<div class="input-group">
					<span class="input-group-addon">
						جستجو: &nbsp;
					</span>
					<input name="search" type="text" class="form-control" />
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						در بخش: 
					</span>
					<select name="section" class="form-control">
						<option>شاگردان</option>
						<option>معلمین</option>
						<option>کارمندان</option>
					</select>

					<span class="input-group-btn">
					<button class="btn btn-primary">
						<span class="glyphicon glyphicon-search"></span>
						جستجو
					</button>
					</span>
				
				</div>
				
			</form>
			<?php } ?>
		</div>
      </div>
	  
	  <div class="clearfix"></div>
	  
	  	 
	  
	  
      <div class="resize_menu">
        <div class="menu">
          
		<?php if(isset($_SESSION["login"])) { ?>  
		  
		<nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
            	<ul class="nav navbar-nav" id="nav-top">
                	<li><a href="home.php">خانه</a></li>
                	<li class="dropdown"><a href="#" data-toggle="dropdown">کارمندان <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="staff_add.php">ثبت کارمند جدید</a></li>
                            <li><a href="staff_list.php">لیست همه کارمندان</a></li>
							 <li><a href="staff_document.php">اسناد کارمندان</a></li>
                            <li><a href="staff_attendance.php">حاضری کارمندان</a></li>
                            <li><a href="staff_salary.php">معاشات کارمندان</a></li>
                        </ul>                    
                    </li>
					
					<li class="dropdown"><a href="#" data-toggle="dropdown">معلمین <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="teacher_add.php"> ثبت معلم جدید</a></li>
                            <li><a href="teacher_list.php">لیست همه معلمین</a></li>
							<li><a href="teacher_document.php">اسناد معلمین</a></li>
							<li><a href="teacher_attendance.php">حاضری معلمین</a></li>
                            <li><a href="teacher_salary.php">معاشات معلمین</a></li>
							
                        </ul>                    
                    </li>
					
                	<li class="dropdown"><a href="#" data-toggle="dropdown">شاگردان <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="student_add.php"> ثبت شاگرد جدید</a></li>
                            <li><a href="student_list.php">لیست همه شاگردان</a></li>
							<li><a href="student_attendance.php">حاضری شاگردان</a></li>
							<li><a href="student_document.php">اسناد شاگردان</a></li>
							<li><a href="student_relative.php">اقارب شاگردان</a></li>
							<li><a href="student_transfer.php">سه پارچه شاگردان</a></li>
                        </ul>                    
                    </li>
					
                	<li class="dropdown"><a href="#" data-toggle="dropdown">امتحانات و نتایج <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="class_list.php">صنف ها</a></li>
                            <li><a href="subject_list.php">مضامین</a></li>
                            <li><a href="score_list.php">نمرات</a></li>
                            <li><a href="timetable.php">تقسیم اوقات</a></li>
                        </ul>                    
                    </li>
					
					<li class="dropdown"><a href="#" data-toggle="dropdown">مالی <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
							<li><a href="student_tuition.php">فیس شاگردان</a></li>
							<li><a href="income_list.php">عواید مکتب</a></li>
                            <?php //<li><a href="expense_list.php">مصارف مکتب</a></li>?>
                            <li><a href="teacher_salary_payment.php">پرداخت معاش معلمین</a></li>
                            <li><a href="staff_salary_payment.php">پرداخت معاش کارمندان</a></li>
                        </ul>                    
                    </li>
                	
					<li class="dropdown"><a href="#" data-toggle="dropdown">گدام <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
							<li><a href="purchase_list.php">خریداری اجناس</a></li>
                        	<li><a href="stock_add.php">ثبت اجناس</a></li>
							<li><a href="stock_list.php">لیست اجناس</a></li>
                            <li><a href="stock_in_list.php">اجناس وارده</a></li>
                            <li><a href="stock_out_list.php">اجناس خارج شده</a></li>
                        </ul>                    
                    </li>
					
					<li class="dropdown"><a href="#" data-toggle="dropdown">کتابخانه <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="book_add.php"> ثبت کتاب </a></li>
                            <li><a href="book_list.php">لیست همه کتاب ها</a></li>
							<li><a href="lib_member_list.php">اعضای کتابخانه</a></li>
							<li><a href="book_loan.php">امانات کتاب</a></li>
							
                        </ul>                    
                    </li>
                	
					<li class="dropdown"><a href="#" data-toggle="dropdown">کاربر <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="staff_user.php">حساب کاربران</a></li>
                            <li><a href="user_level.php">تعین صلاحیت های کاربران</a></li>
                        </ul>                    
                    </li>
					
					
					
					<li><a href="logout.php">خروج</a></li>
                </ul>
			</span>
            </div>  
        </nav>
		
		<?php } ?>
		
        </div>
        
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="main_body_resize">
    <div class="main_body">
      <div class="clr"></div>
    </div>
  </div>
  <div class="body_resize">
    <div class="body">
      
	  <?php if(isset($_SESSION["login"])) { ?>
	  
	  <div id="sidebar" class="pull-right col-lg-3 col-md-3 col-sm-3 col-xs-12 noprint">
			
			<a href="student_add.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-plus"></span>
				ثبت نام شاگرد
			</a>
			
			<a href="income_list.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-usd"></span>
				مالی
			</a>
			
			<a href="book_list.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-book"></span>
				کتابخانه
			</a>
			
			<a href="class_list.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-list-alt"></span>
				امتحانات
			</a>
			
			<a href="timetable.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-calendar"></span>
				تقسیم اوقات
			</a>
			
			<a href="stock_list.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-sort-by-attributes"></span>
				گدام
			</a>
			
			<a href="staff_user.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-wrench"></span>
				تنظیمات حساب کابر
			</a>
			
			<a href="backup.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-refresh"></span>
				پشتیبان گیری
			</a>
			
			
			<a href="logout.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-log-out"></span>
				خروج
			</a>
			<br>
      </div>
	  
	   
	  <?php } ?>
	  
	  <div class="Welcome pull-left <?php if(isset($_SESSION["login"])) { echo "col-lg-9 col-md-9 col-sm-9 col-xs-12"; } else echo "col-lg-12 col-md-12 col-sm-12 col-xs-12"; ?>">
