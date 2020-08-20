(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["style-index"],{

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

}]);

/******/ (function(modules) { // webpackBootstrap
/******/  // install a JSONP callback for chunk loading
/******/  function webpackJsonpCallback(data) {
/******/    var chunkIds = data[0];
/******/    var moreModules = data[1];
/******/    var executeModules = data[2];
/******/
/******/    // add "moreModules" to the modules object,
/******/    // then flag all "chunkIds" as loaded and fire callback
/******/    var moduleId, chunkId, i = 0, resolves = [];
/******/    for(;i < chunkIds.length; i++) {
/******/      chunkId = chunkIds[i];
/******/      if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/        resolves.push(installedChunks[chunkId][0]);
/******/      }
/******/      installedChunks[chunkId] = 0;
/******/    }
/******/    for(moduleId in moreModules) {
/******/      if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/        modules[moduleId] = moreModules[moduleId];
/******/      }
/******/    }
/******/    if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/    while(resolves.length) {
/******/      resolves.shift()();
/******/    }
/******/
/******/    // add entry modules from loaded chunk to deferred list
/******/    deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/    // run deferred modules when all chunks ready
/******/    return checkDeferredModules();
/******/  };
/******/  function checkDeferredModules() {
/******/    var result;
/******/    for(var i = 0; i < deferredModules.length; i++) {
/******/      var deferredModule = deferredModules[i];
/******/      var fulfilled = true;
/******/      for(var j = 1; j < deferredModule.length; j++) {
/******/        var depId = deferredModule[j];
/******/        if(installedChunks[depId] !== 0) fulfilled = false;
/******/      }
/******/      if(fulfilled) {
/******/        deferredModules.splice(i--, 1);
/******/        result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/      }
/******/    }
/******/
/******/    return result;
/******/  }
/******/
/******/  // The module cache
/******/  var installedModules = {};
/******/
/******/  // object to store loaded and loading chunks
/******/  // undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/  // Promise = chunk loading, 0 = chunk loaded
/******/  var installedChunks = {
/******/    "index": 0
/******/  };
/******/
/******/  var deferredModules = [];
/******/
/******/  // The require function
/******/  function __webpack_require__(moduleId) {
/******/
/******/    // Check if module is in cache
/******/    if(installedModules[moduleId]) {
/******/      return installedModules[moduleId].exports;
/******/    }
/******/    // Create a new module (and put it into the cache)
/******/    var module = installedModules[moduleId] = {
/******/      i: moduleId,
/******/      l: false,
/******/      exports: {}
/******/    };
/******/
/******/    // Execute the module function
/******/    modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/    // Flag the module as loaded
/******/    module.l = true;
/******/
/******/    // Return the exports of the module
/******/    return module.exports;
/******/  }
/******/
/******/
/******/  // expose the modules object (__webpack_modules__)
/******/  __webpack_require__.m = modules;
/******/
/******/  // expose the module cache
/******/  __webpack_require__.c = installedModules;
/******/
/******/  // define getter function for harmony exports
/******/  __webpack_require__.d = function(exports, name, getter) {
/******/    if(!__webpack_require__.o(exports, name)) {
/******/      Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/    }
/******/  };
/******/
/******/  // define __esModule on exports
/******/  __webpack_require__.r = function(exports) {
/******/    if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/      Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/    }
/******/    Object.defineProperty(exports, '__esModule', { value: true });
/******/  };
/******/
/******/  // create a fake namespace object
/******/  // mode & 1: value is a module id, require it
/******/  // mode & 2: merge all properties of value into the ns
/******/  // mode & 4: return value when already ns object
/******/  // mode & 8|1: behave like require
/******/  __webpack_require__.t = function(value, mode) {
/******/    if(mode & 1) value = __webpack_require__(value);
/******/    if(mode & 8) return value;
/******/    if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/    var ns = Object.create(null);
/******/    __webpack_require__.r(ns);
/******/    Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/    if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/    return ns;
/******/  };
/******/
/******/  // getDefaultExport function for compatibility with non-harmony modules
/******/  __webpack_require__.n = function(module) {
/******/    var getter = module && module.__esModule ?
/******/      function getDefault() { return module['default']; } :
/******/      function getModuleExports() { return module; };
/******/    __webpack_require__.d(getter, 'a', getter);
/******/    return getter;
/******/  };
/******/
/******/  // Object.prototype.hasOwnProperty.call
/******/  __webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/  // __webpack_public_path__
/******/  __webpack_require__.p = "";
/******/
/******/  var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/  var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/  jsonpArray.push = webpackJsonpCallback;
/******/  jsonpArray = jsonpArray.slice();
/******/  for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/  var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/  // add entry module to deferred list
/******/  deferredModules.push(["./src/index.js","style-index"]);
/******/  // run deferred modules when ready
/******/  return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/asyncToGenerator.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/asyncToGenerator.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) {
  try {
    var info = gen[key](arg);
    var value = info.value;
  } catch (error) {
    reject(error);
    return;
  }

  if (info.done) {
    resolve(value);
  } else {
    Promise.resolve(value).then(_next, _throw);
  }
}

function _asyncToGenerator(fn) {
  return function () {
    var self = this,
        args = arguments;
    return new Promise(function (resolve, reject) {
      var gen = fn.apply(self, args);

      function _next(value) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value);
      }

      function _throw(err) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err);
      }

      _next(undefined);
    });
  };
}

module.exports = _asyncToGenerator;

/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "@babel/runtime/regenerator");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/asyncToGenerator */ "./node_modules/@babel/runtime/helpers/asyncToGenerator.js");
/* harmony import */ var _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_editor_scss__WEBPACK_IMPORTED_MODULE_4__);





var __ = wp.i18n.__;
var registerBlockType = wp.blocks.registerBlockType;
var _wp$components = wp.components,
    SelectControl = _wp$components.SelectControl,
    TextControl = _wp$components.TextControl;
var RichText = wp.editor.RichText;
var dropdownOptions = false;
var insertItemImage = false;
var insertItemOsTitle = false;
var insertItemOsView = false;
var insertItemOsEdit = false;
var insertItemOsStatistics = false;
registerBlockType('opinion-stage/block-os-slideshow', {
  title: __('Slideshow'),
  icon: 'playlist-video',
  category: 'opinion-stage',
  keywords: [__('Opinion Stage Slideshow'), __('Opinion Stage Slideshow')],
  attributes: {
    embedUrl: {
      source: 'attribute',
      attribute: 'data-test-url',
      selector: 'div[data-test-url]'
    },
    lockEmbed: {
      source: 'attribute',
      attribute: 'data-lock-embed',
      selector: 'div[data-lock-embed]'
    },
    buttonText: {
      source: 'attribute',
      attribute: 'data-button-text',
      selector: 'div[data-button-text]'
    },
    insertItemImage: {
      source: 'attribute',
      attribute: 'data-image-url',
      selector: 'div[data-image-url]'
    },
    insertItemOsTitle: {
      source: 'attribute',
      attribute: 'data-title-url',
      selector: 'div[data-title-url]'
    },
    insertItemOsView: {
      source: 'attribute',
      attribute: 'data-view-url',
      selector: 'div[data-view-url]'
    },
    insertItemOsEdit: {
      source: 'attribute',
      attribute: 'data-edit-url',
      selector: 'div[data-edit-url]'
    },
    insertItemOsStatistics: {
      source: 'attribute',
      attribute: 'data-statistics-url',
      selector: 'div[data-statistics-url]'
    }
  },
  edit: function edit(props) {
    // Setting Attributes
    var _props$attributes = props.attributes,
        embedUrl = _props$attributes.embedUrl,
        lockEmbed = _props$attributes.lockEmbed,
        buttonText = _props$attributes.buttonText,
        insertItemImage = _props$attributes.insertItemImage,
        insertItemOsTitle = _props$attributes.insertItemOsTitle,
        insertItemOsView = _props$attributes.insertItemOsView,
        insertItemOsEdit = _props$attributes.insertItemOsEdit,
        insertItemOsStatistics = _props$attributes.insertItemOsStatistics,
        setAttributes = props.setAttributes; // Fetching Localized variables

    var getCallBackUrlOs = osGutenData.callbackUrlOs;
    var callback_url = getCallBackUrlOs;
    var formActionUrlOS = osGutenData.getActionUrlOS;
    var getlogoImageLinkOs = osGutenData.getLogoImageLink; // Select Button Click functionality

    var onSelectButtonClick = function onSelectButtonClick(value) {
      window.verifyOSInsert = function (widget) {
        props.setAttributes({
          embedUrl: widget,
          buttonText: 'Change'
        });
        var opinionStageWidgetVersion = osGutenData.OswpPluginVersion;
        var opinionStageClientToken = osGutenData.OswpClientToken;
        var opinionstageFetchDataUrl = osGutenData.OswpFetchDataUrl + '?type=slideshow&page=1&per_page=99';
        fetch(opinionstageFetchDataUrl, {
          method: "GET",
          headers: {
            'Accept': 'application/vnd.api+json',
            'Content-Type': 'application/vnd.api+json',
            'OSWP-Plugin-Version': opinionStageWidgetVersion,
            'OSWP-Client-Token': opinionStageClientToken
          }
        }).then( /*#__PURE__*/function () {
          var _ref = _babel_runtime_helpers_asyncToGenerator__WEBPACK_IMPORTED_MODULE_1___default()( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(res) {
            var data;
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
              while (1) {
                switch (_context.prev = _context.next) {
                  case 0:
                    _context.next = 2;
                    return res.json();

                  case 2:
                    data = _context.sent;
                    data = data.data;
                    dropdownOptions = data; // force reprinting instead!!

                    props.setAttributes({
                      buttonText: buttonText
                    });

                  case 6:
                  case "end":
                    return _context.stop();
                }
              }
            }, _callee);
          }));

          return function (_x) {
            return _ref.apply(this, arguments);
          };
        }()).catch(function (err) {
          console.log('ERROR: ' + err.message);
        });
      };
    }; // Change Button Click functionality


    var onChangeButtonClick = function onChangeButtonClick(value) {
      props.setAttributes({
        embedUrl: '',
        buttonText: 'Embed',
        lockEmbed: false,
        insertItemImage: false,
        insertItemOsTitle: false,
        insertItemOsView: false,
        insertItemOsEdit: false,
        insertItemOsStatistics: false
      });
    }; // Connect to Opinionstage Callback Url


    var onConnectOSWPButtonClick = function onConnectOSWPButtonClick(value) {
      window.location.replace(callback_url);
    }; // Create New Item Url (slideshow)


    var getOsCreateButtonClickUrl = osGutenData.onCreateButtonClickOs + '?w_type=slideshow&amp;utm_source=wordpress&amp;utm_campaign=WPMainPI&amp;utm_medium=link&amp;o=wp35e8';

    var onCreateButtonClick = function onCreateButtonClick(value) {
      // Open Create new slideshow link in new page
      window.open(getOsCreateButtonClickUrl, '_blank').focus();
    }; // Checking for Opinion Stage connection


    if (osGutenData.isOsConnected == '') {
      // Not Connected to opinionstage
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
        className: props.className
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
        className: "os-slideshow-wrapper components-placeholder"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("p", {
        className: "components-heading"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("img", {
        src: getlogoImageLinkOs,
        alt: ""
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("p", {
        className: "components-heading"
      }, "Please connect WordPress to Opinion Stage to start adding slideshows"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
        className: "components-button is-button is-default is-block is-primary",
        onClick: onConnectOSWPButtonClick
      }, "Connect")), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", null));
    } else {
      // Connected to opinionstage
      jQuery(document).ready(function ($) {
        // Content Popup Launch Working
        jQuery('body').on('click', '[data-opinionstage-content-launch]', function (event) {
          event.preventDefault();
          setTimeout(function () {
            $('.progress_message').css('display', 'block');
            $('.content__list').css('display', 'none');
            var text = $('#oswpLauncherContentPopupslideshow').attr('data-os-block');
            $("button#dropbtn span").text(text);
            var inputs = $(".filter__itm");

            for (var i = 0; i < inputs.length; i++) {
              if ($(inputs[i]).text() == text) {
                setTimeout(function () {
                  $(inputs[i]).trigger('click');
                  $('.progress_message').css('display', 'none');
                  $('.content__list').css('display', 'block');
                  $('button.content__links-itm').on('click', null, function (e) {
                    $('.tingle-modal.opinionstage-content-popup').hide();
                    $('.tingle-modal.opinionstage-content-popup.tingle-modal--visible').hide();
                  });
                }, 2500);
                break;
              } else {
                $('.progress_message').css('display', 'block');
                $('.content__list').css('display', 'none');
              }
            }
          }, 1000);
        });
      }); // Fetching Ajax Call Result

      if (dropdownOptions != false) {
        for (var i = 0; i < dropdownOptions.length; i++) {
          var getLandingPageUrlOs = function getLandingPageUrlOs(href) {
            var locationUrlOS = document.createElement("a");
            locationUrlOS.href = href;
            return locationUrlOS;
          };

          var locationUrlOS = getLandingPageUrlOs(dropdownOptions[i].attributes['landing-page-url']);
          var matchValue = locationUrlOS.pathname;

          if (embedUrl == matchValue) {
            props.setAttributes({
              lockEmbed: true,
              buttonText: "Change"
            });
            props.setAttributes({
              insertItemImage: dropdownOptions[i].attributes['image-url']
            });
            props.setAttributes({
              insertItemOsTitle: dropdownOptions[i].attributes['title']
            });
            props.setAttributes({
              insertItemOsView: dropdownOptions[i].attributes['landing-page-url']
            });
            props.setAttributes({
              insertItemOsEdit: dropdownOptions[i].attributes['edit-url']
            });
            props.setAttributes({
              insertItemOsStatistics: dropdownOptions[i].attributes['stats-url']
            });
            break;
          }
        }
      } // Content On Editor


      var contentViewEditStatOs = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
        className: "os-slideshow-wrapper components-placeholder"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("p", {
        className: "components-heading"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("img", {
        src: getlogoImageLinkOs,
        alt: ""
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
        id: "oswpLauncherContentPopupslideshow",
        className: "components-button is-button is-default is-block is-primary",
        "data-opinionstage-content-launch": true,
        "data-os-block": "slideshow",
        onClick: onSelectButtonClick
      }, "Select a Slideshow"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("input", {
        type: "button",
        value: "Create a New Slideshow",
        className: "components-button is-button is-default is-block is-primary",
        onClick: onCreateButtonClick
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", null));

      if (embedUrl != '' && embedUrl) {
        if (buttonText == 'Embed') {
          contentViewEditStatOs;
        } else if (buttonText == 'Change') {
          contentViewEditStatOs = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
            className: "os-slideshow-wrapper components-placeholder"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("p", {
            className: "components-heading"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("img", {
            src: getlogoImageLinkOs,
            alt: ""
          })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
            className: "components-preview__block"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
            className: "components-preview__leftBlockImage"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("img", {
            src: insertItemImage,
            alt: insertItemOsTitle,
            className: "image"
          }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
            className: "overlay"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
            className: "text"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("a", {
            href: insertItemOsView,
            target: "_blank"
          }, " View "), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("a", {
            href: insertItemOsEdit,
            target: "_blank"
          }, " Edit "), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("a", {
            href: insertItemOsStatistics,
            target: "_blank"
          }, " Statistics "), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("input", {
            type: "button",
            value: buttonText,
            className: "components-button is-button is-default is-large left-align",
            onClick: onChangeButtonClick
          })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
            className: "components-preview__rightBlockContent"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
            className: "components-placeholder__label"
          }, "Slideshow: ", insertItemOsTitle))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", null));
        }
      } else if (embedUrl == '' || jQuery.type(embedUrl) === "undefined") {
        contentViewEditStatOs;
      } else {
        props.setAttributes({
          buttonText: 'Embed'
        });
        contentViewEditStatOs;
      }

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
        className: props.className
      }, contentViewEditStatOs, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", null));
    }
  },
  save: function save(_ref2) {
    var _ref2$attributes = _ref2.attributes,
        embedUrl = _ref2$attributes.embedUrl,
        lockEmbed = _ref2$attributes.lockEmbed,
        buttonText = _ref2$attributes.buttonText,
        insertItemImage = _ref2$attributes.insertItemImage,
        insertItemOsTitle = _ref2$attributes.insertItemOsTitle,
        insertItemOsView = _ref2$attributes.insertItemOsView,
        insertItemOsEdit = _ref2$attributes.insertItemOsEdit,
        insertItemOsStatistics = _ref2$attributes.insertItemOsStatistics;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      class: "os-slideshow-wrapper",
      "data-type": "slideshow",
      "data-image-url": insertItemImage,
      "data-title-url": insertItemOsTitle,
      "data-view-url": insertItemOsView,
      "data-statistics-url": insertItemOsStatistics,
      "data-edit-url": insertItemOsEdit,
      "data-test-url": embedUrl,
      "data-lock-embed": lockEmbed,
      "data-button-text": buttonText
    }, "[os-widget path=\"", embedUrl, "\"]", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", null));
  }
});

/***/ }),

/***/ "@babel/runtime/regenerator":
/*!**********************************************!*\
  !*** external {"this":"regeneratorRuntime"} ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["regeneratorRuntime"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!******************************************!*\
  !*** external {"this":["wp","element"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["element"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map