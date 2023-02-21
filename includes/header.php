<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: ../");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="alfacoins-site-verification" content="">
<meta name="revisit-after" content="2 days">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="/cdn-cgi/apps/head/5OOZijtrf_Bpx-OYIJIWKuxGuQM.js"></script>
  <link rel="shortcut icon" href="../../favicon.ico" />
<title>XBASELEET</title>
<link rel="stylesheet" href="files/bootstrap/3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="files/js/jquery.js"></script> 
  <script  src="files/js/sorttable.js"></script>
  <script src="files/js/table-head.js"></script>
<script src="files/js/jquery-3.4.1.min.js"></script>
<script src="files/js/clipboard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="files/bootstrap/3/js/bootstrap.min.js"></script>
<script src="files/js/bootbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="files/css/flags.css" />
    
    
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script async src="//www.googletagmanager.com/gtag/js?id=UA-177092549-1"></script>
<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('set', {'$usrid': 'USER_ID'}); // Set the user ID using signed-in user_id.
        gtag('config', 'UA-177092549-1');
        </script>
<link rel="stylesheet" href="files/css/custom.css?" />
    <link rel="stylesheet" href="files/css/main.css?" />

<link rel="stylesheet" href="files/css/util.css" />
<style>body{padding-top:80px}</style>
<link rel="stylesheet" href="files/fonts/iconic/css/material-design-iconic-font.min.css">
<script src="files/js/main.js"></script>
<script type="text/javascript">
            // Notice how this gets configured before we load Font Awesome
            window.FontAwesomeConfig = { autoReplaceSvg: false }
        </script>
<style>
            @import url(//fonts.googleapis.com/css?family=Roboto:400);
            .navbar-nav .dropdown-menu
            {
            margin:0 !important
            }
        </style>
</head>
  </head>

  <body class="them">
    <style>
    .navbar-nav .dropdown-menu
    {
    margin:0 !important
    }
    .theme-light {
    --color-primary: #0060df;
    --color-secondary: #ffffff;
    --color-secondary2: #ecf0f1;
    --color-accent: #fd6f53;
    --font-color: #000000;
    --color-nav: #ffffff;
    --color-dropdown: #ffffff;
    --color-card: #ffffff;
    --color-card2: #d1ecf1;
    --color-info: #0c5460;
    --color-backinfo: #d1ecf1;
    --color-borderinfo: #bee5eb;
    }
    .theme-dark {
    --color-primary: #17ed90;
    --color-secondary: #353B50;
    --color-secondary2: #353B50;
    --color-accent: #12cdea;
    --font-color: #ffffff;
    --color-nav: #363947;
    --color-dropdown: rgba(171, 205, 239, 0.3);
    --color-card: #262A37;
    --color-card2: #262A37;
    --color-info: #4DD0E1;
    --color-backinfo: #262A37;
    --color-borderinfo: #262A37;
    }
    .them {
    background: var(--color-secondary);
    flex-direction: column;
    justify-content: center;
    align-items: center;
    }
    .them h1 {
    color: var(--font-color);
    font-family: sans-serif;
    }
    .card-body {
    color: var(--font-color);
    }
    .them button {
    color: var(--font-color);
    background-color: #ffffff;
    padding: 10px 20px;
    border: 0;
    border-radius: 5px;
    }
    .navbar.navbar-light .navbar-toggler {
    color: var(--font-color);
    }
    /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }
    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }
    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: 0.4s;
    transition: 0.4s;
    }
    .slider:before {
    position: absolute;
    content: "";
    height: 40px;
    width: 40px;
    left: 0px;
    bottom: 4px;
    top: 0;
    bottom: 0;
    margin: auto 0;
    -webkit-transition: 0.4s;
    transition: 0.4s;
    box-shadow: 0 0px 15px #2020203d;
    background: white url('https://i.ibb.co/FxzBYR9/night.png');
    background-repeat: no-repeat;
    background-position: center;
    }
    input:checked + .slider {
    background-color: #2196f3;
    }
    input:focus + .slider {
    box-shadow: 0 0 1px #2196f3;
    }
    input:checked + .slider:before {
    -webkit-transform: translateX(24px);
    -ms-transform: translateX(24px);
    transform: translateX(24px);
    background: white url('https://i.ibb.co/7JfqXxB/sunny.png');
    background-repeat: no-repeat;
    background-position: center;
    }
    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }
    .slider.round:before {
    border-radius: 50%;
    }
    </style>



    <script>
    function setTheme(themeName) {
    localStorage.setItem('theme', themeName);
    document.documentElement.className = themeName;
    }
    // function to toggle between light and dark theme
    function toggleTheme() {
    if (localStorage.getItem('theme') === 'theme-dark') {
    setTheme('theme-light');
    } else {
    setTheme('theme-dark');
    }
    }
    // Immediately invoked function to set the theme on initial load
    (function () {
    if (localStorage.getItem('theme') === 'theme-dark') {
    setTheme('theme-dark');
    document.getElementById('slider').checked = false;
    } else {
    setTheme('theme-light');
    document.getElementById('slider').checked = true;
    }
    })();
    </script>
  
      
<nav class="navbar navbar-expand-xl navbar  navbar-light " style="
                                                          position:fixed;
                                                          background-color: var(--color-nav);
                                                          z-index:1;
                                                          top:0;
                                                          left:0;
                                                          right:0;
                                                          line-height: 1.5;
                                                          font-family: 'Lato', sans-serif;
                                                          font-size: 15px;
                                                          padding-top: 0.5rem;
                                                          padding-right: 1rem;
                                                          padding-bottom: 0.5rem;
                                                          padding-left: 1rem;
                                                        ">
<a class="navbar-brand" href="main" style="color: var(--font-color);"><img width="40px" src="files/images/logo.png"> XBASELEET</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<i class="navbar-toggler-icon"></i>
</button>
<div class="collapse navbar-collapse order-1" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">

<li class="nav-item dropdown mr-auto">
<a class="nav-link dropdown-toggle" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-warehouse fa-sm orange-text"></i>
Hosts
</a>
     <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="rdp" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-desktop fa-fw"></i> RDPs <span class="badge badge-primary"><span id="rdp"></span></span></a>
          <a class="dropdown-item" href="cPanel" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-tools fa-fw"></i> cPanels <span class="badge badge-primary"><span id="cpanel"></span></span></a>
          <a class="dropdown-item" href="shell" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-file-code fa-fw"></i> Shells <span class="badge badge-primary"><span id="shell"></span></span></a>
        </div>
      </li>
       <li class="nav-item dropdown mr-auto">
        <a class="nav-link dropdown-toggle" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fab fa-google-play fa-sm text-success"></i>
          Send
        </a>
        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="mailer" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-leaf fa-fw"></i> Mailers <span class="badge badge-primary"><span id="mailer"></span></span></a>
          <a class="dropdown-item" href="smtp" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-envelope fa-fw"></i> SMTPs <span class="badge badge-primary"><span id="smtp"></span></span></a>
        </div>
      </li>
      
      <li class="nav-item dropdown mr-auto">
        <a class="nav-link dropdown-toggle" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-mail-bulk fa-sm pink-color"></i> 
          Leads
        </a>
        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="leads" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-award"></i> 100% Validated Leads <span class="badge badge-primary"><span id="leads"></span></span></a>
          </div>
      </li>

  <li class="nav-item dropdown mr-auto">
        <a class="nav-link dropdown-toggle" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-tie fa-sm"></i> Bank logs(full info)
        </a>
        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="accounts" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-business-time"></i>Premium/dating/shop <span class="badge badge-primary"><span id="premium"></span></span></a>
          <a class="dropdown-item" href="banks" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-mail-bulk"></i>Banks logs <span class="badge badge-primary"><span id="banks"></span></span></a>
        
  <li class="nav-item dropdown mr-auto">
<a class="nav-link dropdown-toggle" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-tie fa-sm"></i> Tutorial/Script/Methods
</a>
<div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="Scampage" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-business-time"></i> Scmpage <span class="badge badge-primary"><span id="scampage"></span></span></a>
<a class="dropdown-item" href="tutorials" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-mail-bulk"></i> Banks Cashout Tutorials <span class="badge badge-primary"><span id="tutorial"></span></a>
  </li>  
          </ul>
        </li>
                      
      </ul>
      <ul class="nav navbar-nav navbar-right">
                        <?php
$uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$q = mysqli_query($dbcon, "SELECT resseller FROM users WHERE username='$uid'") or die(mysqli_error());
$r         = mysqli_fetch_assoc($q);
$reselerif = $r['resseller'];
if ($reselerif == "1") {
    $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
    $q = mysqli_query($dbcon, "SELECT soldb FROM resseller WHERE username='$uid'") or die(mysqli_error());
    $r = mysqli_fetch_assoc($q);

    echo '<li><a href="../seller/index.html"><span class="badge" title="Seller Panel"><span class="glyphicon glyphicon-cloud"></span><span id="seller"></span></span></a></li>';
} else {
} ?>      
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tickets <span id="alltickets">
<?php
$sze112  = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
$r844941 = mysqli_num_rows($sze112);
if ($r844941 == "1") {
    echo '<span class="label label-danger">1</span>';
}
?>
</span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="tickets.html" onclick="pageDiv(11,'Tickets - FeluxShop','tickets.html',0); return false;">Tickets <span class="label label-info"><span id="tickets"></span></span><?php
$s1 = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span></a></li>
            <li><a href="reportsl" onclick="pageDiv(12,'Reports - FeluxShop','reports.html',0); return false;">Reports <span class="label label-info"><span id="reports"></span></span> <?php
$s1 = mysqli_query($dbcon, "SELECT * FROM reports WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span> </a></li>

           </ul>
        </li>

<li class="nav-item">
<a class="nav-link" href="addBalancel" style="color: var(--font-color);" role="button" aria-haspopup="true" aria-expanded="false"><span class="badge badge-danger">
<b><span id="balance"></span></b>
<span class="px-2"><i class="fa fa-plus"></i></span></span>
</a>
</li>


<?php echo'<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$usrid.'<i class="fa fa-user-secret" style="color: var(--font-color);">
</i></a>'; ?>
<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: var(--font-color); background-color: var(--color-nav);">
  <a class="dropdown-item" href="setting" style="color: var(--font-color);"><span class="px-2">Setting <i class="fa fa-cog"></i></span></a>
<a class="dropdown-item" href="orders" style="color: var(--font-color);"><span class="px-2">My Orders <i class="fa fa-shopping-cart"></i></span></a>
<a class="dropdown-item" href="addBalance" style="color: var(--font-color);"><span class="px-2">Add Balance <i class="fa fa-money-bill-alt"></i></span></a>
      <a class="dropdown-item" href="logout" style="color: var(--font-color);"><span class="px-2">Logout <i class="fa fa-door-open"></i></span></a>
</div>
</li>

</ul>

</div>
  </nav>
 
