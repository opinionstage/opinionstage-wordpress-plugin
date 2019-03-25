!function(e){function t(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:r})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});n(1)},function(e,t,n){"use strict";function r(e){return function(){var t=e.apply(this,arguments);return new Promise(function(e,n){function r(o,a){try{var i=t[o](a),s=i.value}catch(e){return void n(e)}if(!i.done)return Promise.resolve(s).then(function(e){r("next",e)},function(e){r("throw",e)});e(s)}return r("next")})}}var o,a,i,s,c,l,u=n(2),p=n.n(u),m=n(5),f=(n.n(m),n(6)),d=(n.n(f),wp.i18n.__),h=wp.blocks.registerBlockType,v=wp.components,g=v.SelectControl,b=(v.TextControl,wp.editor.RichText,!1);h("opinion-stage/block-os-survey",{title:d("Survey"),icon:"list-view",category:"opinion-stage",keywords:[d("Opinion Stage Survey"),d("Opinion Stage Survey")],attributes:{embedUrl:{source:"attribute",attribute:"data-test-url",selector:"div[data-test-url]"},oswpUrlShortcode:{source:"attribute",attribute:"data-test-url",selector:"div[data-test-url]"},lockEmbed:{source:"attribute",attribute:"data-lock-embed",selector:"div[data-lock-embed]"},buttonText:{source:"attribute",attribute:"data-button-text",selector:"div[data-button-text]"}},edit:function(e){function t(){var t=this,n=osGutenData.OswpPluginVersion,o=osGutenData.OswpClientToken,a=osGutenData.OswpFetchDataUrl+"?type=survey&page=1&per_page=99";fetch(a,{method:"GET",headers:{Accept:"application/vnd.api+json","Content-Type":"application/vnd.api+json","OSWP-Plugin-Version":n,"OSWP-Client-Token":o}}).then(function(){var n=r(p.a.mark(function n(r){var o;return p.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,r.json();case 2:o=t.sent,o=o.data,b=o,e.setAttributes({buttonText:"Embed"}),e.setAttributes({buttonText:m}),"Change"==m&&"Select"!=u?e.setAttributes({embedUrl:u}):e.setAttributes({embedUrl:"Select"});case 8:case"end":return t.stop()}},n,t)}));return function(e){return n.apply(this,arguments)}}()).catch(function(e){console.log("ERROR: "+e.message)})}var n=e.attributes,u=n.embedUrl,m=(n.oswpUrlShortcode,n.lockEmbed,n.buttonText),f=(e.setAttributes,function(t){if(""==t)e.setAttributes({embedUrl:""});else if(""!=t){e.setAttributes({embedUrl:t});for(var n=0;n<b.length;n++){var r=function(e){var t=document.createElement("a");return t.href=e,t}(b[n].attributes["landing-page-url"]),l=r.pathname;if(t==l){o=b[n].attributes.title,a=b[n].attributes["image-url"],i=b[n].attributes["landing-page-url"],s=b[n].attributes["edit-url"],c=b[n].attributes["stats-url"];break}}}}),d=function(t){"Embed"==t.target.value?""==u||"Select"==u||"createNew"==u||"refresh"==u?e.setAttributes({lockEmbed:!1,buttonText:"Embed"}):(e.setAttributes({lockEmbed:!0,buttonText:"Change"}),L=wp.element.createElement(g,{id:"selectID",options:l,value:u,onChange:f,className:"components-select-control__input"})):e.setAttributes({lockEmbed:!1,buttonText:"Embed"})};window.verifyOSInsert=function(t){e.setAttributes({oswpUrlShortcode:t});for(var n=document.getElementById("selectID").options,r=0;r<n.length;r++)if(n[r].value==t){n[r].defaultSelected=!0,e.setAttributes({lockEmbed:!0,buttonText:"Change",embedUrl:t});break}};var h=osGutenData.onCreateButtonClickOs+"?w_type=survey&amp;utm_source=wordpress&amp;utm_campaign=WPMainPI&amp;utm_medium=link&amp;o=wp35e8",v=function(e){window.open(h,"_blank").focus()};m||e.setAttributes({buttonText:"Embed"});var y=osGutenData.callbackUrlOs,w=y,E=(osGutenData.getActionUrlOS,osGutenData.getLogoImageLink),k=function(e){window.location.replace(w)};if(""==osGutenData.isOsConnected)return $(document).ready(function(){$("span#oswpLauncherContentPopupsurvey , #owspLaunchInputCreate").live("click",function(e){e.preventDefault(),setTimeout(function(){$(".editor-post-save-draft").trigger("click")},500)})}),wp.element.createElement("div",{className:e.className},wp.element.createElement("div",{className:"os-survey-wrapper components-placeholder"},wp.element.createElement("p",{className:"components-heading"},wp.element.createElement("img",{src:E,alt:""})),wp.element.createElement("p",{className:"components-heading"},"Please connect WordPress to Opinion Stage to start adding surveys"),wp.element.createElement("button",{className:"components-button is-button is-default is-block is-primary",onClick:k},"Connect")),wp.element.createElement("div",null));if(0==b)l=[{value:"Select",label:"Select a survey"},{value:"refresh",label:"Refresh"}],t();else{l=[{value:"Select",label:"Select a survey"},{value:"refresh",label:"Refresh"},{value:"",label:"-----------------"}];for(var x=0;x<b.length;x++){l[l.length]={value:b[x].attributes["landing-page-url"].replace("https://www.opinionstage.com",""),label:b[x].attributes.title};var _=function(e){var t=document.createElement("a");return t.href=e,t}(b[x].attributes["landing-page-url"]),N=_.pathname;if(u==N){o=b[x].attributes.title,a=b[x].attributes["image-url"],i=b[x].attributes["landing-page-url"],s=b[x].attributes["edit-url"],c=b[x].attributes["stats-url"];var S=b[x].id}}}"refresh"==u&&t();var L=wp.element.createElement(g,{id:"selectID",options:l,value:u,onChange:f,className:"components-select-control__input"});$(document).ready(function(){$("button.btn-blue").live("click",function(e){e.preventDefault(),t()}),$("span#oswpLauncherContentPopupsurvey").live("click",function(e){e.preventDefault(),setTimeout(function(){$(".editor-post-save-draft").trigger("click")},500);var t=$(this).attr("data-os-block");$("button#dropbtn span").text(t);for(var n=$(".filter__itm"),r=0;r<n.length;r++){if($(n[r]).text()==t){setTimeout(function(){$(n[r]).trigger("click")},1e3),setTimeout(function(){$(".progress_message").css("display","none"),$(".content__list").css("display","block")},2500),$("button.content__links-itm").live("click",function(e){$(".tingle-modal.opinionstage-content-popup").hide(),$(".tingle-modal.opinionstage-content-popup.tingle-modal--visible").hide()});break}$(".progress_message").css("display","block"),$(".content__list").css("display","none")}})});var O=wp.element.createElement("div",{className:"os-survey-wrapper components-placeholder"},wp.element.createElement("p",{className:"components-heading"},wp.element.createElement("img",{src:E,alt:""})),wp.element.createElement("span",{id:"oswpLauncherContentPopupsurvey",className:"components-button is-button is-default is-block is-primary","data-opinionstage-content-launch":!0,"data-os-block":"survey"},"Select a Survey"),wp.element.createElement("input",{type:"button",value:"Create a New Survey",className:"components-button is-button is-default is-block is-primary",onClick:v}),wp.element.createElement("div",{className:"components-placeholder__fieldset"},L,wp.element.createElement("input",{type:"button",value:m,className:"components-button is-button is-default is-large",id:"clickMe",onClick:d})));return function(e,t,n){var r,o=e.getElementsByTagName(t)[0],a=Math.floor((new Date).getTime()/1e6);e.getElementById(n)||(r=e.createElement(t),r.id=n,r.async=1,r.src="https://www.opinionstage.com/assets/loader.js?"+a,o.parentNode.insertBefore(r,o))}(document,"script","os-widget-jssdk"),S="os-widget-"+S,""!=u&&"Select"!=u&&u?"Embed"==m||"Change"==m&&(O=wp.element.createElement("div",{className:"os-survey-wrapper components-placeholder"},wp.element.createElement("p",{className:"components-heading"},wp.element.createElement("img",{src:E,alt:""})),wp.element.createElement("div",{className:"components-preview__block"},wp.element.createElement("div",{className:"components-preview__leftBlockImage"},wp.element.createElement("img",{src:a,alt:o,className:"image"}),wp.element.createElement("div",{className:"overlay"},wp.element.createElement("div",{className:"text"},wp.element.createElement("a",{href:i,target:"_blank"}," View "),wp.element.createElement("a",{href:s,target:"_blank"}," Edit "),wp.element.createElement("a",{href:c,target:"_blank"}," Statistics "),wp.element.createElement("input",{type:"button",value:m,className:"components-button is-button is-default is-large left-align",onClick:d})))),wp.element.createElement("div",{className:"components-preview__rightBlockContent"},wp.element.createElement("div",{className:"components-placeholder__label"},"Survey: ",o)))),L=wp.element.createElement(g,{id:"selectID",options:l,value:u,disabled:!0,onChange:f,className:"components-select-control__input"})):"Select"==u||""==u||"refresh"==u||e.setAttributes({buttonText:"Embed"}),wp.element.createElement("div",{className:e.className},O)},save:function(e){var t=e.attributes,n=(t.embedUrl,t.oswpUrlShortcode),r=t.lockEmbed,o=t.buttonText;return wp.element.createElement("div",{class:"os-survey-wrapper","data-type":"survey","data-test-url":n,"data-lock-embed":r,"data-button-text":o},'[os-widget path="',n,'"]')}})},function(e,t,n){e.exports=n(3)},function(e,t,n){var r=function(){return this}()||Function("return this")(),o=r.regeneratorRuntime&&Object.getOwnPropertyNames(r).indexOf("regeneratorRuntime")>=0,a=o&&r.regeneratorRuntime;if(r.regeneratorRuntime=void 0,e.exports=n(4),o)r.regeneratorRuntime=a;else try{delete r.regeneratorRuntime}catch(e){r.regeneratorRuntime=void 0}},function(e,t){!function(t){"use strict";function n(e,t,n,r){var a=t&&t.prototype instanceof o?t:o,i=Object.create(a.prototype),s=new f(r||[]);return i._invoke=l(e,n,s),i}function r(e,t,n){try{return{type:"normal",arg:e.call(t,n)}}catch(e){return{type:"throw",arg:e}}}function o(){}function a(){}function i(){}function s(e){["next","throw","return"].forEach(function(t){e[t]=function(e){return this._invoke(t,e)}})}function c(e){function t(n,o,a,i){var s=r(e[n],e,o);if("throw"!==s.type){var c=s.arg,l=c.value;return l&&"object"===typeof l&&b.call(l,"__await")?Promise.resolve(l.__await).then(function(e){t("next",e,a,i)},function(e){t("throw",e,a,i)}):Promise.resolve(l).then(function(e){c.value=e,a(c)},i)}i(s.arg)}function n(e,n){function r(){return new Promise(function(r,o){t(e,n,r,o)})}return o=o?o.then(r,r):r()}var o;this._invoke=n}function l(e,t,n){var o=N;return function(a,i){if(o===L)throw new Error("Generator is already running");if(o===O){if("throw"===a)throw i;return h()}for(n.method=a,n.arg=i;;){var s=n.delegate;if(s){var c=u(s,n);if(c){if(c===T)continue;return c}}if("next"===n.method)n.sent=n._sent=n.arg;else if("throw"===n.method){if(o===N)throw o=O,n.arg;n.dispatchException(n.arg)}else"return"===n.method&&n.abrupt("return",n.arg);o=L;var l=r(e,t,n);if("normal"===l.type){if(o=n.done?O:S,l.arg===T)continue;return{value:l.arg,done:n.done}}"throw"===l.type&&(o=O,n.method="throw",n.arg=l.arg)}}}function u(e,t){var n=e.iterator[t.method];if(n===v){if(t.delegate=null,"throw"===t.method){if(e.iterator.return&&(t.method="return",t.arg=v,u(e,t),"throw"===t.method))return T;t.method="throw",t.arg=new TypeError("The iterator does not provide a 'throw' method")}return T}var o=r(n,e.iterator,t.arg);if("throw"===o.type)return t.method="throw",t.arg=o.arg,t.delegate=null,T;var a=o.arg;return a?a.done?(t[e.resultName]=a.value,t.next=e.nextLoc,"return"!==t.method&&(t.method="next",t.arg=v),t.delegate=null,T):a:(t.method="throw",t.arg=new TypeError("iterator result is not an object"),t.delegate=null,T)}function p(e){var t={tryLoc:e[0]};1 in e&&(t.catchLoc=e[1]),2 in e&&(t.finallyLoc=e[2],t.afterLoc=e[3]),this.tryEntries.push(t)}function m(e){var t=e.completion||{};t.type="normal",delete t.arg,e.completion=t}function f(e){this.tryEntries=[{tryLoc:"root"}],e.forEach(p,this),this.reset(!0)}function d(e){if(e){var t=e[w];if(t)return t.call(e);if("function"===typeof e.next)return e;if(!isNaN(e.length)){var n=-1,r=function t(){for(;++n<e.length;)if(b.call(e,n))return t.value=e[n],t.done=!1,t;return t.value=v,t.done=!0,t};return r.next=r}}return{next:h}}function h(){return{value:v,done:!0}}var v,g=Object.prototype,b=g.hasOwnProperty,y="function"===typeof Symbol?Symbol:{},w=y.iterator||"@@iterator",E=y.asyncIterator||"@@asyncIterator",k=y.toStringTag||"@@toStringTag",x="object"===typeof e,_=t.regeneratorRuntime;if(_)return void(x&&(e.exports=_));_=t.regeneratorRuntime=x?e.exports:{},_.wrap=n;var N="suspendedStart",S="suspendedYield",L="executing",O="completed",T={},C={};C[w]=function(){return this};var P=Object.getPrototypeOf,j=P&&P(P(d([])));j&&j!==g&&b.call(j,w)&&(C=j);var $=i.prototype=o.prototype=Object.create(C);a.prototype=$.constructor=i,i.constructor=a,i[k]=a.displayName="GeneratorFunction",_.isGeneratorFunction=function(e){var t="function"===typeof e&&e.constructor;return!!t&&(t===a||"GeneratorFunction"===(t.displayName||t.name))},_.mark=function(e){return Object.setPrototypeOf?Object.setPrototypeOf(e,i):(e.__proto__=i,k in e||(e[k]="GeneratorFunction")),e.prototype=Object.create($),e},_.awrap=function(e){return{__await:e}},s(c.prototype),c.prototype[E]=function(){return this},_.AsyncIterator=c,_.async=function(e,t,r,o){var a=new c(n(e,t,r,o));return _.isGeneratorFunction(t)?a:a.next().then(function(e){return e.done?e.value:a.next()})},s($),$[k]="Generator",$[w]=function(){return this},$.toString=function(){return"[object Generator]"},_.keys=function(e){var t=[];for(var n in e)t.push(n);return t.reverse(),function n(){for(;t.length;){var r=t.pop();if(r in e)return n.value=r,n.done=!1,n}return n.done=!0,n}},_.values=d,f.prototype={constructor:f,reset:function(e){if(this.prev=0,this.next=0,this.sent=this._sent=v,this.done=!1,this.delegate=null,this.method="next",this.arg=v,this.tryEntries.forEach(m),!e)for(var t in this)"t"===t.charAt(0)&&b.call(this,t)&&!isNaN(+t.slice(1))&&(this[t]=v)},stop:function(){this.done=!0;var e=this.tryEntries[0],t=e.completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(e){function t(t,r){return a.type="throw",a.arg=e,n.next=t,r&&(n.method="next",n.arg=v),!!r}if(this.done)throw e;for(var n=this,r=this.tryEntries.length-1;r>=0;--r){var o=this.tryEntries[r],a=o.completion;if("root"===o.tryLoc)return t("end");if(o.tryLoc<=this.prev){var i=b.call(o,"catchLoc"),s=b.call(o,"finallyLoc");if(i&&s){if(this.prev<o.catchLoc)return t(o.catchLoc,!0);if(this.prev<o.finallyLoc)return t(o.finallyLoc)}else if(i){if(this.prev<o.catchLoc)return t(o.catchLoc,!0)}else{if(!s)throw new Error("try statement without catch or finally");if(this.prev<o.finallyLoc)return t(o.finallyLoc)}}}},abrupt:function(e,t){for(var n=this.tryEntries.length-1;n>=0;--n){var r=this.tryEntries[n];if(r.tryLoc<=this.prev&&b.call(r,"finallyLoc")&&this.prev<r.finallyLoc){var o=r;break}}o&&("break"===e||"continue"===e)&&o.tryLoc<=t&&t<=o.finallyLoc&&(o=null);var a=o?o.completion:{};return a.type=e,a.arg=t,o?(this.method="next",this.next=o.finallyLoc,T):this.complete(a)},complete:function(e,t){if("throw"===e.type)throw e.arg;return"break"===e.type||"continue"===e.type?this.next=e.arg:"return"===e.type?(this.rval=this.arg=e.arg,this.method="return",this.next="end"):"normal"===e.type&&t&&(this.next=t),T},finish:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var n=this.tryEntries[t];if(n.finallyLoc===e)return this.complete(n.completion,n.afterLoc),m(n),T}},catch:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var n=this.tryEntries[t];if(n.tryLoc===e){var r=n.completion;if("throw"===r.type){var o=r.arg;m(n)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(e,t,n){return this.delegate={iterator:d(e),resultName:t,nextLoc:n},"next"===this.method&&(this.arg=v),T}}}(function(){return this}()||Function("return this")())},function(e,t){},function(e,t){}]);