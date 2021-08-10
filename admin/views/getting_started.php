<?php
/**
 * Opinionstage Getting Started Admin page
 *
 * @package OpinionStageWordPressPlugin */

defined( 'ABSPATH' ) || die();
?>
<div id="opinionstage-content">
	<div class="opinionstage-header-wrapper">
			<?php if ( ! $os_client_logged_in ) { ?>
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
			</div>
			<?php } else { ?>
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
				<div class="opinionstage-connectivity-status"><?php echo esc_html( $os_options['email'] ); ?>
					<form method="POST" action="<?php echo esc_url( get_admin_url( null, 'admin.php?page=' . OPINIONSTAGE_DISCONNECT_PAGE ) ); ?>" class="opinionstage-connect-form">
						<button class="opinionstage-disconnect" type="submit"><?php esc_html_e( 'Disconnect', 'social-polls-by-opinionstage' ); ?></button>
					</form>
				</div>
			</div>
			<?php } ?>
	</div>
	<div class="opinionstage-grey-bg">
		<div class="opinionstage-getting-started opinionstage-getting-started-section">
			<div class="opinionstage-getting-started__text">
				<h1 class="opinionstage-getting-started__title"><?php esc_html_e( 'Add Engaging Quizzes, Polls & Surveys to Your Site', 'social-polls-by-opinionstage' ); ?></h1>
				<div>
					<p>
						<?php esc_html_e( 'Welcome to Opinion Stage! Create beautiful & top-performing', 'social-polls-by-opinionstage' ); ?>
						<a href="<?php echo esc_url( add_query_arg( OPINIONSTAGE_UTM_PARAMETERS, 'https://www.opinionstage.com/poll' ) ); ?>"
						   target="_blank"><?php esc_html_e( 'polls', 'social-polls-by-opinionstage' ); ?></a>,
						<a href="<?php echo esc_url( add_query_arg( OPINIONSTAGE_UTM_PARAMETERS, 'https://www.opinionstage.com/quiz' ) ); ?>"
						   target="_blank"><?php esc_html_e( 'quizzes', 'social-polls-by-opinionstage' ); ?></a>,
						<?php esc_html_e( 'and', 'social-polls-by-opinionstage' ); ?>
						<a href="<?php echo esc_url( add_query_arg( OPINIONSTAGE_UTM_PARAMETERS, 'https://www.opinionstage.com/survey' ) ); ?>"
						   target="_blank"><?php esc_html_e( 'surveys', 'social-polls-by-opinionstage' ); ?></a>
						<?php esc_html_e( 'in seconds. Start from scratch or from one of our', 'social-polls-by-opinionstage' ); ?>
						<a href="<?php echo esc_url( opinionstage_get_templates_url_for_type( 'home' ) ); ?>"
						   target="_blank"><?php esc_html_e( 'templates', 'social-polls-by-opinionstage' ); ?></a>.
					</p>
					<p><?php esc_html_e( 'Join 100,000+ sites, from small blogs to top publishers, brands & educators such as NBC, Warner Brothers, Pepsico & Harvard.', 'social-polls-by-opinionstage' ); ?></p>
				</div>

				<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'template-parts/signup-form.php'; ?>
				<div>
				</div>
			</div>
			<div class="opinionstage-getting-started__img">
				<img src="<?php echo esc_url( plugins_url( 'images/welcome-to-opinionstage.png', dirname( __FILE__ ) ) ); ?>"
					 alt="<?php esc_html_e( 'Welcome to Opinoin Stage', 'social-polls-by-opinionstage' ); ?>">
			</div>
		</div>

		<div class="opinionstage-getting-started-templates opinionstage-getting-started-section">
			<h2 class="opinionstage-getting-started-templates__title"><?php esc_html_e( 'Templates & Examples', 'social-polls-by-opinionstage' ); ?></h2>
			<?php
			$templates_items_date = array(
				array(
					'title'               => __( 'Quiz', 'social-polls-by-opinionstage' ),
					'image_name'          => 'trivia.png',
					'text'                => __( 'Create a challenging knowledge quiz or a fun personality quiz', 'social-polls-by-opinionstage' ),
					'view_templates_type' => 'quizzes',
				),
				array(
					'title'               => __( 'Poll', 'social-polls-by-opinionstage' ),
					'image_name'          => 'poll.png',
					'text'                => __( 'Engage your audience and gather opinions with one question that matters', 'social-polls-by-opinionstage' ),
					'view_templates_type' => 'polls',
				),
				array(
					'title'               => __( 'Survey', 'social-polls-by-opinionstage' ),
					'image_name'          => 'survey.png',
					'text'                => __( 'Learn from your audience by asking multiple questions of different types', 'social-polls-by-opinionstage' ),
					'view_templates_type' => 'surveys',
				),
				array(
					'title'               => __( 'Standard Form', 'social-polls-by-opinionstage' ),
					'image_name'          => 'form.png',
					'text'                => __( 'Gather data simply and effectively with a multi-field form', 'social-polls-by-opinionstage' ),
					'view_templates_type' => 'classic_forms',
				),
			);
			?>
			<div class="opinionstage-getting-started-templates__row">
				<?php
				foreach ( $templates_items_date as $item ) {
					?>
					<div class="opinionstage-template-item">
						<img src="<?php echo esc_url( plugins_url( 'images/' . $item['image_name'], dirname( __FILE__ ) ) ); ?>" class="opinionstage-template-item__icon" alt="<?php echo esc_attr( $item['title'] ); ?>">
						<h3 class="opinionstage-template-item__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="opinionstage-template-item__text"><?php echo esc_html( $item['text'] ); ?></p>

						<a href="<?php echo esc_url( opinionstage_get_templates_url_for_type( $item['view_templates_type'] ) ); ?>" class="opinionstage-template-item__button" target="_blank"><?php esc_html_e( 'View Templates', 'social-polls-by-opinionstage' ); ?></a>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
