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
/*!***************************************!*\
  !*** ./resources/js/business-card.js ***!
  \***************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   deleteBusinessCard: () => (/* binding */ deleteBusinessCard),
/* harmony export */   disableTextInput: () => (/* binding */ disableTextInput),
/* harmony export */   editBusinessCard: () => (/* binding */ editBusinessCard),
/* harmony export */   formCheckMessage: () => (/* binding */ formCheckMessage)
/* harmony export */ });
//登録、編集フォームの記入漏れをチェックするメソッド
function formCheckMessage() {
  var emptyFields = [];

  //セレクトボックスの値の確認
  var divisionElement = document.getElementById('division');
  var division = divisionElement ? divisionElement.value : '';

  //テキスト入力欄の値の確認
  var divisionTextInputElement = document.getElementById('divisionTextInput');
  var divisionTextInput = divisionTextInputElement ? divisionTextInputElement.value : '';
  if (division === '' && divisionTextInput === '') {
    emptyFields.push('所属部署');
  }
  var employeeNameElement = document.getElementById('employee-name');
  var employeeName = employeeNameElement ? employeeNameElement.value : '';
  if (employeeName === '') {
    emptyFields.push('名前');
  }
  var mobilePhoneElement = document.getElementById('mobile-phone');
  var mobilePhone = mobilePhoneElement ? mobilePhoneElement.value : '';
  if (mobilePhone === '') {
    emptyFields.push('携帯番号');
  }
  if (emptyFields.length > 0) {
    var emptyFieldsString = emptyFields.join(",");
    alert('未記入の欄があります。:' + emptyFieldsString);
    return false;
  }
  var msg = confirm('この内容で登録してもよろしいですか？');
  return msg;
}
window.formCheckMessage = formCheckMessage;

//登録、編集フォームでセレクトボックスで部署が選択された場合に入力フォーマットは消える処理
function disableTextInput(selectElement) {
  var textInput = document.getElementById('divisionTextInput');
  var message = document.getElementById('divisionMessage');

  //セレクトボックスに値があるかどうかで、テキスト入力フォーム表示の切り替えを行う
  if (selectElement.value !== "") {
    textInput.type = 'hidden';
    message.style.display = 'none';
    //テキスト入力フォームにdisable属性を設定
    textInput.setAttribute('disabled');
  } else {
    textInput.type = 'text';
    message.style.display = 'inline';
    //テキスト入力フォームのdisable属性を解除
    textInput.removeAttribute('disabled');
  }
}
window.disableTextInput = disableTextInput;

//編集ボタンを押したときの処理
function editBusinessCard(url) {
  location.href = url;
}
window.editBusinessCard = editBusinessCard;

//削除ボタンを押した時の処理
function deleteBusinessCard(event, url) {
  //会社名の取得
  var corpName = event.target.getAttribute('data-corp-name');
  //名刺のIDの取得
  var businessCardId = event.target.getAttribute('data-business-card-id');
  if (confirm('会社名 『' + corpName + '』の名刺番号 『' + businessCardId + '』を削除してもよろしいですか？')) {
    location.href = url;
  }
}
window.deleteBusinessCard = deleteBusinessCard;
/******/ })()
;