<?php
    
require_once 'TamTracker_DB.php';

// Set timezone to Philippine Standard Time
date_default_timezone_set('Asia/Manila');

if(isset($_REQUEST['id']))
{
    $TT_ARCHIVE_ID = $_REQUEST['id'];
    $TT_ARCHIVE_QUERY = mysqli_query($TT_DB, "SELECT * FROM `tt_admin_users` WHERE `ADMIN_NUMERO` = '$TT_ARCHIVE_ID' ORDER BY ADMIN_ORAS ASC") or die(mysqli_error($TT_DB));
    $TT_ARCHIVE_FETCH = mysqli_fetch_array($TT_ARCHIVE_QUERY);

    $TT_ADMIN_ORAS = $TT_ARCHIVE_FETCH['ADMIN_ORAS'];
    $TT_ADMIN_ORAS1 = $TT_ARCHIVE_FETCH['ADMIN_ORAS1'];
    $TT_ADMIN_ORAS2 = $TT_ARCHIVE_FETCH['ADMIN_ORAS2'];
    
    // Get the current date and time
    $currentDateTime = date("Y-m-d H:i:s");

    mysqli_query($TT_DB, "INSERT INTO `tt_archive_table` VALUES('$TT_ARCHIVE_FETCH[ADMIN_NUMERO]', '$TT_ARCHIVE_FETCH[ADMIN_EMAIL]', '$TT_ARCHIVE_FETCH[ADMIN_PASSWORD]', '', '', '', '', '', '','','','','','','','','','','','','','','','','$currentDateTime','','','$TT_ARCHIVE_FETCH[ADMIN_POSITION]','','','','','','','','','','','$TT_ADMIN_ORAS','$TT_ADMIN_ORAS1','$TT_ADMIN_ORAS2','','','','','','','','$TT_ARCHIVE_FETCH[ADMIN_FIRST_NAME]','$TT_ARCHIVE_FETCH[ADMIN_LAST_NAME]')") or die(mysqli_error($TT_DB));

    mysqli_query($TT_DB, "DELETE FROM `tt_admin_users` WHERE `ADMIN_NUMERO` = '$TT_ARCHIVE_ID'") or die(mysqli_error($TT_DB));
        
    // Redirect after processing tt_admin_users
    header('location:TamTracker_AdminUsersPage.php');
}
    
?>
