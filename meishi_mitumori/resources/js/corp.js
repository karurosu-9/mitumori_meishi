//addビュー用のjsコード
export function addCheckMessage() {

    let emptyFields = []

    let corpNameElement = document.getElementsById('corp_name');
    let corpName = corpNameElement ? corpNameElement.value : '';
    if (corpName === '') {
        emptyFields.push('会社名');
    }

    let postalCodeElement = document.getElementsById('postal_code');
    let postalCode = postalCodeElement ? postalCodeElement.value : '';
    if (postalCode === '') {
        emptyFields.push('郵便番号');
    }

    let addressElement = document.getElementsById('address');
    let address = addressElement ? addressElement.value : '';
    if (address === '') {
        emptyFields.push('住所');
    }

    let telElement = document.getElementsById('tel');
    let tel = telElement ? telElement.value : '';
    if (tel === '') {
        emptyFields.push('電話番号');
    }

    if (emptyFields.length > 0) {
        let emptyFieldsString = emptyFields.join(',');
        alert('未記入の欄があります。:' + emptyFieldsString);
        return false;
    }

    let msg = confirm('この内容で登録してもよろしいですか？');
    return msg;
}

window.addCheckMessage = addCheckMessage;
