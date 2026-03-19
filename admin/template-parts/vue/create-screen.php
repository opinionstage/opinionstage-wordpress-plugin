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
            <div class="opinionstage-section-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-package-plus" aria-hidden="true">
                    <path d="M16 16h6"></path>
                    <path d="M19 13v6"></path>
                    <path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"></path>
                    <path d="m7.5 4.27 9 5.15"></path>
                    <polyline points="3.29 7 12 12 20.71 7"></polyline>
                    <line x1="12" x2="12" y1="22" y2="12"></line>
                </svg>
                <div class="text-center">
                    <p class="bigger"><?php esc_html_e( 'Create your first item', 'social-polls-by-opinionstage' ); ?></p>
                    <p class=""><?php esc_html_e( 'Create a quiz, poll or survey', 'social-polls-by-opinionstage' ); ?></p>
                    <a href="<?php echo esc_url( OPINIONSTAGE_REDIRECT_CREATE_API_UTM ); ?>"
                       class="opinionstage-button opinionstage-button__blue"
                            <?php echo Helper::get_link_target_blank_attribute(); ?>><?php esc_html_e( 'Create New', 'social-polls-by-opinionstage' ); ?></a>
                </div>
            </div>
        </div>
	</div>
</div>