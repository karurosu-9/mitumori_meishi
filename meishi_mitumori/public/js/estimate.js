/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/estimate.js ***!
  \**********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   subTotal: () => (/* binding */ subTotal)
/* harmony export */ });
function subTotal() {
  for (var i = 1; i <= FORM_NOT_HOSOKU; i++) {
    var unit_price = document.getElementById('unit_price_' + i).value;
    var quantity = document.getElementById('quantity_' + i).value;
    //amountはvalueの値は取得せず、要素のみを取得
    var amountElement = document.getElementById('amount_' + i);
    if (unit_price !== '' && quantity !== '') {
      //quantityが数字であれば単価＊数量の値をamountElementに格納
      if (isFinite(quantity)) {
        var addAmount = unit_price * quantity;
        console.log(addAmount);
        amountElement.value = addAmount;
        //quantityが文字列であれば単価の値をamountElementに格納
      } else {
        amountElement.value = unit_price;
      }
    } else {
      amountElement.value = '';
    }
  }
}
window.subTotal = subTotal;
/******/ })()
;