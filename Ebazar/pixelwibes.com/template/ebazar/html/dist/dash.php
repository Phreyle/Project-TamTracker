



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


<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<!-- Mirrored from pixelwibes.com/template/ebazar/html/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 May 2024 18:24:49 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TAMTRACKER</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.0.3/maptiler-sdk.umd.min.js"></script>
    <link href="https://cdn.maptiler.com/maptiler-sdk-js/v2.0.3/maptiler-sdk.css" rel="stylesheet" />

    <!-- plugin css file  -->
    <link rel="stylesheet" href="assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="assets/plugin/datatables/dataTables.bootstrap5.min.css">

    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css?v=<?php echo time(); ?>">
    



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
          title: '',

          chartArea: {width: '150%'},

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

        var chart = new google.visualization.PieChart(document.getElementById('tt_shuttle_table')); 

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
    <div id="ebazar-layout" class="theme-green">
        
        <!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="dash.php" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                    </span>
                    <span class="logo-text">TamTracker</span>
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                    <li><a class="m-link active" href="dash.php"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>SHUTTLES</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-product">
                                <li><a class="ms-link" href="Shuttle_Table.php">SHUTTLE TABLE</a></li>
                                <li><a class="ms-link" href="product-list.html">SHUTTLE CHARTS</a></li>
                                <li><a class="ms-link" href="product-edit.html">SHUTTLE STATUS</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                            <i class="icofont-chart-flow fs-5"></i> <span>ADMIN</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="categories">
                                <li><a class="ms-link" href="Admin_User.php">Admin Users</a></li>
                                <li><a class="ms-link" href="ADMINID.php">Admin|ID TABLE</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                        <i class="icofont-funky-man fs-5"></i> <span>USER PAGES</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-order">
                            <li><a class="ms-link" href="Guard_Landing.php">Guard Page</a></li>
                            <li><a class="ms-link" href="Student_Dash.php">Regular User Page</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#customers-info" href="#">
                        <i class="icofont-notepad fs-5"></i> <span>DATA & STATISTICS</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="customers-info">
                            <li><a class="ms-link" href="customers.html">Charts & Summary Report</a></li>
                            <li><a class="ms-link" href="customer-detail.html">Documentation</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#app" href="#">
                        <i class="icofont-code-alt fs-5"></i> <span>App</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="app">
                            <li><a class="ms-link" href="calendar.html">Calandar</a></li>
                            <li><a class="ms-link" href="chat.html"> Chat App</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">

                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                            <div class="d-flex">
                                <a class="nav-link text-primary collapsed" href="help.html" title="Get Help">
                                    <i class="icofont-info-square fs-5"></i>
                                </a>
                            </div>
                            <div class="dropdown zindex-popover">
                                <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                                    <img src="assets/images/flag/GB.png" alt="">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3">
                                    <div class="card border-0">
                                        <ul class="list-unstyled py-2 px-3">
                                            <li>
                                                <a href="#" class=""><img src="assets/images/flag/GB.png" alt=""> English</a>
                                            </li>
                                            <li>
                                                <a href="#" class=""><img src="assets/images/flag/DE.png" alt=""> German</a>
                                            </li>
                                            <li>
                                                <a href="#" class=""><img src="assets/images/flag/FR.png" alt=""> French</a>
                                            </li>
                                            <li>
                                                <a href="#" class=""><img src="assets/images/flag/IT.png" alt=""> Italian</a>
                                            </li>
                                            <li>
                                                <a href="#" class=""><img src="assets/images/flag/RU.png" alt=""> Russian</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown notifications">
                                <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="icofont-alarm fs-5"></i>
                                    <span class="pulse-ring"></span>
                                </a>
                                <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3">
                                    <div class="card border-0 w380">
                                        <div class="card-header border-0 p-3">
                                            <h5 class="mb-0 font-weight-light d-flex justify-content-between">
                                                <span>Notifications</span>
                                                <span class="badge text-white">06</span>
                                            </h5>
                                        </div>
                                        <div class="tab-content card-body">
                                            <div class="tab-pane fade show active">
                                                <ul class="list-unstyled list mb-0">
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="assets/images/xs/avatar1.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Chloe Walkerr</span> <small>2MIN</small></p>
                                                                <span class="">Added New Product 2021-07-15 <span class="badge bg-success">Add</span></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <div class="avatar rounded-circle no-thumbnail">AH</div>
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Alan	Hill</span> <small>13MIN</small></p>
                                                                <span class="">Invoice generator </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="assets/images/xs/avatar3.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Melanie	Oliver</span> <small>1HR</small></p>
                                                                <span class="">Orader  Return RT-00004</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="assets/images/xs/avatar5.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Boris Hart</span> <small>13MIN</small></p>
                                                                <span class="">Product Order to Toyseller</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="assets/images/xs/avatar6.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Alan	Lambert</span> <small>1HR</small></p>
                                                                <span class="">Leave Apply</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="assets/images/xs/avatar7.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Zoe Wright</span> <small class="">1DAY</small></p>
                                                                <span class="">Product Stoke Entry Updated</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <a class="card-footer text-center border-top-0" href="#"> View all notifications</a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">John Quinn</span></p>
                                    <small>Admin Profile</small>
                                </div>
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                    <img class="avatar lg rounded-circle img-thumbnail" src="assets/images/profile_av.svg" alt="profile">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img class="avatar rounded-circle" src="assets/images/profile_av.svg" alt="profile">
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0"><span class="font-weight-bold">John	Quinn</span></p>
                                                    <small class="">Johnquinn@gmail.com</small>
                                                </div>
                                            </div>
                                            
                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <a href="admin-profile.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a>
                                            <a href="order-invoices.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-file-text fs-5 me-3"></i>Order Invoices</a>
                                            <a href="ui-elements/auth-signin.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Signout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="setting ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#Settingmodal"><i class="icofont-gear-alt fs-5"></i></a>
                            </div>
                        </div>
        
                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>
        
                        <!-- main menu Search-->
                        <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                            <div class="input-group flex-nowrap input-group-lg">
                                <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                                <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
        
                    </div>
                </nav>
            </div>

            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">

                    <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                        <div class="col">
                            <div class="alert-success alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded no-thumbnail bg-success text-light"><i class="fa  fa-lg"><img src="ACTIVE.png" style="width: 30px; height: 30px;"></i></div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <!--ACTIVE SHUTT-->
                                        <div class="h6 mb-0">TOTAL ACTIVE SHUTTLES</div>

                                         <div><span class="fs-6 fw-bold me-2"><?php echo $Active_Shuttle_Count; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="alert-danger alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa  fa-lg"><img src="MP.png" style="width: 30px; height: 30px;"></i></div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">MOST PING AREA</div>

                                        <!--MAKE THIS DYNAMIC-->
                                        <span class="small">HED</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="alert-warning alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa  fa-lg"><img src="TOTAL_P.png" style="width: 30px; height: 30px;"></i></div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">TOTAL LIVE PINGS</div>
                                        <span class="small">8,925</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="alert-info alert mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa" aria-hidden="true"><img src="CYC.png" style="width: 30px; height: 30px;"></i></div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <div class="h6 mb-0">TOTAL CYCLES</div>
                                        <span class="small">20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->
                    <!---TODAY-->
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="tab-filter d-flex align-items-center justify-content-between mb-3 flex-wrap">
                                <ul class="nav nav-tabs tab-card tab-body-header rounded  d-inline-flex w-sm-100">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#summery-today" >Today</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#summery-week" >Week</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#summery-month" >Month</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#summery-year" >Year</a></li>
                                </ul>
                                <div class="date-filter d-flex align-items-center mt-2 mt-sm-0 w-sm-100">
                                    <div class="input-group">
                                        <input type="date" class="form-control">
                                        <button class="btn btn-primary" type="button"><i class="icofont-filter fs-5"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content mt-1">
                                <div class="tab-pane fade show active" id="summery-today">
                                    <div class="row g-1 g-sm-3 mb-3 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">INACTIVE SHUTTLE</span>
                                                        <div><span class="fs-6 fw-bold me-2"><?php echo $Inactive_Shuttle_Count; ?></span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="INACTIVE.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">RESERVED</span>
                                                        <div><span class="fs-6 fw-bold me-2">2314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="RESS.jpg" style="width: 35px; height: 35px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">REPORT</span>
                                                        <div><span class="fs-6 fw-bold me-2">$1770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="REPORT.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">BED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="BED.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">HED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">10</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="HED_PING.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">FG PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">20</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="FG-PING.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                                <!--WEEEK-->
                                <div class="tab-pane fade" id="summery-week">
                                    <div class="row g-3 mb-4 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">INACTIVE SHUTTLE</span>
                                                        <div><span class="fs-6 fw-bold me-2"><?php echo $Inactive_Shuttle_Count; ?></span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="INACTIVE.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">RESERVED</span>
                                                        <div><span class="fs-6 fw-bold me-2">2314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="RESS.jpg" style="width: 35px; height: 35px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">REPORT</span>
                                                        <div><span class="fs-6 fw-bold me-2">$1770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="REPORT.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">BED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="BED.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">HED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">10</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="HED_PING.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">FG PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">20</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="FG-PING.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                                <!--WEEEK-->
                                <div class="tab-pane fade" id="summery-week">
                                    <div class="row g-3 mb-4 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">INACTIVE SHUTTLE</span>
                                                        <div><span class="fs-6 fw-bold me-2"><?php echo $Inactive_Shuttle_Count; ?></span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <img src="INACTIVE.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">RESERVED</span>
                                                        <div><span class="fs-6 fw-bold me-2">2314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">REPORT</span>
                                                        <div><span class="fs-6 fw-bold me-2">$1770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">BED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">HED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">$35000</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">FG PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">11452</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-users-social fs-3 color-light-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                                <div class="tab-pane fade" id="summery-month">
                                    <div class="row g-3 mb-4 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">INACTIVE SHUTTLE</span>
                                                        <div><span class="fs-6 fw-bold me-2"><?php echo $Inactive_Shuttle_Count; ?></span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="INACTIVE.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">RESERVED</span>
                                                        <div><span class="fs-6 fw-bold me-2">2314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="RESS.jpg" style="width: 35px; height: 35px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">REPORT</span>
                                                        <div><span class="fs-6 fw-bold me-2">$1770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="REPORT.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">BED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="BED.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">HED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">10</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="HED_PING.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">FG PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">20</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="FG-PING.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                                <!--WEEEK-->
                                <div class="tab-pane fade" id="summery-week">
                                    <div class="row g-3 mb-4 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">INACTIVE SHUTTLE</span>
                                                        <div><span class="fs-6 fw-bold me-2"><?php echo $Inactive_Shuttle_Count; ?></span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <img src="INACTIVE.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">RESERVED</span>
                                                        <div><span class="fs-6 fw-bold me-2">2314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">REPORT</span>
                                                        <div><span class="fs-6 fw-bold me-2">$1770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">BED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">HED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">$35000</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">FG PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">11452</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-users-social fs-3 color-light-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                                <div class="tab-pane fade" id="summery-year">
                                    <div class="row g-3 mb-4 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">INACTIVE SHUTTLE</span>
                                                        <div><span class="fs-6 fw-bold me-2"><?php echo $Inactive_Shuttle_Count; ?></span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="INACTIVE.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">RESERVED</span>
                                                        <div><span class="fs-6 fw-bold me-2">2314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="RESS.jpg" style="width: 35px; height: 35px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">REPORT</span>
                                                        <div><span class="fs-6 fw-bold me-2">$1770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="REPORT.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">BED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="BED.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">HED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">10</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="HED_PING.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">FG PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">20</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i><img src="FG-PING.png" style="width: 30px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                                <!--WEEEK-->
                                <div class="tab-pane fade" id="summery-week">
                                    <div class="row g-3 mb-4 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">INACTIVE SHUTTLE</span>
                                                        <div><span class="fs-6 fw-bold me-2"><?php echo $Inactive_Shuttle_Count; ?></span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <img src="INACTIVE.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">RESERVED</span>
                                                        <div><span class="fs-6 fw-bold me-2">2314</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">REPORT</span>
                                                        <div><span class="fs-6 fw-bold me-2">$1770</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-sale-discount fs-3 color-santa-fe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">BED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">185</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-2 fs-3 color-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">HED PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">$35000</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">FG PINGS</span>
                                                        <div><span class="fs-6 fw-bold me-2">11452</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-users-social fs-3 color-light-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- row end -->
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->

                    <div class="row g-3 mb-3">
                        <div class="col-xl-12">
                            <div class="card">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                <h6 class="m-0 fw-bold">CHART FOR ACTIVE SHUTTLES</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="tt_shuttle_table"></div>
                            </div>
                            </div>
                            </div>  
                            </div>
                    </div><!-- Row end  -->

                    <div class="row g-3 mb-3">
                        <div class="col-xxl-8 col-xl-8">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">PEAK HOURS</h6>
                                </div>
                                <div class="card-body">
                                    <div class="ac-line-transparent" id="apex-shoppingstatus"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Top Selling Product</h6>
                                </div>
                                <div class="card-body">
                                    <div id="topselling"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">HED</h6>
                                </div>
                                <div class="card-body">
                                    <div id="map" style="width:100%;height:397px;">
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
                        </div>
                    </div><!-- Row end  -->

                    <div class="row g-3 mb-3 row-deck">
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Active Users Status</h6>
                                </div>
                                <div class="card-body">
                                    <div class="p-4 active-user bg-lightblue rounded-2 mb-2">
                                        <span class="fw-bold d-flex justify-content-center fs-3">1345</span>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Active pages</th>
                                                <th scope="col">Users</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><a href="#">/dist/product.html</a></td>
                                                <td>245</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">/dist/product-cart.html</a></td>
                                                <td>455</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">/dist/admin-profile.html</a></td>
                                                <td>45</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">/dist/order-history.html</a></td>
                                                <td>545</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">/dist/product-detail.html</a></td>
                                                <td>55</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Avg Expense Costs</h6>
                                </div>
                                <div class="card-body">
                                    <div class="h2 mb-0">$1105.5</div>
                                    <span class="text-muted small">Avg Expense Costs All Month</span>
                                    <div id="apex-expense"></div>  
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->

                    <div class="row g-3 mb-3"> 
                        <div class="col-md-12">
                            <div class="card"> 
                                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Recent Transactions</h6>
                                </div>
                                <div class="card-body"> 
                                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Item</th>
                                                <th>Customer Name</th>
                                                <th>Payment Info</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>#Order-78414</strong></td>
                                                <td><img src="assets/images/product/product-1.jpg" class="avatar lg rounded me-2" alt="profile-image"><span> Oculus VR </span></td>
                                                <td>Molly</td>
                                                <td>Credit Card</td>
                                                <td>
                                                    $420
                                                </td>
                                                <td><span class="badge bg-warning">Progress</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-58414</strong></td>
                                                <td><img src="assets/images/product/product-2.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Wall Clock</span></td>
                                                <td>Brian</td>
                                                <td>Debit Card</td>
                                                <td>
                                                    $220
                                                </td>
                                                <td><span class="badge bg-success">Complited</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-48414</strong></td>
                                                <td><img src="assets/images/product/product-3.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Note Diaries</span></td>
                                                <td>Julia</td>
                                                <td>Debit Card</td>
                                                <td>
                                                    $250
                                                </td>
                                                <td><span class="badge bg-success">Complited</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-38414</strong></td>
                                                <td><img src="assets/images/product/product-4.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Flower Port</span></td>
                                                <td>Sonia</td>
                                                <td>Credit Card</td>
                                                <td>
                                                    $320
                                                </td>
                                                <td><span class="badge bg-warning">Progress</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-28414</strong></td>
                                                <td><img src="assets/images/product/product-1.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Oculus VR</span></td>
                                                <td>Adam H</td>
                                                <td>Debit Card</td>
                                                <td>
                                                    $20
                                                </td>
                                                <td><span class="badge bg-warning">Progress</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-18414</strong></td>
                                                <td><img src="assets/images/product/product-2.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Wall Clock</span></td>
                                                <td>Alexander</td>
                                                <td>Debit Card</td>
                                                <td>
                                                    $820
                                                </td>
                                                <td><span class="badge bg-success">Complited</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>#Order-11414</strong></td>
                                                <td><img src="assets/images/product/product-3.jpg" class="avatar lg rounded me-2" alt="profile-image"><span>Note Diaries</span></td>
                                                <td>Gabrielle</td>
                                                <td>Bank Emi</td>
                                                <td>
                                                    $620
                                                </td>
                                                <td><span class="badge bg-success">Complited</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->
                    
                </div>
            </div>
        
            <!-- Modal Custom Settings-->
            <div class="modal fade right" id="Settingmodal" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog  modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Custom Settings</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body custom_setting">
                            <!-- Settings: Color -->
                            <div class="setting-theme pb-3">
                                <h6 class="card-title mb-2 fs-6 d-flex align-items-center"><i class="icofont-color-bucket fs-4 me-2 text-primary"></i>Template Color Settings</h6>
                                <ul class="list-unstyled row row-cols-3 g-2 choose-skin mb-2 mt-2">
                                    <li data-theme="indigo"><div class="indigo"></div></li>
                                    <li data-theme="tradewind"><div class="tradewind"></div></li>
                                    <li data-theme="monalisa"><div class="monalisa"></div></li>
                                    <li data-theme="blue" class="active"><div class="blue"></div></li>
                                    <li data-theme="cyan"><div class="cyan"></div></li>
                                    <li data-theme="green"><div class="green"></div></li>
                                    <li data-theme="orange"><div class="orange"></div></li>
                                    <li data-theme="blush"><div class="blush"></div></li>
                                    <li data-theme="red"><div class="red"></div></li>
                                </ul>
                            </div>
                            <div class="sidebar-gradient py-3">
                                <h6 class="card-title mb-2 fs-6 d-flex align-items-center"><i class="icofont-paint fs-4 me-2 text-primary"></i>Sidebar Gradient</h6>
                                <div class="form-check form-switch gradient-switch pt-2 mb-2">
                                    <input class="form-check-input" type="checkbox" id="CheckGradient">
                                    <label class="form-check-label" for="CheckGradient">Enable Gradient! ( Sidebar )</label>
                                </div>
                            </div>
                            <!-- Settings: Template dynamics -->
                            <div class="dynamic-block py-3">
                                <ul class="list-unstyled choose-skin mb-2 mt-1">
                                    <li data-theme="dynamic"><div class="dynamic"><i class="icofont-paint me-2"></i> Click to Dyanmic Setting</div></li>
                                </ul>
                                <div class="dt-setting">
                                    <ul class="list-group list-unstyled mt-1">
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                            <label>Primary Color</label>
                                            <button id="primaryColorPicker" class="btn bg-primary avatar xs border-0 rounded-0"></button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                            <label>Secondary Color</label>
                                            <button id="secondaryColorPicker" class="btn bg-secondary avatar xs border-0 rounded-0"></button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                            <label class="text-muted">Chart Color 1</label>
                                            <button id="chartColorPicker1" class="btn chart-color1 avatar xs border-0 rounded-0"></button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                            <label class="text-muted">Chart Color 2</label>
                                            <button id="chartColorPicker2" class="btn chart-color2 avatar xs border-0 rounded-0"></button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                            <label class="text-muted">Chart Color 3</label>
                                            <button id="chartColorPicker3" class="btn chart-color3 avatar xs border-0 rounded-0"></button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                            <label class="text-muted">Chart Color 4</label>
                                            <button id="chartColorPicker4" class="btn chart-color4 avatar xs border-0 rounded-0"></button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-1 px-2">
                                            <label class="text-muted">Chart Color 5</label>
                                            <button id="chartColorPicker5" class="btn chart-color5 avatar xs border-0 rounded-0"></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Settings: Font -->
                            <div class="setting-font py-3">
                                <h6 class="card-title mb-2 fs-6 d-flex align-items-center"><i class="icofont-font fs-4 me-2 text-primary"></i> Font Settings</h6>
                                <ul class="list-group font_setting mt-1">
                                    <li class="list-group-item py-1 px-2">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="font" id="font-poppins" value="font-poppins">
                                            <label class="form-check-label" for="font-poppins">
                                                Poppins Google Font
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item py-1 px-2">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="font" id="font-opensans" value="font-opensans" checked="">
                                            <label class="form-check-label" for="font-opensans">
                                                Open Sans Google Font
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item py-1 px-2">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="font" id="font-montserrat" value="font-montserrat">
                                            <label class="form-check-label" for="font-montserrat">
                                                Montserrat Google Font
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item py-1 px-2">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="radio" name="font" id="font-mukta" value="font-mukta">
                                            <label class="form-check-label" for="font-mukta">
                                                Mukta Google Font
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Settings: Light/dark -->
                            <div class="setting-mode py-3">
                                <h6 class="card-title mb-2 fs-6 d-flex align-items-center"><i class="icofont-layout fs-4 me-2 text-primary"></i>Contrast Layout</h6>
                                <ul class="list-group list-unstyled mb-0 mt-1">
                                    <li class="list-group-item d-flex align-items-center py-1 px-2">
                                        <div class="form-check form-switch theme-switch mb-0">
                                            <input class="form-check-input" type="checkbox" id="theme-switch">
                                            <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center py-1 px-2">
                                        <div class="form-check form-switch theme-high-contrast mb-0">
                                            <input class="form-check-input" type="checkbox" id="theme-high-contrast">
                                            <label class="form-check-label" for="theme-high-contrast">Enable High Contrast</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center py-1 px-2">
                                        <div class="form-check form-switch theme-rtl mb-0">
                                            <input class="form-check-input" type="checkbox" id="theme-rtl">
                                            <label class="form-check-label" for="theme-rtl">Enable RTL Mode!</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-start">
                            <button type="button" class="btn btn-white border lift" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary lift">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div> 
            
        </div>
    
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Plugin Js -->
    <script src="assets/bundles/apexcharts.bundle.js"></script>
    <script src="assets/bundles/dataTables.bundle.js"></script>  

    <!-- Jquery Page Js -->
    <script src="../TAMTRACKER/Ebazar/pixelwibes.com/template/ebazar/html/js/template.js"></script>
    <script src="../TAMTRACKER/Ebazar/pixelwibes.com/template/ebazar/html/js/template.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Jr7axGGkwvHRnNfoOzoVRFV3yOPHJEU&amp;callback=myMap"></script>  
    <script>
        $('#myDataTable')
        .addClass( 'nowrap')
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    </script>
</body>

<!-- Mirrored from pixelwibes.com/template/ebazar/html/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 May 2024 18:25:09 GMT -->
</html> 