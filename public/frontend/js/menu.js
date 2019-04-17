 
 //MENU CẤP 2 KHI HOVER
  $(document).ready(function(){
    $("#product").hover(function(){
      $("#showproduct").slideToggle(300);
    });
    $("#infor").hover(function(){
      $("#showinfor").slideToggle(300);
    });
  });

  ///click thoong tin user
   $(document).ready(function(){
   	$("#User").click(function(){
   		$("#Logout").fadeToggle(300);
   	});
   });

 /////Menu small 
 $(document).ready(function(){
   $("#pro-boy").click(function(){
     $("#menuc2a-sm").slideToggle(300);
   });
   $("#pro-girl").click(function(){
     $("#menuc2b-sm").slideToggle(300);
   });
 });
	