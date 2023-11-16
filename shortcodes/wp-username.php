<?php

class Civicrm_Ux_Shortcode_WPUsername extends Abstract_Civicrm_Ux_Shortcode {
	/**
	 * @return string The name of shortcode
	 */
	public function get_shortcode_name() {
		return 'ux_wp_username';
	}

	/**
	 * @param array $atts
	 * @param null $content
	 * @param string $tag
	 *
	 * @return mixed Should be the html output of the shortcode
	 */
	public function shortcode_callback( $atts = [], $content = null, $tag = '' ) {
		// normalize attribute keys, lowercase
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );
		// override default attributes with user attributes
		$mod_atts = shortcode_atts( [
			'promocode' => '',
		], $atts, $tag );

		$user = wp_get_current_user();
		$username = $user->user_login;
		if ( $mod_atts['promocode'] ) {
			$username = preg_replace('/\s+/', '_', $username);
		}
		return $username;
	}
}

