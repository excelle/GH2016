<?php get_header(); ?>
<?php $custombck = wp_get_attachment_url( get_post_thumbnail_id($wp_query->post->ID) ); ?>
<?php if(empty($custombck)){}else{ ?>
<?php require_once(get_template_directory() .'/css/header-image-post.css.php'); ?>
<?php } ?>
 <!-- Page content
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="blog blog-ind">
	<div class="container ">
	<div class="row">

		<div class="col-lg-12 col-md-12">

			<div class="col-lg-8 col-md-8 ">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php require_once (get_template_directory() .'/blog-single.php'); ?>
				<?php endwhile; endif; ?>
				<div class="clear"></div>
				<div class="pagination">
						<?php
						$args = array(
			                'before'           => '<ul>',
			                'after'            => '</ul>',
			                'link_before'      => '',
			                'link_after'       => '',
			                'next_or_number'   => 'next_and_number',
			                'separator'        => '',
			                'nextpagelink'     => '&raquo;',
			                'previouspagelink' => '&laquo;',
			                'pagelink'         => '%',
			                'echo'             => 1
        				);
        				wp_link_pages($args); ?>
				</div>

					<div id="comments"  class="block-divider"></div>
					<?php comments_template('/short-comments-blog.php'); ?>


			</div><!-- /.span8 -->

			<div class="col-lg-4 col-md-4  ">
				<?php require_once (get_template_directory() .'/sidebar.php'); ?>
			</div><!-- /.span4 -->

		</div><!-- /.span12 -->

	</div><!-- /row -->
	</div>
</div><!-- /containerblog -->

<?php get_footer(); ?>