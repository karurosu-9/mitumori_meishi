/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/corp.js":
/*!******************************!*\
  !*** ./resources/js/corp.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   deleteCorp: () => (/* binding */ deleteCorp),
/* harmony export */   editCorp: () => (/* binding */ editCorp),
/* harmony export */   formCheckMessage: () => (/* binding */ formCheckMessage)
/* harmony export */ });
//index、show用のedit、deleteボタンのclickアクションのjsコード
function editCorp(url) {
  location.href = url;
}
window.editCorp = editCorp;
function deleteCorp(event, url) {
  //会社名の値の取得
  var corpName = event.target.getAttribute("data-corp-name");
  if (confirm("会社名『 " + corpName + " 』を本当に削除してよろしいですか？")) {
    location.href = url;
  }
}
window.deleteCorp = deleteCorp;

//add, editビュー用のフォーム入力時のjsコード
function formCheckMessage() {
  //未記入の項目があった場合、その項目名を入れる変数
  var emptyFields = [];
  var corpNameElement = document.getElementById("corp-name");
  var corpName = corpNameElement ? corpNameElement.value : "";
  if (corpName === "") {
    emptyFields.push("会社名");
  }
  var postalCodeElement = document.getElementById("postal-code");
  var postalCode = postalCodeElement ? postalCodeElement.value : "";
  if (postalCode === "") {
    emptyFields.push("郵便番号");
  }
  var addressElement = document.getElementById("address");
  var address = addressElement ? addressElement.value : "";
  if (address === "") {
    emptyFields.push("住所");
  }
  var telElement = document.getElementById("tel");
  var tel = telElement ? telElement.value : "";
  if (tel === "") {
    emptyFields.push("電話番号");
  }

  //未記入の項目のあった時の処理
  if (emptyFields.length > 0) {
    var emptyFieldsString = emptyFields.join(",");
    alert("未記入の欄があります。:" + emptyFieldsString);
    return false;
  }
  var msg = confirm("この内容で登録してもよろしいですか？");
  return msg;
}
window.checkMessage = checkMessage;

//business-cards-list用のselect-box、table表示のjsコード
var selectElement = document.getElementById("select-division");

//セレクトボックスの値が変更された時に呼び出される関数
selectElement.addEventListener("change", function () {
  var selectedDivision = this.value;

  //部署ごとに表示する名刺データの処理をする関数
  displayBusinessCards(selectedDivision);
});

//セレクトボックスの値を取得して絞り込み検索をする関数
function displayBusinessCards(selectedDivision) {
  var tableRows = document.querySelectorAll('#business-cards-table tr');
  var noDataMessage = document.querySelector('.no-data-message');
  var dataRowCount = 0; // データ行の数をカウントする変数

  for (var i = 1; i < tableRows.length; i++) {
    var row = tableRows[i];
    var division = row.cells[2].textContent;
    if (selectedDivision === '') {
      row.style.display = 'table-row';
      dataRowCount++;
    } else if (division === selectedDivision) {
      row.style.display = 'table-row';
      dataRowCount++;
    } else {
      row.style.display = 'none';
    }
  }
  if (noDataMessage) {
    if (dataRowCount === 0) {
      noDataMessage.style.display = 'block'; // 表示する
    } else {
      noDataMessage.style.display = 'none'; // 非表示にする
    }
  }
}

// 初期表示時に実行する
displayBusinessCards('');
window.displayBusinessCards = displayBusinessCards;

/***/ }),

/***/ "./resources/css/pages/layout.css":
/*!****************************************!*\
  !*** ./resources/css/pages/layout.css ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/corp": 0,
/******/ 			"css/pages/layout": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/pages/layout"], () => (__webpack_require__("./resources/js/corp.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/pages/layout"], () => (__webpack_require__("./resources/css/pages/layout.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;