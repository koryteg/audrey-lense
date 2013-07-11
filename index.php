<?php get_header() ?>

  <section class="section-wide" role="main">
    <div class="article-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article class="article" <?php post_class(); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_content(); ?>
      <?php comments_template(); ?>
      <?php wp_link_pages(array('before' => '<p class="page-pagination"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

      <?php echo ace_progress(); ?>
    </article><!-- .article -->
    <?php endwhile; ?>
    </div>
      <footer class="footer-widgets">
      
        <footer class="footer-left">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left Widget') ) : endif; ?>
        </footer><!-- .footer-left -->
      
        <footer class="footer-right">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right Widget') ) : endif; ?>
        </footer><!-- footer-right -->

      </footer><!-- .footer-widgets -->

      <section class="pagination">
        <?php echo get_pagination_links(); ?>
      </section>

    <?php else : ?>

    <article class="article">

      <header class="post-header">
        <h1 class="post-title"><?php _e('Not Found','ace'); ?></h1>
      </header>

      <p><?php _e('You have come to a page that is either not existing or already been removed','ace'); ?>.</p>

      <?php get_search_form();?>

      <div class="clearfix">&nbsp;</div>

      <footer class="footer-widgets">

        <footer class="footer-left">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left Widget') ) : endif; ?>
        </footer><!-- .footer-left -->
      
        <footer class="footer-right">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right Widget') ) : endif; ?>
        </footer><!-- footer-right -->

      </footer><!-- .post-footer -->

    </article><!-- .article -->

    <?php endif; ?>

  </section><!-- .section -->

<?php get_footer(); ?>