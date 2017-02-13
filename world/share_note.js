$(document).ready(function(){
	$("#notes_addmore_btn").click(function(){
		var clone = $("#notes_row").clone();
		$(clone).find("td").each(function(){
			var td = $(this);
			var input = $(td).find("input");
			var select = $(td).find("select");
			$(input).val("");
			$(input).removeClass("error");
			$(select).removeClass("error");
		})		
		$(clone).appendTo("#note_table");
		//alert("Cliced");
	})

	var tr = $("#note_table").find("tr");
	$(tr).find("td").each(function(){
		var select = $(this).find("select");
		var input = $(this).find("input");
		$(input).focusin(function(){
			$(this).removeClass("error");
		})
		$(select).focusin(function(){
			$(this).removeClass("error");
		})
	})
	$("#note_share_now_btn").click(function(){
		var select_count = 0;
		var td_count = 0;
		var error = false;
		var tr = $("#note_table").find("tr");
		var author="",link="",type="",name="",desc="";
		var author_input,link_input,desc_input,type_select;
		var course_array = new Array();
		var author_array = new Array();
		var link_array = new Array();
		var type_array = new Array();
		var desc_array = new Array();
		var i=0;
		var found = false;
			$(tr).find("td").each(function(){
				var tag = $(this).prop("tagName");
				//alert(tag);
				var select = $(this).find("select");
				var input = $(this).find("input");
				
				if(input.attr("placeholder")=="Author Name" && author=="")
				{
					author = $(input).val();
					author_input = $(input);					
					//alert(author);				
					//alert(author);
				}
				else if(input.attr("placeholder")=="Paste Your Notes Link Here" && link=="")
				{
					link = $(input).val();
					link_input = $(input);
					//alert(link);
				}
				else if(input.attr("placeholder")=="Add a Short Description" && desc=="")
				{
					desc = $(input).val();
					desc_input = $(input);
					//alert(link);
				}
				else if(select_count%2==0 && name=="")
				{
					name=$(select).find(":selected").val();
					//alert(name);
					select_count++;
				}
				else if(select_count%2==!0 && type=="")
				{
					type=$(select).find(":selected").val();
					type_select = $(select);					
					//alert(type);
					select_count++;
				}
				td_count++;
				//alert(td_count);
				if(td_count%5==0)
				{	
					//alert("OOO");
					//alert(type);				//alert(final);
					if(name!="Select a Course")
					{

						if(author=="")
						{
							$(author_input).addClass("error");
							error=true;
							//return false;
						}
						if(link=="")
						{
							$(link_input).addClass("error");
							error=true;
							//return false;
						}
						if(type=="Select a Type")
						{
							//alert("true");
							//alert($(select).html());
							$(type_select).addClass("error");
							error=true;
							//return false;
						}
						if(!error)
							found=true;
						else found=false;
					}
					else found=false;
					if(found)
					{
						course_array[i]=name;
						author_array[i]=author;
						link_array[i]=link;
						type_array[i]=type;
						desc_array[i]=desc;
						i++;
					}
					author="",link="",type="",name="",desc="";
				}
				//alert(name);
			})
			if(error)
				return false;
			else 
			{
				var j=0;
				var ok = false;
				for(j=0;j<i;j++)
				{
					var course_name = course_array[j];
					var author_name = author_array[j];
					var link = link_array[j];
					var type = type_array[j];
					var desc = desc_array[j];
					$.ajax({
						url:"share_note.php",
						method:"post",
						data:{course_name:course_name,author_name:author_name,link:link,type:type,desc:desc},
						async:false,
						success:function(data){
							ok = true;
							$("#share_note_sem").html(data);

						}
					})
				}
				if(ok)
				{
					//alert(ok);
					var notification = "You Have New Notes Uploaded.  ";
					$.ajax({
						method:"POST",
						url:"insert_notification.php",
						data:{notification:notification},
						success:function(data)
						{
							window.location.replace("http://localhost/project/world/world.php");
							//alert(data);
						}
					})

				}

			}

		
	})
})