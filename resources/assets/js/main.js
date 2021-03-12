// $( document ).ready(function() {
//     var  currentWidth = document.body.offsetWidth < 465 ? 190 : 150;
//     $('.custom-toggler').on('click',function () {
//
//         $('#overlay').toggleClass('active');
//         $('#mainMenu').toggleClass('active');
//         $('.custom-toggler').toggleClass('collapsed');
//
//         $('#body').toggleClass('overflow');
//         $('.sidebar-wrapper').toggleClass('show');
//
//     });
//
//     $(".smooth a").on('click', function(event) {
//
//         // alert('test');
//         // // Make sure this.hash has a value before overriding default behavior
//         if (this.hash !== "") {
//
//             $(document).off("scroll");
//             // Prevent default anchor click behavior
//             event.preventDefault();
//
//             $('.nav-item a').each(function () {
//                 $(this).removeClass('active');
//             });
//
//             $(this).addClass('active');
//             //
//             var top = $(this.hash).offset().top - currentWidth;
//
//             console.log(top);
//             //
//             //     // Using jQuery's animate() method to add smooth page scroll
//             //     // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
//             $('html, body').animate({
//                 scrollTop: parseInt(top)
//             }, 500, () => {
//
//                 $(document).on("scroll", onScroll);
//                 // window.location.hash = this.hash;
//             });
//         }
//     });
//
//     $(".sidebar a").on('click', function(event) {
//
//         console.log(this.hash);
//         //
//         // // Make sure this.hash has a value before overriding default behavior
//         if (this.hash !== "") {
//             $('#overlay').toggleClass('active');
//             $('#mainMenu').toggleClass('active');
//             $('.custom-toggler').toggleClass('collapsed');
//
//             $('#body').toggleClass('overflow');
//             $('.sidebar-wrapper').toggleClass('show');
//
//             $(document).off("scroll");
//             // Prevent default anchor click behavior
//             event.preventDefault();
//
//             $('.sidebar-item a').each(function () {
//                 $(this).removeClass('active');
//             });
//
//             $(this).addClass('active');
//             // //
//             var top = $(this.hash).offset().top - currentWidth;
//
//             // Using jQuery's animate() method to add smooth page scroll
//             // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
//             $('html, body').animate({
//                 scrollTop: parseInt(top)
//             }, 500, function(){
//
//                 $(document).on("scroll", onScroll);
//                 // window.location.hash = this.hash;
//             });
//
//
//         }
//     });
//
//
//
//     $(document).on("scroll", onScroll);
//
//
//
// });
//
// function onScroll(event){
//
//     var  currentWidth = document.body.offsetWidth < 465 ? 75 : 180;
//     var scrollPos = $(document).scrollTop();
//
//     $('#nav a').each(function () {
//         var currLink = $(this);
//         var refElement = $(currLink.attr("href"));
//         var top = refElement.position().top - currentWidth;
//         if (top <= scrollPos && top + refElement.height() > scrollPos) {
//             $('#nav ul li a').removeClass("active"); //added to remove active class from all a elements
//             currLink.addClass("active");
//         }
//         else{
//             currLink.removeClass("active");
//         }
//     });
// }