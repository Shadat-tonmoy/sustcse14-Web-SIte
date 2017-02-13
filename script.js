
$(document).ready(function(){
			$("#code_div_1").hide();
			$("#tired_div").hide();
			$("#eat_div").hide();
			$("#sleep_div").hide();
			$("#code_div_2").hide();
			$("#continue_div").hide();
			$("#welcome").hide();
			$("#another_text").hide();
			$("#code_div_1").show("drop",{direction:"up",duration:1000,complete:function(){
				$("#tired_div").show("drop",{direction:"up",duration:1000,complete:function(){
					$("#eat_div").show("drop",{direction:"up",duration:1000,complete:function(){
						$("#sleep_div").show("drop",{direction:"up",duration:1000,complete:function(){
								$("#code_div_2").show("drop",{direction:"up",duration:1000,complete:function(){
									$("#continue_div").show("drop",{direction:"up",duration:1000,complete:function(){
											$("#welcome").show("slide",{direction:"left",duration:1500,complete:function(){
													$("#another_text").show("slide",{direction:"left",duration:1500,});
												}});
										}});
									}
								});
							}
						});
					}
				});
				}
			});
		}
		});	
			
			
			
			
			

		
		$("#pils li a").click(function(){
		$("#pils li a").not(this).removeClass();
		$(this).addClass("clkd");
	});	
	$("#members").addClass("");
	$(window).scroll(function() {
		$(".slideanim").each(function(){
		var pos = $(this).offset().top;

		var winTop = $(window).scrollTop();
		if (pos < winTop + 500) {
		  $(this).addClass("slide");
			}
		});
	});
	$(".memberbtn").click(function(){
		var dt = $(this).attr("data-target");
		$(dt).slideToggle();
		$(".memberbtn").each(function(){
			var dl = $(this).attr("data-target");
			if(dl!=dt)
				$(dl).hide();
		})
		//alert(dall);
	})
	//Code for timer
	var time_cnt = setInterval(timer,1000);
	function timer(){
		var d = new Date();
		var crnt_year = 2018-d.getFullYear();
		var crnt_month = 11-d.getMonth();
		var crnt_date = d.getDate();
		if(crnt_date==31)
		{
			crnt_date=0
		}
		else crnt_date=31-crnt_date;
		var crnt_hrs = 24-d.getHours();
		var crnt_min = 60-d.getMinutes();
		var crnt_sec = 60-d.getSeconds();	
		if(crnt_sec<10)
			crnt_sec = "0" + crnt_sec;
		if(crnt_min<10)
			crnt_min = "0" + crnt_min;
		if(crnt_hrs<10)
			crnt_hrs = "0" + crnt_hrs;
		document.getElementById("year_cnt").innerHTML = crnt_year;
		document.getElementById("month_cnt").innerHTML = crnt_month;
		document.getElementById("day_cnt").innerHTML = crnt_date;
		document.getElementById("hrs_cnt").innerHTML = crnt_hrs;
		document.getElementById("min_cnt").innerHTML = crnt_min;
		document.getElementById("sec_cnt").innerHTML = crnt_sec;
	}


	var reg_no = 0;
	var number,tmp;
	$("#register_btn,#reg_try").click(function(){
		$("#registration_form").hide();
		$("#reg_search").show();
		$("#val_msg_reg_search").hide();
		$("#val_msg_token").hide();
	})

	/*$("").click(function(){
		alert("hh");
		$("#registration_form").hide();
		$("#reg_search").show();
		$("#val_msg_reg_search").hide();
	})*/
	$("#reg_search_no").focusout(function(){
		number = $("#reg_search_no").val();
		tmp=number;
		checkRegNo();
	})
	$("#varification_token").focusout(function(){
		checkToken();
		
	})	
	$("#reg_btn").click(function(){
		checkRegNo();
		checkToken();
		if(reg_no==1 && token_ok==1)
		{
			$("#reg_search").hide();
			$("#reg_no").val(tmp);
			$("#registration_form").fadeIn(500);
			$("#reg_no").attr("readonly","readonly");
		}
	})
	function checkRegNo(){
		var no = $("#reg_search_no").val();
		
		if(no.length==0)
		{
				$("#msg_disp_reg_search").html("Registration Number is Empty!!");	
				$("#val_msg_reg_search").fadeIn();	
				$("#msg_disp_reg_search").removeClass();
				$("#msg_disp_reg_search").addClass("error_msg");
				$("#img_disp_reg_search").attr("src","images/not_ok.png");
				$("#img_disp_reg_search").addClass("val_img");
				reg_no=0;	
		}
		

		else if(no[0]!='2' || no[1]!='0' || no[2]!='1' || no[3]!='4' || no[4]!='3' || no[5]!='3' || no[6]!='1' || no[7]!='0')
		{
				$("#msg_disp_reg_search").html("It seems that you are not a Student of SUST CSE'14 Batch....Right??");	
				$("#val_msg_reg_search").fadeIn();	
				$("#msg_disp_reg_search").removeClass();
				$("#msg_disp_reg_search").addClass("error_msg");
				$("#img_disp_reg_search").attr("src","images/not_ok.png");
				$("#img_disp_reg_search").addClass("val_img");
				reg_no=0;

		}
		else 
		{

			$.post('form_validation.php',{no:no},function(data){
			//alert(data);
			if(data!="New")
			{	$("#msg_disp_reg_search").html(data);	
				$("#val_msg_reg_search").fadeIn();	
				$("#msg_disp_reg_search").removeClass();
				$("#msg_disp_reg_search").addClass("error_msg");
				$("#img_disp_reg_search").attr("src","images/not_ok.png");
				$("#img_disp_reg_search").addClass("val_img");
				reg_no=0;
			}
			else
			{
				$("#msg_disp_reg_search").html("You Are Not Registered Yet!! Click To Register");	
				$("#val_msg_reg_search").fadeIn();	
				$("#msg_disp_reg_search").removeClass();
				$("#msg_disp_reg_search").addClass("ok_msg");
				$("#img_disp_reg_search").attr("src","images/ok.png");
				$("#img_disp_reg_search").addClass("val_img");
				reg_no=1;
			}
		
		})
			
		}
	}
	function checkToken(){
		var token = $("#varification_token").val();
		if(token.length==0)
		{
				$("#msg_disp_token").html("Varification Token is Empty!!");	
				$("#val_msg_token").fadeIn();	
				$("#msg_disp_token").removeClass();
				$("#msg_disp_token").addClass("error_msg");
				$("#img_disp_token").attr("src","images/not_ok.png");
				$("#img_disp_token").addClass("val_img");
				token_ok=0;
		}
		else if(token!="svcsvc")
		{
				$("#msg_disp_token").html("Sorry Your Token is not Correct!!!");	
				$("#val_msg_token").fadeIn();	
				$("#msg_disp_token").removeClass();
				$("#msg_disp_token").addClass("error_msg");
				$("#img_disp_token").attr("src","images/not_ok.png");
				$("#img_disp_token").addClass("val_img");
				token_ok=0;
		}
		else if(token=="svcsvc")
		{
				$("#msg_disp_token").html("Congratulation!! You may Proceed");	
				$("#val_msg_token").fadeIn();	
				$("#msg_disp_token").removeClass();
				$("#msg_disp_token").addClass("ok_msg");
				$("#img_disp_token").attr("src","images/ok.png");
				$("#img_disp_token").addClass("val_img");
				token_ok=1;
		}

	}
	$("#rst").click(function(){
		$("#val_msg_fn").hide();
		$("#val_msg_ln").hide();
		$("#val_msg_un").hide();
		$("#val_msg_ps").hide();
		$("#val_msg_rps").hide();
		$("#reg_no").attr("value",tmp);
			
	});
	$("#edit_account").hide();	
	$("#change_password").hide();	
	$("#edit_account_btn").click(function(){
		$("#disp_acc").hide();
		$("#change_password").hide();
		$("#edit_account").fadeIn(800);
		$("#img_update_form").fadeIn(800);
	});
	$("#update_back_btn").click(function(){
		$("#disp_acc").fadeIn(800);
		$("#edit_account,#img_update_form").hide();
		
	});	
	$("#password_back_btn").click(function(){
		$("#disp_acc").fadeIn(800);
		$("#edit_account,#img_update_form,#change_password").hide();
		
	});
	$("#progress").hide();
	$("#progress_update").hide();
	var check=0;
	$("#img_upload_form").ajaxForm({
		beforeSend:function(){
			$("#progress").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$("#progress_bar").width(percentComplete+"%");
			$("#show_percent").html(percentComplete+"%");
		},
		success:function(){
			$("#progress").hide();
		},
		complete:function(response){
			//alert(response.responseText);
			if(response.responseText!=0)
			{
				var path = response.responseText;
				var status = path.charAt(path.length-1);
				var dist = path.slice(0,path.length-1);
				if(status==0)
				{
				$("#msg_disp_img").text("Please Upload a valid image.");
				$("#val_msg_img").removeClass();
				$("#val_msg_img").addClass("error_msg");
				$("#img_disp_img").attr("src","images/not_ok.png");;
				$("#img_disp_img").addClass("val_img");
					
				}
				else if(status==1)
				{
				$("#registered_img").attr("src",dist);
				$("#registered_img").fadeIn(600);
				$("#msg_disp_img").text("Your Profile Picture has been successfully uploaded");
				$("#val_msg_img").addClass("ok_msg");
				$("#img_disp_img").attr("src","images/ok.png");;
				$("#img_disp_img").addClass("val_img");
					
				}
			}
			else if(response.responseText==0)
			{
				$("#msg_disp_img").text("Please Upload a valid image.");
				$("#val_msg_img").removeClass();
				$("#val_msg_img").addClass("error_msg");
				$("#img_disp_img").attr("src","images/not_ok.png");;
				$("#img_disp_img").addClass("val_img");
				
			}
		}
	});
	
	$("#img_update_form").ajaxForm({
		beforeSend:function(){
			$("#progress_update").show();
		},
		uploadProgress:function(event,position,total,percentComplete){
			$("#progress_bar_update").width(percentComplete+"%");
			$("#show_percent_update").html(percentComplete+"%");
		},
		success:function(){
			//alert(data);
			$("#progress_update").hide();
		},
		complete:function(response){
			//alert(response.responseText);
			if(response.responseText!=0)
			{
				var path = response.responseText;
				var status = path.charAt(path.length-1);
				var dist = path.slice(0,path.length-1);
				//alert(path);
				if(status==1)
				{
					$("#updated_img").attr("src",dist);
					$("#updated_img").fadeIn(600);
					$("#msg_disp_img_update").text("Your Profile Picture has been successfully uploaded");
					$("#val_msg_img_update").addClass("ok_msg");
					$("#img_disp_img_update").attr("src","images/ok.png");;
					$("#img_disp_img_update").addClass("val_img");					
				}
				else if(status==0)
				{
					$("#msg_disp_img_update").text("Please Upload a valid image.");
					$("#val_msg_img_update").removeClass();
					$("#val_msg_img_update").addClass("error_msg");
					$("#img_disp_img_update").attr("src","images/not_ok.png");;
					$("#img_disp_img_update").addClass("val_img");
					
				}
			}
			else if(response.responseText==0)
			{
				//alert(response.responseText);
				$("#msg_disp_img_update").text("Please Upload a valid image.");
				$("#val_msg_img_update").removeClass();
				$("#val_msg_img_update").addClass("error_msg");
				$("#img_disp_img_update").attr("src","images/not_ok.png");;
				$("#img_disp_img_update").addClass("val_img");
				
			}
		}
	});
	$(".tmp_reg").hide();
	$("#img_update_form").hide();

	
	var password_matched = 0;
	$("#val_msg_old_ps").hide();
	$("#old_ps").focusin(function(){
		$("#val_msg_old_ps").hide();
	})
	$("#old_ps").focusout(function(){
		checkOldPassword();
	})
	function checkOldPassword(){
		var old_ps = $("#old_ps").val();
		$.ajax({
			async:false,
			method:'post',
			data:{old_ps:old_ps},
			url:"check_old_password.php",
			success:function(data)
			{
				if(data=="1")
				{
					$("#val_msg_old_ps").fadeIn(900);
					$("#msg_disp_old_ps").removeClass();
					$("#msg_disp_old_ps").addClass("ok_msg");
					$("#msg_disp_old_ps").html("Password Matched With Older One");
					$("#img_disp_old_ps").attr("src","images/ok.png");
					$("#img_disp_old_ps").addClass("val_img");
					password_matched=1;

				}
				else 
				{
					$("#val_msg_old_ps").fadeIn(900);
					$("#msg_disp_old_ps").removeClass();
					$("#msg_disp_old_ps").addClass("error_msg");
					$("#msg_disp_old_ps").html("Password Doesn't Match With Older One");
					$("#img_disp_old_ps").attr("src","images/not_ok.png");
					$("#img_disp_old_ps").addClass("val_img");
					password_matched=0;
				}

			},
		});

	}
	$("#ps_change_btn").click(function(event){
		event.preventDefault();
		password_matched=0;
		checkOldPassword();
		//alert(password_matched);
		if(password_matched==1)
		{
			//alert("Mkk");
			$("#check_password_window").hide();
			$(".modal-backdrop").hide();
			$("#disp_acc").hide();
			$("#edit_account").hide();
			$("#img_update_form").hide();
			$("#change_password").fadeIn(800);
			return true;
		}
		else return false;
	})
	var new_password = 0;
	var new_password_rpt = 0;
	$("#val_msg_new_ps").hide();
	$("#val_msg_new_ps_rpt").hide();
	$("#new_ps").focusin(function(){
		$("#val_msg_new_ps").hide();

	})
	$("#new_ps").focusout(function(){
		checkNewPassword();

	})
	$("#new_ps_rpt").focusin(function(){
		$("#val_msg_new_ps_rpt").hide();

	})
	$("#new_ps_rpt").focusout(function(){
		checkNewPasswordRepeat();
		
	})
	function checkNewPassword()
	{
		var new_ps = $("#new_ps").val();
		if(new_ps.length<4)
		{
			$("#val_msg_new_ps").fadeIn(900);
			$("#msg_disp_new_ps").removeClass();
			$("#msg_disp_new_ps").addClass("error_msg");
			$("#msg_disp_new_ps").html("Password Must Be at least 4 Characters");
			$("#img_disp_new_ps").attr("src","images/not_ok.png");
			$("#img_disp_new_ps").addClass("val_img");
			new_password=0;
		}
		else 
		{
			$("#val_msg_new_ps").fadeIn(900);
			$("#msg_disp_new_ps").removeClass();
			$("#msg_disp_new_ps").addClass("ok_msg");
			$("#msg_disp_new_ps").html("Password is Ok");
			$("#img_disp_new_ps").attr("src","images/ok.png");
			$("#img_disp_new_ps").addClass("val_img");
			new_password=1;
		}

	}
	function checkNewPasswordRepeat()
	{
		var new_ps = $("#new_ps").val();
		var new_ps_rpt = $("#new_ps_rpt").val();
		if(new_ps_rpt.length<4)
		{
			$("#val_msg_new_ps_rpt").fadeIn(900);
			$("#msg_disp_new_ps_rpt").removeClass();
			$("#msg_disp_new_ps_rpt").addClass("error_msg");
			$("#msg_disp_new_ps_rpt").html("Password Must Be at least 4 Characters");
			$("#img_disp_new_ps_rpt").attr("src","images/not_ok.png");
			$("#img_disp_new_ps_rpt").addClass("val_img");
			new_password_rpt=0;
		}
		else if (new_ps != new_ps_rpt)
		{
			$("#val_msg_new_ps_rpt").fadeIn(900);
			$("#msg_disp_new_ps_rpt").removeClass();
			$("#msg_disp_new_ps_rpt").addClass("error_msg");
			$("#msg_disp_new_ps_rpt").html("Password Doesn't Match");
			$("#img_disp_new_ps_rpt").attr("src","images/not_ok.png");
			$("#img_disp_new_ps_rpt").addClass("val_img");
			new_password_rpt=0;
		}
		else 
		{
			$("#val_msg_new_ps_rpt").fadeIn(900);
			$("#msg_disp_new_ps_rpt").removeClass();
			$("#msg_disp_new_ps_rpt").addClass("ok_msg");
			$("#msg_disp_new_ps_rpt").html("Password Matched");
			$("#img_disp_new_ps_rpt").attr("src","images/ok.png");
			$("#img_disp_new_ps_rpt").addClass("val_img");
			new_password_rpt=1;
		}

	}
	$("#password_change_final_btn").click(function(){
		new_password = 0;
		new_password_rpt = 0;
		var new_ps = $("#new_ps").val();
		checkNewPassword();
		checkNewPasswordRepeat();
		if(new_password==1 && new_password_rpt==1)
		{
			$.ajax({
				method:'post',
				async:false,
				url:"change_password.php",
				data:{new_ps:new_ps},
				success:function(data){
					if(data=="1")
					{
						$("html, body").animate({ scrollTop: 0 }, "slow");
						$("#val_msg_new_ps").hide();
						$("#val_msg_new_ps_rpt").hide();
						//$("#val_msg_un_edit").hide();
						//$("#val_msg_email_edit").hide();
						//$("#val_msg_phn_edit").hide();
						$("#success_msg_ps_change").slideDown(800);

					}
					else
					{

					}

				}
			})
		}
		else return false;
	})
	$(".shadow_div").hover(function(event){
		var id = $(this).attr("id");
		$(this).stop()	;
		$("#shadow_"+id).fadeIn(400);
	},
	function(event)
	{
		$(this).stop();
		var id = $(this).attr("id");
		$("#shadow_"+id).fadeOut(400);
	})



	
	
	
})
