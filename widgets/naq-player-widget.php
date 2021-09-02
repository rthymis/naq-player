<?php
class Naq_Widget extends WP_Widget {

  public function __construct() {
		parent::__construct(
			'naq-player-widget', // Base ID
			__('Naq Player', 'naq-player' ), // Name
			array(
				'description' => __( 'Displays the Naq Player', 'naq-player' ),
			) // Args
		);
	}

// The widget's front-end
public function widget( $args, $instance )
    {
      $title = apply_filters( 'widget_title', $instance['title'] );

echo $args['before_widget'];

if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

require_once plugin_dir_path( __DIR__ ) . 'public/partials/naq-player-public-display.php';
echo $args['after_widget'];

    }

    public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}

// The widget's backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

}
