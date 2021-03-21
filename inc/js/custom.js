(function ($) {
    $(document).ready(function () {

        // Form Handling Scripts
        $('.afp-field, .adn-field').each(function (index, item) {
            const $input = $(item).find('input'),
                $textarea = $(item).find('textarea');

            $(item).css('display', 'none');
            $input.attr('disabled', true);
            $textarea.attr('disabled', true);
        });

        $('body').on('change', '#network_program_type', function (e) {
            const $selectVal = parseInt($(this).val()),
                $afnField = $('.afn-field'),
                $afpField = $('.afp-field'),
                $adnField = $('.adn-field');

            if ($selectVal === 1) {
                $afnField.css('display', 'block');
                $afnField.find('input').attr('disabled', false);
                $afnField.find('textarea').attr('disabled', false);

                $afpField.css('display', 'none');
                $afpField.find('input').attr('disabled', true);
                $afpField.find('textarea').attr('disabled', true);

                $adnField.css('display', 'none');
                $adnField.find('input').attr('disabled', true);
                $adnField.find('textarea').attr('disabled', true);
            } else if ($selectVal === 2) {
                $afnField.css('display', 'none');
                $afnField.find('input').attr('disabled', true);
                $afnField.find('textarea').attr('disabled', true);

                $afpField.css('display', 'block');
                $afpField.find('input').attr('disabled', false);
                $afpField.find('textarea').attr('disabled', false);

                $adnField.css('display', 'none');
                $adnField.find('input').attr('disabled', true);
                $adnField.find('textarea').attr('disabled', true);
            } else {
                $afnField.css('display', 'none');
                $afnField.find('input').attr('disabled', true);
                $afnField.find('textarea').attr('disabled', true);

                $afpField.css('display', 'none');
                $afpField.find('input').attr('disabled', true);
                $afpField.find('textarea').attr('disabled', true);

                $adnField.css('display', 'block');
                $adnField.find('input').attr('disabled', false);
                $adnField.find('textarea').attr('disabled', false);
            }
        });






        $('.multiselect-select2').select2({
            minimumResultsForSearch: -1
        });

        // ==============
        //              Image to SVG code support
        // ==============
        $('img[src$=".svg"]').each(function () {
            var $img = jQuery(this);
            var imgURL = $img.attr("src");
            var attributes = $img.prop("attributes");

            $.get(
                imgURL,
                function (data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find("svg");

                    // Remove any invalid XML tags
                    $svg = $svg.removeAttr("xmlns:a");

                    // Loop through IMG attributes and apply on SVG
                    $.each(attributes, function () {
                        $svg.attr(this.name, this.value);
                    });

                    // Replace IMG with SVG
                    $img.replaceWith($svg);
                },
                "xml"
            );
        });

        // Show Mobile Menu on Click Function
        $('#main-navigation .hamburger').on('click', function () {
            $(this).toggleClass('is-active');
            $('.menu-main-menu-container').slideToggle();
        });

        // Show Mobile Sub-Menu on Click Function
        $('.pay-main-header nav#main-navigation ul#primary-menu > li.menu-item-has-children > a').on('click', function () {
            $(this).next('ul.sub-menu').slideToggle();
        });

        // Add dynamacally add fields
        $("#add-more").click(function (e) {
            $("#aff-contact").append(
                '<div class="add-network-program-item-sub"><input type="text" name="aff-contact-name" id="aff-contact-name" placeholder="Name"><input type="text" name="aff-contacts-info" id="aff-contacts-info" placeholder="ex: Email:abc@abc.com, skype:abcde"><span id="close">-</span></div>'
            );
        });
        $("body").on("click", ".add-network-program-item-sub span#close", function (e) {
            $(this).parent().remove();
        });

        // Pages Blogs Sliders
        $('.pay-blog-slider-wrapper').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            dots: true,
            nav: false,
            smartSpeed: 1000,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
        });

        $('.pay-top-five-title:first-child').addClass('current');
        $('.pay-top-five-hover-state:first-child').addClass('current');
        // Pages Top Five Networks Tabs
        $('.pay-top-five-networks-inner .pay-top-five-left li').hover(function(){
            var tab_id = $(this).attr('data-tab');
    
            $('.pay-top-five-networks-inner .pay-top-five-left li').removeClass('current');
            $('.pay-top-five-hover-state').removeClass('current');
    
            $(this).addClass('current');
            $("#"+tab_id).addClass('current');
        })


        var cont = 0
        var initialTime = $('.chart').data('percent');
        $(function() {
            //create instance
            $('.chart').easyPieChart({
                size: 230,
                barColor: "#EE4224",
                scaleLength: 0,
                lineWidth: 10,
                trackColor: "",
                lineCap: "circle",
                animate: 1000,
            });

            var interval = setInterval(function() {
                cont = cont + 0.3
                $('.chart').data('easyPieChart').update(initialTime + cont);
                console.log(initialTime + cont)
                if(initialTime + cont >= 5){
                    clearInterval(interval)
                }
            }, 1000);
        
        });

        // Sidebar Reviews Sliders
        $('.nm-review-slide-wrap').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            dots: false,
            nav: false,
            smartSpeed: 1000,
        });


    }); //Document Ready
})(jQuery);