<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql="DELETE FROM movie where movieid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('movie record deleted successfully...');</script>";
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
						<th>Banner</th>
						<th>Movie Name</th>
						<th>Languages</th>
						<th>Movie Type</th>
						<th>Movie summary</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql ="SELECT * FROM  movie";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
if(file_exists("imagebanner/$rs[bannerimg]"))
	{
		$picimg= "imagebanner/$rs[bannerimg]";
	}
	else
	{
		$picimg = "images/No_Image_Available.jpg";
	}
	if(file_exists("trailermovie/$rs[movietrailer]"))
	{
		$logoimg = "trailermovie/$rs[movietrailer]";
	}
	else
	{
		$logoimg = "images/No_Image_Available.jpg";
	}
					echo "<tr>
						<td><img src='$picimg' width='150' height='100'></td>
						<td>$rs[moviename]</td>
						<td>$rs[language]</td>
						<td>$rs[movietype]</td>
						<td>$rs[moviesummary]</td>
						<td>$rs[status]</td>
						<td><a class='btn btn-primary' href='movie.php?editid=$rs[movieid]'>Edit</a>|
						<a class='btn btn-primary' href='viewmovie.php?delid=$rs[movieid]' onclick='return confirmtodelete()'>Delete</a></td>
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