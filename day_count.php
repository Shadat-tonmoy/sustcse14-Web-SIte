<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.white_img{
			width: 4vw;
			height: 4vw;
		}
		.code_div{
			border-right: 2px solid #27ae60;
			border-bottom: 2px solid #27ae60;
			border-top: 2px solid #27ae60;
		}
		.tired_div{
			border-top: 2px solid #e67e22;
		}
		.eat_div{
			border-left: 2px solid #3498db;
		}
		.sleep_div{
			border-bottom: 2px solid #e74c3c;
		}
		.final_div{
			border-right: 2px solid #27ae60;
    		border-top: 2px solid #e67e22;
    		border-bottom: 2px solid #d35400;
    		border-left: 2px solid #3498db;
		}
		.icon_div{
			margin-bottom: 10vh;
    		margin-top: 8vh;
		}
		.welcome{
			font-size:2vw; 
			display: block;
			font-family: Dancing Script;
			text-shadow: 2px 2px 2px #aaa;
			letter-spacing: 2px;
		}
	</style>
	<link href='//fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
</head>
<body>
<div class="container-fluid" id="home_div">
	<div class="row day_cnt_bg">
		<div class="jumbotron jmbh" style="margin-top:30vh;" id="jmb">
			
			<div class="col-sm-12 col-lg-12 col-md-12 icon_div">
				<div class="inline col-sm-1 col-lg-1 col-md-1 col-xs-1 code_div" id="code_div_1">
					<img src="images/code_white.png" class="white_img">					
				</div>
				
				<div class="inline col-sm-1 col-lg-1 col-md-1 col-xs-1 col-sm-offset-1 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 tired_div" id="tired_div">
					<img src="images/tired_white.png" class="white_img">
				</div>
				
				<div class="inline col-sm-1 col-lg-1 col-md-1 col-xs-1 col-sm-offset-1 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 eat_div" id="eat_div">
					<img src="images/eat_white.png" class="white_img">
				</div>

				<div class="inline col-sm-1 col-lg-1 col-md-1 col-xs-1 col-sm-offset-1 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 sleep_div" id="sleep_div">
					<img src="images/sleep_white.png" class="white_img">
					
				</div>
				
				<div class="inline col-sm-1 col-lg-1 col-md-1 col-xs-1 col-sm-offset-1 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 code_div" id="code_div_2">
					<img src="images/code_white.png" class="white_img">	
				</div>

				<div class="inline col-sm-1 col-lg-1 col-md-1 col-xs-1 col-sm-offset-1 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 final_div" id="continue_div">
					<img src="images/dot.png" class="white_img">	
				</div>
										
			</div>
			<div class="text_div">
				<h4 class="text-center welcome" id="welcome">
					Welcome To The World of SUST CSE-14...
				</h4>
				<article class="welcome pull-right" id="another_text">
					The coolest area of Awesomeness, Friendship and Happiness 
				</article>	
			</div>
			
		</div>
	</div>
</div>

</body>
</html>
