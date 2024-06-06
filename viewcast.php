<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql="DELETE FROM cast where castid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('cast record deleted successfully...');</script>";
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
						<th>Image</th>
						<th>Name</th>
						<th>Facebook URL</th>
						<th>Twitter URL</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql ="SELECT * FROM  cast";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
if(file_exists("castimg/$rs[image]"))
	{
		$logoimg = "castimg/$rs[image]";
	}
	else
	{
		$logoimg = "images/No_Image_Available.jpg";
	}
	
					echo "<tr>
						<td><img src='$logoimg' width='150' height='100'></td>
						<td>$rs[name]</td>
						<td>$rs[facebookURL]</td>
						<td>$rs[twitterURL]</td>
						<td>$rs[status]</td>
						<td><a class='btn btn-primary' href='cast.php?editid=$rs[castid]'>Edit</a> |
						<a class='btn btn-primary' href='viewcast.php?delid=$rs[castid]' onclick='return confirmtodelete()'>Delete</a></td>
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