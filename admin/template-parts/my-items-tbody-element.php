<?php
/**
 * Table Element on My Items page
 *
 * @package OpinionStageWordPressPlugin
 */
?>
<tbody>
<tr class="item-wrapper">
	<td class="image">
		<a href="<?php echo esc_url( $item->landing_page_url ); ?>" target="_blank">
			<div class="content-item-image quiz">
				<img height="90" src="<?php echo esc_url( $item->image_url ); ?>" width="120">
				<div class="content-item-label"><?php echo esc_html( $item->type ); ?></div>
			</div>
		</a>
	</td>
	<td class="long">
		<div><a
				href="<?php echo esc_url( $item->edit_url ); ?>"
				target="_blank">
				<?php if ( $item->is_draft ) { ?>
					<span class="opinionstage-draft"><?php esc_html_e( 'draft', 'social-polls-by-opinionstage' ); ?></span>
				<?php } ?>
				<?php echo sprintf( '<span class="opinionstage-item-title">%s</span>', esc_html( $item->title ) ); ?>
			</a>
			<table>
				<tr>
					<td><span class="os-icon-plugin icon-os-common-date"></span>
						<div class="label"><?php echo esc_html( gmdate( 'j F Y', strtotime( $item->updated_at ) ) ); ?>
						<?php if ( $item->is_closed ) { ?>
							<span class="opinionstage-with-separator"><span class="icon-os-status-closed"></span><?php esc_html_e( 'closed', 'social-polls-by-opinionstage' ); ?></span>
						<?php } elseif ( $item->is_open ) { ?>
							<span class="opinionstage-with-separator"><span class="icon-os-status-open"></span><?php esc_html_e( 'open', 'social-polls-by-opinionstage' ); ?></span>
						<?php } ?>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</td>
	<td class="action">
		<div class="opinionstage-item-action-container">
			<a href="#" class="opinionstage-blue-bordered-btn opinionstage-edit-content opinionstage-open-modal" data-is-draft="<?php echo esc_attr( $item->is_draft ); ?>" data-edit-url="<?php echo esc_attr( $item->edit_url ); ?>" data-shortcode='<?php echo esc_attr( htmlspecialchars( $item->shortcode, ENT_QUOTES ) ); ?>'
			> <?php esc_html_e( 'Add To Site', 'social-polls-by-opinionstage' ); ?> </a>
			<a href="<?php echo esc_url( $item->edit_url ); ?>" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> <?php esc_html_e( 'Edit', 'social-polls-by-opinionstage' ); ?> </a>
			<a href="<?php echo esc_url( $item->stats_url ); ?>" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> <?php esc_html_e( 'Results', 'social-polls-by-opinionstage' ); ?> </a>
		</div>
	</td>
</tr>
</tbody>
