$(document).ready(function(){
            
      $("#addmore_btn").click(function(){  
            var tr = document.createElement("tr");
            var date_td = document.createElement("td");
            var date_input = document.createElement("input");
            $(date_input).datepicker({
                  yearRange : "1950:2020",
                  dateFormat : "yy-mm-dd",
             });
            $(date_input).addClass("form-control");
            $(date_input).attr("placeholder","Pick a Valid Date");
            $(date_td).append(date_input);
            $(tr).append(date_td);

            var course_td = document.createElement("td");
            var course_input = document.createElement("input");
            $(course_input).addClass("form-control");
            $(course_input).attr("placeholder","Course Name of Exam");
            $(course_td).append(course_input);
            $(tr).append(course_td); 

            $(tr).appendTo("#exam_table");                      
      })
      $(".exam_date_input").datepicker({
            yearRange : "1950:2020",
            dateFormat : "yy-mm-dd",
      })
      $("#exam_update_submit_btn").click(function(){
            var tr = $("#exam_table").find("tr");
            var td = $(tr).find("td");
            var div = $(td).children();
            var count = 0,i=0,j=0;
            var date,course,date_found=false,course_found=false;
            var date_array = new Array();
            var course_array = new Array();
            $(td).children().each(function(){
                  var value = $(this).val();
                  if(value!="")
                  {
                        count++;
                        //alert(count);
                        if(count%2==0)
                        {
                              course = value;
                              course_found = true;
                              course_array[i]=course;
                              i++;
                        }
                        else 
                        {
                              date = value;
                              date_found = true;
                              date_array[j]=date;
                              j++;
                        }
                        if(date_found && course_found)
                        {
                              date_found = false;
                              course_found = false;
                        }                        
                  }
            })
            var ok = false;
            for(i=0;i<course_array.length;i++)
            {
                  date = date_array[i];
                  course = course_array[i];
                  //alert(date+course);
                  $.ajax({
                        method:"post",
                        url:"update_exam.php",
                        data:{date:date,course:course},
                        async:false,
                        success:function(data){
                              ok = true;
                              alert(data);
                              //window.location.replace("http://localhost/project/world/world.php");
                        }
                  })
            }
            if(ok)
            {
                  var notification = "Your Upcoming Exam Schedule is Updated.  ";
                  $.ajax({
                        method:"POST",
                        url:"insert_notification.php",
                        data:{notification:notification},
                        success:function(data)
                        {
                              //window.location.replace("http://localhost/project/world/world.php");
                              //alert(data);
                        }
                  })
            }
            //else alert("THE WEB APLLICARION HAS A PROBLEM...WE ARE WORKING ON IT");
      })
      $("#exam_list_div").hide();
      $("#cancel_exam_btn").click(function(){
            $("#exam_update_div").hide();
            $("#exam_list_div").fadeIn(800);
      })
      $("#update_back_btn").click(function(){
            $("#exam_update_div").fadeIn(800);
            $("#exam_list_div").hide();
      })
      $("#remove_done_btn").click(function(){

            var notification = "Your Upcoming Exam Schedule is Updated.  ";
            $.ajax({
                  method:"POST",
                  url:"insert_notification.php",
                  data:{notification:notification},
                  success:function(data)
                  {
                        //$("#exam_update").modal("toggle");
                        //window.location.replace("http://localhost/project/world/world.php");      //alert(data);
                  }
            })
            //window.location.replace("http://localhost/project/world/world.php");
      })
      $(".remove_exam_btn").click(function(){
            var id = $(this).attr("id");
            var btn = $(this);
            $.ajax({
                  method:"post",
                  url:"remove_exam.php",
                  data:{id:id},
                  success:function(data){
                        $("#exam"+id).css({"opacity":"0.4"});
                        $("#date"+id).css({"opacity":"0.4"});
                        $(btn).css({"opacity":"0.4"});
                        $(btn).text("Removed");
                        $(btn).addClass("disabled");
                        $("#row"+id).fadeOut(800);

                  }
            })
      })         
})