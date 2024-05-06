<?php
    
    require_once 'TamTracker_DB.php';
    
    // Set timezone to Philippine Standard Time
    date_default_timezone_set('Asia/Manila');
    
    if(ISSET($_REQUEST['id']))
    {
        $TT_ARCHIVE_ID = $_REQUEST['id'];
        $TT_ARCHIVE_QUERY = mysqli_query($TT_DB, "SELECT * FROM `tt_shuttle_table` WHERE `SHUTTLE_NUMERO` = '$TT_ARCHIVE_ID' ORDER BY SHUTTLE_ORAS ASC") or die(mysqli_error());
        $TT_ARCHIVE_FETCH = mysqli_fetch_array($TT_ARCHIVE_QUERY);
        
        // Get the current date and time
        $currentDateTime = date("Y-m-d H:i:s");

        mysqli_query($TT_DB, "INSERT INTO `tt_archive_table` VALUES('', '', '', '', '', '', '', '', '','','','','','','','','','','$TT_ARCHIVE_FETCH[SHUTTLE_NUMERO]','$TT_ARCHIVE_FETCH[SHUTTLE_ID]','$TT_ARCHIVE_FETCH[SHUTTLE_STATUS]','$TT_ARCHIVE_FETCH[BED_PASSENGER]','$TT_ARCHIVE_FETCH[FRONT_GATE_PASSENGER]','$TT_ARCHIVE_FETCH[HED_PASSENGER]','$currentDateTime','','','','','','','','','','','','','','','','','','','','$TT_ARCHIVE_FETCH[SHUTTLE_ORAS]','$TT_ARCHIVE_FETCH[SHUTTLE_ORAS1]','','','','','','$TT_ARCHIVE_FETCH[SHUTTLE_DRIVER]')") or die(mysqli_error($TT_DB));

        mysqli_query($TT_DB, "DELETE FROM `tt_shuttle_table` WHERE `SHUTTLE_NUMERO` = '$TT_ARCHIVE_ID'") or die(mysqli_error());
            
        // Redirect after processing tt_shuttle_table
        header('location:TamTracker_ShuttlePage.php');
    }
    
?>