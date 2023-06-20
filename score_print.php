<?php require_once("connection.php"); checkLevel(1, 2, 2, 9, 9, 9, 9, 9, 9);?>
<?php
	$student = mysqli_query($con, "SELECT * FROM student WHERE student_id = " . $_GET["student_id"]);
	$row_student = mysqli_fetch_assoc($student);
	
	
	$student_id = $_GET["student_id"];
	$class_id = $_GET["class_id"];
	
	$score = mysqli_query($con, "SELECT * FROM score INNER JOIN subject ON subject.subject_id = score.subject_id INNER JOIN class_section ON class_section.section_id = score.section_id WHERE score.student_id = $student_id AND class_section.class_id=$class_id");
	$row_score = mysqli_fetch_assoc($score);
	$totalRows_score = mysqli_num_rows($score);

	
?>
<?php require_once("top.php"); ?>

<div id="paper_sheet">

<div class="text-center">
	<img class="printonly" src="images/img_simple_2.gif" width="120">
</div>

<div class="clearfix"></div>

<div style="width:33%;float:right;padding:10px;">
	<p>نام: <?php echo $row_student["firstname"]; ?><br>
	نام پدر: <?php echo $row_student["fathername"]; ?><br>
	
	نمبر اساس: <?php echo $row_student["reg_no"]; ?>
	<br>
	نمبر تذکره: <?php echo $row_student["nic"]; ?>
	</p>
</div>

<div style="width:33%;float:right;">
	<h2 style="border:none;" class="text-center">وزارت معارف</h2>
	<h2 style="border:none;" class="text-center">ریاست معارف شهر کابل</h2>
	<h2 style="border:none;" class="text-center"> لیسه فاطمیه</h2>
	<h2 style="border:none;" class="text-center">اطلاع نامه</h2>
</div>

<div style="width:33%;float:right;padding:10px;text-align:left;">

	<a href="#" onclick="window.print()" id="btn_print" class="btn btn-primary noprint">
		<span class="glyphicon glyphicon-print"></span>
		چاپ کردن
	</a>

	<p>متعلم صنف :<?php echo $_GET["class_id"]; ?></p>
	<p>تاریخ صدور: <?php echo jdate("Y/m/d","","","","en"); ?></p>
</div>

<div class="clearfix"></div>

<div style="width:60%;float:right;padding-left:10px;">
<table class="table table-bordered">
	<tr>
		<th width="25%">نام مضمون</th>
		<th width="25%">نمره وسطی</th>
		<th width="25%">نمره سالانه</th>
		<th width="25%">نمره نهایی</th>
	</tr>
	
	<?php
		$totalMid = 0;
		$totalFinal = 0;
		$totalMark = 0;
	do { ?>
	<tr>
		<td><?php echo $row_score["subject_name"]; ?></td>
		<td><?php echo $row_score["mid_exam"]; ?></td>
		<?php $totalMid += $row_score["mid_exam"]; ?>
		<td><?php echo $row_score["final_exam"]; ?></td>
				<?php $totalFinal += $row_score["final_exam"]; ?>
		<td><?php echo $row_score["total_mark"]; ?></td>
		<?php $totalMark += $row_score["total_mark"]; ?>
	</tr>
	<?php } while($row_score = mysqli_fetch_assoc($score)); ?>
	
	<tr>
		<td>مجموع:</td>
		<td><?php echo $totalMid; ?></td>
		<td><?php echo $totalFinal; ?></td>
		<td><?php echo $totalMark; ?></td>
	</tr>
	
	<tr>
		<td>اوسط</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td>نتیجه</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td>درجه:</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
</div>

<div style="width:40%;float:right;font-size:15px;">
	<table class="table table-bordered">
	<tr>
		<th></th>
		<th>امتحان وسطی</th>
		<th>امتحان سالانه</th>
		<th>مجموع</th>
	</tr>
	
	<tr>
		<td>سال تعلیمی</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td>حاضر</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td>غیرحاضر</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td>مریض</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td>رخصت</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	
</table>

<br>

<table class="table table-bordered" style="font-size:12px;">
	<tr>
		<th></th>
		<th>امتحان وسطی</th>
		<th>امتحان سالانه</th>
		<th>ملاحظات</th>
	</tr>
	
	<tr>
		<td>تصدیق نگران صنف:</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td>تصدیق اداره لیسه:</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td>تصدیق ولی دانش آموز:</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
</table>
</div>

</div>

<?php require_once("footer.php"); ?>