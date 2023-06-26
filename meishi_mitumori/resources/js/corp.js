//addビュー用のjsコード
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

//show用のjsコード
export function confirmDelete()
{
    if (confirm(`『名刺No. <?php echo $corp->id?> 』の名刺データを削除してもよろしいですか？`)) {
        location.href = "{{ route('corp.delete'), ['corp' => $corp] }}";
    }
}

window.confirmDelete = confirmDelete;
