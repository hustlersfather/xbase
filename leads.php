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
</style> <div class="d-flex flex-row-reverse mt-0">
<div class="p-2">
<label id="switch" class="switch">
<input type="checkbox" onchange="toggleTheme()" id="slider">
<span class="slider round">
</span>
</label>
</div>
</div>
<div class="alert alert-info text-left" role="alert" style="margin: 15px;">
<ul>
<li>We Have Fresh E-mails Lists for Diffrents Countries ( You Can Use it for Spam ). </li>
<li>Our E-mails Lists Guarante for you Good results because most of them are from Shops and Big Sites .</li>
<li>Combo use for cracking (Brute forcing attack) not use for login to email.</li>
<li>There is <b> 0 </b> Available.</li>
</ul>
</div>
<input type=hidden id="type" name="type" value="5" />
<div class="row m-3 pt-1" style="color: var(--font-color);">
<div class="col-xs-6 col-sm-4 col-lg-2" style="display:inline-block">
<label for="infos" style="margin-bottom: 10px; margin-top: 5px">Description:</label>
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
<table id="table" class="display responsive table-hover" style="width:100%; color: var(--font-color); background-color: var(--color-card);">
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-notify modal-success" role="document">
<div class="modal-content">
<div class="modal-header">
<p class="heading" id="myModalHeader"></p>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true" class="white-text">&times;</span>
</button>
</div>
<div class="modal-body" id="modelbody">
</div>
<div class="modal-footer justify-content-center">
<a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Close</a>
</div>
</div>
</div>
</div>

<div class="modal fade" id="modalConfirmBuy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-sm modal-notify modal-info" role="document">

<div class="modal-content text-center">

<div class="modal-header d-flex justify-content-center">
<p class="heading">Are you sure?</p>
</div>

<div class="modal-body">
<i class='fas fa-shopping-cart fa-4x animated rotateIn'></i>
</div>

<div class="modal-footer flex-center">
<a onClick='confirmbye()' class="btn btn-outline-info waves-effect" data-dismiss="modal">Yes</a>
<a type="button" class="btn btn-info" data-dismiss="modal">No</a>
</div>
</div>

</div>
</div>


<div class="modal fade top" id="modalCoupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
<div class="modal-dialog modal-frame modal-top modal-notify modal-danger" role="document">

<div class="modal-content">

<div class="modal-body">
<div class="row d-flex justify-content-center align-items-center">
<img src="layout/images/balance.png">
<span class="pt-3 mx-4" style="font-size: 14 px"><b>No enough balance !</b> Please refill your balance</span>
<a type="button" href="addBalance" onclick="window.open(this.href);return false;" class="btn btn-danger">Add Balance
<i class="fas fa-book ml-1 white-text"></i>
</a>
<a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No, thanks</a>
</div>
</div>
</div>

</div>
</div>

<script>

        $(document).ready(function(){
            var webID;
            load_data();

            function load_data(myarray) {
                $('#lead_data').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "responsive": true,
                    "scrollX": true,
                    "order": [],
                    "lengthMenu": [[10, 25, 50, 100, 500, 10000], [10, 25, 50, 100, 500, "All"]],
                    "columnDefs": [
                        {
                            "targets": [ 0 ],
                            "visible": false
                        }
                    ],

                    "ajax":{
                        url:"divPage6.html",
                        type:"POST",
                        data:{
                            data_filter:myarray,
                            type:document.getElementById('type').value,
                             draw : 'draw',
                             row : 'start',
                             rowperpage : 'length',
                             columnIndex : 'order',
                             columnName : 'columns',
                             columnSortOrder : 'order',
                             searchValue : 'search'
                              }
                    },
                 "columns": [
                                { "data": 0 },
                                { "data": 1 },
                                { "data": 2 },
                                { "data": 3 },
                                { "data": 4 },
                                { "data": 5 },
                                { "data": 6 },
                                { "data": 7 },
                                { "data": 8 },
                                { "data": 9 }
                            ],

                    "pageLength": 500
                });
            }

            $(document).on('change', '.form-control', function(){
                $('#lead_data').DataTable().destroy();
                 var country = $('#country').val();
                var description = $('#infos').val();
                 var seller1 = $('#seller').val();
                $idseller = seller1.split("Seller");
                 var seller= $idseller[1];
                 var myarray = {};

                 myarray[0] = country;
                 myarray[1] = description;
                 myarray[2] = seller;

              if(country != '' || description != '' || seller != '')
                {

                   load_data(myarray);
                }
                else
                {
                    load_data();
                }
                });


        });

       function buythistool(id){
         $('#modalConfirmBuy').modal('show');
         webID= id;
                        }

        function confirmbye(id){
              id= webID;
            $.ajax({
                        method:"GET",
                        url:"buytool.php?id="+id+"&t=leads",
                        dataType:"text",
                        success:function(data){
                                if(data.match("buy")){
                                let lastid = data.split("buy,")[1];
                                $("#lead"+id).html(`<button onclick=openitem(${lastid}) class="btn btn-success btn-sm">Order ${'#'+lastid}</button>`).show();

                            }
                            else{
                                if(data.match("deleted")){

                                $("#lead"+id).html('Already sold / Deleted').show();

                                  }else{
                                   $('#modalCoupon').modal('show');
                                }


                            }
                        },
                    });
        }
    function openitem(order){


        $.ajax({
        type:       'GET',
        url:        'showOrder'+order,
        success:    function(data)
        {
        $("#myModalHeader").text('Order #'+order);
        $("#modelbody").append(data);
        $('#myModal').modal();


        }});

        }

    </script>
<script>(function(){var js = "window['__CF$cv$params']={r:'79c9e8b08871b8d8',m:'u12.r2kR.bSeN8qGHfh4KXngk_qGNCfyFFo9_HyFaUs-1676924070-0-AeR71Mez/8uAaLUB244+YrYlD134ASHeGDx9hT9j8Nk6VQLjiU9ht0OFU/IeJKFXJKHEgsTbUCFi4NhMmKv5w5CuaXghNBNQq57TOvwgfPnAbX0VBkPHQzbTOI3AS9wWJA==',s:[0xe876e4eeb4,0x8777c0601c],u:'/cdn-cgi/challenge-platform/h/g'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='/cdn-cgi/challenge-platform/h/g/scripts/alpha/invisible.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.nonce = '';_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body>
</html>
<?php
include "includes/footer.php";  ?>
</html>

