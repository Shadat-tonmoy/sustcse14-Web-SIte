$(document).ready(function(){

	$("#notification_panel, #notification_div").hide();
	
	$("#notification_btn").unbind("click").bind("click",function(){
		$("#notification_panel, #notification_div").slideToggle("slow");
		$.ajax({
			url:"check_nav_notification.php",
			method:"post",
			beforeSend:function(data)
			{
				

			},
			success:function(data)
			{
				$("#notification_div").html(data);
				$("#num_of_notification").hide();
				$.ajax({
					url:"remove_seen_notification.php",
					method:"post",
					success:function(data)
					{

					}
				})
			}
		})

	})
	$("#num_of_notification").hide();
	checkNewNotification();
		var check = setInterval(checkNewNotification, 30*1000);
		function checkNewNotification(){
		$.ajax({
			method:"post",
			url:"check_new_notification.php",
			success:function(data)
			{
				//alert(data);
				if(data>0)
				{
					$("#num_of_notification").show();
					$("#num_of_notification").text(data);
				}
			}
		})
		}
})