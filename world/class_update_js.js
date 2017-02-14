		$(document).ready(function(){
			$(".class_cancel_btn").click(function(){
				var id = $(this).attr("id");
				var siblings = $(this).siblings();
				var input = $(siblings).find("input");
				$(input).attr('checked',false);
				$(this).fadeOut(600);
				var id_arr = id.split('_');
				var class_id = id_arr[2];
				$(input).attr('checked',false);
				$(this).fadeOut(600);
				/*$.ajax({
					method:"POST",
					url:"update_class.php",
					data:{class_id:class_id},
					success:function(data)
					{
						//alert(data);
						
					}
				})*/
			})
			$(".start_hrs").focusin(function(){
				var id = $(this).attr("id");
				var field = "#"+id;
				var value = $(field).val();
				$(field).removeClass("error");

			})
			$(".start_hrs").focusout(function(){
				var id = $(this).attr("id");
				var field = "#"+id;
				var value = $(field).val();
				//alert(value);
				if(value=="Hour")
				{
					$(field).addClass("error");

				}
			})

			$(".start_min").focusin(function(){
				var id = $(this).attr("id");
				var field = "#"+id;
				var value = $(field).val();
				$(field).removeClass("error");

			})
			$(".start_min").focusout(function(){
				var id = $(this).attr("id");
				var field = "#"+id;
				var value = $(field).val();
				//alert(value);
				if(value=="Min")
				{
					$(field).addClass("error");

				}
			})

			$(".end_hrs").focusin(function(){
				var id = $(this).attr("id");
				var field = "#"+id;
				var value = $(field).val();
				$(field).removeClass("error");

			})
			$(".end_hrs").focusout(function(){
				var id = $(this).attr("id");
				var field = "#"+id;
				var value = $(field).val();
				//alert(value);
				if(value=="Hour")
				{
					$(field).addClass("error");

				}
			})

			$(".end_min").focusin(function(){
				var id = $(this).attr("id");
				var field = "#"+id;
				var value = $(field).val();
				$(field).removeClass("error");

			})
			$(".end_min").focusout(function(){
				var id = $(this).attr("id");
				var field = "#"+id;
				var value = $(field).val();
				//alert(value);
				if(value=="Min")
				{
					$(field).addClass("error");

				}
			})



			$("#class_update_btn").click(function(){
				var i=1,ok=true;
				for(i=1;i<=9;i++)
				{
					var id = $("#course"+i).attr("id");
					var data = $("#"+id).is(':checked');
					var start_hrs_ck,start_min_ck,end_hrs_ck,end_min_ck;
					if(data)
					{
						var id2 = "hrs"+id;
						var start_hrs = $("#"+id2).find(':selected').text();
						var id3 = "min"+id;
						var start_min = $("#"+id3).find(':selected').text();
						var id4 = "end_hrs"+id;
						var id5 = "end_min"+id;
						var end_hrs = $("#"+id4).find(':selected').text();
						var end_min = $("#"+id5).find(':selected').text();
						var course = $("#"+id).parent().text();
						var id6 = "venue"+id;
						var venue = $("#"+id6).val();
						var date = $("#datepicker").val();
						var final = course + "From " + start_hrs + " : " + start_min + "To " + end_hrs + " : " + end_min + " at "+ venue;
						if(start_hrs=="Hour")
						{

							$("#"+id2).addClass("error");
							ok=false;
						}
						else $("#"+id2).removeClass("error");
						
						if(start_min=="Min")
						{

							$("#"+id3).addClass("error");
							ok=false;
						}
						else $("#"+id3).removeClass("error");

						if(end_hrs=="Hour")
						{

							$("#"+id4).addClass("error");
							ok=false;
						}
						else $("#"+id4).removeClass("error");

						if(end_min=="Min")
						{

							$("#"+id5).addClass("error");
							ok=false;
						}
						else $("#"+id5).removeClass("error");

					}
				}
				if(!ok)
					return false;
				else 
				{
					var done = false;
					var del = 55;
					$.ajax({
						method:"POST",
						url:"update_class.php",
						data:{del:del},
						success:function(data){
							var tmp = data;
							//alert(data);

						}
					})
					for(i=1;i<=9;i++)
					{						
						var id = $("#course"+i).attr("id");
						var data = $("#"+id).is(':checked');
						var start_hrs_ck,start_min_ck,end_hrs_ck,end_min_ck;
						if(data)
						{
							done = true;
							var id2 = "hrs"+id;
							var start_hrs = $("#"+id2).find(':selected').text();
							var id3 = "min"+id;
							var start_min = $("#"+id3).find(':selected').text();
							var id4 = "end_hrs"+id;
							var id5 = "end_min"+id;
							var end_hrs = $("#"+id4).find(':selected').text();
							var end_min = $("#"+id5).find(':selected').text();
							var course = $("#"+id).parent().text();
							var id6 = "venue"+id;
							var venue = $("#"+id6).val();
							var date = $("#datepicker").val();
							var final = course + "From " + start_hrs + " : " + start_min + "To " + end_hrs + " : " + end_min + " at "+ venue;
							$.ajax({
								method:"post",
								url:"update_class.php",
								async:false,
								data:{date:date,course:course,start_hrs:start_hrs,start_min:start_min,end_hrs:end_hrs,end_min:end_min,venue:venue},
								success:function(data){									//alert(data);
									//alert(data);
									var tmp = data;
									//window.location.replace("http://localhost/project/world/world.php");
								}
							})
						}
					}
					if (done)
					{
							var notification = "Your Class Schedule is Updated.  ";
							$.ajax({
								method:"POST",
								url:"insert_notification.php",
								data:{notification:notification},
								success:function(data)
								{
									var tmp = data;
									//window.location.replace("http://localhost/project/world/world.php");
									//alert(data);
								}
							})
					}
					else if(!done)
					{
							var notification = "Your Class Schedule is Updated.  ";
							$.ajax({
								method:"POST",
								url:"insert_notification.php",
								data:{notification:notification},
								success:function(data)
								{
									var tmp = data;
									//window.location.replace("http://localhost/project/world/world.php");
									//alert(data);
								}
							})
						//window.location.replace("http://localhost/project/world/world.php");
					}

				}
				
			})
		})