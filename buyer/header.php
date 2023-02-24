I'm <?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "../includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: ../");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="files/bootstrap/3/css/bootstrap.css?1" />
<link rel="stylesheet" type="text/css" href="files/css/flags.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<script type="text/javascript" src="files/js/jquery.js?1"></script>
<script type="text/javascript" src="files/bootstrap/3/js/bootstrap.js?1"></script>
<script type="text/javascript" src="files/js/sorttable.js"></script>
<script type="text/javascript" src="files/js/table-head.js?3334"></script>
<script type="text/javascript" src="files/js/bootbox.min.js"></script>
<script type="text/javascript" src="files/js/clipboard.min.js"></script>

<link rel="shortcut icon" href="files/img/favicon.ico" />
<meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" /> 
 <meta name="referrer" content="no-referrer" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>JeruxShop</title>
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
    display: t#
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
                            window.location = "logout.html";
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
		<style>
            .navbar {
                background-color: #001f3f;
            }
        </style>
<body style="padding-top: 70px; padding-bottom: 70px;">

<nav class="navbar navbar-default navbar-fixed-top ">
  <div class="container-fluid">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    <div class="navbar-brand" onClick="location.href='index.html'" onMouseOver="this.style.cursor='pointer'"><b><span class="glyphicon glyphicon-fire"></span> Jerux SHOP <small><span class="glyphicon glyphicon-refresh"></span></small></b></div></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="topFixedNavbar1">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hosts <span class="glyphicon glyphicon-chevron-down" id="alhosts"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="rdp.html" onclick="pageDiv(1,'RDP - JeruxShop','rdp.html',0); return false;">RDPs <span class="label label-primary label-as-badge" id="rdp"></span></a></li>
            <li><a href="cPanel.html" onclick="pageDiv(2,'cPanel - JeruxShop','cPanel.html',0); return false;">cPanels <span class="label label-primary label-as-badge" id="cpanel"></span></a></li>
            <li><a href="shell.html" onclick="pageDiv(3,'Shell - JeruxShop','shell.html',0); return false;">Shells <span class="label label-primary label-as-badge" id="shell"></span></a></li>  
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Send <span class="glyphicon glyphicon-chevron-down" id="mail"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="mailer.html" onclick="pageDiv(4,'PHP Mailer - JeruxShop','mailer.html',0); return false;">Mailers <span class="label label-primary label-as-badge" id="mailer"></span></a></li>
            <li><a href="smtp.html" onclick="pageDiv(5,'SMTP - JeruxShop','smtp.html',0); return false;">SMTPs <span class="label label-primary label-as-badge" id="smtp"></span></a></li>  
          </ul>
        </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Leads <span class="glyphicon glyphicon-chevron-down" id="all_leads"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="leads.html" onclick="pageDiv(6,'Leads - JeruxShop','leads.html',0); return false;">Leads <span class="label label-primary label-as-badge" id="leads"></span></a></li>
          </ul>
        </li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Accounts <span class="glyphicon glyphicon-chevron-down" id="accounts"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="premium.html" onclick="pageDiv(7,'Premium/Dating/Shop - JeruxShop','premium.html',0); return false;">Premium/Dating/Shop <span class="label label-primary label-as-badge" id="premium"></span></a></li>
            <li><a href="banks.html" onclick="pageDiv(8,'Banks - JeruxShop','banks.html',0); return false;">Banks <span class="label label-primary label-as-badge" id="banks"></span></a></li>  
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Others <span class="glyphicon glyphicon-chevron-down" id="accounts"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="scampage.html" onclick="pageDiv(9,'Scampages - JeruxShop','scampage.html',0); return false;">Scampage <span class="label label-primary label-as-badge" id="scams"></span></a></li>
            <li><a href="tutorial.html" onclick="pageDiv(10,'Tutorials - JeruxShop','tutorial.html',0); return false;">Tutorial <span class="label label-primary label-as-badge" id="tutorials"></span></a></li>  
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

    echo '<li><a href="https://jerux.to/seller/index.html"><span class="badge" title="Seller Panel"><span class="glyphicon glyphicon-cloud"></span><span id="seller"></span></span></a></li>';
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
            <li><a href="tickets.html" onclick="pageDiv(11,'Tickets - JeruxShop','tickets.html',0); return false;">Tickets <span class="label label-info"><span id="tickets"></span></span>	<?php
$s1 = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span></a></li>
            <li><a href="reports.html" onclick="pageDiv(12,'Reports - JeruxShop','reports.html',0); return false;">Reports <span class="label label-info"><span id="reports"></span></span> <?php
$s1 = mysqli_query($dbcon, "SELECT * FROM reports WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span> </a></li>

           </ul>
        </li>

        <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance.html',0); return false;"><span class="badge"><b><span id="balance"></span></b> <span class="glyphicon glyphicon-plus"></span><span> </a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account  <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="setting.html" onclick="pageDiv(14,'Setting - JeruxShop','setting.html',0); return false;">Setting <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li><a href="orders.html" onclick="pageDiv(15,'Orders - JeruxShop','orders.html',0); return false;">My Orders <span class="glyphicon glyphicon-shopping-cart pull-right"></span></a></li>
            <li><a href="addBalance.html" onclick="pageDiv(13,'Add Balance - JeruxShop','addBalance.html',0); return false;">Add Balance <span class="glyphicon glyphicon-usd pull-right"></span></a></li>
            
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
<div id="mainDiv">

<?php include('../authentication/security.php'); ?>
<?php include('../authentication/auth-controller.php'); ?>
<?php include('includes/header.php'); ?>

        <!--Sidebar-->
        <div class="col-lg-10">
            <div class="container-fluid mx-2">
                <!--Breadcrumbs-->
                <div class="border-bg mb-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                            <a href="#" class="text-white">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Post</li>
                        </ol>
                    </nav>
                </div>
                <!--Breadcrumbs ends-->

                <!--Sb heading-->
                <div class="border-bg pb-2">
                    <div class="d-flex justify-content-between align-items-center mx-3">
                        <h5 class="h5 text-white">Users Page</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#exampleModal">
                            Add user
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger py-3 text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="user.php" method="post">

                                        <div class="form-group mt-5">
                                            <label  class="lead">Username</label>
                                            <input type="text" name="username" class="form-control py-2 mt-2">
                                        </div>

                                        <div class="form-group mt-5">
                                            <label class="lead">Email</label>
                                            <input type="email" name="email"  class="form-control py-2 mt-2" >
                                        </div>

                                        <div class="form-group mt-5">
                                            <label class="lead">Password</label>
                                            <input type="password"  class="form-control py-2 mt-2" name="password">
                                        </div>

                                        <div class="form-group mt-5">
                                            <input type="hidden"  class="form-control py-2 mt-2" name="usertype" value="user">
                                        </div>
                                                                            
                                        <div class="d-flex justify-content-start align-items-center mt-4">
                                            <button type="submit" name="add_user" class="btn btn-lg btn-success">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Sb heading ends-->

                <!--search form-->
                <div class="float-right mt-2">
                    <form action="">
                        <label for="search" class="text-white h6">Search:</label>
                        <input type="text" class="py-1 rounded">
                    </form>
                </div>
                <!--search form ends-->

                <!--Post Table-->
                <div class="table-responsive">
                  <div class="table-card rounded">
                    <div class="card-head rounded">
                        <h5 class="h5">All Users</h5>
                    </div>
                      <?php
                        include('../authentication/dbconfig.php'); 
                          $query = "SELECT * FROM user WHERE usertype='user' ";
                          $results = mysqli_query($db, $query);
                      ?>
                          <table id="example" class="table table-striped mt-4" style="100%">
                            <thead>
                              <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">Username</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Password</th>
                                  <th scope="col">Balance</th>
                                  <th scope="col">Edit</th>
                                  <th scope="col">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              if(mysqli_num_rows($results) > 0)
                              {
                                while($row = mysqli_fetch_assoc($results))
                                {
                                  ?>
                                  <tr>
                                    <td> <?php echo $row['id']; ?> </td>
                                    <td> <?php echo $row['username']; ?> </td>
                                    <td> <?php echo $row['email']; ?> </td>
                                    <td> <?php echo $row['password']; ?> </td>
                                    td> <?php echo $row['balance']; ?> </td>
                                    <td>
                                        <form action="edit_user.php" method="post">
en" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button class="btn btn-success" type="submit" name="edit_btn">
                                            Edit
                                            </button>
                                        </form>
                                    </td> 
                                    <td>
                                        <form action="../authentication/auth-controller.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button class="btn btn-danger" name="delete_btn">
                                            Delete
                                            </button>
                                        </form>
                                    </td>
                                  </tr>
                                  <?php

                                  }
                                }
                                else{
                                  echo "NO RECORD FOUND";
                                }
                              ?>
                            </tbody>
                          </table>
                  </div>
              </div>
            </div>
                <!--post Table ends-->

                
                
            </div>
        </div>
        <!--Main Body ends-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script>
          $(document).ready(function() {
            $('#table').DataTable();
          } );
        </script>
        <?php include('includes/footer.php'); ?>
</div>
</body>
</html>

