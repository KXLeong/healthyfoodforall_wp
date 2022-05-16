<?php 
$post_id = get_query_var( 'print', false );
$recipe = get_post_meta( $post_id, 'br_recipe', true );

?>
<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo get_bloginfo('name'); ?></title>
	<script src="<?php echo includes_url( '/js/jquery/jquery.js' ); ?>"></script>
	<script src="<?php echo BLOSSOM_RECIPE_MAKER_URL ?>/public/js/blossom-recipe-print.js"></script>
</head>
<body class="blossom-recipe-print">

	<div id="br-recipe-container-<?php echo $post_id;?>" data-id="<?php echo $post_id;?>">
    
    <div class="br-recipe-rows">
        
        <div class="br-recipe-row">

        	<span class="br-recipe-title">
        		<h4><?php the_title();?></h4>      		
        	</span>
        </div>

        <div class="br-recipe-row">    
        	
        	<span class="br-recipe-description">
        		<?php 
        		$post = get_post($post_id); 
	            $content = strip_shortcodes( $post->post_content ); 
	            echo $content; ?>
        	</span>    
        
        </div>

        <div class="br-recipe-row">
        	<ul class="br-recipe-tags">
        		<?php if(isset($recipe['details']['difficulty_level']) && !empty($recipe['details']['difficulty_level']))
				{
	        		?>
	        		<li class="br-recipe-tags-difficulty">
	            		<span class="br-recipe-tag-name">
	            		<?php _e('Difficulty: ', 'blossom-recipe-maker');?>
	            		</span>
	            		<span class="br-recipe-tag-terms">
	            		<?php _e( $recipe['details']['difficulty_level'], 'blossom-recipe-maker');?>
	            		</span>       
	            	</li>
	            	<?php
	            }

            	if(has_term('', 'recipe-category', $post_id))
				{
	            	?>
	            	<li class="br-recipe-tags-category">
	            		<span class="br-recipe-tag-name">
	            		<?php _e('Category: ', 'blossom-recipe-maker');?>
	            		</span>
	            		<span class="br-recipe-tag-terms">
	            		<?php echo get_the_term_list( $post_id, 'recipe-category', '', ', ' );?>
	            		</span>       
	            	</li>
	            	<?php
	            }

	            if(has_term('', 'recipe-cuisine', $post_id))
				{
	    			?>
	    			<li class="br-recipe-tags-cuisine">
	    				<span class="br-recipe-tag-name">
	    				<?php _e('Cuisine: ', 'blossom-recipe-maker');?>
	    				</span>
	    				<span class="br-recipe-tag-terms">
	    					<?php echo get_the_term_list( $post_id, 'recipe-cuisine', '', ', ' );?>
	    				</span>
	    			</li>
	    			<?php
	    		}
	    		
	    		if(has_term('', 'recipe-cooking-method', $post_id))
				{
	    			?>
	    			<li class="br-recipe-tags-cooking-method">
	    				<span class="br-recipe-tag-name">
	    				<?php _e('Cooking Method: ', 'blossom-recipe-maker');?>
	    				</span>
	    				<span class="br-recipe-tag-terms">
	    					<?php echo get_the_term_list( $post_id, 'recipe-cooking-method', '', ', ' );?>
	    				</span>
	    			</li>
	    			<?php
	    		}
	    		?>
			</ul>
		</div>

        <div class="br-recipe-row">
            <?php 
			if(isset($recipe['details']['servings']) && !empty($recipe['details']['servings']))
			{
				?>
				<div class="br-recipe-servings">					
                	<span class="br-recipe-title">
        				<?php _e('Servings: ', 'blossom-recipe-maker');?></span>    

        			<span class="br-recipe-servings">
                		<?php echo esc_html( $recipe['details']['servings']);?></span>

        			<span class="br-recipe-servings-yield">
        			<?php _e('yield(s)', 'blossom-recipe-maker');?></span> 
        		</div> 
        			
        		<?php
        	} 

        	if(isset($recipe['details']['prep_time']) && !empty($recipe['details']['prep_time'] ))
			{
				?>	                 
    			<div class="br-recipe-prep-time">
        			<span class="br-recipe-title">
        				<?php _e('Prep Time: ', 'blossom-recipe-maker');?></span>                               		
                        
        			<span class="br-recipe-prep-time">
        				<?php echo esc_html( $recipe['details']['prep_time']);?></span>

        			<span class="br-recipe-prep-time-text">
        			<?php _e('mins', 'blossom-recipe-maker');?></span>
                </div>
                <?php
        	} 

        	if(isset($recipe['details']['cook_time']) && !empty($recipe['details']['cook_time']))
			{
				?>
				<div class="br-recipe-cook-time">
						
                    <span class="br-recipe-title">
                    	<?php _e('Cook Time: ', 'blossom-recipe-maker');?></span>

                    <span class="br-recipe-cook-time">
                        <?php echo esc_html( $recipe['details']['cook_time']);?></span>

                    <span class="br-recipe-cook-time-text">
                    	<?php _e('mins', 'blossom-recipe-maker');?></span>  

                </div>
                <?php
        	}                        
                        
            if(isset($recipe['details']['total_time']) && !empty($recipe['details']['total_time']))
			{
				?>                
				<div class="br-recipe-total-time">
					<span class="br-recipe-title">
                            <?php _e('Total Time: ', 'blossom-recipe-maker');?></span>

                    <span class="br-recipe-total-time">
                        <?php echo esc_html( $recipe['details']['total_time']);?></span>

                    <span class="br-recipe-total-time-text">
                            <?php _e('mins', 'blossom-recipe-maker');?></span>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="br-recipe-row">         

        <?php 

		$ingredient_names = array_column($recipe['ingredient'], 'ingredient');

		$filteredingredients = array_filter($ingredient_names);

		if(isset($recipe['ingredient']) && !empty($filteredingredients)) 
		{	
  			?>
  			<span class="br-recipe-title"><h5><?php _e('Ingredients', 'blossom-recipe-maker');?></h5></span>

        	<ul class="br-recipe-ingredient-container">

        		<?php
				foreach( $recipe['ingredient'] as $ingredient ) {

                	if(isset($ingredient['heading']) && !empty($ingredient['heading']))
                    {
	                    ?>
	                    <span class="br-recipe-ingredient-group">
	                    	<h5><?php echo esc_attr( $ingredient['heading'] );?></h5>
	                	</span>	                    
	                    <?php
                    }

                	elseif(isset($ingredient['ingredient']) && !empty($ingredient['ingredient']))
					{
					?>
		                <li class="br-recipe-ingredient">
		                	<span class="br-recipe-box">

		                		<span class="br-recipe-ingredient-quantity">
		                			<?php esc_html_e($ingredient['quantity'], 'blossom-recipe-maker');?></span>

		                		<span class="br-recipe-ingredient-unit">
		                			<?php echo esc_html($ingredient['unit']);?></span>
		                	</span>

		                	<span class="br-recipe-box">
    							
    							<span class="br-recipe-ingredient-name">
    							<?php echo esc_html($ingredient['ingredient']);?></span>

    							<?php if(!empty($ingredient['notes']))
    								{
    									echo '<span class="br-recipe-ingredient-notes">('
	    								. esc_html($ingredient['notes']). '</span>)';
	    							}
	    							?>
    						</span>
						</li>
					<?php

					}
						
				}
				?>
			</ul>
			<?php
		}
		?>
		</div>

		<div class="br-recipe-row">

        <?php 

		$instruction_description = array_column($recipe['instructions'], 'description');

		$filtereddescription = array_filter($instruction_description);

		if(($recipe['instructions']) && (!empty($filtereddescription))) 
		{	
  			?>
  			<span class="br-recipe-title"><h5><?php _e('Instructions', 'blossom-recipe-maker');?></h5></span> 

  			<ol class="br-recipe-instruction-container">

  				<?php 
				foreach( $recipe['instructions'] as $instruction ) {

					if(isset($instruction['heading']) && !empty($instruction['heading']))
                    {
                    	?>
                    	<span class="br-recipe-instruction-group">
                    	<h5><?php echo esc_attr( $instruction['heading'] );?></h5></span>
                    	<?php
                    }

					elseif(isset($instruction['description']) && !empty($instruction['description']))
					{
						?>
						<li class="br-recipe-instruction">

							<span class="br-recipe-instruction-text">
								<?php echo esc_html( $instruction['description']);?></span>
						</li>
						<?php

					}
						
				}
				?>
			</ol>
			<?php
		}
		?>
		</div>

		<?php if(isset($recipe['notes']) && !empty($recipe['notes'])) 
		{
			?>
			<div class="br-recipe-row">
				<span class="br-recipe-title"><h5><?php _e('Recipe Notes', 'blossom-recipe-maker');?></h5></span>

	        	<div class="br-recipe-notes">
	        		<p><?php echo html_entity_decode( $recipe['notes']);?></p>
				</div>
	        </div>
	        <?php
	    }
	    ?>

</body>
</html>