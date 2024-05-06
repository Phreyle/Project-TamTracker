<?php
	
    require_once 'TamTracker_DB.php';
	
	// Set timezone to Philippine Standard Time
	date_default_timezone_set('Asia/Manila');
	
	if(ISSET($_REQUEST['id']))
	{
		$TT_RESTORE_ID = $_REQUEST['id'];
		$TT_RESTORE_QUERY = mysqli_query($TT_DB, "SELECT * FROM `tt_archive_table` WHERE `SHUTTLE_NUMERO` = '$TT_RESTORE_ID'") or die(mysqli_error());
		$TT_RESTORE_FETCH = mysqli_fetch_array($TT_RESTORE_QUERY);
		
		// Get the current date and time
		$currentDateTime = date("Y-m-d H:i:s");


		mysqli_query($TT_DB, "INSERT INTO `tt_shuttle_table` VALUES('$TT_RESTORE_FETCH[SHUTTLE_NUMERO]', '$TT_RESTORE_FETCH[SHUTTLE_ID]', '$TT_RESTORE_FETCH[SHUTTLE_STATUS]','$TT_RESTORE_FETCH[BED_PASSENGER]','$TT_RESTORE_FETCH[FRONT_GATE_PASSENGER]', '$TT_RESTORE_FETCH[HED_PASSENGER]', '$currentDateTime', '$TT_RESTORE_FETCH[SHUTTLE_ORAS1]', '$TT_RESTORE_FETCH[SHUTTLE_DRIVER]')") or die(mysqli_error());

			/*
              SHUTTLE_ORAS = DATE MODIFIED
              SHUTTLE_ORAS1 = DATE CREATED

              THERE IS NO DATE ACCESSED FOR SHUTTLE
            */

		mysqli_query($TT_DB, "DELETE FROM `tt_archive_table` WHERE `SHUTTLE_NUMERO` = '$TT_RESTORE_ID'") or die(mysqli_error());
        header('location:TamTracker_ArchivePage.php');
	}
	
?>