<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql="DELETE FROM feedback where feedbackid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con)==1)
	{
		echo "<script>alert('feedback record deleted successfully...');</script>";
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
						<?php
						if($_GET[type] == "Movie")
						{
						?>
						<th>Movie Name</th>
						<?php
						}
						?>
						<?php
						if($_GET[type] == "Theatre")
						{
						?>
						<th>Theatre Name</th>
						<?php
						}
						?>				
						<th>Feedback date</th>	
						<th>Feedback</th>	
						<th>Ratings</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql ="SELECT * FROM  feedback LEFT JOIN customer on feedback.customerid = customer.customerid LEFT JOIN movie on feedback.movieid = movie.movieid LEFT JOIN theatre on feedback.theatreid = theatre.theatreid where feedback.feedbackid!='0' ";
				if($_GET["type"] == "Movie")
				{
					$sql = $sql . " AND feedback.movieid !='0'";
				}
				if($_GET["type"] == "Theatre")
				{
					$sql = $sql . " AND feedback.theatreid !='0'";
				}
				if(isset($_SESSION[theatreid]))
				{
					$sql = $sql . " AND feedback.theatreid = '$_SESSION[theatreid]'";
				}
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					echo "<tr>";
					echo "<td>$rs[customername]</td>";						
						if($_GET["type"] == "Movie")
						{
					echo "<td>$rs[moviename]</td>";						
						}
						if($_GET["type"] == "Theatre")
						{
					echo "<td>$rs[theatrename]</td>";
						}
					echo "
						<td>" . date("d-M-Y",strtotime($rs[feedbackdate])) . "</td>
						<td>$rs[feedback]</td>
						<td>$rs[ratings]</td>
						<td><a class='btn btn-primary' href='feedback.php?editid=$rs[feedbackid]'>Edit</a> |<a class='btn btn-primary' href='viewfeedback.php?delid=$rs[feedbackid]' onclick='return confirmtodelete()'>Delete</a></td>
					
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