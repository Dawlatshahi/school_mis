<?php require_once("connection.php"); ?>
<?php
checkLevel(1, 1, 9, 9, 9, 9, 9, 9, 9 );
	$section = mysqli_query($con, "SELECT * FROM class_section ORDER BY class_id ASC, section_id ASC");
	$row_section = mysqli_fetch_assoc($section);
	
	if(isset($_GET["section_id"])) { 
		$section_id = $_GET["section_id"];
		$timetable = mysqli_query($con, "SELECT weekday, lesson_hour, subject_name, CONCAT(firstname, ' ', lastname) AS teacher_name FROM timetable INNER JOIN teacher ON teacher.teacher_id = timetable.teacher_id INNER JOIN subject ON subject.subject_id = timetable.subject_id WHERE section_id=$section_id ORDER BY weekday ASC, lesson_hour ASC");
		$row_timetable = mysqli_fetch_assoc($timetable);
		$totalRows_timetable = mysqli_num_rows($timetable);
	}
?>
<?php require_once("top.php"); ?>

<?php if(isset($_GET["section_id"])) { ?>
<a href="timetable_add.php?section_id=<?php echo $_GET["section_id"]; ?>" class="btn btn-primary pull-left noprint">
	<span class="glyphicon glyphicon-plus"></span>
	ساختن تقسیم اوقات
</a>

<a href="#" id="btn_print" class="btn btn-primary pull-left noprint" style="margin-left:10px;">
	<span class="glyphicon glyphicon-print"></span>
	چاپ کردن
</a>
<?php } ?>

<h2>تقسیم اوقات</h2>

<form method="get">
<div class="input-group">
	<span class="input-group-addon">
		صنف: 
	</span>
	<select name="section_id" class="form-control">
		<?php do { ?>
			<option value="<?php echo $row_section["section_id"]; ?>"><?php echo $row_section["section_name"]; ?></option>
		<?php } while($row_section = mysqli_fetch_assoc($section)); ?>
	</select>
	<span class="input-group-btn noprint">
		<input type="submit" value="نمایش" class="btn btn-primary">
	</span>
</div>
</form>

<?php if(isset($_GET["section_id"])) { ?>
	<table class="table table-striped table-bordered">
		<tr>
			<th>روز</th>
			<th>ساعت اول</th>
			<th>ساعت دوم</th>
			<th>ساعت سوم</th>
			<th>ساعت چهارم</th>
			<th>ساعت پنجم</th>
			<th>ساعت ششم</th>
		</tr>
		
		<?php if(true) { ?>
				<tr>
					<td><?php
						switch($row_timetable["weekday"]) {
							case 0:
								echo "شنبه";
							break;
							case 1:
								echo "یکشنبه";
							break;
							case 2:
								echo "دوشنبه";
							break;
							case 3:
								echo "سه شنبه";
							break;
							case 4:
								echo "چهارشنبه";
							break;
							case 5:
								echo "پنج شنبه";
							break;
						}
					?></td>
			<?php } ?>
						
					<td>
					<?php
						if($row_timetable["lesson_hour"] == 1) {
								echo $row_timetable["subject_name"];
								echo "<br><small>(" . $row_timetable["teacher_name"] . ")</small>";
						}
					?></td>

		<?php $weekday = $row_timetable["weekday"]; ?>
		
		<?php $x=0; for($x; $x<$totalRows_timetable-1; $x++) {
			
			$row_timetable = mysqli_fetch_assoc($timetable); ?>
		
			<?php if($weekday != $row_timetable["weekday"]) { ?>
				</tr>
			<?php } ?>
		
			<?php if($weekday != $row_timetable["weekday"]) { ?>
				<tr>
					<td><?php
						switch($row_timetable["weekday"]) {
							case 0:
								echo "شنبه";
							break;
							case 1:
								echo "یکشنبه";
							break;
							case 2:
								echo "دوشنبه";
							break;
							case 3:
								echo "سه شنبه";
							break;
							case 4:
								echo "چهارشنبه";
							break;
							case 5:
								echo "پنج شنبه";
							break;
						}
					?></td>
					<?php
						if($row_timetable["lesson_hour"] == 1) {
							echo "<td>";
								echo $row_timetable["subject_name"];
								echo "<br><small>(" . $row_timetable["teacher_name"] . ")</small>";
							echo "</td>";
						}
					?>
			<?php } ?>
			
			<?php if($weekday == $row_timetable["weekday"]) { ?>
					<?php
						if($row_timetable["lesson_hour"] == 1) {
							echo "<td>";
								echo $row_timetable["subject_name"];
								echo "<br><small>(" . $row_timetable["teacher_name"] . ")</small>";
							echo "</td>";
						}
					?>
			<?php } ?>
			<?php if($weekday == $row_timetable["weekday"]) { ?>
					<?php
						if($row_timetable["lesson_hour"] == 2) {
							echo "<td>";
								echo $row_timetable["subject_name"];
								echo "<br><small>(" . $row_timetable["teacher_name"] . ")</small>";
							echo "</td>";
						}
					?>
			<?php } ?>
			<?php if($weekday == $row_timetable["weekday"]) { ?>
					<?php
						if($row_timetable["lesson_hour"] == 3) {
							echo "<td>";
								echo $row_timetable["subject_name"];
								echo "<br><small>(" . $row_timetable["teacher_name"] . ")</small>";
							echo "</td>";
						}
					?>
			<?php } ?>
			<?php if($weekday == $row_timetable["weekday"]) { ?>
					<?php
						if($row_timetable["lesson_hour"] == 4) {
							echo "<td>";
								echo $row_timetable["subject_name"];
								echo "<br><small>(" . $row_timetable["teacher_name"] . ")</small>";
							echo "</td>";
						}
					?>
			<?php } ?>
			<?php if($weekday == $row_timetable["weekday"]) { ?>
					<?php
						if($row_timetable["lesson_hour"] == 5) {
							echo "<td>";
								echo $row_timetable["subject_name"];
								echo "<br><small>(" . $row_timetable["teacher_name"] . ")</small>";
							echo "</td>";
						}
					?>
			<?php } ?>
			<?php if($weekday == $row_timetable["weekday"]) { ?>
					<?php
						if($row_timetable["lesson_hour"] == 6) {
							echo "<td>";
								echo $row_timetable["subject_name"];
								echo "<br><small>(" . $row_timetable["teacher_name"] . ")</small>";
							echo "</td>";
						}
					?>
			<?php } ?>
			
		
			<?php $weekday = $row_timetable["weekday"]; ?>
			
		<?php } ?>
	
			
	</table>
<?php } ?>


<?php require_once("footer.php"); ?>