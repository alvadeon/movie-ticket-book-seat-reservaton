<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
if(isset($_GET[editid])) //if block to update the record
	{
		//Update statement starts here
		$sql ="UPDATE ticket_booking SET billingid='$_POST[billingid]',customerid='$_POST[customerid]',theatreid='$_POST[theatreid]',seatid='$_POST[seatid]',date='$_POST[date]',time='$_POST[time]',cost='$_POST[cost]',status='$_POST[status]' WHERE ticket_bookid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('ticket_booking record updated successfully...');</SCRIPT>";
		}
		//Update statement ends here
	}//if block to update the record ends here
	else //else block to insert the record
	{
		//Insert statement starts here	
	$sql = "INSERT INTO ticket_booking(billingid,customerid,theatreid,seatid,date,time,cost,status) VALUES('$_POST[billingid]','$_POST[customerid]','$_POST[theatreid]','$_POST[seatid]','$_POST[date]','$_POST[time]','$_POST[cost]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	  {
		echo "<SCRIPT>alert('ticket booking record inserted successfully...');</SCRIPT>";
	  }
	}
}
//This code is to select data while updating
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM ticket_booking WHERE ticket_bookid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
//This code is to select data while updating ends here
?>
	<!-- features -->
	<div id="features" class="features">
		<div class="container"> 
			<div class="w3layouts_skills_grids w3layouts-features-agileinfo">

				<div class="col-md-9 w3features-left">				

					<div id="register" class="login-form "> 
						<div class="agile-row">
							<h5>ticket booking form</h5> 
							<div class="login-agileits-top"> 	
								<form  action="" method="post"> 
								<p>billing Date</p>
<select name="billingid" class="form-control" value='<?php echo $rsedit[billingid]; ?>' >
<option value=''>Select</option>
<?php
$sqlbilling="SELECT * FROM billing where status='active'";
$qsqlbilling=mysqli_query($con,$sqlbilling);
echo mysqli_error($con);
while($rsbilling= mysqli_fetch_array($qsqlbilling))
{
	echo "<option value='$rsbilling[billingid]'>$rsbilling[date]</option>";
}
?>
</select>

									<p>customer name </p>
<select name="customerid" class="form-control" value='<?php echo $rsedit[customerid]; ?>' >
<option value=''>Select</option>
<?php
$sqlcustomer="SELECT * FROM customer where status='active'";
$qsqlcustomer=mysqli_query($con,$sqlcustomer);
echo mysqli_error($con);
while($rscustomer= mysqli_fetch_array($qsqlcustomer))
{
	echo "<option value='$rscustomer[customerid]'>$rscustomer[customername]</option>";
}
?>
</select>
									<p>theatre name </p>
<select name="theatreid" class="form-control" value='<?php echo $rsedit[theatreid]; ?>'>
<option value=''>Select</option>
<?php
$sqltheatre="SELECT * FROM theatre where status='active'";
$qsqltheatre=mysqli_query($con,$sqltheatre);
echo mysqli_error($con);
while($rstheatre=mysqli_fetch_array($qsqltheatre))
{
	echo "<option value='$rstheatre[theatreid]'>$rstheatre[theatrename]</option>";
}
?>
</select>

									<p>seat Id </p>
<select name="seatid" class="form-control" value='<?php echo $rsedit[seatid]; ?>' >
<option value=''>Select</option>
<?php
$sqlseat_setting="SELECT * FROM seat_setting where status='active'";
$qsqlseat_setting=mysqli_query($con,$sqlseat_setting);
echo mysqli_error($con);
while($rsseat_setting=mysqli_fetch_array($qsqlseat_setting))
{
	echo "<option value='$rsseat_setting[seatid]'>$rsseat_setting[seattypeid]</option>";
}
?>
</select>
									<p>date</p>
									<input type="date" class="form-control" name="date" value='<?php echo $rsedit[date]; ?>'/> 
									<p>time</p>
									<input type="time" class="form-control" name="time" value='<?php echo $rsedit[time]; ?>'/> 
									<p>cost</p>
									<input type="text" class="name" name="cost" value='<?php echo $rsedit[cost]; ?>'/> 
									<p>Status </p>
									<select name="status" class="form-control">
										<option value=''>Select</option>
										<option value='Active'>Active</option>
										<option value='Inactive'>Inactive</option>
									</select>  
									<input type="submit" name="submit" value="Submit">
								</form> 	
							</div>  
						</div>  
					</div>  
					
					
				</div> 
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //features --> 
	<?php
include("footer.php");
?>