<?php get_header(); ?>

  <section class="section-wide" role="main">

    <article class="article">

      <header class="post-header">
        <h1 class="post-title"><?php _e('Error 404 - Not Found','ace'); ?></h1>
      </header>

      <p><?php if (get_option("ace_404_page") == true) { echo get_option("ace_404_page"); } else { echo _e('404 Not Found','ace'); } ?></p>

      <?php get_search_form();?>

      <div class="clearfix">&nbsp;</div>

    </article><!-- .article -->

  </section><!-- .section -->

<?php get_footer(); ?>