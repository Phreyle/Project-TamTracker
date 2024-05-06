<?php
include 'TamTracker_DB.php';

// Set timezone to Philippine Standard Time
date_default_timezone_set('Asia/Manila');

if(isset($_POST['TT_CSP_CREATE_BUTTON'])) 
{
    $TT_CSP_NP = $_POST['TT_CSP_NP_TXTBOX'];
    $TT_CSP_STATUS = isset($_POST['TT_CSP_STATUS_SELECT']) ? $_POST['TT_CSP_STATUS_SELECT'] : '';

    // Check if all fields are filled
    if(empty($TT_CSP_NP) || empty($TT_CSP_STATUS)) 
    {
        echo "All fields are required.";
    } 
    else 
    {
        // Check if SHUTTLE_ID already exists in tt_shuttle_table
        $TT_CSP_CHECK = "SELECT * FROM tt_shuttle_table WHERE SHUTTLE_ID = '$TT_CSP_NP'";
        $TT_CSP_RESULT = mysqli_query($TT_DB, $TT_CSP_CHECK);
        
        if(mysqli_num_rows($TT_CSP_RESULT) > 0) 
        {
            echo "NAME PLATE ALREADY EXISTS.";
        }
        else 
        {
            // If SHUTTLE_ID doesn't exist and all fields are filled, insert new data
            $currentDateTime = date("Y-m-d H:i:s"); // Get current date and time
            $TT_CSP_INSERT = "INSERT INTO tt_shuttle_table (SHUTTLE_ID, SHUTTLE_STATUS, BED_PASSENGER, FRONT_GATE_PASSENGER, HED_PASSENGER, SHUTTLE_ORAS, SHUTTLE_ORAS1) VALUES ('$TT_CSP_NP', '$TT_CSP_STATUS', '','','','','$currentDateTime')";

            /*
              SHUTTLE_ORAS = DATE MODIFIED
              SHUTTLE_ORAS1 = DATE CREATED
            */

            if (mysqli_query($TT_DB, $TT_CSP_INSERT)) 
            {
                echo "SUCCESS!";
            } 
            else 
            {
                echo "Error: " . $TT_CSP_INSERT . "<br>" . mysqli_error($TT_DB);
            }
        }
    }
}
?>



<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<!-- Mirrored from pixelwibes.com/template/ebazar/html/dist/department.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 May 2024 18:27:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>::eBazar:: Departments </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!--HTML5-->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <!-- plugin css file  -->
    <link rel="stylesheet" href="assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="assets/plugin/datatables/dataTables.bootstrap5.min.css">
    
    <!-- project css file  -->
    <link rel="stylesheet" href="assets/css/ebazar.style.min.css?v=<?php echo time(); ?>">
    
    <style>
    /* Custom styles */
    .table-custom thead th {
        background-color: #007bff; /* Blue background color for header */
        color: #ffffff; /* White text color for header */
    }

    .table-custom tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa; /* Light gray background color for odd rows */
    }
    </style>
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
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Registered Shuttles</h3>
                                <div class="col-auto d-flex w-sm-100">
                                    <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#depadd"><i class="icofont-plus-circle me-2 fs-6"></i>ADD SHUTTLE DATA</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row clearfix g-3">
                    <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <table class="table table-striped table-bordered table-custom" id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%>
                                        <thead class="thead-light">
                                            <tr>
                                              <th class="text-center">NUMERO</th>
                                              <th class="text-center">NAMEPLATE</th>
                                              <th class="text-center">STATUS</th>
                                              <th class="text-center">BED PASSENGER</th>
                                              <th class="text-center">FRONT GATE PASSENGER</th>
                                              <th class="text-center">HED PASSENGER</th>
                                              <th class="text-center">DATE MODIFIED</th>
                                              <th class="text-center">DATE CREATED</th>
                                              <th class="text-center">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                  require 'TamTracker_DB.php';
                      
                                                  $TT_SP_QUERY = mysqli_query($TT_DB, "SELECT * FROM `tt_shuttle_table`") or die(mysqli_error());
                                                  while($fetch = mysqli_fetch_array($TT_SP_QUERY))
                                                  {
                                            ?>
                                            <tr>
                                               <td><?php echo $fetch['SHUTTLE_NUMERO']?></td>
                                               <td><?php echo $fetch['SHUTTLE_ID']?></td>
                                               <td><?php echo $fetch['SHUTTLE_STATUS']?></td>
                                               <td><?php echo $fetch['BED_PASSENGER']?></td>
                                               <td><?php echo $fetch['FRONT_GATE_PASSENGER']?></td>
                                               <td><?php echo $fetch['HED_PASSENGER']?></td>
                                               <td><?php echo $fetch['SHUTTLE_ORAS']?></td>
                                               <td><?php echo $fetch['SHUTTLE_ORAS1']?></td>
                                                 <!--EDIT BUTTON-->

                                                <!--<td class="text-center">
                                                   
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#depedit"><i class="icofont-edit text-success" name="TT_UA_UPDATE_BUTTON">EDIT</i></button>
                                                    </div>
                                                    <a class="btn btn-info btn-sm" href="TamTracker_ARCHIVE_ADMINUSER.php?id=<?php echo $fetch['ADMIN_NUMERO']?>">
                                                        <span>Archive</span>
                                                    </a>
                                                </td>-->
                                                <td class="text-center">
                                                  <a class="btn bg-gradient-info w-105" data-bs-toggle="modal" data-bs-target="#depedit">
                                                      <span>
                                                         <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#depedit"> <i class="icofont-plus-circle me-2 fs-6"></i>EDIT
                                                         </button>
                                                      </span>
                                                  </a>


                                                  <a class="btn btn-info btn-sm">
                                                      <span>
                                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                              <path fill="none" d="M0 0h24v24H0z"></path>
                                                              <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                                                          </svg> 
                                                          ARCHIVE
                                                      </span>
                                                  </a>
                                              </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    </div><!-- Row End -->
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

            <!-- Add Department-->
            <div class="modal fade" id="depadd" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="expaddLabel">New Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <form role="form" class="text-start" method="POST">
                              <div class="input-group input-group-outline my-3">
                                <label class="form-label"></label>
                                 <input type="text" class="form-control" name="TT_CSP_NP_TXTBOX" placeholder="SHUTTLE NAMEPLATE">
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label"></label>
                                  <select class="form-select" name="TT_CSP_STATUS_SELECT">
                                      <option value="" disabled selected>Choose Status</option>
                                      <option value="ACTIVE">ACTIVE</option>
                                      <option value="INACTIVE">INACTIVE</option>
                                  </select>
                              </div>

                              <div class="text-center">
                                <button type="submit"  class="btn btn-primary" name="TT_CSP_CREATE_BUTTON">CREATE</button>
                              </div>
                              <BR>
                              <div class="text-center">
                                <button type="button" class="btn btn-secondary" w-80 my-4 mb-2" name="TT_CSP_BACK_BUTTON" onclick="window.location.href='TamTracker_ShuttlePage.php'">BACK</button>
                              </div>
                            </form>  
                        </div>
                    </div>
                </div>
                </div>
            </div> 

            <!-- Edit Department-->
            <div class="modal fade" id="depedit" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="depeditLabel"> Edit Department </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="deadline-form">
                            <form role="form" class="text-start" method="POST">
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label" ></label>
                                FIRST NAME: &nbsp<input type="text" class="form-control" name="TT_UA_FN_TXTBOX" value="<?php echo $TT_UA_FN_VIEW;?>">
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label" ></label>
                                LAST NAME: &nbsp<input type="text" class="form-control" name="TT_UA_LN_TXTBOX" value="<?php echo $TT_UA_LN_VIEW;?>">
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label" ></label>
                                PASSWORD: &nbsp<input type="text" class="form-control" name="TT_UA_PASSWORD_TXTBOX" id="TT_UA_PW_ID" value="<?php echo $TT_UA_PW_VIEW;?>">
                              </div>
                              <div class="text-center">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" name="TT_UA_UPDATE_BUTTON">UPDATE</button>
                              </div>
                              <div class="text-center">
                                <button type="button" class="btn btn-primary" name="TT_UA_BACK_BUTTON" onclick="window.location.href='TamTracker_AdminUsersPage.php'">BACK</button>
                              </div>

                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div> 
        </div>
                
    </div>
    
    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Plugin Js-->
    <script src="assets/bundles/dataTables.bundle.js"></script>
    <script>
    <!-- Jquery Page Js -->
    <script src="../js/template.js"></script>
    <script>
        // project data table
        $(document).ready(function() {
            $('#myProjectTable')
            .addClass( 'nowrap' )
            .dataTable( {
                responsive: true,
                columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-right' }
                ]
            });
            $('.deleterow').on('click',function(){
            var tablename = $(this).closest('table').DataTable();  
            tablename
                .row( $(this)
                .parents('tr') )
                .remove()
                .draw();

            } );
        });
    </script>
    <script type="text/javascript">
        var $feedModal = $('#depedit');

        // Listen for modal hide and popstate events.
        function startListening() {
            $feedModal.on('hide.bs.modal', onModalHide);
            $(window).on('popstate', onPopState);
        }

        // Stop listening for modal hide and popstate events.
        function stopListening() {
            $feedModal.off('hide.bs.modal', onModalHide);
            $(window).off('popstate', onPopState);
        }

        // Modal opens.
        // Add event listeners and push state.
        function onModalShow() {
            startListening();
            // Change the URL when the modal is opened
            window.history.pushState({}, '', 'http://localhost/TAMTRACKER/TamTracker_AdminUsersPage.php');
        }

        // Modal hides.
        // Remove event listeners and go back.
        function onModalHide() {
            stopListening();
            // Change the URL back when the modal is closed
            window.history.back();
        }

        // Navigation occurs.
        // Remove event listeners and hide modal.
        function onPopState() {
            stopListening();
            $feedModal.modal('hide');
        }

        // Listen for when the modal shows.
        $feedModal.on('show.bs.modal', onModalShow);
    </script>
</body>

<!-- Mirrored from pixelwibes.com/template/ebazar/html/dist/department.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 May 2024 18:27:50 GMT -->
</html>