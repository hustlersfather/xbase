<?php
ob_start();
session_start();
error_reporting();
date_default_timezone_set('UTC');
include "../includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: ../");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);

?>
<?php
 echo'
<div class="form-group col-lg-7 ">
<div class="well">
  Hello <a class="label label-primary">'.$usrid.'</a><br>
    If you have any <b>Question</b> ,<b>Problem</b>, <b>Suggestion</b> or <b>Request</b> Please feel free to <a class="label label-default " href="tickets.html"><span class="glyphicon glyphicon-pencil"></span> Open a Ticket</a><br>
    if you want to report an order , just go to <abbr title="Account - > My Orders or Click here" >My Orders  <span class="glyphicon glyphicon-shopping-cart"></span></abbr> 
    then click on <a class="label label-primary">Report #[Order Id]</a> button<br><br>
    Our Domains are <b>Jerux.to</b> || <b>Jerux.xyz</b> || <b>Jerux.shop</b> || <b>Jerux.pw</b> - Please Save them!

</div>

    <div class="list-group" id="div2">
      	<h3><i class="glyphicon glyphicon-info-sign"></i> News</h3>'; 
		 $qq = @mysqli_query($dbcon, "SELECT * FROM news ORDER by id desc LIMIT 5") or die("error here"); 

                
while($r = mysqli_fetch_assoc($qq)){				echo'<a class="list-group-item"><h5 class="list-group-item-heading"><b>'.stripcslashes($r['content']).'</b></h5><h6 class="list-group-item-text">'.$r['date'].'</h6></a>'; 
}
 echo '

				 </div>

</div>
<div class="form-group col-lg-4 ">
	<!-- <img src="files/img/eid.jpg" style="width: 70%; height: 70%" title="Eid Mubarak"> -->
<iframe src="static.html" style="border:none;" width="400" height="270" scrolling="no">Browser not compatible.</iframe>

    ';
	?>
	<div class="well well-sm">    
                  <h4><b>Our Support team is here !</b></h4><a class="btn btn-default btn-sm" onclick="pageDiv(9,'Tickets - OluxShop','tickets.html#open',0); return false;" href="tickets.html#open"><span class="glyphicon glyphicon-pencil"></span> Open a Ticket</a>
                  <h5><b>Interested in becoming a seller at  Olux Shop ?</b></h5><a class="btn btn-primary btn-xs" href="seller.html" onclick="pageDiv(24,'Become Seller  - OluxShop','seller.html',0); return false;">Learn more</a>
                  <h5><b>Available Payment Methods </b></h5>

                  <img src="files/img/pmlogo2.png" height="48" width="49" title="PerfectMoney" onclick="pageDiv(11,'Add Balance - OluxShop','addBalance.html#perfectmoney',0); return false;" href="addBalance.html#perfectmoney" onmouseover="this.style.cursor='pointer'">
                  <img src="files/img/btclogo.png" height="48" width="49" title="Bitcoin" onclick="pageDiv(11,'Add Balance - OluxShop','addBalance.html#bitcoin',0); return false;" href="addBalance.html#bitcoin" onmouseover="this.style.cursor='pointer'">
                 
      </div>
	<?php
echo "<h5><center>
<a href='SearchUser.html' class='btn label-primary'><font color='white'>Search</font></a>

</center></h5>";

  $q = mysqli_query($dbcon, "SELECT * FROM users")or die("error");
  $t = mysqli_num_rows($q);
  global $t,$q;

if(!isset($_GET['page'])){
  $page = 1;
  $ka = $page;
}else{
  $page = intval($_GET['page']);
  $ka = $page;
}
$qq = mysqli_query($dbcon, "SELECT * FROM users")or die("error");
$record_at_page = 20;
//$q=mysqli_query($dbcon, "SELECT * FROM stufs");
$record_count = mysqli_num_rows($qq);
//echo $record_count."<br>";
@mysqli_free_result($qq);

$pages_count = (int)ceil($record_count / $record_at_page);
if($page > $pages_count || $page = 0){
    //mysql_close($dbconnect);
    //die("no more pages");
}else{
  $start = ($ka - 1) * $record_at_page ;
  $end = $record_at_page ;
}

if($record_count != 0){
  $qq = mysqli_query($dbcon, "SELECT * FROM users LIMIT $start,$end")or die("error");
echo '
    <div class="">
        <div class="panel panel-default">
          <div class="panel-heading no-collapse">  <center>Total users <span class="label label-warning">'.$t.'  </center></span></div>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Balance</th>
                  <th>items purch</th>
                  <th>Last login</th>
                  <th>Action</th>
                  <th>Seller</th>
                </tr>
              </thead>
              <tbody>';
  while($row = mysqli_fetch_assoc($qq)){
              echo '<tr>
                  <td>'.$row['username'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['balance'].'</td>
                  <td>'.$row['ipurchassed'].'</td>
                  <td>'.$row['lastlogin'].'</td>
                  <td>
          <a href="user.php?id='.$row['id'].'"><center><span class="btn label-danger"><font color=white>Edit/Delete</font></center></span></a>
      </td><td>';

      if($row["resseller"] == "0" or empty($row["resseller"])){
          echo '<a href="activer.php?id='.$row["id"].'" class="btn label-primary"><font color=white>Make Seller</font></a>';
      }else{
          echo 'Yes';
      }

                  echo '</td></tr>';
  }
                  echo '

              </tbody>
            </table>
        </div>
    </div>';

}
?>
                 
      </div>
  </div>
'; ?>
