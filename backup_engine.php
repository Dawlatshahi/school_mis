<?php

/***********

/* Host Name */
	$server = "localhost";
/* Username  */
	$username = "root";
/* Password  */
	$password = "";
/* Database  */
	$dbname = "school_mis";
/* Connection */
	$conn = "";
/* Local TimeZone */
	$timezone = "Asia/Kabul";
	
	
function make_sql_backup($backupFile,$tableName){

global $server;
global $username;
global $password;
global $dbname;
global $tblname;
global $conn;
global $timezone;

$outputdata = "";
$lines = "";	

	date_default_timezone_set($timezone);

	$conn = mysqli_connect($server,$username,$password);
	//opening connection
	if(!$conn) {
		die ("Database connection failed : " . mysqli_error());
	}
	//selecting db
	$select_db = mysqli_select_db($conn, $dbname);
	if(!$select_db) {
		die ("Database selection failed : " . mysqli_error());
	}

	$sql = "SHOW TABLES";
	$retval = mysqli_query($conn, $sql);
	if(!$retval)
	{
	  die('Could not retrive tables: ' . mysqli_error());
	}else{
		while($row = mysqli_fetch_array($retval)){
			$tables[] = $row[0];
		}
	}
	$starttime = microtime(true);
	$headers = "-- MySQL Data Dump\n\n";
	$headers .= "-- Database: " . $dbname . "\n\n";
	$headers .= "-- Dumping started at: ". date("Y/m/d h:i:s A") .  "\n\n";


	if($tableName == "all") {
	
	$outputdata .= "\nUSE `$dbname`;\n";
	
	for($t=0;$t<count($tables);$t++) {
	
		// ignore users table
		
		if($tables[$t] == "users" || $tables[$t] == "user_level") {
			continue;
		}
	
		$schema = mysqli_query($conn, "SHOW CREATE TABLE `$tables[$t]`");
		$structure = mysqli_fetch_assoc($schema);
		
		$outputdata .= "\n-- -----------------------------------------------\n\n";	
		$outputdata .= " DROP TABLE IF EXISTS $tables[$t]; \n\n";
		$outputdata .=	"-- Table structure for table $tables[$t]; \n\n";
		$outputdata .=	$structure["Create Table"] . ";";
		
		$outputdata .= "\n\n-- Dumping data for table $tables[$t];\n\n";
		$sql = "SELECT * FROM `$tables[$t]`";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			$nor = count($row);
			$datas = array();
			foreach($row as $r){
				$datas[] = $r;
			}
			$lines .= "INSERT INTO `$tables[$t]` VALUES (";
			for($i=0;$i<$nor;$i++){
				if($datas[$i]===NULL){
					$lines .= "NULL";
				}else if((string)$datas[$i] == "0"){
					$lines .= "0";
				}else if(filter_var($datas[$i],FILTER_VALIDATE_INT) || filter_var($datas[$i],FILTER_VALIDATE_FLOAT)){
					$lines .= $datas[$i];
				}else{
					$lines .= "'" . str_replace("\n","\\n",$datas[$i]) . "'";
				}
				if($i==$nor-1){
					$lines .= ");\n";
				}else{
					$lines .= ",";
				}
			}
			$outputdata .= $lines;
			$lines = "";
		}
	}
	
	$headers .= "-- Dumping finished at: ". date("Y/m/d h:i:s A") .  "\n\n";
	$endtime = microtime(true);
	$diff = $endtime - $starttime;
	$headers .= "-- Dumping of data took: ". $diff .  " Seconds\n\n\n";
	$datadump = $headers . $outputdata;

	$file = fopen($backupFile,"x");
	$len = fwrite($file,$datadump);
	fclose($file);
	if($len != 0){
		return true;
	}else{
		return false;
	}	
	
	}
	
	else if($tableName != "all") {

			$outputdata .= "\nUSE `$dbname`;\n\n";
		
			/* Arrived Table */
			$schema = mysqli_query($conn, "SHOW CREATE TABLE `$tableName`");
			$structure = mysqli_fetch_assoc($schema);
				
			$outputdata .=	"-- Table structure for table $tableName; \n\n";
			$outputdata .=    "DROP TABLE IF EXISTS `$tableName`; \n\n";
			$outputdata .=	$structure["Create Table"] . ";";
		
			$outputdata .= "\n\n-- Dumping data for table $tableName;\n\n";
			$sql = "SELECT * FROM `$tableName`";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				$nor = count($row);
				$datas = array();
				foreach($row as $r){
					$datas[] = $r;
				}
				$lines .= "INSERT INTO `$tableName` VALUES (";
				for($i=0;$i<$nor;$i++){
					if($datas[$i]===NULL){
						$lines .= "NULL";
					}else if((string)$datas[$i] == "0"){
						$lines .= "0";
					}else if(filter_var($datas[$i],FILTER_VALIDATE_INT) || filter_var($datas[$i],FILTER_VALIDATE_FLOAT)){
						$lines .= $datas[$i];
					}else{
						$lines .= "'" . str_replace("\n","\\n",$datas[$i]) . "'";
					}
					if($i==$nor-1){
						$lines .= ");\n";
					}else{
						$lines .= ",";
					}
				}
				$outputdata .= $lines;
				$lines = "";
			}

			
		$headers .= "-- Dumping finished at: ". date("Y/m/d h:i:s A") .  "\n\n";
		$endtime = microtime(true);
		$diff = $endtime - $starttime;
		$headers .= "-- Dumping of data took: ". $diff .  " Seconds\n\n\n";
		$datadump = $headers . $outputdata;
	
		$file = fopen($backupFile,"x");
		$len = fwrite($file,$datadump);
		fclose($file);
		if($len != 0){
			return true;
		}else{
			return false;
		}
	}		
		
}

function restore_sql_backup($filepath) {
	
	global $server;
	global $username;
	global $password;
	global $dbname;
	global $conn;
		
	$file = fopen($filepath, "r");
	
	$conn = mysqli_connect($server,$username,$password);
	mysqli_select_db($conn, $dbname);
	
		$success = true;
		$commands = "";
		
		$commands = fread($file, filesize($filepath));
		
		$command_parts = explode(";",$commands);
		foreach($command_parts as $com) {
			if(strlen($com) > 5) {
				if(!mysqli_query($conn, $com)) {
					$success = false;
					break;
				}
			}
		}
		
		return $success;
}

?>