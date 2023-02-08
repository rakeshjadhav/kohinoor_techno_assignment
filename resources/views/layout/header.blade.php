<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kohinoor Techno || Dashboard</title>

    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">

    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
  
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <style>
        .d-none {
         display: none !important;
           }
    </style>
</head>

<body class="fix-header">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part" style="border-bottom-color: black">
                   
                    <a class="logo" href="" style="color:black;border-bottom-color: black">
                       <b>
                        <span class="dark-logo"><b>Kohinoor Techno </b></span>
                     </b>
                        <span class="hidden-xs">
                        <span class="light-logo">Kohinoor Techno</span>
                     </span> </a>
                </div>
              
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> 
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Rakesh Jadhav</b></a>
                    </li>
                </ul>
            </div>
           
        </nav>
        
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> 
                        <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="{{ route('user-lists') }}" class="waves-effect">
                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>Users</a>
                    </li>
                    <li>
                        <a href="{{route('company-lists')}}" class="waves-effect">
                            <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Company</a>
                    </li>
                    

                </ul>
                
            </div>
        </div>

        @yield('content')

    </div>
   
  
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
   
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Datepicker -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' type='text/css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
    
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
   
    <script src="js/jquery.slimscroll.js"></script>
    
    <script src="js/custom.min.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript" src="/js/user_custom.js?ver=1.1"></script>
    <script type="text/javascript" src="/js/company_custom.js?ver=1.1"></script>

    <script>
        $(function() {
            $( "#birthdate_picker" ).datepicker();
            $( "#birthdate1_picker" ).datepicker();
       });  
       let base_url = "{{ env('APP_URL') }}/api";    
       </script>
</body>

</html>
