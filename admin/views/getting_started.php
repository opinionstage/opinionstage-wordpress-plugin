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
			<div class="opinionstage-getting-started__half">
				<h1 class="opinionstage-getting-started__title"><?php esc_html_e( 'Welcome to Opinion Stage!', 'social-polls-by-opinionstage' ); ?></h1>
				<p class="opinionstage-getting-started__text"><?php esc_html_e( 'Connect to Opinion Stage to start creating beautiful & top-performing polls, quizzes, surveys and forms. Start from scratch or from one of our templates.', 'social-polls-by-opinionstage' ); ?></p>

				<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'template-parts/signup-form.php'; ?>
				<div>
					<a href="<?php echo esc_url( add_query_arg( OPINIONSTAGE_UTM_PARAMETERS, 'https://help.opinionstage.com/en/articles/2718244-why-do-i-need-to-create-an-account-on-opinion-stage-to-use-the-plugin' ) ); ?>" target="_blank" data-ignore-swal-js class="opinionstage-grey-link"><?php esc_html_e( 'Why connect?', 'social-polls-by-opinionstage' ); ?></a>
				</div>
			</div>
			<div class="opinionstage-getting-started__half">
				<img src="<?php echo esc_url( plugins_url( 'images/welcome-to-opinioinstage.png', dirname( __FILE__ ) ) ); ?>" alt="<?php esc_html_e( 'Welcome to Opinoin Stage', 'social-polls-by-opinionstage' ); ?>">
			</div>
		</div>

		<div class="opinionstage-getting-started-templates opinionstage-getting-started-section">
			<h2 class="opinionstage-getting-started-templates__title"><?php esc_html_e( 'Templates & Examples', 'social-polls-by-opinionstage' ); ?></h2>
			<?php
			$templates_items_date = array(
				array(
					'title'               => __( 'Quiz', 'social-polls-by-opinionstage' ),
					'image_name'          => 'trivia.png',
					'text'                => __( 'Create a knowledge test or assessment', 'social-polls-by-opinionstage' ),
					'view_templates_type' => 'quizzes',
				),
				array(
					'title'               => __( 'Poll', 'social-polls-by-opinionstage' ),
					'image_name'          => 'poll.png',
					'text'                => __( 'Ask one question and define several answer choices', 'social-polls-by-opinionstage' ),
					'view_templates_type' => 'polls',
				),
				array(
					'title'               => __( 'Survey', 'social-polls-by-opinionstage' ),
					'image_name'          => 'survey.png',
					'text'                => __( 'Ask multiple questions from a range of question types', 'social-polls-by-opinionstage' ),
					'view_templates_type' => 'surveys',
				),
				array(
					'title'               => __( 'Standard Form', 'social-polls-by-opinionstage' ),
					'image_name'          => 'form.png',
					'text'                => __( 'Display all fields on one page', 'social-polls-by-opinionstage' ),
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

						<a href="<?php echo esc_url( opinionstage_get_templates_url_for_type( $item['view_templates_type'] ) ); ?>" data-ignore-swal-js class="opinionstage-template-item__button" target="_blank"><?php esc_html_e( 'View Templates', 'social-polls-by-opinionstage' ); ?></a>
					</div>
					<?php
				}
				?>
			</div>
			<a href="<?php echo esc_url( add_query_arg( OPINIONSTAGE_UTM_PARAMETERS, 'https://help.opinionstage.com/en/collections/1401239-wordpress-plugin' ) ); ?>" data-ignore-swal-js class="opinionstage-grey-link" target="_blank"><?php esc_html_e( 'Need help?', 'social-polls-by-opinionstage' ); ?></a>
		</div>
	</div>
</div>
