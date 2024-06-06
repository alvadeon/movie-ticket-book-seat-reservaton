<br>
<div class="gallery">
	<div class="container">
			
<?php
include("ongoingmovie.php");
?>
			
<?php
include("upcomingmovie.php");
?>
	</div>
</div>


<?php
/*
<br>
			<center>
			<h3>Ongoing movie list</h3>
			<div class="__red-bar" style='width: 130px;height: 2px;background: #c80910;margin: 20px auto 20px;'></div>
			</center>
	<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panelKannada" role="tab" >Kannada</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelHindi" role="tab">Hindi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelEnglish" role="tab">English</a>
    </li>    
	<li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panelTamil" role="tab" >Tamil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelTelugu" role="tab">Telugu</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelMalayalam" role="tab">Malayalam</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelTulu" role="tab">Tulu</a>
    </li>
</ul>
<!-- Tab panels -->
<div class="tab-content card">

    <div class="tab-pane fade in show active" id="panelKannada" role="tabpanel">
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie where language='kannada' ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
	
	
	<div class="tab-pane fade" id="panelHindi" role="tabpanel">
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie where language='hindi' ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
	
    <div class="tab-pane fade" id="panelEnglish" role="tabpanel">
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie where language='english' ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
     </div>
	 
    <div class="tab-pane fade" id="panelTamil" role="tabpanel"> 
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie where language='tamil' ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
    <!--/.Panel 3-->
    <!--Panel 3-->   
    <div class="tab-pane fade" id="panelTelugu" role="tabpanel">
         <p>	<!-- Ongoing movie -->

			<?php
			$sql = "SELECT * FROM movie where language='telugu' ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
    <!--/.Panel 3-->
    <!--Panel 3-->   
    <div class="tab-pane fade" id="panelMalayalam" role="tabpanel">
        <p>	<!-- Ongoing movie -->

			<?php
			$sql = "SELECT * FROM movie where language='Malayalam' ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
    <!--/.Panel 3-->
    <!--Panel 3-->   
    <div class="tab-pane fade" id="panelTulu" role="tabpanel">
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie where language='tulu' ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
    <!--/.Panel 3-->
</div>
<div class="w3ls_about_bottom">
		<div class="container"> 
				<center>
				<a href="viewall.php" class="wthree-btn btn-6"  >load more<span></span></a>
				</center>
		</div>
	</div>
<br>
		<hr>
			<center>
			<h3>Upcoming movie list</h3>
			<div class="__red-bar" style='width: 130px;height: 2px;background: #c80910;margin: 20px auto 20px;'></div>
			</center>
	<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panelKannada" role="tab" >Kannada</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelHindi" role="tab">Hindi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelEnglish" role="tab">English</a>
    </li>    
	<li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panelTamil" role="tab" >Tamil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelTelugu" role="tab">Telugu</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelMalayalam" role="tab">Malayalam</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panelTulu" role="tab">Tulu</a>
    </li>
</ul>
<!-- Tab panels -->
<div class="tab-content card">

    <div class="tab-pane fade in show active" id="panelKannada" role="tabpanel">
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
	
    <div class="tab-pane fade" id="panelKannada" role="tabpanel">
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>  
	
    <div class="tab-pane fade" id="panelHindi" role="tabpanel">
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
	
    <div class="tab-pane fade" id="panelEnglish" role="tabpanel">
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
     </div>
	 
    <div class="tab-pane fade" id="panelTamil" role="tabpanel"> 
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
    <!--/.Panel 3-->
    <!--Panel 3-->   
    <div class="tab-pane fade" id="panelTelugu" role="tabpanel">
         <p>	<!-- Ongoing movie -->

			<?php
			$sql = "SELECT * FROM movie ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
    <!--/.Panel 3-->
    <!--Panel 3-->   
    <div class="tab-pane fade" id="panelMalayalam" role="tabpanel">
        <p>	<!-- Ongoing movie -->

			<?php
			$sql = "SELECT * FROM movie ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
    <!--/.Panel 3-->
    <!--Panel 3-->   
    <div class="tab-pane fade" id="panelTulu" role="tabpanel">
        <p>	<!-- Ongoing movie -->
			<?php
			$sql = "SELECT * FROM movie ORDER BY movieid desc limit 0,4 ";
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
	 
			?>
	<div class="col-sm-3 col-xs-3 gallry-agile-grids" style="border-width:1px;border-style:dotted;">
		
		<div class="view view-seventh">
			<a href="" class="b-link-stripe b-animate-go thickbox" title="<?php echo $rs[moviename]; ?>">
				<img src="<?php echo $picimage; ?>" alt="" width="150px;" height="150px;" />
				<div class="mask">
					<h4><?php echo $rs[moviename]; ?></h4>
					<p><?php echo $rs[moviesummary]; ?></p>
				</div>
			</a>
		</div>
		
		<div>
			<b style='font-size:20px;padding-left: 10px;'><a href="displaymoviedetail.php?movieid=<?php echo $rs[movieid]; ?>" ><?php echo $rs[moviename]; ?></a></b><br>
			<b style='padding-left: 10px;'><?php echo $rs[language]; ?></b><br>
			<center><a href="account.php" style="background-color:red;width:100%;" class="wthree-btn btn-6">Book Now</a></center>
		</div>
		
	</div>
			<?php
			}
			?>				
				<div class="clearfix"> </div>
	<!-- //Ongoing movie --></p>
    </div>
    <!--/.Panel 3-->
</div>

		<hr>
		*/
		?>