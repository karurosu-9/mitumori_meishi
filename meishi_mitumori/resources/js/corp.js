//index、show用のedit、deleteボタンのclickアクションのjsコード
export function editCorp(url) {
    location.href = url;
}

window.editCorp = editCorp;

export function deleteCorp(event, url) {
    //会社名の値の取得
    let corpName = event.target.getAttribute('data-corp-name');
    if (confirm('会社名『 ' + corpName + ' 』を本当に削除してよろしいですか？')) {
        location.href = url;
    }
}

window.deleteCorp = deleteCorp;


//addビュー用のフォーム入力時のjsコード
export function addCheckMessage() {
    //未記入の項目があった場合、その項目名を入れる変数
    let emptyFields = []

    let corpNameElement = document.getElementById('corp_name');
    let corpName = corpNameElement ? corpNameElement.value : '';
    if (corpName === '') {
        emptyFields.push('会社名');
    }

    let postalCodeElement = document.getElementById('postal_code');
    let postalCode = postalCodeElement ? postalCodeElement.value : '';
    if (postalCode === '') {
        emptyFields.push('郵便番号');
    }

    let addressElement = document.getElementById('address');
    let address = addressElement ? addressElement.value : '';
    if (address === '') {
        emptyFields.push('住所');
    }

    let telElement = document.getElementById('tel');
    let tel = telElement ? telElement.value : '';
    if (tel === '') {
        emptyFields.push('電話番号');
    }

    //未記入の項目のあった時の処理
    if (emptyFields.length > 0) {
        let emptyFieldsString = emptyFields.join(',');
        alert('未記入の欄があります。:' + emptyFieldsString);
        return false;
    }

    let msg = confirm('この内容で登録してもよろしいですか？');
    return msg;
}

window.addCheckMessage = addCheckMessage;


//business_cards_list用のselect-box、table表示のjsコード
let selectElement = document.getElementById('select-division');

    //セレクトボックスの値が変更された時に呼び出される関数
    selectElement.addEventListener('change', function() {
        let selectedDivision = this.value;

        //部署ごとに表示する名刺データの処理をする関数
        displayBusinessCards(selectedDivision);
    })

    function displayBusinessCards(selectedDivision) {
        //全ての<tr>の要素を取得
        let tableRows = document.querySelectorAll('#business-cards-table tr');

        //最初の<tr>行は<th>の値になるだけなので、取得しない。それ以降の<tr>行をデータがあるだけ取得
        for (let i = 1; i < tableRows.length; i++) {
            /*変数rowには
                <tr>
                    <td>～</td>から
                    <td>～</td>までを1行とする値を行ごとにrowに格納
                </tr>
            */
            let row = tableRows[i];
            //1行の3番目の<td>の値({{ $card->division }})を取得
            let division = row.cells[2].textContent;

            if (selectedDivision === '') {
                row.style.display = 'table-row';
            } else if (division === selectedDivision) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        }
    }

    window.displayBusinessCards = displayBusinessCards;
