!function(e){function t(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:r})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});n(1)},function(e,t,n){"use strict";function r(e){return function(){var t=e.apply(this,arguments);return new Promise(function(e,n){function r(o,a){try{var i=t[o](a),l=i.value}catch(e){return void n(e)}if(!i.done)return Promise.resolve(l).then(function(e){r("next",e)},function(e){r("throw",e)});e(l)}return r("next")})}}var o,a,i,l,s,c,u=n(2),p=n.n(u),m=n(5),f=(n.n(m),n(6)),d=(n.n(f),wp.i18n.__),h=wp.blocks.registerBlockType,g=wp.components,v=g.SelectControl,b=(g.TextControl,wp.editor.RichText,!1);h("opinion-stage/block-os-personality",{title:d("Personality Quiz"),icon:"smiley",category:"opinion-stage",keywords:[d("Opinion Stage Personality Quiz"),d("Opinion Stage Personality Quiz Insert")],attributes:{embedUrl:{source:"attribute",attribute:"data-test-url",selector:"div[data-test-url]"},oswpUrlShortcode:{source:"attribute",attribute:"data-test-url",selector:"div[data-test-url]"},lockEmbed:{source:"attribute",attribute:"data-lock-embed",selector:"div[data-lock-embed]"},buttonText:{source:"attribute",attribute:"data-button-text",selector:"div[data-button-text]"}},edit:function(e){function t(){var t=this,n=osGutenData.OswpPluginVersion,o=osGutenData.OswpClientToken,a=osGutenData.OswpFetchDataUrl+"?type=outcome&page=1&per_page=99";fetch(a,{method:"GET",headers:{Accept:"application/vnd.api+json","Content-Type":"application/vnd.api+json","OSWP-Plugin-Version":n,"OSWP-Client-Token":o}}).then(function(){var n=r(p.a.mark(function n(r){var o;return p.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,r.json();case 2:o=t.sent,o=o.data,b=o,e.setAttributes({buttonText:"Embed"}),e.setAttributes({buttonText:m}),"Change"==m&&"Select"!=u?e.setAttributes({embedUrl:u}):e.setAttributes({embedUrl:"Select"});case 8:case"end":return t.stop()}},n,t)}));return function(e){return n.apply(this,arguments)}}()).catch(function(e){console.log("ERROR: "+e.message)})}var n=e.attributes,u=n.embedUrl,m=(n.oswpUrlShortcode,n.lockEmbed,n.buttonText),f=(e.setAttributes,function(t){if(""==t)e.setAttributes({embedUrl:""});else if(""!=t){e.setAttributes({embedUrl:t});for(var n=0;n<b.length;n++){var r=function(e){var t=document.createElement("a");return t.href=e,t}(b[n].attributes["landing-page-url"]),c=r.pathname;if(t==c){o=b[n].attributes.title,a=b[n].attributes["image-url"],i=b[n].attributes["landing-page-url"],l=b[n].attributes["edit-url"],s=b[n].attributes["stats-url"];break}}}}),d=function(t){"Embed"==t.target.value?""==u||"Select"==u||"createNew"==u||"refresh"==u?e.setAttributes({lockEmbed:!1,buttonText:"Embed"}):(e.setAttributes({lockEmbed:!0,buttonText:"Change"}),_=wp.element.createElement(v,{id:"selectID",options:c,value:u,onChange:f,className:"components-select-control__input"})):e.setAttributes({lockEmbed:!1,buttonText:"Embed"})};window.verifyOSInsert=function(t){e.setAttributes({oswpUrlShortcode:t});for(var n=document.getElementById("selectID").options,r=0;r<n.length;r++)if(n[r].value==t){n[r].defaultSelected=!0,e.setAttributes({lockEmbed:!0,buttonText:"Change",embedUrl:t});break}};var h=osGutenData.onCreateButtonClickOs+"?w_type=outcome&amp;utm_source=wordpress&amp;utm_campaign=WPMainPI&amp;utm_medium=link&amp;o=wp35e8",g=function(e){window.open(h,"_blank").focus()};m||e.setAttributes({buttonText:"Embed"});var y=(osGutenData.callbackUrlOs,osGutenData.getActionUrlOS,osGutenData.getLogoImageLink);if(""==osGutenData.isOsConnected)return $(document).ready(function(){$("span#oswpLauncherContentPopuppersonality , #owspLaunchInputCreate").live("click",function(e){e.preventDefault(),setTimeout(function(){$(".editor-post-save-draft").trigger("click")},500)})}),wp.element.createElement("div",{className:e.className},wp.element.createElement("div",{className:"os-personality-wrapper components-placeholder"},wp.element.createElement("p",{className:"components-heading"},wp.element.createElement("span",null,wp.element.createElement("img",{src:y,alt:""}))," Opinion Stage"),wp.element.createElement("span",{id:"oswpLauncherContentPopuppersonality",className:"components-button is-button is-default is-block is-primary","data-opinionstage-content-launch":!0,"data-os-block":"personality quiz"},"Select a Personality Quiz"),wp.element.createElement("input",{id:"owspLaunchInputCreate",type:"button","data-opinionstage-content-launch":!0,value:"Create a New Personality Quiz",className:"components-button is-button is-default is-block is-primary"})));if(0==b)c=[{value:"Select",label:"Select a Personality"},{value:"refresh",label:"Refresh"}],t();else{c=[{value:"Select",label:"Select a Personality"},{value:"refresh",label:"Refresh"},{value:"",label:"-----------------"}];for(var w=0;w<b.length;w++){c[c.length]={value:b[w].attributes["landing-page-url"].replace("https://www.opinionstage.com",""),label:b[w].attributes.title};var E=function(e){var t=document.createElement("a");return t.href=e,t}(b[w].attributes["landing-page-url"]),k=E.pathname;if(u==k){o=b[w].attributes.title,a=b[w].attributes["image-url"],i=b[w].attributes["landing-page-url"],l=b[w].attributes["edit-url"],s=b[w].attributes["stats-url"];var x=b[w].id}}}"refresh"==u&&t();var _=wp.element.createElement(v,{id:"selectID",options:c,value:u,onChange:f,className:"components-select-control__input"});$(document).ready(function(){$("span#oswpLauncherContentPopuppersonality").live("click",function(e){e.preventDefault(),setTimeout(function(){$(".editor-post-save-draft").trigger("click")},500);var t=$(this).attr("data-os-block");$("button#dropbtn span").text(t);for(var n=$(".filter__itm"),r=0;r<n.length;r++)if($(n[r]).text()==t){setTimeout(function(){$(n[r]).trigger("click")},2e3),$("button.content__links-itm").live("click",function(e){$(".tingle-modal.opinionstage-content-popup").hide(),$(".tingle-modal.opinionstage-content-popup.tingle-modal--visible").hide()});break}})});var N=wp.element.createElement("div",{className:"os-personality-wrapper components-placeholder"},wp.element.createElement("p",{className:"components-heading"},wp.element.createElement("span",null,wp.element.createElement("img",{src:y,alt:""}))," Opinion Stage"),wp.element.createElement("span",{id:"oswpLauncherContentPopuppersonality",className:"components-button is-button is-default is-block is-primary","data-opinionstage-content-launch":!0,"data-os-block":"personality quiz"},"Select a Personality Quiz"),wp.element.createElement("input",{type:"button",value:"Create a New Personality Quiz",className:"components-button is-button is-default is-block is-primary",onClick:g}),wp.element.createElement("div",{className:"components-placeholder__fieldset"},_,wp.element.createElement("input",{type:"button",value:m,className:"components-button is-button is-default is-large",id:"clickMe",onClick:d})));return function(e,t,n){var r,o=e.getElementsByTagName(t)[0],a=Math.floor((new Date).getTime()/1e6);e.getElementById(n)||(r=e.createElement(t),r.id=n,r.async=1,r.src="https://www.opinionstage.com/assets/loader.js?"+a,o.parentNode.insertBefore(r,o))}(document,"script","os-widget-jssdk"),x="os-widget-"+x,""!=u&&"Select"!=u&&u?"Embed"==m||"Change"==m&&(N=wp.element.createElement("div",{className:"os-personality-wrapper components-placeholder"},wp.element.createElement("p",{className:"components-heading"},wp.element.createElement("span",null,wp.element.createElement("img",{src:y,alt:""}))," Opinion Stage"),wp.element.createElement("div",{className:"components-preview__block"},wp.element.createElement("div",{className:"components-preview__leftBlockImage"},wp.element.createElement("img",{src:a,alt:o,className:"image"}),wp.element.createElement("div",{className:"overlay"},wp.element.createElement("div",{className:"text"},wp.element.createElement("a",{href:i,target:"_blank"}," View "),wp.element.createElement("a",{href:l,target:"_blank"}," Edit "),wp.element.createElement("a",{href:s,target:"_blank"}," Statistics "),wp.element.createElement("input",{type:"button",value:m,className:"components-button is-button is-default is-large left-align",onClick:d})))),wp.element.createElement("div",{className:"components-preview__rightBlockContent"},wp.element.createElement("div",{className:"components-placeholder__label"},"Personality Quiz: ",o)))),_=wp.element.createElement(v,{id:"selectID",options:c,value:u,disabled:!0,onChange:f,className:"components-select-control__input"})):"Select"==u||""==u||"refresh"==u||e.setAttributes({buttonText:"Embed"}),wp.element.createElement("div",{className:e.className},N)},save:function(e){var t=e.attributes,n=(t.embedUrl,t.oswpUrlShortcode),r=t.lockEmbed,o=t.buttonText;return wp.element.createElement("div",{class:"os-personality-wrapper","data-type":"personality","data-test-url":n,"data-lock-embed":r,"data-button-text":o},'[os-widget path="',n,'"]')}})},function(e,t,n){e.exports=n(3)},function(e,t,n){var r=function(){return this}()||Function("return this")(),o=r.regeneratorRuntime&&Object.getOwnPropertyNames(r).indexOf("regeneratorRuntime")>=0,a=o&&r.regeneratorRuntime;if(r.regeneratorRuntime=void 0,e.exports=n(4),o)r.regeneratorRuntime=a;else try{delete r.regeneratorRuntime}catch(e){r.regeneratorRuntime=void 0}},function(e,t){!function(t){"use strict";function n(e,t,n,r){var a=t&&t.prototype instanceof o?t:o,i=Object.create(a.prototype),l=new f(r||[]);return i._invoke=c(e,n,l),i}function r(e,t,n){try{return{type:"normal",arg:e.call(t,n)}}catch(e){return{type:"throw",arg:e}}}function o(){}function a(){}function i(){}function l(e){["next","throw","return"].forEach(function(t){e[t]=function(e){return this._invoke(t,e)}})}function s(e){function t(n,o,a,i){var l=r(e[n],e,o);if("throw"!==l.type){var s=l.arg,c=s.value;return c&&"object"===typeof c&&b.call(c,"__await")?Promise.resolve(c.__await).then(function(e){t("next",e,a,i)},function(e){t("throw",e,a,i)}):Promise.resolve(c).then(function(e){s.value=e,a(s)},i)}i(l.arg)}function n(e,n){function r(){return new Promise(function(r,o){t(e,n,r,o)})}return o=o?o.then(r,r):r()}var o;this._invoke=n}function c(e,t,n){var o=N;return function(a,i){if(o===O)throw new Error("Generator is already running");if(o===P){if("throw"===a)throw i;return h()}for(n.method=a,n.arg=i;;){var l=n.delegate;if(l){var s=u(l,n);if(s){if(s===S)continue;return s}}if("next"===n.method)n.sent=n._sent=n.arg;else if("throw"===n.method){if(o===N)throw o=P,n.arg;n.dispatchException(n.arg)}else"return"===n.method&&n.abrupt("return",n.arg);o=O;var c=r(e,t,n);if("normal"===c.type){if(o=n.done?P:L,c.arg===S)continue;return{value:c.arg,done:n.done}}"throw"===c.type&&(o=P,n.method="throw",n.arg=c.arg)}}}function u(e,t){var n=e.iterator[t.method];if(n===g){if(t.delegate=null,"throw"===t.method){if(e.iterator.return&&(t.method="return",t.arg=g,u(e,t),"throw"===t.method))return S;t.method="throw",t.arg=new TypeError("The iterator does not provide a 'throw' method")}return S}var o=r(n,e.iterator,t.arg);if("throw"===o.type)return t.method="throw",t.arg=o.arg,t.delegate=null,S;var a=o.arg;return a?a.done?(t[e.resultName]=a.value,t.next=e.nextLoc,"return"!==t.method&&(t.method="next",t.arg=g),t.delegate=null,S):a:(t.method="throw",t.arg=new TypeError("iterator result is not an object"),t.delegate=null,S)}function p(e){var t={tryLoc:e[0]};1 in e&&(t.catchLoc=e[1]),2 in e&&(t.finallyLoc=e[2],t.afterLoc=e[3]),this.tryEntries.push(t)}function m(e){var t=e.completion||{};t.type="normal",delete t.arg,e.completion=t}function f(e){this.tryEntries=[{tryLoc:"root"}],e.forEach(p,this),this.reset(!0)}function d(e){if(e){var t=e[w];if(t)return t.call(e);if("function"===typeof e.next)return e;if(!isNaN(e.length)){var n=-1,r=function t(){for(;++n<e.length;)if(b.call(e,n))return t.value=e[n],t.done=!1,t;return t.value=g,t.done=!0,t};return r.next=r}}return{next:h}}function h(){return{value:g,done:!0}}var g,v=Object.prototype,b=v.hasOwnProperty,y="function"===typeof Symbol?Symbol:{},w=y.iterator||"@@iterator",E=y.asyncIterator||"@@asyncIterator",k=y.toStringTag||"@@toStringTag",x="object"===typeof e,_=t.regeneratorRuntime;if(_)return void(x&&(e.exports=_));_=t.regeneratorRuntime=x?e.exports:{},_.wrap=n;var N="suspendedStart",L="suspendedYield",O="executing",P="completed",S={},T={};T[w]=function(){return this};var C=Object.getPrototypeOf,j=C&&C(C(d([])));j&&j!==v&&b.call(j,w)&&(T=j);var A=i.prototype=o.prototype=Object.create(T);a.prototype=A.constructor=i,i.constructor=a,i[k]=a.displayName="GeneratorFunction",_.isGeneratorFunction=function(e){var t="function"===typeof e&&e.constructor;return!!t&&(t===a||"GeneratorFunction"===(t.displayName||t.name))},_.mark=function(e){return Object.setPrototypeOf?Object.setPrototypeOf(e,i):(e.__proto__=i,k in e||(e[k]="GeneratorFunction")),e.prototype=Object.create(A),e},_.awrap=function(e){return{__await:e}},l(s.prototype),s.prototype[E]=function(){return this},_.AsyncIterator=s,_.async=function(e,t,r,o){var a=new s(n(e,t,r,o));return _.isGeneratorFunction(t)?a:a.next().then(function(e){return e.done?e.value:a.next()})},l(A),A[k]="Generator",A[w]=function(){return this},A.toString=function(){return"[object Generator]"},_.keys=function(e){var t=[];for(var n in e)t.push(n);return t.reverse(),function n(){for(;t.length;){var r=t.pop();if(r in e)return n.value=r,n.done=!1,n}return n.done=!0,n}},_.values=d,f.prototype={constructor:f,reset:function(e){if(this.prev=0,this.next=0,this.sent=this._sent=g,this.done=!1,this.delegate=null,this.method="next",this.arg=g,this.tryEntries.forEach(m),!e)for(var t in this)"t"===t.charAt(0)&&b.call(this,t)&&!isNaN(+t.slice(1))&&(this[t]=g)},stop:function(){this.done=!0;var e=this.tryEntries[0],t=e.completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(e){function t(t,r){return a.type="throw",a.arg=e,n.next=t,r&&(n.method="next",n.arg=g),!!r}if(this.done)throw e;for(var n=this,r=this.tryEntries.length-1;r>=0;--r){var o=this.tryEntries[r],a=o.completion;if("root"===o.tryLoc)return t("end");if(o.tryLoc<=this.prev){var i=b.call(o,"catchLoc"),l=b.call(o,"finallyLoc");if(i&&l){if(this.prev<o.catchLoc)return t(o.catchLoc,!0);if(this.prev<o.finallyLoc)return t(o.finallyLoc)}else if(i){if(this.prev<o.catchLoc)return t(o.catchLoc,!0)}else{if(!l)throw new Error("try statement without catch or finally");if(this.prev<o.finallyLoc)return t(o.finallyLoc)}}}},abrupt:function(e,t){for(var n=this.tryEntries.length-1;n>=0;--n){var r=this.tryEntries[n];if(r.tryLoc<=this.prev&&b.call(r,"finallyLoc")&&this.prev<r.finallyLoc){var o=r;break}}o&&("break"===e||"continue"===e)&&o.tryLoc<=t&&t<=o.finallyLoc&&(o=null);var a=o?o.completion:{};return a.type=e,a.arg=t,o?(this.method="next",this.next=o.finallyLoc,S):this.complete(a)},complete:function(e,t){if("throw"===e.type)throw e.arg;return"break"===e.type||"continue"===e.type?this.next=e.arg:"return"===e.type?(this.rval=this.arg=e.arg,this.method="return",this.next="end"):"normal"===e.type&&t&&(this.next=t),S},finish:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var n=this.tryEntries[t];if(n.finallyLoc===e)return this.complete(n.completion,n.afterLoc),m(n),S}},catch:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var n=this.tryEntries[t];if(n.tryLoc===e){var r=n.completion;if("throw"===r.type){var o=r.arg;m(n)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(e,t,n){return this.delegate={iterator:d(e),resultName:t,nextLoc:n},"next"===this.method&&(this.arg=g),S}}}(function(){return this}()||Function("return this")())},function(e,t){},function(e,t){}]);