
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

  <title>TamTracker ADMIN</title>
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">ADMIN</li>
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
                <table class="table align-items-center mb-0" id="TT_ADMINPAGE_TABLE">
                  <thead>
                    <tr>
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"> 

                                              <!--Card Header-->
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3"> 
                                <!--bg - card header--> <!--shadow-->   <!--curve-->   <!--up and down padding-->

                          <h6 class="text-white text-capitalize ps-3">ADMIN ID TABLE</h6>
                        </div>
                      </div>


                      <h6>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NUMERO</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SHUTTLE NUMERO</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">GUARD NUMERO</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ADMIN NUMERO</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">USER NUMERO</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DRIVER NUMERO</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE MODIFIED</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE ACCESSED</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE CREATED</th>
                      </h6>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                      require 'TamTracker_DB.php';
                      
                      $TT_ADMINPAGE_QUERY = mysqli_query($TT_DB, "SELECT * FROM `tt_admin_table`") or die(mysqli_error());
                      while($fetch = mysqli_fetch_array($TT_ADMINPAGE_QUERY))
                      {
                    ?>
                        <tr>
                          <td><?php echo $fetch['NUMERO']?></td>
                          <td><?php echo $fetch['SHUTTLE_NUMERO']?></td>
                          <td><?php echo $fetch['GUARD_NUMERO']?></td>
                          <td><?php echo $fetch['ADMIN_NUMERO']?></td>
                          <td><?php echo $fetch['UT_NUMERO']?></td>
                          <td><?php echo $fetch['DRIVER_NUMERO']?></td>
                          <td><?php echo $fetch['AT_ORAS']?></td>
                          <td><?php echo $fetch['AT_ORAS1']?></td>
                          <td><?php echo $fetch['AT_ORAS2']?></td>

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
      <a class="btn bg-gradient-info w-105" href="TamTracker_ShuttlePage.php">SHUTTLE TABLE</a>
      <a class="btn bg-gradient-info w-105" href="TamTracker_GuardPage.php">GUARD TABLE</a>
      <a class="btn bg-gradient-info w-105" href="TamTracker_AdminUsersPage.php">ADMIN USERS TABLE</a>
      <a class="btn bg-gradient-info w-105" href="TamTracker_UserPage.php">USER TABLE</a>
      <a class="btn bg-gradient-info w-105" href="TamTracker_DriverPage.php">DRIVER TABLE</a>   
    </center>
    <center>
      <a class="btn bg-gradient-info w-105" href="TamTracker_ArchivePage.php">ARCHIVE PAGE</a>
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
    $(document).ready(function() {
        $('#TT_ADMINPAGE_TABLE').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>