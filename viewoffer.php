<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql="DELETE FROM offer where offerid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if((mysqli_affected_rows($con))==1)
	{
		echo "<script>alert('offer record deleted successfully...');</script>";
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
						<th>Offer code</th>
						<th>start date</th>
						<th>End date</th>
						<th>Offer Amount</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql ="SELECT * FROM  offer";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					echo "<tr>
						<td>$rs[offercode]</td>
						<td>$rs[startdate]</td>
						<td>$rs[enddate]</td>
						<td>$rs[offeramt]</td>
						<td>$rs[status]</td>
						<td><a href='offer.php?editid=$rs[offerid]'>Edit</a> |<a href='viewoffer.php?delid=$rs[offerid]' onclick='return confirmtodelete()'>Delete</a></td>
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