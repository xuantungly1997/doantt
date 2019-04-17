new WOW().init();
var listitems =document.querySelectorAll(".sale-off");
var listitems1 =document.querySelectorAll(".maincontent-head");
var listitems2 =document.querySelectorAll(".hotproduct-head");
var listitems3 =document.querySelectorAll(".category");
var listitems4 =document.querySelectorAll(".hotproduct-content__sp");
var listitems5 =document.querySelectorAll(".maincontent-more");

listitems.forEach(function(i){
   i.classList.add("wow","bounceInUp");//hiệu ứng               
   i.setAttribute("data-wow-duration","1s"); //thời gian chạy
   i.setAttribute("data-wow-delay",".2s"); //thời gian delay
   //i.setAttribute("data-wow-iteration","3");// số lần hiệu ứng
});

listitems1.forEach(function(i){
	i.classList.add("wow","flipInX");
});
listitems2.forEach(function(i){
	i.classList.add("wow","rollIn");
});
listitems3.forEach(function(i){
	i.classList.add("wow","bounceIn");
	 i.setAttribute("data-wow-delay",".8s");
});
listitems4.forEach(function(i){
	i.classList.add("wow","zoomInUp");
	 i.setAttribute("data-wow-delay",".8s");
});
listitems5.forEach(function(i){
	i.classList.add("wow","fadeInLeftBig");
	 i.setAttribute("data-wow-delay",".8s");
});
