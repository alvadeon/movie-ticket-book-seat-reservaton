<?php
include("header.php"); 
if(isset($_POST[submit]))
{ 
	$dt = date("Y-m-d");
	//Insert statement starts here
	$sql = "INSERT INTO feedback(customerid,theatreid,ratings,feedback,feedbackdate,status) VALUES ('$_SESSION[customerid]','$_GET[theatreid]','$_POST[rating]','$_POST[feedback]','$dt','Active')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	  {
		echo "<SCRIPT>alert('Feedback published successfully...');</SCRIPT>";
	  }
}

$sqltheatre="SELECT * from theatre LEFT JOIN location ON theatre.locationid=location.locationid WHERE theatreid='$_GET[theatreid]'";
$qsqltheatre=mysqli_query($con,$sqltheatre);
echo mysqli_error($con);
$rstheatre=mysqli_fetch_array($qsqltheatre);
											
   if(file_exists("imgtheatrelogo/$rstheatre[theatreimg]"))
     {
	    $picimage="imgtheatrelogo/$rstheatre[theatreimg]";
     }
      else
     {
	    $picimage="images/No_Image_Available.jpg";
     }
	 											
	  if(file_exists("imgtheatrelogo/$rstheatre[theatrelogo]"))
     {
	    $theatrelogo="imgtheatrelogo/$rstheatre[theatrelogo]";
     }
      else
     {
	    $theatrelogo="images/No_Image_Available.jpg";
     }
?>
	<div class="w3ls_about_bottom" style="background-image: url('<?php echo $picimage; ?>');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
		<div class="container"> 
			<div class="w3_about_bottom_grid"> 
				<img src="<?php echo $theatrelogo; ?>" width="150px;" height="100px;"><h4 style="background-color:red;"><?php echo $rstheatre[theatrename]; ?></h4>
				<h4><?php echo $rstheatre[location];?></h4>
			</div>
		</div>
	</div> 	    
	
		<div id="about" class="about">
		<div class="container">
		
			<div class="col-md-8 agileits_about_grid_left">
				<h2 class="agileits-title"><?php echo $rstheatre[theatrename]; ?> <span class="w3lshr-line"> </span></h2>
				<p> <?php echo $rstheatre[theatredescription]; ?></p>
			</div> 
			<div class="col-md-4 agileits_about_grid_right">
				<p><span style="color:red;">Address:</span><br/> <?php echo $rstheatre[address]; ?><br>Ph. <?php echo $rstheatre[mobileno]; ?></p>		
			</div>
			<div class="clearfix"> </div>
		</div> 
	</div>
	
	
	<centeR><h2>Movies running under this theatre..</h2></center>
	<!-- gallery -->
	<div id="gallery" class="gallery">
		<div class="container">
			<div class="main">
			<?php
	
				$sql = "SELECT * FROM showlist LEFT JOIN movie ON showlist.movieid=movie.movieid WHERE '$dt' BETWEEN showlist.startdate AND showlist.enddate AND showlist.theatreid='$_GET[theatreid]'  group by movie.movieid   ORDER BY movie.movieid";
		
			$qsql = mysqli_query($con,$sql);
			while($rs = mysqli_fetch_array($qsql))
			{						
    if(file_exists("imagebanner/$rs[bannerimg]"))
     {
	    $picimage="imagebanner/$rs[bannerimg]";
     }
      else
     {
	    $picimage="images/No_Image_Available.jpg";
     } 
	 if($rs[movieid]== "")
	 {
		 $rs[movieid] = $rs[0];
	 }
	 ?>
	<div class="col-sm-4 col-xs-6">
		<div class="view view-seventh">
			<a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>"  title="<?php echo $rs[moviename]; ?>"  onclick="window.location='displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>';">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="250px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
            </div>
		</div>
	</div>
	<!-- //gallery -->

	<!-- features -->
	<div id="features" class="features">
		<div class="container"> 
			<div class="w3layouts_skills_grids w3layouts-features-agileinfo">
				<div class="col-md-12 col-sm-9 w3features-right">
					<div id="register" class="login-form agileits-right"> 
						<div class="agile-row">
							<h5>Location Map</h5> 
							<div class="login-agileits-top"> 
				<p><?php echo $rstheatre[maplocation]; ?></p>	
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
//Movie Feed back starts here
include("theatrefeedback.php");
//Movie Feed back ends here
?>
	
<?php
include("footer.php");
?>