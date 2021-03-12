var currentWidth = document.body.offsetWidth < 465 ? 190 : 150;
export default class LoadPlugin {


    app() {


        $('.custom-toggler').on('click', function () {

            $('#overlay').toggleClass('active');
            $('#mainMenu').toggleClass('active');
            $('.custom-toggler').toggleClass('collapsed');

            $('#body').toggleClass('overflow');
            $('.sidebar-wrapper').toggleClass('show');

        });


        $(".scroll").on('click', function (event) {

            // alert('test');
            // // Make sure this.hash has a value before overriding default behavior
            if (event.target.dataset.id) {

                $(document).off("scroll");
                // Prevent default anchor click behavior
                event.preventDefault();

                $('.nav-item a').each(function () {
                    $(this).removeClass('active');
                });

                $(this).addClass('active');
                //
                var top = $(event.target.dataset.id).offset().top - currentWidth;


                $('html, body').animate({scrollTop: parseInt(top)}, 100);

            }
        });


        $(".sidebar a").on('click', function (event) {


            // // Make sure this.hash has a value before overriding default behavior
            if (event.target.dataset.id) {

                $('#overlay').toggleClass('active');
                $('#mainMenu').toggleClass('active');
                $('.custom-toggler').toggleClass('collapsed');

                $('#body').toggleClass('overflow');
                $('.sidebar-wrapper').toggleClass('show');

                $(document).off("scroll");
                // Prevent default anchor click behavior
                event.preventDefault();

                $('.sidebar-item a').each(function () {
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
                //

                //
                var top = $(event.target.dataset.id).offset().top - currentWidth;


                $('html, body').animate({scrollTop: parseInt(top)}, 100);



            }
        });


    }


}