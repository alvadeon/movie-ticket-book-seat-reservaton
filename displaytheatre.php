<?php
include("header.php");
?>
	<div class="w3ls_about_bottom">
		<div class="container"> 
			<div class="w3_about_bottom_grid"> 
				<h4>Theatres</h4>
				<?php
				/*
				<a href="#myModal" class="wthree-btn btn-6"  data-toggle="modal">Read More<span></span></a> 
				*/
				?>
			</div>
		</div>
	</div>
	<!-- //about --> 
	<!-- gallery -->
	<div id="gallery" class="gallery">
		<div class="container">
			<div class="main">			
			<?php
			$sql = "SELECT * FROM theatre";
			$qsql = mysqli_query($con,$sql);
			while($rs = mysqli_fetch_array($qsql))
			{					
				if(file_exists("imgtheatrelogo/$rs[theatreimg]"))
				 {
					$picimage="imgtheatrelogo/$rs[theatreimg]";
				 }
				  else
				 {
					$picimage="images/No_Image_Available.jpg";
				 }
			?>
	<div class="col-sm-4 col-xs-6 gallry-agile-grids" >
		<div class="view view-seventh">
			<a href="#" class="b-link-stripe b-animate-go thickbox"  onclick="window.location='displaytheatredetail.php?theatreid=<?php echo $rs[theatreid]; ?>'">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="250px;" />
				<div class="mask">
					<h4><?php echo $rs[theatrename]; ?></h4>
					<p><?php echo $rs[theatredescription]; ?></p>
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
<?php
include("footer.php");
?>