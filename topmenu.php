<?php 
session_start();
?>
<style>
#mmenu, #mmenu ul {
margin: 0;
padding: 0;
list-style: none;
}
#mmenu {
width: 100%;
border: 1px solid #222;
background-color: #111;
background-image: -moz-linear-gradient(#444, #111); 
background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111)); 
background-image: -webkit-linear-gradient(#444, #111); 
background-image: -o-linear-gradient(#444, #111);
background-image: -ms-linear-gradient(#444, #111);
background-image: linear-gradient(#444, #111);
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
border-radius: 6px;
-moz-box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
-webkit-box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
}
#mmenu:before,
#mmenu:after {
content: "";
display: table;
}
#mmenu:after {
clear: both;
}
#mmenu {
zoom:1;
}
#mmenu li {
float: left;
border-right: 1px solid #222;
-moz-box-shadow: 1px 0 0 #444;
-webkit-box-shadow: 1px 0 0 #444;
box-shadow: 1px 0 0 #444;
position: relative;
}
#mmenu a {
float: left;
padding: 12px 30px;
color: #999;
text-transform: uppercase;
font: bold 12px Arial, Helvetica;
text-decoration: none;
text-shadow: 0 1px 0 #000;
}
#mmenu li:hover > a {
color: #fafafa;
}
*html #mmenu li a:hover { /* IE6 only */
color: #fafafa;
}
#mmenu ul {
margin: 20px 0 0 0;
_margin: 0; /*IE6 only*/
opacity: 0;
visibility: hidden;
position: absolute;
top: 38px;
left: 0;
z-index: 9999; 
background: #444; 
background: -moz-linear-gradient(#444, #111);
background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111));
background: -webkit-linear-gradient(#444, #111); 
background: -o-linear-gradient(#444, #111); 
background: -ms-linear-gradient(#444, #111); 
background: linear-gradient(#444, #111);
-moz-box-shadow: 0 -1px rgba(255,255,255,.3);
-webkit-box-shadow: 0 -1px 0 rgba(255,255,255,.3);
box-shadow: 0 -1px 0 rgba(255,255,255,.3); 
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
-webkit-transition: all .2s ease-in-out;
-moz-transition: all .2s ease-in-out;
-ms-transition: all .2s ease-in-out;
-o-transition: all .2s ease-in-out;
transition: all .2s ease-in-out; 
} 
#mmenu li:hover > ul {
opacity: 1;
visibility: visible;
margin: 0;
}
#mmenu ul ul {
top: 0;
left: 150px;
margin: 0 0 0 20px;
_margin: 0; /*IE6 only*/
-moz-box-shadow: -1px 0 0 rgba(255,255,255,.3);
-webkit-box-shadow: -1px 0 0 rgba(255,255,255,.3);
box-shadow: -1px 0 0 rgba(255,255,255,.3); 
}
#mmenu ul li {
float: none;
display: block;
border: 0;
_line-height: 0; /*IE6 only*/
-moz-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
-webkit-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
box-shadow: 0 1px 0 #111, 0 2px 0 #666;
}
#mmenu ul li:last-child { 
-moz-box-shadow: none;
-webkit-box-shadow: none;
box-shadow: none; 
}
#mmenu ul a { 
padding: 10px;
width: 130px;
_height: 10px; /*IE6 only*/
display: block;
white-space: nowrap;
float: none;
text-transform: none;
}
#mmenu ul a:hover {
background-color: #0186ba;
background-image: -moz-linear-gradient(#04acec, #0186ba); 
background-image: -webkit-gradient(linear, left top, left bottom, from(#04acec), to(#0186ba));
background-image: -webkit-linear-gradient(#04acec, #0186ba);
background-image: -o-linear-gradient(#04acec, #0186ba);
background-image: -ms-linear-gradient(#04acec, #0186ba);
background-image: linear-gradient(#04acec, #0186ba);
}
#mmenu ul li:first-child > a {
-moz-border-radius: 3px 3px 0 0;
-webkit-border-radius: 3px 3px 0 0;
border-radius: 3px 3px 0 0;
}
#mmenu ul li:first-child > a:after {
content: '';
position: absolute;
left: 40px;
top: -6px;
border-left: 6px solid transparent;
border-right: 6px solid transparent;
border-bottom: 6px solid #444;
}
#mmenu ul ul li:first-child a:after {
left: -6px;
margin-top: -6px;
border-left: 0; 
border-bottom: 6px solid transparent;
border-top: 6px solid transparent;
border-right: 6px solid #3b3b3b;
}
#mmenu ul li:first-child a:hover:after {
border-bottom-color: #04acec; 
}
#mmenu ul ul li:first-child a:hover:after {
border-right-color: #0299d3; 
border-bottom-color: transparent; 
}
#mmenu ul li:last-child > a {
-moz-border-radius: 0 0 3px 3px;
-webkit-border-radius: 0 0 3px 3px;
border-radius: 0 0 3px 3px;
}
</style>
<div id="mmenu">

<?php
if(isset($_SESSION["customerid"]))
{
?>

<li><a href="viewticketbilling.php">Ticket Booking Report</a></li>
<li><a href="viewcancel_booking.php">Cancellation Report</a></li>
<li>
	<input type="text" class="form-control" placeholder="Search for Movies" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;width:500px;background-color:white;" readonly  data-toggle="modal" data-target="#modal1">
</li>
<?php
}
else if(isset($_SESSION["theatreid"]))
{
?>
<li><a href="theatredashboard.php">Account</a></li>
<li><a href=" ######### ">Seat types</a>
	<ul>
	<li><a href="seattype.php">Add Seat types</a></li>
	<li><a href="viewseattype.php">View Seat types</a></li>
	</ul>
</li>

<li><a href="seat_setting.php">Seat Map</a></li>

<li><a href=" ######### ">Snacks</a>
	<ul>
	<li><a href="snacks.php">Add Snacks</a></li>
	<li><a href="viewsnacks.php">View Snacks</a></li>
	</ul>
</li>

<li><a href=" ######### ">Movie schedule</a>
	<ul>
	<li><a href="showlist.php">Add Show list</a></li>
	<li><a href="viewshowlist.php">View Show list</a></li>
	<li><a href="showtimings.php">Add Show time</a></li>
	<li><a href="viewshowtimings.php">View Show time</a></li>
	</ul>
</li>


<li><a href="viewfeedback.php">Feedbacks</a></li>

<li><a href=" ######### ">Report</a>
	<ul style="width:200px;">
	<li style="width:200px;"><a href="viewticketbilling.php" style="width:200px;">Billing Report</a></li>
	<li style="width:200px;"><a href="viewcancel_booking.php" style="width:200px;">Ticket cancellation Report</a></li>
	<li><a href="viewpaymentreport.php" style="background-color:yellow;width: 200px;">Payment Report</a></li>
	</ul>
</li>
<?php
}
else if(isset($_SESSION["adminid"]))
{
?>
		
<li><a  href="dashboard.php">Dashboard</a></li>
				
<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="admin.php" style="background-color:yellow">Add Admin</a></li>
          <li><a href="viewadmin.php" style="background-color:yellow">View Admin</a></li>
          <li><a href="location.php"style="background-color:yellow">Add Location</a></li>
          <li><a href="viewlocation.php" style="background-color:yellow">View Location</a></li>
		  
          <li><a href="tax_setting.php" style="background-color:yellow">Tax Settings</a></li>
		  
        </ul>
</li>

<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Theatre
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li style="width: 250px;"><a href="theatre.php"  style="background-color:yellow;width: 230px;">Add theatre</a></li>
          <li style="width: 250px;"><a href="viewtheatre.php?theatretype=Activated"  style="background-color:yellow;width: 230px;">View theatre (<?php
		  $sqlt = "SELECT * FROM theatre WHERE status='Active'";
		  $qsqlt = mysqli_query($con,$sqlt);
		  echo mysqli_num_rows($qsqlt)
		  ?>)</a></li>
          <li style="width: 250px;"><a href="viewtheatre.php?theatretype=Pending" style="background-color:yellow;width: 230px;">View Registered theatre(<?php
		  $sqlt = "SELECT * FROM theatre WHERE status='Pending'";
		  $qsqlt = mysqli_query($con,$sqlt);
		  echo mysqli_num_rows($qsqlt)
		  ?>)</a></li>
          <li style="width: 250px;"><a href="seattype.php"  style="background-color:yellow;width: 230px;">Add seattype</a></li>
          <li style="width: 250px;"><a href="viewseattype.php"  style="background-color:yellow;width: 230px;">View seattype</a></li>
        </ul>
</li>
		
		
<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Movie
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="movie.php" style="background-color:yellow">Add movie</a></li>
          <li><a href="viewmovie.php" style="background-color:yellow">View movie</a></li>
          <li><a href="showlist.php" style="background-color:yellow">Add showlist</a></li>
          <li><a href="viewshowlist.php" style="background-color:yellow">View showlist</a></li>
        </ul>
</li>

<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cast
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="cast.php" style="background-color:yellow">Add cast</a></li>
          <li><a href="viewcast.php" style="background-color:yellow">View cast</a></li>
          <li><a href="movierole.php" style="background-color:yellow">Add movierole</a></li>
          <li><a href="viewmovierole.php" style="background-color:yellow">View movierole</a></li>
        </ul>
</li>

<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Promote
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="offer.php" style="background-color:yellow;width:200px;">Add offercode</a></li>
          <li><a href="viewoffer.php" style="background-color:yellow;width:200px;">View offercode</a></li>
          <li><a href="promote.php" style="background-color:yellow;width:200px;">Promote with customers</a></li>
          </ul>
</li>


<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Payment
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="payment.php" style="background-color:yellow">Make payment</a></li>
          <li><a href="viewpaymentreport.php" style="background-color:yellow">Payment Report</a></li>
          </ul>
</li>

<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Report
        <span class="caret"></span></a>
        <ul class="dropdown-menu"> 
          <li><a href="viewcustomer.php" style="background-color:yellow;width: 200px;">View customer</a></li>
          <li><a href="viewfeedback.php?type=Movie" style="background-color:yellow;width: 200px;">Feedbacks on Movie</a></li>
          <li><a href="viewfeedback.php?type=Theatre" style="background-color:yellow;width: 200px;">Feedbacks on Theatre</a></li>
          <li><a href="viewticketbilling.php" style="background-color:yellow;width: 200px;">View billings</a></li>
		  <li><a href="viewcancel_booking.php" style="background-color:yellow;width: 200px;">View cancellations</a></li>
		  <li><a href="reportticketcommission.php" style="background-color:yellow;width: 200px;">Commission Report</a></li>		  
        </ul>
</li>

<?php
}
else
{
?>
<li><a href="#########">Contact Us at 08524 - 245112</a></li>
<li>
	<input type="text" class="form-control" placeholder="Search for Movies" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;width:500px;background-color:white;" readonly  data-toggle="modal" data-target="#modal1">
</li>
<?php
}
?>
<?php
/*
<li><a href=" ######### ">Categories</a>
	<ul>
	<li><a href=" ######### ">CSS</a></li>
	<li><a href=" ######### ">Graphic design</a></li>
	<li><a href=" ######### ">Development tools</a></li>
	<li><a href=" ######### ">Web design</a></li>
	</ul>
</li>

<li><a href=" ######### ">Work</a></li>
<li><a href=" ######### ">About</a></li>
<li><a href=" ######### ">Contact</a></li>
*/
?>
<?php
if(isset($_SESSION["customerid"]))
{
?>
  <li   class="nav navbar-nav navbar-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome <?php echo $rscustomerac[customername]; ?><span class="caret"></span></a>
	<ul class="dropdown-menu">
	  <li><a href="customerprofile.php">Profile</a></li>
	  <li><a href="customerchangepass.php">Change password</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
  </li>
<?php
}
else if(isset($_SESSION["theatreid"]))
{
?>
  <li   class="nav navbar-nav navbar-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome <?php echo $rstheatreac[theatrename]; ?><span class="caret"></span></a>
	<ul class="dropdown-menu">
	  <li><a href="theatreprofile.php">Profile</a></li>
	   <li><a href="theatrechangepassword.php">Change password</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
  </li>
 
<?php
}
else if(isset($_SESSION["adminid"]))
{
?>
  <li   class="nav navbar-nav navbar-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome <?php echo $rsadminac[adminname]; ?><span class="caret"></span></a>
	<ul class="dropdown-menu">
	  <li><a href="adminprofile.php">Profile</a></li>
	   <li><a href="adminchangepass.php">Change password</a></li>
	  <li><a href="logout.php">Logout</a></li>
	</ul>
  </li> 
  
<?php
}
else
{
?>
  <li  class="nav navbar-nav navbar-right"><a href="#"  data-toggle="modal" data-target="#myModal2"> Sign Up</a></li>
  <li class="nav navbar-nav navbar-right"><a href="#" data-toggle="modal" data-target="#myModal"> Login</a></li>
<?php
}
?>
</div>
<?php
include("search.php");
?>