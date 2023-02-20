<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: login");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
 <meta name="referrer" content="no-referrer" />
  <title>XBASELEET</title>
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <!-- Bootstrap core CSS -->
  <link href="files/bootstrap/3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/css/mdb.min.css" integrity="sha512-hj9rznBPdFg9A4fACbJcp4ttzdinMDtPrtZ3gBD11DiY3O1xJfn0r1U5so/J0zwfGOzq9teIaH5rFmjFAFw8SA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="files/css/flags.css" />
<link rel="shortcut icon" href="files/img/favicon.ico" />
</head>
<style>
#table {
  .sortable
}
table th:not(.sorttable_sorted):not(.sorttable_sorted_reverse):not(.sorttable_nosort):after { 
    content: " \25BE" 
}

.label-as-badge {
    border-radius: 0.5em;
}

body {
    padding-top:50px;
}
table.floatThead-table {
    border-top: none;
    border-bottom: none;
    background-color: #fff;
}
@media (min-width: 768px) {
  .dropdown:hover .dropdown-menu {
    display: block;
  }
}

#mydiv {
  height: 400px;
  position: relative;
}
.ajax-loader {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  margin: auto; /* presto! */

}

   
    

</style>
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
<script type="text/javascript">
             function ajaxinfo() {
                $.ajax({
                    type: 'GET',
                    url: 'ajaxinfo.html',
                    timeout: 10000,

                    success: function(data) {
                        if (data != '01') {
                            var data = JSON.parse(data);
                            for (var prop in data) {
                                $("#" + prop).html(data[prop]).show();
                            }
                        } else {
                            window.location = "logout";
                        }
                    }
                });

            }
            setInterval(function() {
                ajaxinfo()
            }, 3000);

            ajaxinfo();

$(document).keydown(function(event){
    if(event.which=="17")
        cntrlIsPressed = true;
});

$(document).keyup(function(){
    cntrlIsPressed = false;
});

var cntrlIsPressed = false;


function pageDiv(n,t,u,x){
  if(cntrlIsPressed){
    window.open(u, '_blank');
    return false;
  }
        var obj = { Title: t, Url: u };
        if ( ("/"+obj.Url) != location.pathname) {
        	if (x != 1) {history.pushState(obj, obj.Title, obj.Url);}
        	else{history.replaceState(obj, obj.Title, obj.Url);}

    	}
      document.title = obj.Title;
    $("#mainDiv").html('<div id="mydiv"><img src="files/img/load2.gif" class="ajax-loader"></div>').show();
    $.ajax({
    type:       'GET',
    url:        'divPage'+n+'.html',
    success:    function(data)
    {
        $("#mainDiv").html(data).show();
        newTableObject = document.getElementById('table');
        sorttable.makeSortable(newTableObject);
        $(".sticky-header").floatThead({top:60});
        if(x==0){ajaxinfo();}
      }});
    if (typeof stopCheckBTC === 'function') { 
    var a = stopCheckBTC();
     }

}

$(window).on("popstate", function(e) {
        location.replace(document.location);

});


$(window).on('load', function() {
$('.dropdown').hover(function(){ $('.dropdown-toggle', this).trigger('click'); });
   pageDiv(0,'Main - xbaseleet','index',1);
   var clipboard = new Clipboard('.copyit');
    clipboard.on('success', function(e) {
      setTooltip(e.trigger, 'Copied!');
      hideTooltip(e.trigger);
      e.clearSelection();
   });

});


function setTooltip(btn, message) {
  console.log("hide-1");
  $(btn).tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
     console.log("show");
}

function hideTooltip(btn) {
  setTimeout(function() {$(btn).tooltip('hide'); console.log("hide-2");}, 1000);
}
</script>
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
    <a class="navbar-brand" href="main" style="color: var(--font-color);"><img width="40px" src="assets/images/logo.png">XBASELEET</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="navbar-toggler-icon"></i></button><div class="collapse navbar-collapse order-1" id="navbarSupportedContent"><ul class="navbar-nav mr-auto">
	  <li class="nav-item dropdown mr-auto">
        <a class="nav-link dropdown-toggle" style="color: var(--font-color);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-warehouse fa-sm orange-text"></i>
          Hosts
        </a>
        <div class="dropdown-menu dropdown-menu-left" style="color: var(--font-color); background-color: var(--color-nav);" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="rdp" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-desktop fa-fw"></i> RDPs <span class="badge badge-primary"><span id="rdp"></span></span></a>
          <a class="dropdown-item" href="cPanel" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-tools fa-fw"></i> cPanels <span class="badge badge-primary"><span id="cpanels"></span></span></a>
          <a class="dropdown-item" href="shell" style="color: var(--font-color);"><span class="px-2"><i class="fas fa-file-code fa-fw"></i> Shells <span class="badge badge-primary"><span id="shell"></span></span></a>
        </div>
      </li>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Send <span class="glyphicon glyphicon-chevron-down" id="mail"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="mailer.html" onclick="pageDiv(4,'PHP Mailer - FeluxShop','mailer.html',0); return false;">Mailers <span class="label label-primary label-as-badge" id="mailer"></span></a></li>
            <li><a href="smtp.html" onclick="pageDiv(5,'SMTP - FeluxShop','smtp.html',0); return false;">SMTPs <span class="label label-primary label-as-badge" id="smtp"></span></a></li>  
          </ul>
        </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Leads <span class="glyphicon glyphicon-chevron-down" id="all_leads"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="leads.html" onclick="pageDiv(6,'Leads - FeluxShop','leads.html',0); return false;">Leads <span class="label label-primary label-as-badge" id="leads"></span></a></li>
          </ul>
        </li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Accounts <span class="glyphicon glyphicon-chevron-down" id="accounts"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="premium.html" onclick="pageDiv(7,'Premium/Dating/Shop - FeluxShop','premium.html',0); return false;">Premium/Dating/Shop <span class="label label-primary label-as-badge" id="premium"></span></a></li>
            <li><a href="banks.html" onclick="pageDiv(8,'Banks - FeluxShop','banks.html',0); return false;">Banks <span class="label label-primary label-as-badge" id="banks"></span></a></li>  
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Others <span class="glyphicon glyphicon-chevron-down" id="accounts"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="scampage.html" onclick="pageDiv(9,'Scampages - FeluxShop','scampage.html',0); return false;">Scampage <span class="label label-primary label-as-badge" id="scams"></span></a></li>
            <li><a href="tutorial.html" onclick="pageDiv(10,'Tutorials - FeluxShop','tutorial.html',0); return false;">Tutorial <span class="label label-primary label-as-badge" id="tutorials"></span></a></li>  
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

    echo '<li><a href="seller/index.html"><span class="badge" title="Seller Panel"><span class="glyphicon glyphicon-cloud"></span><span id="seller"></span></span></a></li>';
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
            <li><a href="reports.html" onclick="pageDiv(12,'Reports - FeluxShop','reports.html',0); return false;">Reports <span class="label label-info"><span id="reports"></span></span> <?php
$s1 = mysqli_query($dbcon, "SELECT * FROM reports WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span> </a></li>

           </ul>
        </li>

        <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - FeluxShop','addBalance.html',0); return false;"><span class="badge"><b><span id="balance"></span></b> <span class="glyphicon glyphicon-plus"></span><span> </a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account  <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="setting.html" onclick="pageDiv(14,'Setting - FeluxShop','setting.html',0); return false;">Setting <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li><a href="orders.html" onclick="pageDiv(15,'Orders - FeluxShop','orders.html',0); return false;">My Orders <span class="glyphicon glyphicon-shopping-cart pull-right"></span></a></li>
            <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - FeluxShop','addBalance.html',0); return false;">Add Balance <span class="glyphicon glyphicon-usd pull-right"></span></a></li>
            
            <li class="divider"></li>
            <li><a href="logout.html" >Logout <span class="glyphicon glyphicon-off pull-right"></span></a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>


<style>
.modal-dialog.modal-frame.modal-top.modal-notify.modal-danger .modal-body,.modal-dialog.modal-frame.modal-top.modal-offernov.modal-danger .modal-body{
  padding-top: 35px;
}
.modal-dialog.modal-frame.modal-top.modal-notify.modal-danger,.modal-dialog.modal-frame.modal-top.modal-offernov.modal-danger {
max-width: 500px !important;
margin: 1.75rem auto !important;
position: relative;
width: auto !important;
pointer-events: none;
}
a.closearb {
position: absolute;
top: 2.5px;
right: 2.5px;
display: block;
width: 30px;
height: 30px;
text-indent: -9999px;
background-size: contain;
background-repeat: no-repeat;
background-position: center center;
background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA3hJREFUaAXlm8+K00Acx7MiCIJH/yw+gA9g25O49SL4AO3Bp1jw5NvktC+wF88qevK4BU97EmzxUBCEolK/n5gp3W6TTJPfpNPNF37MNsl85/vN/DaTmU6PknC4K+pniqeKJ3k8UnkvDxXJzzy+q/yaxxeVHxW/FNHjgRSeKt4rFoplzaAuHHDBGR2eS9G54reirsmienDCTRt7xwsp+KAoEmt9nLaGitZxrBbPFNaGfPloGw2t4JVamSt8xYW6Dg1oCYo3Yv+rCGViV160oMkcd8SYKnYV1Nb1aEOjCe6L5ZOiLfF120EjWhuBu3YIZt1NQmujnk5F4MgOpURzLfAwOBSTmzp3fpDxuI/pabxpqOoz2r2HLAb0GMbZKlNV5/Hg9XJypguryA7lPF5KMdTZQzHjqxNPhWhzIuAruOl1eNqKEx1tSh5rfbxdw7mOxCq4qS68ZTjKS1YVvilu559vWvFHhh4rZrdyZ69Vmpgdj8fJbDZLJpNJ0uv1cnr/gjrUhQMuI+ANjyuwftQ0bbL6Erp0mM/ny8Fg4M3LtdRxgMtKl3jwmIHVxYXChFy94/Rmpa/pTbNUhstKV+4Rr8lLQ9KlUvJKLyG8yvQ2s9SBy1Jb7jV5a0yapfF6apaZLjLLcWtd4sNrmJUMHyM+1xibTjH82Zh01TNlhsrOhdKTe00uAzZQmN6+KW+sDa/JD2PSVQ873m29yf+1Q9VDzfEYlHi1G5LKBBWZbtEsHbFwb1oYDwr1ZiF/2bnCSg1OBE/pfr9/bWx26UxJL3ONPISOLKUvQza0LZUxSKyjpdTGa/vDEr25rddbMM0Q3O6Lx3rqFvU+x6UrRKQY7tyrZecmD9FODy8uLizTmilwNj0kraNcAJhOp5aGVwsAGD5VmJBrWWbJSgWT9zrzWepQF47RaGSiKfeGx6Szi3gzmX/HHbihwBser4B9UJYpFBNX4R6vTn3VQnez0SymnrHQMsRYGTr1dSk34ljRqS/EMd2pLQ8YBp3a1PLfcqCpo8gtHkZFHKkTX6fs3MY0blKnth66rKCnU0VRGu37ONrQaA4eZDFtWAu2fXj9zjFkxTBOo8F7t926gTp/83Kyzzcy2kZD6xiqxTYnHLRFm3vHiRSwNSjkz3hoIzo8lCKWUlg/YtGs7tObunDAZfpDLbfEI15zsEIY3U/x/gHHc/G1zltnAgAAAABJRU5ErkJggg==);
}
</style>
<style>
.scroll-area-lg {
height: 400px;
overflow-x: hidden;
}
.scrollbar-sidebar, .scrollbar-container {
position: relative;
height: 100%;
}
.ps {
overflow: hidden !important;
overflow-anchor: none;
touch-action: auto;
}
.heading{
font-size: 16px;
font-weight: bold;
}
.fa-plus-circle {
color: green;
}
#tour {
font-family: 'Raleway', sans-serif;
}
</style>


<body class="ajax-loader">
<link rel="stylesheet" href="files/css/flexslider5.css" type="text/css">
<script src="files/js/jquery.flexslider-min.js"></script>
	
	<style>
#tour {
font-family: 'Raleway', sans-serif;
}
#tour .flexslider {
margin: 0 0 60px;
background: #fff;
border: 0px solid #fff;
position: relative;
zoom: 0;
-webkit-border-radius: 0px;
-moz-border-radius: 0px;
border-radius: 0px;
-webkit-box-shadow: '' 0 0px 0px rgba(0, 0, 0, 0.2);
-moz-box-shadow: '' 0 0px 0px rgba(0, 0, 0, 0.2);
-o-box-shadow: '' 0 0px 0px rgba(0, 0, 0, 0.2);
box-shadow: '' 0 0px 0px rgba(0, 0, 0, 0.2);
}
#tour .flex-control-paging li a {
width: 11px;
height: 11px;
display: block;
background: #fff!important;
border: 1px solid #3c8dbc;
background: rgba(0, 0, 0, 0.5);
cursor: pointer;
text-indent: -9999px;
-webkit-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
-moz-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
-o-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
-webkit-border-radius: 20px;
-moz-border-radius: 20px;
border-radius: 20px;
}
#tour .flex-control-paging li a.flex-active {
background: #3c8dbc!important;
}
#tour .modal-body {
padding: 0px;
}
#tour .modal-footer {
background: #fafafa;
border:0px;
}
#tour .flex-caption {
padding: 20px 100px 20px 100px;
text-align: center;
}
#tour .flex-caption .heading{
font-weight: 600;
font-size: 20px;
color: #505050;
padding-bottom: 15px;
}
#tour .flex-caption .caption-content{
font-size: 15px;
color: #505050;
}
</style>
	<div class="modal fade top" id="mod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div id="bodyTicket" class="row d-flex justify-content-center align-items-center">
          <span class="pt-3 mx-4" style="font-size: 14 px"><b>You have new replay ticket</span>
          <a type="button" href="tickets" class="btn btn-success">Show tickets
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade top" id="modalrep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div id="bodyreport" class="row d-flex justify-content-center align-items-center">
          <span class="pt-3 mx-4" style="font-size: 14 px"><b>You have new replay report</span>
          <a type="button" href="reports" class="btn btn-danger">Show reports
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade top" id="modalreps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div id="bodyreport" class="row d-flex justify-content-center align-items-center">
          <span class="pt-3 mx-4" style="font-size: 14 px"><b>You have new report</span>
          <a type="button" href="./seller/reports" class="btn btn-danger">Show reports</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade top" id="modalrepss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-danger" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div id="bodyreport" class="row d-flex justify-content-center align-items-center">
          <span class="pt-3 mx-4" style="font-size: 14 px"><b>You have new replay report</span>
          <a type="button" href="./seller/reports" class="btn btn-danger">Show reports
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="d-flex flex-row-reverse mt-0" style="z-index: 999999;position: absolute; right: 0; ">
  <div class="p-2"><label id="switch" class="switch">
    <input type="checkbox" onchange="toggleTheme()" id="slider">
    <span class="slider round"></span>
  </label></div>
</div>
<script defer src="files/js/jquery.flexslider.js"></script>

	<div class="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-12" style="text-align:center;"><a href="shell"><img style="border: 3px solid;" src="files/images/shells.gif"></a></div>
      <div class="col-lg-3 col-md-6 col-sm-12" style="text-align:center;"><a href="smtp"><img style="border: 3px solid;" src="files/images/smtps.gif"></a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12" style="text-align:center;"><a href="accounts-7"><img style="border: 3px solid;" src="files/images/accs.gif"></a></div>
  </div><br>
  <div class="header-body">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
                <h5 class="card-title text-uppercase text-muted mb-0">Balance</h5>
                <span class="h2 font-weight-bold mb-0">
                0 </span>
              </div>
              <div class="col-md-2">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                  <i class="fa fa-money-bill-alt "></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <span class="text-nowrap"><a href="addBalance"> [Add Funds] </a></span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
                <h5 class="card-title text-uppercase text-muted mb-0">Orders</h5>
              <span class="h2 font-weight-bold mb-0">0 </div>
              <div class="col-md-2">
                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                  <i class="fa fa-shopping-cart"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <span class="text-nowrap"><a href="orders"> [ Show ] </a></span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
                <h5 class="card-title text-uppercase text-muted mb-0">Tickets</h5>
              <span class="h2 font-weight-bold mb-0">0 </div>
              <div class="col-md-2">
                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                  <i class="fa fa-cog"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <span class="text-nowrap"><a href="tickets"> [ Show ]</a></span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card card-stats" style="background-color: #fb3!important;">
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
                <h5 class="card-title text-uppercase text-muted mb-0">Reports</h5>
                <span class="h2 font-weight-bold mb-0">
                  0 <span>
                  </div>
                  <div class="col-md-2">
                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <i class="fas fa-receipt"></i>
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                  <span class="text-nowrap"><a href="reports"> [ Show ]</a></span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
<div id="mainDiv">


 </div>
    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
      <div class="container-fluid">
        © 2019 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
      </div>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  <!-- SCRIPTS -->
  <script type="text/javascript" src="files/js/jquery.js?1"></script>
    <!-- SCRIPTS -->
<script type="text/javascript" src="files/js/sorttable.js"></script>
  <!-- SCRIPTS -->
<script type="text/javascript" src="files/js/table-head.js?3334"></script>
  <!-- SCRIPTS -->
<script type="text/javascript" src="files/js/bootbox.min.js"></script>
  <!-- SCRIPTS -->
<script type="text/javascript" src="files/js/clipboard.min.js"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="files/bootstrap/3/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="files/js/popper.min.js"></script>
 
</body>
</html>

