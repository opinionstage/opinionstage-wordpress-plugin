<?php
/**
 * Create Screen template.
 *
 * @package OpinionStageWordPressPlugin
 */

use Opinionstage\Infrastructure\Helper;

?>
<div class="opinionstage-dashboard">
	<div class="opinionstage-dashboard-left">
		<div id="opinionstage-section-create" class="opinionstage-dashboard-section">
			<div class="opinionstage-section-header">
				<div class="opinionstage-section-title"><?php esc_html_e( 'Welcome to Opinion Stage!', 'social-polls-by-opinionstage' ); ?></div>
			</div>
            <div class="opinionstage-section-content">
                <p>
                    <a href="<?php echo esc_url( OPINIONSTAGE_REDIRECT_WORKSPACE_API_UTM ); ?>"
                       class="opinionstage-button opinionstage-button__blue"
                            <?php echo Helper::get_link_target_blank_attribute(); ?>><?php esc_html_e( 'Create your first Quiz, Poll or Survey', 'social-polls-by-opinionstage' ); ?></a>
                </p>
            </div>
        </div>
	</div>
</div>