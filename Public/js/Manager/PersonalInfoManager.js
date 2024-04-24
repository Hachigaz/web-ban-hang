// // Khởi tạo đối tượng jsPDF
// var doc = new window.jspdf.jsPDF();

// // Thêm nội dung
// doc.text('Hello world!', 10, 10);

// // Lưu file PDF
// doc.save('sample.pdf');
const changePasswordBtn = document.querySelector(".change-password");
// changePasswordBtn.addEventListener("click", function () {
//     console.log("ok");
// });
fetch(
    "../InternalManager/GetAllDataPersonalInfoStaff/" +
        sessionStorage.getItem("account_id")
)
    .then((response) => response.json())
    .then((values) => {
        console.log(values.personalInfoStaff[0].staff_fullname);
    })
    .catch((error) => console.log("Error: ", error));

const modal = document.querySelector(".modal");
const closeIconAdd = document.querySelector("#closeIconAdd");

const modalInnerAdd = document.querySelector(".modal-inner.modal-add");

const contentModalAdd = document.querySelector(".content-add");
const deleteA = document.querySelector(".modal-footer a");

const btnAdd = document.querySelector(".add-btn");
changePasswordBtn.addEventListener("click", showModalAdd);
function hideModalAdd() {
    modal.classList.add("hide");
    modalInnerAdd.classList.add("hide");
    refreshAddForm();
}
function showModalAdd() {
    modal.classList.remove("hide");
    modalInnerAdd.classList.remove("hide");
}
function hideModal() {
    modal.classList.add("hide");
    modalInnerAdd.classList.add("hide");
    refreshAddForm();
}

closeIconAdd.addEventListener("click", hideModalAdd);
modal.addEventListener("click", hideModal);
modalInnerAdd.addEventListener("click", function (event) {
    event.stopPropagation();
});

const confirmAddBtn = document.getElementById("confirmBtnAdd");
const formAdd = document.querySelector(".modal-add .modal-body");
const refreshAddBtn = document.querySelector(".modal-add .reset-btn");

/* refresh edit-form */
const addressAddForm = document.querySelector(".address-add-form");
function refreshAddForm() {
    supplierNameAddForm.value = "";
    phoneNumberAddForm.value = "";
    emailAddForm.value = "";
    addressAddForm.value = "";
    emailAddForm.style.backgroundColor = "#ddd";
    phoneNumberAddForm.style.backgroundColor = "#ddd";
}
refreshAddBtn.addEventListener("click", refreshAddForm);
var isSupplierNameAddValid = true;
var isAddressAddValid = true;
var isPhoneNumberAddValid = true;
var isEmailAddValid = true;

const supplierNameAddForm = document.querySelector(".supplier_name_add_form");
const addSupplierNameWarning = document.querySelector(
    ".add-supplier-name-warning"
);
supplierNameAddForm.addEventListener("keyup", function (e) {
    var value = e.target.value;
    const regex =
        /^[0-9a-zA-Z áàảãạÁÀẢÃẠăắằặẳẵĂẮẰẲẴẶâấầẩẫậÂẤẦẨẪẬéèẻẽẹÉÈẺẼẸêếềểễệÊẾỂỄỆíìỉĩịÍÌỈĨỊúùủũụÚÙỦŨỤưứừửữựƯỨỪỬỮỰóòỏõọÓÒỎÕỌôốồổỗộÔỐỒỔỖỘơớờởỡợƠỚỜỞỠỢđĐýỳỷỹỵÝỲỶỸỴ]*$/; // chỉ cho phép chữ cái và khoảng trắng
    if (!regex.test(value)) {
        addSupplierNameWarning.style.opacity = "1";
        isSupplierNameAddValid = false;
    } else {
        addSupplierNameWarning.style.opacity = "0";
        isSupplierNameAddValid = true;
    }
    confirmAddBtn.disabled = !(
        isPhoneNumberAddValid &&
        isEmailAddValid &&
        isSupplierNameAddValid &&
        isAddressAddValid
    );
});

const phoneNumberAddForm = document.querySelector(".phone-number-add-form");
const addPhoneNumberWarning = document.querySelector(
    ".add-phone-number-warning"
);
phoneNumberAddForm.addEventListener("keyup", function () {
    var phone_number = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Supplier/GetSupplierByPhoneNumber", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status == 200) {
            var response = this.responseText;
            response = response.trim();
            if (response == "Số điện thoại đã tồn tại") {
                addPhoneNumberWarning.textContent = "Số điện thoại đã tồn tại";
                addPhoneNumberWarning.style.opacity = "1";
                isPhoneNumberAddValid = false;
            } else {
                const regex = /^0\d{9}$/;
                if (!regex.test(phone_number)) {
                    addPhoneNumberWarning.style.opacity = "1";
                    addPhoneNumberWarning.textContent =
                        "Phải đủ 10 số và bắt đầu là 0";
                    isPhoneNumberAddValid = false;
                } else {
                    addPhoneNumberWarning.style.opacity = "0";
                    isPhoneNumberAddValid = true;
                }
            }
        }
        confirmAddBtn.disabled = !(
            isPhoneNumberAddValid &&
            isEmailAddValid &&
            isSupplierNameAddValid &&
            isAddressAddValid
        );
    };
    xhr.send("phone_number=" + phone_number);
});
const emailAddForm = document.querySelector(".email-add-form");
const addEmailWarning = document.querySelector(".add-email-warning");
emailAddForm.addEventListener("keyup", function () {
    var email = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Supplier/GetSupplierByEmail", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status == 200) {
            var response = this.responseText;
            response = response.trim();
            if (response == "Email đã tồn tại") {
                addEmailWarning.textContent = "Email đã tồn tại";
                addEmailWarning.style.opacity = "1";
                isEmailAddValid = false;
            } else {
                const checkEmail =
                    /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!checkEmail.test(email)) {
                    addEmailWarning.style.opacity = "1";
                    addEmailWarning.textContent = "Email không đúng định dạng";
                    isEmailAddValid = false;
                } else {
                    addEmailWarning.style.opacity = "0";
                    isEmailAddValid = true;
                }
            }
        }
        confirmAddBtn.disabled = !(
            isPhoneNumberAddValid &&
            isEmailAddValid &&
            isSupplierNameAddValid &&
            isAddressAddValid
        );
    };
    xhr.send("email=" + email);
});
