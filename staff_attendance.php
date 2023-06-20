<?php require_once("connection.php"); 
 checkLevel(2, 9, 9, 9, 2, 9, 9, 9, 9);
?>

   
<?php

	if(isset($_GET["year"])) {
		$year = $_GET["year"];	
		$month = $_GET["month"];	
	}
	else {
		$year = jdate("Y", "", "", "", "en");
		$month = jdate("m", "", "", "", "en");
	}

	
	$attendance = mysqli_query($con, "SELECT *, (SELECT COUNT(staff_id) FROM staff_attendance WHERE staff_id = staff.staff_id AND absent_year=$year AND absent_month=$month) AS total_absent FROM staff");
	$row_attendance = mysqli_fetch_assoc($attendance);
?>
<?php require_once("top.php"); ?>

<a href="staff_attendance_add.php" class="pull-left btn btn-primary">
	<span class="glyphicon glyphicon-plus-sign"></span>
	ثبت غیرحاضری کارمند
</a>

<h2>گزارش حاضری کارمندان</h2>

<br>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		عملیه ثبت غیرحاضری برای کارمند مورد نظر موفقانه صورت گرفت.
	</div>	
<?php } ?>



<div class="">
	<form method="get">
	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
		<div class="input-group">
			<span class="input-group-addon">
				ماه:
			</span>
			<select name="month" class="form-control">
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==1) {echo "selected";} else if(!isset($_GET["month"]) && jdate("m", "", "", "", "en")==1) {echo "selected";} ?> value="1">حمل</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==2) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==2) {echo "selected";} ?> value="2">ثور</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==3) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==3) {echo "selected";} ?> value="3">جوزا</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==4) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==4) {echo "selected";} ?> value="4">سرطان</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==5) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==5) {echo "selected";} ?> value="5">اسد</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==6) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==6) {echo "selected";} ?> value="6">سنبله</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==7) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==7) {echo "selected";} ?> value="7">میزان</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==8) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==8) {echo "selected";} ?> value="8">عقرب</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==9) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==9) {echo "selected";} ?> value="9">قوس</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==10) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==10) {echo "selected";} ?> value="10">جدی</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==11) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==11) {echo "selected";} ?> value="11">دلو</option>
				<option <?php if(isset($_GET["month"]) && $_GET["month"]==12) {echo "selected";} else if(!isset($_GET["month"]) &&jdate("m", "", "", "", "en")==12) {echo "selected";} ?> value="12">حوت</option>
			</select>
		</div>
		
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		
		<div class="input-group">
			<span class="input-group-addon">
				سال
			</span>
			<select name="year" class="form-control">
				<?php for($x=jdate("Y","","","","en"); $x>=1394; $x--) { ?>
					<option <?php if(isset($_GET["year"]) && $_GET["year"] == $x) echo "selected"; else if(!isset($_GET["year"]) && jdate("Y","","","","en") == $x) echo "selected"; ?>><?php echo $x; ?></option>
				<?php } ?>
			</select>
			<span class="input-group-btn">
				<input type="submit" value="نمایش" class="btn btn-primary">
			</span>
		</div>
		</div>
		
		
	</form>
</div>

<table class="table table-striped">
	<tr>
		<th>شماره</th>
		<th>نام کارمند</th>
		<th>تخلص</th>
		<th>غیرحاضری</th>
		<th>جزییات</th>
	</tr>
	
	<?php do { ?>
	<tr>
		<td><?php echo $row_attendance["staff_id"]; ?></td>
		<td><?php echo $row_attendance["firstname"]; ?></td>
		<td><?php echo $row_attendance["lastname"]; ?></td>
		<td><?php echo $row_attendance["total_absent"]; ?> روز</td>
		<td>
			<a href="staff_attendance_detail.php?staff_id=<?php echo $row_attendance["staff_id"]; ?>&absent_year=<?php echo $year; ?>&absent_month=<?php echo $month; ?>">
				<span class="glyphicon glyphicon-list-alt"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
	
	
</table>
	

<?php require_once("footer.php"); ?>