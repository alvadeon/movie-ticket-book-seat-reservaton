<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql="DELETE FROM movierole where movieroleid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('movie role record deleted successfully...');</script>";
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
						<th>Movie Name</th>
						<th>Cast</th>
						<th>Role</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql ="SELECT * FROM  movierole LEFT JOIN movie on movierole.movieid=movie.movieid LEFT JOIN cast on movierole.castid=cast.castid";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{

					echo "<tr>
						<td>$rs[moviename]</td>
                        <td>$rs[name]</td>
						<td>$rs[role]</td>
						<td>$rs[status]</td>
						<td><a class='btn btn-primary' href='movierole.php?editid=$rs[movieroleid]'>Edit</a> |
						<a class='btn btn-primary' href='viewmovierole.php?delid=$rs[movieroleid]' onclick='return confirmtodelete()'>Delete</a></td>
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