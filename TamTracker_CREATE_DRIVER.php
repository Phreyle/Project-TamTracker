<?php
include 'TamTracker_DB.php';

// Set timezone to Philippine Standard Time
date_default_timezone_set('Asia/Manila');

if(isset($_POST['TT_CD_CREATE_BUTTON'])) 
{
    $TT_CD_FN = $_POST['TT_CD_FN_TXTBOX'];
    $TT_CD_LN = $_POST['TT_CD_LN_TXTBOX'];
    $TT_CD_EM = $_POST['TT_CD_EMAIL_TXTBOX'];
    $TT_CD_PW = $_POST['TT_CD_PASSWORD_TXTBOX'];

    //TITINGNAN KUNG MAY LAMAN LAHAT NG TEXTBOX. DAPAT MAY LAMAN LAHAT
    if(empty($TT_CD_FN) || empty($TT_CD_LN) || empty($TT_CD_EM) || empty($TT_CD_PW)) 
    {
        echo "All fields are required.";
    } 
    else 
    {
        //TITINGNAN KUNG EXISTING NA YUNG EMAIL SA DATABASE
        $TT_CA_CHECK_ADMIN = "SELECT * FROM tt_admin_users WHERE ADMIN_EMAIL = '$TT_CD_EM'";
        $TT_CA_CHECK_DRIVER = "SELECT * FROM tt_driver_table WHERE DRIVER_OUTLOOK = '$TT_CD_EM'";
        $TT_CA_CHECK_GUARD = "SELECT * FROM tt_guard_table WHERE GUARD_OUTLOOK = '$TT_CD_EM'";
        $TT_CA_CHECK_USER = "SELECT * FROM tt_user_table WHERE UT_OUTLOOK = '$TT_CD_EM'";
        
        $TT_CA_RESULT_ADMIN = mysqli_query($TT_DB, $TT_CA_CHECK_ADMIN);
        $TT_CA_RESULT_DRIVER = mysqli_query($TT_DB, $TT_CA_CHECK_DRIVER);
        $TT_CA_RESULT_GUARD = mysqli_query($TT_DB, $TT_CA_CHECK_GUARD);
        $TT_CA_RESULT_USER = mysqli_query($TT_DB, $TT_CA_CHECK_USER);

        if(mysqli_num_rows($TT_CA_RESULT_ADMIN) > 0 || mysqli_num_rows($TT_CA_RESULT_DRIVER) > 0 || mysqli_num_rows($TT_CA_RESULT_GUARD) > 0 || mysqli_num_rows($TT_CA_RESULT_USER) > 0) 
        {
            echo "Email already exists.";
        }
        else 
        {
            //KUNG HINDI EXISTING YUNG EMAIL AT YUNG MGA TEXTBOX AY HINDI EMPTY, GAGAWA NG BAGONG DATA
            $currentDateTime = date("Y-m-d H:i:s"); // Get current date and time
            $TT_CD_INSERT = "INSERT INTO tt_driver_table (DRIVER_OUTLOOK, DRIVER_FIRST_NAME, DRIVER_LAST_NAME, DRIVER_PASSWORD, DRIVER_ORAS, DRIVER_POSITION, DRIVER_ORAS1, DRIVER_ORAS2, DRIVER_SHUTTLE) VALUES ('$TT_CD_EM', '$TT_CD_FN', '$TT_CD_LN', '$TT_CD_PW', '','DRIVER', '', '$currentDateTime', '')";

            /*
              DRIVER_ORAS = DATE MODIFIED
              DRIVER_ORAS1 = DATE ACCESSED
              DRIVER_ORAS2 = DATE CREATED
            */
            
            if (mysqli_query($TT_DB, $TT_CD_INSERT)) 
            {
                echo "SUCCESS!";
            } 
            else 
            {
                echo "Error: " . $TT_CD_INSERT . "<br>" . mysqli_error($TT_DB);
            }
        }
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
    TamTracker Create Driver
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
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">CREATE DRIVER</h4>
                </div>
              </div>


                  <!--Input type text-->

              <div class="card-body">
                <form role="form" class="text-start" method="POST">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                     <input type="text" class="form-control" name="TT_CD_FN_TXTBOX" placeholder="FIRST NAME">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                     <input type="text" class="form-control" name="TT_CD_LN_TXTBOX" placeholder="LAST NAME">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                     <input type="email" class="form-control" name="TT_CD_EMAIL_TXTBOX" placeholder="EMAIL">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label" ></label>
                    <input type="password" class="form-control" name="TT_CD_PASSWORD_TXTBOX" id="TT_CD_PW_ID" placeholder="PASSWORD">
                  </div>
                  <div>
                    <input type="checkbox" id="TT_CD_SPW_CHECKBOX" />
                    <label for="showPassword">Show password</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-80 my-4 mb-2" name="TT_CD_CREATE_BUTTON">CREATE</button>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-80 my-4 mb-2" name="TT_CD_BACK_BUTTON" onclick="window.location.href='TamTracker_DriverPage.php'">BACK</button>
                  </div>
                </form>
                <script type="text/javascript">
                        document.getElementById('TT_CD_SPW_CHECKBOX').onclick = function()
                        {
                            if ( this.checked )
                             {
                                document.getElementById('TT_CD_PW_ID').type = "text";
                             } 
                            else 
                            {
                                document.getElementById('TT_CD_PW_ID').type = "password";
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