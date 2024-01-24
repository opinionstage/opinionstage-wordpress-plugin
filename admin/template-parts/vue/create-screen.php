<?php
/**
 * Create Screen template.
 *
 * @package OpinionStageWordPressPlugin
 */

$items = array(
	array(
		'title'             => __( 'Poll', 'social-polls-by-opinionstage' ),
		'description'       => __( 'Ask one question and define several answer choices', 'social-polls-by-opinionstage' ),
		'img'               => 'poll.png',
		'url_scratch_type'  => 'poll',
		'url_template_type' => 'polls',
	),
	array(
		'title'             => __( 'Form / Survey', 'social-polls-by-opinionstage' ),
		'description'       => __( 'Ask multiple questions from a range of question types', 'social-polls-by-opinionstage' ),
		'img'               => 'survey.png',
		'url_scratch_type'  => 'survey',
		'url_template_type' => 'surveys',
	),
	array(
		'title'             => __( 'Trivia Quiz', 'social-polls-by-opinionstage' ),
		'description'       => __( 'Create a knowledge test or assessment', 'social-polls-by-opinionstage' ),
		'img'               => 'trivia.png',
		'url_scratch_type'  => 'quiz',
		'url_template_type' => 'trivia_quizzes',
	),
	array(
		'title'             => __( 'Personality Quiz', 'social-polls-by-opinionstage' ),
		'description'       => __( 'Create a personality test or a product/service selector', 'social-polls-by-opinionstage' ),
		'img'               => 'personality.png',
		'url_scratch_type'  => 'outcome',
		'url_template_type' => 'personality_quizzes',
	)
);
?>
<div class="opinionstage-dashboard">
	<div class="opinionstage-dashboard-left">
		<div id="opinionstage-section-create" class="opinionstage-dashboard-section">
			<div class="opinionstage-section-header">
				<div class="opinionstage-section-title"><?php esc_html_e( 'Create', 'social-polls-by-opinionstage' ); ?></div>
			</div>
			
			<div class="opinionstage-section-content">
				
				<?php

				foreach ( $items as $item ) {
					?>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img
										src="<?php echo esc_url( plugins_url( '../images/' . $item['img'], __DIR__ ) ); ?>">
							</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php echo esc_html( $item['title'] ); ?></div>
							<div class="example">
							<?php
							echo esc_html( $item['description'] );
							?>
</div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<a href="<?php echo esc_url( opinionstage_get_templates_url_for_type( $item['url_template_type'] ) ); ?>"
								class="opinionstage-button opinionstage-button__grey opinionstage-button__middle"
								target="_blank" rel="noopener"><?php esc_html_e( 'Use Template', 'social-polls-by-opinionstage' ); ?></a>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
