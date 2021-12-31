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
/******/ 	return __webpack_require__(__webpack_require__.s = 13);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./Modules/Product/Resources/assets/admin/js/Download.js":
/*!***************************************************************!*\
  !*** ./Modules/Product/Resources/assets/admin/js/Download.js ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return _default; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar _default = /*#__PURE__*/function () {\n  function _default(download) {\n    _classCallCheck(this, _default);\n\n    this.downloadHtml = this.getDownloadHtml(download);\n  }\n\n  _createClass(_default, [{\n    key: \"getDownloadHtml\",\n    value: function getDownloadHtml(download) {\n      var template = _.template($('#product-download-template').html());\n\n      return $(template(download));\n    }\n  }, {\n    key: \"render\",\n    value: function render() {\n      this.attachEventListeners();\n      return this.downloadHtml;\n    }\n  }, {\n    key: \"attachEventListeners\",\n    value: function attachEventListeners() {\n      var _this = this;\n\n      this.downloadHtml.find('.delete-row').on('click', function () {\n        _this.downloadHtml.remove();\n      });\n      this.downloadHtml.find('.btn-choose-file').on('click', function () {\n        var picker = new MediaPicker();\n        picker.on('select', function (file) {\n          _this.downloadHtml.find('.download-name').val(file.filename);\n\n          _this.downloadHtml.find('.download-file').val(file.id);\n        });\n      });\n    }\n  }]);\n\n  return _default;\n}();\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9Nb2R1bGVzL1Byb2R1Y3QvUmVzb3VyY2VzL2Fzc2V0cy9hZG1pbi9qcy9Eb3dubG9hZC5qcz81OTlmIl0sIm5hbWVzIjpbImRvd25sb2FkIiwiZG93bmxvYWRIdG1sIiwiZ2V0RG93bmxvYWRIdG1sIiwidGVtcGxhdGUiLCJfIiwiJCIsImh0bWwiLCJhdHRhY2hFdmVudExpc3RlbmVycyIsImZpbmQiLCJvbiIsInJlbW92ZSIsInBpY2tlciIsIk1lZGlhUGlja2VyIiwiZmlsZSIsInZhbCIsImZpbGVuYW1lIiwiaWQiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUNJLG9CQUFZQSxRQUFaLEVBQXNCO0FBQUE7O0FBQ2xCLFNBQUtDLFlBQUwsR0FBb0IsS0FBS0MsZUFBTCxDQUFxQkYsUUFBckIsQ0FBcEI7QUFDSDs7OztXQUVELHlCQUFnQkEsUUFBaEIsRUFBMEI7QUFDdEIsVUFBSUcsUUFBUSxHQUFHQyxDQUFDLENBQUNELFFBQUYsQ0FBV0UsQ0FBQyxDQUFDLDRCQUFELENBQUQsQ0FBZ0NDLElBQWhDLEVBQVgsQ0FBZjs7QUFFQSxhQUFPRCxDQUFDLENBQUNGLFFBQVEsQ0FBQ0gsUUFBRCxDQUFULENBQVI7QUFDSDs7O1dBRUQsa0JBQVM7QUFDTCxXQUFLTyxvQkFBTDtBQUVBLGFBQU8sS0FBS04sWUFBWjtBQUNIOzs7V0FFRCxnQ0FBdUI7QUFBQTs7QUFDbkIsV0FBS0EsWUFBTCxDQUFrQk8sSUFBbEIsQ0FBdUIsYUFBdkIsRUFBc0NDLEVBQXRDLENBQXlDLE9BQXpDLEVBQWtELFlBQU07QUFDcEQsYUFBSSxDQUFDUixZQUFMLENBQWtCUyxNQUFsQjtBQUNILE9BRkQ7QUFJQSxXQUFLVCxZQUFMLENBQWtCTyxJQUFsQixDQUF1QixrQkFBdkIsRUFBMkNDLEVBQTNDLENBQThDLE9BQTlDLEVBQXVELFlBQU07QUFDekQsWUFBSUUsTUFBTSxHQUFHLElBQUlDLFdBQUosRUFBYjtBQUVBRCxjQUFNLENBQUNGLEVBQVAsQ0FBVSxRQUFWLEVBQW9CLFVBQUNJLElBQUQsRUFBVTtBQUMxQixlQUFJLENBQUNaLFlBQUwsQ0FBa0JPLElBQWxCLENBQXVCLGdCQUF2QixFQUF5Q00sR0FBekMsQ0FBNkNELElBQUksQ0FBQ0UsUUFBbEQ7O0FBQ0EsZUFBSSxDQUFDZCxZQUFMLENBQWtCTyxJQUFsQixDQUF1QixnQkFBdkIsRUFBeUNNLEdBQXpDLENBQTZDRCxJQUFJLENBQUNHLEVBQWxEO0FBQ0gsU0FIRDtBQUlILE9BUEQ7QUFRSCIsImZpbGUiOiIuL01vZHVsZXMvUHJvZHVjdC9SZXNvdXJjZXMvYXNzZXRzL2FkbWluL2pzL0Rvd25sb2FkLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiZXhwb3J0IGRlZmF1bHQgY2xhc3Mge1xuICAgIGNvbnN0cnVjdG9yKGRvd25sb2FkKSB7XG4gICAgICAgIHRoaXMuZG93bmxvYWRIdG1sID0gdGhpcy5nZXREb3dubG9hZEh0bWwoZG93bmxvYWQpO1xuICAgIH1cblxuICAgIGdldERvd25sb2FkSHRtbChkb3dubG9hZCkge1xuICAgICAgICBsZXQgdGVtcGxhdGUgPSBfLnRlbXBsYXRlKCQoJyNwcm9kdWN0LWRvd25sb2FkLXRlbXBsYXRlJykuaHRtbCgpKTtcblxuICAgICAgICByZXR1cm4gJCh0ZW1wbGF0ZShkb3dubG9hZCkpO1xuICAgIH1cblxuICAgIHJlbmRlcigpIHtcbiAgICAgICAgdGhpcy5hdHRhY2hFdmVudExpc3RlbmVycygpO1xuXG4gICAgICAgIHJldHVybiB0aGlzLmRvd25sb2FkSHRtbDtcbiAgICB9XG5cbiAgICBhdHRhY2hFdmVudExpc3RlbmVycygpIHtcbiAgICAgICAgdGhpcy5kb3dubG9hZEh0bWwuZmluZCgnLmRlbGV0ZS1yb3cnKS5vbignY2xpY2snLCAoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLmRvd25sb2FkSHRtbC5yZW1vdmUoKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgdGhpcy5kb3dubG9hZEh0bWwuZmluZCgnLmJ0bi1jaG9vc2UtZmlsZScpLm9uKCdjbGljaycsICgpID0+IHtcbiAgICAgICAgICAgIGxldCBwaWNrZXIgPSBuZXcgTWVkaWFQaWNrZXIoKTtcblxuICAgICAgICAgICAgcGlja2VyLm9uKCdzZWxlY3QnLCAoZmlsZSkgPT4ge1xuICAgICAgICAgICAgICAgIHRoaXMuZG93bmxvYWRIdG1sLmZpbmQoJy5kb3dubG9hZC1uYW1lJykudmFsKGZpbGUuZmlsZW5hbWUpO1xuICAgICAgICAgICAgICAgIHRoaXMuZG93bmxvYWRIdG1sLmZpbmQoJy5kb3dubG9hZC1maWxlJykudmFsKGZpbGUuaWQpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH1cbn1cbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./Modules/Product/Resources/assets/admin/js/Download.js\n");

/***/ }),

/***/ "./Modules/Product/Resources/assets/admin/js/Downloads.js":
/*!****************************************************************!*\
  !*** ./Modules/Product/Resources/assets/admin/js/Downloads.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return _default; });\n/* harmony import */ var _Download__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Download */ \"./Modules/Product/Resources/assets/admin/js/Download.js\");\nfunction _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== \"undefined\" && o[Symbol.iterator] || o[\"@@iterator\"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === \"number\") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError(\"Invalid attempt to iterate non-iterable instance.\\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.\"); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it[\"return\"] != null) it[\"return\"](); } finally { if (didErr) throw err; } } }; }\n\nfunction _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === \"string\") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === \"Object\" && o.constructor) n = o.constructor.name; if (n === \"Map\" || n === \"Set\") return Array.from(o); if (n === \"Arguments\" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }\n\nfunction _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\n\n\nvar _default = /*#__PURE__*/function () {\n  function _default() {\n    _classCallCheck(this, _default);\n\n    this.downloadsCount = 0;\n    this.addDownloads(FleetCart.data['product.downloads']);\n\n    if (this.downloadsCount === 0) {\n      this.addDownload();\n    }\n\n    this.attachEventListeners();\n    this.makeDownloadsSortable();\n  }\n\n  _createClass(_default, [{\n    key: \"addDownloads\",\n    value: function addDownloads(downloads) {\n      var _iterator = _createForOfIteratorHelper(downloads),\n          _step;\n\n      try {\n        for (_iterator.s(); !(_step = _iterator.n()).done;) {\n          var attributes = _step.value;\n          this.addDownload(attributes);\n        }\n      } catch (err) {\n        _iterator.e(err);\n      } finally {\n        _iterator.f();\n      }\n    }\n  }, {\n    key: \"addDownload\",\n    value: function addDownload() {\n      var attributes = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};\n      var download = new _Download__WEBPACK_IMPORTED_MODULE_0__[\"default\"]({\n        download: attributes\n      });\n      $('#downloads-wrapper').append(download.render());\n      this.downloadsCount++;\n      window.admin.tooltip();\n    }\n  }, {\n    key: \"attachEventListeners\",\n    value: function attachEventListeners() {\n      var _this = this;\n\n      $('#add-new-file').on('click', function () {\n        _this.addDownload();\n      });\n    }\n  }, {\n    key: \"makeDownloadsSortable\",\n    value: function makeDownloadsSortable() {\n      Sortable.create(document.getElementById('downloads-wrapper'), {\n        handle: '.drag-icon',\n        animation: 150\n      });\n    }\n  }]);\n\n  return _default;\n}();\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9Nb2R1bGVzL1Byb2R1Y3QvUmVzb3VyY2VzL2Fzc2V0cy9hZG1pbi9qcy9Eb3dubG9hZHMuanM/NTIxZCJdLCJuYW1lcyI6WyJkb3dubG9hZHNDb3VudCIsImFkZERvd25sb2FkcyIsIkZsZWV0Q2FydCIsImRhdGEiLCJhZGREb3dubG9hZCIsImF0dGFjaEV2ZW50TGlzdGVuZXJzIiwibWFrZURvd25sb2Fkc1NvcnRhYmxlIiwiZG93bmxvYWRzIiwiYXR0cmlidXRlcyIsImRvd25sb2FkIiwiRG93bmxvYWQiLCIkIiwiYXBwZW5kIiwicmVuZGVyIiwid2luZG93IiwiYWRtaW4iLCJ0b29sdGlwIiwib24iLCJTb3J0YWJsZSIsImNyZWF0ZSIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJoYW5kbGUiLCJhbmltYXRpb24iXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7OztBQUFBOzs7QUFHSSxzQkFBYztBQUFBOztBQUNWLFNBQUtBLGNBQUwsR0FBc0IsQ0FBdEI7QUFFQSxTQUFLQyxZQUFMLENBQWtCQyxTQUFTLENBQUNDLElBQVYsQ0FBZSxtQkFBZixDQUFsQjs7QUFFQSxRQUFJLEtBQUtILGNBQUwsS0FBd0IsQ0FBNUIsRUFBK0I7QUFDM0IsV0FBS0ksV0FBTDtBQUNIOztBQUVELFNBQUtDLG9CQUFMO0FBQ0EsU0FBS0MscUJBQUw7QUFDSDs7OztXQUVELHNCQUFhQyxTQUFiLEVBQXdCO0FBQUEsaURBQ0dBLFNBREg7QUFBQTs7QUFBQTtBQUNwQiw0REFBa0M7QUFBQSxjQUF6QkMsVUFBeUI7QUFDOUIsZUFBS0osV0FBTCxDQUFpQkksVUFBakI7QUFDSDtBQUhtQjtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBSXZCOzs7V0FFRCx1QkFBNkI7QUFBQSxVQUFqQkEsVUFBaUIsdUVBQUosRUFBSTtBQUN6QixVQUFJQyxRQUFRLEdBQUcsSUFBSUMsaURBQUosQ0FBYTtBQUFFRCxnQkFBUSxFQUFFRDtBQUFaLE9BQWIsQ0FBZjtBQUVBRyxPQUFDLENBQUMsb0JBQUQsQ0FBRCxDQUF3QkMsTUFBeEIsQ0FBK0JILFFBQVEsQ0FBQ0ksTUFBVCxFQUEvQjtBQUVBLFdBQUtiLGNBQUw7QUFDQWMsWUFBTSxDQUFDQyxLQUFQLENBQWFDLE9BQWI7QUFDSDs7O1dBRUQsZ0NBQXVCO0FBQUE7O0FBQ25CTCxPQUFDLENBQUMsZUFBRCxDQUFELENBQW1CTSxFQUFuQixDQUFzQixPQUF0QixFQUErQixZQUFNO0FBQ2pDLGFBQUksQ0FBQ2IsV0FBTDtBQUNILE9BRkQ7QUFHSDs7O1dBRUQsaUNBQXdCO0FBQ3BCYyxjQUFRLENBQUNDLE1BQVQsQ0FBZ0JDLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixtQkFBeEIsQ0FBaEIsRUFBOEQ7QUFDMURDLGNBQU0sRUFBRSxZQURrRDtBQUUxREMsaUJBQVMsRUFBRTtBQUYrQyxPQUE5RDtBQUlIIiwiZmlsZSI6Ii4vTW9kdWxlcy9Qcm9kdWN0L1Jlc291cmNlcy9hc3NldHMvYWRtaW4vanMvRG93bmxvYWRzLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IERvd25sb2FkIGZyb20gJy4vRG93bmxvYWQnO1xuXG5leHBvcnQgZGVmYXVsdCBjbGFzcyB7XG4gICAgY29uc3RydWN0b3IoKSB7XG4gICAgICAgIHRoaXMuZG93bmxvYWRzQ291bnQgPSAwO1xuXG4gICAgICAgIHRoaXMuYWRkRG93bmxvYWRzKEZsZWV0Q2FydC5kYXRhWydwcm9kdWN0LmRvd25sb2FkcyddKTtcblxuICAgICAgICBpZiAodGhpcy5kb3dubG9hZHNDb3VudCA9PT0gMCkge1xuICAgICAgICAgICAgdGhpcy5hZGREb3dubG9hZCgpO1xuICAgICAgICB9XG5cbiAgICAgICAgdGhpcy5hdHRhY2hFdmVudExpc3RlbmVycygpO1xuICAgICAgICB0aGlzLm1ha2VEb3dubG9hZHNTb3J0YWJsZSgpO1xuICAgIH1cblxuICAgIGFkZERvd25sb2Fkcyhkb3dubG9hZHMpIHtcbiAgICAgICAgZm9yIChsZXQgYXR0cmlidXRlcyBvZiBkb3dubG9hZHMpIHtcbiAgICAgICAgICAgIHRoaXMuYWRkRG93bmxvYWQoYXR0cmlidXRlcyk7XG4gICAgICAgIH1cbiAgICB9XG5cbiAgICBhZGREb3dubG9hZChhdHRyaWJ1dGVzID0ge30pIHtcbiAgICAgICAgbGV0IGRvd25sb2FkID0gbmV3IERvd25sb2FkKHsgZG93bmxvYWQ6IGF0dHJpYnV0ZXMgfSk7XG5cbiAgICAgICAgJCgnI2Rvd25sb2Fkcy13cmFwcGVyJykuYXBwZW5kKGRvd25sb2FkLnJlbmRlcigpKTtcblxuICAgICAgICB0aGlzLmRvd25sb2Fkc0NvdW50Kys7XG4gICAgICAgIHdpbmRvdy5hZG1pbi50b29sdGlwKCk7XG4gICAgfVxuXG4gICAgYXR0YWNoRXZlbnRMaXN0ZW5lcnMoKSB7XG4gICAgICAgICQoJyNhZGQtbmV3LWZpbGUnKS5vbignY2xpY2snLCAoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLmFkZERvd25sb2FkKCk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIG1ha2VEb3dubG9hZHNTb3J0YWJsZSgpIHtcbiAgICAgICAgU29ydGFibGUuY3JlYXRlKGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3dubG9hZHMtd3JhcHBlcicpLCB7XG4gICAgICAgICAgICBoYW5kbGU6ICcuZHJhZy1pY29uJyxcbiAgICAgICAgICAgIGFuaW1hdGlvbjogMTUwLFxuICAgICAgICB9KTtcbiAgICB9XG59XG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./Modules/Product/Resources/assets/admin/js/Downloads.js\n");

/***/ }),

/***/ "./Modules/Product/Resources/assets/admin/js/ProductForm.js":
/*!******************************************************************!*\
  !*** ./Modules/Product/Resources/assets/admin/js/ProductForm.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return _default; });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar _default = /*#__PURE__*/function () {\n  function _default() {\n    _classCallCheck(this, _default);\n\n    this.managerStock();\n    window.admin.removeSubmitButtonOffsetOn(['#images', '#downloads', '#attributes', '#options', '#related_products', '#up_sells', '#cross_sells', '#reviews']);\n    $('#product-create-form, #product-edit-form').on('submit', this.submit);\n  }\n\n  _createClass(_default, [{\n    key: \"managerStock\",\n    value: function managerStock() {\n      $('#manage_stock').on('change', function (e) {\n        if (e.currentTarget.value === '1') {\n          $('#qty-field').removeClass('hide');\n        } else {\n          $('#qty-field').addClass('hide');\n        }\n      });\n    }\n  }, {\n    key: \"submit\",\n    value: function submit(e) {\n      e.preventDefault();\n      DataTable.removeLengthFields();\n      window.form.appendHiddenInputs('#product-create-form, #product-edit-form', 'up_sells', DataTable.getSelectedIds('#up_sells .table'));\n      window.form.appendHiddenInputs('#product-create-form, #product-edit-form', 'cross_sells', DataTable.getSelectedIds('#cross_sells .table'));\n      window.form.appendHiddenInputs('#product-create-form, #product-edit-form', 'related_products', DataTable.getSelectedIds('#related_products .table'));\n      e.currentTarget.submit();\n    }\n  }]);\n\n  return _default;\n}();\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9Nb2R1bGVzL1Byb2R1Y3QvUmVzb3VyY2VzL2Fzc2V0cy9hZG1pbi9qcy9Qcm9kdWN0Rm9ybS5qcz9iZWRkIl0sIm5hbWVzIjpbIm1hbmFnZXJTdG9jayIsIndpbmRvdyIsImFkbWluIiwicmVtb3ZlU3VibWl0QnV0dG9uT2Zmc2V0T24iLCIkIiwib24iLCJzdWJtaXQiLCJlIiwiY3VycmVudFRhcmdldCIsInZhbHVlIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsInByZXZlbnREZWZhdWx0IiwiRGF0YVRhYmxlIiwicmVtb3ZlTGVuZ3RoRmllbGRzIiwiZm9ybSIsImFwcGVuZEhpZGRlbklucHV0cyIsImdldFNlbGVjdGVkSWRzIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFDSSxzQkFBYztBQUFBOztBQUNWLFNBQUtBLFlBQUw7QUFFQUMsVUFBTSxDQUFDQyxLQUFQLENBQWFDLDBCQUFiLENBQXdDLENBQ3BDLFNBRG9DLEVBQ3pCLFlBRHlCLEVBQ1gsYUFEVyxFQUNJLFVBREosRUFFcEMsbUJBRm9DLEVBRWYsV0FGZSxFQUVGLGNBRkUsRUFFYyxVQUZkLENBQXhDO0FBS0FDLEtBQUMsQ0FBQywwQ0FBRCxDQUFELENBQThDQyxFQUE5QyxDQUFpRCxRQUFqRCxFQUEyRCxLQUFLQyxNQUFoRTtBQUNIOzs7O1dBRUQsd0JBQWU7QUFDWEYsT0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQkMsRUFBbkIsQ0FBc0IsUUFBdEIsRUFBZ0MsVUFBQ0UsQ0FBRCxFQUFPO0FBQ25DLFlBQUlBLENBQUMsQ0FBQ0MsYUFBRixDQUFnQkMsS0FBaEIsS0FBMEIsR0FBOUIsRUFBbUM7QUFDL0JMLFdBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JNLFdBQWhCLENBQTRCLE1BQTVCO0FBQ0gsU0FGRCxNQUVPO0FBQ0hOLFdBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JPLFFBQWhCLENBQXlCLE1BQXpCO0FBQ0g7QUFDSixPQU5EO0FBT0g7OztXQUVELGdCQUFPSixDQUFQLEVBQVU7QUFDTkEsT0FBQyxDQUFDSyxjQUFGO0FBRUFDLGVBQVMsQ0FBQ0Msa0JBQVY7QUFFQWIsWUFBTSxDQUFDYyxJQUFQLENBQVlDLGtCQUFaLENBQStCLDBDQUEvQixFQUEyRSxVQUEzRSxFQUF1RkgsU0FBUyxDQUFDSSxjQUFWLENBQXlCLGtCQUF6QixDQUF2RjtBQUNBaEIsWUFBTSxDQUFDYyxJQUFQLENBQVlDLGtCQUFaLENBQStCLDBDQUEvQixFQUEyRSxhQUEzRSxFQUEwRkgsU0FBUyxDQUFDSSxjQUFWLENBQXlCLHFCQUF6QixDQUExRjtBQUNBaEIsWUFBTSxDQUFDYyxJQUFQLENBQVlDLGtCQUFaLENBQStCLDBDQUEvQixFQUEyRSxrQkFBM0UsRUFBK0ZILFNBQVMsQ0FBQ0ksY0FBVixDQUF5QiwwQkFBekIsQ0FBL0Y7QUFFQVYsT0FBQyxDQUFDQyxhQUFGLENBQWdCRixNQUFoQjtBQUNIIiwiZmlsZSI6Ii4vTW9kdWxlcy9Qcm9kdWN0L1Jlc291cmNlcy9hc3NldHMvYWRtaW4vanMvUHJvZHVjdEZvcm0uanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJleHBvcnQgZGVmYXVsdCBjbGFzcyB7XG4gICAgY29uc3RydWN0b3IoKSB7XG4gICAgICAgIHRoaXMubWFuYWdlclN0b2NrKCk7XG5cbiAgICAgICAgd2luZG93LmFkbWluLnJlbW92ZVN1Ym1pdEJ1dHRvbk9mZnNldE9uKFtcbiAgICAgICAgICAgICcjaW1hZ2VzJywgJyNkb3dubG9hZHMnLCAnI2F0dHJpYnV0ZXMnLCAnI29wdGlvbnMnLFxuICAgICAgICAgICAgJyNyZWxhdGVkX3Byb2R1Y3RzJywgJyN1cF9zZWxscycsICcjY3Jvc3Nfc2VsbHMnLCAnI3Jldmlld3MnLFxuICAgICAgICBdKTtcblxuICAgICAgICAkKCcjcHJvZHVjdC1jcmVhdGUtZm9ybSwgI3Byb2R1Y3QtZWRpdC1mb3JtJykub24oJ3N1Ym1pdCcsIHRoaXMuc3VibWl0KTtcbiAgICB9XG5cbiAgICBtYW5hZ2VyU3RvY2soKSB7XG4gICAgICAgICQoJyNtYW5hZ2Vfc3RvY2snKS5vbignY2hhbmdlJywgKGUpID0+IHtcbiAgICAgICAgICAgIGlmIChlLmN1cnJlbnRUYXJnZXQudmFsdWUgPT09ICcxJykge1xuICAgICAgICAgICAgICAgICQoJyNxdHktZmllbGQnKS5yZW1vdmVDbGFzcygnaGlkZScpO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAkKCcjcXR5LWZpZWxkJykuYWRkQ2xhc3MoJ2hpZGUnKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgc3VibWl0KGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgICAgIERhdGFUYWJsZS5yZW1vdmVMZW5ndGhGaWVsZHMoKTtcblxuICAgICAgICB3aW5kb3cuZm9ybS5hcHBlbmRIaWRkZW5JbnB1dHMoJyNwcm9kdWN0LWNyZWF0ZS1mb3JtLCAjcHJvZHVjdC1lZGl0LWZvcm0nLCAndXBfc2VsbHMnLCBEYXRhVGFibGUuZ2V0U2VsZWN0ZWRJZHMoJyN1cF9zZWxscyAudGFibGUnKSk7XG4gICAgICAgIHdpbmRvdy5mb3JtLmFwcGVuZEhpZGRlbklucHV0cygnI3Byb2R1Y3QtY3JlYXRlLWZvcm0sICNwcm9kdWN0LWVkaXQtZm9ybScsICdjcm9zc19zZWxscycsIERhdGFUYWJsZS5nZXRTZWxlY3RlZElkcygnI2Nyb3NzX3NlbGxzIC50YWJsZScpKTtcbiAgICAgICAgd2luZG93LmZvcm0uYXBwZW5kSGlkZGVuSW5wdXRzKCcjcHJvZHVjdC1jcmVhdGUtZm9ybSwgI3Byb2R1Y3QtZWRpdC1mb3JtJywgJ3JlbGF0ZWRfcHJvZHVjdHMnLCBEYXRhVGFibGUuZ2V0U2VsZWN0ZWRJZHMoJyNyZWxhdGVkX3Byb2R1Y3RzIC50YWJsZScpKTtcblxuICAgICAgICBlLmN1cnJlbnRUYXJnZXQuc3VibWl0KCk7XG4gICAgfVxufVxuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./Modules/Product/Resources/assets/admin/js/ProductForm.js\n");

/***/ }),

/***/ "./Modules/Product/Resources/assets/admin/js/main.js":
/*!***********************************************************!*\
  !*** ./Modules/Product/Resources/assets/admin/js/main.js ***!
  \***********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _Downloads__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Downloads */ \"./Modules/Product/Resources/assets/admin/js/Downloads.js\");\n/* harmony import */ var _ProductForm__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductForm */ \"./Modules/Product/Resources/assets/admin/js/ProductForm.js\");\n\n\nnew _ProductForm__WEBPACK_IMPORTED_MODULE_1__[\"default\"]();\nnew _Downloads__WEBPACK_IMPORTED_MODULE_0__[\"default\"]();//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9Nb2R1bGVzL1Byb2R1Y3QvUmVzb3VyY2VzL2Fzc2V0cy9hZG1pbi9qcy9tYWluLmpzP2UwN2UiXSwibmFtZXMiOlsiUHJvZHVjdEZvcm0iLCJEb3dubG9hZHMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQ0E7QUFFQSxJQUFJQSxvREFBSjtBQUNBLElBQUlDLGtEQUFKIiwiZmlsZSI6Ii4vTW9kdWxlcy9Qcm9kdWN0L1Jlc291cmNlcy9hc3NldHMvYWRtaW4vanMvbWFpbi5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBEb3dubG9hZHMgZnJvbSAnLi9Eb3dubG9hZHMnO1xuaW1wb3J0IFByb2R1Y3RGb3JtIGZyb20gJy4vUHJvZHVjdEZvcm0nO1xuXG5uZXcgUHJvZHVjdEZvcm0oKTtcbm5ldyBEb3dubG9hZHMoKTtcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./Modules/Product/Resources/assets/admin/js/main.js\n");

/***/ }),

/***/ 13:
/*!*****************************************************************!*\
  !*** multi ./Modules/Product/Resources/assets/admin/js/main.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/Amp/Modules/Product/Resources/assets/admin/js/main.js */"./Modules/Product/Resources/assets/admin/js/main.js");


/***/ })

/******/ });