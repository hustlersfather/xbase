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






</div>
<div class="row m-2 pt-3 " style="max-width:100%; color: var(--font-color); background-color: var(--color-card);">
<div class="col-sm-12 table-responsive">
<table id="lead_data" class="display responsive table-hover" style="width:100%; color: var(--font-color); background-color: var(--color-card);">
<thead>
<tr>
<th data-priority="1"></th>
<th class="all">ID</th>
<th data-priority="3">Country</th>
<th data-priority="6">Description</th>
<th data-priority="7">Email N</th>
<th data-priority="8">Seller</th>
<th data-priority="2">Proof</th>
<th data-priority="9">Price</th>
<th data-priority="10">Added on </th>
<th class="all">Buy</th>
</tr>
</thead>
</table>
</div>
</div>

</div>
</body>
<?php
include "includes/footer.php";
</html>

