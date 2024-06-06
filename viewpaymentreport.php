<?php
include("header.php");
$sqlticket_bookingpayment= "SELECT sum(ticket_booking.cost) FROM ticket_booking LEFT JOIN billing on ticket_booking.billingid=billing.billingid LEFT JOIN showtimings ON showtimings.showtimingid=ticket_booking.showtimingid LEFT JOIN showlist ON showlist.showlistid=showtimings.showlistid WHERE ticket_booking.ticket_bookid!='0' AND ticket_booking.status='Active' ";
if(isset($_SESSION[theatreid]))
{
	$sqlticket_bookingpayment =$sqlticket_bookingpayment . "   AND showlist.theatreid='$_SESSION[theatreid]' ";
}
$sqlticket_bookingpayment =$sqlticket_bookingpayment . " and billing.status='Active'";
$qsqlticket_bookingpayment = mysqli_query($con,$sqlticket_bookingpayment);
$rsticket_bookingpayment = mysqli_fetch_array($qsqlticket_bookingpayment);
$ticketbookingamt = $rsticket_bookingpayment[0];

$sqlfoodorder= "SELECT sum(foodorder.cost*foodorder.qty) FROM foodorder LEFT JOIN snacks ON foodorder.snacksid=snacks.snacksid WHERE foodorder.orderid!= '0'   AND foodorder.status='Active' ";
if(isset($_SESSION[theatreid]))
{
	$sqlfoodorder =$sqlfoodorder . "   AND snacks.theatreid='$_SESSION[theatreid]' ";
}
$qsqlfoodorder = mysqli_query($con,$sqlfoodorder);
$rsqsqlfoodorder = mysqli_fetch_array($qsqlfoodorder);
$foodorderamt = $rsqsqlfoodorder[0];

$sqlcancel_booking= "SELECT  SUM(cancel_booking.cancellationamt) FROM billing M LEFT JOIN  ticket_booking C 
     ON C.ticket_bookid = (SELECT MIN(ticket_bookid) FROM ticket_booking WHERE billingid = M.billingid) LEFT JOIN cancel_booking ON C.billingid=M.billingid left join showtimings on  C.showtimingid=showtimings.showtimingid LEFT JOIN showlist ON showlist.showlistid=showtimings.showlistid  WHERE M.status='Cancelled' GROUP BY M.billingid LIMIT 1";
if(isset($_SESSION[theatreid]))
{
	$sqlcancel_booking =$sqlcancel_booking . "   AND showlist.theatreid='$_SESSION[theatreid]' ";
}
//echo $sqlcancel_booking;
$qsqlcancel_booking = mysqli_query($con,$sqlcancel_booking);
$rscancel_booking = mysqli_fetch_array($qsqlcancel_booking);
$cancelamt = $rscancel_booking[0];

$sqlpayment= "SELECT SUM(paid_amt) FROM payment WHERE payment.payment_id!='0' ";
if(isset($_SESSION[theatreid]))
{
$sqlpayment  = $sqlpayment . " AND theatreid='$_SESSION[theatreid]'";
}
$qsqlpayment = mysqli_query($con,$sqlpayment);
$rspayment = mysqli_fetch_array($qsqlpayment);
$lastpaymentamt = $rspayment[0];

$totamt=($ticketbookingamt + $foodorderamt + $cancelamt)-$lastpaymentamt;
?>
	<!-- about -->
	<div id="about" class="about">
		<div class="container">
			<div class="col-md-12 agileits_about_grid_right">
			
			<table class="table table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Total Ticket booking Amount</th>
						<th>₹<?php echo $ticketbookingamt; ?></th>
					</tr>
					<tr>
						<th>Total Food Order Amount</th>
						<th>₹<?php echo $foodorderamt; ?></th>
					</tr>
					<tr>
						<th>Total cancellation charges</th>
						<th>₹<?php echo $cancelamt; ?></th>
					</tr>
					<tr style="background-color:grey;color:white;">
						<th>Total</th>
						<th>₹<?php echo $ticketbookingamt + $foodorderamt + $cancelamt; ?></th>
					</tr>
					
					<tr style="background-color:grey;color:white;">
						<th>Paid Amount</th>
						<th>₹<?php echo $lastpaymentamt; ?></th>
					</tr>
					
					<tr style="background-color:grey;color:white;">
						<th>Balacne Amount</th>
						<th>₹<?php echo $totamt; ?></th>
					</tr>
					
				</thead>
			</table>
		<hr>	

			<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Theatre Name</th>
						<th>Paid date</th>
						<th>Paid Amount</th>
						<th>Transaction detail</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$totamtpaid=0;
				$sql ="SELECT * FROM  payment LEFT JOIN theatre ON payment.theatreid = theatre.theatreid";
				if(isset($_SESSION[theatreid]))
				{
					$sql = $sql . " where theatre.theatreid='$_SESSION[theatreid]'";
				}
				$qsql = mysqli_query($con ,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					echo "<tr>
						<td>$rs[theatrename]</td>
						<td>$rs[paid_date]</td>
						<td>₹$rs[paid_amt]</td>
						<td>$rs[transaction_detail]</td>
						</tr>";
						$totamtpaid = $totamtpaid + $rs[paid_amt];
				}
				?>
				</tbody>
				<tfoot>
					<tr>
						<th></th>
						<th>Total Paid amount</th>
						<th>₹<?php echo $totamtpaid; ?></th>
						<th></th>
					</tr>
				</tfoot>
			</table>
			
			</div>
			<div class="clearfix"> </div>
		</div> 
	</div>
	
<?php
include("footer.php");
?>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#datatable').DataTable();
} );

function confirmtodelete()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{ 
       return true;
	}
	else
	{
	 return false;
	}
}
</script>