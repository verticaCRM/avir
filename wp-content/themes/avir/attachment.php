<?php
/**
 * The template for displaying attachments.
 *
 */
get_header();
?>
<!--Start Content Grid-->
<div class="mainblogwrapper">
	<div class="container">
		<div class="row">
			<div class="mainblogcontent">
            <div class="col-md-12  col-sm-12 ">
  <ol class="breadcrumb theme-background1-dk theme-color2-lt">
          <?php avir_breadcrumbs(); ?>
        </ol>
      </div>
				<div class="col-md-9">
				<!-- *** Post loop starts *** -->

                <div class="article-page">
					<h1 class="article-page-head"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                <?php if (have_posts())
                    while (have_posts()) : the_post();
                        ?>
                        <p><a href="<?php echo get_permalink($post->post_parent); ?>" title="<?php esc_attr(printf(__('Return to %s', 'bbcrm'), get_the_title($post->post_parent))); ?>" rel="gallery">
                                <?php
                                /* translators: %s - title of parent post */
                                printf(__('<span>&larr;</span> %s', 'bbcrm'), get_the_title($post->post_parent));
                                ?>
                            </a></p>
                         
                      <p class="att-meta">   <?php
                        printf(__('By %2$s', 'bbcrm'), 'meta-prep meta-prep-author', sprintf('<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>', get_author_posts_url(get_the_author_meta('ID')), sprintf(esc_attr__('View all posts by %s', 'bbcrm'), get_the_author()), get_the_author()
                                )
                        );
                        ?>
                        <span>|</span>
                        <?php
                        printf(__('Published %2$s', 'bbcrm'), 'meta-prep meta-prep-entry-date', sprintf('<abbr title="%1$s">%2$s</abbr>', esc_attr(get_the_time()), get_the_date()
                                )
                        );
                        if (wp_attachment_is_image()) {
                            echo ' | ';
                            $metadata = wp_get_attachment_metadata();
                            printf(__('Full size is %s pixels', 'bbcrm'), sprintf('<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>', wp_get_attachment_url(), esc_attr(__('Link to full-size image', 'bbcrm')), $metadata['width'], $metadata['height']
                                    )
                            );
                        }
                        ?>
                    <?php edit_post_link(__('Edit', 'bbcrm'), '', ''); ?>
                    </p> 
                    <!-- .entry-meta -->
                    <?php
                    if (wp_attachment_is_image()) :
                        $attachments = array_values(get_children(array('post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID')));
                        foreach ($attachments as $k => $attachment) {
                            if ($attachment->ID == $post->ID)
                                break;
                        }
                        $k++;
                        // If there is more than 1 image attachment in a gallery
                        if (count($attachments) > 1) {
                            if (isset($attachments[$k]))
                            // get the URL of the next image attachment
                                $next_attachment_url = get_attachment_link($attachments[$k]->ID);
                            else
                            // or get the URL of the first image attachment
                                $next_attachment_url = get_attachment_link($attachments[0]->ID);
                        } else {
                            // or, if there's only 1 image attachment, get the URL of the image
                            $next_attachment_url = wp_get_attachment_url();
                        }
                        ?>
                        <p><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="attachment">
                                <?php
                                $attachment_size = apply_filters('avir_attachment_size', 900);
                                echo wp_get_attachment_image($post->ID, array($attachment_size, 9999)); // filterable image width with, essentially, no limit for image height.
                                ?>
                            </a></p>
                        <?php previous_image_link(false); ?>
                        <?php next_image_link(false); ?>
                    <?php else : ?>
                        <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="attachment"><?php echo basename(get_permalink()); ?></a>
                    <?php endif; ?>
                    <?php if (!empty($post->post_excerpt))
                        the_excerpt();
                    ?>
                    <?php the_content(__('Continue reading &rarr;', 'bbcrm')); ?>
                    <?php wp_link_pages(array('before' => '' . __('Pages:', 'bbcrm'), 'after' => '')); ?>       
        <?php edit_post_link(__('Edit', 'bbcrm'), ' ', ''); ?>
        
        </div>
        <div class="clearfix"></div>
        
        <?php comments_template(); ?>
    <?php endwhile; ?>
      <div class="clearfix"></div>
				</div>
				<div class="col-md-3">
                
                <?php get_sidebar(); ?>
				<!-- *** Sidebar Ends *** -->
				</div>
			</div>
		</div>
	</div>
</div>
                
                
<?php get_footer(); ?>
