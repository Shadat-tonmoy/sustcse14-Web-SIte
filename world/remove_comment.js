$(document).ready(function(){
	$(".comment_remove_btn").click(function(){
			var btn_id = $(this).attr("id");
			var comment_id_arr = Array();
			comment_id_arr = btn_id.split("_");
			var comment_id = comment_id_arr[2];
			$.ajax({
				method:"post",
				url:"remove_comment.php",
				data:{comment_id:comment_id},
				success:function(data){
					$("#comment_"+comment_id).fadeOut(900);
				}
			})
	})
	$(".comment_edit_div").hide();
	$(".comment_edit_btn").click(function(){

		var btn_id = $(this).attr("id");
		var comment_id_arr = Array();
		comment_id_arr = btn_id.split("_");
		var comment_id = comment_id_arr[2];
		var post_value = $("#comment_value_"+comment_id).text().trim();
		var len = post_value.length;
		var row = Math.ceil(len/50);
		$("#comment_edit_"+comment_id).hide();
		$("#comment_remove_"+comment_id).hide();
		$("#comment_edit_box_"+comment_id).val(post_value);
		$("#comment_edit_box_"+comment_id).attr("rows",row);		
		$("#comment_edit_div_"+comment_id).fadeIn(600);
			$("#comment_value_"+comment_id).hide();
			$("#cancel_editing_"+comment_id).click(function(){
				$("#comment_edit_div_"+comment_id).hide();
				$("#comment_value_"+comment_id).fadeIn(600);
				$("#comment_edit_"+comment_id).show();
				$("#comment_remove_"+comment_id).show();
			})
			$("#done_editing_"+comment_id).click(function(){
				var new_comment_value = $("#comment_edit_box_"+comment_id).val();
				$.ajax({
					method:"post",
					url:"edit_comment.php",
					data:{comment_id:comment_id,new_comment_value:new_comment_value},
					success:function(data){
						//alert(data);
						$("#comment_value_"+comment_id).text(new_comment_value);
						$("#comment_edit_div_"+comment_id).hide();
						$("#comment_value_"+comment_id).fadeIn(600);
						$("#comment_edit_"+comment_id).show();
						$("#comment_remove_"+comment_id).show();
					}
				})
				//alert(new_post_value);
			})
			//alert(post_value);

		})
})