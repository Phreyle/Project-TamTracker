<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.bootstrapdash.com/majestic-admin-pro/themes/vertical-default-dark/pages/tables/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2024 02:21:48 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin Pro</title>

  <!--HTML 5 -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../assets/css/vertical-layout-dark/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="https://demo.bootstrapdash.com/majestic-admin-pro/themes/assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
      <a class="navbar-brand brand-logo" href="../../index.html"><img src="https://demo.bootstrapdash.com/majestic-admin-pro/themes/assets/images/logo-white.svg"
          alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="https://demo.bootstrapdash.com/majestic-admin-pro/themes/assets/images/logo-mini.svg"
          alt="logo" /></a>
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
          <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../../../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
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
            <div class="preview-thumbnail">
              <img src="../../../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
            </div>
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
              <img src="../../../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
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
          <span class="count"></span>
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
          <img src="../../../assets/images/faces/face5.jpg" alt="profile" />
          <span class="nav-profile-name">Louis Barnett</span>
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
      <!-- partial:../../partials/_settings-panel.html -->
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
        <img src="../../../assets/images/demo/vertical-default.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-default-dark/index.html"
        class="demo-thumb-image">
        <img src="../../../assets/images/demo/vertical-dark.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/horizontal-default-light/index.html"
        class="demo-thumb-image" id="theme-dark-switch">
        <img src="../../../assets/images/demo/horizontal-menu-light.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/horizontal-default-dark/index.html"
        class="demo-thumb-image">
        <img src="../../../assets/images/demo/horizontal-menu-dark.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-dark-sidebar/index.html"
        class="demo-thumb-image">
        <img src="../../../assets/images/demo/dark-sidebar.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-boxed/index.html"
        class="demo-thumb-image">
        <img src="../../../assets/images/demo/boxed-layout.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-icon-menu/index.html"
        class="demo-thumb-image">
        <img src="../../../assets/images/demo/icon-menu.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-compact/index.html"
        class="demo-thumb-image">
        <img src="../../../assets/images/demo/compact-menu.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-fixed/index.html"
        class="demo-thumb-image">
        <img src="../../../assets/images/demo/fixed-menu.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-hidden-toggle/index.html"
        class="demo-thumb-image">
        <img src="../../../assets/images/demo/toggle-menu.png" alt="demo image">
      </a>
      <a href="https://www.bootstrapdash.com/demo/majestic-admin-pro/template/demo/vertical-toggle-overlay/index.html"
        class="demo-thumb-image">
        <img src="../../../assets/images/demo/toggle-overlay-menu.png" alt="demo image">
      </a>
    </div>
  </div> -->
</div>
<div id="right-sidebar" class="settings-panel">
  <i class="settings-close mdi mdi-close"></i>
  <ul class="nav nav-tabs" id="setting-panel" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab"
        aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab"
        aria-controls="chats-section">CHATS</a>
    </li>
  </ul>
  <div class="tab-content" id="setting-content">
    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
      aria-labelledby="todo-section">
      <div class="add-items d-flex px-3 mb-0">
        <form class="form w-100">
          <div class="form-group d-flex">
            <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
            <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
          </div>
        </form>
      </div>
      <div class="list-wrapper px-3">
        <ul class="d-flex flex-column-reverse todo-list">
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Team review meeting at 3.00 PM
              </label>
            </div>
            <i class="remove mdi mdi-close-circle-outline"></i>
          </li>
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Prepare for presentation
              </label>
            </div>
            <i class="remove mdi mdi-close-circle-outline"></i>
          </li>
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Resolve all the low priority tickets due today
              </label>
            </div>
            <i class="remove mdi mdi-close-circle-outline"></i>
          </li>
          <li class="completed">
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox" checked>
                Schedule meeting for next week
              </label>
            </div>
            <i class="remove mdi mdi-close-circle-outline"></i>
          </li>
          <li class="completed">
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox" checked>
                Project review
              </label>
            </div>
            <i class="remove mdi mdi-close-circle-outline"></i>
          </li>
        </ul>
      </div>
      <div class="events py-4 border-bottom px-3">
        <div class="wrapper d-flex mb-2">
          <i class="mdi mdi-circle-outline text-primary me-2"></i>
          <span>Feb 11 2018</span>
        </div>
        <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
        <p class="text-gray mb-0">build a js based app</p>
      </div>
      <div class="events pt-4 px-3">
        <div class="wrapper d-flex mb-2">
          <i class="mdi mdi-circle-outline text-primary me-2"></i>
          <span>Feb 7 2018</span>
        </div>
        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
        <p class="text-gray mb-0 ">Call Sarah Graves</p>
      </div>
    </div>
    <!-- To do section tab ends -->
    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
      <div class="d-flex align-items-center justify-content-between border-bottom">
        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
          All</small>
      </div>
      <ul class="chat-list">
        <li class="list active">
          <div class="profile"><img src="../../../assets/images/faces/face1.jpg" alt="image"><span
              class="online"></span></div>
          <div class="info">
            <p>Thomas Douglas</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">19 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="../../../assets/images/faces/face2.jpg" alt="image"><span
              class="offline"></span></div>
          <div class="info">
            <div class="wrapper d-flex">
              <p>Catherine</p>
            </div>
            <p>Away</p>
          </div>
          <div class="badge badge-success badge-pill my-auto mx-2">4</div>
          <small class="text-muted my-auto">23 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="../../../assets/images/faces/face3.jpg" alt="image"><span
              class="online"></span></div>
          <div class="info">
            <p>Daniel Russell</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">14 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="../../../assets/images/faces/face4.jpg" alt="image"><span
              class="offline"></span></div>
          <div class="info">
            <p>James Richardson</p>
            <p>Away</p>
          </div>
          <small class="text-muted my-auto">2 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="../../../assets/images/faces/face5.jpg" alt="image"><span
              class="online"></span></div>
          <div class="info">
            <p>Madeline Kennedy</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">5 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="../../../assets/images/faces/face6.jpg" alt="image"><span
              class="online"></span></div>
          <div class="info">
            <p>Sarah Graves</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">47 min</small>
        </li>
      </ul>
    </div>
    <!-- chat tab ends -->
  </div>
</div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="../../index.html">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../widgets/widgets.html">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Widgets</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../ui-features/accordions.html">Accordions</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/badges.html">Badges</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/breadcrumbs.html">Breadcrumbs</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/modals.html">Modals</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/progress.html">Progress bar</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/pagination.html">Pagination</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/tabs.html">Tabs</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/typography.html">Typography</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/tooltips.html">Tooltips</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-advanced" aria-expanded="false"
        aria-controls="ui-advanced">
        <i class="mdi mdi-layers menu-icon"></i>
        <span class="menu-title">Advanced UI</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-advanced">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../ui-features/dragula.html">Dragula</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/clipboard.html">Clipboard</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/context-menu.html">Context menu</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/slider.html">Sliders</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/carousel.html">Carousel</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/colcade.html">Colcade</a></li>
          <li class="nav-item"> <a class="nav-link" href="../ui-features/loaders.html">Loaders</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
        aria-controls="form-elements">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Form elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="../forms/basic_elements.html">Basic Elements</a></li>
          <li class="nav-item"><a class="nav-link" href="../forms/advanced_elements.html">Advanced Elements</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="../forms/validation.html">Validation</a></li>
          <li class="nav-item"><a class="nav-link" href="../forms/wizard.html">Wizard</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
        <i class="mdi mdi-pencil-box-outline menu-icon"></i>
        <span class="menu-title">Editors</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="editors">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="../forms/text_editor.html">Text editors</a></li>
          <li class="nav-item"><a class="nav-link" href="../forms/code_editor.html">Code editors</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="mdi mdi-chart-pie menu-icon"></i>
        <span class="menu-title">Charts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../charts/chartjs.html">ChartJs</a></li>
          <li class="nav-item"> <a class="nav-link" href="../charts/morris.html">Morris</a></li>
          <li class="nav-item"> <a class="nav-link" href="../charts/flot-chart.html">Flot</a></li>
          <li class="nav-item"> <a class="nav-link" href="../charts/google-charts.html">Google charts</a></li>
          <li class="nav-item"> <a class="nav-link" href="../charts/sparkline.html">Sparkline js</a></li>
          <li class="nav-item"> <a class="nav-link" href="../charts/c3.html">C3 charts</a></li>
          <li class="nav-item"> <a class="nav-link" href="../charts/chartist.html">Chartists</a></li>
          <li class="nav-item"> <a class="nav-link" href="../charts/justGage.html">JustGage</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Tables</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="basic-table.html">Basic table</a></li>
          <li class="nav-item"> <a class="nav-link" href="data-table.html">Data table</a></li>
          <li class="nav-item"> <a class="nav-link" href="js-grid.html">Js-grid</a></li>
          <li class="nav-item"> <a class="nav-link" href="sortable-table.html">Sortable table</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../ui-features/popups.html">
        <i class="mdi mdi-comment-alert menu-icon"></i>
        <span class="menu-title">Popups</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../ui-features/notifications.html">
        <i class="mdi mdi-bell menu-icon"></i>
        <span class="menu-title">Notifications</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="mdi mdi-emoticon menu-icon"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../icons/flag-icons.html">Flag icons</a></li>
          <li class="nav-item"> <a class="nav-link" href="../icons/mdi.html">Mdi icons</a></li>
          <li class="nav-item"> <a class="nav-link" href="../icons/font-awesome.html">Font Awesome</a></li>
          <li class="nav-item"> <a class="nav-link" href="../icons/simple-line-icon.html">Simple line icons</a>
          </li>
          <li class="nav-item"> <a class="nav-link" href="../icons/themify.html">Themify icons</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
        <i class="mdi mdi-map menu-icon"></i>
        <span class="menu-title">Maps</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="maps">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../maps/mapael.html">Mapael</a></li>
          <li class="nav-item"> <a class="nav-link" href="../maps/vector-map.html">Vector Map</a></li>
          <li class="nav-item"> <a class="nav-link" href="../maps/google-maps.html">Google Map</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/login-2.html"> Login 2 </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/register.html"> Register </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/register-2.html"> Register 2 </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/lock-screen.html"> Lockscreen </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="mdi mdi-alert-circle menu-icon"></i>
        <span class="menu-title">Error pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/error-500.html"> 500 </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
        aria-controls="general-pages">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">General Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../samples/blank-page.html"> Blank Page </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/profile.html"> Profile </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/faq.html"> FAQ </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/faq-2.html"> FAQ 2 </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/news-grid.html"> News grid </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/timeline.html"> Timeline </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/search-results.html"> Search Results </a>
          </li>
          <li class="nav-item"> <a class="nav-link" href="../samples/portfolio.html"> Portfolio </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
        <i class="mdi mdi-basket menu-icon"></i>
        <span class="menu-title">E-commerce</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="e-commerce">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="../samples/invoice.html"> Invoice </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/pricing-table.html"> Pricing Table </a></li>
          <li class="nav-item"> <a class="nav-link" href="../samples/orders.html"> Orders </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../apps/email.html">
        <i class="mdi mdi-email menu-icon"></i>
        <span class="menu-title">E-mail</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../apps/calendar.html">
        <i class="mdi mdi-calendar-range menu-icon"></i>
        <span class="menu-title">Calendar</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../apps/todo.html">
        <i class="mdi mdi-playlist-check menu-icon"></i>
        <span class="menu-title">Todo List</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../apps/gallery.html">
        <i class="mdi mdi-image menu-icon"></i>
        <span class="menu-title">Gallery</span>
      </a>
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ADMIN USER TABLE</h4>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover" id="TT_ADMINPAGE_TABLE">
                      <thead>
                        <tr>
                            <h6>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NUMERO</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">POSITION</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EMAIL</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PASSWORD</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FIRST NAME</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LAST NAME</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE MODIFIED</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE ACCESSED</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DATE CREATED</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACTION</th>
                              <th class="text-secondary opacity-7"></th>
                            </h6>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            require 'TamTracker_DB.php';
                            
                            $TT_ADMINUSERPAGE_QUERY = mysqli_query($TT_DB, "SELECT * FROM `tt_admin_users`") or die(mysqli_error());
                            while($fetch = mysqli_fetch_array($TT_ADMINUSERPAGE_QUERY))
                            {
                        ?>
                              <tr>
                                <td><?php echo $fetch['ADMIN_NUMERO']?></td>
                                <td><?php echo $fetch['ADMIN_POSITION']?></td>
                                <td><?php echo $fetch['ADMIN_EMAIL']?></td>
                                <td><?php echo $fetch['ADMIN_PASSWORD']?></td>
                                <td><?php echo $fetch['ADMIN_FIRST_NAME']?></td>
                                <td><?php echo $fetch['ADMIN_LAST_NAME']?></td>
                                <td><?php echo $fetch['ADMIN_ORAS']?></td>
                                <td><?php echo $fetch['ADMIN_ORAS1']?></td>
                                <td><?php echo $fetch['ADMIN_ORAS2']?></td>

                               <td>
                                    <a class="btn bg-gradient-info w-105" href="TamTracker_UPDATE_ADMINUSERS.php?id=<?php echo $fetch['ADMIN_NUMERO']?>">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                <path fill="none" d="M0 0h24v24H0z"></path>
                                                <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                                            </svg> 
                                            EDIT
                                        </span>
                                    </a>

                                    <a class="btn bg-gradient-info w-105" href="TamTracker_ARCHIVE_ADMINUSER.php?id=<?php echo $fetch['ADMIN_NUMERO']?>">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="24">
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
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ADMIN ID TABLE</h4>
                  <div class="table-responsive">
                    <table class="table table-striped" id="TT_ADMINPAGE_TABLE" bgcolor="white">
                      <thead>
                        <tr>
                            <h6>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">NUMERO</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">SHUTTLE NUMERO</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">GUARD NUMERO</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">ADMIN NUMERO</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">USER NUMERO</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">DRIVER NUMERO</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">DATE MODIFIED</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">DATE ACCESSED</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">DATE CREATED</th>
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            3
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td>
                            Apr 12, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            4
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            5
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 160.25
                          </td>
                          <td>
                            May 03, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            6
                          </td>
                          <td>
                            John Doe
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 123.21
                          </td>
                          <td>
                            April 05, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            7
                          </td>
                          <td>
                            Henry Tom
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 150.00
                          </td>
                          <td>
                            June 16, 2015
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Inverse table</h4>
                  <p class="card-description">
                    Add class <code>.table-dark</code>
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            3
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td>
                            Apr 12, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            4
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            5
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            $ 160.25
                          </td>
                          <td>
                            May 03, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            6
                          </td>
                          <td>
                            John Doe
                          </td>
                          <td>
                            $ 123.21
                          </td>
                          <td>
                            April 05, 2015
                          </td>
                        </tr>
                        <tr>
                          <td>
                            7
                          </td>
                          <td>
                            Henry Tom
                          </td>
                          <td>
                            $ 150.00
                          </td>
                          <td>
                            June 16, 2015
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table with contextual classes</h4>
                  <p class="card-description">
                    Add class <code>.table-{color}</code>
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered" >
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Product
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="table-info">
                          <td>
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            Photoshop
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr class="table-warning">
                          <td>
                            2
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            Flash
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
                        <tr class="table-danger">
                          <td>
                            3
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            Premeire
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td>
                            Apr 12, 2015
                          </td>
                        </tr>
                        <tr class="table-success">
                          <td>
                            4
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            After effects
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr class="table-primary">
                          <td>
                            5
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            Illustrator
                          </td>
                          <td>
                            $ 160.25
                          </td>
                          <td>
                            May 03, 2015
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
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
  <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../../assets/js/off-canvas.js"></script>
  <script src="../../../assets/js/hoverable-collapse.js"></script>
  <script src="../../../assets/js/template.js"></script>
  <script src="../../../assets/js/settings.js"></script>
  <script src="../../../assets/js/todolist.js"></script>

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
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from demo.bootstrapdash.com/majestic-admin-pro/themes/vertical-default-dark/pages/tables/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2024 02:21:48 GMT -->
</html>
