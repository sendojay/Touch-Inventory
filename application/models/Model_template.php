<?php
defined('BASEPATH')OR exit("No direct script access allowed");

class Model_template extends CI_Model{
    public function Call_template($title = ''){
        return array(
            "Header" => $this->Tmember_header($title),
            "Footer" => $this->Tmember_footer(),
            "Under" => $this->Tmember_under(),
            "Preload" => $this->Tmember_preload(),
            "Css" => $this->Tmember_css(),
            "Script" => $this->Tmember_script(),
            "Menubar" => $this->Tmember_menubar(),
            "Navbar" => $this->Tmember_navbar(),
        );
    }

    public function Tmember_header($title = ''){
        $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>'.$title.'</title>
            <script> var hashtag = "' . $this->security->get_csrf_hash() . '"</script>
        ';
        return $html;
    }

    public function Tmember_footer(){
        $html = '
        <footer class="footer text-center"> 
            2016 &copy; SV Group Co Ltd., 
        </footer>
        ';
        return $html;
    }

    public function Tmember_preload(){
        $html = '
            </head>
            <body>
            <!-- Preloader -->
            <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
            </div>
        ';
        return $html;
    }

    public function Tmember_under(){
        $html = '
            </body>
            </html>
        ';
        return $html;
    }

    public function Tmember_css(){
        $html = '
            <link href="'.base_url("assets/css/bootstrap.min.css").'" rel="stylesheet">
            <link href="'.base_url("assets/css/sidebar-nav.min.css").'" rel="stylesheet">
            <link href="'.base_url("assets/css/style.css").'" rel="stylesheet">
            <link href="'.base_url("assets/css/font-awesome.css").'" rel="stylesheet">
            <link href="'.base_url("assets/css/dark.css").'" id="theme"  rel="stylesheet">
            <link href="'.base_url("assets/css/style_modify.css").'" rel="stylesheet">

            <!--[if lt IE 9]>
            <script src="'.base_url("assets/js/html5shiv.js").'"></script>
            <script src="'.base_url("assets/js/respond.min.js").'"></script>
            <![endif]-->
        ';
        return $html;
    }

    public function Tmember_script(){
        $html = '
            <script src="'.base_url("assets/js/jquery.min.js").'"></script>
            <script src="'.base_url("assets/js/bootstrap.min.js").'"></script>
            <script src="'.base_url("assets/js/sidebar-nav.min.js").'"></script>
            <script src="'.base_url("assets/js/jquery.slimscroll.js").'"></script>
            <script src="'.base_url("assets/js/waves.js").'"></script>
            <script src="'.base_url("assets/js/custom.js").'"></script>
            <script src="'.base_url("assets/js/script_modify.js").'"></script>
        ';
        return $html;
    }

    public function Tmember_navbar(){
        $html = '
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo"><img src="" class="img-responsive img-center" title="LOGO" /></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <!-- /.dropdown -->
                    <!--<li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Steave</b> </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    </li>-->
                    <!-- /.dropdown-user -->
                    <!-- /.dropdown -->
                </ul>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
            </nav>
        ';
        return $html;
    }

    public function Tmember_menubar(){
        $html = '
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                    <ul class="nav" id="side-menu">
                        <li class="nav-small-cap m-t-10">
                        <!--<img src="'.base_url("assets/images/logo/logo.svg").'" class="img-center img-responsive"/>-->
                        </li>
                        <li class="user-pro"> <a href="#" class="waves-effect"><img src="'.base_url("assets/images/element/backup-admin.png").'" alt="user-img"  class="img-circle"> <span class="hide-menu"> '.$this->session->userdata("member_fname").' '.$this->session->userdata("member_lname").'<span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="'.base_url("Login/Logout").'"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap m-t-10">--- Main Menu</li>
                        <li> <a href="'.base_url("Home").'" class="waves-effect"><i class="fa fa-tachometer fa-fw" data-icon="v"></i><span class="hide-menu" >Dashboard</span></a> </li>
                        <li><a href="javascript:void(0);" class="waves-effect"><i data-icon=")" class="fa fa-user fa-fw"></i> <span class="hide-menu">Manage Member <span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="'.base_url("Member/RoleView").'">Role</a></li>
                                <li> <a href="'.base_url("Member/PositionView").'">Position</a></li>
                                <li> <a href="'.base_url("Member/MemberView").'">Member</a></li>
                            </ul>
                        </li>
                        <li> <a href="'.base_url("Product/ProductView").'" class="waves-effect"><i class="fa fa-shopping-bag fa-fw"></i><span class="hide-menu" >Product</span></a> </li>                        
                    </ul>
                </div>
            </div>
        ';
        return $html;
    }
}