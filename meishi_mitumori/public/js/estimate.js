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
/* harmony export */   confirmRegisterData: () => (/* binding */ confirmRegisterData),
/* harmony export */   deleteEstimate: () => (/* binding */ deleteEstimate),
/* harmony export */   editEstimate: () => (/* binding */ editEstimate),
/* harmony export */   subTotal: () => (/* binding */ subTotal)
/* harmony export */ });
function subTotal() {
  var totalPrice = 0;
  var totalPriceElement = document.getElementById('total-price');
  for (var i = 1; i <= FORM_NOT_HOSOKU; i++) {
    var unitPrice = document.getElementById('unit-price-' + i).value;
    var quantity = document.getElementById('quantity-' + i).value;
    //amountはvalueの値は取得せず、要素のみを取得
    var amountElement = document.getElementById('amount-' + i);
    if (unitPrice !== '' && quantity !== '') {
      //quantityが数字であれば単価＊数量の値をamountElementに格納
      if (isFinite(quantity)) {
        var addAmount = unitPrice * quantity;
        amountElement.value = addAmount;
        //quantityが文字列であれば単価の値をamountElementに格納
      } else {
        amountElement.value = unitPrice;
      }
    } else {
      amountElement.value = 0;
    }
    if (parseInt(amountElement.value) === 0) {
      amountElement.setAttribute('type', 'hidden');
    } else {
      amountElement.setAttribute('type', 'text');
    }
    totalPrice += parseInt(amountElement.value);
  }
  totalPriceElement.value = totalPrice;
}
window.subTotal = subTotal;
function confirmRegisterData(url) {
  if (confirm('この内容で登録してもよろしいですか？')) {
    location.href = url;
  }
}
window.confirmRegisterData = confirmRegisterData;
function editEstimate(url) {
  location.href = url;
}
window.editEstimate = editEstimate;
function deleteEstimate(event, url) {
  var corpName = event.target.getAttribute('data-corp-name');
  if (confirm('会社名『' + corpName + '』の見積書を削除してもよろしいですか？')) {
    location.href = url;
  }
}
window.deleteEstimate = deleteEstimate;
/******/ })()
;