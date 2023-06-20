<?php require_once("connection.php"); ?>
<?php
checkLevel(2, 9, 9, 9, 2, 9, 9, 9, 9);
	if(isset($_GET["year"])) { 
		$year = $_GET["year"];
		$month = $_GET["month"];
	}
	else {
		$year = jdate("Y", "", "", "", "en");
		$month = jdate("m", "", "", "", "en");
	}
	
	$condition = "";
	if(isset($_GET["q"])) {
		$q = $_GET["q"];
		$condition = "WHERE staff_id='$q' OR firstname LIKE '%$q%' OR lastname LIKE '%$q%' OR position LIKE '%$q%' ";
	}
	
	$salary = mysqli_query($con, "SELECT *, CONCAT(firstname, ' ', lastname) AS staff_name, (SELECT net_salary FROM staff_salary WHERE staff_id = staff.staff_id AND salary_year=$year AND salary_month=$month) AS net_salary FROM staff $condition ORDER BY staff_id ASC");
	$row_salary = mysqli_fetch_assoc($salary);
	$totalRows_salary = mysqli_num_rows($salary);
?>
<?php require_once("top.php"); ?>

<div class="pull-left" style="margin-left:20px;">
	<form method="get">
		<input value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" type="text" name="q" class="myform-control" placeholder="جستجوی کارمند...">
		<button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-search"></span>
			جستجو
		</button>
	</form>
</div>

<div class="pull-left" style="margin-left:20px;">
	<a href="staff_attendance.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-eye-open"></span>
		مشاهده حاضری کارمند
	</a>
</div>

<h2>معاشات کارمندان</h2>

<br>
<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		معاش کارمند انتخاب شده موفقانه محاسبه شد.
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
<br>
<?php if(isset($_GET["q"])) { ?>
	<div class="panel panel-info">
		<div class="panel-heading">
		تعداد نتایج به دست امده:
		<?php echo $totalRows_salary ; ?>
		</div>
	</div>
<?php } ?>

<?php if($totalRows_salary == 0) { ?>
	<div class="alert alert-danger">
		هیج نتیجه ای به دست نیامد!
	</div>
	
<?php } ?>

<?php if($totalRows_salary > 0) { ?>
<table class="table table-striped">
		
	<tr>
		<th>شماره</th>
		<th>نام کارمند</th>
		<th>وظیفه</th>
		<th>معاش ثابت</th>
		<th>معاش نهایی</th>
	</tr>
		
	<?php do { ?>
	<tr>
		<td><?php echo $row_salary["staff_id"]; ?></td>
		<td><?php echo $row_salary["staff_name"]; ?></td>
		<td><?php echo $row_salary["position"]; ?></td>
		<td><?php echo $row_salary["gross_salary"]; ?> افغانی</td>
		<td>
			<?php if($row_salary["net_salary"] == "") { ?>
				<a href="staff_salary_add.php?staff_id=<?php echo $row_salary["staff_id"]; ?>&salary_year=<?php echo $year; ?>&salary_month=<?php echo $month; ?>">
					محاسبه معاش
				</a>
			<?php } else { ?>
				<?php echo $row_salary["net_salary"]; ?> افغانی
			<?php } ?>
		</td>
	</tr>	
	<?php } while($row_salary = mysqli_fetch_assoc($salary)); ?>
		
</table>
<?php } ?>

<?php require_once("footer.php"); ?>