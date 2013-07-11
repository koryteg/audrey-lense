</section><!-- .container -->

<p class="footer-copy" role="contentinfo">
  <?php if( get_option('ace_footer_credit') == true ) { echo stripslashes( get_option('ace_footer_credit') ); } else { ?>&copy; <?php _e('Copyright','ace'); ?> <a href="<?php echo esc_url( home_url('/') ); ?>" itemtype="copyrightHolder"><?php bloginfo('name'); ?></a> <span itemtype="copyrightYear" content="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></span>. <?php _e('Powered by','ace'); ?> <a href="http://www.wordpress.org">WordPress</a> Website Development by <a href="http://www.korytegman.com">Kory Tegman</a><?php } ?>
</p>

<?php wp_footer(); ?>

<?php echo ace_footer_scripts(); ?>
<script type="text/javascript">
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script>

</body>
</html>