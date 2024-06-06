<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
	if(isset($_GET[editid])) //if block to update the record
	{
		//Update statement starts here
		$sql ="UPDATE  tax SET taxtype='$_POST[taxtype]',taxamt='$_POST[taxamt]',status='$_POST[status]' WHERE taxid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('tax record updated successfully...');</SCRIPT>";
		}
		//Update statement ends here
	}//if block to update the record ends here
	else //else block to insert the record
	{
	//Insert statement starts here
    $sql = "INSERT INTO tax(taxtype,taxamt,status) VALUES ('$_POST[taxtype]','$_POST[taxamt]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	   {
		 echo "<SCRIPT>alert('tax record inserted successfully...');</SCRIPT>";
	   }
	}
}
//This code is to select data while updating
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM tax WHERE taxid='$_GET[editid]'";
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
							<h5>tax_setting form</h5> 
							<div class="login-agileits-top"> 	
								<form  action="" method="post" name="taxfrm" onsubmit="return validateform()"> 
								<p>Tax type</p>
									<input type="text" class="name" name="taxtype" value='<?php echo $rsedit[taxtype]; ?>' /> 
									<em id="idtaxtype" style="color:red;" class="ms-error"></em>
									<p>Tax amount</p>
									<input type="text" class="name" name="taxamt" value='<?php echo $rsedit[taxamt]; ?>' /> 
									<em id="idtaxamt" style="color:red;" class="ms-error"></em>
									<p>Status </p>
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
	spans.text(''); // clear the text
    var cost= /^(?!0+$)\d{0,5}(.\d{1,2})?$/;
	 var alpha = /^[a-zA-Z\s]+$/;
	var i =0;
	if(document.taxfrm.taxtype.value == "" )
	{
		document.getElementById("idtaxtype").innerHTML="Kindly enter the type of tax.";		
		i=1;
	}
	if(document.taxfrm.taxtype.value !="" && !document.taxfrm.taxtype.value.match(alpha))
	{
		document.getElementById("idtaxtype").innerHTML="tax type should contain only  alphabets..";		
		i=1;
	}
	if(document.taxfrm.taxamt.value == "" )
	{
		document.getElementById("idtaxamt").innerHTML="Kindly enter the  tax amount ..";		
		i=1;
	}
	if(!document.taxfrm.taxamt.value.match(cost))
	{
		document.getElementById("idtaxamt").innerHTML="tax amount should contain only nummeric values..";		
		i=1;
	}
   if(document.taxfrm.status.value == "" )
	{
		document.getElementById("idstatus").innerHTML="Kindly select the status..";		
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
