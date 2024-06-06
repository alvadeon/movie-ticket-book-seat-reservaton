<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
	$imgnamelogo = rand(). $_FILES["theatrelogo"]["name"];
	move_uploaded_file($_FILES["theatrelogo"]["tmp_name"],"imgtheatrelogo/".$imgnamelogo);
	$imagenamepic=rand().$_FILES["theatreimg"]["name"];
	move_uploaded_file($_FILES["theatreimg"]["tmp_name"],"imgtheatrelogo/".$imagenamepic);
		
	$pwd =md5($_POST[password]);
	if(isset($_GET[editid])) //if block to update the record
	{
		//Update statement starts here
		$sql ="UPDATE theatre SET locationid='$_POST[locationid]',theatrename='$_POST[theatrename]'";
		if($_FILES["theatrelogo"]["name"] != "")
		{
			$sql = $sql . ",theatrelogo='$imgnamelogo'";
		}
		$sql = $sql . ",theatredescription='$_POST[theatredescription]'";
		if($_FILES["theatreimg"]["name"] != "")
		{
			$sql = $sql . ",theatreimg='$imagenamepic' ";
		}
		$sql = $sql .",address='$_POST[address]',maplocation='$_POST[maplocation]',emailid='$_POST[emailid]',";
		if($_POST[password] != "")
		{
		$sql = $sql . "password='$pwd',";
		}
		$sql = $sql . "mobileno='$_POST[mobileno]',status='$_POST[status]' WHERE theatreid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('theatre record updated successfully...');</SCRIPT>";
			include("sendmail.php");
		$subject = "MovieTime - New Theatre Registration details";
		$toaddress=$_POST[emailid];
		$name=$_POST[theatrename];
		$message  = "<b>Theatre Registration done successfully </b><br> Login credentials are here:<br><br>";
		$message  = $message ."<b>Theatre Name:  </b> $_POST[theatrename]<br>";
		$message  = $message. "<b>Login ID:  </b> $_POST[emailid]<br>";
		$message  = $message ."<b>Password:  </b> $_POST[password]<br><hr>";
		sendmail($toaddress,$subject,$message,$name);
		}
		//Update statement ends here
	}//if block to update the record ends here
	else //else block to insert the record
	{
		//Insert statement starts here
		$sql = "INSERT INTO theatre(locationid,theatrename,theatrelogo,theatredescription,theatreimg,address,maplocation,emailid,password,mobileno,status) VALUES('$_POST[locationid]','$_POST[theatrename]','$imgnamelogo','$_POST[theatredescription]','$imagenamepic','$_POST[address]','$_POST[maplocation]','$_POST[emailid]','$pwd','$_POST[mobileno]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
		echo "<SCRIPT>alert('theatre record inserted successfully...');</SCRIPT>";
		include("sendmail.php");
		$subject = "MovieTime - New Theatre Registration details";
		$toaddress=$_POST[emailid];
		$name=$_POST[theatrename];
		$message  = "<b>Theatre Registration done successfully </b><br> Login credentials are here:<br><br>";
		$message  = $message ."<b>Theatre Name:  </b> $_POST[theatrename]<br>";
		$message  = $message. "<b>Login ID:  </b> $_POST[emailid]<br>";
		$message  = $message ."<b>Password:  </b> $_POST[password]<br><hr>";
		sendmail($toaddress,$subject,$message,$name);
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
							<h5>theatre form</h5> 
							<div class="login-agileits-top"> 	
	<form  action="" method="post" enctype="multipart/form-data" name="theatreform" onsubmit="return validateform()" > 
	<input type='hidden' name='editid' value='<?php 
	if(isset($_GET[editid]))
	{
		echo $_GET[editid]; 
	}
	else
	{
		echo "0";
	}
	?>' >
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

		
		<p>theatre description</P>
		<textarea name="theatredescription" class="form-control" ><?php echo $rsedit[theatredescription]; ?></textarea>
         <em id="idtheatredescription" style="color:red;" class="ms-error"></em>
		
		<p>theatre image</P>
		<input type="file" class="form-control" name="theatreimg" value='<?php echo $rsedit[theatreimg]; ?>' /> 
       <em id="idtheatreimg" style="color:red;" class="ms-error"></em>
		
		<p>Address</P> 
		<textarea name="address" class="form-control" ><?php echo $rsedit[address]; ?></textarea>
       <em id="idaddress" style="color:red;" class="ms-error"></em>
		<p>map location</P>
		<textarea name="maplocation" class="form-control" ><?php echo $rsedit[maplocation]; ?></textarea>
		<em id="idmaplocation" style="color:red;" class="ms-error"></em>
		<p>Email ID</p>
	    <input type="text" class="name" name="emailid" value='<?php echo $rsedit[emailid]; ?>' />
		<em id="ididemailid" style="color:red;" class="ms-error"></em>
		
			<p>password</P>
			<input type="password" class="password" name="password" /> 
			<em id="ididpassword" style="color:red;" class="ms-error"></em>
			
			<p>Confirm password</P>
			<input type="password" class="password" name="cpassword" /> 
			<em id="idcpassword" style="color:red;" class="ms-error"></em>

		
		<p>Mobile number</P>
		<input type="text" class="name" maxlength="10" name="mobileno" value='<?php echo $rsedit[mobileno]; ?>'/> 
        <em id="idmobileno" style="color:red;" class="ms-error"></em>
		
		<p>Status </p>
	<select name="status" class="form-control">
		<option value=''>Select</option>
		<?php
		$arr = array("Active","Inactive","Pending");
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
	spans.text(''); // clear the text
	 var expemail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var alpha = /^[a-zA-Z\s]+$/;
	var num = /^[0-9]*$/;
	var i =0;
	if(document.theatreform.locationid.value == "" )
	{
		document.getElementById("idlocationid").innerHTML="Kindly select the location..";		
		i=1;
	}
	
	if(!document.theatreform.theatrename.value.match(alpha))
	{
		document.getElementById("idtheatrename").innerHTML="Theatre name should contain alphabets..";		
		i=1;
	}
    if(document.theatreform.theatrename.value == "" )
	{
		document.getElementById("idtheatrename").innerHTML="Kindly enter theatre name..";		
		i=1;
	}
    if(document.theatreform.theatredescription.value == "" )
	{
		document.getElementById("idtheatredescription").innerHTML="Kindly enter theatre description..";		
		i=1;
	}
	if(document.theatreform.theatredescription.value !="" && document.theatreform.theatredescription.value.match(num))
	{
		document.getElementById("idtheatredescription").innerHTML="description should be in alphabets..";		
		i=1;
	}
	if(document.theatreform.theatreimg.value == ""  && document.theatreform.editid.value  == "0")
	{
		document.getElementById("idtheatreimg").innerHTML="Kindly upload theatre image.";		
		i=1;
	}
	if(document.theatreform.address.value == "" )
	{
		document.getElementById("idaddress").innerHTML="Address should not be empty..";		
		i=1;
	}
	if(document.theatreform.maplocation.value == "" )
	{
		document.getElementById("idmaplocation").innerHTML="please upload map..";		
		i=1;
	}
    if(!document.theatreform.emailid.value.match(expemail))
	{
		document.getElementById("ididemailid").innerHTML="please enter the valid emailid.";		
		i=1;
	}
	
	if(document.theatreform.emailid.value=="")
	{
		document.getElementById("ididemailid").innerHTML="email id should not be empty..";
		i=1;
	}
    if(document.theatreform.password.value  == "" && document.theatreform.editid.value   == "0")
	{
		document.getElementById("ididpassword").innerHTML="Password should not be empty..";		
		i=1;
	}
	
	if(document.theatreform.password.value < 6  && document.theatreform.editid.value   == "0")
	{
		document.getElementById("ididpassword").innerHTML="Password should contain more than 6 characters....";		
		i=1;		
	}
	if(document.theatreform.password.value != document.theatreform.cpassword.value   && document.theatreform.editid.value  == "0" )
	{
		document.getElementById("idcpassword").innerHTML="Password and confirm password not matching...";		
		i=1;
	}
	if(document.theatreform.cpassword.value == ""  && document.theatreform.editid.value  == "0")
	{
		document.getElementById("idcpassword").innerHTML="Confirm Password should not be empty..";
		i=1;
	}
	if(!document.theatreform.mobileno.value.match(num))
	{
		document.getElementById("idmobileno").innerHTML="Mobile number is not valid.";		
		i=1;
	}
   if(document.theatreform.mobileno.value.length != 10 )
	{
		document.getElementById("idmobileno").innerHTML="Entered Mobile number should contain 10 digits...";		
		i=1;		
	}
	if(document.theatreform.mobileno.value == "" )
	{
		document.getElementById("idmobileno").innerHTML="Mobile number should not be empty.";		
		i=1;
	}
	if(document.theatreform.status.value == "" )
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