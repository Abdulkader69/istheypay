(function($) {
    $(document).ready(function() {

        // Show Add Network / Program on Click Function
        $('span#add-network-program-btn').on('click', function() {
            $('#add-network-program').addClass('active');
        });
        $('.modal-dialog .modal-header button.close').on('click', function() {
            $('#add-network-program').removeClass('active');
        });

        $('.multiselect-select2').select2();


        // ==============
        //              Image to SVG code support
        // ==============
        $('img[src$=".svg"]').each(function() {
            var $img = jQuery(this);
            var imgURL = $img.attr("src");
            var attributes = $img.prop("attributes");
    
            $.get(
            imgURL,
            function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find("svg");
    
                // Remove any invalid XML tags
                $svg = $svg.removeAttr("xmlns:a");
    
                // Loop through IMG attributes and apply on SVG
                $.each(attributes, function() {
                $svg.attr(this.name, this.value);
                });
    
                // Replace IMG with SVG
                $img.replaceWith($svg);
            },
            "xml"
            );
        });

    }); //Document Ready
})( jQuery );