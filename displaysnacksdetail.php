<?php
include("header.php");
$sqlsnacks="SELECT * from snacks WHERE snacksid='$_GET[snacksid]'";
$qsqlsnacks=mysqli_query($con,$sqlsnacks);
echo mysqli_error($con);
$rssnacks=mysqli_fetch_array($qsqlsnacks);
											
        if(file_exists("imageitem/$rssnacks[itemimg]"))
     {
	    $picimage="imageitem/$rssnacks[itemimg]";
     }
      else
     {
	    $picimage="images/No_Image_Available.jpg";
     }
	 
?>
	<div class="w3ls_about_bottom" style="background-image: url('<?php echo $picimage; ?>');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
		<div class="container"> 
			<div class="w3_about_bottom_grid"> 
			<h4><?php echo $rssnacks[itemname];?></h4>
			</div>
		</div>
	</div> 	    
	
		<div id="about" class="about">
		<div class="container">
		
			<div class="col-md-8 agileits_about_grid_left">
				<h2 class="agileits-title"><?php echo $rssnacks[itemname]; ?> <span class="w3lshr-line"> </span></h2>
				<p> <?php echo $rssnacks[itemdescription]; ?></p>
			</div> 
			<div class="col-md-4 agileits_about_grid_right">
				<p><span style="color:red;">Price:</span><br/> <?php echo $rssnacks[address]; ?><br>Just for <?php echo $rssnacks[itemcost]; ?></p>		
			</div>
			<div class="clearfix"> </div>
		</div> 
	</div>

<?php
include("footer.php");
?>