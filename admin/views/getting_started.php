<?php
/**
 * Opinionstage Getting Started Admin page
 *
 * @package OpinionStageWordPressPlugin */

use Opinionstage\Infrastructure\Helper;

defined( 'ABSPATH' ) || die();
?>
<div id="opinionstage-content">
	<div class="opinionstage-bg-white">
		<?php require OPINIONSTAGE_PLUGIN_DIR . 'admin/template-parts/header-logo-line-logout-form.php'; ?>
		<div class="opinionstage-getting-started-section opinionstage-two-columns">
			<div class="opinionstage-two-columns__text">
				<h1 class="opinionstage-two-columns__title"><?php esc_html_e( 'Create a Quiz, Poll or Survey', 'social-polls-by-opinionstage' ); ?></h1>
				<div>
					<p><?php esc_html_e( 'Generate with AI, use a template, or build from scratch -  and publish in minutes.', 'social-polls-by-opinionstage' ); ?></p>
				</div>

				<?php require_once plugin_dir_path( __DIR__ ) . 'template-parts/signup-form.php'; ?>
				<div>
				</div>
			</div>
			<div class="opinionstage-two-columns__img">
				<img src="<?php echo esc_url( plugins_url( 'images/welcome-to-opinionstage.png', __DIR__ ) ); ?>" alt="<?php esc_html_e( 'Welcome to Opinion Stage', 'social-polls-by-opinionstage' ); ?>">
			</div>
		</div>

	</div>
</div>
