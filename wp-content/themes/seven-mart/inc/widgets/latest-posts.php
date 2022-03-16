<?php
/**
 * Latest Posts.
 *
 * @package seven_mart
 */

function seven_mart_latest_posts() {
	register_widget( 'seven_mart_Latest_Posts' );
}
add_action( 'widgets_init', 'seven_mart_latest_posts' );

class seven_mart_Latest_Posts extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'widget_latest_posts',
		  'description' => esc_html__( 'Add Widget to Display Latest Posts.', 'seven-mart' )
		);
		parent::__construct( 'seven_mart_Latest_Posts',esc_html__( 'Seven Mart: Latest Posts', 'seven-mart' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
			array( 
			  'category'       	=> '', 
			  'number'          => 3, 
			) 
		);
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;   
	?>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Select Category:', 'seven-mart' ); ?>			
			</label>

			<?php
				wp_dropdown_categories(array(
					'show_option_none' => '',
					'class' 		  => 'widefat',
					'show_option_all'  => esc_html__('Recent Posts','seven-mart'),
					'name'             => esc_attr($this->get_field_name( 'category' )),
					'selected'         => absint( $category ),          
				) );
			?>
		</p>

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
	    		<?php echo esc_html__( 'Choose Number (Max: 3)', 'seven-mart' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="3" />
	    </p>	
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['category'] 			= absint( $new_instance['category'] );		
		$instance['number'] 			= absint( $new_instance['number'] );
		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args );     	
        $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3; 
        echo $before_widget;
        ?>   		    
	        
        <?php $blog_args = array(
            'posts_per_page' 		=> absint( $number ),
            'post_type' 			=> 'post',
            'post_status' 			=> 'publish',
            'ignore_sticky_posts'   => true,   
        );

        if ( absint( $category ) > 0 ) {
          $blog_args['cat'] = absint( $category );
        }

        $the_loop = new WP_Query( $blog_args ); 

        if ($the_loop->have_posts()) : $count= 0; ?>		            
    		<div class="blog-archive col-3">
        		<?php while ( $the_loop->have_posts() ) : $the_loop->the_post(); ?>
                    <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail' ?>">
        				<div class="blog-post-item">
							<div class="featured-image">
								<a href="<?php the_permalink(); ?>">
	                        	<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?></a>
							</div><!-- .featured-image -->

							<div class="entry-container">
								<div class="category-meta">
									<?php seven_mart_entry_footer(); ?>
								</div><!-- .category-meta -->

								<header class="entry-header">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</header><!-- .entry-header -->

								<div class="entry-meta">
									<?php
										seven_mart_posted_by();
										seven_mart_posted_on();
									?>
								</div><!-- .entry-meta -->

								<?php $excerpt = get_the_excerpt();
								if ( !empty($excerpt) ) { ?>
									<div class="entry-content">
										<?php the_excerpt(); ?>
									</div><!-- .entry-content -->
								<?php } ?>
							</div><!-- .entry-container -->
						</div><!-- .blog-post-item -->
                    </article>
        		<?php endwhile; ?>
            </div><!-- .col-3 -->
            <?php wp_reset_postdata(); ?>
        <?php endif;?>
	        		    
        <?php echo $after_widget;
    } 
}