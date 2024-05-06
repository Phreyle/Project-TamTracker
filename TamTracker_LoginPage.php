<?php

date_default_timezone_set('Asia/Manila'); // Set the timezone to Philippine Standard Time

include 'TamTracker_DB.php';

if (isset($_POST['TT_LOGIN_BUTTON'])) 
{
    $TT_LOGIN_EMAIL = $_POST['TT_LOGIN_EMAIL_TXTBOX'];
    $TT_LOGIN_PASSWORD = $_POST['TT_LOGIN_PASSWORD_TXTBOX'];

    // Check in tt_admin_users table
    $TT_SQL_ADMINUSER_LOGIN = "SELECT * FROM tt_admin_users WHERE ADMIN_EMAIL = '$TT_LOGIN_EMAIL' AND ADMIN_PASSWORD = '$TT_LOGIN_PASSWORD'";
    $TT_SQL_ADMINUSER_LOGIN_RUN = mysqli_query($TT_DB, $TT_SQL_ADMINUSER_LOGIN);

    // Check in tt_driver_table
    $TT_SQL_DRIVER_LOGIN = "SELECT * FROM tt_driver_table WHERE DRIVER_OUTLOOK = '$TT_LOGIN_EMAIL' AND DRIVER_PASSWORD = '$TT_LOGIN_PASSWORD'";
    $TT_SQL_DRIVER_LOGIN_RUN = mysqli_query($TT_DB, $TT_SQL_DRIVER_LOGIN);

    // Check in tt_guard_table
    $TT_SQL_GUARD_LOGIN = "SELECT * FROM tt_guard_table WHERE GUARD_OUTLOOK = '$TT_LOGIN_EMAIL' AND GUARD_PASSWORD = '$TT_LOGIN_PASSWORD'";
    $TT_SQL_GUARD_LOGIN_RUN = mysqli_query($TT_DB, $TT_SQL_GUARD_LOGIN);

    // Check in tt_user_table
    $TT_SQL_USER_LOGIN = "SELECT * FROM tt_user_table WHERE UT_OUTLOOK = '$TT_LOGIN_EMAIL' AND UT_PASSWORD = '$TT_LOGIN_PASSWORD'";
    $TT_SQL_USER_LOGIN_RUN = mysqli_query($TT_DB, $TT_SQL_USER_LOGIN);

    if (mysqli_num_rows($TT_SQL_ADMINUSER_LOGIN_RUN) == 1) 
    {
        $TT_LOGIN_TIME = date('Y-m-d H:i:s'); // Current login time in PST
        $TT_LOGIN_TIME_UPDATE = "UPDATE tt_admin_users SET ADMIN_ORAS1 = '$TT_LOGIN_TIME' WHERE ADMIN_EMAIL = '$TT_LOGIN_EMAIL'";
        mysqli_query($TT_DB, $TT_LOGIN_TIME_UPDATE);

        $TT_ROW = mysqli_fetch_assoc($TT_SQL_ADMINUSER_LOGIN_RUN);
        $TT_NUMERO = $TT_ROW['ADMIN_NUMERO'];
        $TT_ADMIN_ORAS = $TT_ROW['ADMIN_ORAS'];
        $TT_ADMIN_ORAS2 = $TT_ROW['ADMIN_ORAS2'];

        $TT_ADMIN_TABLE_INSERT = "INSERT INTO tt_admin_table (SHUTTLE_NUMERO, GUARD_NUMERO, ADMIN_NUMERO, UT_NUMERO, DRIVER_NUMERO, AT_ORAS, AT_ORAS1, AT_ORAS2) VALUES ('', '', '$TT_NUMERO', '', '', '$TT_ADMIN_ORAS', '$TT_LOGIN_TIME', '$TT_ADMIN_ORAS2')";

        mysqli_query($TT_DB, $TT_ADMIN_TABLE_INSERT);

        echo "WELCOME ADMIN!";
        echo "<form action='TamTracker_LANDING_ADMIN.php'><input type='submit' name='PROCEED' value='PROCEED'></form>";
    } 
    elseif (mysqli_num_rows($TT_SQL_DRIVER_LOGIN_RUN) == 1)
    {
        $TT_LOGIN_TIME = date('Y-m-d H:i:s'); // Current login time in PST
        $TT_LOGIN_TIME_UPDATE = "UPDATE tt_driver_table SET DRIVER_ORAS1 = '$TT_LOGIN_TIME' WHERE DRIVER_OUTLOOK = '$TT_LOGIN_EMAIL'";
        mysqli_query($TT_DB, $TT_LOGIN_TIME_UPDATE);

        $TT_ROW = mysqli_fetch_assoc($TT_SQL_DRIVER_LOGIN_RUN);
        $TT_NUMERO = $TT_ROW['DRIVER_NUMERO'];
        $TT_DRIVER_ORAS = $TT_ROW['DRIVER_ORAS'];
        $TT_DRIVER_ORAS2 = $TT_ROW['DRIVER_ORAS2'];

        $TT_ADMIN_TABLE_INSERT = "INSERT INTO tt_admin_table (SHUTTLE_NUMERO, GUARD_NUMERO, ADMIN_NUMERO, UT_NUMERO, DRIVER_NUMERO, AT_ORAS, AT_ORAS1, AT_ORAS2) VALUES ('', '', '', '', '$TT_NUMERO', '$TT_DRIVER_ORAS', '$TT_LOGIN_TIME', '$TT_DRIVER_ORAS2')";

        mysqli_query($TT_DB, $TT_ADMIN_TABLE_INSERT);

        echo "WELCOME DRIVER!";
        echo "<form action='TamTracker_LANDING_DRIVER.php'><input type='submit' name='PROCEED' value='PROCEED'></form>";
    } 
    elseif (mysqli_num_rows($TT_SQL_GUARD_LOGIN_RUN) == 1) 
    {
        $TT_LOGIN_TIME = date('Y-m-d H:i:s'); // Current login time in PST
        $TT_LOGIN_TIME_UPDATE = "UPDATE tt_guard_table SET GUARD_ORAS1 = '$TT_LOGIN_TIME' WHERE GUARD_OUTLOOK = '$TT_LOGIN_EMAIL'";
        mysqli_query($TT_DB, $TT_LOGIN_TIME_UPDATE);

        $TT_ROW = mysqli_fetch_assoc($TT_SQL_GUARD_LOGIN_RUN);
        $TT_NUMERO = $TT_ROW['GUARD_NUMERO'];
        $TT_GUARD_ORAS = $TT_ROW['GUARD_ORAS'];
        $TT_GUARD_ORAS2 = $TT_ROW['GUARD_ORAS2'];

        $TT_ADMIN_TABLE_INSERT = "INSERT INTO tt_admin_table (SHUTTLE_NUMERO, GUARD_NUMERO, ADMIN_NUMERO, UT_NUMERO, DRIVER_NUMERO, AT_ORAS, AT_ORAS1, AT_ORAS2) VALUES ('', '$TT_NUMERO', '', '', '', '$TT_GUARD_ORAS', '$TT_LOGIN_TIME', '$TT_GUARD_ORAS2')";

        mysqli_query($TT_DB, $TT_ADMIN_TABLE_INSERT);

        echo "WELCOME GUARD!";
        echo "<form action='TamTracker_LANDING_GUARD.php'><input type='submit' name='PROCEED' value='PROCEED'></form>";
    } 
    elseif (mysqli_num_rows($TT_SQL_USER_LOGIN_RUN) == 1) 
    {
        $TT_LOGIN_TIME = date('Y-m-d H:i:s'); // Current login time in PST
        $TT_LOGIN_TIME_UPDATE = "UPDATE tt_user_table SET UT_ORAS1 = '$TT_LOGIN_TIME' WHERE UT_OUTLOOK = '$TT_LOGIN_EMAIL'";
        mysqli_query($TT_DB, $TT_LOGIN_TIME_UPDATE);

        $TT_ROW = mysqli_fetch_assoc($TT_SQL_USER_LOGIN_RUN);
        $TT_NUMERO = $TT_ROW['UT_NUMERO'];
        $TT_UT_ORAS = $TT_ROW['UT_ORAS'];
        $TT_UT_ORAS2 = $TT_ROW['UT_ORAS2'];

        $TT_ADMIN_TABLE_INSERT = "INSERT INTO tt_admin_table (SHUTTLE_NUMERO, GUARD_NUMERO, ADMIN_NUMERO, UT_NUMERO, DRIVER_NUMERO, AT_ORAS, AT_ORAS1, AT_ORAS2) VALUES ('', '', '', '$TT_NUMERO', '', '$TT_UT_ORAS', '$TT_LOGIN_TIME', '$TT_UT_ORAS2')";

        mysqli_query($TT_DB, $TT_ADMIN_TABLE_INSERT);

        echo "WELCOME MEMBER!";
        echo "<form action='TamTracker_LANDING_USER.php'><input type='submit' name='PROCEED' value='PROCEED'></form>";
    } 
    else 
    {
        echo "INCORRECT CREDENTIALS";
        echo "<form action='TamTracker_LoginPage.php'><input type='submit' value='OK'></form>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="material-dashboard.css">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    TamTracker Login
  </title>
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

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row"> 
      <div class="col-12">
        <!-- Navbar -->
        
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('shuttle 4.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">

        <div class="row">

                                <!--White background-->
          <div class="col-lg-4 col-md-8 col-12 mx-auto"> 
            <div class="card z-index-0 fadeIn3 fadeInBottom"> 


                                <!--Card Header-->

              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Log in</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>


                  <!--Input type text-->

              <div class="card-body">
                <form role="form" class="text-start" method="POST">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                     <input type="email" class="form-control" name="TT_LOGIN_EMAIL_TXTBOX" placeholder="EMAIL">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label" ></label>
                    <input type="password" class="form-control" name="TT_LOGIN_PASSWORD_TXTBOX" id="TT_PW_ID" placeholder="PASSWORD">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div>
                    <input type="checkbox" id="TT_SPW_CHECKBOX" />
                    <label for="showPassword">Show password</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-80 my-4 mb-2" name="TT_LOGIN_BUTTON">Log in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
                <script type="text/javascript">
                        document.getElementById('TT_SPW_CHECKBOX').onclick = function()
                        {
                            if ( this.checked )
                             {
                                document.getElementById('TT_PW_ID').type = "text";
                             } 
                            else 
                            {
                                document.getElementById('TT_PW_ID').type = "password";
                            }
                        };
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
                    
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
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>