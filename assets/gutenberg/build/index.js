!function(e){var t={};function r(a){if(t[a])return t[a].exports;var o=t[a]={i:a,l:!1,exports:{}};return e[a].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,a){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(r.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(a,o,function(t){return e[t]}.bind(null,o));return a},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=4)}([function(e,t){!function(){e.exports=this.wp.element}()},function(e,t){!function(){e.exports=this.wp.i18n}()},function(e,t){!function(){e.exports=this.wp.blocks}()},function(e,t,r){},function(e,t,r){"use strict";r.r(t);var a=r(2),o=r(1),i=r(0),n=(r(3),{widgetType:{type:"string",source:"attribute",attribute:"data-type",selector:"div[data-type]"},embedUrl:{source:"attribute",attribute:"data-test-url",selector:"div[data-test-url]"},lockEmbed:{source:"attribute",attribute:"data-lock-embed",selector:"div[data-lock-embed]"},buttonText:{source:"attribute",attribute:"data-button-text",selector:"div[data-button-text]"},insertItemImage:{source:"attribute",attribute:"data-image-url",selector:"div[data-image-url]"},insertItemOsTitle:{source:"attribute",attribute:"data-title-url",selector:"div[data-title-url]"},insertItemOsView:{source:"attribute",attribute:"data-view-url",selector:"div[data-view-url]"},insertItemOsEdit:{source:"attribute",attribute:"data-edit-url",selector:"div[data-edit-url]"},insertItemOsStatistics:{source:"attribute",attribute:"data-statistics-url",selector:"div[data-statistics-url]"}}),s="opinion-stage",c={html:!1};function l(e){var t=e.name,r=e.className,n=e.attributes,s=e.setAttributes,c=e.clientId,l=(n.widgetType,n.embedUrl),p=(n.lockEmbed,n.buttonText),b=n.insertItemImage,m=n.insertItemOsTitle,d=n.insertItemOsView,g=n.insertItemOsEdit,O=n.insertItemOsStatistics;if("false"===OPINIONSTAGE_GUTENBERG_DATA.userLoggedIn)return Object(i.createElement)("div",{className:r},Object(i.createElement)("div",{className:"os-widget-wrapper components-placeholder"},Object(i.createElement)("p",{className:"components-heading"},Object(i.createElement)("img",{src:OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl,alt:""})),Object(i.createElement)("p",{className:"components-heading"},"Please connect WordPress to Opinion Stage to start adding polls, quizzes, surveys & forms"),Object(i.createElement)("a",{href:OPINIONSTAGE_GUTENBERG_DATA.loginPageUrl,className:"components-button is-button is-default is-block is-primary"},"Connect")));var y=function(e){switch(e){case"opinion-stage/block-os-poll":return"poll";case"opinion-stage/block-os-survey":return"survey";case"opinion-stage/block-os-trivia":return"trivia";case"opinion-stage/block-os-personality":return"personality";case"opinion-stage/block-os-form":return"form";default:console.warn("unknown block name:",e)}}(t),v=function(e){switch(e){case"poll":return Object(o.__)("Poll");case"survey":return Object(o.__)("Survey");case"trivia":return Object(o.__)("Trivia Quiz");case"personality":return Object(o.__)("Personality Quiz");case"form":return Object(o.__)("Standard Form")}}(y),_=function(e){var t=function(e){switch(e){case"poll":return"poll";case"survey":return"survey";case"trivia":return"trivia";case"personality":return"personality";case"form":return"form"}}(e.type),r={widgetType:t,lockEmbed:!0,buttonText:"Change",embedUrl:e.landingPageUrl.replace(/^https?:\/\/[^/]+\//,"/"),insertItemImage:e.imageUrl,insertItemOsTitle:e.title,insertItemOsView:e.landingPageUrl,insertItemOsEdit:e.editUrl,insertItemOsStatistics:e.statsUrl};if(t===y)s(r);else{var o=Object(a.createBlock)(function(e){switch(e){case"poll":return"opinion-stage/block-os-poll";case"survey":return"opinion-stage/block-os-survey";case"trivia":return"opinion-stage/block-os-trivia";case"personality":return"opinion-stage/block-os-personality";case"form":return"opinion-stage/block-os-form";default:console.warn("unknown block widget type:",e)}}(t));o.attributes=r,wp.data.dispatch("core/block-editor").replaceBlock(c,o)}},f=function(e){OpinionStage.contentPopup.open({preselectWidgetType:u(y),onWidgetSelect:_})},E="".concat(OPINIONSTAGE_GUTENBERG_DATA.createNewWidgetUrl,"&w_type=").concat(function(e){switch(e){case"poll":return"poll";case"survey":return"survey";case"trivia":return"quiz";case"personality":return"outcome";case"form":return"contact_form"}}(y)),j="".concat(OPINIONSTAGE_GUTENBERG_DATA.viewTemplateUrl,"&page=").concat(function(e){switch(e){case"poll":return"polls";case"survey":return"surveys";case"trivia":return"trivia_quizzes";case"personality":return"personality_quizzes";case"form":return"classic_forms"}}(y)),w=Object(i.createElement)("div",{className:"os-widget-wrapper components-placeholder"},Object(i.createElement)("p",{className:"components-heading"},Object(i.createElement)("img",{src:OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl,alt:""})),Object(i.createElement)("button",{className:"components-button is-button is-default is-block is-primary",onClick:f},"Select a ",v),Object(i.createElement)("a",{href:E,target:"_blank",className:"components-button is-button is-default is-block is-primary"},"Create a ",v),Object(i.createElement)("a",{href:j,target:"_blank",className:"components-button is-button is-default is-block is-primary is-bordered"},"View Templates"));return l&&""!==l?"Change"===p&&(w=Object(i.createElement)("div",{className:"os-widget-wrapper components-placeholder"},Object(i.createElement)("p",{className:"components-heading"},Object(i.createElement)("img",{src:OPINIONSTAGE_GUTENBERG_DATA.brandLogoUrl,alt:""})),Object(i.createElement)("div",{className:"components-preview__block"},Object(i.createElement)("div",{className:"components-preview__leftBlockImage"},Object(i.createElement)("img",{src:b,alt:m,className:"image"}),Object(i.createElement)("div",{className:"overlay"},Object(i.createElement)("div",{className:"text"},Object(i.createElement)("a",{href:d,target:"_blank"}," View "),Object(i.createElement)("a",{href:g,target:"_blank"}," Edit "),Object(i.createElement)("a",{href:O,target:"_blank"}," Statistics "),Object(i.createElement)("input",{type:"button",value:p,className:"components-button is-button is-default is-large left-align",onClick:f})))),Object(i.createElement)("div",{className:"components-preview__rightBlockContent"},Object(i.createElement)("div",{className:"components-placeholder__label"},v,": ",m))))):s({buttonText:"Embed"}),Object(i.createElement)("div",{className:r},w)}function u(e){switch(e){case"poll":return OpinionStage.contentPopup.WIDGET_POLL;case"survey":return OpinionStage.contentPopup.WIDGET_SURVEY;case"trivia":return OpinionStage.contentPopup.WIDGET_TRIVIA_QUIZ;case"personality":return OpinionStage.contentPopup.WIDGET_PERSONALITY_QUIZ;case"form":return OpinionStage.contentPopup.WIDGET_FORM}}function p(e){var t=e.attributes,r=t.widgetType,a=t.embedUrl,o=t.lockEmbed,n=t.buttonText,s=t.insertItemImage,c=t.insertItemOsTitle,l=t.insertItemOsView,u=t.insertItemOsEdit,p=t.insertItemOsStatistics;return Object(i.createElement)("div",{class:b(r),"data-type":r,"data-image-url":s,"data-title-url":c,"data-view-url":l,"data-statistics-url":p,"data-edit-url":u,"data-test-url":a,"data-lock-embed":o,"data-button-text":n},'[os-widget path="',a,'"]',Object(i.createElement)("span",null))}function b(e){if(!e)return null;switch(e){case"poll":return"os-poll-wrapper";case"survey":return"os-survey-wrapper";case"trivia":return"os-trivia-wrapper";case"personality":return"os-personality-wrapper";case"form":return"os-form-wrapper";default:console.warn("unknown widget type:",e)}}Object(a.registerBlockType)("opinion-stage/block-os-poll",{title:"Poll",icon:"chart-bar",description:Object(o.__)("Embed an Opinion Stage Poll","social-polls-by-opinionstage"),category:s,keywords:[Object(o.__)("poll","social-polls-by-opinionstage"),Object(o.__)("social poll","social-polls-by-opinionstage")],supports:c,attributes:n,edit:l,save:p}),Object(a.registerBlockType)("opinion-stage/block-os-survey",{title:"Survey",icon:"list-view",description:Object(o.__)("Embed an Opinion Stage Survey","social-polls-by-opinionstage"),category:s,keywords:[Object(o.__)("survey","social-polls-by-opinionstage")],supports:c,attributes:n,edit:l,save:p}),Object(a.registerBlockType)("opinion-stage/block-os-trivia",{title:"Trivia Quiz",icon:"yes",description:Object(o.__)("Embed an Opinion Stage Trivia Quiz","social-polls-by-opinionstage"),category:s,keywords:[Object(o.__)("quiz","social-polls-by-opinionstage"),Object(o.__)("trivia","social-polls-by-opinionstage")],supports:c,attributes:n,edit:l,save:p}),Object(a.registerBlockType)("opinion-stage/block-os-personality",{title:"Personality Quiz",icon:"smiley",description:Object(o.__)("Embed an Opinion Stage Personality Quiz","social-polls-by-opinionstage"),category:s,keywords:[Object(o.__)("personality","social-polls-by-opinionstage"),Object(o.__)("quiz","social-polls-by-opinionstage"),Object(o.__)("outcome","social-polls-by-opinionstage")],supports:c,attributes:n,edit:l,save:p}),Object(a.registerBlockType)("opinion-stage/block-os-form",{title:"Standard Form",icon:"editor-justify",description:Object(o.__)("Embed an Opinion Stage Form","social-polls-by-opinionstage"),category:s,keywords:[Object(o.__)("form","social-polls-by-opinionstage"),Object(o.__)("contact form","social-polls-by-opinionstage")],supports:c,attributes:n,edit:l,save:p})}]);