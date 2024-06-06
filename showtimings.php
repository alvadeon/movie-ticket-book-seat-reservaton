<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
	if(isset($_GET[editid])) //if block to update the record
	{
		//Update statement starts here
		$sql ="UPDATE showtimings SET showlistid='$_POST[showlistid]',datetime='$_POST[date] $_POST[time]',status='$_POST[status]' WHERE showtimingid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('showtimings record updated successfully...');</SCRIPT>";
		}
		//Update statement ends here
	}//if block to update the record ends here
	else //else block to insert the record
	{ 
	//Insert statement starts here
	$sql = "INSERT INTO  showtimings(showlistid,datetime,status) VALUES('$_POST[showlistid]','$_POST[date] $_POST[time]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	  {
		echo "<SCRIPT>alert('Show timing record inserted successfully...');</SCRIPT>";
	  }
	}
}
//This code is to select data while updating
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM showtimings WHERE showtimingid='$_GET[editid]'";
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
							<h5>showtimings form</h5> 
							<div class="login-agileits-top"> 	
								<form  action="" method="post" name="frmshowtimings" onsubmit="return validateform()"> 
								<p>shows</p>
<?php
$sqlshowlist="SELECT * FROM showlist LEFT JOIN movie ON showlist.movieid=movie.movieid LEFT JOIN theatre ON theatre.theatreid=showlist.theatreid where showlist.status='active'"; 
if(isset($_SESSION[theatreid]))
{
	$sqlshowlist = $sqlshowlist . " and showlist.theatreid='$_SESSION[theatreid]'";
}
//echo $sqlshowlist;
$qsqlshowlist=mysqli_query($con,$sqlshowlist);								
?>
<select name="showlistid" class="form-control" value='<?php echo $rsedit[showlistid]; ?>' >
<option value=''>Select</option>
<?php
echo mysqli_error($con);
while($rsshowlist=mysqli_fetch_array($qsqlshowlist))
{
	if($rsshowlist[showlistid] == $rsedit[showlistid])
	{
		echo "<option value='$rsshowlist[showlistid]' selected>$rsshowlist[moviename] ($rsshowlist[startdate]-$rsshowlist[enddate]) $rsshowlist[theatrename] ($rsshowlist[screenid])</option>";
	}
	else
	{
		echo "<option value='$rsshowlist[showlistid]'>$rsshowlist[moviename] ($rsshowlist[startdate]-$rsshowlist[enddate]) $rsshowlist[theatrename] ($rsshowlist[screenid])</option>";
	}
}
?>
</select>
<em id="idshowlistid" style="color:red;" class="ms-error"></em>
<p>date</P>
	<input type="date" class="form-control" name="date"  min="2022-05-01" max="2022-12-31"  value="<?php echo date("Y-m-d",strtotime($rsedit[datetime])); ?>"/> 
	<em id="iddate" style="color:red;" class="ms-error"></em>	
<p>time</P>
	<input type="time" class="form-control" name="time"  value="<?php echo date("H:i:s",strtotime($rsedit[datetime])); ?>" />
	<em id="idtime" style="color:red;" class="ms-error"></em>	

<p>Status </p>
<select name="status" class="form-control">
	<option value="">Select</option>
	<?php
		$arr  = array("Active","Inactive");
		foreach($arr as $val)
		{
			if($val == $rsedit[status])
			{
				echo "<option value='$val' selected>$val</option>";
			}
			else
			{
				echo "<option value='$val'>$val</option>";
			}
		}
	?>
</select>  
<em id="idstatus" style="color:red;" class="ms-error"></em>

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
<script>
function validateform()
{
	var spans = $('.ms-error');
	spans.text(''); // clear the textvar
	i =0;
	if(document.frmshowtimings.showlistid.value == "" )
	{
		document.getElementById("idshowlistid").innerHTML="Kindly select showlist info..";		
		i=1;
	}
	if(document.frmshowtimings.date.value == "" )
	{
		document.getElementById("iddate").innerHTML="Kindly select date..";		
		i=1;
	}
	if(document.frmshowtimings.time.value == "" )
	{
		document.getElementById("idtime").innerHTML="Kindly enter the time..";		
		i=1;
	}
	if(document.frmshowtimings.status.value == "" )
	{
		document.getElementById("idstatus").innerHTML="Kindly enter the status..";		
		i=1;
	}
	
	if(i == 0)
	{
		return true;
	}
	if(i = 1)
	{
		return false;
	}
}

</script>