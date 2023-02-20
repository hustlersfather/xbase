<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "includes/header.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: ../");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
?>

</head>
  <style>
  .display  td {
  background: var(--color-card);
  color: var(--font-color);
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button {
  color: var(--font-color);
  }
  #banks_data_paginate .paginate_button {
  color: var(--font-color);
  }
  .alert-info {
  color: var(--color-info);
  background-color: var(--color-backinfo);
  border-color: var(--color-borderinfo);
  }
  #banks_data_filter{
  color: var(--font-color);
  }
  #banks_data_length{
  color: var(--font-color);
  }
  #banks_data_paginate{
  color: var(--font-color);
  }
  #banks_data_info{
  color: var(--font-color);
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


$(window).on('load', function() {
$('.dropdown').hover(function(){ $('.dropdown-toggle', this).trigger('click'); });
   pageDiv(8,'Banks - XBASELEET','banks',1);
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

  <div class="alert alert-info text-left" role="alert" style="margin: 15px;">
    <ul>
      <li>For Any problem for account after buy just open report and seller will fix it or replace.</li>
      <li>There is <b> 0 </b> Bank Logs Available.</li>
    </ul>
  </div>
 </ul>
 <input type=hidden id="cat" name="cat" value="6" />
  <div class="row m-3 pt-1" style="color: var(--font-color);">
    <div class="col-xs-6 col-sm-4 col-lg-2" style="display:inline-block">
      <label for="infos" style="margin-bottom: 10px; margin-top: 5px">banks Name :</label>
      <select name="sitename" id="sitename" class="form-control" style="color: var(--font-color); background-color: var(--color-card);">
        <option value="">All</option>
      </select>
    </div>
    <div class="col-xs-6 col-sm-4 col-lg-2" style="display:inline-block">
      <label for="infos" style="margin-bottom: 10px; margin-top: 5px">Details:</label>
      <input type="search" class="form-control" id="infos" style="color: var(--font-color); background-color: var(--color-card);">
    </div>
    <div class="col-xs-6 col-sm-4 col-lg-2" style="display:inline-block">
      <label for="Country" style="margin-bottom: 10px; margin-top: 5px">Country :</label>
      <select name="country" id="country" class="form-control" style="color: var(--font-color); background-color: var(--color-card);">
        <option value="">All Countries</option>
      </select>
    </div>
    <div class="col-xs-6 col-sm-4 col-lg-2" style="display:inline-block">
      <label for="seller" style="margin-bottom: 10px; margin-top: 5px">Seller :</label>
      <select name="seller" id="seller" class="form-control" style="color: var(--font-color); background-color: var(--color-card);">
        <option value="">All</option>
      </select>
    </div>
  </div>
  <div class="row m-2 pt-3 " style="max-width:100%; color: var(--font-color); background-color: var(--color-card);">
    <div class="col-sm-12 table-responsive">
      <table id="banks_data" class="display responsive table-hover" style="width:100%; color: var(--font-color); background-color: var(--color-card);">
        <thead>
          <tr>
  
<?php
$query = mysqli_query($dbcon, "SELECT DISTINCT(`country`) FROM `banks` WHERE `sold` = '0' ORDER BY country ASC");
	while($row = mysqli_fetch_assoc($query)){
	echo '<option value="'.$row['country'].'">'.$row['country'].'</option>';
	}
?>
</select></td><td><input class='filterinput form-control input-sm' name="bank_sitename" size='3'></td><td><select class='filterselect form-control input-sm' name="bank_seller"><option value="">ALL</option>
<?php
$query = mysqli_query($dbcon, "SELECT DISTINCT(`resseller`) FROM `banks` WHERE `sold` = '0' ORDER BY resseller ASC");
	while($row = mysqli_fetch_assoc($query)){
		 $qer = mysqli_query($dbcon, "SELECT DISTINCT(`id`) FROM resseller WHERE username='".$row['resseller']."' ORDER BY id ASC")or die(mysql_error());
		   while($rpw = mysqli_fetch_assoc($qer))
			 $SellerNick = "seller".$rpw["id"]."";
	echo '<option value="'.$SellerNick.'">'.$SellerNick.'</option>';
	}
?>
</select></td><td><button id='filterbutton'class="btn btn-primary btn-sm" disabled>Filter <span class="glyphicon glyphicon-filter"></span></button></td></tr></tbody></table></div>
</div>


<div class="row m-2 pt-3 " style="max-width:100%; color: var(--font-color); background-color: var(--color-card);">
<div class="col-sm-12 table-responsive">
<table id="account_data" class="display responsive table-hover" style="width:100%; color: var(--font-color); background-color: var(--color-card);">
<thead>
<tr>
      <th scope="col" >Country</th>
      <th scope="col">Bank Name</th>
      <th scope="col">Balance</th>
      <th scope="col">Available Information</th>
      <th scope="col">Seller</th>
      <th scope="col">Price</th>
      <th scope="col">Added on </th>
      <th scope="col">Buy</th>
    </tr>
</thead>
  <tbody>

 <?php
include("cr.php");
$q = mysqli_query($dbcon, "SELECT * FROM banks WHERE sold='0' ORDER BY RAND()")or die(mysqli_error());
 while($row = mysqli_fetch_assoc($q)){
	 
	 	 $countryfullname = $row['country'];
	  $code = array_search("$countryfullname", $countrycodes);
	 $countrycode = strtolower($code);
	    $qer = mysqli_query($dbcon, "SELECT * FROM resseller WHERE username='".$row['resseller']."'")or die(mysql_error());
		   while($rpw = mysqli_fetch_assoc($qer))
			 $SellerNick = "seller".$rpw["id"]."";
     echo "
 <tr>     
    <td id='bank_country'><i class='flag-icon flag-icon-$countrycode'></i>&nbsp;".htmlspecialchars($row['country'])." </td>
    <td id='bank_sitename'> ".htmlspecialchars($row['bankname'])." </td> 
    <td> ".htmlspecialchars($row['balance'])." </td> 
	<td> ".htmlspecialchars($row['infos'])." </td>
    <td id='bank_seller'> ".htmlspecialchars($SellerNick)."</td>
    <td> ".htmlspecialchars($row['price'])."</td>
	    <td> ".$row['date']."</td>";
    echo '
    <td>
	<span id="bank'.$row['id'].'" title="buy" type="bank"><a onclick="javascript:buythistool('.$row['id'].')" class="btn btn-primary btn-xs"><font color=white>Buy</font></a></span><center>
    </td>
            </tr>
     ';
 }

 ?>
<script type="text/javascript">
$('#filterbutton').click(function () {$("#table tbody tr").each(function() {var ck1 = $.trim( $(this).find("#bank_country").text().toLowerCase() );var ck2 = $.trim( $(this).find("#bank_sitename").text().toLowerCase() );var ck3 = $.trim( $(this).find("#bank_seller").text().toLowerCase() ); var val1 = $.trim( $('select[name="bank_country"]').val().toLowerCase() );var val2 = $.trim( $('input[name="bank_sitename"]').val().toLowerCase() );var val3 = $.trim( $('select[name="bank_seller"]').val().toLowerCase() ); if((ck1 != val1 && val1 != '' ) || ck2.indexOf(val2)==-1 || (ck3 != val3 && val3 != '' )){ $(this).hide();  }else{ $(this).show(); } });$('#filterbutton').prop('disabled', true);});$('.filterselect').change(function () {$('#filterbutton').prop('disabled', false);});$('.filterinput').keyup(function () {$('#filterbutton').prop('disabled', false);});
function buythistool(id){
  bootbox.confirm("Are you sure?", function(result) {
        if(result ==true){
      $.ajax({
     method:"GET",
     url:"buytool.php?id="+id+"&t=banks",
     dataType:"text",
     success:function(data){
         if(data.match(/<button/)){
		 $("#bank"+id).html(data).show();
         }else{
            bootbox.alert('<center><img src="files/img/balance.png"><h2><b>No enough balance !</b></h2><h4>Please refill your balance <a class="btn btn-primary btn-xs"  href="addBalance.html" onclick="window.open(this.href);return false;" >Add Balance <span class="glyphicon glyphicon-plus"></span></a></h4></center>')
         }
     },
   });
       ;}
  });
}

function openitem(order){
  $("#myModalLabel").text('Order #'+order);
  $('#myModal').modal('show');
  $.ajax({
    type:       'GET',
    url:        'showOrder'+order+'.html',
    success:    function(data)
    {
        $("#modelbody").html(data).show();
    }});

}

</script>

</div>
</body>
</html>

