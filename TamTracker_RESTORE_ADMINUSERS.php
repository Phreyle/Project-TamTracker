<?php
	
    require_once 'TamTracker_DB.php';
	
	// Set timezone to Philippine Standard Time
	date_default_timezone_set('Asia/Manila');
	
	if(ISSET($_REQUEST['id']))
	{
		$TT_RESTORE_ID = $_REQUEST['id'];
		$TT_RESTORE_QUERY = mysqli_query($TT_DB, "SELECT * FROM `tt_archive_table` WHERE `ADMIN_NUMERO` = '$TT_RESTORE_ID'") or die(mysqli_error());
		$TT_RESTORE_FETCH = mysqli_fetch_array($TT_RESTORE_QUERY);
		
		// Get the current date and time
		$currentDateTime = date("Y-m-d H:i:s");
		
		mysqli_query($TT_DB, "INSERT INTO `tt_admin_users` VALUES('$TT_RESTORE_FETCH[ADMIN_NUMERO]', '$TT_RESTORE_FETCH[ADMIN_EMAIL]', '$TT_RESTORE_FETCH[ADMIN_PASSWORD]', '$currentDateTime','$TT_RESTORE_FETCH[ADMIN_POSITION]','$TT_RESTORE_FETCH[ADMIN_ORAS1]','$TT_RESTORE_FETCH[ADMIN_ORAS2]','$TT_RESTORE_FETCH[ADMIN_FIRST_NAME]','$TT_RESTORE_FETCH[ADMIN_LAST_NAME]')") or die(mysqli_error());

			/*
              ADMIN_ORAS = DATE MODIFIED
              ADMIN_ORAS1 = DATE ACCESSED
              ADMIN_ORAS2 = DATE CREATED
            */

		mysqli_query($TT_DB, "DELETE FROM `tt_archive_table` WHERE `ADMIN_NUMERO` = '$TT_RESTORE_ID'") or die(mysqli_error());
        header('location:TamTracker_ArchivePage.php');
	}
	
?>