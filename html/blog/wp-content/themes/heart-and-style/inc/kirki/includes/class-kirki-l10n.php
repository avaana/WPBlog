<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'heart-and-style' ),
				'background-image'      => esc_attr__( 'Background Image', 'heart-and-style' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'heart-and-style' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'heart-and-style' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'heart-and-style' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'heart-and-style' ),
				'inherit'               => esc_attr__( 'Inherit', 'heart-and-style' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'heart-and-style' ),
				'cover'                 => esc_attr__( 'Cover', 'heart-and-style' ),
				'contain'               => esc_attr__( 'Contain', 'heart-and-style' ),
				'background-size'       => esc_attr__( 'Background Size', 'heart-and-style' ),
				'fixed'                 => esc_attr__( 'Fixed', 'heart-and-style' ),
				'scroll'                => esc_attr__( 'Scroll', 'heart-and-style' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'heart-and-style' ),
				'left-top'              => esc_attr__( 'Left Top', 'heart-and-style' ),
				'left-center'           => esc_attr__( 'Left Center', 'heart-and-style' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'heart-and-style' ),
				'right-top'             => esc_attr__( 'Right Top', 'heart-and-style' ),
				'right-center'          => esc_attr__( 'Right Center', 'heart-and-style' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'heart-and-style' ),
				'center-top'            => esc_attr__( 'Center Top', 'heart-and-style' ),
				'center-center'         => esc_attr__( 'Center Center', 'heart-and-style' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'heart-and-style' ),
				'background-position'   => esc_attr__( 'Background Position', 'heart-and-style' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'heart-and-style' ),
				'on'                    => esc_attr__( 'ON', 'heart-and-style' ),
				'off'                   => esc_attr__( 'OFF', 'heart-and-style' ),
				'all'                   => esc_attr__( 'All', 'heart-and-style' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'heart-and-style' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'heart-and-style' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'heart-and-style' ),
				'greek'                 => esc_attr__( 'Greek', 'heart-and-style' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'heart-and-style' ),
				'khmer'                 => esc_attr__( 'Khmer', 'heart-and-style' ),
				'latin'                 => esc_attr__( 'Latin', 'heart-and-style' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'heart-and-style' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'heart-and-style' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'heart-and-style' ),
				'arabic'                => esc_attr__( 'Arabic', 'heart-and-style' ),
				'bengali'               => esc_attr__( 'Bengali', 'heart-and-style' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'heart-and-style' ),
				'tamil'                 => esc_attr__( 'Tamil', 'heart-and-style' ),
				'telugu'                => esc_attr__( 'Telugu', 'heart-and-style' ),
				'thai'                  => esc_attr__( 'Thai', 'heart-and-style' ),
				'serif'                 => _x( 'Serif', 'font style', 'heart-and-style' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'heart-and-style' ),
				'monospace'             => _x( 'Monospace', 'font style', 'heart-and-style' ),
				'font-family'           => esc_attr__( 'Font Family', 'heart-and-style' ),
				'font-size'             => esc_attr__( 'Font Size', 'heart-and-style' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'heart-and-style' ),
				'line-height'           => esc_attr__( 'Line Height', 'heart-and-style' ),
				'font-style'            => esc_attr__( 'Font Style', 'heart-and-style' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'heart-and-style' ),
				'top'                   => esc_attr__( 'Top', 'heart-and-style' ),
				'bottom'                => esc_attr__( 'Bottom', 'heart-and-style' ),
				'left'                  => esc_attr__( 'Left', 'heart-and-style' ),
				'right'                 => esc_attr__( 'Right', 'heart-and-style' ),
				'center'                => esc_attr__( 'Center', 'heart-and-style' ),
				'justify'               => esc_attr__( 'Justify', 'heart-and-style' ),
				'color'                 => esc_attr__( 'Color', 'heart-and-style' ),
				'add-image'             => esc_attr__( 'Add Image', 'heart-and-style' ),
				'change-image'          => esc_attr__( 'Change Image', 'heart-and-style' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'heart-and-style' ),
				'add-file'              => esc_attr__( 'Add File', 'heart-and-style' ),
				'change-file'           => esc_attr__( 'Change File', 'heart-and-style' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'heart-and-style' ),
				'remove'                => esc_attr__( 'Remove', 'heart-and-style' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'heart-and-style' ),
				'variant'               => esc_attr__( 'Variant', 'heart-and-style' ),
				'subsets'               => esc_attr__( 'Subset', 'heart-and-style' ),
				'size'                  => esc_attr__( 'Size', 'heart-and-style' ),
				'height'                => esc_attr__( 'Height', 'heart-and-style' ),
				'spacing'               => esc_attr__( 'Spacing', 'heart-and-style' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'heart-and-style' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'heart-and-style' ),
				'light'                 => esc_attr__( 'Light 200', 'heart-and-style' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'heart-and-style' ),
				'book'                  => esc_attr__( 'Book 300', 'heart-and-style' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'heart-and-style' ),
				'regular'               => esc_attr__( 'Normal 400', 'heart-and-style' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'heart-and-style' ),
				'medium'                => esc_attr__( 'Medium 500', 'heart-and-style' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'heart-and-style' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'heart-and-style' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'heart-and-style' ),
				'bold'                  => esc_attr__( 'Bold 700', 'heart-and-style' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'heart-and-style' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'heart-and-style' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'heart-and-style' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'heart-and-style' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'heart-and-style' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'heart-and-style' ),
				'add-new'           	=> esc_attr__( 'Add new', 'heart-and-style' ),
				'row'           		=> esc_attr__( 'row', 'heart-and-style' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'heart-and-style' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'heart-and-style' ),
				'back'                  => esc_attr__( 'Back', 'heart-and-style' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'heart-and-style' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'heart-and-style' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'heart-and-style' ),
				'none'                  => esc_attr__( 'None', 'heart-and-style' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'heart-and-style' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'heart-and-style' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'heart-and-style' ),
				'initial'               => esc_attr__( 'Initial', 'heart-and-style' ),
				'select-page'           => esc_attr__( 'Select a Page', 'heart-and-style' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'heart-and-style' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'heart-and-style' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'heart-and-style' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'heart-and-style' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
