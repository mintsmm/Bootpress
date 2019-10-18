/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/scripts/blocks/cta.js":
/*!******************************************!*\
  !*** ./assets/src/scripts/blocks/cta.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var registerBlockType = wp.blocks.registerBlockType;
var Fragment = wp.element.Fragment;
var _wp$editor = wp.editor,
    PlainText = _wp$editor.PlainText,
    RichText = _wp$editor.RichText,
    MediaUpload = _wp$editor.MediaUpload,
    BlockControls = _wp$editor.BlockControls,
    InspectorControls = _wp$editor.InspectorControls,
    ColorPalette = _wp$editor.ColorPalette,
    getColorClass = _wp$editor.getColorClass;
var _wp$components = wp.components,
    IconButton = _wp$components.IconButton,
    RangeControl = _wp$components.RangeControl,
    PanelBody = _wp$components.PanelBody;
registerBlockType('gutenberg-awps/awps-cta', {
  title: 'Call to Action',
  icon: 'format-image',
  category: 'layout',
  attributes: {
    title: {
      type: 'string',
      source: 'html',
      selector: 'h3'
    },
    body: {
      type: 'string',
      source: 'html',
      selector: 'p'
    },
    titleColor: {
      type: 'string',
      "default": 'white'
    },
    bodyColor: {
      type: 'string',
      "default": 'white'
    },
    overlayColor: {
      type: 'string',
      "default": 'black'
    },
    overlayOpacity: {
      type: 'number',
      "default": 0.3
    },
    backgroundImage: {
      type: 'string',
      "default": null
    },
    url: {
      type: 'string',
      source: 'attribute',
      selector: 'a',
      attribute: 'href'
    },
    buttonText: {
      type: 'string',
      selector: 'a',
      "default": 'Call to action'
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className,
        setAttributes = _ref.setAttributes;
    var title = attributes.title,
        body = attributes.body,
        backgroundImage = attributes.backgroundImage,
        titleColor = attributes.titleColor,
        bodyColor = attributes.bodyColor,
        overlayColor = attributes.overlayColor,
        overlayOpacity = attributes.overlayOpacity,
        url = attributes.url,
        buttonText = attributes.buttonText;

    function onSelectImage(newImage) {
      setAttributes({
        backgroundImage: newImage.sizes.full.url
      });
    }

    function onChangeBody(newBody) {
      setAttributes({
        body: newBody
      });
    }

    function onChangeTitle(newTitle) {
      setAttributes({
        title: newTitle
      });
    }

    function onTitleColorChange(newColor) {
      setAttributes({
        titleColor: newColor
      });
    }

    function onBodyColorChange(newColor) {
      setAttributes({
        bodyColor: newColor
      });
    }

    function onOverlayColorChange(newColor) {
      setAttributes({
        overlayColor: newColor
      });
    }

    function onOverlayOpacityChange(newOpacity) {
      setAttributes({
        overlayOpacity: newOpacity
      });
    }

    function changeButtonText(newText) {
      setAttributes({
        buttonText: newText
      });
    }

    function onChangeUrl(newUrl) {
      setAttributes({
        url: newUrl
      });
    }

    return [React.createElement(InspectorControls, {
      style: {
        marginBottom: '40px'
      }
    }, React.createElement(PanelBody, {
      title: 'Font Color Settings'
    }, React.createElement("div", {
      style: {
        marginTop: '20px'
      }
    }, React.createElement("p", null, React.createElement("strong", null, "Select a Title color:")), React.createElement(ColorPalette, {
      value: titleColor,
      onChange: onTitleColorChange
    })), React.createElement("div", {
      style: {
        marginTop: '20px',
        marginBottom: '40px'
      }
    }, React.createElement("p", null, React.createElement("strong", null, "Select a Body color:")), React.createElement(ColorPalette, {
      value: bodyColor,
      onChange: onBodyColorChange
    }))), React.createElement(PanelBody, {
      title: 'Background Image Settings'
    }, React.createElement("p", null, React.createElement("strong", null, "Select a background image:")), React.createElement(MediaUpload, {
      onSelect: onSelectImage,
      type: "image",
      value: backgroundImage,
      render: function render(_ref2) {
        var open = _ref2.open;
        return React.createElement(IconButton, {
          className: "editor-media-placeholder__button is-button is-default is-large",
          icon: "upload",
          onClick: open
        }, "Background Image");
      }
    }), React.createElement("div", {
      style: {
        marginTop: '20px',
        marginBottom: '40px'
      }
    }, React.createElement("p", null, React.createElement("strong", null, "Overlay Color:")), React.createElement(ColorPalette, {
      value: overlayColor,
      onChange: onOverlayColorChange
    })), React.createElement(RangeControl, {
      label: 'Overlay Opacity',
      value: overlayOpacity,
      onChange: onOverlayOpacityChange,
      min: 0,
      max: 1,
      step: 0.05
    }))), React.createElement("div", {
      className: "cta-container",
      style: {
        backgroundImage: "url(".concat(backgroundImage, ")"),
        backgroundSize: 'cover',
        backgroundPosition: 'center',
        backgroundRepeat: 'no-repeat'
      }
    }, React.createElement("div", {
      className: "cta-overlay",
      style: {
        background: overlayColor,
        opacity: overlayOpacity
      }
    }), React.createElement("div", {
      "class": "cta-content"
    }, React.createElement(RichText, {
      key: "editable",
      tagName: "h3",
      className: className,
      placeholder: "Your CTA title",
      onChange: onChangeTitle,
      value: title,
      style: {
        color: titleColor
      }
    }), React.createElement(BlockControls, null), React.createElement(RichText, {
      key: "editable",
      tagName: "p",
      className: className,
      placeholder: "Your CTA Description",
      onChange: onChangeBody,
      value: body,
      style: {
        color: bodyColor
      }
    }), React.createElement("div", {
      "class": "cta-content-button"
    }, React.createElement(RichText, {
      tagName: "a",
      onChange: changeButtonText,
      title: buttonText,
      value: buttonText,
      target: "_blank"
    })), React.createElement(PlainText, {
      style: {
        color: '#333',
        fontSize: '12px',
        padding: '2px'
      },
      value: url,
      onChange: onChangeUrl,
      placeholder: 'http://'
    })))];
  },
  save: function save(_ref3) {
    var attributes = _ref3.attributes;
    var title = attributes.title,
        body = attributes.body,
        titleColor = attributes.titleColor,
        bodyColor = attributes.bodyColor,
        overlayColor = attributes.overlayColor,
        overlayOpacity = attributes.overlayOpacity,
        backgroundImage = attributes.backgroundImage,
        url = attributes.url,
        buttonText = attributes.buttonText;
    return React.createElement("div", {
      className: "cta-container",
      style: {
        backgroundImage: "url(".concat(backgroundImage, ")"),
        backgroundSize: 'cover',
        backgroundPosition: 'center',
        backgroundRepeat: 'no-repeat'
      }
    }, React.createElement("div", {
      className: "cta-overlay",
      style: {
        background: overlayColor,
        opacity: overlayOpacity
      }
    }), React.createElement("div", {
      "class": "cta-content"
    }, React.createElement("h3", {
      style: {
        color: titleColor
      }
    }, title), React.createElement(RichText.Content, {
      tagName: "p",
      value: body,
      style: {
        color: bodyColor
      }
    }), React.createElement("div", {
      "class": "cta-content-button"
    }, React.createElement(RichText.Content, {
      tagName: "a",
      href: url,
      title: buttonText,
      value: buttonText,
      target: "_blank"
    }))));
  }
});

/***/ }),

/***/ "./assets/src/scripts/gutenberg.js":
/*!*****************************************!*\
  !*** ./assets/src/scripts/gutenberg.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Import your Gutenberg custom blocks here
 */
__webpack_require__(/*! ./blocks/cta.js */ "./assets/src/scripts/blocks/cta.js");

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./assets/src/scripts/gutenberg.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\bootpressdev\wp-content\themes\bootpress\assets\src\scripts\gutenberg.js */"./assets/src/scripts/gutenberg.js");


/***/ })

/******/ });