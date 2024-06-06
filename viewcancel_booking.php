<?php
include("header.php");
?>
	<!-- about -->
	<div id="about" class="about">
		<div class="container">
			<div class="col-md-12 agileits_about_grid_right">

<center><h2>View Cancellation Report</h2></centeR>

			<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Bill No.</th>
						<th>Customer Name</th>
						<th>Booking detail</th>
						<th>Total cost</th>
						<th>Cancellation detail</th>
						<th>Account detail</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql ="SELECT * FROM billing LEFT JOIN customer on billing.customerid=customer.customerid where billing.status='Cancelled'";
				if(isset($_SESSION["customerid"]))
				{
					$sql = $sql . " and billing.customerid='$_SESSION[customerid]'";
				}
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					
$sqlbookingrs1 ="SELECT * FROM ticket_booking where billingid='$rs[0]' order by seatrow ";
$qsqlticketbookingrs1 = mysqli_query($con,$sqlbookingrs1);
$rsshowtimedetail1 = mysqli_fetch_array($qsqlticketbookingrs1);

$sqlshowtime = "select * From showtimings LEFT JOIN showlist ON showtimings.showlistid =showlist.showlistid left join movie on movie.movieid=showlist.movieid LEFT JOIN theatre ON theatre.theatreid=showlist.theatreid WHERE showlist.status='Active' AND showtimings.showtimingid='$rsshowtimedetail1[showtimingid]'";

$qsqlshowtime = mysqli_query($con,$sqlshowtime);
$rsshowtimedetail = mysqli_fetch_array($qsqlshowtime);

					echo "<tr>
						<td>$rs[billingid]</td>
						<td>$rs[customername]</td>
		
		<td>";
echo "<b>Booking Date:</b> " . date("d-M-Y",strtotime($rs[payment_date])) . "<br>"; 
echo "<b>Theatre:</b> " . $rsshowtimedetail[theatrename] . "<br>"; 
echo "<b>Movie name:</b> " . $rsshowtimedetail[moviename] . "<br>"; 
echo "<b>Show Date:</b> " . date("d-M-Y",strtotime($rsshowtimedetail[datetime])) . "<br>"; 
echo "<b>Show Time:</b> " . date("h:i A",strtotime($rsshowtimedetail[datetime])) . "<br>";
	$amt =  $rs[totalcost] - $rs[discamt];			
	echo "</td>";
	
	echo "<td>";
		
	echo "<b style='color:green;'>Booking cost- ₹$amt</b> <hr><b>Payment type:</b> $rs[paymenttype]</td><td>";
	
$sqlcancel_booking = "SELECT * FROM cancel_booking where billingid='$rs[0]'";	
$qsqlcancel_booking = mysqli_query($con,$sqlcancel_booking);
$rscancel_booking = mysqli_fetch_array($qsqlcancel_booking);
	
	echo "<b>Cancellation date:</b> " . date("d-M-Y",strtotime($rscancel_booking[date])) ."<br>";
	echo "<b>Cancellation Charge:</b> ₹".$rscancel_booking[cancellationamt] ."<br>";
	echo "<b>Refundable Amount:</b> ₹".$rscancel_booking[cancellationamt] ."<br>";
	echo "</td>
	<td>";
		
	echo "";
	echo "<b>A/c Holder :</b> ".$rscancel_booking[acholder]."<br>";
	echo "<b>Bank name :</b> ".$rscancel_booking[bankname]."<br>";
	echo "<b>A/c Number :</b> ".$rscancel_booking[acnumber]."<br>";
	echo "<b>IFSC Code :</b> ".$rscancel_booking[ifsccode]."<br>";
	
	echo "</td>";
	
	
	
						echo "</tr>";
				}
				?>
				</tbody>
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