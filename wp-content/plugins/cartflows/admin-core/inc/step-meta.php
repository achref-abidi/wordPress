<?php
/**
 * CartFlows Step Meta Helper.
 *
 * @package CartFlows
 */

namespace CartflowsAdmin\AdminCore\Inc;

/**
 * Class StepMeta.
 */
class StepMeta {


	/**
	 * Get flow meta options.
	 *
	 * @param int    $step_id step id.
	 * @param string $step_type type.
	 */
	public static function get_meta_settings( $step_id, $step_type ) {

		$settings = array(
			'tabs' => array(),
		);

		/**
		 * Set metabox options
		 */
		switch ( $step_type ) {
			case 'landing':
				$settings = \Cartflows_Landing_Meta_Data::get_instance()->get_settings( $step_id );
				break;
			case 'checkout':
				$settings = \Cartflows_Checkout_Meta_Data::get_instance()->get_settings( $step_id );
				break;
			case 'optin':
				$settings = \Cartflows_Optin_Meta_Data::get_instance()->get_settings( $step_id );
				break;
			case 'thankyou':
				$settings = \Cartflows_Thankyou_Meta_Data::get_instance()->get_settings( $step_id );
				break;
			default:
				break;
		}

		$settings = apply_filters( 'cartflows_' . $step_type . '_step_meta_settings', $settings, $step_id );
		return $settings;
	}

}
