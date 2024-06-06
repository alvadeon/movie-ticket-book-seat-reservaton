 <?php
include("header.php");
if(!isset($_SESSION[theatreid]))
{
	echo "<SCRIPT>window.location='index.php';</SCRIPT>";
}
?>
	<!-- services -->
<script defer src="js/fontawesomenew.js"></script>	
<div class="services jarallax">
		<div class="container"> 
			<div class="w3ls_banner_bottom_grids">
		
		
<table  class="table table-striped table-bordered" cellspacing="0" width="100%">
	<tr style="background-color:white;">
		<th>Number of bookings</th><td><?php 
$sqlticket_booking = "SELECT * FROM ticket_booking LEFT JOIN showtimings oN ticket_booking.showtimingid=showtimings.showtimingid LEFT JOIN showlist ON showlist.showlistid=showtimings.showlistid WHERE showlist.theatreid='$_SESSION[theatreid]'";
$qsqlticket_booking = mysqli_query($con,$sqlticket_booking);
echo mysqli_num_rows($qsqlticket_booking);
		?></td>
	</tr>
	<tr style="background-color:white;">
		<th>Total Amount collection</th><td><?php 
$sqlticket_booking = "SELECT SUM(ticket_booking.cost) FROM ticket_booking LEFT JOIN showtimings oN ticket_booking.showtimingid=showtimings.showtimingid LEFT JOIN showlist ON showlist.showlistid=showtimings.showlistid WHERE showlist.theatreid='$_SESSION[theatreid]'";
$qsqlticket_booking = mysqli_query($con,$sqlticket_booking);
$rsticket_booking = mysqli_fetch_array($qsqlticket_booking);
$sqlfoodorder = "SELECT SUM(foodorder.cost) FROM foodorder LEFT JOIN snacks ON foodorder.snacksid=snacks.snacksid WHERE snacks.theatreid='$_SESSION[theatreid]'";
$qsqlfoodorder = mysqli_query($con,$sqlfoodorder);
$rsfoodorder= mysqli_fetch_array($qsqlfoodorder);
echo $rsticket_booking[0] + $rsfoodorder[0];
		?></td>
	</tr>
	<tr style="background-color:white;">
		<th>Number of cancellations</th><td><?php 
$sqlcancel_booking = "SELECT count(cancel_booking.cancellationamt) FROM ticket_booking LEFT JOIN showtimings oN ticket_booking.showtimingid=showtimings.showtimingid LEFT JOIN showlist ON showlist.showlistid=showtimings.showlistid LEFT JOIN cancel_booking ON cancel_booking.billingid=ticket_booking.billingid WHERE showlist.theatreid='$_SESSION[theatreid]'";
$qsqlcancel_booking = mysqli_query($con,$sqlcancel_booking);
$rscancel_booking = mysqli_fetch_array($qsqlcancel_booking);
echo $rscancel_booking[0];
		?></td>
	</tr>
	<tr style="background-color:white;">
		<th>Total cancellation charges</th><td><?php 
$sqlcancel_booking = "SELECT SUM(cancel_booking.cancellationamt) FROM ticket_booking LEFT JOIN showtimings oN ticket_booking.showtimingid=showtimings.showtimingid LEFT JOIN showlist ON showlist.showlistid=showtimings.showlistid LEFT JOIN cancel_booking ON cancel_booking.billingid=ticket_booking.billingid WHERE showlist.theatreid='$_SESSION[theatreid]'";
$qsqlcancel_booking = mysqli_query($con,$sqlcancel_booking);
$rscancel_booking = mysqli_fetch_array($qsqlcancel_booking);
echo $rscancel_booking[0];
		?></td>
	</tr>
</table>
		
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //services -->
<?php
include("footer.php");
?>