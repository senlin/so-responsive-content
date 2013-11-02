<?php
/* Plugin Name: SO Responsive Content
 * Plugin URI: https://github.com/so-wp/so-visibility-classes
 * Description: With the SO Responsive Content plugin you can easily adjust the length of your content for different devices by making use of visibility classes.
 * Author: Piet Bos
 * Version: 0.3.1
 * Author URI: http://senlinonline.com
 *
 * Copywrite 2013 Piet Bos (piethfbos@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 *
 */

/**
 * Prevent direct access to files
 * 
 * @since 0.1
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Version check; any WP version under 3.6 is not supported (if only to "force" users to stay up to date)
 * 
 * adapted from example by Thomas Scholz (@toscho) http://wordpress.stackexchange.com/a/95183/2015, Version: 2013.03.31, Licence: MIT (http://opensource.org/licenses/MIT)
 *
 * @since 0.1
 */

//Only do this when on the Plugins page.
if ( ! empty ( $GLOBALS['pagenow'] ) && 'plugins.php' === $GLOBALS['pagenow'] )
	add_action( 'admin_notices', 'sovc_check_admin_notices', 0 );

function sovc_min_wp_version() {
	global $wp_version;
	$require_wp = '3.6';
	$update_url = get_admin_url( null, 'update-core.php' );

	$errors = array();

	if ( version_compare( $wp_version, $require_wp, '<' ) ) 

		$errors[] = "You have WordPress version $wp_version installed, but <b>this plugin requires at least WordPress $require_wp</b>. Please <a href='$update_url'>update your WordPress version</a>.";

	return $errors; 
}

function sovc_check_admin_notices()
{
	$errors = sovc_min_wp_version();

	if ( empty ( $errors ) )
		return;

	// Suppress "Plugin activated" notice.
	unset( $_GET['activate'] );

	// this plugin's name
	$name = get_file_data( __FILE__, array ( 'Plugin Name' ), 'plugin' );

	printf( __( '<div class="error"><p>%1$s</p><p><i>%2$s</i> has been deactivated.</p></div>', 'sovc' ),
		join( '</p><p>', $errors ),
		$name[0]
	);
	deactivate_plugins( plugin_basename( __FILE__ ) );
}

/**
 * Set-up Action and Filter Hooks
 * 
 * @since 0.1
 */
add_action( 'admin_init', 'sovc_init' );

add_action( 'admin_menu', 'sovc_add_options_page' );

add_filter( 'plugin_action_links', 'sovc_plugin_action_links', 10, 2 );

/**
 * Load the textdomain
 * 
 * @since 0.1
 */
add_action( 'plugins_loaded', 'sovc_init' );

function sovc_init() {
	load_plugin_textdomain( 'sovc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

/**
 * Add menu page
 * 
 * @since 0.1
 */
function sovc_add_options_page() {
	
	add_options_page( 'SO Responsive Content Instructions', 'SO Responsive Content', 'manage_options', __FILE__, 'sovc_render_form' );

}

/**
 * Render the Plugin options form
 * 
 * @since 0.1
 */
function sovc_render_form() { ?>

	<div class="wrap">
		
		<!-- Display Plugin Icon, Header, and Description -->
		<div class="icon32" id="icon-options-general"><br></div>
		
		<h2><?php _e( 'SO Responsive Content Instructions', 'sovc' ); ?></h2>
		
		<p><?php _e( 'With the plugin activated you will see a new "Styles"-menu added to the Visual Editor.<br />The drop down contains 15 different options:', 'sovc' ); ?></p>
		<ul style="list-style: disc inside none;">
			<li><?php _e( 'For Paragraphs', 'sovc' ); ?>
				<ul style="list-style: disc inside none;">
					<li><?php _e( 'showSmall (this class is visible on a browser width of up to 768px)', 'sovc' ); ?></li>
					<li><?php _e( 'showMedium (this class is visible on a browser width between 768px and 1280px)', 'sovc' ); ?></li>
					<li><?php _e( 'showLarge (this class is visible on a browser width from 1280px up)', 'sovc' ); ?></li>
					<li><?php _e( 'hideSmall (this class is hidden on a browser width of up to 768px)', 'sovc' ); ?></li>
					<li><?php _e( 'hideMedium (this class is hidden on a browser width between 768px and 1280px)', 'sovc' ); ?></li>
					<li><?php _e( 'hideLarge (this class is hidden on a browser width from 1280px up)', 'sovc' ); ?></li>
				</ul>
			</li>
			<li><?php _e( 'For Links (only show, because hiding can be done with the inline classes below)', 'sovc' ); ?>
				<ul style="list-style: disc inside none;">
					<li><?php _e( 'linkSmall (this class is visible on a browser width of up to 768px)', 'sovc' ); ?></li>
					<li><?php _e( 'linkMedium (this class is visible on a browser width between 768px and 1280px)', 'sovc' ); ?></li>
					<li><?php _e( 'linkLarge (this class is visible on a browser width from 1280px up)', 'sovc' ); ?></li>
				</ul>
			</li>
			<li><?php _e( 'For inline spans', 'sovc' ); ?>
				<ul style="list-style: disc inside none;">
					<li><?php _e( 'inline-showSmall (this class is visible on a browser width of up to 768px)', 'sovc' ); ?></li>
					<li><?php _e( 'inline-showMedium (this class is visible on a browser width between 768px and 1280px)', 'sovc' ); ?></li>
					<li><?php _e( 'inline-showLarge (this class is visible on a browser width from 1280px up)', 'sovc' ); ?></li>
					<li><?php _e( 'inline-hideSmall (this class is hidden on a browser width of up to 768px)', 'sovc' ); ?></li>
					<li><?php _e( 'inline-hideMedium (this class is hidden on a browser width between 768px and 1280px)', 'sovc' ); ?></li>
					<li><?php _e( 'inline-hideLarge (this class is hidden on a browser width from 1280px up)', 'sovc' ); ?></li>
				</ul>
			</li>
		</ul>
		<?php
	$screenshot_menu_url = plugins_url( 'images/styles-dropdown-menu.png', __FILE__ );
	$screenshot_editor_url = plugins_url( 'images/visual-editor.png', __FILE__ );
		?>
		
		<img src="<?php echo $screenshot_menu_url; ?>" />
		
		<p><?php _e( 'Once you have selected a visibility class, the plugin shows that in 3 locations:', 'sovc' ); ?></p>
		
		<img src="<?php echo $screenshot_editor_url; ?>" />
		
		<ul>
			<li><?php _e( '1. as selected in the drop down menu', 'sovc' ); ?></li>
			<li><?php _e( '2. with a “button” in front of the selector', 'sovc' ); ?></li>
			<li><?php _e( '3. in the path', 'sovc' ); ?></li>
		</ul>
		
		<p><?php _e( 'It is good to know that the only function of this "button" is to show you that the element behind it has one of the visibility classes.<br /> For the rest it does not do anything to your content; you can therefore see it as a "helper".', 'sovc' ); ?></p>
		
		<hr />
		
		<p><?php _e( 'Since version 0.3 of the plugin, you will also see 6 different buttons added to the Text Editor:', 'sovc' ); ?></p>
			<ul style="list-style: disc inside none;">
				<li><?php _e( 'showSmall (this class is visible on a browser width of up to 768px)', 'sovc' ); ?></li>
				<li><?php _e( 'showMedium (this class is visible on a browser width between 768px and 1280px)', 'sovc' ); ?></li>
				<li><?php _e( 'showLarge (this class is visible on a browser width from 1280px up)', 'sovc' ); ?></li>
				<li><?php _e( 'hideSmall (this class is hidden on a browser width of up to 768px)', 'sovc' ); ?></li>
				<li><?php _e( 'hideMedium (this class is hidden on a browser width between 768px and 1280px)', 'sovc' ); ?></li>
				<li><?php _e( 'hideLarge (this class is hidden on a browser width from 1280px up)', 'sovc' ); ?></li>
			</ul>
		
		<p><?php _e( 'These buttons work a little bit different than on the Visual Editor.', 'sovc' ); ?><br />
		<?php _e( 'They simply add a class, so you will have to write all elements yourself.', 'sovc' ); ?></p>

		<?php
	$screenshot_text_editor = plugins_url( 'images/text-editor-buttons.png', __FILE__ );
		?>

		<img src="<?php echo $screenshot_text_editor; ?>" />
		
		<hr />
		
		<p><?php _e( 'You can use the visibility classes on virtually all elements: p, h1, h2, h3, h4, h5, h6, td, th, div, ul, ol, li, table and img.', 'sovc' ); ?></p>
		
		<p><?php _e( 'Although possible, <strong>I strongly discourage</strong> using the classes with images. The reason is that the SO Responsive Content plugin only uses media queries with <code>display: block;</code> and <code>display: none;</code>. If you were to add a large image to only show on large screens, a medium image to show on tablets and a small image to show on smart phones, then the person visiting your site using a phone has to download all 3 images, which can have a major impact on the data plan of the visitor!', 'sovc' ); ?></p>

			<p style="font-style: italic; font-weight: bold; color: #26779A;">
				
				<?php
				/* Translators: variable is link to WP Repo */
				printf( __( 'If you have found this plugin at all useful, please give it a favourable rating in the <a href="%s" title="Rate this plugin!">WordPress Plugin Repository</a>.', 'sovc' ), 
					esc_url( 'http://wordpress.org/plugins/so-visibility-classes/' )
				);
				?>
				
			</p>
			
			<div class="postbox" style="display: block; float: left; width: 500px; margin: 30px 10px 10px 0;">
				
				<h3 class="hndle" style="padding: 5px;">
					<span><?php _e( 'About the Author', 'sovc' ); ?></span>
				</h3>
				
				<div class="inside">
					<img src="http://www.gravatar.com/avatar/<?php echo md5( 'info@senlinonline.com' ); ?>" style="float: left; margin-right: 10px; padding: 3px; border: 1px solid #DFDFDF;"/>
					<p style="height: 60px; padding-top: 20px">
						<?php printf( __( 'Hi, my name is Piet Bos, I hope you like this plugin! Please check out any of my other plugins on <a href="%s" title="SO WP Plugins">SO WP Plugins</a>. You can find out more information about me via the following links:', 'sovc' ),
						esc_url( 'http://so-wp.github.io/' )
						); ?>
					</p>
					
					<ul style="clear: both; margin-top: 20px;">
						<li><a href="http://senlinonline.com/" target="_blank" title="Senlin Online"><?php _e('Senlin Online', 'sovc'); ?></a></li>
						<li><a href="http://wpti.ps/" target="_blank" title="WP TIPS"><?php _e('WP Tips', 'sovc'); ?></a></li>
						<li><a href="https://plus.google.com/108543145122756748887" target="_blank" title="Piet on Google+"><?php _e( 'Google+', 'sovc' ); ?></a></li>
						<li><a href="http://cn.linkedin.com/in/pietbos" target="_blank" title="LinkedIn profile"><?php _e( 'LinkedIn', 'sovc' ); ?></a></li>
						<li><a href="http://twitter.com/SenlinOnline" target="_blank" title="Twitter"><?php _e( 'Twitter: @piethfbos', 'sovc' ); ?></a></li>
						<li><a href="http://github.com/senlin" title="on Github"><?php _e( 'Github', 'sovc' ); ?></a></li>
						<li><a href="http://profiles.wordpress.org/senlin/" title="on WordPress.org"><?php _e( 'WordPress.org Profile', 'sovc' ); ?></a></li>
					</ul>
				
				</div> <!-- end .inside -->
			
			</div> <!-- end .postbox -->

	</div> <!-- end .wrap -->

<?php }

/**
 * Display a Settings link on the main Plugins page
 * 
 * @since 0.1
 */
function sovc_plugin_action_links( $links, $file ) {

	if ( $file == plugin_basename( __FILE__ ) ) {
		$sovc_links = '<a href="' . get_admin_url() . 'options-general.php?page=so-visibility-classes/so-visibility-classes.php">' . __( 'Read before using', 'sovc' ) . '</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $sovc_links );
	}

	return $links;
}

/**
 * Instead of using Shortcodes it is much easier to add the options directly to the Styles menu of the TinyMCE
 * via tip Jan Fabry: http://justintadlock.com/archives/2011/05/02/dealing-with-shortcode-madness#comment-335205
 * 
 * adding the number 2-4 in the filter, like mce_buttons_2, mce_buttons_3 or mce_buttons_4 will place the Styles Dropdown on that particular line
 *
 * other useful article http://alisothegeek.com/2011/05/tinymce-styles-dropdown-wordpress-visual-editor/
 * 
 * @since 0.1
 */
add_filter( 'mce_buttons', 'so_visibility_classes_mce' );

function so_visibility_classes_mce( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'so_visibility_classes_mce_before_init' );

function so_visibility_classes_mce_before_init( $settings ) {
	
    $style_formats = array(
        array( 'title' => __( 'showSmall', 'sovc' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-show-small' ),
        array( 'title' => __( 'showMedium', 'sovc' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-show-medium' ),
        array( 'title' => __( 'showLarge', 'sovc' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-show-large' ),
        array( 'title' => __( 'hideSmall', 'sovc' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-hide-small' ),
        array( 'title' => __( 'hideMedium', 'sovc' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-hide-medium' ),
        array( 'title' => __( 'hideLarge', 'sovc' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-hide-large' ),
        array( 'title' => __( 'linkSmall', 'sovc' ), 'inline' => 'a', 'classes' => 'so-show-small' ),
        array( 'title' => __( 'linkMedium', 'sovc' ), 'inline' => 'a', 'classes' => 'so-show-medium' ),
        array( 'title' => __( 'linkLarge', 'sovc' ), 'inline' => 'a', 'classes' => 'so-show-large' ),
        array( 'title' => __( 'inline-showSmall', 'sovc' ), 'inline' => 'span', 'classes' => 'so-show-small' ),
        array( 'title' => __( 'inline-showMedium', 'sovc' ), 'inline' => 'span', 'classes' => 'so-show-medium' ),
        array( 'title' => __( 'inline-showLarge', 'sovc' ), 'inline' => 'span', 'classes' => 'so-show-large' ),
        array( 'title' => __( 'inline-hideSmall', 'sovc' ), 'inline' => 'span', 'classes' => 'so-hide-small' ),
        array( 'title' => __( 'inline-hideMedium', 'sovc' ), 'inline' => 'span', 'classes' => 'so-hide-medium' ),
        array( 'title' => __( 'inline-hideLarge', 'sovc' ), 'inline' => 'span', 'classes' => 'so-hide-large' ),
    );
    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}

/**
 * Now also add these options to the Text Editor
 * source: http://codex.wordpress.org/Quicktags_API
 *
 * @since 0.3
 */
function sovc_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
    QTags.addButton( 'inline_showSmall', 'showSmall', ' class="so-show-small"', '', 'class', 'showSmall', 911 );
    QTags.addButton( 'inline_showMedium', 'showMedium', ' class="so-show-medium"', '', 'class', 'showMedium', 912 );
    QTags.addButton( 'inline_showLarge', 'showLarge', ' class="so-show-large"', '', 'class', 'showLarge', 913 );
    QTags.addButton( 'inline_hideSmall', 'hideSmall', ' class="so-hide-small"', '', 'class', 'hideSmall', 914 );
    QTags.addButton( 'inline_hideMedium', 'hideMedium', ' class="so-hide-medium"', '', 'class', 'hideMedium', 915 );
    QTags.addButton( 'inline_hideLarge', 'hideLarge', ' class="so-hide-large"', '', 'class', 'hideLarge', 916 );
    </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'sovc_add_quicktags' ); 

/**
 * Add stylesheet for frontend
 * 
 * @since 0.1
 */
add_action( 'wp_enqueue_scripts', 'so_visibility_classes_load_css' );

function so_visibility_classes_load_css() {
	
	wp_enqueue_style( 'so_visibility_classes', plugins_url( '/style.css', __FILE__ ) );
	
}

/**
 * Adds editor stylesheet (for backend)
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/mce_css
 *
 * @since 0.1
 */
add_filter( 'mce_css', 'so_visibility_classes_mce_css' );

function so_visibility_classes_mce_css( $mce_css ) {
	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= plugins_url( 'editor-style.css', __FILE__ );

	return $mce_css;
}

/** The End **/