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

    //セレクトボックスに値があるかどうかで、テキスト入力フォーム表示の切り替えを行う
    if (selectElement.value !== "") {
        textInput.type = 'hidden';
        message.style.display = 'none';
        //テキスト入力フォームにdisable属性を設定
        textInput.setAttribute('disabled', 'true');
    } else {
        textInput.type = 'text';
        message.style.display = 'inline';
        //テキスト入力フォームのdisable属性を解除
        textInput.removeAttribute('disabled');
    }
}

window.disableTextInput = disableTextInput;


//編集ボタンを押したときの処理
export function editBusinessCard(url) {
    location.href = url;
}

window.editBusinessCard = editBusinessCard;

//削除ボタンを押した時の処理
export function deleteBusinessCard(event, url) {
    //会社名の取得
    let corpName = event.target.getAttribute('data-corp-name');
    //名刺のIDの取得
    let businessCardId = event.target.getAttribute('data-business-card-id');

    if (confirm('会社名 『' + corpName + '』の名刺番号 『' + businessCardId + '』を削除してもよろしいですか？')) {
        location.href = url;
    }
}

window.deleteBusinessCard = deleteBusinessCard;
