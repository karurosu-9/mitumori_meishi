export function subTotal() {
    let totalPrice = 0;
    let totalPriceElement = document.getElementById('total-price');
    for (let i = 1; i <= FORM_NOT_HOSOKU; i++) {
        let unitPrice = document.getElementById('unit-price-' + i).value;
        let quantity = document.getElementById('quantity-' + i).value;
        //amountはvalueの値は取得せず、要素のみを取得
        let amountElement = document.getElementById('amount-' + i);

        if (unitPrice !== '' && quantity !== '') {
            //quantityが数字であれば単価＊数量の値をamountElementに格納
            if (isFinite(quantity)) {
                let addAmount = unitPrice * quantity;
                amountElement.value = addAmount;
                //quantityが文字列であれば単価の値をamountElementに格納
            } else {
                amountElement.value = unitPrice;
            }
        } else {
            amountElement.value = 0;
        }

        if (parseInt(amountElement.value) === 0) {
            amountElement.setAttribute('type', 'hidden');
        } else {
            amountElement.setAttribute('type', 'text');
        }

        totalPrice += parseInt(amountElement.value);
    }

    totalPriceElement.value = totalPrice;

}

window.subTotal = subTotal;

export function confirmRegisterData(url) {
    if (confirm('この内容で登録してもよろしいですか？')) {
        location.href = url;
    }
}

window.confirmRegisterData = confirmRegisterData;
