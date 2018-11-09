<?php
/* Plugin Name: Responsive Content
 * Plugin URI: https://so-wp.com/plugin/responsive-content
 * Description: This plugin enables you to show/hide content depending on the device the visitor is browsing from.
 * Author: SO WP
 * Version: 20181.2.2
 * Author URI: https://so-wp.com
 * Text Domain: so-visibility-classes
 * Domain Path: /languages
 *
 * Copywrite 2014-2018 Pieter Bos (pieter@so-wp.com)
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

require  __DIR__ . '/vendor/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php';
add_action( 'admin_init', array( 'PAnD', 'init' ) );

/**
 * Set-up Action and Filter Hooks
 *
 * @since 0.1
 */
add_action( 'admin_init', 'sovc_init' );

add_action( 'admin_menu', 'sovc_add_options_page' );

add_filter( 'plugin_action_links', 'sovc_plugin_action_links', 10, 2 );

add_action( 'admin_print_footer_scripts', 'sovc_add_quicktags' );

add_action( 'wp_enqueue_scripts', 'so_visibility_classes_load_css' );

add_filter( 'mce_css', 'so_visibility_classes_mce_css' );

global $wp_version;
$nongb_version = '4.9.8';

// conditional that checks we're higher than WP 4.9.8 and the Classic Editor plugin is not active
if ( version_compare( $wp_version, $nongb_version, '>' ) && ! function_exists( 'classic_editor_init_actions' ) ) {

	add_action( 'admin_notices', 'sovc_admin_notice__warning' );

}

// conditional that checks whether ClassicPress has been installed
if ( function_exists( 'classicpress_version' ) ) {

	add_action( 'admin_notices', 'sovc_admin_notice__info' );

}


function sovc_admin_notice__warning() {

	if ( ! PAnD::is_admin_notice_active( 'disable-done-notice-forever' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( $screen->base === 'settings_page_so-responsive-content/so-visibility-classes' || $screen->base === 'settings_page_so-visibility-classes/so-visibility-classes' ) {

		echo '<div data-dismissible="disable-done-notice-forever" class="notice sovc-notice notice-warning is-dismissible">';
		printf(
			'<p><strong>' .
			__( '[Attention]', 'so-visibility-classes' ) .
			' </strong>' .
			__( 'On WP 5.0 the Responsive Content plugin can be used in either one of two ways:', 'so-visibility-classes' ) .
			'</p><ul><li>' .
			__( 'by using the Classic Block of the new editor', 'so-visibility-classes' ) .
			'</li><li>' .
			__( 'by installing <a href="%s">this plugin</a> to bring back the Classic Editor.', 'so-visibility-classes' ) .
			'</li></ul>',
				get_admin_url() . 'plugin-install.php?s=classic+editor+addon&tab=search&type=term'
		);
		echo '</div>';

	}
}

function sovc_admin_notice__info() {

	if ( ! PAnD::is_admin_notice_active( 'disable-done-notice-forever' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( $screen->base === 'settings_page_so-responsive-content/so-visibility-classes' || $screen->base === 'settings_page_so-visibility-classes/so-visibility-classes' ) {

		echo '<div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible">';
		echo '<p><strong>' . __( '[FYI]', 'so-visibility-classes' ) . ' </strong>' . __( 'The Responsive Content plugin is perfectly suitable for use on ClassicPress!', 'so-visibility-classes' ) . '</p>';
		echo '</div>';

	}

}


/**
 * Load the textdomain
 *
 * @since 0.1
 */
add_action( 'plugins_loaded', 'sovc_init' );

function sovc_init() {
	load_plugin_textdomain( 'so-visibility-classes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

/**
 * Add menu page
 *
 * @since 0.1
 */
function sovc_add_options_page() {

	// Add the new admin menu and page and save the returned hook suffix
	$hook = add_options_page( __( 'Responsive Content Instructions', 'so-visibility-classes' ), __( 'Responsive Content', 'so-visibility-classes' ), 'manage_options', __FILE__, 'sovc_render_form' );

	// Use the hook suffix to compose the hook and register an action executed when plugin's options page is loaded
	add_action( 'admin_print_styles-' . $hook , 'so_visibility_classes_load_custom_admin_style' );

}


/**
 * Render the Plugin options form
 *
 * @since 0.1
 */
function sovc_render_form() { ?>

	<div class="sovc wrap">

		<!-- Display Plugin Header and Description -->
		<h1><?php _e( 'Responsive Content Instructions', 'so-visibility-classes' ); ?></h1>

		<?php

			global $wp_version;
			$styles_version = '3.9.1';

			if ( version_compare( $wp_version, $styles_version, '>' ) ) {

				echo '<p>' . __( 'With the plugin activated you will see a new "Formats"-menu added to the Visual Editor.<br />The drop down contains 15 different options:', 'so-visibility-classes' ) . '</p>';

			} else {

				echo '<p>' . __( 'With the plugin activated you will see a new "Styles"-menu added to the Visual Editor.<br />The drop down contains 15 different options:', 'so-visibility-classes' ) . '</p>';

			}

		?>

		<ul class="sovc-options-list">
			<li class="list-item-title"><?php _e( 'For Paragraphs', 'so-visibility-classes' ); ?>
				<ul>
					<li><?php _e( 'showSmall (this class is visible on a browser width of up to 768px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'showMedium (this class is visible on a browser width between 768px and 1280px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'showLarge (this class is visible on a browser width from 1280px up)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'hideSmall (this class is hidden on a browser width of up to 768px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'hideMedium (this class is hidden on a browser width between 768px and 1280px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'hideLarge (this class is hidden on a browser width from 1280px up)', 'so-visibility-classes' ); ?></li>
				</ul>
			</li>
			<li class="list-item-title"><?php _e( 'For Links (only show, because hiding can be done with the inline classes below)', 'so-visibility-classes' ); ?>
				<ul>
					<li><?php _e( 'linkSmall (this class is visible on a browser width of up to 768px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'linkMedium (this class is visible on a browser width between 768px and 1280px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'linkLarge (this class is visible on a browser width from 1280px up)', 'so-visibility-classes' ); ?></li>
				</ul>
			</li>
			<li class="list-item-title"><?php _e( 'For inline spans', 'so-visibility-classes' ); ?>
				<ul>
					<li><?php _e( 'inline-showSmall (this class is visible on a browser width of up to 768px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'inline-showMedium (this class is visible on a browser width between 768px and 1280px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'inline-showLarge (this class is visible on a browser width from 1280px up)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'inline-hideSmall (this class is hidden on a browser width of up to 768px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'inline-hideMedium (this class is hidden on a browser width between 768px and 1280px)', 'so-visibility-classes' ); ?></li>
					<li><?php _e( 'inline-hideLarge (this class is hidden on a browser width from 1280px up)', 'so-visibility-classes' ); ?></li>
				</ul>
			</li>
		</ul>

		<?php

			global $wp_version;
			$styles_version = '3.9.1';

			if ( version_compare( $wp_version, $styles_version, '>' ) ) {

				$screenshot_menu_url = plugins_url( 'images/formats-dropdown-menu.png', __FILE__ );

			} else {

				$screenshot_menu_url = plugins_url( 'images/styles-dropdown-menu.png', __FILE__ );

			}

			$screenshot_editor_url = plugins_url( 'images/visual-editor.png', __FILE__ );

		?>

		<img src="<?php echo $screenshot_menu_url; ?>" />

		<p><?php _e( 'Once you have selected a visibility class, the plugin shows that in 3 locations:', 'so-visibility-classes' ); ?></p>

		<img src="<?php echo $screenshot_editor_url; ?>" />

		<ol>
			<li><?php _e( 'as selected in the drop down menu', 'so-visibility-classes' ); ?></li>
			<li><?php _e( 'with a “button” in front of the selector', 'so-visibility-classes' ); ?></li>
			<li><?php _e( 'in the path', 'so-visibility-classes' ); ?></li>
		</ol>

		<p><?php _e( 'It is good to know that the only function of this "button" is to show you that the element behind it has one of the visibility classes.<br /> For the rest it does not do anything to your content; you can therefore see it as a "helper".', 'so-visibility-classes' ); ?></p>

		<hr />

		<p><?php _e( 'Since version 0.3 of the plugin, you will also see 6 different buttons added to the Text Editor:', 'so-visibility-classes' ); ?></p>
			<ul class="sovc-text-editor-options-list">
				<li><?php _e( 'showSmall (this class is visible on a browser width of up to 768px)', 'so-visibility-classes' ); ?></li>
				<li><?php _e( 'showMedium (this class is visible on a browser width between 768px and 1280px)', 'so-visibility-classes' ); ?></li>
				<li><?php _e( 'showLarge (this class is visible on a browser width from 1280px up)', 'so-visibility-classes' ); ?></li>
				<li><?php _e( 'hideSmall (this class is hidden on a browser width of up to 768px)', 'so-visibility-classes' ); ?></li>
				<li><?php _e( 'hideMedium (this class is hidden on a browser width between 768px and 1280px)', 'so-visibility-classes' ); ?></li>
				<li><?php _e( 'hideLarge (this class is hidden on a browser width from 1280px up)', 'so-visibility-classes' ); ?></li>
			</ul>

		<p><?php _e( 'These buttons work a little bit different than on the Visual Editor.', 'so-visibility-classes' ); ?><br />
		<?php _e( 'They simply add a class, so you will have to write all elements yourself.', 'so-visibility-classes' ); ?></p>

		<?php
	$screenshot_text_editor = plugins_url( 'images/text-editor-buttons.png', __FILE__ );
		?>

		<img src="<?php echo $screenshot_text_editor; ?>" />

		<hr />

		<p><?php _e( 'You can use the visibility classes on virtually all elements: p, h1, h2, h3, h4, h5, h6, td, th, div, ul, ol, li, table and img.', 'so-visibility-classes' ); ?></p>

		<p><?php _e( 'Although possible, <strong>I strongly discourage</strong> using the classes with images. The reason is that the Responsive Content plugin only uses media queries with <code>display: block;</code>, <code>display: inline-block;</code> and <code>display: none;</code>. If you were to add a large image to only show on large screens, a medium image to show on tablets and a small image to show on smart phones, then the person visiting your site using a phone has to download all 3 images, which can have a major impact on the data plan of the visitor!', 'so-visibility-classes' ); ?></p>

			<p class="rate-this-plugin">

				<?php
				/* Translators: variable is link to WP Repo */
				printf( __( 'If you have found this plugin at all useful, please give it a favourable rating in the <a href="%s" title="Rate this plugin!">WordPress Plugin Repository</a>.', 'so-visibility-classes' ),
					esc_url( 'https://wordpress.org/support/plugin/so-visibility-classes/reviews/?rate=5#new-post' )
				);
				?>

			</p>

			<div class="author postbox">

				<h3 class="hndle">
					<span><?php _e( 'About the Author', 'so-visibility-classes' ); ?></span>
				</h3>

				<div class="inside">
					<img class="author-image" src="https://www.gravatar.com/avatar/<?php echo md5( 'info@senlinonline.com' ); ?>" />
					<p>
						<?php printf( __( 'Hi, my name is Pieter Bos, I hope you like this plugin! Please check out any of my other plugins on <a href="%s" title="SO WP Plugins">SO WP Plugins</a>. You can find out more information about me via the following links:', 'so-visibility-classes' ),
						esc_url( 'https://so-wp.com' )
						); ?>
					</p>

					<ul>
						<li><a href="https://bohanintl.com" target="_blank" title="BHI Consulting"><?php _e( 'BHI Consulting', 'so-visibility-classes' ); ?></a></li>
						<li><a href="https://www.linkedin.com/in/pieterbos83/" target="_blank" title="LinkedIn profile"><?php _e( 'LinkedIn', 'so-visibility-classes' ); ?></a></li>
						<li><a href="https://so-wp.com" target="_blank" title="SO WP"><?php _e( 'SO WP Plugins', 'so-visibility-classes' ); ?></a></li>
						<li><a href="https://github.com/senlin" title="on Github"><?php _e( 'Github', 'so-visibility-classes' ); ?></a></li>
						<li><a href="https://bohanintl.com/services/website-care-plan" target="_blank" title="Website Care Plan"><?php _e( 'Website Care Plan', 'so-visibility-classes' ); ?></a></li>
						<li><a href="https://profiles.wordpress.org/senlin/" title="on WordPress.org"><?php _e( 'WordPress.org Profile', 'so-visibility-classes' ); ?></a></li>
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
		$sovc_links = '<a href="' . get_admin_url() . 'options-general.php?page=so-visibility-classes/so-visibility-classes.php">' . __( 'Read before using', 'so-visibility-classes' ) . '</a>';
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
        array( 'title' => __( 'showSmall', 'so-visibility-classes' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-show-small' ),
        array( 'title' => __( 'showMedium', 'so-visibility-classes' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-show-medium' ),
        array( 'title' => __( 'showLarge', 'so-visibility-classes' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-show-large' ),
        array( 'title' => __( 'hideSmall', 'so-visibility-classes' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-hide-small' ),
        array( 'title' => __( 'hideMedium', 'so-visibility-classes' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-hide-medium' ),
        array( 'title' => __( 'hideLarge', 'so-visibility-classes' ), 'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', 'classes' => 'so-hide-large' ),
        array( 'title' => __( 'linkSmall', 'so-visibility-classes' ), 'inline' => 'a', 'classes' => 'so-show-small' ),
        array( 'title' => __( 'linkMedium', 'so-visibility-classes' ), 'inline' => 'a', 'classes' => 'so-show-medium' ),
        array( 'title' => __( 'linkLarge', 'so-visibility-classes' ), 'inline' => 'a', 'classes' => 'so-show-large' ),
        array( 'title' => __( 'inline-showSmall', 'so-visibility-classes' ), 'inline' => 'span', 'classes' => 'so-show-small' ),
        array( 'title' => __( 'inline-showMedium', 'so-visibility-classes' ), 'inline' => 'span', 'classes' => 'so-show-medium' ),
        array( 'title' => __( 'inline-showLarge', 'so-visibility-classes' ), 'inline' => 'span', 'classes' => 'so-show-large' ),
        array( 'title' => __( 'inline-hideSmall', 'so-visibility-classes' ), 'inline' => 'span', 'classes' => 'so-hide-small' ),
        array( 'title' => __( 'inline-hideMedium', 'so-visibility-classes' ), 'inline' => 'span', 'classes' => 'so-hide-medium' ),
        array( 'title' => __( 'inline-hideLarge', 'so-visibility-classes' ), 'inline' => 'span', 'classes' => 'so-hide-large' ),
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
    if ( wp_script_is( 'quicktags' ) ) {
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

/**
 * Add stylesheet for frontend
 *
 * @since 0.1
 */
//add_action( 'wp_enqueue_scripts', 'so_visibility_classes_load_css' );

function so_visibility_classes_load_css() {

	wp_enqueue_style( 'so_visibility_classes', plugins_url( 'css/style.css', __FILE__ ) );

}

/**
 * Adds editor stylesheet (for backend)
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/mce_css
 *
 * @since 0.1
 */
//add_filter( 'mce_css', 'so_visibility_classes_mce_css' );

function so_visibility_classes_mce_css( $mce_css ) {
	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= plugins_url( 'css/editor-style.css', __FILE__ );

	return $mce_css;
}

function so_visibility_classes_load_custom_admin_style() {

	wp_register_style( 'so_visibility_classes', plugin_dir_url( __FILE__ ) . 'css/settings.css', false, NULL );
	wp_enqueue_style( 'so_visibility_classes' );

}

/** The End **/