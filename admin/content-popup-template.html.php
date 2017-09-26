<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

require_once( plugin_dir_path( __FILE__ ).'../includes/opinionstage-client-session.php' );

$opinionstage_user_logged_in = opinionstage_user_logged_in();

function opinionstage_create_new_href() {
	return OPINIONSTAGE_SERVER_BASE.'/dashboard/content';
}

// Note: all html put here (not moved to js build system) in order to preserve ability to use Wordpress translate APIs
?>

<template data-opinionstage-content-popup-template>
	<div class='opinionstage-content-popup-contents' data-opinionstage-content-popup data-opinionstage-client-logged-in="<?php echo $opinionstage_user_logged_in ?>">
		<header class='header'>
			<div class='header__container'>
				<div class='header__logo'>
					<a href='<?php echo OPINIONSTAGE_SERVER_BASE ?>' target='_blank'>
						<img src='<?php echo plugins_url('admin/images/logo.svg', plugin_dir_path( __FILE__ )) ?>'>
					</a>
				</div>
				<div class='header__nav'>
					<div class='std-btn'
							@click="showClientWidgets"
							:class="{ active: showClientContent }"
					>My content</div>
					<div class='std-btn'
							@click="showTemplatesWidgets"
							:class="{ active: !showClientContent }"
					>Content Examples</div>
				</div>
				<div class='header__action'>
					<?php if ( $opinionstage_user_logged_in ) { ?>
					<a href="<?php echo opinionstage_create_new_href() ?>" target="_blank" class='btn-create' @click="closePopup">CREATE NEW</a>
					<?php } ?>
					<div class='btn-close' @click="closePopup">X</div>
				</div>
			</div>
		</header>
		<section>
			<popup-content
				:show-client-content="showClientContent"
				:client-is-logged-in="isClientLoggedIn"
				@insert-shortcode="insertShortcode"
				client-widgets-url="<?php echo OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API ?>"
				shared-widgets-url="<?php echo OPINIONSTAGE_CONTENT_POPUP_SHARED_WIDGETS_API ?>"
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
		<div class='filter'>
			<div class='filter__itm'
					@click="selectWidgetType('all')"
					:class="{ active: selectedWidgetType === 'all' }"
			>all</div>
			<div class='filter__itm'
					@click="selectWidgetType('poll')"
					:class="{ active: selectedWidgetType === 'poll' }"
			>poll</div>
			<div class='filter__itm'
					@click="selectWidgetType('set')"
					:class="{ active: selectedWidgetType === 'set' }"
			>set</div>
			<div class='filter__itm'
					@click="selectWidgetType('survey')"
					:class="{ active: selectedWidgetType === 'survey' }"
			>survey</div>
			<div class='filter__itm'
					@click="selectWidgetType('slideshow')"
					:class="{ active: selectedWidgetType === 'slideshow' }"
			>slideshow</div>
			<div class='filter__itm'
					@click="selectWidgetType('trivia')"
					:class="{ active: selectedWidgetType === 'trivia' }"
			>trivia</div>
			<div class='filter__itm'
					@click="selectWidgetType('outcome')"
					:class="{ active: selectedWidgetType === 'outcome' }"
			>outcome</div>
			<div class='filter__itm'
					@click="selectWidgetType('list')"
					:class="{ active: selectedWidgetType === 'list' }"
			>list</div>
			<div class='filter__itm'
					@click="selectWidgetType('form')"
					:class="{ active: selectedWidgetType === 'form' }"
			>form</div>
		</div>
		<div class='search'>
			<img
				class='search-icon'
				:class='{ hidden: !showSearch }'
				src='<?php echo plugins_url('admin/images/search_icon.jpg', plugin_dir_path( __FILE__ )) ?>'
			>
			<input
				class='std-search'
				placeholder='Search...'
				type='search'
				v-model='widgetTitleSearch'
				:class='{ hidden: !showSearch }'
			>
		</div>
	</div>
	<div class='content__list'>
		<div v-if='hasData'>
			<div class='content__itm' v-for="widget in widgets">
				<div class='content__image'>
					<img :src='widget.imageUrl'>
					<div class='content__label'>{{ widget.type }}</div>
				</div>
				<p class='content__info'>{{ widget.title }}</p>
				<div class='content__links'>
					<button class='content__links-itm' @click="insertShortcode(widget)">insert</button>
					<a class='content__links-itm' target="_blank" :href='widget.landingPageUrl'>view</a>
					<a class='content__links-itm' target="_blank" :href='widget.editUrl' v-show="!widget.template">edit</a>
					<a class='content__links-itm' target="_blank" :href='widget.statsUrl' v-show="!widget.template">statistics</a>
				</div>
			</div>
			<div class='content__loading' v-if='dataLoading'>
				loading...
			</div>
			<div v-else>
				<button
					class='btn-show-more'
					v-if='!noMoreData'
					@click='showMore'
				>Click for more</button>
			  <div v-else>
					no more widgets
			  </div>
			</div>
		</div>
		<div v-else>
			There is no widgets of this type
			<span v-if='widgetTitleSearch'>
			and title like: "{{widgetTitleSearch}}"
			</span>
		</div>
	</div>
</div>
</template>

<template id="opinionstage-popup-content">
	<div v-if="showClientContent">
		<div v-if="clientIsLoggedIn">
			<widget-list
				:widgets='widgets'
				:data-loading='dataLoading'
				:show-search='true'
				:no-more-data='noMoreData'
				@insert-shortcode="insertShortcode"
				@widgets-search-update='reloadData'
				@load-more-widgets='appendData'
			>
		</div>
		<div class='page-content' v-else>
			<h1 class='main-title'>
				<b>Connect WordPress</b>
				<span>with</span>
				<b>Opinion Stage</b>
				<span>to display your content</span>
			</h1>
			<form class='conect-form'>
				<a href="<?php echo get_admin_url(null, '', 'admin').'admin.php?page='.OPINIONSTAGE_MENU_SLUG ?>" class='btn-blue'>Connect</a>
			</form>
		</div>
	</div>
	<div v-else>
		<widget-list
			:widgets='widgets'
			:data-loading='dataLoading'
			:show-search='false'
			:no-more-data='noMoreData'
			@insert-shortcode='insertShortcode'
			@widgets-search-update='reloadData'
			@load-more-widgets='appendData'
		>
	</div>
</template>
