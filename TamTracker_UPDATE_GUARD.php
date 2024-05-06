<?php
include 'TamTracker_DB.php';

// Set timezone to Philippine Standard Time
date_default_timezone_set('Asia/Manila');

$id = $_GET['id'];

if(isset($_POST['TT_UG_UPDATE_BUTTON']))
 {
    $TT_UG_FN = $_POST['TT_UG_FN_TXTBOX'];
    $TT_UG_LN = $_POST['TT_UG_LN_TXTBOX'];
    $TT_UG_PW = $_POST['TT_UG_PASSWORD_TXTBOX'];

    //TITINGNAN KUNG MAY LAMAN LAHAT NG TEXTBOX. DAPAT MAY LAMAN LAHAT
    if(empty($TT_UG_FN) || empty($TT_UG_LN) || empty($TT_UG_PW)) 
    {
        echo "All fields are required.";
    } 
    else 
    {
            $currentDateTime = date("Y-m-d H:i:s"); // Get current date and time
            $TT_UG_UPDATE = "UPDATE tt_guard_table 
                             SET GUARD_FIRST_NAME = '$TT_UG_FN', GUARD_LAST_NAME = '$TT_UG_LN', GUARD_PASSWORD = '$TT_UG_PW', GUARD_ORAS = '$currentDateTime' 
                             WHERE GUARD_NUMERO = '$id'";
            if (mysqli_query($TT_DB, $TT_UG_UPDATE)) 
            {
                echo "User updated successfully!";
            } 
            else 
            {
                echo "Error updating user: " . mysqli_error($TT_DB);
            }
        
    }
}

//PARA MA DISPLAY YUNG EXISTING RECORD AT MA EDIT
$TT_UG_SELECT = "Select * from tt_guard_table WHERE GUARD_NUMERO = '$id'";
$TT_UG_SELECT_RESULT = mysqli_query($TT_DB, $TT_UG_SELECT);

while($r = mysqli_fetch_assoc($TT_UG_SELECT_RESULT))
{
  $TT_UG_FN_VIEW = $r['GUARD_FIRST_NAME'];//GUARD_FIRST_NAME = name ng table column sa database
  $TT_UG_LN_VIEW = $r['GUARD_LAST_NAME'];//GUARD_LAST_NAME = name ng table column sa database
  $TT_UG_PW_VIEW = $r['GUARD_PASSWORD'];//GUARD_PASSWORD = name ng table column sa database
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
    TamTracker Update Guard
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
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">UPDATE GUARD</h4>
                </div>
              </div>


                  <!--Input type text-->

              <div class="card-body">
                <form role="form" class="text-start" method="POST">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                     FIRST NAME: &nbsp<input type="text" class="form-control" name="TT_UG_FN_TXTBOX" value="<?php echo $TT_UG_FN_VIEW;?>">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                     LAST NAME: &nbsp<input type="text" class="form-control" name="TT_UG_LN_TXTBOX" value="<?php echo $TT_UG_LN_VIEW;?>">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label" ></label>
                    PASSWORD: &nbsp<input type="text" class="form-control" name="TT_UG_PASSWORD_TXTBOX" id="TT_UG_PW_ID" value="<?php echo $TT_UG_PW_VIEW;?>">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-80 my-4 mb-2" name="TT_UG_UPDATE_BUTTON">UPDATE</button>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-80 my-4 mb-2" name="TT_UG_BACK_BUTTON" onclick="window.location.href='TamTracker_GuardPage.php'">BACK</button>
                  </div>
                </form>
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