<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM hall_booking where hall_bookingid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Hall Booking record deleted successfully...');</SCRIPT>";
	}
}
?>
<!-- services -->
<div class="services" id="services">
		<div class="container">
		<div class="heading">
			<h3 data-aos="zoom-in" >Hallbooing Details</h3>
		</div>
			<div class="w3-agileits-services-grids">
				<div data-aos="fade-down" class="col-md-12 agile-services-left">
					<div class="agile-services-left-grid">
						<div class="services-icon">
							<div class="col-md-12 services-icon-text">
								<p>
								<table  id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Hall-Id</th>
										<th>Customer-Id</th>
										<th>Booking-Date</th>
										<th>Booked-Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
										<?php
										$sql = "SELECT * FROM hall_booking ";
										$qsql = mysqli_query($con,$sql);
										while($rs = mysqli_fetch_array($qsql))
										{
											echo "<tr>";
												echo "<td>$rs[hall_id]</td>";
												echo "<td>$rs[customer_id]</td>";
												echo "<td>$rs[booking_date]</td>";
												echo "<td>$rs[booked_date]</td>";
												echo "<td>$rs[status]</td>";
												echo "<td><a href='hallbooking.php?editid=$rs[hall_bookingid]'> Edit </a> | <a href='viewhallbooking.php?delid=$rs[hall_bookingid]' onclick='return confirmdelete()'>Delete</a> </td>";
											echo "</tr>";
										}
										?>
								</tbody>
								</table>
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
</div>
<!-- //services -->
<?php
include("footer.php");
?>
<script>
function confirmdelete()
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

<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#datatable').DataTable();
} );
</script>
