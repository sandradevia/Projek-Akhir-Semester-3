<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistem Kasir</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="admin/template/style1.css" rel="stylesheet">

        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/datatables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="assets/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>
    <style>
		.header{background: #E6F2FF; color:#1E1F6F;}
		#main-content{ background:#CBE3FF;}
		#hidden {display:none}
        /* Style for the user menu dropdown */
.dropdown.user-menu:hover .dropdown-menu {
    display: block;
}

.dropdown.user-menu .dropdown-toggle {
    cursor: pointer;
}

.dropdown.user-menu .user-header {
    background-color: #3C91E6;
    color: #fff;
    padding: 10px;
    text-align: center;
}

.dropdown.user-menu .user-header svg {
    width: 50px;
    height: 50px;
}

/* Style for the dropdown menu position */
.dropdown.user-menu .dropdown-menu {
    right: -10px; /* Menggeser menu dropdown ke kiri sejauh 10px */
    left: auto;
}


.dropdown.user-menu .user-footer {
    background-color: #3C91E6;
    padding: 10px;
    text-align: center;
}


/* Style for the logout button */
.dropdown.user-menu .user-footer .btn {
    background-color: #d9534f;
    color: #fff;
    border: none;
    justify-content: center;
}

.dropdown.user-menu .user-footer .btn:hover {
    background-color: #c9302c;
}

.logo {
    margin-left: 10px; /* Sesuaikan nilai ini sesuai dengan kebutuhan Anda */
}

	</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                  <img src="admin/template/img/logoo.png" alt="Logo" class="left-aligned-image" style="width: 50px; height: auto;">
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>KASIRKU</b> <small class="center" style="padding-left:10px;font-size:13px;color:#1E1F6F;"></small></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                   
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                                    <span class="bi-person-circle">Admin</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                    </svg>
                                    <p>Admin</p>
                                    </li>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
      <!--header end-->
            	</ul>
            </div>
      </header>
  </section>
  </body>
</html>
