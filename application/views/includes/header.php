<!DOCTYPE html>
<html lang="en">
	<head>
        <!-- BEGIN META SECTION -->
        <meta charset="utf-8">
        <title><?php echo $this->session->userdata('siteName'); ?><?php if(isset($pageTitle)) echo " | ".$pageTitle; ?> </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="keywords" content="<?php if(isset($keywords)){echo $keywords;}else{echo $this->session->userdata('siteMetaKW');} ?>">
        <meta name="description" content="<?php if(isset($description)){echo $description;}else{echo $this->session->userdata('siteMetaDesc');} ?>">
        <meta name="author" content="Ebrahim Elsawy">   
    
        <meta property="og:description" content="<?php if(isset($description)){echo $description;}else{echo $this->session->userdata('siteMetaDesc');} ?>" />
        <meta property="og:image" content="<?php if(isset($pic)){echo $pic;}else{echo base_url().'wahtsapp.jpg';} ?>" />
        <meta property='og:title' content='<?php echo $this->session->userdata('siteName') ?><?php if(isset($title)){echo ' - '.$title;} ?>' />
        <meta property='og:url' content='<?php echo current_url(); ?>' />
        <meta property='og:description' content='<?php if(isset($description)){echo $description;}else{echo $this->session->userdata('siteMetaDesc');} ?>' />
        <meta property='og:site_name' content='<?php echo $this->session->userdata('siteName') ?>' />
        <meta property='og:locale' content='ar_AR' />
        <!-- END META SECTION -->
    
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url() ;?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ;?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ;?>assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ;?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="<?php echo base_url() ;?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ;?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN PAGE STYLES -->
        <link href="<?php echo base_url() ;?>assets/admin/pages/css/tasks-rtl.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ;?>assets/admin/pages/css/news-rtl.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ;?>assets/admin/pages/css/pricing-table-rtl.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="<?php echo base_url() ;?>assets/global/css/components-rounded-rtl.css" id="style_components" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ;?>assets/global/css/plugins-rtl.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ;?>assets/admin/layout3/css/layout-rtl.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ;?>assets/admin/layout3/css/themes/default-rtl.css" rel="stylesheet" type="text/css" id="style_color">
        <link href="<?php echo base_url() ;?>assets/admin/layout3/css/custom-rtl.css" rel="stylesheet" type="text/css">
        <!-- END THEME STYLES -->
            
        <!-- Google Analytics-->
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', '<?php echo $this->session->userdata('siteAnalytics') ?>']);
          _gaq.push(['_trackPageview']);
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
        
        <!-- Alexa Analytics-->
        <meta name="alexaVerifyID" content="<?php echo $this->session->userdata('siteAlexa') ?>" />
   
	</head>

	<body class="page-header-top-fixed">
  
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo site_url() ?>"><img src="<?php echo base_url() ;?>assets/admin/layout3/img/logo-default.png" alt="logo" class="logo-default"></a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            
                            <?php if ($this->session->userdata('is_logged_in')) { ?>
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo base_url() ;?>assets/admin/layout3/img/avatar9.jpg">
                                <span class="username username-hide-mobile">مرحبا <?php echo $this->session->userdata('user_full_name') ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="">
                                        <i class="icon-user"></i> الملف الشخصي </a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('client/logout') ?>">
                                        <i class="icon-key"></i> تسجيل خروج </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default">7</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>You have <strong>12 pending</strong> tasks</h3>
                                        <a href="javascript:;">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-success">
                                                <i class="fa fa-plus"></i>
                                                </span>
                                                New user registered. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                                </span>
                                                Server #12 overloaded. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">10 mins</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                <i class="fa fa-bell-o"></i>
                                                </span>
                                                Server #2 not responding. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">14 hrs</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                                </span>
                                                Application error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">2 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                                </span>
                                                Database overloaded 68%. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">3 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                                </span>
                                                A user IP blocked. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">4 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                <i class="fa fa-bell-o"></i>
                                                </span>
                                                Storage Server #4 not responding dfdfdfd. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">5 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                                </span>
                                                System Error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">9 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                                </span>
                                                Storage server failed. </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <?php }else{ ?>
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo base_url() ;?>assets/admin/layout3/img/avatar9.jpg">
                                <span class="username username-hide-mobile">مرحبا بك </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo site_url('client') ?>">
                                        <i class="icon-user"></i> تسجيل الدخول </a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>

                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                    <!-- BEGIN MEGA MENU -->
					<?php echo $this->load->view('includes/menu'); ?>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
