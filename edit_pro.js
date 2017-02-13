$(document).ready(function(){

var fn_edit=0;
var ln_edit=0;
var un_edit=0;
var email_edit=0;
$("#val_msg_fn_edit").hide();
$("#val_msg_ln_edit").hide();
$("#val_msg_un_edit").hide();
$("#val_msg_old_ps").hide();
$("#val_msg_new_ps").hide();
$("#val_msg_new_ps_rpt").hide();
$("#val_msg_email_edit").hide();
$("#val_msg_phn_edit").hide();
	
$("#fn_edit").focusin(function(){
	$("#val_msg_fn_edit").hide();
})
$("#fn_edit").focusout(function(){
	checkFirstNameEdit();
})		
$("#ln_edit").focusin(function(){
	$("#val_msg_ln_edit").hide();
})
$("#ln_edit").focusout(function(){
	checkLastNameEdit();
})	
$("#un_edit").focusin(function(){
	$("#val_msg_un_edit").hide();
})
$("#un_edit").focusout(function(){
	checkUserNameEdit();
})
function checkFirstNameEdit(){
		
		var value = $("#fn_edit").val();
		if(value.length<4)
		{
			$("#val_msg_fn_edit").fadeIn(900);
			$("#msg_disp_fn_edit").addClass("error_msg");
			$("#msg_disp_fn_edit").html("First Name Should Be Within 4-25 charecter");
			$("#img_disp_fn_edit").attr("src","images/not_ok.png");
			$("#img_disp_fn_edit").addClass("val_img");
			fn_edit=0;
		}
		else {
			$("#val_msg_fn_edit").fadeIn(900);
			$("#msg_disp_fn_edit").addClass("ok_msg");
			$("#msg_disp_fn_edit").html("First Name is Ok");
			$("#img_disp_fn_edit").attr("src","images/ok.png");
			$("#img_disp_fn_edit").addClass("val_img");
			fn_edit=1;
		}
	}
	
	function checkLastNameEdit(){
		
		var value = $("#ln_edit").val();
		if(value.length<4)
		{
			$("#val_msg_ln_edit").fadeIn(900);
			$("#msg_disp_ln_edit").removeClass();
			$("#msg_disp_ln_edit").addClass("error_msg");
			$("#msg_disp_ln_edit").html("Last Name Should Be Within 4-25 charecter");
			$("#img_disp_ln_edit").attr("src","images/not_ok.png");
			$("#img_disp_ln_edit").addClass("val_img");
			ln_edit=0;
		}
		else {
			$("#val_msg_ln_edit").fadeIn(900);
			$("#msg_disp_ln_edit").removeClass();
			$("#msg_disp_ln_edit").addClass("ok_msg");
			$("#msg_disp_ln_edit").html("Last Name is Ok");
			$("#img_disp_ln_edit").attr("src","images/ok.png");
			$("#img_disp_ln_edit").addClass("val_img");
			ln_edit=1;
		}
		
	}
	function checkUserNameEdit(){
		
		var value = $("#un_edit").val();
		if(value.length<4)
		{
			$("#val_msg_un_edit").fadeIn(900);
			$("#msg_disp_un_edit").removeClass();
			$("#msg_disp_un_edit").addClass("error_msg");
			$("#msg_disp_un_edit").html("User Name Should Be Within 4-25 charecter");
			$("#img_disp_un_edit").attr("src","images/not_ok.png");
			$("#img_disp_un_edit").addClass("val_img");
			un_edit=0;
		}
		else {
			$("#val_msg_un_edit").fadeIn(900);
			$("#msg_disp_un_edit").removeClass();
			$("#msg_disp_un_edit").addClass("ok_msg");
			$("#msg_disp_un_edit").html("User Name is Ok");
			$("#img_disp_un_edit").attr("src","images/ok.png");
			$("#img_disp_un_edit").addClass("val_img");
			un_edit=1;
			
		}
	}
	$("#update_info_form").submit(function(){
		fn_edit=0;
		ln_edit=0;
		un_edit=0;
		checkFirstNameEdit();
		checkLastNameEdit();
		checkUserNameEdit();
		if(fn_edit==1 && ln_edit==1 && un_edit==1)
		{
			var reg_edit = $("#reg_no_dash").text();
			//alert(reg);
			
			
		}
		else return false;
	})
})