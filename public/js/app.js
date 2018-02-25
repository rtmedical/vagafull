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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__utils_calculations__ = __webpack_require__(2);


$(function () {
  $(".button-collapse").sideNav();

  if (document.getElementById("60co_input-1")) {
    Object(__WEBPACK_IMPORTED_MODULE_0__utils_calculations__["a" /* calculateAllOutputs */])();
    var form = document.querySelector("form");
    form.addEventListener("blur", __WEBPACK_IMPORTED_MODULE_0__utils_calculations__["b" /* calculateOnBlur */], true);
    // prevent onSubmit on Enter
    form.addEventListener("keypress", function (e) {
      if (e.key === "Enter" || e.keyCode === 13) {
        if (e.target.type !== "submit") {
          e.preventDefault();
          e.stopPropagation();
        }
      }
    }, true);
  }
});

/***/ }),
/* 2 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return calculateAllOutputs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return calculateOnBlur; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__formattedDate__ = __webpack_require__(8);


// PS: pego do arquivo: 'app/Http/Models/IndiceTPR2010' e
//     'app/Http/Models/IndiceR50'
var MVs = ["4", "6", "10", "15"];
var MeVs = ["6", "9", "12", "16"];

var calculateSectionA = function calculateSectionA(mv) {
  var d20d10 = +document.getElementById(mv + "mv_d20-d10").value;
  var input1 = +document.getElementById(mv + "mv_input-1").value;
  var input2 = +document.getElementById(mv + "mv_input-2").value;
  var input3 = +document.getElementById(mv + "mv_input-3").value;
  var input4 = +document.getElementById(mv + "mv_input-4").value;

  var tpr2010 = document.getElementById(mv + "mv_tpr_20-10");
  var output1 = document.getElementById(mv + "mv_output-1");
  var output2 = document.getElementById(mv + "mv_output-2");
  var result = document.getElementById(mv + "mv_result");

  var tmp = 1.2661 * d20d10 - 0.0595;
  tpr2010.value = tmp;
  output1.value = tmp;

  tmp = (tmp - input2) / (input1 - input2) * (input3 - input4) + input4;
  output2.value = tmp;
  result.value = tmp;
};

var calculateSectionB = function calculateSectionB(mev) {
  var r50 = +document.getElementById(mev + "mev_r50").value;
  var input1 = +document.getElementById(mev + "mev_input-1").value;
  var input2 = +document.getElementById(mev + "mev_input-2").value;
  var input3 = +document.getElementById(mev + "mev_input-3").value;
  var input4 = +document.getElementById(mev + "mev_input-4").value;

  var output1 = document.getElementById(mev + "mev_output-1");
  var output2 = document.getElementById(mev + "mev_output-2");
  var result = document.getElementById(mev + "mev_result");

  output1.value = r50;

  var tmp = (r50 - input2) / (input1 - input2) * (input3 - input4) + input4;
  output2.value = tmp;
  result.value = tmp;
};

var calculateSectionC = function calculateSectionC() {
  var inputs = {
    mmHg: +document.getElementById("input-mmHg").value,
    mbar: +document.getElementById("input-mbar").value
  };
  var outputs = {
    mbar: document.getElementById("output-mbar"),
    mmHg: document.getElementById("output-mmHg")
  };

  outputs.mbar.value = inputs.mmHg * 1.333224;
  outputs.mmHg.value = inputs.mbar / 1.333224;
};

var calculateSectionD = function calculateSectionD() {
  var input1 = document.getElementById("60co_input-1").value;
  var input2 = +document.getElementById("60co_input-2").value;
  var input3 = document.getElementById("60co_input-3").value;

  var output1 = document.getElementById("60co_output-1");
  var output2 = document.getElementById("60co_output-2");
  var output3 = document.getElementById("60co_output-3");

  input1 = !input1 ? 0 : new Date(input1).getTime();
  input3 = !input3 ? 0 : new Date(input3).getTime();

  var tmp = (input3 - input1) / 1000 / 60 / 60 / 24;
  output1.value = input2 * Math.exp(-Math.log(2) * tmp / 1925.2);

  output2.value = Object(__WEBPACK_IMPORTED_MODULE_0__formattedDate__["a" /* default */])();

  var output2Value = new Date(output2.value).getTime();
  tmp = (output2Value - input1) / 1000 / 60 / 60 / 24;
  output3.value = input2 * Math.exp(-Math.log(2) * tmp / 1925.2);
};

var calculateAllOutputs = function calculateAllOutputs() {
  MVs.forEach(function (mv) {
    calculateSectionA(mv);
  });
  MeVs.forEach(function (mev) {
    calculateSectionB(mev);
  });
  calculateSectionC();
  calculateSectionD();
};

var timeoutId = void 0;
var calculateOnBlur = function calculateOnBlur(e) {
  var target = e.target,
      path = e.path;

  var targetId = target.id;
  // path = [input, ..., section-X, ..., html, document, window];
  var sectionId = path[path.length - 9].id;

  if (timeoutId) clearTimeout(timeoutId);

  timeoutId = setTimeout(function () {
    switch (sectionId) {
      case "section-a":
        calculateSectionA(targetId.substr(0, targetId.indexOf("mv_")));
        break;
      case "section-b":
        calculateSectionB(targetId.substr(0, targetId.indexOf("mev_")));
        break;
      case "section-c":
        calculateSectionC();
        break;
      case "section-d":
        calculateSectionD();
        break;
      default:
        break;
    }
  }, 500);
};

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 4 */,
/* 5 */,
/* 6 */,
/* 7 */,
/* 8 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var formattedDate = function formattedDate() {
  var d = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : new Date();

  var month = String(d.getMonth() + 1);
  var day = String(d.getDate());
  var year = String(d.getFullYear());

  if (month.length < 2) month = "0" + month;
  if (day.length < 2) day = "0" + day;

  return year + "-" + month + "-" + day;
};

/* harmony default export */ __webpack_exports__["a"] = (formattedDate);

/***/ })
/******/ ]);