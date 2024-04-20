var valueArr = {
    0: "Tổng số tài khoản"
};
var thTables = {
    0: "Mã tài khoản",
    1: "Số điện thoại",
    2: "Email",
    3: "Password"
};
const accountIdPost = document.querySelector(".modal-edit .modal-footer .account_id");
const customerIdPost = document.querySelector(".modal-edit .modal-footer .customer_id");

const cardBox = document.querySelector(".card-box");
const content = document.querySelector(".content-module");

const numbers = Array.from(document.querySelectorAll(".card .numbers"));
const cardNames = Array.from(document.querySelectorAll(".card .card-name"));
const tbody = document.querySelector(".details table tbody");
const userImage = document.querySelector(".topbar .user img");

var rowAccountId = document.querySelector(".row-data.row-account-id");
//var rowFullname = document.querySelector(".row-data.row-fullname");
var rowPhoneNumber = document.querySelector(".row-data.row-phone-number");
var rowEmail = document.querySelector(".row-data.row-email");
//var rowGender = document.querySelector(".row-data.row-gender");
//var rowAddress = document.querySelector(".row-data.row-address");
//var rowBirthDate = document.querySelector(".row-data.row-birth-date");
var rowPassword = document.querySelector(".row-data.row-password")
var avatarImage = document.querySelector(".modal-info .avatar-section .avatar-image");
fetch("../InternalManager/GetAllDataAccount")
    .then((response) => response.json())
    .then((values) => {
        var cardValues = Object.values(values.cardValue);
        numbers.forEach((number, i) => {
            number.textContent = cardValues[i]; // gán giá trị vào các thẻ
        });
        cardNames.forEach((name, i) => {
            name.textContent = valueArr[i]; // gán tên cho các thẻ
        });
        // Table
        values.infoAccount.forEach((account) => {
            var row = tbody.insertRow();

            var accountIdCell = row.insertCell();
            accountIdCell.textContent = account.account_id; // gán giá trị vào từng ô tương ứng cho bảng

            //var customerFullnameCell = row.insertCell();
            //customerFullnameCell.textContent = customer.customer_fullname;

            var accountPhoneNumberCell = row.insertCell();
            accountPhoneNumberCell.textContent = account.phone_number;

            var accountEmailCell = row.insertCell();
            accountEmailCell.textContent = account.email;

            var accountPasswordCell = row.insertCell();
            accountPasswordCell.textContent = account.password;
            //var customerGenderCell = row.insertCell();
            //if (customer.gender == 0) {
            //    customerGenderCell.textContent = "Nam";
            //} else {
            //    customerGenderCell.textContent = "Nữ";
            //}

           // var customerAddressCell = row.insertCell();
            //customerAddressCell.textContent = customer.address;

            //var customerBirthDateCell = row.insertCell();
            //var date = new Date(customer.date_of_birth);
            //var day = date.getDate();
            //var month = date.getMonth() + 1;
            //var year = date.getFullYear();
            //if (day < 10) day = "0" + day;
            //if (month < 10) month = "0" + month;
            //var formattedDate = day + "/" + month + "/" + year;
            //customerBirthDateCell.textContent = formattedDate; // format lại ngày

            var operation = row.insertCell();
            var btns = `<div class="btns">
            <button class="info" id="info-${account.account_id}" title="Xem thông tin"><i class="fi fi-rr-info"></i></button>
            `;
            btns += `<button class="edit" id="edit-${account.account_id}" title="Sửa thông tin"><i class="fi fi-rr-edit"></i></button>
            <button class="delete" id="delete-${account.account_id}" title="Xóa khách hàng"><i class="fi fi-rr-trash"></i></button></div>`;
            
            operation.insertAdjacentHTML("beforeend", btns);

            tbody.appendChild(row);
        });

        // // Gắn sự kiện click cho container cha (ví dụ: tbody)
        tbody.addEventListener("click", function (event) {
            var clickedElement = event.target;
            var deleteBtn = clickedElement.closest(".delete");
            var infoBtn = clickedElement.closest(".info");
            var editBtn = clickedElement.closest(".edit");
            if (deleteBtn) {
                var accountId = deleteBtn.id.split("-")[1];
                var accountEmail = "";
                var accountId = "";
                values.infoAccount.forEach((account) => {
                    if (account.account_id == accountId) {
                        accountEmail = account.email;
                        accountId = account.account_id;
                    }
                });
                contentModalDelete.textContent =
                    "Bạn có chắc là muốn xóa tài khoản " + accountEmail ;
                    deleteA.setAttribute(
                        "href",
                        "../Account/DeleteAccount/" + staffId + "/" + accountId
                    );
                    showModalDelete();
            }
            if (infoBtn) {
                var accountId = infoBtn.id.split("-")[1];
                values.infoAccount.forEach((account) => {
                    if (account.account_id == accountId) {
                        rowAccountId.textContent = account.account_id;
                        //rowFullname.textContent = customer.customer_fullname;
                        rowPhoneNumber.textContent = account.phone_number;
                        rowEmail.textContent = account.email;
                        rowPassword.textContent = account.password;
                        avatarImage.setAttribute("src", "../Public/img/accountAvatar/"+account.avatar);
                    }
                });
                showModalInfo();
            }
            if (editBtn) {
                var accountId = editBtn.id.split("-")[1];
                values.infoAccount.forEach((account) => {
                    if (account.account_id == accountId) {
                        phoneNumberEditForm.value = account.phone_number;
                        emailEditForm.value = account.email;
                        accountIdPost.value = account.account_id;
                        passwordEditForm.value = account.password;
                        // avatarEditForm.value = staff.avatar;

                        emailEditForm.addEventListener("keyup", function () {
                            var email = this.value;
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "../Account/GetAccountByEmail", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onload = function () {
                                if (this.status == 200) {
                                    var response = this.responseText;
                                    response = response.trim();
                                    if (response == "Email đã tồn tại" && email != customer.email) {
                                        editEmailWarning.textContent = "Email đã tồn tại";
                                        editEmailWarning.style.opacity = "1";
                                        isEmailEditValid = false;
                                    } else {
                                        const checkEmail =
                                            /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                                        if (!checkEmail.test(email)) {
                                            editEmailWarning.style.opacity = "1";
                                            editEmailWarning.textContent = "Email không đúng định dạng";
                                            isEmailEditValid = false;
                                        } else {
                                            editEmailWarning.style.opacity = "0";
                                            isEmailEditValid = true;
                                        }
                                    }
                                }
                                confirmEditBtn.disabled = !(
                                    isPhoneNumberEditValid &&
                                    isEmailEditValid &&
                                    isPasswordEditValid
                                );
                            };
                            xhr.send("email=" + email);
                        });

                        phoneNumberEditForm.addEventListener("keyup", function () {
                            var phone_number = this.value;
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "../Account/GetAccountByPhoneNumber", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onload = function () {
                                if (this.status == 200) {
                                    var response = this.responseText;
                                    response = response.trim();
                                    if (response == "Số điện thoại đã tồn tại" && phone_number != customer.phone_number) {
                                        editPhoneNumberWarning.textContent = "Số điện thoại đã tồn tại";
                                        editPhoneNumberWarning.style.opacity = "1";
                                        isPhoneNumberEditValid = false;
                                    } else {
                                        const regex = /^0\d{9}$/;
                                        if (!regex.test(phone_number)) {
                                            editPhoneNumberWarning.style.opacity = "1";
                                            editPhoneNumberWarning.textContent =
                                                "Phải đủ 10 số và bắt đầu là 0";
                                            isPhoneNumberEditValid = false;
                                        } else {
                                            editPhoneNumberWarning.style.opacity = "0";
                                            isPhoneNumberEditValid = true;
                                        }
                                    }
                                }
                                confirmEditBtn.disabled = !(
                                    isPhoneNumberEditValid &&
                                    isEmailEditValid &&
                                    isPasswordEditValid
                                );
                            };
                            xhr.send("phone_number=" + phone_number);
                        });
                    }
                });
                showModalEdit();
            }
        });
    })
    .catch((error) => console.log("Error: ", error));

const modal = document.querySelector(".modal");
const closeIconDelete = document.querySelector("#closeIconDelete");
const closeBtnDelete = document.querySelector("#closeBtnDelete");
const closeIconInfo = document.querySelector("#closeIconInfo");
const closeBtnInfo = document.querySelector("#closeBtnInfo");
const closeIconEdit = document.querySelector("#closeIconEdit");
// const closeBtnEdit = document.querySelector("#closeBtnEdit");
const closeIconAdd = document.querySelector("#closeIconAdd");
// const closeBtnAdd = document.querySelector("#closeBtnAdd");

const modalInnerDelete = document.querySelector(".modal-inner.modal-delete");
const modalInnerInfo = document.querySelector(".modal-inner.modal-info");
const modalInnerEdit = document.querySelector(".modal-inner.modal-edit");
const modalInnerAdd = document.querySelector(".modal-inner.modal-add");

const contentModalDelete = document.querySelector(".content-delete");
const contentModalInfo = document.querySelector(".content-info");
const contentModalEdit = document.querySelector(".content-edit");
const contentModalAdd = document.querySelector(".content-add");
const deleteA = document.querySelector(".modal-footer a");

const btnAdd = document.querySelector(".add-btn");
btnAdd.addEventListener("click", showModalAdd);

function hideModalDelete() {
    modal.classList.add("hide");
    modalInnerDelete.classList.add("hide");
}
function showModalDelete() {
    modal.classList.remove("hide");
    modalInnerDelete.classList.remove("hide");
}
function hideModalInfo() {
    modal.classList.add("hide");
    modalInnerInfo.classList.add("hide");
}
function showModalInfo() {
    modal.classList.remove("hide");
    modalInnerInfo.classList.remove("hide");
}
function hideModalEdit() {
    modal.classList.add("hide");
    modalInnerEdit.classList.add("hide");
}
function showModalEdit() {
    modal.classList.remove("hide");
    modalInnerEdit.classList.remove("hide");
}
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
    modalInnerDelete.classList.add("hide");
    modalInnerInfo.classList.add("hide");
    modalInnerEdit.classList.add("hide");
    modalInnerAdd.classList.add("hide");
    refreshAddForm();
}

closeIconDelete.addEventListener("click", hideModalDelete);
closeBtnDelete.addEventListener("click", hideModalDelete);
closeIconInfo.addEventListener("click", hideModalInfo);
closeBtnInfo.addEventListener("click", hideModalInfo);
closeIconEdit.addEventListener("click", hideModalEdit);
// closeBtnEdit.addEventListener("click", hideModalEdit);
closeIconAdd.addEventListener("click", hideModalAdd);
// closeBtnAdd.addEventListener("click", hideModalAdd);
modal.addEventListener("click", hideModal);
modalInnerDelete.addEventListener("click", function (event) {
    event.stopPropagation();
});
modalInnerInfo.addEventListener("click", function (event) {
    event.stopPropagation();
});
modalInnerEdit.addEventListener("click", function (event) {
    event.stopPropagation();
});
modalInnerAdd.addEventListener("click", function (event) {
    event.stopPropagation();
});

//const refreshBtn = document.querySelector(".reset-btn");
//refreshBtn.addEventListener("click", function () {
//    searchFilter.value = "";
//});

const confirmAddBtn = document.getElementById("confirmBtnAdd");
const confirmEditBtn = document.getElementById("confirmBtnEdit");
const formAdd = document.querySelector(".modal-add .modal-body");
const refreshAddBtn = document.querySelector(".modal-add .reset-btn");
const refreshEditBtn = document.querySelector(".modal-edit .reset-btn");
/* refresh add-form */
const addressEditForm = document.querySelector(".address-edit-form");
function refreshEditForm() {
    phoneNumberEditForm.value = "";
    emailEditForm.value = "";
    passwordEditForm.value = "";
    emailEditForm.style.backgroundColor = "#ddd";
    phoneNumberEditForm.style.backgroundColor = "#ddd";
}
refreshEditBtn.addEventListener("click", refreshEditForm);
var isPasswordEditValid = true;
var isPhoneNumberEditValid = true;
var isEmailEditValid = true;


const phoneNumberEditForm = document.querySelector(".phone-number-edit-form");
const editPhoneNumberWarning = document.querySelector(
    ".edit-phone-number-warning"
);
// phoneNumberEditForm.addEventListener("keyup", function () {
//     var phone_number = this.value;
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "../Staff/GetAccountByPhoneNumber", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     xhr.onload = function () {
//         if (this.status == 200) {
//             var response = this.responseText;
//             response = response.trim();
//             if (response == "Số điện thoại đã tồn tại") {
//                 editPhoneNumberWarning.textContent = "Số điện thoại đã tồn tại";
//                 editPhoneNumberWarning.style.opacity = "1";
//                 isPhoneNumberEditValid = false;
//             } else {
//                 const regex = /^0\d{9}$/;
//                 if (!regex.test(phone_number)) {
//                     editPhoneNumberWarning.style.opacity = "1";
//                     editPhoneNumberWarning.textContent =
//                         "Phải đủ 10 số và bắt đầu là 0";
//                     isPhoneNumberEditValid = false;
//                 } else {
//                     editPhoneNumberWarning.style.opacity = "0";
//                     isPhoneNumberEditValid = true;
//                 }
//             }
//         }
//         confirmEditBtn.disabled = !(
//             isPhoneNumberEditValid &&
//             isEmailEditValid &&
//             isFullnameEditValid &&
//             isBirthDateEditValid &&
//             isGenderEditValid &&
//             isPasswordEditValid &&
//             isAvatarEditValid
//         );
//     };
//     xhr.send("phone_number=" + phone_number);
// });
const emailEditForm = document.querySelector(".email-edit-form");
const editEmailWarning = document.querySelector(".edit-email-warning");
// emailEditForm.addEventListener("keyup", function () {
//     var email = this.value;
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "../Staff/GetAccountByEmail", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     xhr.onload = function () {
//         if (this.status == 200) {
//             var response = this.responseText;
//             response = response.trim();
//             if (response == "Email đã tồn tại") {
//                 editEmailWarning.textContent = "Email đã tồn tại";
//                 editEmailWarning.style.opacity = "1";
//                 isEmailEditValid = false;
//             } else {
//                 const checkEmail =
//                     /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
//                 if (!checkEmail.test(email)) {
//                     editEmailWarning.style.opacity = "1";
//                     editEmailWarning.textContent = "Email không đúng định dạng";
//                     isEmailEditValid = false;
//                 } else {
//                     editEmailWarning.style.opacity = "0";
//                     isEmailEditValid = true;
//                 }
//             }
//         }
//         confirmEditBtn.disabled = !(
//             isPhoneNumberEditValid &&
//             isEmailEditValid &&
//             isFullnameEditValid &&
//             isBirthDateEditValid &&
//             isGenderEditValid &&
//             isPasswordEditValid &&
//             isAvatarEditValid
//         );
//     };
//     xhr.send("email=" + email);
// });

const passwordEditForm = document.querySelector(".password-edit-form");
const editPasswordWarning = document.querySelector(".edit-password-warning");
passwordEditForm.addEventListener("keyup", function (e) {
    const checkLetter = /[a-zA-Z]/;
    const checkNumber = /[0-9]/;
    const checkSpecialCharacter = /[^a-zA-Z0-9]/;

    if (
        checkSpecialCharacter.test(e.target.value) &&
        checkLetter.test(e.target.value) &&
        checkNumber.test(e.target.value) &&
        this.value.length > 6
    ) {
        editPasswordWarning.style.opacity = "0";
        isPasswordEditValid = true;
    } else {
        editPasswordWarning.style.opacity = "1";
        editPasswordWarning.textContent =
            "Phải có 7 ký tự, có chữ thường, chữ hoa, số và ký tự đặc biệt";
        isPasswordEditValid = false;
    }

    confirmEditBtn.disabled = !(
        isPhoneNumberEditValid &&
        isEmailEditValid &&
        isPasswordEditValid
    );
});

// const avatarEditForm = document.querySelector(".avatar-edit-form");
// const editAvatarWarning = document.querySelector(".edit-avatar-warning");
// avatarEditForm.addEventListener("change", function (event) {
//     const regex = /\.(png|jpg|jpeg)$/i;
//     var selectedFile = event.target.files[0];
//     if (!regex.test(selectedFile.name)) {
//         editAvatarWarning.style.opacity = "1";
//         isAvatarEditValid = false;
//     } else {
//         editAvatarWarning.style.opacity = "0";
//         isAvatarEditValid = true;
//     }
//     confirmEditBtn.disabled = !(
//         isPhoneNumberEditValid &&
//         isEmailEditValid &&
//         isFullnameEditValid &&
//         isBirthDateEditValid &&
//         isGenderEditValid &&
//         isPasswordEditValid &&
//         isAvatarEditValid
//     );
// });
/* refresh edit-form */
function refreshAddForm() {
    phoneNumberAddForm.value = "";
    emailAddForm.value = "";
    passwordAddForm.value = "";
    avatarAddForm.value = "";
    emailAddForm.style.backgroundColor = "#ddd";
    phoneNumberAddForm.style.backgroundColor = "#ddd";
}
refreshAddBtn.addEventListener("click", refreshAddForm);
var isPasswordAddValid = true;
var isAvatarAddValid = true;
var isPhoneNumberAddValid = true;
var isEmailAddValid = true;

const passwordAddForm = document.querySelector(".password-add-form");
const addPasswordWarning = document.querySelector(".add-password-warning");
passwordAddForm.addEventListener("keyup", function (e) {
    const checkLetter = /[a-zA-Z]/;
    const checkNumber = /[0-9]/;
    const checkSpecialCharacter = /[^a-zA-Z0-9]/;

    if (
        checkSpecialCharacter.test(e.target.value) &&
        checkLetter.test(e.target.value) &&
        checkNumber.test(e.target.value) &&
        this.value.length > 6
    ) {
        addPasswordWarning.style.opacity = "0";
        isPasswordAddValid = true;
    } else {
        addPasswordWarning.style.opacity = "1";
        addPasswordWarning.textContent =
            "Phải có 7 ký tự, có chữ thường, chữ hoa, số và ký tự đặc biệt";
        isPasswordAddValid = false;
    }

    confirmAddBtn.disabled = !(
        isPhoneNumberAddValid &&
        isEmailAddValid &&
        isPasswordAddValid &&
        isAvatarAddValid
    );
});
const avatarAddForm = document.querySelector(".avatar-add-form");
const addAvatarWarning = document.querySelector(".add-avatar-warning");
avatarAddForm.addEventListener("change", function (event) {
    const regex = /\.(png|jpg|jpeg)$/i;
    var selectedFile = event.target.files[0];
    if (!regex.test(selectedFile.name)) {
        addAvatarWarning.style.opacity = "1";
        isAvatarAddValid = false;
    } else {
        addAvatarWarning.style.opacity = "0";
        isAvatarAddValid = true;
    }
    confirmAddBtn.disabled = !(
        isPhoneNumberAddValid &&
        isEmailAddValid &&
        isPasswordAddValid &&
        isAvatarAddValid
    );
});

const phoneNumberAddForm = document.querySelector(".phone-number-add-form");
const addPhoneNumberWarning = document.querySelector(
    ".add-phone-number-warning"
);
phoneNumberAddForm.addEventListener("keyup", function () {
    var phone_number = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Account/GetAccountByPhoneNumber", true);
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
            isPasswordAddValid &&
            isAvatarAddValid
        );
    };
    xhr.send("phone_number=" + phone_number);
});
const emailAddForm = document.querySelector(".email-add-form");
const addEmailWarning = document.querySelector(".add-email-warning");
emailAddForm.addEventListener("keyup", function () {
    var email = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Customer/GetAccountByEmail", true);
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
            isPasswordAddValid &&
            isAvatarAddValid
        );
    };
    xhr.send("email=" + email);
});

function filterTable() {
    var trs = tbody.getElementsByTagName("tr");
    // Lấy giá trị lọc
    var searchFilterValue = searchFilter.value.toLowerCase();

    for (var i = 0; i < trs.length; i++) {

        var accountCodeTd = trs[i].getElementsByTagName("td")[0];
        var accountPhoneTd = trs[i].getElementsByTagName("td")[1];
        var accountEmailTd = trs[i].getElementsByTagName("td")[2];
        var accountPasswordTd = trs[i].getElementsByTagName("td")[3];

        console.log(accountCodeTd);

        if (
            accountCodeTd &&
            accountPhoneTd &&
            accountEmailTd &&
            accountPasswordTd 
        ) {
            // nếu tồn tại thì thay đổi tránh crash
            var accountCodeMatch =
                accountCodeTd.textContent
                    .toLowerCase()
                    .indexOf(searchFilterValue) > -1; // so sánh giá trị trong bảng với giá trị lọc
            var accountPhoneMatch =
                accountPhoneTd.textContent
                    .toLowerCase()
                    .indexOf(searchFilterValue) > -1;
            var accountEmailMatch =
                accountEmailTd.textContent
                    .toLowerCase()
                    .indexOf(searchFilterValue) > -1;
            var accountPasswordMatch =
                accountPasswordTd.textContent
                    .toLowerCase()
                    .indexOf(searchFilterValue) > -1;
            trs[i].style.display =
                   (accountCodeMatch ||
                    accountPhoneMatch ||
                    accountEmailMatch ||
                    accountPasswordMatch) 
                    ? ""
                    : "none";
        }
    }
}
