//登録、編集フォームの記入漏れをチェックするメソッド
export function formCheckMessage() {
    let emptyFields = [];

    //セレクトボックスの値の確認
    let divisionElement = document.getElementById('division');
    let division = divisionElement ? divisionElement.value : '';

    //テキスト入力欄の値の確認
    let divisionTextInputElement = document.getElementById('divisionTextInput');
    let divisionTextInput = divisionTextInputElement ? divisionTextInputElement.value : '';

    if (division === '' && divisionTextInput === '') {
        emptyFields.push('所属部署');
    }

    let employeeNameElement = document.getElementById('employee-name');
    let employeeName = employeeNameElement ? employeeNameElement.value : '';

    if (employeeName === '') {
        emptyFields.push('名前');
    }

    let mobilePhoneElement = document.getElementById('mobile-phone');
    let mobilePhone = mobilePhoneElement ? mobilePhoneElement.value : '';

    if (mobilePhone === '') {
        emptyFields.push('携帯番号')
    }

    if (emptyFields.length > 0) {
        let emptyFieldsString = emptyFields.join(",");
        alert('未記入の欄があります。:' + emptyFieldsString);
        return false;
    }

    let msg = confirm('この内容で登録してもよろしいですか？');

    return msg;
}

window.formCheckMessage = formCheckMessage;

//登録、編集フォームでセレクトボックスで部署が選択された場合に入力フォーマットは消える処理
export function disableTextInput(selectElement) {
    let textInput = document.getElementById('divisionTextInput');
    let message = document.getElementById('divisionMessage');

    textInput.type = selectElement.value !== '' ? 'hidden' : 'text';
    message.style.display = selectElement.value !== '' ? 'none' : 'inline';

}

window.disableTextInput = disableTextInput;
