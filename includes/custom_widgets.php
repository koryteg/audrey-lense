<?php

// ==================================================================
// Social network
// ==================================================================
class ace_social extends WP_Widget {

  function ace_social() {
    $widget_ops = array('description' => __('Show social network like Twitter, Facebook, RSS, etc.','ace') );
    parent::WP_Widget(false, __('Ace Social Networks','ace'),$widget_ops);      
  }

  function widget($args, $data) {  
  extract( $args );
    $title      = $data['title'];
    $instagram  = $data['instagram'];
    $pinterest  = $data['pinterest'];
    $facebook   = $data['facebook'];
    $twitter    = $data['twitter'];

    echo $before_widget; ?>

      <?php if ($title) { echo $before_title . $title . $after_title; } ?>

      <div class="textwidget">
        <ul class="social-icons">
          <?php if( $data['twitter'] ) echo '<li><a href="http://www.twitter.com/' . $twitter . '" class="social-twitter">Twitter</a></li>' ?>
          <?php if( $data['facebook'] ) echo '<li><a href="' . $facebook . '" class="social-facebook">Facebook</a></li>' ?>
          <?php if( $data['pinterest'] ) echo '<li><a href="' . $pinterest . '" class="social-pinterest">Pinterest</a></li>' ?>
          <?php if( $data['instagram'] ) echo '<li><a href="' . $instagram . '" class="social-instagram">Instagram</a></li>' ?>
        </ul>
        <div class="clearfix">&nbsp;</div>
      </div>

    <?php	 echo $after_widget;}
    function update( $new_data, $old_data ) { return $new_data; }
    function form( $data ) {
      $title      = isset( $data['title'] ) ? esc_attr( $data['title'] ) : '';
      $instagram  = isset( $data['instagram'] ) ? esc_attr( $data['instagram'] ) : '';
      $pinterest  = isset( $data['pinterest'] ) ? esc_attr( $data['pinterest'] ) : '';
      $facebook   = isset( $data['facebook'] ) ? esc_attr( $data['facebook'] ) : '';
      $twitter    = isset( $data['twitter'] ) ? esc_attr( $data['twitter'] ) : '';
    ?>

<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook full URL','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'facebook' ); ?>"  value="<?php echo $facebook; ?>" class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter username','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'twitter' ); ?>"  value="<?php echo $twitter; ?>" class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest page full URL','ace'); ?>::</label>
  <input type="text" name="<?php echo $this->get_field_name( 'pinterest' ); ?>"  value="<?php echo $pinterest; ?>" class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Instagram profile full URL','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'instagram' ); ?>"  value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" />
</p>

  <?php }

}

function ace_social() {
  register_widget('ace_social');
}
add_action( 'widgets_init','ace_social');

// ==================================================================
// Tweets
// ==================================================================
class ace_tweet extends WP_Widget {

  function ace_tweet() {
    $widget_ops = array('description' => __('Show your tweets','ace') );
    parent::WP_Widget(false, __('Ace Tweet','ace') ,$widget_ops);      
  }

  function widget($args, $data) {  
  extract( $args );
    $title    = $data['title'];
    $twitter  = $data['twitter'];
    $updates  = $data['updates'];

    echo $before_widget; ?>

      <?php if ($title) { echo $before_title . $title . $after_title; } ?>

      <div class="tweet">
      <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".tweet").tweet({
          username: "<?php echo $twitter; ?>",
          count: <?php echo $updates; ?>,
          loading_text: "Loading tweets..."
        });
      })
      </script>
      <div class="clearfix">&nbsp;</div>
      </div>

    <?php	 echo $after_widget;}
    function update( $new_data, $old_data ) { return $new_data; }
    function form( $data ) {
      $title    = isset( $data['title'] ) ? esc_attr( $data['title'] ) : '';
      $twitter  = isset( $data['twitter'] ) ? esc_attr( $data['twitter'] ) : '';
      $updates  = isset( $data['updates'] ) ? esc_attr( $data['updates'] ) : '';
    ?>

<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter username','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'twitter' ); ?>"  value="<?php echo $twitter; ?>" class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'updates' ); ?>"><?php _e('Number of Twitter updates','ace'); ?>:</label>
  <select name="<?php echo $this->get_field_name( 'updates' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'updates' ); ?>">
    <?php for ( $i = 1; $i < 11; $i += 1) { ?>
    <option value="<?php echo $i; ?>" <?php if($updates == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
    <?php } ?>
  </select>
</p>

  <?php }

}

function ace_tweet() {
  register_widget('ace_tweet');
}
add_action( 'widgets_init','ace_tweet');