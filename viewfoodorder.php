<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql="DELETE FROM foodorder where orderid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('foodorder record deleted successfully...');</script>";
	}
}	
?>
	<!-- about -->
	<div id="about" class="about">
		<div class="container">
			<div class="col-md-12 agileits_about_grid_right">

			<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Customer name</th>
						<th>Snacks name</th>
						<th>Date of Booking</th>
						<th>Cost</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql ="SELECT * FROM  foodorder LEFT JOIN customer on foodorder.customerid = customer.customerid LEFT JOIN ticket_booking on foodorder.ticket_bookid= ticket_booking.ticket_bookid LEFT JOIN snacks on foodorder.snacksid=snacks.snacksid"; 
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					echo "<tr>
						<td>$rs[customername]</td>
						<td>$rs[itemname]</td>
						<td>$rs[date]</td>
						<td>$rs[cost]</td>
						<td>$rs[status]</td>
						<td><a class='btn btn-primary' href='foodorder.php?editid=$rs[orderid]'>Edit</a> |<a class='btn btn-primary' href='viewfoodorder.php?delid=$rs[orderid]' onclick='return confirmtodelete()'>Delete</a></td>
						</tr>";
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