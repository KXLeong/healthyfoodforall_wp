<?php
/**
 * Fired during plugin activation
 *
 * @link       test.com
 * @since      1.0.0
 *
 * @package    Blossom_Recipe
 * @subpackage Blossom_Recipe/includes/frontend
 */

/**
 * Show Recipe Search Results.
 *
 * This class defines all code necessary to run during the recipe search.
 *
 * @since      1.0.0
 * @package    Blossom_Recipe
 * @subpackage Blossom_Recipe/includes/frontend
 * @author     Blossom <test@test.com>
 */
class Blossom_Recipe_Maker_Search_Results{

	public function __construct() {

		add_action( 'show_recipe_search_results_action', array( $this, 'show_recipe_search_results' ) );

	}

	public function show_recipe_search_results()
	{
	 	$options = get_option('br_recipe_settings', array() );
	 	$pageID = $options['pages']['recipe_search'];
	
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	    $default_posts_per_page = (isset($options['no_of_recipes']) && (!empty($options['no_of_recipes']))) ? $options['no_of_recipes'] : get_option( 'posts_per_page' );

		// Query arguments.
		$args = array(
			'post_type'      				=> 'blossom-recipe',
			'posts_per_page' 				=> $default_posts_per_page,
			'wpse_search_or_tax_query'      => true,
			'paged' 						=> $paged
	    );

		if(isset($_GET['recipe-search-nonce']) && wp_verify_nonce( $_GET['recipe-search-nonce'], 'recipe-search-nonce' ))
		{

			if(isset($_GET['recipe_search']))
			{

				if(isset($_GET['search']) && !empty($_GET['search']))
				{
					$keyword = $_GET['search'];
					$args['s'] = $keyword;
				}
				
				if( isset( $_GET['recipe-category'] ) && !empty( $_GET['recipe-category'] ) ) 
				{
					$category = $_GET['recipe-category'];
				}

				if( isset( $_GET['recipe-cuisine'] ) && !empty( $_GET['recipe-cuisine'] ) ) 
				{
					$cuisine = $_GET['recipe-cuisine'];
				}

				if( isset( $_GET['recipe-cooking-method'] ) && !empty( $_GET['recipe-cooking-method'] ) ) 
				{
					$method = $_GET['recipe-cooking-method'];
				}

				if( isset( $_GET['recipe-tag'] ) && !empty( $_GET['recipe-tag'] ) ) 
				{
					$tag = $_GET['recipe-tag'];
				}

				$taxquery = array();

				if( !empty( $category ) && $category!= -1  ){
					array_push($taxquery,array(
						'taxonomy' => 'recipe-category',
						'field'    => 'slug',
						'terms'    => $category,
						'include_children' => false,
					));
				}
				if( !empty( $cuisine ) && $cuisine!= -1  ){
					array_push($taxquery,array(
						'taxonomy' => 'recipe-cuisine',
						'field'    => 'slug',
						'terms'    => $cuisine,
						'include_children' => false,
					));
				}
				if( !empty( $method ) && $method!= -1  ){
					array_push($taxquery,array(
						'taxonomy' => 'recipe-cooking-method',
						'field'    => 'slug',
						'terms'    => $method,
						'include_children' => false,
					));
				}
				if( !empty( $tag ) && $tag!= -1  ){
					array_push($taxquery,array(
						'taxonomy' => 'recipe-tag',
						'field'    => 'slug',
						'terms'    => $tag,
						'include_children' => false,
					));
				}
				if(!empty($taxquery))
				{
		   			$args['tax_query'] = $taxquery;
				}
			}
		}
		$obj = new Blossom_Recipe_Maker_Functions();					
		
		$search_query = new WP_Query($args);

		?>
	
		<div class="recipe-search-wrap">

		   	<?php 
		   	echo ($search_query->found_posts > 0) ? '<h3 class="postsFound">' . $search_query->found_posts. __(' recipe(s) found','blossom-recipe-maker').'</h3>' : '<h3 class="postsFound">'.__( 'No results found!','blossom-recipe-maker' ).'</h3>'; 

			if( $search_query->have_posts() ) : 
			?>
				<div class="grid" itemscope itemtype="http://schema.org/ItemList">
					<?php
				 	while ( $search_query->have_posts() ) 
				 	{
						$search_query->the_post(); 
					    $recipe = get_post_meta( get_the_ID(), 'br_recipe', true );
						?>
					  	<div class="col" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					  		<meta itemprop="position" content="<?php echo get_the_ID(); ?>" />
	                   		<div class="img-holder">
								<a href="<?php the_permalink(); ?>" class="recipe-post-thumbnail">
									<?php 
									$img_size = apply_filters( 'br_search_img_size', 'recipe-maker-thumbnail-size' );

									if( has_post_thumbnail() ){ 
										echo wp_get_attachment_image ( get_post_thumbnail_id(),  $img_size ); 
					      			}  
					      			else{
										$obj->brm_get_fallback_svg( $img_size );//falback

				                    }?>
								</a>
							</div>
							<div class="text-holder">
								<h3 class="entry-title">
									<a href="<?php the_permalink();?>">
										<?php the_title();?>
									</a>
								</h3>
								<?php
				    				do_action('br_recipe_category_links_action');
				    			?>
								<div class="recipe-description">
									<?php
									if ( has_excerpt() ){
										the_excerpt();
									}
									else
									{
										$post = get_post();
							            $content = apply_filters('get_the_excerpt', $post->content, $post);
							            echo wp_trim_words( $content, 55, '...' ); 
									}					
									?>
								</div>
								<div class="readmore-btn">
									<a itemprop="url" class="more-button" href="<?php the_permalink();?>"><?php _e('View Recipe' , 'blossom-recipe-maker');?></a>
								</div>                           
							</div>

						</div>
					<?php
					}
				?>
				</div>

				<?php
				$obj->pagination_bar( $search_query );
			
				wp_reset_postdata();

			endif;
			?>

		</div>
		<?php
	}

}
new Blossom_Recipe_Maker_Search_Results();