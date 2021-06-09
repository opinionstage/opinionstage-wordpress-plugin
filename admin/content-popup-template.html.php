<?php
/**
 * Content Popup Template
 *
 * @package OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();

require_once plugin_dir_path( __FILE__ ) . '../includes/opinionstage-client-session.php';

$opinionstage_user_logged_in = opinionstage_user_logged_in();

// Note: all html put here (not moved to js build system) in order to preserve ability to use WordPress translate APIs.
?>
<style type="text/css">
	.content__image {
			background-image: url(<?php echo esc_url( plugins_url( '', dirname( __FILE__ ) ) . '/admin/images/form-not-found.png' ); ?>);
			background-repeat: no-repeat;
			background-size: cover;
		}
</style>
<template data-opinionstage-content-popup-template>
	<div class='opinionstage-content-popup-contents' data-opinionstage-content-popup data-opinionstage-client-logged-in="<?php echo esc_attr( $opinionstage_user_logged_in ); ?>">
		<header class='header'>
			<div class='header__container'>
				<div class='header__logo'>
					<a href='<?php echo esc_url( OPINIONSTAGE_SERVER_BASE ); ?>' target='_blank'>
						<img src='<?php echo esc_url( plugins_url( 'admin/images/os-logo-header.png', plugin_dir_path( __FILE__ ) ) ); ?>'>
					</a>
				</div>
				<div class='header__action'>
					<div class='btn-close' @click="closePopup">&#x2715;</div>
				</div>
			</div>
		</header>
		<section>
			<popup-content
				:client-is-logged-in="isClientLoggedIn"
				:modal-is-opened="isModalOpened"
				:widget-type="widgetType"
				@widget-selected="selectWidgetAndExit"
				client-widgets-url="<?php echo esc_url( OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API ); ?>"
				client-widgets-has-new-url="<?php echo esc_url( OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API_RECENT_UPDATE ); ?>"
				access-key="<?php echo esc_js( opinionstage_user_access_token() ); ?>"
				plugin-version="<?php echo esc_js( OPINIONSTAGE_WIDGET_VERSION ); ?>"
			>
			</popup-content>
		</section>
	</div>
</template>

<template id="opinionstage-widget-list">
<div class='page-content'>
	<div class='content-actions'>
		<div class='content-actions__left'>
			<h1 class="main-title"><?php esc_html_e( 'My Items', 'social-polls-by-opinionstage' ); ?></h1>
		</div>
		<div class="content-actions__right">
			<div class='filter'>
				<div class="dropdown dropdown_items">
					<button class="dropbtn"><span>{{ selectedWidgetTitle }}</span></button>
					<div class="dropdown-content">
						<div class='filter__itm'
								@click="selectWidgetType('all')"
								:class="{ active: selectedWidgetType === 'all' }"
						><?php esc_html_e( 'all items', 'social-polls-by-opinionstage' ); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('poll')"
								:class="{ active: selectedWidgetType === 'poll' }"
						><?php esc_html_e( 'poll', 'social-polls-by-opinionstage' ); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('survey')"
								:class="{ active: selectedWidgetType === 'survey' }"
						><?php esc_html_e( 'survey', 'social-polls-by-opinionstage' ); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('trivia')"
								:class="{ active: selectedWidgetType === 'trivia' }"
						><?php esc_html_e( 'trivia quiz', 'social-polls-by-opinionstage' ); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('outcome')"
								:class="{ active: selectedWidgetType === 'outcome' }"
						><?php esc_html_e( 'personality quiz', 'social-polls-by-opinionstage' ); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('form')"
								:class="{ active: selectedWidgetType === 'form' }"
						><?php esc_html_e( 'standard form', 'social-polls-by-opinionstage' ); ?></div>
					</div>
				</div>
			</div>
			<div class="os-search" :class='{ hidden: !showSearch }'>
				<input
					class='os-search__input'
					placeholder='Search...'
					type='search'
					v-model='widgetTitleSearch'
				>
				<span class="os-search__icon icon-os-plugin-common-search"></span> 
			</div>
			<div class="content-actions__sep"></div>

			<a href="<?php echo esc_url( add_query_arg( 'w_type', 'all', OPINIONSTAGE_REDIRECT_CREATE_WIDGET_API_UTM ) ); ?>" class="opinionstage-blue-btn" target="_blank"><?php esc_html_e( 'Create', 'social-polls-by-opinionstage' ); ?></a>
		</div>
	</div>
	<div class='content__list'>
		<div v-if='hasData'>
			<div class='content__itm' v-for="widget in widgets">
				<a target="_blank" :href='widget.landingPageUrl'>
				<div class='content__image'>
					<img :src='widget.imageUrl'>
					<div class='content__label'>{{ widget.type }}</div>
				</div>
				</a>
				<div class='content__info'>
					<span v-if="widget.isDraft" class="opinionstage-draft"><?php esc_html_e( 'draft', 'social-polls-by-opinionstage' ); ?></span>
					<a target="_blank" :href='widget.editUrl'>
						<span class="content__info-title">{{ widget.title }}</span>
						<div class="content__info-details">
							<span class="os-icon-plugin icon-os-common-date"></span>
							{{ widget.updatedAt | moment('DD MMMM YYYY') }}
						<span v-if="widget.isClosed">
							<span class="opinionstage-with-separator">
								<span class="icon-os-status-closed"></span>
								<?php esc_html_e( 'closed', 'social-polls-by-opinionstage' ); ?>
							</span>
						</span>
						<span v-if="widget.isOpen">
							<span class="opinionstage-with-separator">
								<span class="icon-os-status-open"></span>
								<?php esc_html_e( 'open', 'social-polls-by-opinionstage' ); ?>
							</span>
						</span>
					</div>
					</a>
				</div>
				<div class='content__links'>
					<button class='popup-content-btn content__links-itm' @click="select(widget)" ><?php esc_html_e( 'insert', 'social-polls-by-opinionstage' ); ?></button>
					<div class="dropdown dropdown-popup-action">
						<div class="popup-action popup-content-btn"></div>
						<div class="popup-action-dropdown dropdown-content">
							<a class='content__links-itm' target="_blank" :href='widget.landingPageUrl'><?php esc_html_e( 'view', 'social-polls-by-opinionstage' ); ?></a>
							<a class='content__links-itm' target="_blank" :href='widget.editUrl' v-show="!widget.template"><?php esc_html_e( 'edit', 'social-polls-by-opinionstage' ); ?></a>
							<a class='content__links-itm' target="_blank" :href='widget.statsUrl' v-show="!widget.template"><?php esc_html_e( 'Results', 'social-polls-by-opinionstage' ); ?></a>
						</div>
					</div>
				</div>
			</div>
			<div class='content__loading' v-if='dataLoading'>
				<?php esc_html_e( 'loading...', 'social-polls-by-opinionstage' ); ?>
			</div>
			<div v-else>
				<button
					class='btn-show-more'
					v-if='!noMoreData'
					@click='showMore'
				><?php esc_html_e( 'Click for more', 'social-polls-by-opinionstage' ); ?></button>
			</div>
		</div>
		<div v-else>
			<?php esc_html_e( 'No items found', 'social-polls-by-opinionstage' ); ?>
		</div>
	</div>
	<div class="selected-draft" v-if="selectedDraftWidget.editUrl">
		<div class="selected-draft__container">
			<div>
				<span id="opinionstage-dialog-close" class="opinionstage-close" @click="selectedDraftWidget = !selectedDraftWidget"></span>
				<div class="selected-draft__message">
					<p>
						<?php
						printf(
							'%s <a :href="selectedDraftWidget.editUrl" target="_ blank">%s</a> %s',
							esc_html__( 'Widget is not published yet. Please', 'social-polls-by-opinionstage' ),
							esc_html__( 'edit', 'social-polls-by-opinionstage' ),
							esc_html__( 'the widget to publish it', 'social-polls-by-opinionstage' )
						);
						?>
					</p>
					<p>
						<?php esc_html_e( 'Need Help?', 'social-polls-by-opinionstage' ); ?>
						<a href="<?php echo esc_url( OPINIONSTAGE_LIVE_CHAT_URL_UTM ); ?>" target="_blank"><?php esc_html_e( 'Contact Us' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<template id="opinionstage-popup-content">
	<div v-if="clientIsLoggedIn">
		<div v-if="newWidgetsAvailable" class="notification-container">
			<notification v-on:update-btn-click='reloadAndRestartCheckingForUpdates'>
		</div>
		<widget-list
			:widgets='widgets'
			:pre-selected-widget-type='searchCriteria.type'
			:data-loading='dataLoading'
			:show-search='true'
			:no-more-data='noMoreData'
			@widget-selected="widgetSelected"
			@widgets-search-update='reloadData'
			@load-more-widgets='appendData'
		>
	</div>
	<div class='page-content' v-else>
			<h1 class='main-title'>
				<b><?php esc_html_e( 'Connect WordPress with Opinion Stage to get started', 'social-polls-by-opinionstage' ); ?></b>
			</h1>
			<a id="os-start-login" data-os-login="" href="<?php echo esc_url( admin_url( 'admin.php?page=opinionstage-getting-started' ) ); ?>" class="opinionstage-blue-btn"><?php esc_html_e( 'CONNECT', 'social-polls-by-opinionstage' ); ?></a>
	</div>
</template>

<template id="opinionstage-notification">
	<div class="opinionstage-section-notification">
		<p class="opinionstage-section-notification__title">
			<?php esc_html_e( 'Your content has been updated, please click the button to update your view', 'social-polls-by-opinionstage' ); ?>
		</p>
		<div class="opinionstage-section-notification__controls">
			<button class='btn-blue' @click="initiateUpdate"><?php esc_html_e( 'Update view', 'social-polls-by-opinionstage' ); ?></button>
		</div>
	</div>
</template>

