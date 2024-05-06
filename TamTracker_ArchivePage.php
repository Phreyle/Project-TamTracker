<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="material-dashboard.css">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

  <!--HTML5-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

  <title>TamTracker Archive</title>
  <link rel="shortcut icon" href="TamTracker_LOGO.png">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
                <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">FEU Cavite</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">ARCHIVE</li>
          </ol>
          <br>
          <b><h6 class="font-weight-bolder mb-0">TAMTracker</h6><b>  <!--Keep the <b>, to make the search bar adaptive-->
        </nav>  
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row"><!--SPACE BETWEEN TABLE AND BUTTON-->
        <div class="col-12">
          <div class="card my-4">
            
            <!--CARDBODY-->
            <!--FOR WIDENING CARD CONTENTS-->

              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="TT_ARCHIVE_TABLE">
                  <thead>
                    <tr>
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"> 

                                              <!--Card Header-->
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3"> 
                                <!--bg - card header--> <!--shadow-->   <!--curve-->   <!--up and down padding-->

                          <h6 class="text-white text-capitalize ps-3">ARCHIVE TABLE</h6>
                        </div>
                      </div>


                      <h6>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NUMERO</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">POSITION</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SHUTTLE ASSIGNED</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EMAIL</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CONTACT NUMBER</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PASSWORD</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FIRST NAME</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LAST NAME</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NAMEPLATE</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STATUS</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BED</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FRONT GATE</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HED</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE MODIFIED</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE ACCESSED</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE CREATED</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE ARCHIVED</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACTION</th>
                      </h6>
                    </tr>
                  </thead>

                  <tbody>
                    
                            <?php
                                      // Define the format_date1 function first
                                      function format_date1($date1, $date2, $date3, $date4, $date5, $date6) 
                                      {
                                          if ($date1 !== '0000-00-00 00:00:00') {
                                              return $date1;
                                          } elseif ($date2 !== '0000-00-00 00:00:00') {
                                              return $date2;
                                          } elseif ($date3 !== '0000-00-00 00:00:00') {
                                              return $date3;
                                          } elseif ($date4 !== '0000-00-00 00:00:00') {
                                              return $date4;
                                          } elseif ($date5 !== '0000-00-00 00:00:00') {
                                              return $date5;
                                          } elseif ($date6 !== '0000-00-00 00:00:00') {
                                              return $date6;
                                          } else {
                                              return 'NONE';
                                          }
                                      }
                                      // Define the format_date2 function first
                                      function format_date2($date1, $date2, $date3, $date4, $date5) 
                                      {
                                          if ($date1 !== '0000-00-00 00:00:00') {
                                              return $date1;
                                          } elseif ($date2 !== '0000-00-00 00:00:00') {
                                              return $date2;
                                          } elseif ($date3 !== '0000-00-00 00:00:00') {
                                              return $date3;
                                          } elseif ($date4 !== '0000-00-00 00:00:00') {
                                              return $date4;
                                          } elseif ($date5 !== '0000-00-00 00:00:00') {
                                              return $date5;
                                          } else {
                                              return 'NONE';
                                          }
                                      }
                                      // Define the format_date3 function first
                                      function format_date3($date1, $date2, $date3, $date4, $date5, $date6) 
                                      {
                                          if ($date1 !== '0000-00-00 00:00:00') {
                                              return $date1;
                                          } elseif ($date2 !== '0000-00-00 00:00:00') {
                                              return $date2;
                                          } elseif ($date3 !== '0000-00-00 00:00:00') {
                                              return $date3;
                                          } elseif ($date4 !== '0000-00-00 00:00:00') {
                                              return $date4;
                                          } elseif ($date5 !== '0000-00-00 00:00:00') {
                                              return $date5;
                                          } elseif ($date6 !== '0000-00-00 00:00:00') {
                                              return $date6;
                                          } else {
                                              return 'NONE';
                                          }
                                      }



                              date_default_timezone_set('Asia/Manila'); // Set the timezone to Philippine Standard Time

                              require 'TamTracker_DB.php';
                              
                              $TT_ARCHIVEPAGE_QUERY = mysqli_query($TT_DB, "SELECT * FROM `tt_archive_table` ORDER BY ORAS ASC") or die(mysqli_error());

                              while($fetch = mysqli_fetch_array($TT_ARCHIVEPAGE_QUERY))
                              {
                            ?>
                                <tr>
                                  <td>
                                      <?php
                                      if ($fetch['ADMIN_NUMERO']) 
                                      {
                                          echo $fetch['ADMIN_NUMERO'];
                                      } 
                                      elseif ($fetch['DRIVER_NUMERO']) 
                                      {
                                          echo $fetch['DRIVER_NUMERO'];
                                      } 
                                      elseif ($fetch['GUARD_NUMERO']) 
                                      {
                                          echo $fetch['GUARD_NUMERO'];
                                      } 
                                      elseif ($fetch['UT_NUMERO']) 
                                      {
                                          echo $fetch['UT_NUMERO'];
                                      } 
                                      elseif ($fetch['SHUTTLE_NUMERO']) 
                                      {
                                          echo $fetch['SHUTTLE_NUMERO'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['DRIVER_POSITION']) 
                                      {
                                          echo $fetch['DRIVER_POSITION'];
                                      } 
                                      elseif ($fetch['UT_POSITION']) 
                                      {
                                          echo $fetch['UT_POSITION'];
                                      } 
                                      elseif ($fetch['ADMIN_POSITION']) 
                                      {
                                          echo $fetch['ADMIN_POSITION'];
                                      } 
                                      elseif ($fetch['GUARD_POSITION']) 
                                      {
                                          echo $fetch['GUARD_POSITION'];
                                      } 
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td><?php echo $fetch['DRIVER_SHUTTLE']?></td>
                                  <td>
                                      <?php
                                      if ($fetch['ADMIN_EMAIL']) 
                                      {
                                          echo $fetch['ADMIN_EMAIL'];
                                      } 
                                      elseif ($fetch['DRIVER_OUTLOOK']) 
                                      {
                                          echo $fetch['DRIVER_OUTLOOK'];
                                      } 
                                      elseif ($fetch['GUARD_OUTLOOK']) 
                                      {
                                          echo $fetch['GUARD_OUTLOOK'];
                                      } 
                                      elseif ($fetch['UT_OUTLOOK']) 
                                      {
                                          echo $fetch['UT_OUTLOOK'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['UT_CONTACT_NUMBER']) 
                                      {
                                          echo $fetch['UT_CONTACT_NUMBER'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['ADMIN_PASSWORD']) 
                                      {
                                          echo $fetch['ADMIN_PASSWORD'];
                                      } 
                                      elseif ($fetch['DRIVER_PASSWORD']) 
                                      {
                                          echo $fetch['DRIVER_PASSWORD'];
                                      } 
                                      elseif ($fetch['GUARD_PASSWORD']) 
                                      {
                                          echo $fetch['GUARD_PASSWORD'];
                                      } 
                                      elseif ($fetch['UT_PASSWORD']) 
                                      {
                                          echo $fetch['UT_PASSWORD'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['DRIVER_FIRST_NAME']) 
                                      {
                                          echo $fetch['DRIVER_FIRST_NAME'];
                                      } 
                                      elseif ($fetch['GUARD_FIRST_NAME']) 
                                      {
                                          echo $fetch['GUARD_FIRST_NAME'];
                                      } 
                                      elseif ($fetch['UT_FIRST_NAME']) 
                                      {
                                          echo $fetch['UT_FIRST_NAME'];
                                      } 
                                      elseif ($fetch['ADMIN_FIRST_NAME']) 
                                      {
                                          echo $fetch['ADMIN_FIRST_NAME'];
                                      } 
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['DRIVER_LAST_NAME']) 
                                      {
                                          echo $fetch['DRIVER_LAST_NAME'];
                                      } 
                                      elseif ($fetch['GUARD_LAST_NAME']) 
                                      {
                                          echo $fetch['GUARD_LAST_NAME'];
                                      } 
                                      elseif ($fetch['UT_LAST_NAME']) 
                                      {
                                          echo $fetch['UT_LAST_NAME'];
                                      }
                                      elseif ($fetch['ADMIN_LAST_NAME']) 
                                      {
                                          echo $fetch['ADMIN_LAST_NAME'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['SHUTTLE_ID']) 
                                      {
                                          echo $fetch['SHUTTLE_ID'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['SHUTTLE_STATUS']) 
                                      {
                                          echo $fetch['SHUTTLE_STATUS'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['BED_PASSENGER']) 
                                      {
                                          echo $fetch['BED_PASSENGER'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['FRONT_GATE_PASSENGER']) 
                                      {
                                          echo $fetch['FRONT_GATE_PASSENGER'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>
                                  <td>
                                      <?php
                                      if ($fetch['HED_PASSENGER']) 
                                      {
                                          echo $fetch['HED_PASSENGER'];
                                      }
                                      else 
                                      {
                                          echo "NONE";
                                      }
                                      ?>
                                  </td>

                                  <!--NOT REFLECTING SA TABLE ANG VALUES-->

                                  
                                  <td>
                                    <?php echo format_date1($fetch['AT_ORAS'], $fetch['DRIVER_ORAS'], $fetch['UT_ORAS'], $fetch['ADMIN_ORAS'], $fetch['GUARD_ORAS'], $fetch['SHUTTLE_ORAS']); ?>
                                  </td>

                                  <td>
                                      <?php echo format_date2($fetch['AT_ORAS1'], $fetch['DRIVER_ORAS1'], $fetch['UT_ORAS1'], $fetch['ADMIN_ORAS1'], $fetch['GUARD_ORAS1']); ?>
                                  </td>
                                  <td>
                                      <?php echo format_date3($fetch['AT_ORAS2'], $fetch['DRIVER_ORAS2'], $fetch['UT_ORAS2'], $fetch['ADMIN_ORAS2'], $fetch['GUARD_ORAS2'], $fetch['SHUTTLE_ORAS1']); ?>
                                  </td>

                                  <!--END-->

                                  <td><?php echo $fetch['ORAS']?></td>

                                  <td>
                                                    <button class="btn bg-gradient-info w-105" name="TT_ARCHIVEPAGE_RESTORE">
                                                      <a href="<?php
                                                                  if (!empty($fetch['ADMIN_NUMERO'])) 
                                                                  {
                                                                      echo 'TamTracker_RESTORE_ADMINUSERS.php?id=' . $fetch['ADMIN_NUMERO'];
                                                                  } 
                                                                  elseif (!empty($fetch['DRIVER_NUMERO'])) 
                                                                  {
                                                                      echo 'TamTracker_RESTORE_DRIVER.php?id=' . $fetch['DRIVER_NUMERO'];
                                                                  } 
                                                                  elseif (!empty($fetch['GUARD_NUMERO'])) 
                                                                  {
                                                                      echo 'TamTracker_RESTORE_GUARD.php?id=' . $fetch['GUARD_NUMERO'];
                                                                  } 
                                                                  elseif (!empty($fetch['UT_NUMERO'])) 
                                                                  {
                                                                      echo 'TamTracker_RESTORE_USER.php?id=' . $fetch['UT_NUMERO'];
                                                                  } 
                                                                  elseif (!empty($fetch['SHUTTLE_NUMERO'])) 
                                                                  {
                                                                      echo 'TamTracker_RESTORE_SHUTTLE.php?id=' . $fetch['SHUTTLE_NUMERO'];
                                                                  }
                                                                ?>">

                                                        <span>
                                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                                            <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                                                          </svg> 
                                                          RESTORE
                                                        </span>
                                                      </a>
                                                    </button>
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
        </div>
      </div>

      <center>
<!--BUTTONS-->   
      <a class="btn bg-gradient-info w-105" href="TamTracker_AdminPage.php">ADMIN PAGE</a>
    </center>

<!--FOOTER-->
      <footer class="footer py-4  ">
     
      </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!--HTML5-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     
  <script>
    $(document).ready(function() 
    {
      $('#TT_ARCHIVE_TABLE').DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],

        // Specify initial sorting by the ORAS column in ascending order
        order: [[14, 'asc']] // Assuming ORAS is the 12th column (index 11)
    });
    });

  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>