$(document).ready(function(){

	$(".notification_remove_icon").click(function(){
		var id = $(this).attr("id");
		var id_array =  Array();
		id_array = id.split("_");
		id = id_array[2];
		$("#notification_"+id).fadeOut(800);
		$.ajax({
			url:"remove_notification.php",
			method:"post",
			data:{id:id},
			success:function(data){
				//alert(data);


			}
		})
	})
})