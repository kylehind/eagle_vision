<?php
/**
 * hamer functions and definitions
 *
 * @package eagle_vision
 * @since eagle_vision 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since eagle_vision 1.0
 */
if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */

if ( ! function_exists( 'eagle_vision_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since eagle_vision 1.0
 */
function eagle_vision_setup() {

    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );

    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaks.php' );

    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     */
    load_theme_textdomain( 'hamer', get_template_directory() . '/languages' );

    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support( 'post-formats', array( 'aside' ) );

    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'hamer' ),
    ) );
}
endif; // eagle_vision_setup
add_action( 'after_setup_theme', 'eagle_vision_setup' );

/**
 * Enqueue scripts and styles
 */
function eagle_vision_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'donate', get_template_directory_uri() . '/js/donate.js', array( 'jquery' ), '20160620' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160620' );
    }
}
add_action( 'wp_enqueue_scripts', 'eagle_vision_scripts' );


add_theme_support( 'post-thumbnails' );

add_theme_support( 'custom-background' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Name of Widgetized Area',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  )
);

class khind_Paypal_Donate_Widget extends WP_Widget {
  /**
  * To create the example widget all four methods will be
  * nested inside this single instance of the WP_Widget class.
  **/

  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array(
      'classname' => 'paypal_donate_widget',
      'description' => 'Connect your PayPal account to customisable donate buttons.',
    );
    parent::__construct( 'paypal_donate_widget', 'Paypal Donate Widget', $widget_options );
  }

  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $custom_html = $instance[ 'custom_html' ];
    $subtitle = $instance[ 'subtitle' ];
    $button_1_title = $instance['button_1_title'];
    $button_2_title = $instance['button_2_title'];
    $button_3_title = $instance['button_3_title'];
    $button_1_amount = $instance['button_1_amount'];
    $button_2_amount = $instance['button_2_amount'];
    $button_3_amount = $instance['button_3_amount'];
    $paypal_merchant_account_id = $instance['paypal_merchant_account_id'];
    $paypal_merchant_name = $instance['paypal_merchant_name'];
    $donate_button_text = $instance['donate_button_text'];
    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>

    <?php echo $custom_html ?>
    <div id="donate_buttons">
      <h4><em><?php echo $subtitle ?></em></h4>
      <span><?php echo $button_1_title ?></span>
      <button value="<?php echo $button_1_amount ?>" class="donate_select" type="button">£<?php echo $button_1_amount ?></button>
      <div class="smallhbreak"></div>
      <span><?php echo $button_2_title ?></span>
      <button value="<?php echo $button_2_amount ?>" class="donate_select" type="button">£<?php echo $button_2_amount ?></button>
      <div class="smallhbreak"></div>
      <span><?php echo $button_3_title ?></span>
      <button value="<?php echo $button_3_amount ?>" class="donate_select" type="button">£<?php echo $button_3_amount ?></button>

      <div class="hbreak"></div>

      <form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="blank">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="<?php echo $paypal_merchant_account_id ?>">
        <input type="hidden" name="item_name" value="<?php echo $paypal_merchant_name ?>">
        <input type="hidden" name="currency_code" value="GBP">
        <input type="hidden" id="donation_amount" name="amount" value="0.00">
        <button class="donate_button" type="submit" border="0" name="submit"><h2><?php echo $donate_button_text ?></h2></button>
      </form>
    </div>
    <script type="text/javascript">
      jQuery(document).ready(function(){
        jQuery(".donate_select").click(function(){
          jQuery(".selected").removeClass("selected");
          jQuery(this).addClass("selected");
          jQuery("#donation_amount").val(jQuery(this).attr("value"));
        });
        jQuery(".donate_select").last().click();
      });
    </script>
    <?php echo $args['after_widget'];
  }

  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $custom_html = ! empty( $instance['custom_html'] ) ? $instance['custom_html'] : '';
    $subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';
    $button_1_title = ! empty( $instance['button_1_title'] ) ? $instance['button_1_title'] : '';
    $button_2_title = ! empty( $instance['button_2_title'] ) ? $instance['button_2_title'] : '';
    $button_3_title = ! empty( $instance['button_3_title'] ) ? $instance['button_3_title'] : '';
    $button_1_amount = ! empty( $instance['button_1_amount'] ) ? $instance['button_1_amount'] : '';
    $button_2_amount = ! empty( $instance['button_2_amount'] ) ? $instance['button_2_amount'] : '';
    $button_3_amount = ! empty( $instance['button_3_amount'] ) ? $instance['button_3_amount'] : '';
    $paypal_merchant_account_id = ! empty( $instance['paypal_merchant_account_id'] ) ? $instance['paypal_merchant_account_id'] : '';
    $paypal_merchant_name = ! empty( $instance['paypal_merchant_name'] ) ? $instance['paypal_merchant_name'] : '';
    $donate_button_text = ! empty( $instance['donate_button_text'] ) ? $instance['donate_button_text'] : 'Donate';
    ?>
    <div id="khind_paypal_donate_widget">
      <div>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
      </div>

      <div>
        <label for="<?php echo $this->get_field_id( 'paypal_merchant_account_id' ); ?>">PayPal Merchant Account ID:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'paypal_merchant_account_id' ); ?>" name="<?php echo $this->get_field_name( 'paypal_merchant_account_id' ); ?>" value="<?php echo esc_attr( $paypal_merchant_account_id ); ?>" />
      </div>

      <div>
        <label for="<?php echo $this->get_field_id( 'paypal_merchant_name' ); ?>">PayPal Merchant Name:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'paypal_merchant_name' ); ?>" name="<?php echo $this->get_field_name( 'paypal_merchant_name' ); ?>" value="<?php echo esc_attr( $paypal_merchant_name ); ?>" />
      </div>

      <label for="<?php echo $this->get_field_id( 'custom_html' ); ?>">Custom HTML:</label>
      <p><em>This will be displayed between the Title and the Subtitle<em></p>
      <textarea id="<?php echo $this->get_field_id( 'custom_html' ); ?>" name="<?php echo $this->get_field_name( 'custom_html' ); ?>">
        <?php echo esc_attr( $custom_html ); ?>
      </textarea>

      <div>
        <label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">Subtitle:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" value="<?php echo esc_attr( $subtitle ); ?>" />
      </div>

      <div>
        <label for="<?php echo $this->get_field_id( 'button_1_title' ); ?>">Button 1 Title:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'button_1_title' ); ?>" name="<?php echo $this->get_field_name( 'button_1_title' ); ?>" value="<?php echo esc_attr( $button_1_title ); ?>" />
      </div>

      <div>
        <label for="<?php echo $this->get_field_id( 'button_1_amount' ); ?>">Button 1 Amount:</label>
        <input type="number" id="<?php echo $this->get_field_id( 'button_1_amount' ); ?>" name="<?php echo $this->get_field_name( 'button_1_amount' ); ?>" value="<?php echo esc_attr( $button_1_amount ); ?>" />
      </div>

      <div>
        <label for="<?php echo $this->get_field_id( 'button_2_title' ); ?>">Button 2 Title:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'button_2_title' ); ?>" name="<?php echo $this->get_field_name( 'button_2_title' ); ?>" value="<?php echo esc_attr( $button_2_title ); ?>" />
      </div>

      <div>
        <label for="<?php echo $this->get_field_id( 'button_2_amount' ); ?>">Button 2 Amount:</label>
        <input type="number" id="<?php echo $this->get_field_id( 'button_2_amount' ); ?>" name="<?php echo $this->get_field_name( 'button_2_amount' ); ?>" value="<?php echo esc_attr( $button_2_amount ); ?>" />
      </div>

      <div>
        <label for="<?php echo $this->get_field_id( 'button_3_title' ); ?>">Button 3 Title:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'button_3_title' ); ?>" name="<?php echo $this->get_field_name( 'button_3_title' ); ?>" value="<?php echo esc_attr( $button_3_title ); ?>" />
      </div>

      <div>
        <label for="<?php echo $this->get_field_id( 'button_3_amount' ); ?>">Button 3 Amount:</label>
        <input type="number" id="<?php echo $this->get_field_id( 'button_3_amount' ); ?>" name="<?php echo $this->get_field_name( 'button_3_amount' ); ?>" value="<?php echo esc_attr( $button_3_amount ); ?>" />
      </div>

      <div>
        <label for="<?php echo $this->get_field_id( 'donate_button_text' ); ?>">Donate Button Text:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'donate_button_text' ); ?>" name="<?php echo $this->get_field_name( 'donate_button_text' ); ?>" value="<?php echo esc_attr( $donate_button_text ); ?>" />
      </div>
    </div>
    <style type="text/css">
      #khind_paypal_donate_widget p{
        margin: 0;
      }
      #khind_paypal_donate_widget textarea{
        width: 100%;
        height:300px;
      }
      #khind_paypal_donate_widget input{
        margin-bottom: 10px;
      }
      #khind_paypal_donate_widget input[type='number']{
        width: 70px;
      }
    </style>
    <?php
  }

  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'custom_html' ] = $new_instance[ 'custom_html' ];
    $instance[ 'subtitle' ] = strip_tags($new_instance[ 'subtitle' ] );
    $instance[ 'button_1_title' ] = strip_tags($new_instance[ 'button_1_title' ] );
    $instance[ 'button_2_title' ] = strip_tags($new_instance[ 'button_2_title' ] );
    $instance[ 'button_3_title' ] = strip_tags($new_instance[ 'button_3_title' ] );
    $instance[ 'button_1_amount' ] = strip_tags($new_instance[ 'button_1_amount' ] );
    $instance[ 'button_2_amount' ] = strip_tags($new_instance[ 'button_2_amount' ] );
    $instance[ 'button_3_amount' ] = strip_tags($new_instance[ 'button_3_amount' ] );
    $instance[ 'button_3_amount' ] = strip_tags($new_instance[ 'button_3_amount' ] );
    $instance[ 'paypal_merchant_account_id' ] = strip_tags($new_instance[ 'paypal_merchant_account_id' ] );
    $instance[ 'paypal_merchant_name' ] = strip_tags($new_instance[ 'paypal_merchant_name' ] );
    $instance[ 'donate_button_text' ] = strip_tags($new_instance[ 'donate_button_text' ] );
    return $instance;
  }

}

function khind_register_Paypal_Donate_Widget() {
  register_widget( 'khind_Paypal_Donate_Widget' );
}
add_action( 'widgets_init', 'khind_register_Paypal_Donate_Widget' );

?>