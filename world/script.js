$(document).ready(function(){

			$('[data-toggle="tooltip"]').tooltip();
			Notification.requestPermission();
			var notifications="";
			var notifications_array = Array();
			var notifications_num = 0;
			checkNotification();
			var time_interval = setInterval(checkNotification,30*1000);
			
			function checkNotification()
			{				
				$.ajax({
					method:"POST",
					url:"check_notification.php",
					async:false,
					success:function(data)
					{
						//alert(data);
						notifications = data;
						//alert(data);
						notifications_array = data.split(",");
						notifications_num = notifications_array.length;
						//alert(notifications_num);
					}
				})
				for(var i=1;i<notifications_num;i++)
				{
					var notifications_id = notifications_array[i];
					var notification;
					$.ajax({
						method:"POST",
						url:"notifications.php",
						async:false,
						data:{notifications_id:notifications_id},
						success:function(data)
						{
							notification=data;
							if(data!="")
							{

								var notify = new Notification("Notification",{
								body:notification+"Click Here To Check",
								icon:"images/notify.png",
								});
								var class_check = notification.search("Class Schedule");
								var exam_check = notification.search("Upcoming Exam");
								var note_check = notification.search("New Notes");								//alert(notification);
								if(class_check!=-1)
								{
									//alert("HI");
									notify.onclick = function()
									{
										$.ajax({
											url:"class_update.php",
											beforeSend:function(data)
											{
												$("#class_update_loader").show();
											},
											success:function(data){
												$("#class_update_loader").hide();												//$("#class_update_loader").hide();
												$("#sample_class_update_div").html(data);		
											}
										})
										//window.location.replace("http://localhost/project/world/world.php");
									}
								}
								else if(exam_check!=-1)
								{
									//alert("HI");
									notify.onclick = function(event)
									{
										//alert("HI");
										$.ajax({
											async:false,
											url:"upcoming_exam.php",
											beforeSend:function(data)
											{
												$("#exam_update_loader").show();
											},
											success:function(data){
												$("#exam_update_loader").show();
												$("#exam_update_sample_div").html(data);		
											}
										})
										//window.location.replace("http://localhost/project/world/world.php");
									}
								}
								else if(note_check!=-1)
								{
									notify.onclick = function(event)
									{
										alert(notifications_id);										//alert("HI");
										$.ajax({
											method:"post",
											async:false,
											url:"note_link.php",
											data:{notifications_id:notifications_id},
											beforeSend:function(data)
											{
												//alert("Sending...");
												
											},
											success:function(data){
												window.open(data,"_blank");	
											},
											error:function(data)
											{
												//alert(data);
											}
										})
										//window.location.replace("http://localhost/project/world/world.php");
									}


								}
								
							}

						}
					})
				}
			}

			$("#add_link_panel").hide();
			$(".link_btn").click(function(){
				//alert("Hi");
				$("#add_link_panel").fadeIn(800);
			})
			$(".close_link_panel").click(function(){
				$("#add_link_panel").fadeOut(300);	
			})
			

			$(".more_post_loader").hide();
			var done = false;
			//var id = lastID = $('.load_more_posts').attr('lastId');
			//alert(id);
			$(".load_more_posts").unbind('click').bind('click',function(){	
					var request = null;		
					var lastID = $('.load_more_posts').attr('lastId');	
					//alert(lastID);	
					//var scrollPosition = window.pageYOffset;
					//var windowSize = window.innerHeight;
					//var bodyHeight = document.body.offsetHeight;
					//var different = Math.max(bodyHeight - (scrollPosition + windowSize), 0);
					//alert("Diff is "+different);
					if(lastID!=null)
					{
						//alert("SENDING.....");						//alert(lastID);
						request = $.ajax({
			                type:'POST',
			                url:'get_more_post.php',
			                data: {lastID:lastID},
			                //async:true,
			                beforeSend:function(html){
			                    $(".load_more_posts").show();
			                    $(".more_post_loader").show();

			                },
			                success:function(data){
			                	//var load_more = $('.load_more_posts').html();
			                    $('.load_more_posts').remove();
			                    //alert(data);			                    
			                    $('#post_list').append(data);
			                    //$('#post_list').append(load_more);
			                    var id = $('.load_more_posts').attr('lastID');
			                    //alert(id);
			                }
		            	});
		            	//alert(done);
					}
					else// if (lastID == null)
					{
						 //done = true;
						 return false;
					}
    		});
			$(".ldc_img,.ldc_txt").unbind('click').bind('click',(function(){
			var id = $(this).attr("id");

			//alert(id);
			var len = id.length;
			//alert(len);
			var index = id.indexOf("_");
			var index2 = id.indexOf("-");
			var like_dislike = id.slice(index2+1,index);
			var part = id.slice(index+1,len);
			var dislike = id.search("dislike");
			//alert(dislike);		
			if(dislike==-1)
			{
				if($("#txt-like_"+part).hasClass("liked"))
				{
					$("#txt-like_"+part).removeClass("liked");
					$("#like_"+part).text("Like");
					var i
					var like_count = $("#like_count_"+part).text();
					//alert(like_count);
					if(like_count>0)
						like_count--;
					$("#like_count_"+part).text(like_count);
					$("#liked_"+part).text("Like");
					
				}
				else 
				{
					var i
					var like_count = $("#like_count_"+part).text();
					//alert(like_count);
					like_count++;
					$("#like_count_"+part).text(like_count);
					$("#txt-like_"+part).addClass("liked");
					$("#like_"+part).text("Liked");
					

				}
			}
			else 
			{
				if($("#txt-dislike_"+part).hasClass("disliked"))
				{
					var i;
					var dislike_count = $("#dislike_count_"+part).text();					//alert(like_count);
					if(dislike_count>0)
						dislike_count--;
					$("#dislike_count_"+part).text(dislike_count);
					$("#txt-dislike_"+part).removeClass("disliked");
					$("#disliked_"+part).text("Dislike");
				}
				else 
				{
					var i;
					var dislike_count = $("#dislike_count_"+part).text();					//alert(like_count);
					dislike_count++;
					$("#dislike_count_"+part).text(dislike_count);

					$("#txt-dislike_"+part).addClass("disliked");
					$("#dislike_"+part).text("Disiked");

				}
			}//alert(part);
			$.ajax({
				method:"post",
				url:"like_update.php",
				data:{part:part,like_dislike:like_dislike},
			})
		}))
		$(".comment_div").hide();
		$(".comment_loading").hide();
		$(".comment_btn").unbind('click').bind('click',function(){
			var id = $(this).attr("id");
			var i,post_id="";
			for(i=12;i<id.length;i++)
				post_id+=id[i];
			//alert(str);
			var div_id = "#comment_div_"+post_id;
			$.ajax({
				method:"post",
				url:"comment.php",
				data:{post_id:post_id},
				beforeSend:function(html){
			    	$("#comment_loading_"+post_id).show();
				},				
				success:function(data)
				{


					$("#comment_loading_"+post_id).remove();
					$("#comment_list_div_"+post_id).html(data);
					return false;
				}
			})
			$(div_id).slideToggle(500);

		})
		$(".comment_box").unbind('keydown').bind('keydown',function(event){
			if(event.keyCode==13)
			{
				var id = $(this).attr("id");
				var value = $("#"+id).val();
				var i,j,k,post_id="";
				//alert(value);
				for(i=12;i<id.length;i++)
					post_id+=id[i];
				//alert(str);
				if(value=="")
					return false;
				else 
				{
					$.ajax({
						method:"post",
						url:"comment.php",
						data:{post_id:post_id,value:value},
						success:function(data)
						{
							//alert(data);
							$("#comment_list_div_"+post_id).html(data);
							$("#"+id).val("");
							return false;
						}
					})
				}
			}
		})
		$(".post_remove_btn").unbind('click').bind('click',function(){
			var btn_id = $(this).attr("id");
			var post_id = Array();
			post_id = btn_id.split("_");
			var id = post_id[2];
			$.ajax({
				method:"post",
				url:"remove_post.php",
				data:{id:id},
				success:function(data){
					//alert(data);
					$("#post_"+id).fadeOut(900);
					$("#ldc_"+id).fadeOut(900);
				}
			})
		})
		$(".post_edit_div").hide();
		$(".post_edit_btn").unbind('click').bind('click',function(){
			var btn_id = $(this).attr("id");
			//alert(btn_id);
			$("#"+btn_id).hide();
			var post_id_arr = Array();
			post_id_arr = btn_id.split("_");
			var post_id = post_id_arr[2];
			var post_value = $("#posttext_"+post_id).text().trim();
			var new_line = 0;
			var len = post_value.length;
			for(var i=0;i<len;i++)
			{
				if(post_value[i]=='\n')
				{
					new_line++;
				}
			}
			//alert(new_line);
			var row = Math.ceil(len/95) + new_line;
			//alert(len);			//alert(post_value);
			$("#post_edit_box_"+post_id).val(post_value);
			$("#post_edit_box_"+post_id).attr("rows",row);
			$("#post_edit_div_"+post_id).fadeIn(600);
			$("#posttext_"+post_id).hide();
			$("#cancel_editing_"+post_id).click(function(){
				$("#"+btn_id).show();
				$("#post_edit_div_"+post_id).hide();
				$("#posttext_"+post_id).fadeIn(600);
			})
			$("#done_editing_"+post_id).click(function(){
				$("#"+btn_id).show();
				var new_post_value = $("#post_edit_box_"+post_id).val();
				$.ajax({
					method:"post",
					url:"edit_post.php",
					data:{post_id:post_id,new_post_value:new_post_value},
					success:function(data){
						//alert(data);
						$("#posttext_"+post_id).text(new_post_value);
						$("#post_edit_div_"+post_id).hide();
						$("#posttext_"+post_id).fadeIn(600);
					}
				})
				//alert(new_post_value);
			})
			//alert(post_value);

		})
		var time_cnt = setInterval(timer,1000);
		function timer(){
			var d = new Date();
			var crnt_date = 300-d.getDate();
			var crnt_hrs = 24-d.getHours();
			var crnt_min = 60-d.getMinutes();
			var crnt_sec = 60-d.getSeconds();	
			if(crnt_sec<10)
				crnt_sec = "0" + crnt_sec;
			if(crnt_min<10)
				crnt_min = "0" + crnt_min;
			if(crnt_hrs<10)
				crnt_hrs = "0" + crnt_hrs;
			document.getElementById("sem_day").innerHTML = crnt_date;
			document.getElementById("sem_hrs").innerHTML = crnt_hrs;
			document.getElementById("sem_min").innerHTML = crnt_min;
			document.getElementById("sem_sec").innerHTML = crnt_sec;

		}

		$("#datepicker, .exam_date_input").datepicker({
			//changeMonth : true,
			//changeYear : true,
			yearRange : "1950:2020",
			dateFormat : "yy-mm-dd",

		})


		$("#class_div").hide();

		$("#update_btn").unbind('click').bind('click',function(){
			$("#datepicker_panel").show();
			$("#class_div").hide();	
		})
		$.ajax({
			method:"POST",
			url:"class_update.php",
			success:function(data){
				$("#sample_class_update_div").html(data);
				//alert(data);		
			},
			error:function(data)
			{
				$("#sample_class_update_div").html(data);	
			}
		})
		

		var sem_found = false;
		var sem;
		$("#sem_list_class_update").focusout(function(){
			$("#sem_list_class_update").removeClass("error");
		})
		//alert(sem)
		$("#sem_list_class_update").focusout(function(){
			var sem_opt = $("#sem_list_class_update").find(':selected');
			sem = sem_opt.attr("sem");
			if(sem=="0")
			{
				$("#sem_list_class_update").addClass("error");
				sem_found = false;
			}
			else
			{
				sem_found = true;
			}
		})
		var date_found = false;

		$("#datepicker").focusin(function(){
			$("#datepicker").removeClass("error");
		})

		$("#datepicker").focusout(function(){
			var val = $("#datepicker").val();
			//alert(val);
			if(val=="")
			{
				$("#datepicker").addClass("error");
				date_found = false;
			}
			else date_found = true;
		})
		$("#datepicker_btn").click(function(){
			var date = $("#datepicker").val();
			if(date=="")
			{
				$("#datepicker").addClass("error");
				return false;
			}
			if(!sem_found)
			{
				$("#sem_list_class_update").addClass("error");
				return false;
			}
			else 
			{
				$("#datepicker_panel").hide();
				$("#class_div").fadeIn(500);
				var date = $("#datepicker").val();
				//alert(date + sem);
				$.ajax({
					url:"class_list.php",
					method:"post",
					data:{date:date,sem:sem},
					beforeSend:function(html)
					{
						$("#class_div").show();
					},
					success:function(data)
					{
						//alert(data);
						$("#class_div").html(data);
					}
				})
			}			
		})
		$.ajax({
			method:"POST",
			url:"upcoming_exam.php",
			success:function(data)
			{
				$("#exam_update_sample_div").html(data);
			}
		})
		


		$(".semester_img").click(function(){
			var id = $(this).attr("id");
			window.location.replace("notes.php?id="+id);
		})
		$(".notes_body_loader").hide();


		$(".course_title").click(function(){
			var course = $(this).text();			//alert(course);
			$.ajax({
				method:"post",
				url:"notes_list.php",
				data:{course:course},
				beforeSend:function(){
					$(".notes_body_loader").show();

				},
				success:function(data)
				{
					$(".notes_body_loader").hide();					//alert("ki");
					$("#notes_body_content").html(data);
					//$("#notes_body_text").effect("slide",800);
					$("#notes_body_text").hide();
					$("#notes_body_content").removeClass("note_table");
					$("#notes_body_content").effect("slide",800);
					$("#class_note_final").hide();
					$("#reff_book_final").hide();
					$("#sample_question_final").hide();
					$("#others_final").hide();
					$("#note_fg").click(function(){
						$("#notes_body_content").html($("#class_note_final").html());
						$("#notes_body_content").addClass("note_table");
						$("#notes_body_content").effect("slide",800);
						$(".note_remove_btn").click(function(){
							var id = $(this).attr("id");
							var par = $("#"+id).parent();
							//alert($(par).html());
							var grand_par = $(par).parent();
							$.ajax({
								method:"post",
								url:"remove_note.php",
								data:{id:id},
								success:function(data){
									$(grand_par).hide(800);
									//alert(data);
								}
							})
						});

					})
					$("#book_fg").click(function(){
						//alert("Hi");
						$("#notes_body_content").html($("#reff_book_final").html());
						$("#notes_body_content").addClass("note_table");
						$("#notes_body_content").effect("slide",800);
						$(".note_remove_btn").click(function(){
							var id = $(this).attr("id");
							var par = $("#"+id).parent();
							//alert($(par).html());
							var grand_par = $(par).parent();
							$.ajax({
								method:"post",
								url:"remove_note.php",
								data:{id:id},
								success:function(data){
									$(grand_par).hide(800);
									//alert(data);
								}
							})
						});
					})

					$("#question_fg").click(function(){
						//alert("Hi");
						$("#notes_body_content").html($("#sample_question_final").html());
						$("#notes_body_content").addClass("note_table");
						$("#notes_body_content").effect("slide",800);
						$(".note_remove_btn").click(function(){
							var id = $(this).attr("id");
							var par = $("#"+id).parent();
							//alert($(par).html());
							var grand_par = $(par).parent();
							$.ajax({
								method:"post",
								url:"remove_note.php",
								data:{id:id},
								success:function(data){
									$(grand_par).hide(800);
									//alert(data);
								}
							})
						});
					})

					$("#others_fg").click(function(){						//alert("Hi");
						$("#notes_body_content").html($("#others_final").html());
						$("#notes_body_content").addClass("note_table");
						$("#notes_body_content").effect("slide",800);
						$(".note_remove_btn").click(function(){
							var id = $(this).attr("id");
							var par = $("#"+id).parent();
							//alert($(par).html());
							var grand_par = $(par).parent();
							$.ajax({
								method:"post",
								url:"remove_note.php",
								data:{id:id},
								success:function(data){
									$(grand_par).hide(800);
									//alert(data);
								}
							})
						});
					})
				}
			})
		})


		$("#sem_icon_sm").hide()
		$(".note_share_sem_icon").click(function(){
			var sem = $(this).text();
			//alert(sem);
			$.ajax({
				url:"note_share_form.php",
				method:"post",
				data:{sem:sem},
				success:function(data)
				{
					$("#share_note_sem").html(data);
					$("#share_note_sem").fadeIn(900);
					$("#sem_icon_sm").fadeIn(900);
				}
			})
		})

		
})