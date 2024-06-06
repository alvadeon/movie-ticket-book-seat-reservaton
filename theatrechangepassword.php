<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
	$opassword = md5($_POST[opassword]);
	$npassword = md5($_POST[npassword]);
	//Update statement starts here opassword npassword cpassword
	$sql ="UPDATE theatre SET password='$npassword' WHERE password='$opassword' AND theatreid='$_SESSION[theatreid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Theatre password updated successfully...');</SCRIPT>";
	}
	else
	{
		echo "<script>alert('Failed to update password..');</script>";
	}
	//Update statement ends here
}
?>
	<!-- features -->
	<div id="features" class="features">
		<div class="container"> 
			<div class="w3layouts_skills_grids w3layouts-features-agileinfo">

				<div class="col-md-9 w3features-left">				

					<div id="register" class="login-form "> 
						<div class="agile-row">
							<h5>Change theatre password</h5> 
							<div class="login-agileits-top"> 	
	<form  action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return validateform()" > 

 
<p>Old password</p>
<input type="password" class="name" name="opassword" /> 
<em id="idopassword" style="color:red;" class="ms-error"></em>


<p>New password</p>
<input type="password" class="name" name="npassword" /> 
<em id="idnpassword" style="color:red;" class="ms-error"></em>

<p>Confirm password</p>
<input type="password" class="name" name="cpassword" /> 
<em id="idcpassword" style="color:red;" class="ms-error"></em>
		

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
	
	var i =0;
	if(document.frm.password.value < 6 )
	{
		document.getElementById("idpassword").innerHTML="Password should contain more than 6 characters....";		
		i=1;		
	}
	if(document.frm.password.value == "" )
	{
		document.getElementById("idpassword").innerHTML="Password should not be empty..";		
		i=1;
	}
	if(document.frm.password.value != document.frm.cpassword.value   )
	{
		document.getElementById("idcpassword").innerHTML="Password and confirm password not matching...";		
		i=1;
	}
	if(document.frm.cpassword.value == "" )
	{
		document.getElementById("idcpassword").innerHTML="Confirm Password should not be empty..";		
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