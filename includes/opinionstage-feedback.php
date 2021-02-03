<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class OpinionstageFeedback {

	private $project_token = '1aef78541d1dc41570207ecaf9ec235a';

	public function __construct() {
		add_action(
			'current_screen',
			function () {
				if ( ! $this->is_plugins_screen() ) {
					return;
				}

				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_feedback_dialog_scripts' ) );
			}
		);

		add_action( 'wp_ajax_opinionstage_deactivate_feedback', array( $this, 'ajax_opinionstage_deactivate_feedback' ) );
	}

	public function enqueue_feedback_dialog_scripts() {
		add_action( 'admin_footer', array( $this, 'print_deactivate_feedback_dialog' ) );

		wp_register_script(
			'opinionstage-admin-feedback',
			plugin_dir_url( OPINIONSTAGE_PLUGIN_FILE ) . 'admin/js/admin-feedback.js',
			array( 'jquery' ),
			OPINIONSTAGE_WIDGET_VERSION,
			true
		);

		wp_enqueue_script( 'opinionstage-admin-feedback' );

		wp_register_style(
			'opinionstage-admin-feedback',
			plugin_dir_url( OPINIONSTAGE_PLUGIN_FILE ) . 'admin/css/admin-feedback.css',
			array(),
			OPINIONSTAGE_WIDGET_VERSION
		);
		wp_enqueue_style( 'opinionstage-admin-feedback' );
	}

	private function get_deactivate_feedback_reasons() {
		return array(
			'no_longer_needed'               => array(
				'title'             => __( 'I no longer need the plugin', 'social-polls-by-opinionstage' ),
				'input_placeholder' => '',
			),
			'found_a_better_plugin'          => array(
				'title'             => __( 'I found a better plugin', 'social-polls-by-opinionstage' ),
				'input_placeholder' => __( 'Please share which plugin', 'social-polls-by-opinionstage' ),
			),
			'couldnt_get_the_plugin_to_work' => array(
				'title'             => __( 'I couldn\'t get the plugin to work', 'social-polls-by-opinionstage' ),
				'input_placeholder' => __( 'What was the problem', 'social-polls-by-opinionstage' ),
			),
			'temporary_deactivation'         => array(
				'title'             => __( 'It\'s a temporary deactivation', 'social-polls-by-opinionstage' ),
				'input_placeholder' => '',
			),
			'other'                          => array(
				'title'             => __( 'Other', 'social-polls-by-opinionstage' ),
				'input_placeholder' => __( 'Please share the reason', 'social-polls-by-opinionstage' ),
			),
		);
	}

	public function print_deactivate_feedback_dialog() {
		$deactivate_reasons = $this->get_deactivate_feedback_reasons();
		?>
		<div class="opinionstage-dialog-box-wrapper" id="opinionistage-deactivate-feedback-modal" >
			<div class="opinionstage-dialog-box-content">
				<div class="opinionstage-deactivate-feedback-dialog-header">
					<img src="<?php echo plugins_url( 'admin/images/os-icon.png', plugin_dir_path( __FILE__ ) ); ?>" class="opinionstage-modal-logo" >
					<span class="opinionstage-modal-header"><?php _e( 'Quick Feedback', 'social-polls-by-opinionstage' ); ?></span>
					<span id="opinionstage-dialog-close" class="opinionstage-close"></span>
				</div>
				<div class="opinionstage-dialog-message">
					<form id="opinionstage-deactivate-feedback-dialog-form" method="post">
						<?php
						wp_nonce_field( '_opinionstage_deactivate_feedback_nonce' );
						?>
						<input type="hidden" name="action" value="opinionstage_deactivate_feedback" />

						<div class="opinionstage-deactivate-feedback-dialog-form-caption"><?php echo __( 'Please share why you are disabling Opinion Stage:', 'social-polls-by-opinionstage' ); ?></div>
						<div class="opinionstage-choices-wrapper">
							<?php foreach ( $deactivate_reasons as $reason_key => $reason ) : ?>
								<div class="opinionstage-deactivate-feedback-dialog-input-wrapper">
									<input id="opinionstage-deactivate-feedback-<?php echo esc_attr( $reason_key ); ?>" class="opinionstage-deactivate-feedback-dialog-input" type="radio" name="reason_key" value="<?php echo esc_attr( $reason_key ); ?>" />
									<label for="opinionstage-deactivate-feedback-<?php echo esc_attr( $reason_key ); ?>" ><?php echo esc_html( $reason['title'] ); ?></label>
									<?php if ( ! empty( $reason['input_placeholder'] ) ) : ?>
										<input class="opinionstage-feedback-text" type="text" name="reason_<?php echo esc_attr( $reason_key ); ?>" placeholder="<?php echo esc_attr( $reason['input_placeholder'] ); ?>" />
									<?php endif; ?>
									<?php if ( ! empty( $reason['alert'] ) ) : ?>
										<div><?php echo esc_html( $reason['alert'] ); ?></div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</form>
				</div>
				<div class="opinionstage-dialog-buttons">
					<button id="opinionstage-dialog-submit" class="opinionstage-dialog-submit"><div class="opinionstage-loading-ring"></div><?php _e( 'Submit & Deactivate', 'social-polls-by-opinionstage' ); ?></button>
					<button id="opinionstage-dialog-skip" class="opinionstage-dialog-skip"><?php _e( 'Skip & Deactivate', 'social-polls-by-opinionstage' ); ?></button>
				</div>
			</div>
		</div>
		<?php
	}

	public function ajax_opinionstage_deactivate_feedback() {
		if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], '_opinionstage_deactivate_feedback_nonce' ) ) {
			wp_send_json_error();
		}

		$reason = '';

		if ( ! empty( $_POST['reason_key'] ) ) {
			$reason = $_POST['reason_key'];
		}

		$possible_reasons = $this->get_deactivate_feedback_reasons();

		if ( key_exists( $reason, $possible_reasons ) ) {
			$reason_text_key = $reason_text = '';
			if ( isset( $_POST[ 'reason_' . $reason ] ) && trim( $_POST[ 'reason_' . $reason ] ) != '' && ! empty( $possible_reasons[ $reason ]['input_placeholder'] ) ) {
				$reason_text_key = 'reason_' . $reason;
				$reason_text     = $_POST[ 'reason_' . $reason ];
			}

			$data = array(
				'reason'         => $reason,
				'plugin_version' => OPINIONSTAGE_WIDGET_VERSION,
				'wp_version'     => get_bloginfo( 'version' ),
				'site_lang'      => get_bloginfo( 'language' ),
			);

			if ( $reason_text !== '' ) {
				$data[ $reason_text_key ] = $reason_text;
			}
			require_once plugin_dir_path( __FILE__ ) . 'mixpanel-php/lib/Mixpanel.php';
			$mp = Mixpanel::getInstance( $this->project_token );
			$mp->track( 'plugin_disabled', $data );
		}

		wp_send_json_success();
	}

	private function is_plugins_screen() {
		return in_array( get_current_screen()->id, array( 'plugins', 'plugins-network' ) );
	}
}

$OpinionstageFeedback = new OpinionstageFeedback();
