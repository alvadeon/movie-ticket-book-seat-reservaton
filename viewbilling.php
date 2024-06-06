<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql="DELETE FROM billing where billingid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('billing record deleted successfully...');</script>";
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
						<th>Customer Name</th>
						<th>Total cost</th>
						<th>Date</th>
						<th>Payment type</th>
						<th>Card no</th>
						<th>CVV no</th>
						<th>Expire date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql ="SELECT * FROM billing LEFT JOIN customer on billing.customerid=customer.customerid";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					echo "<tr>
						<td>$rs[customername]</td>
						<td>$rs[totalcost]</td>
						<td>$rs[payment_date]</td>
						<td>$rs[paymenttype]</td>
						<td>$rs[cardno]</td>
						<td>$rs[cvvno]</td>
						<td>$rs[expdate]</td>
						<td>$rs[status]</td>
						<td><a class='btn-btn-primary' href='billing.php?editid=$rs[billingid]'>Edit</a>|<a class='btn-btn-primary' href='viewbilling.php?delid=$rs[billingid]' onclick='return confirmtodelete()'>Delete</a></td>
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