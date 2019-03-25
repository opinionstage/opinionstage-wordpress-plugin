!function(t){function e(r){if(n[r])return n[r].exports;var i=n[r]={i:r,l:!1,exports:{}};return t[r].call(i.exports,i,i.exports,e),i.l=!0,i.exports}var n={};e.m=t,e.c=n,e.d=function(t,n,r){e.o(t,n)||Object.defineProperty(t,n,{configurable:!1,enumerable:!0,get:r})},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},e.p="",e(e.s=0)}([function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});n(1)},function(t,e,n){"use strict";function r(t){return function(){var e=t.apply(this,arguments);return new Promise(function(t,n){function r(i,a){try{var o=e[i](a),s=o.value}catch(t){return void n(t)}if(!o.done)return Promise.resolve(s).then(function(t){r("next",t)},function(t){r("throw",t)});t(s)}return r("next")})}}var i=n(2),a=n.n(i),o=n(5),s=(n.n(o),n(6)),c=(n.n(s),wp.i18n.__),l=wp.blocks.registerBlockType,u=wp.components,p=(u.SelectControl,u.TextControl,wp.editor.RichText,!1);l("opinion-stage/block-os-trivia",{title:c("Trivia Quiz"),icon:"yes",category:"opinion-stage",keywords:[c("Opinion Stage Trivia Quiz"),c("Opinion Stage Trivia Quiz Insert")],attributes:{embedUrl:{source:"attribute",attribute:"data-test-url",selector:"div[data-test-url]"},lockEmbed:{source:"attribute",attribute:"data-lock-embed",selector:"div[data-lock-embed]"},buttonText:{source:"attribute",attribute:"data-button-text",selector:"div[data-button-text]"},insertItemImage:{source:"attribute",attribute:"data-image-url",selector:"div[data-image-url]"},insertItemOsTitle:{source:"attribute",attribute:"data-title-url",selector:"div[data-title-url]"},insertItemOsView:{source:"attribute",attribute:"data-view-url",selector:"div[data-view-url]"},insertItemOsEdit:{source:"attribute",attribute:"data-edit-url",selector:"div[data-edit-url]"},insertItemOsStatistics:{source:"attribute",attribute:"data-statistics-url",selector:"div[data-statistics-url]"}},edit:function(t){var e=t.attributes,n=e.embedUrl,i=(e.lockEmbed,e.buttonText),o=e.insertItemImage,s=e.insertItemOsTitle,c=e.insertItemOsView,l=e.insertItemOsEdit,u=e.insertItemOsStatistics,m=(t.setAttributes,osGutenData.callbackUrlOs),d=m,f=(osGutenData.getActionUrlOS,osGutenData.getLogoImageLink),h=function(e){window.verifyOSInsert=function(e){var n=this;t.setAttributes({embedUrl:e,buttonText:"Change"});var o=osGutenData.OswpPluginVersion,s=osGutenData.OswpClientToken,c=osGutenData.OswpFetchDataUrl+"?type=trivia&page=1&per_page=99";fetch(c,{method:"GET",headers:{Accept:"application/vnd.api+json","Content-Type":"application/vnd.api+json","OSWP-Plugin-Version":o,"OSWP-Client-Token":s}}).then(function(){var e=r(a.a.mark(function e(r){var o;return a.a.wrap(function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,r.json();case 2:o=e.sent,o=o.data,p=o,t.setAttributes({buttonText:i});case 6:case"end":return e.stop()}},e,n)}));return function(t){return e.apply(this,arguments)}}()).catch(function(t){console.log("ERROR: "+t.message)})}},v=function(e){t.setAttributes({embedUrl:"",buttonText:"Embed",lockEmbed:!1,insertItemImage:!1,insertItemOsTitle:!1,insertItemOsView:!1,insertItemOsEdit:!1,insertItemOsStatistics:!1})},g=function(t){window.location.replace(d)},b=osGutenData.onCreateButtonClickOs+"?w_type=quiz&amp;utm_source=wordpress&amp;utm_campaign=WPMainPI&amp;utm_medium=link&amp;o=wp35e8",w=function(t){window.open(b,"_blank").focus()};if(""==osGutenData.isOsConnected)return wp.element.createElement("div",{className:t.className},wp.element.createElement("div",{className:"os-trivia-wrapper components-placeholder"},wp.element.createElement("p",{className:"components-heading"},wp.element.createElement("img",{src:f,alt:""})),wp.element.createElement("p",{className:"components-heading"},"Please connect WordPress to Opinion Stage to start adding trivia"),wp.element.createElement("button",{className:"components-button is-button is-default is-block is-primary",onClick:g},"Connect")),wp.element.createElement("div",null));if($(document).ready(function(){$("span#oswpLauncherContentPopuptrivia").live("click",function(t){t.preventDefault(),setTimeout(function(){$(".editor-post-save-draft").trigger("click")},500);var e=$(this).attr("data-os-block");$("button#dropbtn span").text(e);for(var n=$(".filter__itm"),r=0;r<n.length;r++){if($(n[r]).text()==e){setTimeout(function(){$(n[r]).trigger("click")},1e3),setTimeout(function(){$(".progress_message").css("display","none"),$(".content__list").css("display","block")},2500),$("button.content__links-itm").live("click",function(t){$(".tingle-modal.opinionstage-content-popup").hide(),$(".tingle-modal.opinionstage-content-popup.tingle-modal--visible").hide()});break}$(".progress_message").css("display","block"),$(".content__list").css("display","none")}})}),0!=p)for(var y=0;y<p.length;y++){var E=function(t){var e=document.createElement("a");return e.href=t,e}(p[y].attributes["landing-page-url"]),x=E.pathname;if(n==x){t.setAttributes({lockEmbed:!0,buttonText:"Change"}),t.setAttributes({insertItemImage:p[y].attributes["image-url"]}),t.setAttributes({insertItemOsTitle:p[y].attributes.title}),t.setAttributes({insertItemOsView:p[y].attributes["landing-page-url"]}),t.setAttributes({insertItemOsEdit:p[y].attributes["edit-url"]}),t.setAttributes({insertItemOsStatistics:p[y].attributes["stats-url"]});break}}var k=wp.element.createElement("div",{className:"os-trivia-wrapper components-placeholder"},wp.element.createElement("p",{className:"components-heading"},wp.element.createElement("img",{src:f,alt:""})),wp.element.createElement("span",{id:"oswpLauncherContentPopuptrivia",className:"components-button is-button is-default is-block is-primary","data-opinionstage-content-launch":!0,"data-os-block":"trivia quiz",onClick:h},"Select a Trivia Quiz"),wp.element.createElement("input",{type:"button",value:"Create a New Trivia Quiz",className:"components-button is-button is-default is-block is-primary",onClick:w}),wp.element.createElement("span",null));return""!=n&&n?"Embed"==i||"Change"==i&&(k=wp.element.createElement("div",{className:"os-trivia-wrapper components-placeholder"},wp.element.createElement("p",{className:"components-heading"},wp.element.createElement("img",{src:f,alt:""})),wp.element.createElement("div",{className:"components-preview__block"},wp.element.createElement("div",{className:"components-preview__leftBlockImage"},wp.element.createElement("img",{src:o,alt:s,className:"image"}),wp.element.createElement("div",{className:"overlay"},wp.element.createElement("div",{className:"text"},wp.element.createElement("a",{href:c,target:"_blank"}," View "),wp.element.createElement("a",{href:l,target:"_blank"}," Edit "),wp.element.createElement("a",{href:u,target:"_blank"}," Statistics "),wp.element.createElement("input",{type:"button",value:i,className:"components-button is-button is-default is-large left-align",onClick:v})))),wp.element.createElement("div",{className:"components-preview__rightBlockContent"},wp.element.createElement("div",{className:"components-placeholder__label"},"Trivia Quiz: ",s))),wp.element.createElement("span",null))):""==n||"undefined"===jQuery.type(n)||t.setAttributes({buttonText:"Embed"}),wp.element.createElement("div",{className:t.className},k,wp.element.createElement("span",null))},save:function(t){var e=t.attributes,n=e.embedUrl,r=e.lockEmbed,i=e.buttonText,a=e.insertItemImage,o=e.insertItemOsTitle,s=e.insertItemOsView,c=e.insertItemOsEdit,l=e.insertItemOsStatistics;return wp.element.createElement("div",{class:"os-trivia-wrapper","data-type":"trivia","data-image-url":a,"data-title-url":o,"data-view-url":s,"data-statistics-url":l,"data-edit-url":c,"data-test-url":n,"data-lock-embed":r,"data-button-text":i},'[os-widget path="',n,'"]',wp.element.createElement("span",null))}})},function(t,e,n){t.exports=n(3)},function(t,e,n){var r=function(){return this}()||Function("return this")(),i=r.regeneratorRuntime&&Object.getOwnPropertyNames(r).indexOf("regeneratorRuntime")>=0,a=i&&r.regeneratorRuntime;if(r.regeneratorRuntime=void 0,t.exports=n(4),i)r.regeneratorRuntime=a;else try{delete r.regeneratorRuntime}catch(t){r.regeneratorRuntime=void 0}},function(t,e){!function(e){"use strict";function n(t,e,n,r){var a=e&&e.prototype instanceof i?e:i,o=Object.create(a.prototype),s=new d(r||[]);return o._invoke=l(t,n,s),o}function r(t,e,n){try{return{type:"normal",arg:t.call(e,n)}}catch(t){return{type:"throw",arg:t}}}function i(){}function a(){}function o(){}function s(t){["next","throw","return"].forEach(function(e){t[e]=function(t){return this._invoke(e,t)}})}function c(t){function e(n,i,a,o){var s=r(t[n],t,i);if("throw"!==s.type){var c=s.arg,l=c.value;return l&&"object"===typeof l&&b.call(l,"__await")?Promise.resolve(l.__await).then(function(t){e("next",t,a,o)},function(t){e("throw",t,a,o)}):Promise.resolve(l).then(function(t){c.value=t,a(c)},o)}o(s.arg)}function n(t,n){function r(){return new Promise(function(r,i){e(t,n,r,i)})}return i=i?i.then(r,r):r()}var i;this._invoke=n}function l(t,e,n){var i=_;return function(a,o){if(i===T)throw new Error("Generator is already running");if(i===L){if("throw"===a)throw o;return h()}for(n.method=a,n.arg=o;;){var s=n.delegate;if(s){var c=u(s,n);if(c){if(c===N)continue;return c}}if("next"===n.method)n.sent=n._sent=n.arg;else if("throw"===n.method){if(i===_)throw i=L,n.arg;n.dispatchException(n.arg)}else"return"===n.method&&n.abrupt("return",n.arg);i=T;var l=r(t,e,n);if("normal"===l.type){if(i=n.done?L:I,l.arg===N)continue;return{value:l.arg,done:n.done}}"throw"===l.type&&(i=L,n.method="throw",n.arg=l.arg)}}}function u(t,e){var n=t.iterator[e.method];if(n===v){if(e.delegate=null,"throw"===e.method){if(t.iterator.return&&(e.method="return",e.arg=v,u(t,e),"throw"===e.method))return N;e.method="throw",e.arg=new TypeError("The iterator does not provide a 'throw' method")}return N}var i=r(n,t.iterator,e.arg);if("throw"===i.type)return e.method="throw",e.arg=i.arg,e.delegate=null,N;var a=i.arg;return a?a.done?(e[t.resultName]=a.value,e.next=t.nextLoc,"return"!==e.method&&(e.method="next",e.arg=v),e.delegate=null,N):a:(e.method="throw",e.arg=new TypeError("iterator result is not an object"),e.delegate=null,N)}function p(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function m(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function d(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(p,this),this.reset(!0)}function f(t){if(t){var e=t[y];if(e)return e.call(t);if("function"===typeof t.next)return t;if(!isNaN(t.length)){var n=-1,r=function e(){for(;++n<t.length;)if(b.call(t,n))return e.value=t[n],e.done=!1,e;return e.value=v,e.done=!0,e};return r.next=r}}return{next:h}}function h(){return{value:v,done:!0}}var v,g=Object.prototype,b=g.hasOwnProperty,w="function"===typeof Symbol?Symbol:{},y=w.iterator||"@@iterator",E=w.asyncIterator||"@@asyncIterator",x=w.toStringTag||"@@toStringTag",k="object"===typeof t,O=e.regeneratorRuntime;if(O)return void(k&&(t.exports=O));O=e.regeneratorRuntime=k?t.exports:{},O.wrap=n;var _="suspendedStart",I="suspendedYield",T="executing",L="completed",N={},P={};P[y]=function(){return this};var S=Object.getPrototypeOf,C=S&&S(S(f([])));C&&C!==g&&b.call(C,y)&&(P=C);var j=o.prototype=i.prototype=Object.create(P);a.prototype=j.constructor=o,o.constructor=a,o[x]=a.displayName="GeneratorFunction",O.isGeneratorFunction=function(t){var e="function"===typeof t&&t.constructor;return!!e&&(e===a||"GeneratorFunction"===(e.displayName||e.name))},O.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,o):(t.__proto__=o,x in t||(t[x]="GeneratorFunction")),t.prototype=Object.create(j),t},O.awrap=function(t){return{__await:t}},s(c.prototype),c.prototype[E]=function(){return this},O.AsyncIterator=c,O.async=function(t,e,r,i){var a=new c(n(t,e,r,i));return O.isGeneratorFunction(e)?a:a.next().then(function(t){return t.done?t.value:a.next()})},s(j),j[x]="Generator",j[y]=function(){return this},j.toString=function(){return"[object Generator]"},O.keys=function(t){var e=[];for(var n in t)e.push(n);return e.reverse(),function n(){for(;e.length;){var r=e.pop();if(r in t)return n.value=r,n.done=!1,n}return n.done=!0,n}},O.values=f,d.prototype={constructor:d,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=v,this.done=!1,this.delegate=null,this.method="next",this.arg=v,this.tryEntries.forEach(m),!t)for(var e in this)"t"===e.charAt(0)&&b.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=v)},stop:function(){this.done=!0;var t=this.tryEntries[0],e=t.completion;if("throw"===e.type)throw e.arg;return this.rval},dispatchException:function(t){function e(e,r){return a.type="throw",a.arg=t,n.next=e,r&&(n.method="next",n.arg=v),!!r}if(this.done)throw t;for(var n=this,r=this.tryEntries.length-1;r>=0;--r){var i=this.tryEntries[r],a=i.completion;if("root"===i.tryLoc)return e("end");if(i.tryLoc<=this.prev){var o=b.call(i,"catchLoc"),s=b.call(i,"finallyLoc");if(o&&s){if(this.prev<i.catchLoc)return e(i.catchLoc,!0);if(this.prev<i.finallyLoc)return e(i.finallyLoc)}else if(o){if(this.prev<i.catchLoc)return e(i.catchLoc,!0)}else{if(!s)throw new Error("try statement without catch or finally");if(this.prev<i.finallyLoc)return e(i.finallyLoc)}}}},abrupt:function(t,e){for(var n=this.tryEntries.length-1;n>=0;--n){var r=this.tryEntries[n];if(r.tryLoc<=this.prev&&b.call(r,"finallyLoc")&&this.prev<r.finallyLoc){var i=r;break}}i&&("break"===t||"continue"===t)&&i.tryLoc<=e&&e<=i.finallyLoc&&(i=null);var a=i?i.completion:{};return a.type=t,a.arg=e,i?(this.method="next",this.next=i.finallyLoc,N):this.complete(a)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),N},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var n=this.tryEntries[e];if(n.finallyLoc===t)return this.complete(n.completion,n.afterLoc),m(n),N}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var n=this.tryEntries[e];if(n.tryLoc===t){var r=n.completion;if("throw"===r.type){var i=r.arg;m(n)}return i}}throw new Error("illegal catch attempt")},delegateYield:function(t,e,n){return this.delegate={iterator:f(t),resultName:e,nextLoc:n},"next"===this.method&&(this.arg=v),N}}}(function(){return this}()||Function("return this")())},function(t,e){},function(t,e){}]);