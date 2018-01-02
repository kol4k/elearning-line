
<html>
        <head>
                <meta charset="utf-8" />
                <title>CMS API eLearning - @yield('title')</title>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta content="width=device-width, initial-scale=1" name="viewport" />
                <meta content="Content Management System API eLearning" name="description" />
                <meta content="Rafi" name="author" />
                <link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
                <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
                <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
                <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
                <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
                <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
                @yield('css')
                <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
                <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
                <link href="assets/layouts/layout6/css/layout.min.css" rel="stylesheet" type="text/css" />
                <link href="assets/layouts/layout6/css/custom.min.css" rel="stylesheet" type="text/css" />
                <link rel="shortcut icon" href="favicon.ico" /> 
            </head>
        
            <body class="">
                <header class="page-header">
                    <nav class="navbar" role="navigation">
                        <div class="container-fluid">
                            <div class="havbar-header">
                                <a id="index" class="navbar-brand" href="start.html">
                                    <img src="assets/layouts/layout6/img/logo.png" alt="Logo"> </a>
                                <div class="topbar-actions">
                                    <form class="search-form" action="http://keenthemes.com/preview/metronic/theme/admin_6/extra_search.html" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search here" name="query">
                                            <span class="input-group-btn">
                                                <a href="javascript:;" class="btn md-skip submit">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </form>
                                    <div class="btn-group-img btn-group">
                                        <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            <img src="assets/layouts/layout5/img/avatar1.jpg" alt=""> </button>
                                        <ul class="dropdown-menu-v2" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="icon-user"></i> My Profile
                                                    <span class="badge badge-danger">1</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-calendar"></i> My Calendar </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-envelope-open"></i> My Inbox
                                                    <span class="badge badge-danger"> 3 </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-rocket"></i> My Tasks
                                                    <span class="badge badge-success"> 7 </span>
                                                </a>
                                            </li>
                                            <li class="divider"> </li>
                                            <li>
                                                <a href="page_user_lock_1.html">
                                                    <i class="icon-lock"></i> Lock Screen </a>
                                            </li>
                                            <li>
                                                <a href="logout.php">
                                                    <i class="icon-key"></i> Log Out </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>
                <div class="container-fluid">
                    <div class="page-content page-content-popup">
                        <div class="page-content-fixed-header">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="/">Dashboard</a>
                                </li>
                                <li>@yield('title')</li>
                            </ul>
                            <div class="content-header-menu">
                                <div class="dropdown-ajax-menu btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-circle"></i>
                                        <i class="fa fa-circle"></i>
                                        <i class="fa fa-circle"></i>
                                    </button>
                                    <ul class="dropdown-menu-v2">
                                        <li>
                                            <a href="start.html">Application</a>
                                        </li>
                                        <li>
                                            <a href="start.html">Reports</a>
                                        </li>
                                        <li>
                                            <a href="start.html">Templates</a>
                                        </li>
                                        <li>
                                            <a href="start.html">Settings</a>
                                        </li>
                                    </ul>
                                </div>
                                <button type="button" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="toggle-icon">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="page-sidebar-wrapper">
                            <div class="page-sidebar navbar-collapse collapse">
                                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                                    <li class="nav-item start ">
                                        <a href="index.html" class="nav-link nav-toggle">
                                            <i class="icon-home"></i>
                                            <span class="title">Dashboard</span>
                                            <span class="arrow"></span>
                                        </a>
                                    </li>
                                    <li class="heading">
                                        <h3 class="uppercase">Management</h3>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ Route('users.index') }}" class="nav-link nav-toggle">
                                            <i class="icon-users"></i>
                                            <span class="title">Users</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ Route('exam.index') }}" class="nav-link nav-toggle">
                                            <i class="icon-briefcase"></i>
                                            <span class="title">Exam</span>
                                        </a>
                                    </li>
                                    <li class="heading">
                                        <h3 class="uppercase">Reports</h3>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-layers"></i>
                                            <span class="title">Completed Task</span>
                                            <span class="arrow"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="page-fixed-main-content">
                            <!-- BEGIN PAGE BASE CONTENT -->
                            @yield('content')
                            <!-- END PAGE BASE CONTENT -->
                        </div>
                        @yield('modal')
                        <p class="copyright-v2"> 2017 &copy; Management API By
                            <a target="_blank" href="#">Tesla Tim</a> &nbsp;|&nbsp;
                            <a href="#" title="Themes by Keen" target="_blank">Indonesia</a>
                        </p>
                        <a href="#index" class="go2top">
                            <i class="icon-arrow-up"></i>
                        </a>
                    </div>
                </div>
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
                
                <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
                <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
                @yield('js')
                <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
                @yield('script')
                <script src="assets/layouts/layout6/scripts/layout.min.js" type="text/javascript"></script>
                <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
                <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        </body>
        
        </html>