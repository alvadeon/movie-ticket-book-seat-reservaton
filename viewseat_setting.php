<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql="DELETE FROM seat_setting where seatid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1);
	{
		echo "<script>alert('seat setting record deleted successfully...');</script>";
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
					   <th>Theatre Name</th>
						<th>Screen No</th>
						<th>Seattype name</th>
						<th>Seat Number</th>
						<th>Seat row</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql ="SELECT * FROM  seat_setting LEFT JOIN theatre on seat_setting.theatreid=theatre.theatreid LEFT JOIN seattype on seat_setting.seattypeid =seattype.seattypeid";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					echo "<tr>
						<td>$rs[theatrename]</td>
						<td>$rs[screenno]</td>
						<td>$rs[seattype]</td>
						<td>$rs[seatno]</td>
						<td>$rs[seatrow]</td>
						<td>$rs[status]</td>
						<td><a href='seat_setting.php?editid=$rs[seatid]'>Edit</a> |<a href='viewseat_setting.php?delid=$rs[seatid]' onclick='return confirmtodelete()'>Delete</a></td>
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