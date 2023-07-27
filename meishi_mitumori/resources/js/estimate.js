export function subTotal() {
    for (let i = 1; i <= FORM_NOT_HOSOKU; i++) {
        let unit_price = document.getElementById('unit_price_' + i).value;
        let quantity = document.getElementById('quantity_' + i).value;
        //amountはvalueの値は取得せず、要素のみを取得
        let amountElement = document.getElementById('amount_' + i);

        if (unit_price !== '' && quantity !== '') {
            //quantityが数字であれば単価＊数量の値をamountElementに格納
            if (isFinite(quantity)) {
                let addAmount = unit_price * quantity;
                console.log(addAmount);
                amountElement.value = addAmount;
                //quantityが文字列であれば単価の値をamountElementに格納
            } else {
                amountElement.value = unit_price;
            }
        } else {
            amountElement.value = '';
        }
    }
}

window.subTotal = subTotal;