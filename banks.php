
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


  <table id="bank_id" class="display">
    <thead>
        <tr>
            <th>balance 1</th>
            <th>buy/th>
        </tr>
    </thead>
    <tbody>
        <tr>
            
            <?php
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
include "includes/footer.php";?>
