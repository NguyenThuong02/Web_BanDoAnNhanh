function selectChekboxAll() {
    var checkbox = document.querySelectorAll(".show__list__content input[type=checkbox]");
    checkbox.forEach((item, index) => {
        item.checked = "checked";
    });
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
    var resetInp = document.querySelectorAll(".valInp");
    resetInp.forEach((item, index) => {
        item.value = "";
    })
}

function showListCategory() {
    document.getElementById('form__input__category').style.display = "none"
    document.getElementById('form__show__list').style.display = "block";
    return false;

}

function showAddCategory() {
    document.getElementById('form__input__category').style.display = "block"
    document.getElementById('form__show__list').style.display = "none";
    return false;
}

// xác nhận xóa sản phẩm
function confirmDelete() {
    if (confirm("Thao tác này sẽ làm cho các dữ liệu liên quan tới loại sản phẩm này mất đi mà không thể khôi phục lại. Bạn có chắc chắn muốn xóa nó đi không ?")) {
        return true;
    } else {
        return false;
    }
}