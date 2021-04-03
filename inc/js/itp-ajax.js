;(function ($) {
    $(document).ready(function () {

        $('body').on('submit', '#add-network-program', function (e) {
            e.preventDefault();

            const requiredInputs = $('.add-network-program-item input[required]:not([disabled]), .add-network-program-item textarea[required]:not([disabled]), .add-network-program-item select[required]:not([disabled])');
            const requiredFields = requiredInputs.map(function (index, item) {
                return item.name;
            }).toArray();

            const formData = new FormData(this);
            formData.append('action', 'itp_create_network');
            formData.append('required_fields', requiredFields);

            // Prepare repeater field data and pass with ajax
            let repeaterData = {};
            const currentType = $('#network_program_type').val();
            if (parseInt(currentType) === 1) {
                let afnAaContacts = [];
                const repeaterFields = $('.afn_aa_contacts-repeater .add-network-program-item-sub');
                repeaterFields.map(function (index, item) {
                    const $itemName = $(item).find('.repeater_name');
                    const $itemEmail = $(item).find('.repeater_email');
                    // if ($itemName.val().trim() === '') {
                    //     $itemName.next('.error-wrapper').append('<p class="error-message">This field is required!</p>');
                    //     hasError = true;
                    // }
                    // if ($itemEmail.val().trim() === '') {
                    //     $itemEmail.next('.error-wrapper').append('<p class="error-message">This field is required!</p>');
                    //     hasError = true;
                    // }
                    if ($itemName.val().trim() && $itemEmail.val().trim()) {
                        afnAaContacts.push([$itemName.val(), $itemEmail.val()]);
                    }
                });
                repeaterData.afn_aa_contacts = afnAaContacts;
            } else if (parseInt(currentType) === 2) {
                let afpAsTeam = [];
                const repeaterFields = $('.afp_as_team-repeater .add-network-program-item-sub');
                repeaterFields.map(function (index, item) {
                    const $itemName = $(item).find('.repeater_name');
                    const $itemEmail = $(item).find('.repeater_email');
                    if ($itemName.val().trim() && $itemEmail.val().trim()) {
                        afpAsTeam.push([$itemName.val(), $itemEmail.val()]);
                    }
                });
                repeaterData.afp_as_team = afpAsTeam;
            } else if (parseInt(currentType) === 3) {
                let adnFpContacts = [];
                const repeaterFields1 = $('.adn_fp_contacts-repeater .add-network-program-item-sub');
                repeaterFields1.map(function (index, item) {
                    const $itemName = $(item).find('.repeater_name');
                    const $itemEmail = $(item).find('.repeater_email');
                    if ($itemName.val().trim() && $itemEmail.val().trim()) {
                        adnFpContacts.push([$itemName.val(), $itemEmail.val()]);
                    }
                });
                repeaterData.adn_fp_contacts = adnFpContacts;

                let adnFaContacts = [];
                const repeaterFields2 = $('.adn_fa_contacts-repeater .add-network-program-item-sub');
                repeaterFields2.map(function (index, item) {
                    const $itemName = $(item).find('.repeater_name');
                    const $itemEmail = $(item).find('.repeater_email');
                    if ($itemName.val().trim() && $itemEmail.val().trim()) {
                        adnFaContacts.push([$itemName.val(), $itemEmail.val()]);
                    }
                });
                repeaterData.adn_fa_contacts = adnFaContacts;
            }

            formData.append('repeater_fields', JSON.stringify(repeaterData));

            $.ajax({
                method: 'POST',
                url: itpAjax.ajaxUrl,
                contentType: false,
                processData: false,
                data: formData,
                beforeSend: function () {
                    $("p.error-message").remove();
                    $('#add-network-program #loading').append('<div class="loader-spinner"></div>');
                },
                success: function (res) {
                    $('.loader-spinner').remove();
                    if (res.status === false) {
                        // Show error message
                        res.errors.map(function (item) {
                            $('#' + item).closest('.add-network-program-item').find('.error-wrapper').append('<p class="error-message">This field is required!</p>');
                        });
                        // Scroll to first error message
                        $([document.documentElement, document.body]).animate(
                            {scrollTop: $("p.error-message").first().offset().top - 200},
                            500
                        );
                    } else if (res.status === true) {
                        location.reload();
                    }
                },
                error: function (err) {
                    $('.loader-spinner').remove();
                    alert('Something went wrong! Please, try again.');
                }
            });
        }).on('submit', '#submit-review-form', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            formData.append('action', 'itp_create_review');

            $.ajax({
                method: 'POST',
                url: itpAjax.ajaxUrl,
                contentType: false,
                processData: false,
                data: formData,
                beforeSend: function () {
                    $("p.error-message").remove();
                    $('#submit-review-form').append('<div class="loader-spinner"><div></div></div>');
                },
                success: function (res) {
                    $('.loader-spinner').remove();
                    if (res.status === false) {
                        // Show error message
                        res.errors.map(function (item) {
                            $('#' + item).next('.error-wrapper').append('<p class="error-message">This field is required!</p>');
                        });
                        // Scroll to first error message
                        $([document.documentElement, document.body]).animate(
                            {scrollTop: $("p.error-message").first().offset().top - 200},
                            500
                        );
                    } else if (res.status === true) {
                        location.reload();
                    }
                },
                error: function (err) {
                    $('.loader-spinner').remove();
                    alert('Something went wrong! Please, try again.');
                }
            });
        }).on('change', '.filter-select', function (e) {
            $('#ppn-filter-form').submit();
        }).on('submit', '#ppn-filter-form', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            formData.append('action', 'itp_filter_network');

            $.ajax({
                method: 'POST',
                url: itpAjax.ajaxUrl,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function () {
                    $('.affiliate-networks .pay-premium-networks-posts').append('<div class="loader-spinner"><div></div></div>');
                },
                success: function (res) {
                    $('.affiliate-networks .pay-premium-networks-posts').html(res);
                    $('.pay-networks-row').html(res);
                    $('.loader-spinner').remove();
                },
                error: function (err) {
                    $('.loader-spinner').remove();
                    alert('Something went wrong! Please, try again.');
                }
            });


        })
    });
})(jQuery);