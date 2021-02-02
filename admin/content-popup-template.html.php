<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

require_once( plugin_dir_path( __FILE__ ).'../includes/opinionstage-client-session.php' );

$opinionstage_user_logged_in = opinionstage_user_logged_in();

// Note: all html put here (not moved to js build system) in order to preserve ability to use Wordpress translate APIs
?>
<style type="text/css">
	.content__image {
		    background-image: url(<?php echo plugins_url('', dirname(__FILE__) ) . '/admin/images/form-not-found.png' ?>);
		    background-repeat: no-repeat;
    		background-size: cover;
		}
</style>
<template data-opinionstage-content-popup-template>
	<div class='opinionstage-content-popup-contents' data-opinionstage-content-popup data-opinionstage-client-logged-in="<?php echo $opinionstage_user_logged_in ?>">
		<header class='header'>
			<div class='header__container'>
				<div class='header__logo'>
					<a href='<?php echo OPINIONSTAGE_SERVER_BASE ?>' target='_blank'>
						<img src='<?php echo plugins_url('admin/images/os-logo-header.png', plugin_dir_path( __FILE__ )) ?>'>
					</a>
				</div>
				<div class='header__action'>
					<div class='btn-close' @click="closePopup">&#x2715;</div>
				</div>
			</div>
		</header>
		<section>
			<popup-content
				:show-client-content="showClientContent"
				:client-is-logged-in="isClientLoggedIn"
				:modal-is-opened="isModalOpened"
				:widget-type="widgetType"
				@widget-selected="selectWidgetAndExit"
				client-widgets-url="<?php echo OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API ?>"
				shared-widgets-url="<?php echo OPINIONSTAGE_CONTENT_POPUP_SHARED_WIDGETS_API ?>"
				client-widgets-has-new-url="<?php echo OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API_RECENT_UPDATE ?>"
				access-key="<?php echo opinionstage_user_access_token() ?>"
				plugin-version="<?php echo OPINIONSTAGE_WIDGET_VERSION ?>"
			>
			</popup-content>
		</section>
	</div>
</template>

<template id="opinionstage-widget-list">
<div class='page-content'>
	<div class='content-actions'>
		<div class='content-actions__left'>
			<h1 class="main-title"><?php _e('My Items', 'social-polls-by-opinionstage'); ?></h1>
		</div>
		<div class="content-actions__right">
			<div class='filter'>
				<div class="dropdown dropdown_items">
					<button class="dropbtn"><span>{{ selectedWidgetTitle }}</span></button>
					<div class="dropdown-content">
						<div class='filter__itm'
								@click="selectWidgetType('all')"
								:class="{ active: selectedWidgetType === 'all' }"
						><?php _e('all items', 'social-polls-by-opinionstage'); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('poll')"
								:class="{ active: selectedWidgetType === 'poll' }"
						><?php _e('poll', 'social-polls-by-opinionstage'); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('survey')"
								:class="{ active: selectedWidgetType === 'survey' }"
						><?php _e('survey', 'social-polls-by-opinionstage'); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('trivia')"
								:class="{ active: selectedWidgetType === 'trivia' }"
						><?php _e('trivia quiz', 'social-polls-by-opinionstage'); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('outcome')"
								:class="{ active: selectedWidgetType === 'outcome' }"
						><?php _e('personality quiz', 'social-polls-by-opinionstage'); ?></div>
						<div class='filter__itm'
								@click="selectWidgetType('form')"
								:class="{ active: selectedWidgetType === 'form' }"
						><?php _e('classic form', 'social-polls-by-opinionstage'); ?></div>
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
				<span class="os-search__icon icon-os-common-tip"></span>
			</div>
			<div class="content-actions__sep"></div>
			<a href="<?php echo admin_url( 'admin.php?page=' . OPINIONSTAGE_MENU_SLUG ); ?>" target='_blank' class="btn-create"><?php _e('CREATE', 'social-polls-by-opinionstage'); ?></a>
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
				<p class='content__info'><a target="_blank" :href='widget.editUrl'>{{ widget.title }}</a></p>
				<div class='content__links'>
					<button class='popup-content-btn content__links-itm' @click="select(widget)"><?php _e('insert', 'social-polls-by-opinionstage'); ?></button>
					<div class="dropdown dropdown-popup-action">
						<div class="popup-action popup-content-btn"></div>
						<div class="popup-action-dropdown dropdown-content">
							<a class='content__links-itm' target="_blank" :href='widget.landingPageUrl'><?php _e('view', 'social-polls-by-opinionstage'); ?></a>
							<a class='content__links-itm' target="_blank" :href='widget.editUrl' v-show="!widget.template"><?php _e('edit', 'social-polls-by-opinionstage'); ?></a>
							<a class='content__links-itm' target="_blank" :href='widget.statsUrl' v-show="!widget.template"><?php _e('Results', 'social-polls-by-opinionstage'); ?></a>
						</div>
					</div>
				</div>
			</div>
			<div class='content__loading' v-if='dataLoading'>
				<?php _e('loading...', 'social-polls-by-opinionstage'); ?>
			</div>
			<div v-else>
				<button
					class='btn-show-more'
					v-if='!noMoreData'
					@click='showMore'
				><?php _e('Click for more', 'social-polls-by-opinionstage'); ?></button>
			</div>
		</div>
		<div v-else>
			<?php _e('No items found', 'social-polls-by-opinionstage'); ?>
		</div>
	</div>
</div>
</template>

<template id="opinionstage-popup-content">
	<div v-if="showClientContent">
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
					<b><?php _e('all items', 'social-polls-by-opinionstage'); ?></b>
				</h1>
				<a id="os-start-login" data-os-login="" href="<?php echo admin_url( 'admin.php?page=opinionstage-getting-started' ); ?>" class="opinionstage-blue-btn"><?php _e('CONNECT', 'social-polls-by-opinionstage'); ?></a>
		</div>
	</div>
	<div v-else>
		<widget-list
			:widgets='widgets'
			:pre-selected-widget-type='searchCriteria.type'
			:data-loading='dataLoading'
			:show-search='false'
			:no-more-data='noMoreData'
			@widget-selected="widgetSelected"
			@widgets-search-update='reloadData'
			@load-more-widgets='appendData'
		>
	</div>
</template>

<template id="opinionstage-notification">
	<div class="opinionstage-section-notification">
		<p class="opinionstage-section-notification__title">
			<?php _e('Your content has been updated, please click the button to update your view', 'social-polls-by-opinionstage'); ?>
		</p>
		<div class="opinionstage-section-notification__controls">
			<button class='btn-blue' @click="initiateUpdate"><?php _e('Update view', 'social-polls-by-opinionstage'); ?></button>
		</div>
	</div>
</template>
