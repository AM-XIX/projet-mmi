
$(document).ready(function () {


    $("input").click(function() {
        var id = $(this).attr("id");
        id = "#" + id;
        $(id).select(); 
    });

     $(".tag").click(function () {
         $(".tag").removeClass("active");
         $(this).addClass("active");
     });
 });

 $(function() {
    $('form').submit(function(){
      $.post('http://projet-mmi.les8.ovh', function() {
        window.location = 'http://projet-mmi.les8.ovh';
      });
      return false;
    });
  });
  
function shrink() {
    $("#logo").animate({width: "10vw"});
}

 filterSelection("all");

 function filterSelection(c) {
     var x, i;
     x = document.getElementsByClassName("bail");
     if (c == "all") c = "";
     for (i = 0; i < x.length; i++) {
         w3RemoveClass(x[i], "show");
         if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
     }
 }

 function w3AddClass(element, name) {
     var i, arr1, arr2;
     arr1 = element.className.split(" ");
     arr2 = name.split(" ");
     for (i = 0; i < arr2.length; i++) {
         if (arr1.indexOf(arr2[i]) == -1) {
             element.className += " " + arr2[i];
         }
     }
 }

 function w3RemoveClass(element, name) {
     var i, arr1, arr2;
     arr1 = element.className.split(" ");
     arr2 = name.split(" ");
     for (i = 0; i < arr2.length; i++) {
         while (arr1.indexOf(arr2[i]) > -1) {
             arr1.splice(arr1.indexOf(arr2[i]), 1);
         }
     }
     element.className = arr1.join(" ");
 }





     