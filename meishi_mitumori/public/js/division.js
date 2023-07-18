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
  !*** ./resources/js/division.js ***!
  \**********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   checkMessage: () => (/* binding */ checkMessage)
/* harmony export */ });
//登録、編集時の記入漏れをチェックするメソッド
function checkMessage() {
  var emptyFields = [];
  var selectCorpNameElement = document.getElementById('select-corp-list');
  var selectCorpName = selectCorpNameElement ? selectCorpNameElement.value : '';
  if (selectCorpName === '') {
    emptyFields.push('会社名');
  }
  var divisionNameElement = document.getElementById('division-name');
  var divisionName = divisionNameElement ? divisionNameElement.value : '';
  if (divisionName === '') {
    emptyFields.push('部署名');
  }

  //未記入の箇所がある場合の処理
  if (emptyFields > 0) {
    var emptyFieldsString = emptyFields.join(',');
    alert('未記入の欄があります。:' + emptyFieldsString);
    return false;
  }
  var msg = confirm('この内容で登録してもよろしいですか？');
  return msg;
}
window.checkMessage = checkMessage;
/******/ })()
;