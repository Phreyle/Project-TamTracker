<!--

	THIS IS THE LANDING PAGE FOR USERS WHERE POSITION = ADMIN

	THIS PAGE CONSISTS OF A GRAPH DISPLAYED FROM THE DATA IN THE TABLES IN THE DATABASE

	DISPLAY 1 BUTTON THAT WILL BE LINKED TO TamTracker_AdminPage.php

	BUTTONS:
-->
<?php
include 'TamTracker_DB.php';

$Active_Shuttle_Query= "SELECT count(SHUTTLE_STATUS) as ACTIVE, SHUTTLE_ID from tt_shuttle_table WHERE SHUTTLE_STATUS='ACTIVE' GROUP BY SHUTTLE_ID";
$Active_Shuttle_Result=mysqli_query($TT_DB,$Active_Shuttle_Query);
$Active_Shuttle_Count = mysqli_num_rows($Active_Shuttle_Result);

$Inactive_Shuttle_Query= "SELECT count(SHUTTLE_STATUS) as INACTIVE, SHUTTLE_ID from tt_shuttle_table WHERE SHUTTLE_STATUS='INACTIVE' GROUP BY SHUTTLE_ID";
$Inactive_Shuttle_Result=mysqli_query($TT_DB,$Inactive_Shuttle_Query);
$Inactive_Shuttle_Count = mysqli_num_rows($Inactive_Shuttle_Result);


// Query to count the number of pings for each passenger type
$Ping_Query = "SELECT 
                    SUM(CASE WHEN BED_PASSENGER IS NOT NULL and BED_PASSENGER!='0000-00-00 00:00:00' THEN 1 ELSE 0 END) as BED_PINGS,
                    SUM(CASE WHEN HED_PASSENGER IS NOT NULL and BED_PASSENGER!='0000-00-00 00:00:00' THEN 1 ELSE 0 END) as HED_PINGS,
                    SUM(CASE WHEN FRONT_GATE_PASSENGER IS NOT NULL and BED_PASSENGER!='0000-00-00 00:00:00' THEN 1 ELSE 0 END) as FG_PINGS 
               FROM tt_shuttle_table";

$Ping_Result = mysqli_query($TT_DB, $Ping_Query);


?>
<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TAMTRACK ADMIN</title>
  <link rel="shortcut icon" href="TamTracker_LOGO.png">
  <script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.0.3/maptiler-sdk.umd.min.js"></script>
  <link href="https://cdn.maptiler.com/maptiler-sdk-js/v2.0.3/maptiler-sdk.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- plugins:css -->

  <link rel="stylesheet" href="../TamTracker/majestic-admin-pro/themes/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../TamTracker/majestic-admin-pro/themes/assets/css/vertical-layout-dark/style.css">
  <!-- endinject -->
  <style>
    body { margin: 0; padding: 0; }
    #map { position: absolute; top: 0; bottom: 0; width: 100%; }
  </style>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawCharts);

			function drawCharts() {
				drawPieChart();
				drawColumnChart();
				drawMapChart();

			}

			function drawPieChart() 
			{
					var data = google.visualization.arrayToDataTable([
					['course', 'course_total'],

				<?php
					while($row=mysqli_fetch_array($Active_Shuttle_Result))
					{
						echo "['".$row["SHUTTLE_ID"]."',".$row["ACTIVE"]."],";
					}
				?>
				]);

				var options = 
				{
					title: 'STATUS',

					chartArea: {width: '100%'},

					vAxis: 
					{
						minValue: 0,
						title: 'FREE'
					},

					hAxis: 
					{
						title: 'ACTIVE SHUTTLES'
					},
				
					is3D: true
				};

				var chart = new google.visualization.ColumnChart(document.getElementById('tt_shuttle_table')); 

				chart.draw(data, options);
			}


			function drawColumnChart() 
			{
					var data = google.visualization.arrayToDataTable([
					['course', 'course_total'],

				<?php
					while($row=mysqli_fetch_array($Inactive_Shuttle_Result))
					{
						echo "['".$row["SHUTTLE_ID"]."',".$row["INACTIVE"]."],";
					}
				?>
				]);

				var options = 
				{
					title: 'STATUS',

					chartArea: {width: '100%'},

					vAxis: 
					{
						minValue: 0,
						title: 'FREE'
					},

					hAxis: 
					{
						title: 'INACTIVE SHUTTLES'
					},
				
					is3D: true
				};

				var chart = new google.visualization.PieChart(document.getElementById('INACTIVE_tt_shuttle_table')); 

				chart.draw(data, options);
			}

      function drawMapChart() 
      {
          var data = google.visualization.arrayToDataTable([
          ['course', 'course_total'],

        <?php
          while($row=mysqli_fetch_array($Ping_Result))
          {
          
            if ($row > 0) 
            {

                //fetching res
                //$Ping_Data = mysqli_fetch_assoc($Ping_Result);

                // Format data for Google Chart
                $bedPings = $row['BED_PINGS'];
                $hedPings = $row['HED_PINGS'];
                $fgPings = $row['FG_PINGS'];

                // Output JSON data
                $output = array(
                    array('Type', 'Pings'),
                    array('Bed Passenger', $bedPings),
                    array('Hed Passenger', $hedPings),
                    array('Front Gate Passenger', $fgPings)




                );
                $json = json_encode($output,JSON_FORCE_OBJECT);
                echo $json;

            } 
            else 
            {
                echo "0 results";

            }
          }
        ?>
        ]);

        var options = 
        {
          title: 'STATUS',

          chartArea: {width: '100%'},

          vAxis: 
          {
            minValue: 0,
            title: 'FREE'
          },

          hAxis: 
          {
            title: 'INACTIVE SHUTTLES'
          },
        
          is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('PING_QUERY')); 

        chart.draw(data, options);
      }

			
		</script>



</head>
<body>
     <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
      <a class="navbar-brand brand-logo" href="index.html"><img src="../TamTracker/majestic-admin-pro/themes/assets/images/logotamtrack.png"
          alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../TamTracker/majestic-admin-pro/themes/assets/images/logotamtrack.png" alt="logo" /></a>
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-sort-variant"></span>
      </button>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav me-lg-4 w-100">
      <li class="nav-item nav-search d-none d-lg-block w-100">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search">
              <i class="mdi mdi-magnify"></i>
            </span>
          </div>
          <input type="text" class="form-control" placeholder="Search now" aria-label="search"
            aria-describedby="search">
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown me-1">
        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
          id="messageDropdown" href="#" data-bs-toggle="dropdown">
          <i class="mdi mdi-message-text mx-0"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content flex-grow">
              <h6 class="preview-subject ellipsis font-weight-normal">David Grey
              </h6>
              <p class="font-weight-light small-text text-muted mb-0">
                The meeting is cancelled
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
  
            <div class="preview-item-content flex-grow">
              <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
              </h6>
              <p class="font-weight-light small-text text-muted mb-0">
                New product launch
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content flex-grow">
              <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
              </h6>
              <p class="font-weight-light small-text text-muted mb-0">
                Upcoming board meeting
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item dropdown me-4">
        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown"
          id="notificationDropdown" href="#" data-bs-toggle="dropdown">
          <i class="mdi mdi-bell mx-0"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
          aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="mdi mdi-information mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Application Error</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Just now
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="mdi mdi-weather-sunny mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Settings</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Private message
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-info">
                <i class="mdi mdi-account-box mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">New user registration</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                2 days ago
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <span>Louis Barnett</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
            <i class="mdi mdi-cog text-primary"></i>
            Settings
          </a>
          <a class="dropdown-item">
            <i class="mdi mdi-logout text-primary"></i>
            Logout
          </a>
        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-flex">
        <a class="nav-link" href="#">
          <i class="mdi mdi-apps"></i>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="right-sidebar-toggler-wrapper">
  <!-- <div class="sidebar-toggler" id="layout-toggler"><i class="mdi mdi-weather-sunny"></i></div> -->
  <div class="sidebar-toggler" id="chat-toggler"><i class="mdi mdi-chat-processing"></i></div>
  <div class="sidebar-toggler"><a href="https://demo.bootstrapdash.com/majestic-admin-pro/docs/documentation.html"
    target="_blank"><i class="mdi mdi-file-document-outline"></i></a></div>
  <div class="sidebar-toggler"><a href="https://www.bootstrapdash.com/product/majestic-admin-pro/" target="_blank"><i
        class="mdi mdi-cart"></i></a></div>
</div>
<div class="theme-setting-wrapper">
  <div id="theme-settings" class="settings-panel">
    <i class="settings-close mdi mdi-close"></i>
    <p class="settings-heading">SIDEBAR SKINS</p>
    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
      <div class="img-ss rounded-circle bg-light border me-3"></div>Light
    </div>
    <div class="sidebar-bg-options" id="sidebar-dark-theme">
      <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
    </div>
    <p class="settings-heading mt-2">HEADER SKINS</p>
    <div class="color-tiles mx-0 px-4">
      <div class="tiles success"></div>
      <div class="tiles warning"></div>
      <div class="tiles danger"></div>
      <div class="tiles info"></div>
      <div class="tiles dark"></div>
      <div class="tiles default"></div>
    </div>
  </div>
  <!-- <div id="layout-settings" class="settings-panel">
    <i class="settings-close mdi mdi-close"></i>
    <div class="d-flex align-items-center justify-content-between border-bottom">
      <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Template Demos </p>
    </div>
    <div class="demo-screen-wrapper">
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-default-light/index.html"
        class="demo-thumb-image" id="theme-light-switch">
        <img src="../assets/images/demo/vertical-default.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-default-dark/index.html"
        class="demo-thumb-image">
        <img src="../assets/images/demo/vertical-dark.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/horizontal-default-light/index.html"
        class="demo-thumb-image" id="theme-dark-switch">
        <img src="../assets/images/demo/horizontal-menu-light.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/horizontal-default-dark/index.html"
        class="demo-thumb-image">
        <img src="../assets/images/demo/horizontal-menu-dark.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-dark-sidebar/index.html"
        class="demo-thumb-image">
        <img src="../assets/images/demo/dark-sidebar.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-boxed/index.html"
        class="demo-thumb-image">
        <img src="../assets/images/demo/boxed-layout.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-icon-menu/index.html"
        class="demo-thumb-image">
        <img src="../assets/images/demo/icon-menu.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-compact/index.html"
        class="demo-thumb-image">
        <img src="../assets/images/demo/compact-menu.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-fixed/index.html"
        class="demo-thumb-image">
        <img src="../assets/images/demo/fixed-menu.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-hidden-toggle/index.html"
        class="demo-thumb-image">
        <img src="../assets/images/demo/toggle-menu.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-toggle-overlay/index.html"
        class="demo-thumb-image">
        <img src="../assets/images/demo/toggle-overlay-menu.png" alt="demo image">
      </a>
    </div>
  </div> -->
</div>

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="TamTracker_LANDING_ADMIN.php">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="mdi mdi-chart-pie menu-icon"></i>
        <span class="menu-title">Charts</span>
        <span class="material-symbols-outlined menu-title">
              keyboard_arrow_down
        </span>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/charts/chartjs.html">ChartJs</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/charts/morris.html">Morris</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/charts/flot-chart.html">Flot</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/charts/google-charts.html">Google charts</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/charts/sparkline.html">Sparkline js</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/charts/c3.html">C3 charts</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/charts/chartist.html">Chartists</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/charts/justGage.html">JustGage</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Tables</span>
        <span class="material-symbols-outlined menu-title">
              keyboard_arrow_down
        </span>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/tables/basic-table.php">Admin Table</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/tables/data-table.html">Data table</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/tables/js-grid.html">Js-grid</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/tables/sortable-table.html">Sortable table</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
        <i class="mdi mdi-map menu-icon"></i>
        <span class="menu-title">Maps</span>
         <span class="material-symbols-outlined menu-title">
              keyboard_arrow_down
        </span>
      </a>
      <div class="collapse" id="maps">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/maps/mapael.html">Mapael</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/maps/vector-map.html">Vector Map</a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/maps/google-maps.html">Google Map</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <span class="material-symbols-outlined menu-title">
              keyboard_arrow_down
        </span>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/samples/login-2.html"> Login 2 </a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/samples/register.html"> Register </a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/samples/register-2.html"> Register 2 </a></li>
          <li class="nav-item"> <a class="nav-link" href="../TamTracker/majestic-admin-pro/themes/vertical-default-dark/pages/samples/lock-screen.html"> Lockscreen </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://demo.bootstrapdash.com/majestic-admin-pro/docs/documentation.html">
        <i class="mdi mdi-file-document-box menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="me-md-3 me-xl-5">
                    <h2>Welcome back,</h2>
                    <p class="mb-md-0">Your analytics dashboard template.</p>
                  </div>
                  <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Analytics</p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
        

                  <button class="btn btn-primary mt-2 mt-xl-0">Download report</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4 border-left-0 border-top-0 border-right-0" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Total Pings</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Sales</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="purchases-tab" data-bs-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Purchases</a>
                    </li>
                  </ul>
                  <div class="tab-content py-0 px-0 border-left-0 border-bottom-0 border-right-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-calendar-heart"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Start date</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-body shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-currency-usd"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Revenue</small>
                            <h5 class="me-2 mb-0">$577545</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-eye"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total views</small>
                            <h5 class="me-2 mb-0">9833550</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-download"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Downloads</small>
                            <h5 class="me-2 mb-0">2233783</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-flag"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Flagged</small>
                            <h5 class="me-2 mb-0">3497843</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-calendar-heart"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Start date</small>  
                              <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-body shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkB" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkB">
                                  <a class="dropdown-item" href="#">12 Aug 2018</a>
                                  <a class="dropdown-item" href="#">22 Sep 2018</a>
                                  <a class="dropdown-item" href="#">21 Oct 2018</a>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-currency-usd"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Revenue</small>
                            <h5 class="me-2 mb-0">$577545</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-eye"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total views</small>
                            <h5 class="me-2 mb-0">9833550</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-download"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Downloads</small>
                            <h5 class="me-2 mb-0">2233783</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-flag"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Flagged</small>
                            <h5 class="me-2 mb-0">3497843</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-calendar-heart"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Start date</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-body shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkC" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                              </a>
                            
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkC">
                                <a class="dropdown-item" href="#">12 Aug 2018</a>
                                <a class="dropdown-item" href="#">22 Sep 2018</a>
                                <a class="dropdown-item" href="#">21 Oct 2018</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-currency-usd"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Revenue</small>
                            <h5 class="me-2 mb-0">$577545</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-eye"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total views</small>
                            <h5 class="me-2 mb-0">9833550</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-download"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Downloads</small>
                            <h5 class="me-2 mb-0">2233783</h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-left justify-content-md-center px-4 px-md-0 mx-1 mx-md-0 p-3 item">
                          <div class="icon-box-dark me-3">
                            <i class="mdi mdi-flag"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Flagged</small>
                            <h5 class="me-2 mb-0">3497843</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xl-3 grid-margin stretch-card">
              <div class="card">
                <div id="cashSalesCarousel" class="carousel slide card-carousel" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="card-body border-bottom">
                        <p class="card-title">Active Shuttle</p>
                        <div class="row">
                        	<!--ACTIVE-->
                          <div id="tt_shuttle_table"></div>
                          <div class="col-6">
                            
                          </div>
                         
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <div>
                            <p>NUMBER OF ACTIVE SHUTTLE:</p>
                            <div class="d-flex align-items-center mt-2">
                              <small><?php echo $Active_Shuttle_Count; ?></small>
                              <i class="mdi mdi-chevron-up"></i>
                            </div>
                          </div>
                          <div>
                            <div class="icon-box-primary icon-box-lg">
                              <i class="mdi mdi-wallet"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="card-body border-bottom">
                        <p class="card-title">Available Shuttle</p>
                        <div class="row">
                          <div class="col-6">
                            <canvas id="cash-sales-chart-b"></canvas>
                          </div>
                          <div class="col-6">
                            <div class="d-flex align-items-center ms-2">
                              <h2 class="font-weight-bold mb-0 me-1">41%</h2>
                              <i class="mdi mdi-chevron-up text-success icon-md"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <div>
                            <p>Sales last month</p>
                            <h2 class="mb-0">1133</h2>
                            <div class="d-flex align-items-center mt-2">
                              <small>0.387%</small>
                              <i class="mdi mdi-chevron-up"></i>
                            </div>
                          </div>
                          <div>
                            <div class="icon-box-primary icon-box-lg">
                              <i class="mdi mdi-wallet"></i>
                            </div>
                          </div>
                        </div>
                        <h5>Gross sales of August</h5>
                        <p class="text-muted mb-0">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev bg-white" href="#cashSalesCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next bg-white" href="#cashSalesCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  </a>
                </div>    
              </div>
            </div>
            <div class="col-md-6 col-xl-3 grid-margin stretch-card">
              <div class="card">
                <div id="monthlyIncomeCarousel" class="carousel slide card-carousel" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="card-body border-bottom">
                        <p class="card-title">Inactive Shuttle</p>
                        <div class="row">
                          <div id="INACTIVE_tt_shuttle_table"></div>
                          <div class="col-6">

                          </div>
                          <div class="col-6">
                       
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <div>
                            <p>NUMBER OF INACTIVE SHUTTLE</p>
                            <div class="d-flex align-items-center mt-2">
                              <small><?php echo $Inactive_Shuttle_Count; ?></small>
                              <i class="mdi mdi-chevron-up"></i>
                            </div>
                          </div>
                          <div>
                            <div class="icon-box-warning icon-box-lg">
                              <i class="mdi mdi-credit-card"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="card-body border-bottom">
                        <p class="card-title">Monthly income</p>
                        <div class="row">
                          <div class="col-6">
                            <canvas id="monthly-income-chart-b"></canvas>
                          </div>
                          <div class="col-6">
                            <div class="d-flex align-items-center ms-2">
                              <h2 class="font-weight-bold mb-0 me-1">23%</h2>
                              <i class="mdi mdi-chevron-up text-warning icon-md"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <div>
                            <p>Sales income</p>
                            <h2 class="mb-0">7368</h2>
                            <div class="d-flex align-items-center mt-2">
                              <small>0.489%</small>
                              <i class="mdi mdi-chevron-up"></i>
                            </div>
                          </div>
                          <div>
                            <div class="icon-box-warning icon-box-lg">
                              <i class="mdi mdi-credit-card"></i>
                            </div>
                          </div>
                        </div>
                        <h5>Gross sales of February</h5>
                        <p class="text-muted mb-0">The first is a non technical method which requires the use of adware removal software. Download free </p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev bg-white" href="#monthlyIncomeCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next bg-white" href="#monthlyIncomeCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  </a>
                </div>    
              </div>
            </div>
            <div class="col-md-6 col-xl-3 grid-margin stretch-card">
              <div class="card">
                <div id="yearlySalesCarousel" class="carousel slide card-carousel" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="card-body border-bottom">
                        <p class="card-title">Ping</p>
                        <div class="row">
                          <div class="col-6">
                          </div>
                          <div id="PING_QUERY"></div>
                          <div class="col-6">
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between mb-3">
                          <div>
                            <p>NUMBER OF PINGS</p>
                            <div class="d-flex align-items-center mt-2">
                              <small><?php echo "BED TOTAL: ".$bedPings ?></small>
                              <i class="mdi mdi-chevron-up"></i>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                              <small><?php echo "HED TOTAL: ".$hedPings ?></small>
                              <i class="mdi mdi-chevron-up"></i>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                              <small><?php echo "FRONT-GATE TOTAL: ".$fgPings ?></small>
                              <i class="mdi mdi-chevron-up"></i>
                            </div>
                          </div>
                          <div>
                            <div class="icon-box-warning icon-box-lg">
                              <i class="mdi mdi-credit-card"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="card-body border-bottom">
                        <p class="card-title">Yearly sales</p>
                        <div class="row">
                          <div class="col-6">
                            <canvas id="yearly-sales-chart-b"></canvas>
                          </div>
                          <div class="col-6">
                            <div class="d-flex align-items-center ms-2">
                              <h2 class="font-weight-bold mb-0 me-1">29%</h2>
                              <i class="mdi mdi-chevron-down text-danger icon-md"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <div>
                            <p>Purchases</p>
                            <h2 class="mb-0">8543</h2>
                            <div class="d-flex align-items-center mt-2">
                              <small>0.795%</small>
                              <i class="mdi mdi-chevron-down"></i>
                            </div>
                          </div>
                          <div>
                            <div class="icon-box-info icon-box-lg">
                              <i class="mdi mdi-cart"></i>
                            </div>
                          </div>
                        </div>
                        <h5>Gross sales of April</h5>
                        <p class="text-muted mb-0">While most people enjoy casino gambling, sports betting, lottery and bingo playing for the fun and </p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev bg-white" href="#yearlySalesCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next bg-white" href="#yearlySalesCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  </a>
                </div>    
              </div>
            </div>
            <div class="col-md-6 col-xl-3 grid-margin stretch-card">
              <div class="card">
                <div id="dailyDepositsCarousel" class="carousel slide card-carousel" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="card-body border-bottom">
                        <p class="card-title">Peak Hours</p>
                        <div class="row">
                          <div class="col-6">
                            <canvas id="daily-deposits-chart"></canvas>
                          </div>
                          <div class="col-6">
                            <div class="d-flex align-items-center ms-2">
                              <h2 class="font-weight-bold mb-0 me-1">19%</h2>
                              <i class="mdi mdi-chevron-up text-success icon-md"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <div>
                            <p>Security deposits</p>
                            <h2 class="mb-0">2388</h2>
                            <div class="d-flex align-items-center mt-2">
                              <small>0.321%</small>
                              <i class="mdi mdi-chevron-up"></i>
                            </div>
                          </div>
                          <div>
                            <div class="icon-box-success icon-box-lg">
                              <i class="mdi mdi-calendar-heart"></i>
                            </div>
                          </div>
                        </div>
                        <h5>Gross sales of May</h5>
                        <p class="text-muted mb-0">According to the research firm Frost & Sullivan, the estimated size of the North American used test</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="card-body border-bottom">
                        <p class="card-title">Daily deposits</p>
                        <div class="row">
                          <div class="col-6">
                            <canvas id="daily-deposits-chart-b"></canvas>
                          </div>
                          <div class="col-6">
                            <div class="d-flex align-items-center ms-2">
                              <h2 class="font-weight-bold mb-0 me-1">33%</h2>
                              <i class="mdi mdi-chevron-up text-success icon-md"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          <div>
                            <p>Security deposits</p>
                            <h2 class="mb-0">7589</h2>
                            <div class="d-flex align-items-center mt-2">
                              <small>0.321%</small>
                              <i class="mdi mdi-chevron-up"></i>
                            </div>
                          </div>
                          <div>
                            <div class="icon-box-success icon-box-lg">
                              <i class="mdi mdi-calendar-heart"></i>
                            </div>
                          </div>
                        </div>
                        <h5>Gross sales of June</h5>
                        <p class="text-muted mb-0">According to the research firm Frost & Sullivan, the estimated size of the North American used test</p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev bg-white" href="#dailyDepositsCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next bg-white" href="#dailyDepositsCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  </a>
                </div>    
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body" id="map">
                  <script>
                      maptilersdk.config.apiKey = 'qiuj2gHMeexu7PCXA5uU';
                      const map = new maptilersdk.Map({
                        container: 'map', // container's id or the HTML element to render the map
                        style: maptilersdk.MapStyle.STREETS,
                        center: [120.9606643140955,14.2371774984415], // starting position [lng, lat]
                        zoom: 16, // starting zoom
                      });
                  </script>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Total sales</p>
                  <h1>$ 28835</h1>
                  <h4>Gross sales over the years</h4>
                  <p class="text-muted">Today, many people rely on computers to do homework, work, and create or store useful information. Therefore, it is important </p>
                  <div id="total-sales-chart-legend" class="legend-small"></div>                  
                </div>
                <canvas id="total-sales-chart"></canvas>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Recent Purchases</p>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status report</th>
                            <th>Office</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Gross amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>Jeremy Ortega</td>
                            <td>Levelled up</td>
                            <td>Catalinaborough</td>
                            <td>$790</td>
                            <td>06 Jan 2018</td>
                            <td>$2274253</td>
                        </tr>
                        <tr>
                            <td>Alvin Fisher</td>
                            <td>Ui design completed</td>
                            <td>East Mayra</td>
                            <td>$23230</td>
                            <td>18 Jul 2018</td>
                            <td>$83127</td>
                        </tr>
                        <tr>
                            <td>Emily Cunningham</td>
                            <td>support</td>
                            <td>Makennaton</td>
                            <td>$939</td>
                            <td>16 Jul 2018</td>
                            <td>$29177</td>
                        </tr>
                        <tr>
                            <td>Minnie Farmer</td>
                            <td>support</td>
                            <td>Agustinaborough</td>
                            <td>$30</td>
                            <td>30 Apr 2018</td>
                            <td>$44617</td>
                        </tr>
                        <tr>
                            <td>Betty Hunt</td>
                            <td>Ui design not completed</td>
                            <td>Lake Sandrafort</td>
                            <td>$571</td>
                            <td>25 Jun 2018</td>
                            <td>$78952</td>
                        </tr>
                        <tr>
                            <td>Myrtie Lambert</td>
                            <td>Ui design completed</td>
                            <td>Cassinbury</td>
                            <td>$36</td>
                            <td>05 Nov 2018</td>
                            <td>$36422</td>
                        </tr>
                        <tr>
                            <td>Jacob Kennedy</td>
                            <td>New project</td>
                            <td>Cletaborough</td>
                            <td>$314</td>
                            <td>12 Jul 2018</td>
                            <td>$34167</td>
                        </tr>
                        <tr>
                            <td>Ernest Wade</td>
                            <td>Levelled up</td>
                            <td>West Fidelmouth</td>
                            <td>$484</td>
                            <td>08 Sep 2018</td>
                            <td>$50862</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
              <div class="card border-0 bg-primary text-white">
                <div id="downloads-carousel" class="carousel slide card-carousel" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="card-body pb-0">
                        <p class="card-title text-white">Downloads</p>
                        <h1>8543</h1>
                        <h4>Growth 58%</h4>
                      </div>
                      <canvas height="110" id="downloads-chart-a"></canvas>
                    </div>
                    <div class="carousel-item">
                      <div class="card-body pb-0">
                        <p class="card-title text-white">Uploads</p>
                        <h1>4533</h1>
                        <h4>Growth 32%</h4>
                      </div>
                      <canvas height="110" id="downloads-chart-b"></canvas>
                    </div>
                  </div>
                  <a class="carousel-control-prev control-light" href="#downloads-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next control-light" href="#downloads-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  </a>
                </div>  
              </div>
            </div>
            <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
              <div class="card border-0 bg-warning text-white">
                <div id="feedbacks-carousel" class="carousel slide card-carousel" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="card-body pb-0">
                        <p class="card-title text-white">feedbacks</p>
                        <h1>3568</h1>
                        <h4>Growth 12%</h4>
                      </div>
                      <canvas height="110" id="feedbacks-chart-a"></canvas>
                    </div>
                    <div class="carousel-item">
                      <div class="card-body pb-0">
                        <p class="card-title text-white">feedbacks</p>
                        <h1>8290</h1>
                        <h4>Growth 11%</h4>
                      </div>
                      <canvas height="110" id="feedbacks-chart-b"></canvas>
                    </div>
                  </div>
                  <a class="carousel-control-prev control-light" href="#feedbacks-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next control-light" href="#feedbacks-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  </a>
                </div>  
              </div>
            </div>
            <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
              <div class="card border-0 bg-success text-white">
                <div id="customers-carousel" class="carousel slide card-carousel" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="card-body pb-0">
                        <p class="card-title text-white">customers</p>
                        <h1>4567</h1>
                        <h4>Growth 31%</h4>
                      </div>
                      <canvas height="110" id="customers-chart-a"></canvas>
                    </div>
                    <div class="carousel-item">
                      <div class="card-body pb-0">
                        <p class="card-title text-white">Users</p>
                        <h1>1782</h1>
                        <h4>Growth 62%</h4>
                      </div>
                      <canvas height="110" id="customers-chart-b"></canvas>
                    </div>
                  </div>
                  <a class="carousel-control-prev control-light" href="#customers-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next control-light" href="#customers-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  </a>
                </div>  
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a
        href="https://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
    <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
        class="mdi mdi-heart text-danger"></i></span>
  </div>
</footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../TamTracker/majestic-admin-pro/themes/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../TamTracker/majestic-admin-pro/themes/assets/vendors/chart.js/chart.umd.js"></script>
  <script src="../TamTracker/majestic-admin-pro/themes/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../TamTracker/majestic-admin-pro/themes/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../TamTracker/majestic-admin-pro/themes/assets/js/off-canvas.js"></script>
  <script src="../TamTracker/majestic-admin-pro/themes/assets/js/hoverable-collapse.js"></script>
  <script src="../TamTracker/majestic-admin-pro/themes/assets/js/template.js"></script>
  <script src="../TamTracker/majestic-admin-pro/themes/assets/js/settings.js"></script>
  <script src="../TamTracker/majestic-admin-pro/themes/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../TamTracker/majestic-admin-pro/themes/assets/js/dashboard-dark.js"></script>
  <!-- End custom js for this page-->
  <script src="../TamTracker/majestic-admin-pro/themes/assets/js/jquery.cookie.js" type="text/javascript"></script>

</body>


<!-- Mirrored from demo.bootstrapdash.com/majestic-admin-pro/themes/vertical-default-dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2024 02:20:53 GMT -->
</html>

