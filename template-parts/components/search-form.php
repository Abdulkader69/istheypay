<div class="pay-sidebar-search-wrap pay-sidebar-item">
    <h2 class="title">Search Best Networks</h2>
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <div class="search-input">
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Networks…', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
            <input type="hidden" name="post_type" value="networks" />
        </div>
        <div class="search-btn">
            <button type="submit" class="search-submit"><i class="icofont-search-2"></i></button>
        </div>
    </form>
</div>