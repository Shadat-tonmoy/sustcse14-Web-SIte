<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.footer_div{
			margin-top: 5px;
		}
		.footer_img{
			width: 30px;
			height: 30px;
			border-radius: 50%;
		}
		.footer_img:hover{
			opacity: 0.5;
			transition: opacity 0.5s;
		}
		.footer_heading{
			display: inline-block;
			color:#f39c12
		}
		.email{
			display: block;
			color: white;
		}
		.email span{
			color: white;
			text-decoration: none;
			font-size: 0.95vw;
		}
		.email span:hover{
			opacity: 0.9;
			transition: opacity 0.5s;

		}
		.phone{
			display: block;
			color: white;
		}
		.phone span{
			color: white;
			text-decoration: none;
			font-size: 0.95vw;
		}
		.phone span:hover{
			opacity: 0.9;
			transition: opacity 0.5s;
		}
		.dev_corner{
			display: block;
			text-decoration: none;
			color:#f39c12; 
		}
	</style>
</head>
<body style="margin: 0px; padding: 0px;">
	<div class="row slideanim" style="border-right:5px solid #337AB7; margin-top:-25px;" id="footer">
		<div class="panel panel-body footer">
			<div class="col-lg-offset-1 col-sm-offset-1 col-md-offset-1 col-xs-offset-1 col-lg-3 col-sm-3 col-md-3 col-xs-3">
				<h5 class="footer_heading" >All right reserved by : </h5>
				<h4>&copy;<span> 2016-<?php $year = date("Y"); echo "$year"?></span></h4> 
				<span>
					Dept. Of Computer Science and Technology<br>2014-15 Batch<br>
					Shahjalal University of Science and Technology<br>
					Sylhet,Bangladesh
				</span>
				<br>
				<h5 style="display: inline-block;color:#f39c12">Special Thanks To </h5><br>
				<img src="images/infancy.png" class="footer_img">
				<span>Infancy IT</span>
			</div>

			<div class="col-lg-offset-1 col-sm-offset-1 col-md-offset-1 col-xs-offset-1 col-lg-4 col-sm-4 col-md-4 col-xs-4">
				<h5 class="footer_heading" >Maintained and Developed by : </h5>
				<span>
					<div class="footer_div">
						<img src="images/developer.jpg" style="border-radius: 50%;" width="40px" height="40px">
						<h4 style="display: inline-block;color:#bdc3c7">Shadat Tonmoy</h4><br>	
					</div>
					<div class="footer_div">
						<img src="images/icon.png" class="footer_img" >
						<span>
							2014-15 Batch
						</span>
					</div>
					<div class="footer_div">
						<img src="images/cse_society.png" class="footer_img" > 
						<span>Dept. Of Computer Science and Engineering</span>						
					</div>					
					<div class="footer_div">
						<img src="images/sust_Logo.png" class="footer_img" >
						<span>
						Shahjalal University of Science and Technology<br>
						Sylhet,Bangladesh							
						</span>						
					</div>					 
				</span>
			</div>

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
				<h5 class="footer_heading">For Any Query  </h5>
				<br>
				<div class="social">
					<a href="https://www.facebook.com/shadat.tonmoy">
						<img src="images/fb.png" class="footer_img">
					</a>

					<a href="https://www.facebook.com/shadat.tonmoy">
						<img src="images/google_plus.png" class="footer_img">
					</a>

					<a href="https://www.facebook.com/shadat.tonmoy">
						<img src="images/linkedin.ico" class="footer_img">
					</a>	
				</div>
				<br>
				<div>
					<a class="email" href="mailto:shadat.tonmoy@gmail.com" target="_top">
						<img src="images/gmail.ico" class="footer_img">
						<span> shadat.tonmoy@gmail.com</span>
					</a>
					<br>
					<a class="phone" href="tel:+8801965036172">
						<img src="images/phone.png" class="footer_img">
						<span> +880-1965036172 </span>
					</a>					
				</div>
				<br>
				<a class="dev_corner" href="#">Developer's Corner</a>

				
				
			</div>

			<div>
				
			</div>



		</div>
	</div>

	<div class="row slideanim" style="border-right:5px solid #337AB7; margin-top:-25px;" id="footer_small">
		<div class="panel panel-body footer">
			<center style="font-size:1.5vw">
				<span>&copy;-2016 All right reserved by : </span><br>
				<span>
					Dept. Of Computer Science and Technology (2014-15 Batch)<br>
					Shahjalal University of Science and Technology<br>
					Sylhet,Bangladesh
				</span>
			</center>
	</div>

	
</body>
</html>
