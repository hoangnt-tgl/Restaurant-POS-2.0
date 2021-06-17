var confirmOrderModal = document.querySelector('.confirm-order-modal');

// Open Confirm Order Modal
function openConfirmOrderModal() {
    confirmOrderModal.style.display = 'inline';
}

// Close Confirm Order Modal
function closeConfirmOrderModal() {
    confirmOrderModal.style.display = 'none';
}

// Increase Food Number
function increasenumber() {
    var foodNumber = document.getElementById('number').innerHTML;
    foodNumber = Number(foodNumber) + 1;
    document.getElementById('number').innerHTML = foodNumber;
    if (Number(foodNumber) > 0) {
        document.getElementById('minus').style.color = 'black';
    }
}

// Increase Food Number
function decreasenumber() {
    var foodNumber = document.getElementById('number').innerHTML;
    if (Number(foodNumber) >= 1) foodNumber = Number(foodNumber) - 1;
    document.getElementById('number').innerHTML = foodNumber;
    if (Number(foodNumber) == 0) {
        document.getElementById('minus').style.color = '#cac6c6';
    }
}