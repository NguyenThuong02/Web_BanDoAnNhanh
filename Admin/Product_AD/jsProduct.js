function selectChekboxAll() {
    var checkbox = document.querySelectorAll(".show__list__content input[type=checkbox]");
    checkbox.forEach((item, index) => {

        item.checked = "checked";
    })
    return false;
}

function closeChekboxAll() {
    var checkbox = document.querySelectorAll(".show__list__content input[type=checkbox]");
    checkbox.forEach((item, index) => {
        item.checked = "";
    })
    return false;
}

function reInput() {
    var resetInp = document.querySelectorAll(".form__group .valInp");
    resetInp.forEach((item, index) => {
        item.value = "";
    })
    var resetSelect = document.querySelectorAll(".category__product select");
    resetSelect.forEach((item, index) => {
        item.value = "";
    })
    document.querySelector('.nicEdit-main').innerText = "";
    return false;
}

function showListproduct() {
    document.getElementById('form__input__product').style.display = "none";
    document.querySelector('.inp__product').style.backgroundColor = "var(--bg-color)"
    document.querySelector('.title_product_list').style.display = "block";
    document.getElementById('form__show__list').style.display = "block";
    return false;

}
// xác nhận xóa sản phẩm
function confirmDelete() {
    if (confirm("Thao tác này sẽ làm cho các dữ liệu liên quan tới sản phẩm này mất đi mà không thể khôi phục lại. Bạn có chắc chắn muốn xóa nó đi không ?")) {
        return true;
    } else {
        return false;
    }
}