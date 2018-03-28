$(document).ready(function(){
	$(".toooltip_like").unbind("mouseover").bind("mouseover",function(){
		var id = $(this).attr("id");
		var i,post_id="";
		for(i=9;i<id.length;i++)
			post_id+=id[i];
		$.ajax({
			url:"see_who_liked.php",
			method:"post",
			data:{post_id:post_id},
			beforesend:function()
			{
				$("#tooltip_text_"+post_id).html("Loading....");

			},
			success:function(data)
			{
				$("#tooltip_text_"+post_id).html(data);

			}

		})
	})

})