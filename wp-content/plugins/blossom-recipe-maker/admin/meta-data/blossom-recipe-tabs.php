<div id="blossom-recipe-navigation">
    <h2 class="nav-tab-wrapper current">
        <a class="nav-tab nav-tab-active" href="javascript:;"><?php _e( 'Overview', 'blossom-recipe-maker' ); ?></a>
        <a class="nav-tab" href="javascript:;"><?php _e( 'Ingredients', 'blossom-recipe-maker' ); ?></a>
        <a class="nav-tab" href="javascript:;"><?php _e( 'Instructions', 'blossom-recipe-maker' ); ?></a>
        <a class="nav-tab" href="javascript:;"><?php _e( 'Gallery', 'blossom-recipe-maker' ); ?></a>
        <a class="nav-tab" href="javascript:;"><?php _e( 'Recipe Notes', 'blossom-recipe-maker' ); ?></a>
        <a class="nav-tab" href="javascript:;"><?php _e( 'Rating', 'blossom-recipe-maker' ); ?></a>
    </h2>

    <?php

    	// Include the meta-data for rendering the tabbed content
        include BLOSSOM_RECIPE_MAKER_BASE_PATH.'/admin/meta-data/recipe-overview.php' ;
        include BLOSSOM_RECIPE_MAKER_BASE_PATH.'/admin/meta-data/ingredients.php' ;
        include BLOSSOM_RECIPE_MAKER_BASE_PATH.'/admin/meta-data/instructions.php' ;
        include BLOSSOM_RECIPE_MAKER_BASE_PATH.'/admin/meta-data/gallery.php' ;
        include BLOSSOM_RECIPE_MAKER_BASE_PATH.'/admin/meta-data/recipe-notes.php' ;
        include BLOSSOM_RECIPE_MAKER_BASE_PATH.'/admin/meta-data/recipe-ratings.php' ;

        // Add a nonce field for security
        wp_nonce_field( 'blossom_recipe_maker_save', 'blossom_recipe_maker_nonce' );
    ?>
    
</div>