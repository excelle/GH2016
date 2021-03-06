<?php
/**
 * Widget Name: Popular Posts with a Thumbnail
 * Description: A Popular Posts widget that displays a thumbnail from your blog.
 * Version: 1.0
 */

class sw_PopularWidget extends WP_Widget {

    function __construct() {
        parent::__construct(false, $name = esc_html__('SW Popular Posts', 'crystalskull'));
    }

    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $nopost=$instance['nopost'];
        ?>

	<?php $crystalskull_allowed = wp_kses_allowed_html( 'post' ); echo wp_kses($before_widget,$crystalskull_allowed); ?>
<?php if($instance['title']){ ?><div class="title-wrapper"> <h3 class="widget-title"><i class="fa fa-newspaper-o"></i> <?php echo esc_attr($instance['title']) ; ?></h3><div class="clear"></div></div> <?php } ?>

    <ul class="review">

<?php $pc = new WP_Query(array('meta_key' => 'overall_rating' , 'orderby' => array( 'comment_count' => 'DESC', 'meta_value_num' => 'DESC' ), 'cat' => $instance['cat'], 'posts_per_page' => $nopost   ));
if ( $pc->have_posts() ) : ?>
<?php while ($pc->have_posts()) : $pc->the_post(); ?>


      <li><a rel="bookmark" href="<?php the_permalink(); ?>">		<div class="img">

					<?php if(has_post_thumbnail()){

							$thumb = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
							$image = crystalskull_aq_resize( $img_url, 368, 148, true ); //resize & crop img
							?>
							<img alt="img" src="<?php echo esc_url($image); ?>" />

					<?php } else{ ?>
						<img alt="img" src="<?php echo esc_url(get_template_directory_uri()).'/img/defaults/default.jpg'?> "/>
					<?php } ?>
					<span class="overlay-link"></span>

				</div>
        <div class="info">
<small>
<i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?></small>

        	<a href="<?php the_permalink(); ?>" class="pw_maint">
          <?php the_title(); ?>
          </a>

          <?php
		global $post;

        $prim_cat = get_post_meta($post->ID, 'prim_cat', true);
        if($prim_cat) {
            $cat_data = get_option("category_$prim_cat");
        } else {
            $categories = wp_get_post_categories($post->ID);
            $cat_data = get_option("category_$categories[0]"); 
        }        

		// overall stars
		$postid=$pc->post->ID;
		$overall_rating = get_post_meta($post -> ID, 'overall_rating', true); ?>
					<?php if(of_get_option('rating_type') == 'numbers'){ ?>


			                	<?php
					if($overall_rating != "0" && $overall_rating=="0.5"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 0.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 1</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1.5"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 1.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 2</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2.5"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 2.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 3</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3.5"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 3.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 4</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4.5"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 4.5</b>/5
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "5"){ ?>
					<div class="overall-score">
						<b style="color: <?php echo esc_attr($cat_data["catBG"]); ?>"><i class="fa fa-trophy"></i> 5</b>/5
					</div>
					<?php } ?>



					<?php }else{ ?>

			                	<?php
					if($overall_rating != "0" && $overall_rating=="0.5"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "1.5"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "2.5"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "3.5"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "4.5"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
					</div>
					<?php } ?>

					<?php
					if($overall_rating != "0" && $overall_rating == "5"){ ?>
					<div class="overall-score" style="color: <?php echo esc_attr($cat_data["catBG"]); ?>">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<?php } ?>

					<?php } ?>

		</div>
		<div class="clear"></div>
		</a>
      </li>
      <?php endwhile;  ?>
      <?php else : ?>
      <li><div><?php esc_html_e("No popular posts!", 'crystalskull'); ?></div></li>
      <?php endif; wp_reset_postdata(); ?>

    </ul>


              <?php echo wp_kses($after_widget,$crystalskull_allowed); ?>
        <?php
    }

/** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
	$instance = $old_instance;

	$instance['title'] = strip_tags($new_instance['title']);
	$instance['cat'] = strip_tags($_POST['cat']);
	$instance['nopost'] = strip_tags($new_instance['nopost']);

        return $instance;
    }

/** @see WP_Widget::form */
    function form($instance) {
    	$defaults = array('title' => esc_html__('SW Popular Posts', 'crystalskull' ), 'cat'=> '', 'nopost' => '5');
		$instance = wp_parse_args((array) $instance, $defaults);

        $title = esc_attr($instance['title']);
        $category = esc_attr($instance['cat']);
        $nopost = esc_attr($instance['nopost']);
        ?>
         <p>
          <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'crystalskull'); ?></label>
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
         <p>
          <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category:', 'crystalskull'); ?></label>
          <?php wp_dropdown_categories('show_option_all='.esc_html__("All categories",'crystalskull').'&selected='. $category); ?>
        </p>
         <p>
          <label for="<?php echo esc_attr($this->get_field_id('nopost')); ?>"><?php esc_html_e('No. of Posts:', 'crystalskull'); ?></label>
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('nopost')); ?>" name="<?php echo esc_attr($this->get_field_name('nopost')); ?>" type="text" value="<?php echo esc_attr($nopost); ?>" />
        </p>
        <?php
    }

}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("sw_PopularWidget");'));
?>