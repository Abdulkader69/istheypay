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
        }).on('click', '.add-more', function (e) {
            e.preventDefault();
            const $repeaterWrapper = $(this).closest('.add-network-program-item').find('.aff-contact');
            const $repeaterItem = $(this).closest('.add-network-program-item').find('.add-network-program-item-sub').first();
            $('.repeater-item .error-message').remove();
            const $newClonedItem = $repeaterItem.clone();
            $newClonedItem.find('.repeater_name').val('');
            $newClonedItem.find('.repeater_email').val('');
            $repeaterWrapper.append($newClonedItem);

        }).on('click', '.itp-close', function (e) {
            const $totalItems = $(this).closest('.aff-contact').find('.add-network-program-item-sub').length;
            const $item = $(this).closest('.add-network-program-item-sub');
            if ($totalItems > 1) {
                $item.remove();
            } else {
                alert('At least 1 item needs to be here!')
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
        $('.pay-top-five-networks-inner .pay-top-five-left li').hover(function () {
            var tab_id = $(this).attr('data-tab');

            $('.pay-top-five-networks-inner .pay-top-five-left li').removeClass('current');
            $('.pay-top-five-hover-state').removeClass('current');

            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })


        var cont = 0
        var initialTime = $('.chart').data('percent');
        $(function () {
            //create instance
            $('.chart').easyPieChart({
                size: 230,
                barColor: "#EE4224",
                scaleLength: 0,
                lineWidth: 15,
                trackColor: "",
                lineCap: "circle",
                animate: 1000,
            });
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

        // Submit Review Form Active/ Deactive
        $("body").on("click", ".pay-sn-btns .write-review-btn", function (e) {
            $('#reviews-form-popup').addClass('active');
        }).on("click", "#reviews-form-popup span#close", function (e) {
            $('#reviews-form-popup').removeClass('active');
        });

        // File Upload with Preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-preview').attr('src', e.target.result);
                    $('#image-preview').hide();
                    $('#image-preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file-input").change(function () {
            readURL(this);
        });

        // Rating System 
        /* 1. Visualizing things on Hover - See next part for action on click */
        $('.pay-rat li').on('mouseover', function () {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.pay-rat-li').each(function (e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function () {
            $(this).parent().children('li.pay-rat-li').each(function (e) {
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('.pay-rat li').on('click', function () {
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.pay-rat-li');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }
        });

        $('.pay-rat li.star').on('mouseover', function () {
            var value = $(this).data('title');
            $('.overall-rat .message-box').html("<p>" + value + "</p>");
        });

        // On click update input value
        $("body").on("click", "#stars li.star", function (e) {
            var value = $(this).data('value');
            $('#overall-rating').val(value).next('.error-wrapper').find('.error-message').remove();
        }).on("click", "#offers li", function (e) {
            var value = $(this).data('value');
            $('#offers-rating').val(value).next('.error-wrapper').find('.error-message').remove();
        }).on("click", "#payout li", function (e) {
            var value = $(this).data('value');
            $('#payout-rating').val(value).next('.error-wrapper').find('.error-message').remove();
        }).on("click", "#tracking li", function (e) {
            var value = $(this).data('value');
            $('#tracking-rating').val(value).next('.error-wrapper').find('.error-message').remove();
        }).on("click", "#support li", function (e) {
            var value = $(this).data('value');
            $('#support-rating').val(value).next('.error-wrapper').find('.error-message').remove();
        });

    }); //Document Ready

    $(window).on('load', function() {
		$('#preloader').fadeOut('slow');
	})
})(jQuery);