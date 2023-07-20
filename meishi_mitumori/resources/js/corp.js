//index、show用のedit、deleteボタンのclickアクションのjsコード
export function editCorp(url) {
    location.href = url;
}

window.editCorp = editCorp;

export function deleteCorp(event, url) {
    //会社名の値の取得
    let corpName = event.target.getAttribute("data-corp-name");
    if (
        confirm("会社名『 " + corpName + " 』を本当に削除してよろしいですか？")
    ) {
        location.href = url;
    }
}

window.deleteCorp = deleteCorp;

//add, editビュー用のフォーム入力時のjsコード
export function formCheckMessage() {
    //未記入の項目があった場合、その項目名を入れる変数
    let emptyFields = [];

    let corpNameElement = document.getElementById("corp-name");
    let corpName = corpNameElement ? corpNameElement.value : "";
    if (corpName === "") {
        emptyFields.push("会社名");
    }

    let postalCodeElement = document.getElementById("postal-code");
    let postalCode = postalCodeElement ? postalCodeElement.value : "";
    if (postalCode === "") {
        emptyFields.push("郵便番号");
    }

    let addressElement = document.getElementById("address");
    let address = addressElement ? addressElement.value : "";
    if (address === "") {
        emptyFields.push("住所");
    }

    let telElement = document.getElementById("tel");
    let tel = telElement ? telElement.value : "";
    if (tel === "") {
        emptyFields.push("電話番号");
    }

    //未記入の項目のあった時の処理
    if (emptyFields.length > 0) {
        let emptyFieldsString = emptyFields.join(",");
        alert("未記入の欄があります。:" + emptyFieldsString);
        return false;
    }

    let msg = confirm("この内容で登録してもよろしいですか？");
    return msg;
}

window.formCheckMessage = formCheckMessage;

//business-cards-list用のselect-box、table表示のjsコード
let selectElement = document.getElementById("select-division");

//セレクトボックスの値が変更された時に呼び出される関数
selectElement.addEventListener("change", function () {
    let selectedDivision = selectElement.value;

    //部署ごとに表示する名刺データの処理をする関数
    displayBusinessCards(selectedDivision);
});

//セレクトボックスの値を取得して絞り込み検索をする関数
function displayBusinessCards(selectedDivision) {
    let tableRows = document.querySelectorAll('#business-cards-table tr');
    let noDataMessage = document.querySelector('.no-data-message');

    let dataRowCount = 0; // データ行の数をカウントする変数

    for (let i = 1; i < tableRows.length; i++) {
        let row = tableRows[i];
        let division = row.cells[2].textContent;

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
