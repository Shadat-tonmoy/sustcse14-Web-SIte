$(document).ready(function(){
var first_name=0;
var last_name=0;
var user_name=0;
var password=0;
var re_password=0;
var email=0;
var reg_no=0;

var first_name_edit=0;
var last_name_edit=0;
var user_name_edit=0;
var email_edit=0;
var phn_edit=0;

$("#val_msg_fn").hide();
$("#val_msg_ln").hide();
$("#val_msg_un").hide();
$("#val_msg_ps").hide();
$("#val_msg_rps").hide();
$("#val_msg_reg").hide();

$("#val_msg_fn_edit").hide();
$("#val_msg_ln_edit").hide();
$("#val_msg_un_edit").hide();
$("#val_msg_email_edit").hide();
$("#val_msg_phn_edit").hide();



$("#f_name").focusin(function(){
	$("#val_msg_fn").hide();
})
$("#f_name").focusout(function(){
	checkFirstName();
})		
$("#l_name").focusin(function(){
	$("#val_msg_ln").hide();
})
$("#l_name").focusout(function(){
	checkLastName();
})	
$("#u_name").focusin(function(){
	$("#val_msg_un").hide();
})
$("#u_name").focusout(function(){
	checkUserName();
})	
$("#ps").focusin(function(){
	$("#val_msg_ps").hide();
})
$("#ps").focusout(function(){
	checkPassword();
})	
$("#rps").focusin(function(){
	$("#val_msg_rps").hide();
})
$("#rps").focusout(function(){
	checkPasswordRepeat();
})
$("#reg_no").focusout(function(){
	checkRegNo();
})
$("#reg_no").focusin(function(){
	$("#val_msg_reg").hide();
})
	function checkFirstName(){
		
		var value = $("#f_name").val();
		if(value.length<4)
		{
			$("#val_msg_fn").fadeIn(900);
			$("#msg_disp_fn").removeClass();
			$("#msg_disp_fn").addClass("error_msg");
			$("#msg_disp_fn").html("First Name Should Be Within 4-25 charecter");
			$("#img_disp_fn").attr("src","images/not_ok.png");
			$("#img_disp_fn").addClass("val_img");
			first_name=0;
		}
		else {
			$("#val_msg_fn").fadeIn(900);
			$("#msg_disp_fn").removeClass();
			$("#msg_disp_fn").addClass("ok_msg");
			$("#msg_disp_fn").html("First Name is Ok");
			$("#img_disp_fn").attr("src","images/ok.png");
			$("#img_disp_fn").addClass("val_img");
			first_name=1;
		}
	}
	
	function checkLastName(){
		
		var value = $("#l_name").val();
		if(value.length<4)
		{
			$("#val_msg_ln").fadeIn(900);
			$("#msg_disp_ln").removeClass();
			$("#msg_disp_ln").addClass("error_msg");
			$("#msg_disp_ln").html("Last Name Should Be Within 4-25 charecter");
			$("#img_disp_ln").attr("src","images/not_ok.png");
			$("#img_disp_ln").addClass("val_img");
			last_name=0;
		}
		else {
			$("#val_msg_ln").fadeIn(900);
			$("#msg_disp_ln").removeClass();
			$("#msg_disp_ln").addClass("ok_msg");
			$("#msg_disp_ln").html("Last Name is Ok");
			$("#img_disp_ln").attr("src","images/ok.png");
			$("#img_disp_ln").addClass("val_img");
			last_name=1;
		}
		
	}
	function checkUserName(){
		
		var value = $("#u_name").val();
		if(value.length<4)
		{
			$("#val_msg_un").fadeIn(900);
			$("#msg_disp_un").removeClass();
			$("#msg_disp_un").addClass("error_msg");
			$("#msg_disp_un").html("User Name Should Be Within 4-25 charecter");
			$("#img_disp_un").attr("src","images/not_ok.png");
			$("#img_disp_un").addClass("val_img");
			user_name=0;
		}
		else {
			$("#val_msg_un").fadeIn(900);
			$("#msg_disp_un").removeClass();
			$("#msg_disp_un").addClass("ok_msg");
			$("#msg_disp_un").html("User Name is Ok");
			$("#img_disp_un").attr("src","images/ok.png");
			$("#img_disp_un").addClass("val_img");
			user_name=1;
			
		}
		
	}
	function checkPassword(){
		
		var value = $("#ps").val();
		if(value.length<4)
		{
			$("#val_msg_ps").fadeIn(900);
			$("#msg_disp_ps").removeClass();
			$("#msg_disp_ps").addClass("error_msg");
			$("#msg_disp_ps").html("Password Should Be Within 4-25 charecter");
			$("#img_disp_ps").attr("src","images/not_ok.png");
			$("#img_disp_ps").addClass("val_img");
			password=0;
		}
		else {
			$("#val_msg_ps").fadeIn(900);
			$("#msg_disp_ps").removeClass();
			$("#msg_disp_ps").addClass("ok_msg");
			$("#msg_disp_ps").html("Password is Ok");
			$("#img_disp_ps").attr("src","images/ok.png");
			$("#img_disp_ps").addClass("val_img");
			password=1;
			
		}
		
	}
	function checkPasswordRepeat(){
		
		var value1 = $("#ps").val();
		var value2 = $("#rps").val();
		if(value1.length>0 && value2.length>0)
		{
			
			if(value1!=value2)
			{
				$("#val_msg_rps").fadeIn(900);
				$("#msg_disp_rps").removeClass();
				$("#msg_disp_rps").addClass("error_msg");
				$("#msg_disp_rps").html("Password Doesn't Match");
				$("#img_disp_rps").attr("src","images/not_ok.png");
				$("#img_disp_rps").addClass("val_img");
				re_password=0;
			}
			else {
				$("#val_msg_rps").fadeIn(900);
				$("#msg_disp_rps").removeClass();
				$("#msg_disp_rps").addClass("ok_msg");
				$("#msg_disp_rps").html("Password Matched");
				$("#img_disp_rps").attr("src","images/ok.png");
				$("#img_disp_rps").addClass("val_img");
				re_password=1;
				
			}
		}
		else 
		{
				$("#val_msg_rps").fadeIn(900);
				$("#msg_disp_rps").removeClass();
				$("#msg_disp_rps").addClass("error_msg");
				$("#msg_disp_rps").html("Password Doesn't Match");
				$("#img_disp_rps").attr("src","images/not_ok.png");
				$("#img_disp_rps").addClass("val_img");
				re_password=0;
		}
		
	}
	function checkEmail(){
		
	}
	
	function checkPhoneNo(){
		
	}
	$("#signup_form").submit(function(){
		first_name=0;
		last_name=0;
		user_name=0;
		password=0;
		re_password=0;
		checkFirstName();
		checkLastName();
		checkUserName();
		checkPassword();
		checkPasswordRepeat();
		if(first_name==1 && last_name==1 && user_name==1 && password==1 && re_password==1)
		{
			//alert("Done");
			return true;
		}
		else 
		{
			//alert("Not Done."+first_name+" "+last_name+" "+user_name+" "+password+" "+re_password);
			return false;
		}
	});

	$("#fn_edit").focusin(function(){
		$("#val_msg_fn_edit").hide();
	})
	$("#ln_edit").focusin(function(){
		$("#val_msg_ln_edit").hide();
	})
	$("#un_edit").focusin(function(){
		$("#val_msg_un_edit").hide();
	})
	$("#email_edit").focusin(function(){
		$("#val_msg_email_edit").hide();
	})
	$("#phn_edit").focusin(function(){
		$("#val_msg_phn_edit").hide();
	})

	$("#fn_edit").focusout(function(){
		checkFirstNameEdit();

	})
	$("#ln_edit").focusout(function(){
		checkLastNameEdit();

	})
	$("#un_edit").focusout(function(){
		checkUserNameEdit();

	})
	$("#email_edit").focusout(function(){
		checkEmailEdit();

	})
	$("#phn_edit").focusout(function(){
		checkPhoneNoEdit();

	})
	function checkFirstNameEdit()
	{
		var fn = $("#fn_edit").val();
		if(fn.length<4)
		{
			$("#val_msg_fn_edit").fadeIn(900);
			$("#msg_disp_fn_edit").removeClass();
			$("#fn_edit").addClass("error_input");
			$("#msg_disp_fn_edit").addClass("error_msg");
			$("#msg_disp_fn_edit").html("First Name Should Be Within 4-25 charecter");
			$("#img_disp_fn_edit").attr("src","images/not_ok.png");
			$("#img_disp_fn_edit").addClass("val_img");
			first_name_edit=0;
		}
		else {
			$("#val_msg_fn_edit").fadeIn(900);
			$("#msg_disp_fn_edit").removeClass();
			$("#fn_edit").removeClass("error_input");
			$("#msg_disp_fn_edit").addClass("ok_msg");
			$("#msg_disp_fn_edit").html("First Name is Ok");
			$("#img_disp_fn_edit").attr("src","images/ok.png");
			$("#img_disp_fn_edit").addClass("val_img");
			first_name_edit=1;
		}
	}
	function checkLastNameEdit()
	{
		var ln = $("#ln_edit").val();
		if(ln.length<4)
		{
			$("#val_msg_ln_edit").fadeIn(900);
			$("#msg_disp_ln_edit").removeClass();
			$("#ln_edit").addClass("error_input");
			$("#msg_disp_ln_edit").addClass("error_msg");
			$("#msg_disp_ln_edit").html("Last Name Should Be Within 4-25 charecter");
			$("#img_disp_ln_edit").attr("src","images/not_ok.png");
			$("#img_disp_ln_edit").addClass("val_img");
			last_name_edit=0;
		}
		else {
			$("#val_msg_ln_edit").fadeIn(900);
			$("#msg_disp_ln_edit").removeClass();
			$("#ln_edit").removeClass("error_input");
			$("#msg_disp_ln_edit").addClass("ok_msg");
			$("#msg_disp_ln_edit").html("Last Name is Ok");
			$("#img_disp_ln_edit").attr("src","images/ok.png");
			$("#img_disp_ln_edit").addClass("val_img");
			last_name_edit=1;
		}

	}
	function checkEmailEdit()
	{
		var email = $("#email_edit").val();
		if(email.length<4)
		{
			$("#val_msg_email_edit").fadeIn(900);
			$("#msg_disp_email_edit").removeClass();
			$("#email_edit").addClass("error_input");
			$("#msg_disp_email_edit").addClass("error_msg");
			$("#msg_disp_email_edit").html("Email Should Be Within 4-25 charecter");
			$("#img_disp_email_edit").attr("src","images/not_ok.png");
			$("#img_disp_email_edit").addClass("val_img");
			email_edit=0;
		}
		else {
			var regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	     	if(regx.test(email))
	     	{	
				$("#val_msg_email_edit").fadeIn(900);
				$("#msg_disp_email_edit").removeClass();
				$("#email_edit").removeClass("error_input");
				$("#msg_disp_email_edit").addClass("ok_msg");
				$("#msg_disp_email_edit").html("Email is Ok");
				$("#img_disp_email_edit").attr("src","images/ok.png");
				$("#img_disp_email_edit").addClass("val_img");
				email_edit=1;
	     	}
	     	else 
	     	{
	     		$("#val_msg_email_edit").fadeIn(900);
				$("#msg_disp_email_edit").removeClass();
				$("#email_edit").addClass("error_input");
				$("#msg_disp_email_edit").addClass("error_msg");
				$("#msg_disp_email_edit").html("Please Enter A Valid Email Address ");
				$("#img_disp_email_edit").attr("src","images/not_ok.png");
				$("#img_disp_email_edit").addClass("val_img");
				email_edit=0;

	     	}
		}
	}
	function checkUserNameEdit()
	{
		var un = $("#un_edit").val();
		if(un.length<4)
		{
			$("#val_msg_un_edit").fadeIn(900);
			$("#msg_disp_un_edit").removeClass();
			$("#un_edit").addClass("error_input");
			$("#msg_disp_un_edit").addClass("error_msg");
			$("#msg_disp_un_edit").html("User Name Should Be Within 4-25 charecter");
			$("#img_disp_un_edit").attr("src","images/not_ok.png");
			$("#img_disp_un_edit").addClass("val_img");
			user_name_edit=0;
		}
		else {
			$("#val_msg_un_edit").fadeIn(900);
			$("#msg_disp_un_edit").removeClass();
			$("#un_edit").removeClass("error_input");
			$("#msg_disp_un_edit").addClass("ok_msg");
			$("#msg_disp_un_edit").html("User Name is Ok");
			$("#img_disp_un_edit").attr("src","images/ok.png");
			$("#img_disp_un_edit").addClass("val_img");
			user_name_edit=1;
		}

	}
	function checkPhoneNoEdit()
	{
		var phn = $("#phn_edit").val()

    }     
    $("#update_info_btn").click(function(event){
    	event.preventDefault();
    	//alert("hey"); 
    	first_name_edit=0;
    	last_name_edit=0;         
    	user_name_edit=0; 
    	email_edit=0; 
    	phn_edit=0;
    	checkFirstNameEdit();
		checkLastNameEdit();
		checkUserNameEdit();
		checkEmailEdit();
		if(first_name_edit == 1 && last_name_edit==1 &&
user_name_edit==1 && email_edit==1)
		{
			var fn = $("#fn_edit").val();
			var ln = $("#ln_edit").val();
			var un = $("#un_edit").val();
			var email = $("#email_edit").val();
			var phn = $("#phn_edit").val();
			//alert(fn + ln + un + email + phn);
			$.ajax({
				method:'post',
				async:false,
				url:"update_info.php",
				data:{fn:fn,ln:ln,un:un,email:email,phn:phn},
				success:function(data){
					if(data=="Done")
					{
						$("html, body").animate({ scrollTop: 0 }, "slow");
						$("#val_msg_fn_edit").hide();
						$("#val_msg_ln_edit").hide();
						$("#val_msg_un_edit").hide();
						$("#val_msg_email_edit").hide();
						$("#val_msg_phn_edit").hide();
						$("#success_msg").slideDown(800);

					}
					//else alert(data);
				}
			})
		}
		//else alert(email_edit + " " + first_name_edit + " " + last_name_edit +" "+ user_name_edit);

	})
	$("#close_btn").click(function(){
		$("#success_msg").slideUp(500);
	})
	$("#close_btn_ps").click(function(){
		$("#success_msg_ps_change").slideUp(500);
	})
	$("#view_btn,#view_btn_ps").click(function(){
		window.location.replace("http://localhost/project/dashboard.php");
	})
})
