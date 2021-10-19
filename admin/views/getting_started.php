<?php
/**
 * Opinionstage Getting Started Admin page
 *
 * @package OpinionStageWordPressPlugin */

defined( 'ABSPATH' ) || die();

$footer_col_items = array(
	array(
		'title' => __( 'Quiz Templates', 'social-polls-by-opinionstage' ),
		'items' => array(
			array(
				'path'  => 't/personality-quiz-template',
				'title' => __( 'Personality Quiz', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 't/trivia-quiz-template',
				'title' => __( 'Trivia Quiz', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 't/lead-quiz-template',
				'title' => __( 'Lead Quiz', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 't/quiz-competition-template',
				'title' => __( 'Competition Quiz', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 'c/quizzes/types',
				'title' => __( 'All Quiz Types', 'social-polls-by-opinionstage' ),
			),
		),
	),
	array(
		'title' => __( 'Poll Templates', 'social-polls-by-opinionstage' ),
		'items' => array(
			array(
				'path'  => 't/list-poll-single-answer',
				'title' => __( 'Standard poll', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 't/image-poll',
				'title' => __( 'Image poll', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 't/thumbnail-poll',
				'title' => __( 'Thumbnail poll', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 't/head-to-head-poll',
				'title' => __( 'Head to Head poll', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 'c/polls/layouts',
				'title' => __( 'All Poll Layouts', 'social-polls-by-opinionstage' ),
			),
		),
	),
	array(
		'title' => __( 'Survey Templates', 'social-polls-by-opinionstage' ),
		'items' => array(
			array(
				'path'  => 't/customer-feedback-survey',
				'title' => __( 'Feedback survey', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 't/how-do-you-feel-about-working-from-home-',
				'title' => __( 'Satisfaction survey', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 't/user-experience-questionnaire',
				'title' => __( 'User experience survey', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 't/website-design-questionnaire',
				'title' => __( 'Website design survey ', 'social-polls-by-opinionstage' ),
			),
			array(
				'path'  => 'c/surveys',
				'title' => __( 'All Survey Templates', 'social-polls-by-opinionstage' ),
			),
		),
	),
);

/**
 * Generates template preview url.
 *
 * @param string $path part or url.
 * @return mixed
 */
function opinionstage_generate_template_url( $path ) {
	return add_query_arg(
		OPINIONSTAGE_UTM_PARAMETERS,
		OPINIONSTAGE_SERVER_BASE . '/templates/' . $path
	);
}
?>
<div id="opinionstage-content">
	<div class="opinionstage-bg-white">
		<div class="opinionstage-getting-started-section opinionstage-logo-wrapper">
			<div class="opinionstage-logo opinionstage-logo__dark"></div>
		</div>
		<div class="opinionstage-getting-started-section opinionstage-getting-started">
			<div class="opinionstage-getting-started__text">
				<h1 class="opinionstage-getting-started__title"><?php esc_html_e( 'Add Quizzes, Polls & Surveys to Your Website in Seconds', 'social-polls-by-opinionstage' ); ?></h1>
				<div>
					<p><?php esc_html_e( 'Join 100,000+ sites, from small blogs to top publishers, brands & businesses such as NBC, Warner Brothers, Uber & Pepsico.', 'social-polls-by-opinionstage' ); ?></p>
				</div>

				<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'template-parts/signup-form.php'; ?>
				<div>
				</div>
			</div>
			<div class="opinionstage-getting-started__img">
				<img src="<?php echo esc_url( plugins_url( 'images/welcome-to-opinionstage.jpg', dirname( __FILE__ ) ) ); ?>" alt="<?php esc_html_e( 'Welcome to Opinion Stage', 'social-polls-by-opinionstage' ); ?>">
			</div>
		</div>
	</div>

	<div class="opinionstage-getting-started-section">
		<div class="opinionstage-getting-started-footer">
			<h2 class="opinionstage-getting-started-footer__title"><?php esc_html_e( 'Check out these examples:', 'social-polls-by-opinionstage' ); ?></h2>
			<div class="opinionstage-getting-started-footer__items">
				<?php
				foreach ( $footer_col_items as $col ) {
					?>
					<div class="opinionstage-getting-started-footer__item">
						<h3 class="opinionstage-getting-started-footer__item__title"><?php echo esc_html( $col['title'] ); ?></h3>
						<ul class="opinionstage-getting-started-footer__list">
							<?php
							foreach ( $col['items'] as $anchor ) {
								?>
								<li>
									<a href="<?php echo esc_url( opinionstage_generate_template_url( $anchor['path'] ) ); ?>" target="_blank"><?php echo esc_html( $anchor['title'] ); ?></a>
								</li>
								<?php
							}
							?>
						</ul>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
