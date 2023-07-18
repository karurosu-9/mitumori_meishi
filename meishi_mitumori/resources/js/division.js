//登録、編集時の記入漏れをチェックするメソッド
export function checkMessage() {
    let emptyFields = [];

    let selectCorpNameElement = document.getElementById('select-corp-list');

    let selectCorpName = selectCorpNameElement ? selectCorpNameElement.value : '';

    if (selectCorpName === '') {
        emptyFields.push('会社名');
    }

    let divisionNameElement = document.getElementById('division-name');

    let divisionName = divisionNameElement ? divisionNameElement.value : '';

    if (divisionName === '') {
        emptyFields.push('部署名');
    }

    //未記入の箇所がある場合の処理
    if (emptyFields > 0) {
        let emptyFieldsString = emptyFields.join(',');
        alert('未記入の欄があります。:' + emptyFieldsString);
        return false;
    }

    let msg = confirm('この内容で登録してもよろしいですか？');
    return msg;
}

window.checkMessage = checkMessage;
