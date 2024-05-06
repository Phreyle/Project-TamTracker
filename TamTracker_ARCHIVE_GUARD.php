<?php
    
    require_once 'TamTracker_DB.php';
    
    // Set timezone to Philippine Standard Time
    date_default_timezone_set('Asia/Manila');
    
    if(ISSET($_REQUEST['id']))
    {
        $TT_ARCHIVE_ID = $_REQUEST['id'];
        $TT_ARCHIVE_QUERY = mysqli_query($TT_DB, "SELECT * FROM `tt_guard_table` WHERE `GUARD_NUMERO` = '$TT_ARCHIVE_ID' ORDER BY GUARD_ORAS ASC") or die(mysqli_error());
        $TT_ARCHIVE_FETCH = mysqli_fetch_array($TT_ARCHIVE_QUERY);
        
        // Get the current date and time
        $currentDateTime = date("Y-m-d H:i:s");
        
        mysqli_query($TT_DB, "INSERT INTO `tt_archive_table` VALUES('', '', '', '', '', '', '', '', '$TT_ARCHIVE_FETCH[GUARD_NUMERO]','$TT_ARCHIVE_FETCH[GUARD_OUTLOOK]','$TT_ARCHIVE_FETCH[GUARD_FIRST_NAME]','$TT_ARCHIVE_FETCH[GUARD_LAST_NAME]','$TT_ARCHIVE_FETCH[GUARD_PASSWORD]','','','','','','','','','','','','$currentDateTime','','','','$TT_ARCHIVE_FETCH[GUARD_POSITION]','','','','','','','','','','','','','$TT_ARCHIVE_FETCH[GUARD_ORAS]','$TT_ARCHIVE_FETCH[GUARD_ORAS1]','$TT_ARCHIVE_FETCH[GUARD_ORAS2]','','','','','','')") or die(mysqli_error($TT_DB));

        mysqli_query($TT_DB, "DELETE FROM `tt_guard_table` WHERE `GUARD_NUMERO` = '$TT_ARCHIVE_ID'") or die(mysqli_error());
            
        // Redirect after processing tt_guard_table
        header('location:TamTracker_GuardPage.php');
    }
    
?>