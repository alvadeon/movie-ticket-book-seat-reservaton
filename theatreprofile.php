<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
	$imgnamelogo = rand(). $_FILES["theatrelogo"]["name"];
	move_uploaded_file($_FILES["theatrelogo"]["tmp_name"],"imgtheatrelogo/".$imgnamelogo);
	$imagenamepic=rand().$_FILES["theatreimg"]["name"];
	move_uploaded_file($_FILES["theatreimg"]["tmp_name"],"imgtheatrelogo/".$imagenamepic);
	
	//Update statement starts here
	$sql ="UPDATE theatre SET locationid='$_POST[locationid]',theatrename='$_POST[theatrename]'";
	if($_FILES["theatrelogo"]["name"] != "")
	{
	$sql = $sql ." ,theatrelogo='$imgnamelogo'";
	}
	$sql = $sql . ",theatredescription='$_POST[theatredescription]'";
	if($_FILES["theatreimg"]["name"] != "")
	{
	$sql = $sql . ",theatreimg='$imagenamepic'";
	}
	$sql = $sql . ",address='$_POST[address]',maplocation='$_POST[maplocation]',emailid='$_POST[theatreemailid1]',mobileno='$_POST[mobileno]',thacholder='$_POST[thacholder]',thbankname='$_POST[thbankname]',thbankac='$_POST[thbankac]',thifsc='$_POST[thifsc]' WHERE theatreid='$_SESSION[theatreid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Theatre profile updated successfully...');</SCRIPT>";
	}
	//Update statement ends here
}
//This code is to select data while updating
	$sqledit = "SELECT * FROM theatre WHERE theatreid='$_SESSION[theatreid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
//This code is to select data while updating ends here
?>
	<!-- features -->
	<div id="features" class="features">
		<div class="container"> 
			<div class="w3layouts_skills_grids w3layouts-features-agileinfo">

				<div class="col-md-9 w3features-left">				

					<div id="register" class="login-form "> 
						<div class="agile-row">
							<h5>theatre profile</h5> 
							<div class="login-agileits-top"> 	
	<form  action="" method="post" enctype="multipart/form-data" name="profile" onsubmit="return validateform()" > 
								<p>location name  </p>
<select name="locationid" class="form-control" value='<?php echo $rsedit[locationid]; ?>' >
<option value=''>Select</option>
<?php
$sqlbilling="SELECT * FROM location where status='active'";
$qsqlbilling=mysqli_query($con,$sqlbilling);
echo mysqli_error($con);
while($rsbilling=mysqli_fetch_array($qsqlbilling))
{
	if($rsbilling[locationid] == $rsedit[locationid])
	{
	echo "<option value='$rsbilling[locationid]' selected>$rsbilling[location]</option>";
	}
	else
	{
	echo "<option value='$rsbilling[locationid]'>$rsbilling[location]</option>";
	}
}
?>

</select>
<em id="idlocationid" style="color:red;" class="ms-error"></em>

		<p>theatre name</p>
	<input type="text" class="name" name="theatrename" value='<?php echo $rsedit[theatrename]; ?>'/> 
<em id="idtheatrename" style="color:red;" class="ms-error"></em>

		
		<p>theatre logo</P>
		<input type="file" class="name" name="theatrelogo" />
<?php
if($rsedit[theatrelogo] == "")
{
	echo "<input type='hidden' name='theatrelogo1' id='theatrelogo1' value=''>";
}
else
{
	if(file_exists("imgtheatrelogo/$rsedit[theatrelogo]"))
	{
		echo "<img src='imgtheatrelogo/$rsedit[theatrelogo]' style='height:100px;'>";
		echo "<input type='hidden' name='theatrelogo1' id='theatrelogo1' value='imgtheatrelogo/$rsedit[theatrelogo]'>";
	}
	else
	{
		echo "<input type='hidden' name='theatrelogo1' id='theatrelogo1' value=''>";
	}
}
?><em id="ididtheatrelogo" style="color:red;" class="ms-error"></em>
		
		<p>theatre description</P>
		<textarea name="theatredescription" id="theatredescription" class="form-control" ><?php echo $rsedit[theatredescription]; ?></textarea>
<em id="idtheatredescription1" style="color:red;" class="ms-error"></em>
		
		<p>theatre image</P>
		<input type="file" class="form-control" name="theatreimg" value='<?php echo $rsedit[theatreimg]; ?>' /><?php
if($rsedit[theatreimg] == "")
{
	echo "<input type='hidden' name='theatreimg1' id='theatrelogo1' value=''>";
}
else
{
	if(file_exists("imgtheatrelogo/$rsedit[theatreimg]"))
	{
		echo "<img src='imgtheatrelogo/$rsedit[theatreimg]' style='height:100px;'>";
		echo "<input type='hidden' name='theatreimg1' id='theatreimg1' value='imgtheatrelogo/$rsedit[theatreimg]'>";
	}
	else
	{
		echo "<input type='hidden' name='theatreimg1' id='theatreimg1' value=''>";
	}
}
?>
<em id="ididtheatreimg" style="color:red;" class="ms-error"></em>

		
		<p>Address</P> 
		<textarea name="address" class="form-control" ><?php echo $rsedit[address]; ?></textarea>
<em id="idaddress" style="color:red;" class="ms-error"></em>
		<p>map location</P>
		<textarea name="maplocation" class="form-control" ><?php echo $rsedit[maplocation]; ?></textarea></em>
		<p>Email ID</P>
		<input type="text" class="name" name="theatreemailid1" value='<?php echo $rsedit[emailid]; ?>'/> 
<em id="idtheatreemailid1" style="color:red;" class="ms-error"></em>
		
		<p>Mobile number</P>
		<input type="text" class="name"  maxlength="10" name="mobileno" value='<?php echo $rsedit[mobileno]; ?>'/> 
<em id="idmobilenum" style="color:red;" class="ms-error"></em>

		<p>Account holder</P>
		<input type="text" class="name" name="thacholder"  value='<?php echo $rsedit[thacholder]; ?>'/> 
<em id="idthacholder1" style="color:red;" class="ms-error"></em>
		
		<p>Bank Name</P>
		<input type="text" class="name" name="thbankname" value='<?php echo $rsedit[thbankname]; ?>'/> 
<em id="idthbankname1" style="color:red;" class="ms-error"></em>
		
		<p>Account number</P>
		<input type="text" class="name" maxlength="14" name="thbankac" value='<?php echo $rsedit[thbankac]; ?>'/> 
<em id="idthbankac1" style="color:red;" class="ms-error"></em>
		
		<p>IFSC Code</P>
		<input type="text" class="name" name="thifsc" value='<?php echo $rsedit[thifsc]; ?>'/> 
<em id="idthifsc1" style="color:red;" class="ms-error"></em>

									<input type="submit" name="submit" value="Update profile">
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
	
	 var expemail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	 var num = /^[0-9]*$/;
	 var alpha = /^[a-zA-Z\s]+$/;
	 var phone = /^[789]\d{9}$/;
	var code=/^[A-Z|a-z]{4}[0][\d]{6}$/;
	var i =0;
	if(document.profile.locationid.value == "" )
	{
		document.getElementById("idlocationid").innerHTML="Kindly select the location..";		
		i=1;
	}
	if(document.profile.theatrename.value == "" )
	{
		document.getElementById("idtheatrename").innerHTML="Kindly enter theatre name..";		
		i=1;
	}
	if(!document.profile.theatrename.value.match(alpha))
	{
		document.getElementById("idtheatrename").innerHTML="Theatre name should contain alphabets..";		
		i=1;
	}
	
	if(document.profile.theatredescription.value == "" )
	{
		document.getElementById("idtheatredescription1").innerHTML="Kindly enter theatre description..";		
		i=1;
	}
	
	if(document.profile.theatrelogo.value == "" && document.profile.theatrelogo1.value == "")
	{
		document.getElementById("ididtheatrelogo").innerHTML="Kindly upload theatre image.";		
		i=1;
	}
	if(document.profile.theatreimg.value == "" && document.profile.theatreimg1.value == "")
	{
		document.getElementById("ididtheatreimg").innerHTML="Kindly upload theatre image.";		
		i=1;
	}
	if(document.profile.address.value == "" )
	{
		document.getElementById("idaddress").innerHTML="Address should not be empty..";		
		i=1;
	}
	if(!document.profile.theatreemailid1.value.match(expemail))
	{
		document.getElementById("idtheatreemailid1").innerHTML="Email ID is not valid....";
		i=1;
	}
     if(document.profile.theatreemailid1.value=="")
	 {
		 document.getElementById("idtheatreemailid1").innerHTML="Email ID Should not be empty...."
		 i=1;
	 }
	 if(document.profile.mobileno.value == "" )
	{
		document.getElementById("idmobilenum").innerHTML="Mobile number should not be empty.";		
		i=1;
	} 
	if(!document.profile.mobileno.value.match(phone))
	{
		document.getElementById("idmobilenum").innerHTML="Mobile number is not valid.";		
		i=1;
		
	}

	if(document.profile.thacholder.value == "" )
	{
		document.getElementById("idthacholder1").innerHTML="Kindly enter the name of account holder..";		
		i=1;
	}
	
	if(document.profile.thacholder.value != "" && !document.profile.thacholder.value.match(alpha))
	{
		document.getElementById("idthacholder1").innerHTML="account holder name should contain only alphabets..";		
		i=1;
	}

	if(document.profile.thbankname.value == "" )
	{
		document.getElementById("idthbankname1").innerHTML="Kindly enter the name of bank..";		
		i=1;
	}
	if(document.profile.thbankname.value != "" && !document.profile.thbankname.value.match(alpha))
	{
		document.getElementById("idthbankname1").innerHTML="bank name should contain only alphabets..";		
		i=1;
	}
	if(document.profile.thbankac.value == "" )
	{
		document.getElementById("idthbankac1").innerHTML="Kindly enter the account number..";		
		i=1;
	}
	if(!document.profile.thbankac.value.match(num))
	{
		document.getElementById("idthbankac1").innerHTML=" account number should contain only numeric values..";		
		i=1;
	}
	if(document.profile.thifsc.value == "" )
	{
		document.getElementById("idthifsc1").innerHTML="Kindly enter the ifsc code..";		
		i=1;
	}
	if(!document.profile.thifsc.value.match(code))
	{
		document.getElementById("idthifsc1").innerHTML="please enter the valid IFSC code..!..";		
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