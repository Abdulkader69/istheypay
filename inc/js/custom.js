(function($) {
    $(document).ready(function() {

        // Show Add Network / Program on Click Function
        $('span#add-network-program-btn').on('click', function() {
            $('#add-network-program').addClass('active');
        });
        $('.modal-dialog .modal-header button.close').on('click', function() {
            $('#add-network-program').removeClass('active');
        });

    }); //Document Ready
})( jQuery );