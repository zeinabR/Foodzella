$(function() {
    new WOW().init(); // wow.js for scrolling animation
// $("restaurant").click(function()
//                       {
//     $("R1").show();
//     $(this).hide();
// });

 //scroll to sections

//  $(".navbar .navbar-nav a.nav-link").on("click", function() {
//     var object = $(this);
//     $("html ,body").animate({
//         scrollTop: $(".restaurantORrecipe").offset().top - 55
//     }, 700);
// });
$(".form form input").on("blur", function() {
    if ($(this).is(":invalid")) {
        $(this).removeClass("is-valid");
        $(this).addClass("is-invalid");
    } else {
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");
    }
});

//login sec
        function check_empty() {
        if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
        alert("Fill All Fields !");
        } else {
        document.getElementById('form').submit();
        alert("Form Submitted Successfully...");
        }
        }

        $(".success").on("click", function() {
            $(".success").hide();   
        });

        $(".error .close").on("click", function() {
            $(".error").hide();   
        });


       
        // var buttonpressed;
        // $(".submitbutton").on("click",function(){
        //     buttonpressed = $(this).attr('name');
    
        // });
    
        // $('form').submit(function() {
        //       alert('button clicked was ' + buttonpressed)
        //         buttonpressed=''
        //     return(false)
        // });
    
       

$('.arrow').click(function() {
    $('html,body').animate({
        scrollTop: $('.about').offset().top - 55
    }, 700);
});

});