<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
	$imgnamelogo = rand(). $_FILES["theatrelogo"]["name"];
	move_uploaded_file($_FILES["theatrelogo"]["tmp_name"],"imgtheatrelogo/".$imgnamelogo);
	$imagenamepic=rand().$_FILES["theatreimg"]["name"];
	move_uploaded_file($_FILES["theatreimg"]["tmp_name"],"imgtheatrelogo/".$imagenamepic);
	
	
	if(isset($_GET[editid])) //if block to update the record
	{
		//Update statement starts here
		$sql ="UPDATE theatre SET locationid='$_POST[locationid]',theatrename='$_POST[theatrename]',theatrelogo='$imgnamelogo',theatredescription='$_POST[theatredescription]',theatreimg='$imagenamepic',address='$_POST[address]',maplocation='$_POST[maplocation]',emailid='$_POST[emailid]',password='$_POST[password]',mobileno='$_POST[mobileno]',status='Pending' WHERE theatreid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('theatre record updated successfully...');</SCRIPT>";
		}
		//Update statement ends here
	}//if block to update the record ends here
	else //else block to insert the record
	{

		//Insert statement starts here
		$pwd = md5($_POST[password]);
		$sql = "INSERT INTO theatre(locationid,theatrename,theatrelogo,theatredescription,theatreimg,address,maplocation,emailid,password,mobileno,status) VALUES('$_POST[locationid]','$_POST[theatrename]','$imgnamelogo','$_POST[theatredescription]','$imagenamepic','$_POST[address]','$_POST[maplocation]','$_POST[emailid]','$pwd','$_POST[mobileno]','Pending')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('Registration request sent successfully.. Please wait for the confirmation...');</SCRIPT>";
			echo "<script>window.location='index.php';</script>";
		}
	}
}
//This code is to select data while updating
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM theatre WHERE theatreid='$_GET[editid]'";
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
							<h5>Theatre Registration Panel</h5> 
							<div class="login-agileits-top"> 	
	<form  action="" method="post" enctype="multipart/form-data"  name="theatreform" onsubmit="return validateform()"> 
								<p>location name  </p>
<select name="locationid" class="form-control" value='<?php echo $rsedit[locationid]; ?>' >
<option value=''>Select</option>
<?php
$sqlbilling="SELECT * FROM location where status='active'";
$qsqlbilling=mysqli_query($con,$sqlbilling);
echo mysqli_error($con);
while($rsbilling=mysqli_fetch_array($qsqlbilling))
{
	echo "<option value='$rsbilling[locationid]'>$rsbilling[location]</option>";
}
?>
</select>
<em id="idlocationid" style="color:red;" class="ms-error"></em>

		<p>theatre name</p>
	<input type="text" class="name" name="theatrename" value='<?php echo $rsedit[theatrename]; ?>'/> 
<em id="idtheatrename" style="color:red;" class="ms-error"></em>

		<p>Address</P> 
		<textarea name="address" class="form-control" ><?php echo $rsedit[address]; ?></textarea>
		<em id="idaddress" style="color:red;" class="ms-error"></em>


		<p>Email Id</P>
		<input type="text" class="name" name="emailid" value='<?php echo $rsedit[emailid]; ?>'/> 
		<em id="idemailid1" style="color:red;" class="ms-error"></em>

		<p>Password</P>
		<input type="password" class="password" name="password" value='<?php echo $rsedit[password]; ?>'/> 
		<em id="idpassword1" style="color:red;" class="ms-error"></em>
		
		<p>Confirm password</P>
		<input type="password" class="password" name="cpassword" value='<?php echo $rsedit[password]; ?>'/> 
		<em id="idcpassword" style="color:red;" class="ms-error"></em>

		<p>Mobile number</P>
		<input type="text" class="name" maxlength="10" name="mobileno" value='<?php echo $rsedit[mobileno]; ?>'/> 
<em id="idmobileno" style="color:red;" class="ms-error"></em>
		

	<input type="submit" name="submit" value="Send Registration Request">
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
	 var expemail =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	 var alpha = /^[a-zA-Z\s]+$/;
	 var phone = /^[789]\d{9}$/;
	  var num = /^[0-9]*$/;
	var i =0;
	if(document.theatreform.locationid.value == "" )
	{
		document.getElementById("idlocationid").innerHTML="Kindly select the location..";		
		i=1;
	}
	if(document.theatreform.theatrename.value == "" )
	{
		document.getElementById("idtheatrename").innerHTML="Kindly enter theatre name..";		
		i=1;
	}
	if(document.theatreform.theatrename.value != "" && !document.theatreform.theatrename.value.match(alpha))
	{
		document.getElementById("idtheatrename").innerHTML="Theatre name should contain alphabets..";		
		i=1;
	}
	if(document.theatreform.address.value == "")
	{
		document.getElementById("idaddress").innerHTML="Address should not be empty..";		
		i=1;
	}
	if(!document.theatreform.emailid.value.match(expemail))
	{
		document.getElementById("idemailid1").innerHTML="Email ID is not valid..";		
		i=1;	
	}
	if(document.theatreform.emailid.value == "" )
	{
		document.getElementById("idemailid1").innerHTML="Email ID should not be empty..";
		i=1;		
	}
	if(document.theatreform.password.value < 6 )
	{
		document.getElementById("idpassword1").innerHTML="Password should contain more than 6 characters....";		
		i=1;		
	}
	if(document.theatreform.password.value  == "" )
	{
		document.getElementById("idpassword1").innerHTML="Password should not be empty..";		
		i=1;
	} //idemailid idpassword
	
	if(document.theatreform.password.value != document.theatreform.cpassword.value   )
	{
		document.getElementById("idcpassword").innerHTML="Password and confirm password not matching...";		
		i=1;
	}
	if(document.theatreform.cpassword.value == "" )
	{
		document.getElementById("idcpassword").innerHTML="Confirm Password should not be empty..";		
		i=1;
	}

	if(document.theatreform.mobileno.value == "" )
	{
		document.getElementById("idmobileno").innerHTML="Mobile number should not be empty.";		
		i=1;
	}

	if(!document.theatreform.mobileno.value.match(phone) )
	{
		document.getElementById("idmobileno").innerHTML="Entered Mobile number is not valid...";		
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