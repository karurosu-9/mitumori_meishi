//addビュー用のjsコード
export function addCheckMessage() {

    let emptyFields = []

    let corpNameElement = document.getElementsByName('corp_name')[0];
    let corpName = corpNameElement.length > 0 ? corpNameElement.value : '';
    if (corpName === '') {
        emptyFields.push('会社名');
    }

    let postalCodeElement = document.getElementsByName('postal_code')[0];
    let postalCode = postalCodeElement.length > 0 ? postalCodeElement.value : '';
    if (postalCode === '') {
        emptyFields.push('郵便番号');
    }

    let addressElement = document.getElementsByName('address')[0];
    let address = addressElement.length > 0 ? addressElement.value : '';
    if (address === '') {
        emptyFields.push('住所');
    }

    let telElement = document.getElementsByName('tel')[0];
    let tel = telElement.length > 0 ? telElement.value : '';
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
