<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
	$imgitem= rand(). $_FILES["itemimg"]["name"];
	move_uploaded_file($_FILES["itemimg"]["tmp_name"],"imageitem/".$imgitem);
	if(isset($_GET[editid])) //if block to update the record
	{
		//Update statement starts here
		$sql ="UPDATE snacks SET theatreid='$_POST[theatreid]',itemname='$_POST[itemname]',itemdescription='$_POST[itemdescription]',itemcost='$_POST[itemcost]',itemimg='$imgitem',status='$_POST[status]' WHERE snacksid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('snacks record updated successfully...');</SCRIPT>";
		}
		//Update statement ends here
	}//if block to update the record ends here
	else //else block to insert the record
	{
		//Insert statement starts here
	$sql = "INSERT INTO  snacks(theatreid,itemname,itemdescription,itemcost,itemimg,status) VALUES('$_POST[theatreid]','$_POST[itemname]','$_POST[itemdescription]','$_POST[itemcost]','$imgitem','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	 {
		echo "<SCRIPT>alert('snacks record inserted successfully...');</SCRIPT>";
	 }
	}
}
//This code is to select data while updating
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM snacks WHERE snacksid='$_GET[editid]'";
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
							<h5>Snacks form</h5> 
							<div class="login-agileits-top"> 	
								<form  action="" method="post" enctype="multipart/form-data" name="snacksfrm" onsubmit="return validateform()"> 

<?php
if(isset($_SESSION["theatreid"]))
{
?>
	<input type="hidden" name="theatreid" value="<?php echo $_SESSION["theatreid"]; ?>" >
<?php
}
else
{
?>
	<p>theatre name </p>
	<select name="theatreid" class="form-control"  value='<?php echo $rsedit[theatreid]; ?>' >
	<option value=''>select</option>
	<?php
	$sqltheatre="SELECT * FROM theatre where status='active'";
	$qsqltheatre=mysqli_query($con,$sqltheatre);
	echo mysqli_error($con);
	while($rstheatre= mysqli_fetch_array($qsqltheatre))
	{
		if($rstheatre[theatreid] == $rsedit[theatreid])
		{
			echo "<option value='$rstheatre[theatreid]' selected>$rstheatre[theatrename]</option>";
		}
		else
		{
			echo "<option value='$rstheatre[theatreid]'>$rstheatre[theatrename]</option>";
		}
	}
	?>
	</select>
	
<?php
}
?>

<p>item name</p>      
										<input type="text" class="name" name="itemname"  value='<?php echo $rsedit[itemname]; ?>' /> 
										<em id="iditemname" style="color:red;" class="ms-error"></em>
										<p>item description</P>
										<input type="text" class="name" name="itemdescription"  value='<?php echo $rsedit[itemdescription]; ?>' /> 
										<em id="iditemdescription" style="color:red;" class="ms-error"></em>
									<p>item cost</P>
										<input type="text" class="name" name="itemcost" value='<?php echo $rsedit[itemcost]; ?>'   /> 	
										<em id="iditemcost" style="color:red;" class="ms-error"></em>	
										<p>item image</P>
										<input type="file" class="form-control" name="itemimg" value='<?php echo $rsedit[itemimg]; ?>'   /> 
                                     <em id="iditemimg" style="color:red;" class="ms-error"></em>										
									<p>status</p>
									<select name="status" class="form-control">
										<option value=''>Select</option>
										<option value='Active'>Active</option>
										<option value='Inactive'>Inactive</option>
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
	var alpha = /^[a-zA-Z\s]+$/;
	var price=/^([0-9]{0,2}((.)[0-9]{0,2}))$/;
	i =0;
	if(document.snacksfrm.itemname.value == "" )
	{
		document.getElementById("iditemname").innerHTML="Kindly enter the item name..";		
		i=1;
	}
	if(document.snacksfrm.itemdescription.value == "" )
	{
		document.getElementById("iditemdescription").innerHTML="Kindly enter the item description..";		
		i=1;
	}
	if(document.snacksfrm.itemdescription.value != "" && !document.snacksfrm.itemdescription.value.match(alpha))
	{
		document.getElementById("iditemdescription").innerHTML="item description should contain alphabets..";		
		i=1;
	}
	if(document.snacksfrm.itemcost.value == "" )
	{
		document.getElementById("iditemcost").innerHTML="Kindly enter the item cost..";		
		i=1;
	}
	if( document.snacksfrm.itemcost.value !="" &&!document.snacksfrm.itemcost.value.match(price))
	{
		document.getElementById("iditemcost").innerHTML="cost should contain numeric values";		
		i=1;
	}
	if(document.snacksfrm.itemimg.value == "" )
	{
		document.getElementById("iditemimg").innerHTML="Kindly upload the item image..";		
		i=1;
	}
	if(document.snacksfrm.status.value == "" )
	{
		document.getElementById("idstatus").innerHTML="Kindly enter status...";
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